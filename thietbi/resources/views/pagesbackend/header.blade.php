<header class="header fixed-top clearfix">
    <!--logo start-->
    <div class="brand">
        <a href="index.html" class="logo">
            Quản Lý
        </a>
        <div class="sidebar-toggle-box">
            <div class="fa fa-bars"></div>
        </div>
    </div>
    <!--logo end-->

    <div class="top-nav clearfix">
        <!--search & user info start-->
        <ul class="nav pull-right top-menu">

                <form  action="{{URL::to('/search')}}" method="post" class="navbar navbar-left" role="search">
                    {{csrf_field()}}
                    <input  style=" width:350px; height: 42px;background:white;border-style:outset;font-size: 12pt;color: #1b1e21" type="search" id="search " name="keywords_submit" placeholder="Tìm kiếm" />
                    <button style="width:39px;height:41px;background:#8f8f9b;padding-top: 8px;padding-bottom: 5px " class="icon"><i class="fa fa-search" ></i></button>
                </form>

            <!-- user login dropdown start-->
            <li class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                    <img alt="" src="{{asset('public/backend/images/2.png')}}">
                    <span class="username">

                        <?php
                        $name = Session::get('admin_name');
                        if ($name){
                            echo $name;
                        }

                        ?>
                    </span>
                    <b class="caret"></b>
                </a>
                <ul class="dropdown-menu extended logout">
                    <li><a href="#"><i class=" fa fa-suitcase"></i>Profile</a></li>
                    <li><a href="#"><i class="fa fa-cog"></i> Cài đặt</a></li>
                    <li><a href="{{URL::to('/logout')}}"><i class="fa fa-key"></i> Đăng xuất</a></li>
                </ul>
            </li>
            <!-- user login dropdown end -->

        </ul>
        <!--search & user info end-->
    </div>
</header>
