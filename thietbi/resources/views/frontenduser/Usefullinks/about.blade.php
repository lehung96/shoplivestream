@extends('pagesfrontend.layout')
@section('main_content')
    <div class="blog-post-area" style="margin-top: 15px">
        <h2 class="title text-center">Chi tiết liên kết hữu ích</h2>
        <div class="breadcrumbs" >
            <ol>
                <li><a href="{{URL::to('/index')}}" style="font-size: 15px" ><i class="fa fa-home"style="font-size: 15px"></i> Trang chủ</a></li>

            </ol>
        </div>
        <div class="single-blog-post">
            @foreach( $details_abouts as $key => $on)
                <h3>{{$on->about_name}}</h3>

                <a href="{{URL::to('/chi-tiet-lien-ket/'.$on->about_id)}}">
                    <img style="width: 636px; height: 330px" src="{{URL::to('public/uploads/products/'.$on->about_image)}}" class="img-responsive bor" id="imgmain" width="600" height="600" data-zoom-image="images/16-270x270.png">
                </a>
                <p>{{$on->about_content}}</p> <br>

{{--                            <p>--}}
{{--                                Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p> <br>--}}

{{--                            <p>--}}
{{--                                Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p> <br>--}}

{{--                            <p>--}}
{{--                                Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.--}}
{{--                            </p>--}}
{{--                            <div class="pager-area">--}}
{{--                                <ul class="pager pull-right">--}}
{{--                                    <li><a href="#">Pre</a></li>--}}
{{--                                    <li><a href="#">Next</a></li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
            @endforeach
        </div>
    </div><!--/blog-post-area-->
@endsection

