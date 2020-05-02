@extends('pagesfrontend.layout')
@section('main_content')
    <section class="box-main1">
        @foreach($category_name as $key => $name)
        <h3 class="title-main" style="text-align: center;"><a href="javascript:void(0)"> {{$name->category_name}} </a> </h3>
        @endforeach
        @foreach($category_by_id as $key => $product)
            <div class="showitem">
                <div class="col-md-4 item-product bor">
                    <a href="">
                        <img style="width:245px;height: 245px " src="{{URL::to('public/uploads/products/'.$product->product_image)}}">
                    </a>
                    <div class="info-item">
                        <a href="{{URL::to('/chi-tiet-san-pham/'.$product->product_id)}}">{{$product->product_name}}</a>
                        <p><strike class="sale"></strike>Gía: <b class="price">{{number_format($product->product_price).' '.'Đ'}}</b></p>
                    </div>
                    <div class="hidenitem">
                        <p><a href=""><i class="fa fa-search"></i></a></p>
                        <p><a href=""><i class="fa fa-heart"></i></a></p>
                        <p><a href=""><i class="fa fa-shopping-basket"></i></a></p>
                    </div>
                </div>
            </div>
        @endforeach
    </section>
@endsection

