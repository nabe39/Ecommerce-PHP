<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <title>OrderPiece</title>
    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
    <!-- font awesome style -->
    <link href="home/css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="home/css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="home/css/responsive.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>

<body>
    <div hidden id="scrollButton" onclick="handleClickScroll()" style="z-index: 1000; position: fixed; width: 50px; height: 50px; border-radius: 50%; right: 5%; bottom: 5%; border: 1px solid gray; display: grid; place-items: center; cursor: pointer; background-color: white"><i style="font-size: 24px" class="bi bi-arrow-up"></i></div>
    <?php
    $topSaleProducts =session('topSaleProducts');
    $categories =session('categories');
    $product =session('product');
    ?>
    <div class="hero_area">
        <!-- header section strats -->
        @include('home.header')
        <!-- end header section -->

        <!-- slider section -->
        @include('home.slider')
        <!-- end slider section -->
    </div>
    <!-- why section -->
    @include('home.why')
    <!-- end why section -->

    <!-- arrival section -->
    @include('home.new_arival')
    <!-- end arrival section -->

    <!-- product section -->
    {{-- top product --}}
    @include('home.data.product_top')
    {{-- our product --}}
    <div id="product">
        @include('home.data.product')
    </div>

    <!-- end product section -->

    <!-- footer start -->
    @include('home.footer')
    <!-- footer end -->
   
    <!-- jQery -->


    <script src="home/js/jquery-3.4.1.min.js"></script>
    <!-- popper js -->
    <script src="home/js/popper.min.js"></script>
    <!-- bootstrap js -->
    <script src="home/js/bootstrap.js"></script>

    <!-- custom js -->
    <script src="home/js/carousel.js"></script>
    <script src="home/js/custom.js"></script>

    <script src="https://kit.fontawesome.com/7ab09b7a32.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>   
</body>

</html>

<script>
   function handleClickScroll () {
    window.scrollTo({ top: 0, behavior: 'smooth' });
   }
        window.onscroll = function (){
            var scrollButton = document.getElementById("scrollButton");
            var scrollPosition = window.pageYOffset;
            if(scrollPosition > 100) {
                scrollButton.removeAttribute("hidden")
            } else {
                scrollButton.setAttribute("hidden", true)
            }
        }
</script>