<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class AdminController extends Controller
{
    public function AuthLogin(){
        $admin_id =Session::get('admin_id');
        if ($admin_id){
           return Redirect::to('dashboard');
        }else{
           return Redirect::to('admin')->send();
        }
    }
    public function index()
    {

        return view('backend.admin_login');
    }
    public function dashboard()
    {
            $this->AuthLogin();
        return view('backend.dashboard');
    }
    public function postDashboard(Request $request)
    {
        $admin_email = $request->admin_email;
        $admin_password = md5($request->admin_password);

        $result = DB::table('tbl_admin')->where('admin_email',$admin_email)->where('admin_password',$admin_password)->first();

        if($result)
        {
            Session::put('admin_name',$result->admin_name);
            Session::put('admin_id',$result->admin_id);
            return Redirect::to('/dashboard');
        }else{
            Session::put('message','Mật khẩu hoặc tài khoản bị sai. mời bạn nhập lại');
            return Redirect::to('/admin');
        }
    }
    public function logout()
    {
        $this->AuthLogin();
        Session::put('admin_name',null);
        Session::put('admin_id',null);
        return Redirect::to('/admin');
    }
    public function post_search(Request $request)
    {
        $keywords = $request->keywords_submit;
        $this->AuthLogin();

        $cate_product = DB::table('tbl_category_product')->orderby('category_id','desc')->get();// lấy ra category_product
        $search_products = DB::table('tbl_product')->where('product_name','like','%'.$keywords.'%')->get();// lấy ra category_produc
        return view('backend.search_product')->with('cate_product',$cate_product)->with('search_products',$search_products);

    }

}
