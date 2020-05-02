<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!---Seo--->
    <meta name="description" content="{{$category_desc}}">
    <meta name="author" content="">
    <meta name="keywords" content="{{$meta_keywords}}"/>
    <meta name="robots" content="INDEX,FOLLOW"/>
    <link  rel="canonical" href="{{$url_canonical}}" />
    <link  rel="icon" type="image/x-icon" href="" />
    <!--- end Seo--->
    <title>{{$meta_title}}</title>

    <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/bootstrap.min.css')}}">

    <script  src="{{asset('public/frontend/js/jquery-3.2.1.min.js')}}"></script>
    <script  src="{{asset('public/frontend/js/bootstrap.min.js')}}"></script>
    <!---->
    <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/slick.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/slick-theme.css')}}"/>
    <!--slide-->
    <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/style.css')}}">
    <link rel=”stylesheet” href=”https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css”>
    <!-- cart-->
    <link href="{{asset('public/frontend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/main.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/responsive.css')}}" rel="stylesheet">

    <!--[if lt IE 9]>
    <script src="{{asset('public/frontend/js/html5shiv.js')}}"></script>
    <script src="{{asset('public/frontend/js/respond.min.js')}}"></script>
    <![endif]-->
    <link rel="shortcut icon" href="{{asset('public/frontend/images/ico/favicon.ico')}}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{asset('public/frontend/images/ico/apple-touch-icon-144-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{asset('public/frontend/images/ico/apple-touch-icon-114-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{asset('public/frontend/images/ico/apple-touch-icon-72-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" href="{{asset('public/frontend/images/ico/apple-touch-icon-57-precomposed.png')}}">

    <style>
        * {
            box-sizing:border-box
        }
        h2 {
            text-align: center;
        }
        /* Slideshow container */
        .slideshow-container {
            max-width: 500px;
            position: relative;
            margin-left:0px ;
            margin-right:0px;

        }
        /* Ẩn các slider */
        .mySlides {
            display: none;
        }
        /* Định dạng nội dung Caption */
        .text {
            color: #f2f2f2;
            font-size: 15px;
            padding: 8px 12px;
            position: absolute;
            bottom: 8px;
            width: 100%;
            text-align: center;
        }

        /* định dạng các chấm chuyển đổi các slide */
        .dot {
            cursor:pointer;
            height: 13px;
            width: 13px;
            margin: 0 2px;
            background-color: #bbb;
            border-radius: 50%;
            display: inline-block;
            transition: background-color 0.6s ease;
        }
        /* khi được hover, active đổi màu nền */
        .active, .dot:hover {
            background-color: #717171;
        }

        /* Thêm hiệu ứng khi chuyển đổi các slide */
        .fade {
            -webkit-animation-name: fade;
            -webkit-animation-duration: 3s;
            animation-name: fade;
            animation-duration: 3s;
        }

        @-webkit-keyframes fade {
            from {opacity: .4}
            to {opacity: 1}
        }

        @keyframes fade {
            from {opacity: .4}
            to {opacity: 1}
        }
    </style>


</head>
