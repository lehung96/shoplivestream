<?php

namespace App\Http\Controllers;

use Carbon\Traits\Cast;
use Gloudemans\Shoppingcart\Cart;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();
class CartController extends Controller
{
    public function save_cart(Request $request)
    {
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();// lấy ra category_product
        $productId = $request->productid_hidden;
        $quantity = $request->qty;

        $product_info = DB::table('tbl_product')->where('product_id',$productId)->first();// lấy tất cả thông tin mà id đã chuyền vào


        $data['id'] = $product_info->product_id;
        $data['qty'] = $quantity;
        $data['name'] = $product_info->product_name;
        $data['price'] = $product_info->product_price;
        $data['options']['image'] = $product_info->product_image;
        $data['weight'] =  $product_info->product_price;
        \Cart::add($data);
        return Redirect::to('/show_cart');

        return view('frontenduser.cart.show_cart')->with('cate_product',$cate_product);

    }
    public function show_cart(Request $request)

    {
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();// lấy ra category_product
        $product_question = DB::table('tbl_question')->where('question_status','1')->orderby('question_id','desc')->limit(4)->get();// lấy ra question
        $us_about = DB::table('tbl_about')->orderby('about_id','desc')->limit(4)->get();// lấy ra question
        foreach ($cate_product as $key=>$val){

            $category_desc=$val->category_desc;// thẻ mô tả
            $meta_keywords=$val->meta_keywords;// thẻ từ khóa
            $meta_title=$val->category_name;
            $url_canonical =$request->url();
        }
        return view('frontenduser.cart.show_cart')->with('cate_product',$cate_product) ->with('product_questions',$product_question)->with('us_abouts',$us_about)->with('category_desc',$category_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical);
    }

    public function delete_to_cart($rowId)
    {
        \Cart::update($rowId, 0);
        return Redirect::to('/show_cart');
    }

    public function update_cart_quantity(Request $request)
    {
            $rowId = $request->rowId_cart;
        $qty =$request->cart_quantity;
        \Cart::update($rowId,$qty);
        return Redirect::to('/show_cart');
    }

}
