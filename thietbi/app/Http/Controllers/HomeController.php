<?php

namespace App\Http\Controllers;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();
use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function index(Request $request)
    {
        //seo
        $category_desc="Chuyên bán mic và phụ kiện livestream";// thẻ mô tả
        $meta_keywords="mic livestream, phụ kiện livestream, thiết bị livetream";// thẻ từ khóa
        $meta_title="VuongKhangMIcthuam.com";
        $url_canonical =$request->url();
        //--seo
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();// lấy ra category_product
//        $all_products = DB::table('tbl_product')->where('product_status','1')->orderby('product_id','desc')->limit(4)->get();// lấy ra category_product
//            ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')->orderby('tbl_product.product_id','desc')->get();
        $all_product = DB::table('tbl_product')->where('product_status','1')->orderby('product_id','desc')->limit(9)->get();// lấy ra category_product
        $product_question = DB::table('tbl_question')->where('question_status','1')->orderby('question_id','desc')->limit(4)->get();// lấy ra question
        $us_about = DB::table('tbl_about')->orderby('about_id','desc')->limit(4)->get();// lấy ra question
        return view('frontenduser.home')->with('cate_product',$cate_product)->with('all_products',$all_product)->with('product_questions',$product_question)->with('us_abouts',$us_about)->with('category_desc',$category_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical);//c1

//        return view('frontenduser.home')->with(compact('cate_product','all_product'));//c2

    }
    public function search(Request $request)
    {
        $keywords = $request->keywords_submit;
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();// lấy ra category_product
//        $all_products = DB::table('tbl_product')->where('product_status','1')->orderby('product_id','desc')->limit(4)->get();// lấy ra category_product
//            ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')->orderby('tbl_product.product_id','desc')->get();
//        $all_product = DB::table('tbl_product')->where('product_status','1')->orderby('product_id','desc')->limit(16)->get();// lấy ra category_product
        $search_product = DB::table('tbl_product')->where('product_name','like','%'.$keywords.'%')->get();// lấy ra category_produc
        $product_question = DB::table('tbl_question')->where('question_status','1')->orderby('question_id','desc')->limit(4)->get();// lấy ra question
        $us_about = DB::table('tbl_about')->orderby('about_id','desc')->limit(4)->get();// lấy ra question
        foreach ($cate_product as $key=>$val){

            $category_desc=$val->category_desc;// thẻ mô tả
            $meta_keywords=$val->meta_keywords;// thẻ từ khóa
            $meta_title=$val->category_name;
            $url_canonical =$request->url();
        }
        return view('frontenduser.products.search')->with('cate_product',$cate_product)->with('search_product',$search_product)->with('product_questions',$product_question)->with('us_abouts',$us_about)->with('category_desc',$category_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical);
    }
}
