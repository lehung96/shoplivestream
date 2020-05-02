@extends('pagesbackend.layout')
@section('main_content')


    <section class="panel">
        <header class="panel-heading">
            Thêm Sản phẩm
        </header>
        <div class="panel-body">
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
            <div class="position-center">
                <form role="form" action="{{URL::to('/save-products')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tên Sản phẩm</label>
                        <input type="text" name="product_name" class="form-control" id="exampleInputEmail1" placeholder="Tên sản phẩm">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Gía Sản phẩm</label>
                        <input type="text" name="product_price" class="form-control" id="exampleInputEmail1" placeholder="Gía sản phẩm">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Hình ảnh Sản phẩm</label>
                        <input type="file" name="product_image" class="form-control" id="exampleInputEmail1" >
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Mô tả sản phẩm</label>
                        <textarea style="resize: none" rows="8" class="form-control" name="product_desc" id="editor1"placeholder="Mô tả sản phẩm"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Nội dung sản phẩm</label>
                        <textarea style="resize: none" rows="8" class="form-control" name="product_content" id="exampleInputPassword1" placeholder="nội dung sản phẩm"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Danh mục sản phẩm</label>
                        <select name="product_cate" class="form-control input-sm m-bot15">
                            @foreach($cate_product as $key=> $cate)
                            <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Hiển thị</label>
                        <select name="product_status" class="form-control input-sm m-bot15">
                            <option value="0">ẩn</option>
                            <option value="1">Hiển thị</option>
                        </select>
                    </div>

                    <button type="submit" name="add_product" class="btn btn-info">Thêm sản phẩm</button>
                </form>
            </div>

        </div>
    </section>
@endsection

