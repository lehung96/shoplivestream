<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();
class ProductController extends Controller
{
    public function AuthLogin(){
        $admin_id =Session::get('admin_id');
        if ($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function add_product()
    {
        $this->AuthLogin();
        $cate_product = DB::table('tbl_category_product')->orderby('category_id','desc')->get();// lấy ra category_product

        return view('backend.add_product')->with('cate_product',$cate_product);


    }
    public function  all_product()
    {
        $this->AuthLogin();

        $all_product = DB::table('tbl_product')
        ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')->orderby('tbl_product.product_id','desc')->get();
        $manager_product =  view('backend.all_product')->with('all_product',$all_product);
        return view('pagesbackend.layout')->with('all_product',$manager_product);

    }

//    public function  all_category_product()
//    {
//       $all_category_product = DB::table('tbl_category_product')->get();
//        return view('backend.all_category_product')->with('all_category_product',$all_category_product);
//
//    }

    public function  save_product(Request $request)
    {
        $this->AuthLogin();
        $data = array();
        $data['product_name'] = $request->product_name;// product_name data gủi qua ,product_name các trường trong bảng
        $data['product_price'] = $request->product_price;
        $data['product_desc'] = $request->product_desc;
        $data['product_content'] = $request->product_content;
        $data['category_id'] = $request->product_cate;
        $data['product_status'] = $request->product_status;
        $data['product_image'] = $request->product_image;

        $get_image =$request->file('product_image');

        if ($get_image)// kiểm tra ảnh kích thước bao nhiêu dung lượng bao nhiêu mới được upload
        {
            $get_name_image =$get_image->getClientOriginalName();
            $name_image =current(explode('.',$get_name_image));
            $new_image =$name_image. rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/products',$new_image);
            $data['product_image'] =$new_image;
            DB::table('tbl_product')->insert($data);
            Session::put('message','Thêm sản phẩm thành công');
            return Redirect::to('add-products');
        }
        $data['product_image'] =' ';
        DB::table('tbl_product')->insert($data);
        Session::put('message','Thêm sản phẩm thành công');
        return Redirect::to('all-products');
    }
    public function unactive_product($product_id)
    {
        $this->AuthLogin();
        DB::table('tbl_product')->where('product_id',$product_id)->update(['product_status'=>1]);
        Session::put('message','kích hoạt sản phẩm thành công');
        return Redirect::to('all-products');
    }
    public function active_product($product_id)
    {
        $this->AuthLogin();
        DB::table('tbl_product')->where('product_id',$product_id)->update(['product_status'=>0]);
        Session::put('message','không kích hoạt sản phẩm thành công');
        return Redirect::to('all-products');
    }

    public function edit_product($product_id)
    {
        $this->AuthLogin();
        $cate_product = DB::table('tbl_category_product')->orderby('category_id','desc')->get();// lấy ra category_product
        $edit_product = DB::table('tbl_product')->where('product_id',$product_id)->get();
        $manager_product =  view('backend.edit_product')->with('edit_product',$edit_product)->with('cate_product',$cate_product);
        return view('pagesbackend.layout')->with('edit_product',$manager_product);
    }

    public function update_product(Request $request,$product_id)
    {
        $this->AuthLogin();
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_price'] = $request->product_price;
        $data['product_desc'] = $request->product_desc;
        $data['product_content'] = $request->product_content;
        $data['category_id'] = $request->product_cate;
        $data['product_status'] = $request->product_status;
        $get_image =$request->file('product_image');

        if ($get_image)// kiểm tra ảnh kích thước bao nhiêu dung lượng bao nhiêu mới được upload
        {
            $get_name_image =$get_image->getClientOriginalName();
            $name_image =current(explode('.',$get_name_image));
            $new_image =$name_image. rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/products',$new_image);
            $data['product_image'] =$new_image;
            DB::table('tbl_product')->where('product_id',$product_id)->update($data);
            Session::put('message','cập nhật sản phẩm thành công');
            return Redirect::to('all-products');
        }

        DB::table('tbl_product')->where('product_id',$product_id)->update($data);
        Session::put('message','cập nhật sản phẩm thành công');
        return Redirect::to('all-products');
    }

    public function delete_product($product_id)
    {
        $this->AuthLogin();
        DB::table('tbl_product')->where('product_id',$product_id)->delete();
        Session::put('message','xóa  sản phẩm thành công');
        return Redirect::to('all-products');

    }
    //End function Admin pages
    public function details_product(Request $request,$product_id)
    {   $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();// lấy ra category_product
        //lấy ra chi tiết sản phẩm thuộc danh mục
        $details_product = DB::table('tbl_product')
        ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
        ->where('tbl_product.product_id',$product_id)->get();
        $product_question = DB::table('tbl_question')->where('question_status','1')->orderby('question_id','desc')->limit(4)->get();// lấy ra question
        $us_about = DB::table('tbl_about')->orderby('about_id','desc')->limit(4)->get();// lấy ra question
        foreach ($details_product as $key=>$va){

            $category_desc=$va->category_desc;// thẻ mô tả
            $meta_keywords=$va->meta_keywords;// thẻ từ khóa
            $meta_title=$va->category_name;
            $url_canonical =$request->url();
        }

//        foreach( $details_product as $key => $value)
//            $category_id = $value->category_id;
//         endforeach

        return view('frontenduser.products.show_details')->with('cate_product',$cate_product)->with('product_details',$details_product)->with('product_questions',$product_question)->with('us_abouts',$us_about)->with('category_desc',$category_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical);
    }
 //phân trang

//       public function get_all_product()
//    {
//        $all_product = DB::table('tbl_product')->paginate(5);
//        return view('backend.all_product',compact('all_product'));
//    }

}
