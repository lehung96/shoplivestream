<!--HEADER-->
<div id="header">
    <div id="header-top" style="color: white; background-color: red">
        <div class="container">
            <div class="row clearfix" >
                <div class="col-md-6" id="header-text" style="color: white">
                    <a style="color: white;font-size: 15px">CM Thiết bị livestream </a><b style="color: white;font-size: 15px">Phục vụ cho hát Thu âm, Livestream, Karaoke (giải trí) </b>
                </div>
                <div class="col-md-6">
                    <nav id="header-nav-top">
                        <ul class="list-inline pull-right" id="headermenu">
                            <?php
                            $customer_id =Session::get('customer_id');
                            if($customer_id!=NULL){// nếu có đăn ký rồi thì đăng xuất
                            ?>
                            <li>
                                <a href="{{URL::to('/logout-checkout')}}" style="color: white;font-size: 15px;padding-right: 20px;"><i class="fa fa-lock"></i> Đăng Xuất</a>
                            </li>
                                <?php
                                }else{// không có đăng ký thì mình đăng nhập
                                ?>
                                <li>
                                    <a href="{{URL::to('/login-checkout')}}" style="color: white;font-size: 15px;padding-right: 20px;"><i class="fa fa-unlock"></i> Đăng nhập</a>
                                </li>
                                <?php
                                }
                                ?>
                                <?php
                                $customer_id =Session::get('customer_id');
                                $shipping_id =Session::get('shipping_id');
                                if($customer_id!=NULL &&  $shipping_id==NULL){// nếu mà customer ko chống thì tới trang checkout luôn
                                    // thanh toán khi đăng ký thì ko hướng về trang đăng nhập nữa
                                ?>

                                <li>
                                    <a href="{{URL::to('/checkout')}}" style="color: white;font-size: 15px"><i class="fa fa-share-square-o"></i> Thanh toán</a>
                                </li>
                                    <?php
                                    }elseif ($customer_id!=NULL &&  $shipping_id!=NULL){// còn nếu mà rỗng thì mình tới trang login checkout
                                    ?>
                                <li>
                                    <a href="{{URL::to('/payment')}}" style="color: white;font-size: 15px"><i class="fa fa-share-square-o"></i>Thanh toán</a>
                                </li>
                                <?php
                                }else{
                                ?>
                                <li>
                                    <a href="{{URL::to('/login-checkout')}}" style="color: white;font-size: 15px"><i class="fa fa-share-square-o"></i>Thanh toán</a>
                                </li>
                                    <?php
                                    }
                                    ?>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row" id="header-main">
            <div class="col-md-2"style="margin-top: 17px;margin-bottom: 20px">
                <a href="">
                    <img src="{{asset('public/frontend/images/avata.jpg')}}" style="width: 200px;height: 59px;">
                </a>
            </div>
            <div class="col-md-6" style="margin-top: 26px">
{{--                  <div class="container">--}}
{{--                        <form  action="timkiem" method="get" class="navbar navbar-left" role="search">--}}
{{--                            <div  class="input-group">--}}
{{--                                <input type="text"  name="tukhoa" class="form-control" placeholder="Tìm kiếm ">--}}
{{--                                <div class="input-group-btn">--}}
{{--                                    <button class="btn btn-default" type="submit" >--}}
{{--                                    <i class="glyphicon glyphicon-search"></i> </button>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                        </form>--}}
{{--                  </div>--}}
                <div class="box" style="margin-left: 20px;">
                    <div class="container-4">
                        <form  action="{{URL::to('/tim-kiem')}}" method="post" class="navbar navbar-left" role="search">
                            {{csrf_field()}}
                        <input  style=" width:450px; height: 42px;background:white;border-style:outset;font-size: 12pt" type="search" id="search " name="keywords_submit" placeholder="Nhập tên Mic, Sound card, Phụ kiện..." />
                        <button style="width:39px;height:41px;background:#8f8f9b;padding-top: 8px;padding-bottom: 5px " class="icon"><i class="fa fa-search" ></i></button>
                        </form>
                    </div>
                </div>
{{--                <form class="form-inline">--}}
{{--                    <div class="form-group">--}}
{{--                        <label>--}}
{{--                            <select name="category" class="form-control" >--}}
{{--                                <option > Tất cả Danh mục Sản Phẩm</option>--}}
{{--                                <option> Dell </option>--}}
{{--                                <option> Hp </option>--}}
{{--                                <option> Asuc </option>--}}
{{--                                <option> Apper </option>--}}
{{--                            </select>--}}
{{--                        </label>--}}
{{--                        <input type="text" name="keywork" placeholder=" Bạn tìm gì..." class="form-control">--}}
{{--                        <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>--}}
{{--                    </div>--}}
{{--                </form>--}}
            </div>

            <div class="col-md-4" id="header-right">
                <div class="pull-right">
                    <div class="pull-left" style="margin-right:20px">
                        <i class="glyphicon glyphicon-phone-alt"></i>
                    </div>
                    <div class="pull-right">
                        <p id="hotline" style="font-size: 15px"> Giờ làm việc:  9h - 21h00</p>
                        <p>0986420994</p>
                        <a style="font-size: 15px">Địa chỉ:</a> <b>395 Xuân Đỉnh, Hà Nội </b> <br>
                        <a href="https://www.facebook.com/CMThietbiLivestream/?epa=SEARCH_BOX"><i class="fa fa-facebook" style="font-size: 15px;color: #0099FF"></i></a> <b>facebook </b>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
<!--END HEADER-->
<!--MENUNAV-->
<div id="menunav" style="color: white; background-color: yellow">
    <div class="container">
        <nav>
            <div class="home pull-left">
                <a href="{{URL::to('/index')}}" style="color: black; background-color: yellow"><i class="fa fa-home"style="font-size: 15px"></i>Trang chủ</a>
            </div>
            <!--menu main-->
            <ul id="menu-main">
                @foreach($cate_product as $key=>$cate)


                        <li>
                        <a href="{{URL::to('/danh-muc-san-pham/'.$cate->category_id)}}"  style="color: black; background-color: yellow"><i class="fa fa-microphone"style="font-size: 15px" ></i > {{$cate->category_name}}</a>
{{--                            <a href="{{URL::to('/danh-muc-san-pham/'.$cate->category_id)}}" style="color: red;font-size: 15px">{{$cate->category_name}}  <span class="badge pull-right"></span></a>--}}
                        </li>


                @endforeach

{{--                <li>--}}
{{--                    <a href="" style="color: black; background-color: yellow"><i class="fa fa-microchip"style="font-size: 15px" ></i >&nbsp;Sound card</a>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <a href=""style="color: black; background-color: yellow"><i class="fa fa-support"style="font-size: 15px" ></i >&nbsp;Phụ Kiện</a>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <a href=""style="color: black; background-color: yellow"><i class="fa fa-flash"style="font-size: 15px" ></i >&nbsp;Đèn Livestream</a>--}}
{{--                </li>--}}

            </ul>
            <!-- end menu main-->

            <!--Shopping-->
            <ul class="pull-right" id="main-shopping" >
                <li style=" background-color: yellow">
                    <a href="{{URL::to('/show_cart')}}"><i class="fa fa-shopping-cart"></i> Giỏ hàng </a>
                </li>
            </ul>
            <!--end Shopping-->
        </nav>
    </div>
</div>
