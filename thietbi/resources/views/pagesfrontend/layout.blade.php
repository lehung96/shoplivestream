<!DOCTYPE html>
<html lang="en">

@include('pagesfrontend.head')
<body>
<div id="wrapper">
@include('pagesfrontend.header')

<div id="maincontent">
    <div class="container">
        <div class="row">
        @include('pagesfrontend.menu')

        <div class="col-md-9 ">
            @include('pagesfrontend.slide')
            @yield("main_content")
        </div>
        </div>
    </div>
</div>



{{--</div>--}}
@include('pagesfrontend.footer')
</div>
@include('pagesfrontend.script')
</body>

</html>

