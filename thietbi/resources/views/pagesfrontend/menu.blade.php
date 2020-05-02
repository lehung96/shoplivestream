<div class="col-md-3  "  >
    <div class="box-left box-menu"  >
        <h3 class="box-title"><i class="fa fa-list"></i> Danh mục Sản Phẩm</h3>
        @foreach($cate_product as $key=>$cate)
            <ul>

                <li>
                    <a href="{{URL::to('/danh-muc-san-pham/'.$cate->category_id)}}" style="color: red;font-size: 15px">{{$cate->category_name}}  <span class="badge pull-right"></span></a>
                </li>

            </ul>
        @endforeach
    </div>

    <div class="box-left box-menu">
        <h3 class="box-title"><i class="fa fa-table"></i>Hướng dẫn lắp đặt</h3>
        <!--  <marquee direction="down" onmouseover="this.stop()" onmouseout="this.start()"  > -->
        <ul>
            @foreach(  $product_questions as $key => $qy)
                    <li class="clearfix">
                        <a href="{{URL::to('/chi-tiet-huong-dan/'.$qy->question_id)}}">
                            <img src="{{URL::to('public/uploads/products/'.$qy->question_image)}}" class="" width="80" height="80">
                            <div class="info pull-right">
                                <p class="name"> {{$qy->question_name}}</p >
                            </div>
                        </a>
                    </li>
            @endforeach
        </ul>
        <!-- </marquee> -->
    </div>

    <div class="box-left box-menu">
        <h3 class="box-title"><i class="fa fa-linkedin-square"></i> Liên kết hữu ích</h3>
        <!--  <marquee direction="down" onmouseover="this.stop()" onmouseout="this.start()"  > -->

            <ul>
        @foreach($us_abouts as $key=> $a)
                <li>
                    <i class="fa fa-angle-double-right"></i>
                    <a href="{{URL::to('/chi-tiet-lien-ket/'.$a->about_id)}}"><i></i>{{$a->about_name}} </a>
                </li>
        @endforeach
            </ul>

        <!-- </marquee> -->
    </div>
</div>
