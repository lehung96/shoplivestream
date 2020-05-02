@extends('pagesbackend.layout')
@section('main_content')

    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                Liệt Kê các liên kết hữu ích
            </div>
            {{--            <div class="row w3-res-tb">--}}
            {{--                <div class="col-sm-5 m-b-xs">--}}
            {{--                    <select class="input-sm form-control w-sm inline v-middle">--}}
            {{--                        <option value="0">Bulk action</option>--}}
            {{--                        <option value="1">Delete selected</option>--}}
            {{--                        <option value="2">Bulk edit</option>--}}
            {{--                        <option value="3">Export</option>--}}
            {{--                    </select>--}}
            {{--                    <button class="btn btn-sm btn-default">Apply</button>--}}
            {{--                </div>--}}
            {{--                <div class="col-sm-4">--}}
            {{--                </div>--}}
            {{--                <div class="col-sm-3">--}}
            {{--                    <div class="input-group">--}}
            {{--                        <input type="text" class="input-sm form-control" placeholder="Search">--}}
            {{--                        <span class="input-group-btn">--}}
            {{--            <button class="btn btn-sm btn-default" type="button">Tìm kiếm</button>--}}
            {{--          </span>--}}
            {{--                    </div>--}}
            {{--                </div>--}}
            {{--            </div>--}}
            <div class="table-responsive">
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
                <table class="table table-striped b-t b-light">
                    <thead>
                    <tr>
                        <th style="width:20px;">
                            <label class="i-checks m-b-none">
                                <input type="checkbox"><i></i>
                            </label>
                        </th>
                        <th>Tên liên kết hữu ích</th>
                        <th>Hình ảnh liên kết</th>
                        <th>Nội dung</th>
                        <th style="width:30px;"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach( $all_about as $key =>$ab)
                        <tr>
                            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
                            <td>{{$ab->about_name}}</td>
                            <td><img src="{{URL::to('public/uploads/products/'.$ab->about_image)}}" height="100px" width="150px" ></td>
                            <td>{{$ab->about_content}}</td>


                            <td>
                                <a href="{{URL::to('/edit-about/'.$ab->about_id)}}" class="active" ui-toggle-class="">
                                    <i style="font-size: 20px" class="fa fa-pencil-square-o text-success text-active"></i></a>
                                <a onclick="return confirm('Bạn có chắc muốn xóa liên kết hữu ích này ko này không?')" href="{{URL::to('/delete-about/'.$ab->about_id)}}" class="active" ui-toggle-class="">
                                    <i style="font-size: 20px" class="fa fa-times text-danger text"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>

            {{--            <footer class="panel-footer">--}}
            {{--                <div class="row">--}}

            {{--                    <div class="col-sm-5 text-center">--}}
            {{--                        <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>--}}
            {{--                    </div>--}}
            {{--                    <div class="col-sm-7 text-right text-center-xs">--}}
            {{--                        <ul class="pagination pagination-sm m-t-none m-b-none">--}}
            {{--                            <li><a href=""><i class="fa fa-chevron-left"></i></a></li>--}}
            {{--                            <li><a href="">1</a></li>--}}
            {{--                            <li><a href="">2</a></li>--}}
            {{--                            <li><a href="">3</a></li>--}}
            {{--                            <li><a href="">4</a></li>--}}
            {{--                            <li><a href=""><i class="fa fa-chevron-right"></i></a></li>--}}
            {{--                        </ul>--}}
            {{--                    </div>--}}
            {{--                </div>--}}
            {{--            </footer>--}}
        </div>
    </div>
@endsection



