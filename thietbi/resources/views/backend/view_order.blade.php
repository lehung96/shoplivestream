@extends('pagesbackend.layout')
@section('main_content')

    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                Thông tin khách hàng
            </div>

            <div class="table-responsive">
                <?php
                $message = Session::get('message');
                if ($message){
                    echo '<span class="text-alert" style="color: red;
                    font-size: 16px;
                    width: 100%;
                    text-align: center;
                    font-weight: bold;" >',$message.'</span>';
                    Session::put('message',null);
                }

                ?>

                <table class="table table-striped b-t b-light">
                    <thead>
                    <tr>
                        <th>Tên khách hàng</th>
                        <th>Số điện thoại</th>
                        <th style="width:30px;"></th>
                    </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td>{{$order_by_id->customer_name}}</td>
                            <td>{{$order_by_id->customer_phone}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<br>
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                Thông tin vận chuyển
            </div>

            <div class="table-responsive">
                <?php
                $message = Session::get('message');
                if ($message){
                    echo '<span class="text-alert" style="color: red;
                    font-size: 16px;
                    width: 100%;
                    text-align: center;
                    font-weight: bold;" >',$message.'</span>';
                    Session::put('message',null);
                }

                ?>

                <table class="table table-striped b-t b-light">
                    <thead>
                    <tr>
                        <th>Tên Người vận chuyển</th>
                        <th>Địa chỉ</th>
                        <th>Số điện thoại</th>
                        <th style="width:30px;"></th>
                    </tr>
                    </thead>
                    <tbody>

                    <tr>
                        <td>{{$order_by_id->shipping_name}}</td>
                        <td>{{$order_by_id->shipping_address}}</td>
                        <td>{{$order_by_id->shipping_phone}}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
 <br><br>
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                Liệt Kê Chi Tiết Đơn Hàng
            </div>

            <div class="table-responsive">
                <?php
                $message = Session::get('message');
                if ($message){
                    echo '<span class="text-alert" style="color: red;
                    font-size: 16px;
                    width: 100%;
                    text-align: center;
                    font-weight: bold;" >',$message.'</span>';
                    Session::put('message',null);
                }

                ?>

                <table class="table table-striped b-t b-light">
                    <thead>
                    <tr>
                        <th>Tên Sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Gía</th>
                        <th>Tổng tiền</th>

                        <th style="width:30px;"></th>
                    </tr>
                    </thead>
                    <tbody>

                    <tr>
                        <td>{{$order_by_id->product_name}}</td>
                        <td>{{$order_by_id->product_sales_quantity}}</td>
                        <td>{{$order_by_id->product_price}}</td>
                        <td>{{$order_by_id->product_price*$order_by_id->product_sales_quantity}}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <footer class="panel-footer">
                <div class="row">

                    <div class="col-sm-5 text-center">
                        <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
                    </div>
                    <div class="col-sm-7 text-right text-center-xs">
                        <ul class="pagination pagination-sm m-t-none m-b-none">
                            <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
                            <li><a href="">1</a></li>
                            <li><a href="">2</a></li>
                            <li><a href="">3</a></li>
                            <li><a href="">4</a></li>
                            <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
                        </ul>
                    </div>
                </div>
            </footer>
        </div>
    </div>
@endsection


