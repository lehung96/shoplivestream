@extends('pagesbackend.layout')
@section('main_content')
    <section class="panel">
        <header class="panel-heading">
            Cập nhật liên kết hướng dẫn
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
                @foreach($edit_about as $key=>$qu)
                    <form role="form" action="{{URL::to('/update-about/'.$qu->about_id)}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên liên kết hữu ích </label>
                            <input type="text" name="about_name" class="form-control" id="exampleInputEmail1" value="{{$qu->about_name}}">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Hình ảnh về liên kết hữu ích</label>
                            <input type="file" name="about_image" class="form-control" id="exampleInputEmail1" >
                            <img src="{{URL::to('public/uploads/products/'.$qu->about_image)}}" width="100" height="100">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả liên kết hữu ích </label>
                            <textarea style="resize: none" rows="8" class="form-control" name="category_desc" id="exampleInputPassword1" >{{$qu->category_desc}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Từ khóa liên kết hữu ích</label>
                            <textarea style="resize: none" rows="8" class="form-control" name="about_keywords" id="exampleInputPassword1" placeholder="Mô tả danh mục">{{$qu->meta_keywords}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên danh mục liên kết hữu ích</label>
                            <input type="text" name="category_name" class="form-control" id="exampleInputEmail1" value="{{$qu->category_name}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Nội dung liên kết hữu ích </label>
                            <textarea style="resize: none" rows="8" class="form-control" name="about_content" id="exampleInputPassword1">{{$qu->about_content}}</textarea>
                        </div>

                        <button type="submit" name="update_question" class="btn btn-info">Cập nhật liên kết</button>
                    </form>
                @endforeach
            </div>

        </div>
    </section>
@endsection






