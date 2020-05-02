@extends('pagesbackend.layout')
@section('main_content')
    <section class="panel">
        <header class="panel-heading">
            Cập nhật Hướng dẫn sản phẩm
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
                @foreach($edit_question as $key=>$qu)
                    <form role="form" action="{{URL::to('/update-questions/'.$qu->question_id)}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên hướng dẫn</label>
                            <input type="text" name="question_name" class="form-control" id="exampleInputEmail1" value="{{$qu->question_name}}">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Hình ảnh Sản phẩm hướng dẫn lắp đặt</label>
                            <input type="file" name="question_image" class="form-control" id="exampleInputEmail1" >
                            <img src="{{URL::to('public/uploads/products/'.$qu->question_image)}}" width="100" height="100">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả hướng dẫn </label>
                            <textarea style="resize: none" rows="8" class="form-control" name="category_desc" id="exampleInputPassword1" >{{$qu->category_desc}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Từ khóa hướng dẫn </label>
                            <textarea style="resize: none" rows="8" class="form-control" name="category_product_keywords" id="exampleInputPassword1" placeholder="Mô tả danh mục">{{$qu->meta_keywords}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên hướng dẫn</label>
                            <input type="text" name="category_name" class="form-control" id="exampleInputEmail1" value="{{$qu->category_name}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Nội dung hướng dẫn </label>
                            <textarea style="resize: none" rows="8" class="form-control" name="question_content" id="exampleInputPassword1">{{$qu->question_content}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Hiển thị</label>
                            <select name="question_status" class="form-control input-sm m-bot15">
                                <option value="0">ẩn</option>
                                <option value="1">Hiển thị</option>
                            </select>
                        </div>

                        <button type="submit" name="update_question" class="btn btn-info">Cập nhật hướng dẫn </button>
                    </form>
                @endforeach
            </div>

        </div>
    </section>
@endsection





