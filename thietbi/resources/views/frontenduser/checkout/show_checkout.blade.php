@extends('pagesfrontend.layout')
@section('main_content')
    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs" style="margin-bottom: 15px">
                <ol>
                    <li><a href="{{URL::to('/index')}}" style="font-size: 15px" ><i class="fa fa-home"style="font-size: 15px"></i> Trang chủ</a></li>

                </ol>
            </div><!--/breadcrums-->

            <div class="register-req"style="margin-right:300px">
                <p style="font-size: 15px">Đăng ký hoặc đăng nhập để thanh toán giỏ hàng và xem lại lịch sử mua hàng</p>
            </div><!--/register-req-->

            <div class="shopper-informations"style="margin-right:300px">
                <div class="row">
{{--                    <div class="col-sm-3">--}}
{{--                        <div class="shopper-info">--}}
{{--                            <p>Shopper Information</p>--}}
{{--                            <form>--}}
{{--                                <input type="text" placeholder="Display Name">--}}
{{--                                <input type="text" placeholder="User Name">--}}
{{--                                <input type="password" placeholder="Password">--}}
{{--                                <input type="password" placeholder="Confirm password">--}}
{{--                            </form>--}}
{{--                            <a class="btn btn-primary" style="width: 30px;" href="">Get Quotes</a>--}}
{{--                            <a class="btn btn-primary" style="margin-left: 40px;width: 30px;" href="">Continue</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                    <div class="col-sm-12 clearfix">
                        <div class="bill-to">
                            <p>Điền thông tin gửi hàng </p>
                            <div class="form-one">
                                <form action="{{URL::to('/save-checkout-customer')}}" method="post">
                                    {{csrf_field()}}
                                    <input style="padding-left:9px;" type="text" name="shipping_email" placeholder="Email">
                                    <input type="text" name="shipping_name" placeholder="Họ Và Tên">
                                    <input type="text" name="shipping_address" placeholder="Địa chỉ">
                                    <input type="text" name="shipping_phone" placeholder="Số phone ">
                                    <textarea style="height: 178px;" name="shipping_notes"  placeholder="Ghi chú đơn hàng của bạn" rows="16"></textarea>
                                    <input type="submit" value="Gửi" name="send_order" class="btn btn-primary btn-sm" style=" margin-bottom: 50px;" >
                                </form>
                            </div>
                            <div class="form-two">
{{--                                <form>--}}
{{--                                    <input type="text" placeholder="Zip / Postal Code *">--}}
{{--                                    <select>--}}
{{--                                        <option>-- Country --</option>--}}
{{--                                        <option>United States</option>--}}
{{--                                        <option>Bangladesh</option>--}}
{{--                                        <option>UK</option>--}}
{{--                                        <option>India</option>--}}
{{--                                        <option>Pakistan</option>--}}
{{--                                        <option>Ucrane</option>--}}
{{--                                        <option>Canada</option>--}}
{{--                                        <option>Dubai</option>--}}
{{--                                    </select>--}}
{{--                                    <select>--}}
{{--                                        <option>-- State / Province / Region --</option>--}}
{{--                                        <option>United States</option>--}}
{{--                                        <option>Bangladesh</option>--}}
{{--                                        <option>UK</option>--}}
{{--                                        <option>India</option>--}}
{{--                                        <option>Pakistan</option>--}}
{{--                                        <option>Ucrane</option>--}}
{{--                                        <option>Canada</option>--}}
{{--                                        <option>Dubai</option>--}}
{{--                                    </select>--}}
{{--                                    <input type="password" placeholder="Confirm password">--}}
{{--                                    <input type="text" placeholder="Phone *">--}}
{{--                                    <input type="text" placeholder="Mobile Phone">--}}
{{--                                    <input type="text" placeholder="Fax">--}}
{{--                                </form>--}}
                            </div>
                        </div>
                    </div>

                </div>
            </div>
{{--            <div class="review-payment">--}}
{{--                <h2  style=" margin-left: 200px;">Review & Payment</h2>--}}
{{--            </div>--}}

            <div class="table-responsive cart_info"style="margin-right:300px">
                <p style="font-size: 20px; color: #1f6fb2" > Xem lại giỏ hàng </p>

            </div>

        </div>
    </section> <!--/#cart_items-->
@endsection

