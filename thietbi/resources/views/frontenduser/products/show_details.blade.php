@extends('pagesfrontend.layout')
@section('main_content')
    <h2  style="margin-top: 15px" class="title text-center">Chi tiết sản phẩm</h2>
    <div class="breadcrumbs" >
        <ol>
            <li><a href="{{URL::to('/index')}}" style="font-size: 15px" ><i class="fa fa-home"style="font-size: 15px"></i> Trang chủ</a></li>

        </ol>
    </div>
    <div class="col-md-10 bor">
        <section class="box-main1" >
            @foreach($product_details as $key => $value)
            <div class="col-md-8 text-center">
                <img style="width: 100%; height: 330px" src="{{URL::to('public/uploads/products/'.$value->product_image)}}" class="img-responsive bor" id="imgmain" width="600" height="600" data-zoom-image="images/16-270x270.png">

{{--                <ul class="text-center bor clearfix" id="imgdetail">--}}
{{--                    <li>--}}
{{--                        <img src="{{asset('public/frontend/images/sp1.png')}}" class="img-responsive pull-left" width="80" height="80">--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <img src="{{asset('public/frontend/images/sp1.png')}}" class="img-responsive pull-left" width="80" height="80">--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <img src="{{asset('public/frontend/images/sp1.png')}}" class="img-responsive pull-left" width="80" height="80">--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <img src="{{asset('public/frontend/images/sp1.png')}}" class="img-responsive pull-left" width="80" height="80">--}}
{{--                    </li>--}}

{{--                </ul>--}}
            </div>
            <div class="col-md-4 bor" style="margin-top: 20px;padding: 30px;">
                <ul id="right">
                    <li><h3> {{$value->product_name}} </h3></li>
                    <li><p>Mã ID: {{$value->product_id}}</p> </li>
                    <form action="{{URL::to('/save-cart')}}" method="post">
                    {{csrf_field()}}
                    <li><span>
                            <span class="price"><strike class="sale"></strike> Gía: <b class="price">{{number_format($value->product_price).' '.'Đ'}}</b></span>
                             <label>Số Lượng: <input type="number" value="1" name="qty" min="1" max="10"></label>
                            <input type="hidden" value="{{$value->product_id}}" name="productid_hidden">
                            <button type="submit" class="btn btn-default"> <i class="fa fa-shopping-basket"></i>Thêm Giỏ Hàng</button>
                        </span>
                    </li>
                    </form>
                    <p ><b>Tình trạng: </b> Còn Hàng</p>
                    <p ><b>Điều kiện: </b>Mới 100%</p>
                    <h3>Mô tả sản phẩm</h3>
                    <p>{{$value->product_desc}}</p>
                    <h3>Nội dung</h3>
                    <p>{!! $value->product_content !!}</p>
                </ul>
            </div>
            @endforeach
        </section>
        <div class="fb-comments" data-href="{{$url_canonical}}" data-numposts="5" data-width=""></div>
        <div class="fb-page" data-href="https://www.facebook.com/CMThietbiLivestream/?epa=SEARCH_BOX" data-tabs="messge" data-width="" data-height="" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/CMThietbiLivestream/?epa=SEARCH_BOX" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/CMThietbiLivestream/?epa=SEARCH_BOX">CM Thiết bị Livestream</a></blockquote></div>
{{--        <div class="col-md-12" id="tabdetail">--}}
{{--            <div class="row">--}}

{{--                <ul class="nav nav-tabs">--}}
{{--                    <li class="active"><a data-toggle="tab" href="#home">Mô tả sản phẩm </a></li>--}}
{{--                    <li><a data-toggle="tab" href="#menu1">Thông tin khác </a></li>--}}
{{--                    <li><a data-toggle="tab" href="#menu2">Menu 2</a></li>--}}
{{--                    <li><a data-toggle="tab" href="#menu3">Menu 3</a></li>--}}
{{--                </ul>--}}
{{--                <div class="tab-content">--}}
{{--                    <div id="home" class="tab-pane fade in active">--}}

{{--                    </div>--}}
{{--                    <div id="menu1" class="tab-pane fade">--}}
{{--                        <h3> Thông tin khác </h3>--}}
{{--                        <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>--}}
{{--                    </div>--}}
{{--                    <div id="menu2" class="tab-pane fade">--}}
{{--                        <h3>Menu 2</h3>--}}
{{--                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>--}}
{{--                    </div>--}}
{{--                    <div id="menu3" class="tab-pane fade">--}}
{{--                        <h3>Menu 3</h3>--}}
{{--                        <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
    </div>
@endsection
