<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Cart;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();
class CheckoutController extends Controller
{
    public function AuthLogin(){
        $admin_id =Session::get('admin_id');
        if ($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }

    public function view_order($orderId)
    {
        $this->AuthLogin();
        $order_by_id = DB::table('tbl_order')
            ->join('tbl_customers','tbl_order.customer_id','=','tbl_customers.customer_id')
            ->join('tbl_shipping','tbl_order.shipping_id','=','tbl_shipping.shipping_id')
            ->join('tbl_order_details','tbl_order.order_id','=','tbl_order_details.order_id')
            ->select('tbl_order.*','tbl_customers.*','tbl_shipping.*','tbl_order_details.*')->first();

        $manager_order_by_id  = view('backend.view_order')->with('order_by_id',$order_by_id);
        return view('pagesbackend.layout')->with('backend.view_order', $manager_order_by_id);
    }

    public function login_checkout(Request $request)
    {
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();// lấy ra category_product

        foreach ($cate_product as $key=>$val){

            $category_desc=$val->category_desc;// thẻ mô tả
            $meta_keywords=$val->meta_keywords;// thẻ từ khóa
            $meta_title=$val->category_name;
            $url_canonical =$request->url();
        }
        $product_question = DB::table('tbl_question')->where('question_status','1')->orderby('question_id','desc')->limit(4)->get();// lấy ra question
        return view('frontenduser.checkout.login_checkout')->with('cate_product',$cate_product)->with('product_questions',$product_question)->with('category_desc',$category_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical);
    }
    public function add_customer(Request $request)
    {
        $data = array();
        $data['customer_name']= $request->customer_name;
        $data['customer_email']= $request->customer_email;
        $data['customer_password']= md5($request->customer_password);
        $data['customer_phone']= $request->customer_phone;

        $customer_id = DB::table('tbl_customers')->insertGetId($data);
        session::put('customer_id',$customer_id);
        session::put('customer_name', $request->customer_name);

        return Redirect::to('/checkout');
    }
    public function checkout(Request $request)
    {
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();// lấy ra category_product
        foreach ($cate_product as $key=>$val){

            $category_desc=$val->category_desc;// thẻ mô tả
            $meta_keywords=$val->meta_keywords;// thẻ từ khóa
            $meta_title=$val->category_name;
            $url_canonical =$request->url();
        }
        $product_question = DB::table('tbl_question')->where('question_status','1')->orderby('question_id','desc')->limit(4)->get();// lấy ra question
        $us_about = DB::table('tbl_about')->orderby('about_id','desc')->limit(3)->get();// lấy ra question
        return view('frontenduser.checkout.show_checkout')->with('cate_product',$cate_product)->with('product_questions',$product_question)->with('us_abouts',$us_about)->with('category_desc',$category_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical);

    }
    public function save_checkout_customer(Request $request)
    {
        $data = array();
        $data['shipping_name']= $request->shipping_name;
        $data['shipping_email']= $request->shipping_email;
        $data['shipping_phone']= $request->shipping_phone;
        $data['shipping_address']= $request->shipping_address;
        $data['shipping_notes']= $request->shipping_notes;

        $shipping_id = DB::table('tbl_shipping')->insertGetId($data);
        session::put('shipping_id',$shipping_id);


        return Redirect::to('/payment');

    }
    public function payment(Request $request)
    {
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();// lấy ra category_product
        foreach ($cate_product as $key=>$val){

            $category_desc=$val->category_desc;// thẻ mô tả
            $meta_keywords=$val->meta_keywords;// thẻ từ khóa
            $meta_title=$val->category_name;
            $url_canonical =$request->url();
        }
        $product_question = DB::table('tbl_question')->where('question_status','1')->orderby('question_id','desc')->limit(4)->get();// lấy ra question
        $us_about = DB::table('tbl_about')->orderby('about_id','desc')->limit(4)->get();// lấy ra question
        return view('frontenduser.checkout.payment')->with('cate_product',$cate_product)->with('product_questions',$product_question)->with('us_abouts',$us_about)->with('category_desc',$category_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical);
    }

    public function order_place(Request $request)
    {
        //insert payment_method

        $data = array();
        $data['payment_method'] = $request->payment_options;
        $data['payment_status'] = 'Đang chờ xử lý';
        $payment_id = DB::table('tbl_payment')->insertGetId($data);

        //insert order
        $order_data = array();
        $order_data['customer_id'] = Session::get('customer_id');
        $order_data['shipping_id'] = Session::get('shipping_id');
        $order_data['payment_id'] = $payment_id;
        $order_data['order_total'] = Cart::total();
        $order_data['order_status'] = 'Đang chờ xử lý';
        $order_id = DB::table('tbl_order')->insertGetId($order_data);

        //insert order_details
        $content = Cart::content();
        foreach($content as $v_content){
            $order_d_data['order_id'] = $order_id;
            $order_d_data['product_id'] = $v_content->id;
            $order_d_data['product_name'] = $v_content->name;
            $order_d_data['product_price'] = $v_content->price;
            $order_d_data['product_sales_quantity'] = $v_content->qty;
            DB::table('tbl_order_details')->insert($order_d_data);
        }
        if($data['payment_method'] ==1){

            echo 'Thanh toán thẻ ATM';

        }else{
            Cart::destroy();// hủy phiên mua hàng
            $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();// lấy ra category_product
            foreach ($cate_product as $key=>$val){

                $category_desc=$val->category_desc;// thẻ mô tả
                $meta_keywords=$val->meta_keywords;// thẻ từ khóa
                $meta_title=$val->category_name;
                $url_canonical =$request->url();
            }
            $product_question = DB::table('tbl_question')->where('question_status','1')->orderby('question_id','desc')->limit(4)->get();// lấy ra question
            $us_about = DB::table('tbl_about')->orderby('about_id','desc')->limit(4)->get();// lấy ra question
            return view('frontenduser.checkout.handcash')->with('cate_product',$cate_product)->with('product_questions',$product_question)->with('us_abouts',$us_about)->with('category_desc',$category_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical);
        }
//        return Redirect::to('/payment');

    }
    public function logout_checkout()
     {
        Session::flush();
        return Redirect::to('/login-checkout');
     }
     public function login_customer(Request $request)
     {

         $email =$request->email_account;
         $password =md5($request->password_account);
         $result =DB::table('tbl_customers')->where('customer_email',$email)->where('customer_password',$password)->first();

        if ( $result){// nếu true thì sẽ taọ Session mà có kết quả thì sẽ trả về checkout
            Session::put('customer_id',$result->customer_id);
            return Redirect('/checkout');

        }else {// còn ko login checkout

            return Redirect('/login-checkout');
        }
     }

     public function manage_order()
     {
         $this->AuthLogin();

         $all_order = DB::table('tbl_order')
             ->join('tbl_customers','tbl_order.customer_id','=','tbl_customers.customer_id')->select('tbl_order.*','tbl_customers.customer_name')
             ->orderby('tbl_order.order_id','desc')->get();
         $manager_order =  view('backend.manage_order')->with('all_order',$all_order);
         return view('pagesbackend.layout')->with('backend.manage_order',$manager_order);

     }
    public function delete_order($orderId)
    {
        $this->AuthLogin();
        DB::table('tbl_order')->where('order_id',$orderId)->delete();
        Session::put('message','xóa đơn đặt hàng thành công thành công');
        return Redirect::to('manage-order');


    }




}
