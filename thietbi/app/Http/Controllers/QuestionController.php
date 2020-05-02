<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class QuestionController extends Controller
{
    public function AuthLogin(){
        $admin_id =Session::get('admin_id');
        if ($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
   public function  add_question()
   {
       $this->AuthLogin();
       $cate_question = DB::table('tbl_question')->orderby('question_id','desc')->get();// lấy ra category_product

       return view('backend.add_question')->with('cate_question',$cate_question);
   }
    public function  all_question()
    {
        $this->AuthLogin();

        $all_question = DB::table('tbl_question')->get();
        $manager_question =  view('backend.all_question')->with('all_question',$all_question);
        return view('pagesbackend.layout')->with('all_question',$manager_question);

    }
    public function  save_question(Request $request)
    {
        $this->AuthLogin();
        $data = array();
        $data['question_name'] = $request->question_name;
        $data['question_content'] = $request->question_content;
        $data['category_desc'] = $request->category_desc;
        $data['meta_keywords'] = $request->question_keywords;
        $data['category_name'] = $request->category_name;
        $data['question_status'] = $request->question_status;
        $data['question_image'] = $request->question_image;

        $get_image =$request->file('question_image');

        if ($get_image)// kiểm tra ảnh kích thước bao nhiêu dung lượng bao nhiêu mới được upload
        {
            $get_name_image =$get_image->getClientOriginalName();
            $name_image =current(explode('.',$get_name_image));
            $new_image =$name_image. rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/products',$new_image);
            $data['question_image'] =$new_image;
            DB::table('tbl_question')->insert($data);
            Session::put('message','Thêm hướng dẫn thành công');
            return Redirect::to('add-questions');
        }
        $data['question_image'] =' ';
        DB::table('tbl_question')->insert($data);
        Session::put('message','Thêm hướng dẫn thành công');
        return Redirect::to('all-questions');
    }
    public function unactive_question($question_id)
    {
        $this->AuthLogin();
        DB::table('tbl_question')->where('question_id',$question_id)->update(['question_status'=>1]);
        Session::put('message','kích hoạt hướng dẫn thành công');
        return Redirect::to('all-questions');
    }
    public function active_question($question_id)
    {
        $this->AuthLogin();
        DB::table('tbl_question')->where('question_id',$question_id)->update(['question_status'=>0]);
        Session::put('message','không kích hoạt hướng dẫn thành công');
        return Redirect::to('all-questions');
    }
    public function edit_question($question_id)
    {
        $this->AuthLogin();
        $edit_question = DB::table('tbl_question')->where('question_id',$question_id)->get();
        $manager_question =  view('backend.edit_question')->with('edit_question',$edit_question);
        return view('pagesbackend.layout')->with('edit_question',$manager_question);
    }
    public function update_question(Request $request,$question_id)
    {
        $this->AuthLogin();
        $data = array();
        $data['question_name'] = $request->question_name;
        $data['category_desc'] = $request->category_desc;
        $data['meta_keywords'] = $request->question_keywords;
        $data['category_name'] = $request->category_name;
        $data['question_content'] = $request->question_content;
        $data['question_status'] = $request->question_status;
        $get_image =$request->file('question_image');

        if ($get_image)// kiểm tra ảnh kích thước bao nhiêu dung lượng bao nhiêu mới được upload
        {
            $get_name_image =$get_image->getClientOriginalName();
            $name_image =current(explode('.',$get_name_image));
            $new_image =$name_image. rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/products',$new_image);
            $data['question_image'] =$new_image;
            DB::table('tbl_question')->where('question_id',$question_id)->update($data);
            Session::put('message','cập nhật hướng dẫn thành công');
            return Redirect::to('all-questions');
        }

        DB::table('tbl_question')->where('question_id',$question_id)->update($data);
        Session::put('message','cập nhật hướng dẫn thành công');
        return Redirect::to('all-questions');

    }
    public function delete_question($question_id)
    {
        $this->AuthLogin();
        DB::table('tbl_question')->where('question_id',$question_id)->delete();
        Session::put('message','xóa danh hướng dẫn thành công');
        return Redirect::to('all-questions');

    }
    public function details_question(Request $request,$question_id)
    {   $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();// lấy ra category_product
        //lấy ra chi tiết sản phẩm thuộc danh mục
        $details_question = DB::table('tbl_question')
//            ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
            ->where('tbl_question.question_id',$question_id)->get();
        $us_about = DB::table('tbl_about')->orderby('about_id','desc')->limit(4)->get();// lấy ra question
        $product_question = DB::table('tbl_question')->where('question_status','1')->orderby('question_id','desc')->limit(4)->get();// lấy ra question

        foreach ($details_question as $key=>$va){

            $category_desc=$va->category_desc;// thẻ mô tả
            $meta_keywords=$va->meta_keywords;// thẻ từ khóa
            $meta_title=$va->category_name;
            $url_canonical =$request->url();
        }

//        foreach( $details_product as $key => $value)
//            $category_id = $value->category_id;
//         endforeach

        return view('frontenduser.question.show_question')->with('cate_product',$cate_product)->with('details_questions',$details_question)->with('product_questions',$product_question)->with('us_abouts',$us_about)->with('category_desc',$category_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical);
    }
}
