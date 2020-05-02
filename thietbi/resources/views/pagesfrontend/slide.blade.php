<section id="slide" class="text-center" >
    <div class="slideshow-container">

        <div class="mySlides fade">
            <img src="{{asset('public/frontend/images/anhbia1.jpg')}}" style="width:850.5px;height: 350.82px;">
            {{--            <div class="text">Nội dung caption của slide thứ 2!</div>--}}
        </div>
        <div class="mySlides fade">
            <img src="{{asset('public/frontend/images/slide1.jpg')}}" style="width:850.5px;height: 350.82px">
{{--            <div class="text">Nội dung caption của slide đầu tiên!</div>--}}
        </div>
        <div class="mySlides fade">
            <img src="{{asset('public/frontend/images/anhbia.jpg')}}" style="width:850.5px;height: 350.82px;">
{{--            <div class="text">Nội dung caption của slide thứ 3!</div>--}}
        </div>
    </div>
    <br>

    <div style="text-align:center">
        <span class="dot" onclick="currentSlide(0)"></span>
        <span class="dot" onclick="currentSlide(1)"></span>
        <span class="dot" onclick="currentSlide(2)"></span>
    </div>
</section>
