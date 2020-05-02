@extends('pagesfrontend.layout')
@section('main_content')
    <section class="box-main1">
        <h3 class="title-main" style="text-align: center;"><a href="javascript:void(0)"> Kết quả tìm kiếm </a> </h3>
        @foreach($search_product as $key => $product)
            <div class="showitem">
                <div class="col-md-4 item-product bor">
                    <a href="">
                        <img src="{{URL::to('public/uploads/products/'.$product->product_image)}}" class="" width="245" height="245">
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

