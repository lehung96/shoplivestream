@extends('pagesbackend.layout')
@section('main_content')


    <section class="panel">
        <header class="panel-heading">
            Thêm Hướng dẫn lắp đặt
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
                <form role="form" action="{{URL::to('/save-questions')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tên Hướng dẫn</label>
                        <input type="text" name="question_name" class="form-control" id="exampleInputEmail1" placeholder="Tên hướng dẫn">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Hình ảnh Sản phẩm</label>
                        <input type="file" name="question_image" class="form-control" id="exampleInputEmail1" >
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Mô tả hướng dẫn </label>
                        <textarea style="resize: none" rows="8" class="form-control" name="category_desc" id="editor1"placeholder="Mô tả sản phẩm"></textarea>
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Từ khóa hướng dẫn</label>
                            <textarea style="resize: none" rows="8" class="form-control" name="question_keywords" id="exampleInputPassword1" placeholder="Mô tả danh mục"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên danh mục hướng dẫn</label>
                            <input type="text" name="category_name" class="form-control" id="exampleInputEmail1" placeholder="Tên hướng dẫn">
                        </div>
                        <label for="exampleInputPassword1">Nội dung hướng dẫn</label>
                        <textarea style="resize: none" rows="8" class="form-control" name="question_content" id="exampleInputPassword1" placeholder="nội dung Hướng dẫn"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Hiển thị</label>
                        <select name="question_status" class="form-control input-sm m-bot15">
                            <option value="0">ẩn</option>
                            <option value="1">Hiển thị</option>
                        </select>
                    </div>

                    <button type="submit" name="add_product" class="btn btn-info">Thêm Hướng dẫn</button>
                </form>
            </div>

        </div>
    </section>
@endsection


