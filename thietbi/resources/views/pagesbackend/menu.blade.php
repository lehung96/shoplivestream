<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <li>
                    <a class="active" href="{{URL::to('/dashboard')}}">
                        <i class="fa fa-dashboard"></i>
                        <span>Tổng quan</span>
                    </a>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Đơn Hàng </span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{URL::to('/manage-order')}}">Quản lý đơn hàng </a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Liên kết hữu ích </span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{URL::to('/add-about')}}">thêm liên kết hữu ích </a></li>
                        <li><a href="{{URL::to('/all-about')}}">danh sách liên kết hữu ích </a></li>
                    </ul>
                </li>

                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Danh mục sản Phẩm</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{URL::to('/add-category-products')}}">Thêm danh mục sản phẩm</a></li>
                        <li><a href="{{URL::to('/all-category-products')}}">Liệt kê danh mục sản phẩm</a></li>
                    </ul>
                </li>

                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span> Sản Phẩm</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{URL::to('/add-products')}}">Thêm sản phẩm</a></li>
                        <li><a href="{{URL::to('/all-products')}}">Liệt kê sản phẩm</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span> Hướng dẫn lắp đặt thiết bị</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{URL::to('/add-questions')}}">Thêm hướng dẫn</a></li>
                        <li><a href="{{URL::to('/all-questions')}}">Liệt hướng dẫn</a></li>
                    </ul>
                </li>


            </ul>            </div>
        <!-- sidebar menu end-->
    </div>
</aside>
