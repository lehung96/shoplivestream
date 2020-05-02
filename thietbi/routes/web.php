<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
// frontend
Route::get("/index","HomeController@index");
Route::post('/tim-kiem',"HomeController@search");
//Danh mục sản phẩm trang chủ
Route::get('/danh-muc-san-pham/{category_id}','CategoryProductController@show_category_home');
Route::get('/chi-tiet-san-pham/{product_id}','ProductController@details_product');
Route::get('/chi-tiet-huong-dan/{question_id}','QuestionController@details_question');
Route::get('/chi-tiet-lien-ket/{about_id}','AboutController@details_about');
//1105.5
// backend
Route::get('/admin','AdminController@index');
Route::post('/search','AdminController@post_search');
Route::get('/dashboard','AdminController@dashboard');
Route::get('/logout','AdminController@logout');
Route::post('/admin-dashboard','AdminController@postdashboard');
// phân trang


//category products
Route::get('/add-category-products','CategoryProductController@add_category_product');
Route::get('/edit-category-products/{category_product_id}','CategoryProductController@edit_category_product');
Route::get('/delete-category-products/{category_product_id}','CategoryProductController@delete_category_product');
Route::get('/all-category-products','CategoryProductController@all_category_product');

Route::get('/active-category-products/{category_product_id}','CategoryProductController@active_category_product');
Route::get('/unactive-category-products/{category_product_id}','CategoryProductController@unactive_category_product');

Route::post('/save-category-products','CategoryProductController@save_category_product');
Route::post('/update-category-products/{category_product_id}','CategoryProductController@update_category_product');

// products
Route::get('/add-products','ProductController@add_product');
Route::get('/edit-products/{product_id}','ProductController@edit_product');
Route::get('/delete-products/{product_id}','ProductController@delete_product');
Route::get('/all-products','ProductController@all_product');

Route::get('/active-products/{product_id}','ProductController@active_product');
Route::get('/unactive-products/{product_id}','ProductController@unactive_product');

Route::post('/save-products','ProductController@save_product');
Route::post('/update-products/{product_id}','ProductController@update_product');
// question
Route::get('/all-questions','QuestionController@all_question');
Route::get('/add-questions','QuestionController@add_question');
Route::post('/save-questions','QuestionController@save_question');
Route::post('/update-questions/{question_id}','QuestionController@update_question');
Route::get('/edit-questions/{question_id}','QuestionController@edit_question');
Route::get('/delete-questions/{question_id}','QuestionController@delete_question');

Route::get('/active-questions/{question_id}','QuestionController@active_question');
Route::get('/unactive-questions/{question_id}','QuestionController@unactive_question');
// giới thiều về cửa hàng
Route::get('/all-about','AboutController@all_about');
Route::get('/add-about','AboutController@add_about');
Route::post('/save-about','AboutController@save_about');
Route::post('/update-about/{about_id}','AboutController@update_about');
Route::get('/edit-about/{about_id}','AboutController@edit_about');
Route::get('/delete-about/{about_id}','AboutController@delete_about');

// phân trang
//Route::get('/all-products','ProductController@get_all_product');
//Cart
Route::post('/save-cart','CartController@save_cart');
Route::post('/update-cart-quantity','CartController@update_cart_quantity');
Route::get('/save-cart','CartController@save_cart');
Route::get('/show_cart','CartController@show_cart')->name('show.cart');
Route::get('/delete-to-cart/{rowId}','CartController@delete_to_cart');

//checkout
Route::post('/login-customer','CheckoutController@login_customer');// khi khách hàng đăng nhập
Route::get('/login-checkout','CheckoutController@login_checkout');
Route::get('/logout-checkout','CheckoutController@logout_checkout');
Route::post('/add-customer','CheckoutController@add_customer');
Route::post('/order-place','CheckoutController@order_place');
Route::get('/checkout','CheckoutController@checkout');
Route::post('/save-checkout-customer','CheckoutController@save_checkout_customer');
Route::get('/payment','CheckoutController@payment');

//order
Route::get('/manage-order','CheckoutController@manage_order');
Route::get('/delete-order/{orderId}','CheckoutController@delete_order');
Route::get('/view-order/{order_Id}','CheckoutController@view_order');

