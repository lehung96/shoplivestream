@extends('pagesfrontend.layout')
@section('main_content')


    <section id="cart_items">
    <div class="container">
        <div class="breadcrumbs" >
            <ol>
             <li><a href="{{URL::to('/index')}}" style="font-size: 15px" ><i class="fa fa-home"style="font-size: 15px"></i> Trang chủ</a></li>

            </ol>
        </div>
        <div class="table-responsive cart_info"  style="margin-right:300px;  margin-left: 2px;" >
            <?php
            $content= Cart::content();
            ?>
            <table class="table table-condensed">
                <thead>
                <tr class="cart_menu" >
                    <td class="image" style="font-size: 20px">Hình ảnh</td>
                    <td class="description"style="font-size: 20px">Tên Sản Phẩm</td>
                    <td class="price"style="font-size: 20px">Gía</td>
                    <td class="quantity"style="font-size: 20px">Số Lượng</td>
                    <td class="total"style="font-size: 20px">Tổng tiền</td>
                    <td></td>
                </tr>
                </thead>
                <tbody>
                @foreach($content as $v_content)
                <tr>
                    <td class="cart_product">
                        <a href=""><img src="{{URL::to('public/uploads/products/'.$v_content->options->image)}}" class="" width="100" height="100"></a>
                    </td>
                    <td class="cart_description">
                        <h4><a href="">{{$v_content->name}}</a></h4>
                        <p>Web ID: 1089772</p>
                    </td>
                    <td class="cart_price">
                        <p>{{number_format($v_content->price).' '.'vnd'}}</p>
                    </td>
                    <td class="cart_quantity">
                        <div class="cart_quantity_button">
                        <form action="{{URL::to('/update-cart-quantity')}}" method="post">
                            {{csrf_field()}}
                            <input  style="width: 90px" class="cart_quantity_input" type="text" name="cart_quantity" value="{{$v_content->qty}}">
                            <input type="hidden" value="{{$v_content->rowId}}" name="rowId_cart" class="form-control" style="width: 90px;height: 27.5px">
                           <input type="submit" value="cập nhật" name="update_qty" class="btn btn-default btn-sm" style="height: 27.5px">
                        </form>
                        </div>
                    </td>
                    <td class="cart_total">
                        <p class="cart_total_price">
                            <?php
                            $subtotal= $v_content->price*$v_content->qty;
                            echo number_format($subtotal).' '.'vnd';
                            ?>
                        </p>
                    </td>
                    <td class="cart_delete">
                        <a class="cart_quantity_delete" href="{{URL::to('/delete-to-cart/'.$v_content->rowId)}}"><i class="fa fa-times"></i></a>
                    </td>
                </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    </section> <!--/#cart_items-->

    <section id="do_action">
    <div class="container" >

        <div class="row" style="margin-right:50px">

            <div class="col-sm-6">
                <div class="total_area" style="padding-left: 20px ">
                    <ul>
                        <li>Tổng <span>{{(Cart::total()).' '.'vnd'}}</span></li>
{{--                        <li>Thuế <span>{{(Cart::tax()).' '.'vnd'}}</span></li>--}}
                        <li>Phí vận chuyển<span>30.000 vnd </span></li>
                        <li>Thành tiền <span>{{(Cart::total()).' '.'vnd'}}</span></li>
                    </ul>
                    <?php
                    $customer_id =Session::get('customer_id');
                    if($customer_id!=NULL){// khi đăng nhập vào trang checkout
                    ?>
                        <a class="btn btn-default check_out" href="{{URL::to('/checkout')}}">Thanh Toán </a>
                    <?php
                    }else{// còn không thì đến trang login-checkout
                    ?>
                    <a class="btn btn-default check_out" href="{{URL::to('/login-checkout')}}">Thanh Toán </a>
                    <?php
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>
    </section><!--/#do_action-->


@endsection
