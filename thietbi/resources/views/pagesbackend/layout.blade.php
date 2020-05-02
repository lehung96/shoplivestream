<!DOCTYPE html>
<html lang="en">

@include('pagesbackend.head')
<body>
<section id="container">
    @include('pagesbackend.header')
    @include('pagesbackend.menu')

 <section id="main-content">
    <section class="wrapper">
    @yield("main_content")
    </section>


    @include('pagesbackend.footer')
    </section>
</section>
@include('pagesbackend.script')
</body>

</html>


