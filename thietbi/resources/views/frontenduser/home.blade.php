@extends('pagesfrontend.layout')
@section('main_content')
            <section class="box-main1">
                <h3 class="title-main" style="text-align: center;"><a href="javascript:void(0)"> Sản Phẩm mới nhất </a> </h3>
                @foreach($all_products as $key => $product)
                <div class="showitem">
                    <div class="col-md-4 item-product bor">
                        <a href="">
                            <img src="{{URL::to('public/uploads/products/'.$product->product_image)}}" class="" width="245" height="245">
                        </a>
                        <div class="info-item">
                            <a href="{{URL::to('/chi-tiet-san-pham/'.$product->product_id)}}">{{$product->product_name}}</a>
                            <p><strike class="sale"></strike>Gía: <b class="price">{{number_format($product->product_price).' '.'Đ'}}</b></p>
                            <div class="fb-share-button" data-href="http://localhost:8080/shoplivestream/thietbi/index" data-layout="button_count" data-size="small">
                                <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{$url_canonical}}http%3A%2F%2Flocalhost%3A8080%2Fshoplivestream%2Fthietbi%2Findex&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Chia sẻ
                                </a></div>
                            <div class="fb-like" data-href="{{$url_canonical}}" data-width="" data-layout="button_count" data-action="like" data-size="small" data-share="false"></div>
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
