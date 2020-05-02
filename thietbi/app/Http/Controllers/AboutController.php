<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class AboutController extends Controller
{
    public function AuthLogin(){
        $admin_id =Session::get('admin_id');
        if ($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function  add_about()
    {
        $this->AuthLogin();
        $cate_about = DB::table('tbl_about')->orderby('about_id','desc')->get();// lấy ra category_product

        return view('backend.add_about')->with('cate_about',$cate_about);
    }
    public function  all_about()
    {
        $this->AuthLogin();

        $all_about = DB::table('tbl_about')->get();
        $manager_about =  view('backend.all_about')->with('all_about',$all_about);
        return view('pagesbackend.layout')->with('all_about',$manager_about);

    }
    public function  save_about(Request $request)
    {
        $this->AuthLogin();
        $data = array();
        $data['about_name'] = $request->about_name;
        $data['about_content'] = $request->about_content;
        $data['category_desc'] = $request->category_desc;
        $data['meta_keywords'] = $request->about_keywords;
        $data['category_name'] = $request->category_name;
        $data['about_image'] = $request->about_image;
        $get_image =$request->file('about_image');

        if ($get_image)// kiểm tra ảnh kích thước bao nhiêu dung lượng bao nhiêu mới được upload
        {
            $get_name_image =$get_image->getClientOriginalName();
            $name_image =current(explode('.',$get_name_image));
            $new_image =$name_image. rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/products',$new_image);
            $data['about_image'] =$new_image;
            DB::table('tbl_about')->insert($data);
            Session::put('message','Thêm liên kết hữu ích thành công ');
            return Redirect::to('add-about');
        }
        $data['about_image'] =' ';
        DB::table('tbl_about')->insert($data);
        Session::put('message','Thêm liên kết hữu ích thành công');
        return Redirect::to('all-about');
    }
    public function edit_about($about_id)
    {
        $this->AuthLogin();
        $edit_about = DB::table('tbl_about')->where('about_id',$about_id)->get();
        $manager_about =  view('backend.edit_about')->with('edit_about',$edit_about);
        return view('pagesbackend.layout')->with('edit_about',$manager_about);
    }
    public function update_about(Request $request,$about_id)
    {
        $this->AuthLogin();
        $data = array();
        $data['about_name'] = $request->about_name;
        $data['category_desc'] = $request->category_desc;
        $data['meta_keywords'] = $request->about_keywords;
        $data['category_name'] = $request->category_name;
        $data['about_content'] = $request->about_content;

        $get_image =$request->file('about_image');

        if ($get_image)// kiểm tra ảnh kích thước bao nhiêu dung lượng bao nhiêu mới được upload
        {
            $get_name_image =$get_image->getClientOriginalName();
            $name_image =current(explode('.',$get_name_image));
            $new_image =$name_image. rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/products',$new_image);
            $data['about_image'] =$new_image;
            DB::table('tbl_about')->where('about_id',$about_id)->update($data);
            Session::put('message','cập nhật liên kết hữu ích thành công');
            return Redirect::to('all-about');
        }

        DB::table('tbl_about')->where('about_id',$about_id)->update($data);
        Session::put('message','cập nhật liên kết hữu ích thành công');
        return Redirect::to('all-about');

    }
    public function delete_about($about_id)
    {
        $this->AuthLogin();
        DB::table('tbl_about')->where('about_id',$about_id)->delete();
        Session::put('message','xóa liên kết hữu ích thành công');
        return Redirect::to('all-about');

    }
    public function details_about(Request $request,$about_id)
    {   $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();// lấy ra category_product
        //lấy ra chi tiết sản phẩm thuộc danh mục
        $details_about = DB::table('tbl_about')
//            ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
            ->where('tbl_about.about_id',$about_id)->get();
        $product_question = DB::table('tbl_question')->where('question_status','1')->orderby('question_id','desc')->limit(4)->get();// lấy ra question
        $us_about = DB::table('tbl_about')->orderby('about_id','desc')->limit(4)->get();// lấy ra question
        foreach ($details_about as $key=>$va){

            $category_desc=$va->category_desc;// thẻ mô tả
            $meta_keywords=$va->meta_keywords;// thẻ từ khóa
            $meta_title=$va->category_name;
            $url_canonical =$request->url();
        }

//        foreach( $details_product as $key => $value)
//            $category_id = $value->category_id;
//         endforeach

        return view('frontenduser.Usefullinks.about')->with('cate_product',$cate_product)->with('details_abouts',$details_about)->with('us_abouts',$us_about)->with('product_questions',$product_question)->with('category_desc',$category_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical);
    }

}
