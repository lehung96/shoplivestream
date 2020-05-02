<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();


class CategoryProductController extends Controller
{
    public function AuthLogin(){
        $admin_id =Session::get('admin_id');
        if ($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function add_category_product()
    {
        $this->AuthLogin();
        return view('backend.add_category_product');

    }
    public function  all_category_product()
    {     $this->AuthLogin();
        $all_category_product = DB::table('tbl_category_product')->get();
        $manager_category_product =  view('backend.all_category_product')->with('all_category_product',$all_category_product);
        return view('pagesbackend.layout')->with('all_category_product',$manager_category_product);

    }

//    public function  all_category_product()
//    {
//       $all_category_product = DB::table('tbl_category_product')->get();
//        return view('backend.all_category_product')->with('all_category_product',$all_category_product);
//
//    }

    public function  save_category_product(Request $request)
    {     $this->AuthLogin();
        $data = array();
        $data['category_name'] = $request->category_product_name;
        $data['meta_keywords'] = $request->category_product_keywords;
        $data['category_desc'] = $request->category_product_desc;
        $data['category_status'] = $request->category_product_status;

        DB::table('tbl_category_product')->insert($data);

        Session::put('message','Thêm danh mục sản phẩm thành công');
        return Redirect::to('add-category-products');
    }
    public function unactive_category_product($category_product_id)
    {
        $this->AuthLogin();
        DB::table('tbl_category_product')->where('category_id',$category_product_id)->update(['category_status'=>1]);
        Session::put('message','kích hoạt danh mục sản phẩm thành công');
       return Redirect::to('all-category-products');
    }
    public function active_category_product($category_product_id)
    {
        $this->AuthLogin();
        DB::table('tbl_category_product')->where('category_id',$category_product_id)->update(['category_status'=>0]);
        Session::put('message','không kích hoạt danh mục sản phẩm thành công');
        return Redirect::to('all-category-products');
    }

    public function edit_category_product($category_product_id)
    {
        $this->AuthLogin();
        $edit_category_product = DB::table('tbl_category_product')->where('category_id',$category_product_id)->get();
        $manager_category_product =  view('backend.edit_category_product')->with('edit_category_product',$edit_category_product);
        return view('pagesbackend.layout')->with('edit_category_product',$manager_category_product);
    }

    public function update_category_product(Request $request,$category_product_id)
    {
        $this->AuthLogin();
        $data = array();
        $data['category_name'] = $request->category_product_name;
        $data['meta_keywords'] = $request->category_product_keywords;
        $data['category_desc'] = $request->category_product_desc;

        DB::table('tbl_category_product')->where('category_id',$category_product_id)->update($data);
        Session::put('message','Cập nhật danh mục sản phẩm thành công');
        return Redirect::to('all-category-products');

    }

    public function delete_category_product($category_product_id)
    {
        $this->AuthLogin();
        DB::table('tbl_category_product')->where('category_id',$category_product_id)->delete();
        Session::put('message','xóa danh mục sản phẩm thành công');
        return Redirect::to('all-category-products');

    }
    //End Function Admin page

    public function show_category_home(Request $request, $category_id)
    {
        //seo

        //--seo
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();// lấy ra category_product
        $category_by_id =DB::table('tbl_product')->join('tbl_category_product','tbl_product.category_id','=','tbl_category_product.category_id')->where('tbl_product.category_id',$category_id)->get();
        $product_question = DB::table('tbl_question')->where('question_status','1')->orderby('question_id','desc')->limit(4)->get();// lấy ra question
        $us_about = DB::table('tbl_about')->orderby('about_id','desc')->limit(4)->get();// lấy ra question

        foreach ($category_by_id as $key=>$val){

        $category_desc=$val->category_desc;// thẻ mô tả
        $meta_keywords=$val->meta_keywords;// thẻ từ khóa
        $meta_title=$val->category_name;
        $url_canonical =$request->url();
        }

        $category_name =DB::table('tbl_category_product')->where('tbl_category_product.category_id',$category_id)->limit(1)->get();
        return view('frontenduser.category.show_category')->with('cate_product',$cate_product)->with('category_by_id',$category_by_id)->with('category_name',$category_name)->with('product_questions',$product_question)->with('us_abouts',$us_about)->with('category_desc',$category_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical);
    }
}
