<!DOCTYPE html>
<html lang="en">
    <head>
        <base href="/public">
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Details</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="detail-page/css/styles.css" rel="stylesheet" />
        <!-- bootstrap core css -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
        <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
        <!-- font awesome style -->
        <link href="home/css/font-awesome.min.css" rel="stylesheet" />
        <!-- Custom styles for this template -->
        <link href="home/css/style.css" rel="stylesheet" />
        <!-- responsive style -->
        <link href="home/css/responsive.css" rel="stylesheet" />
    </head>
    <body>
        <div class="hero_area">
            <!-- header section strats -->
               @include('home.header')
            <!-- end header section -->
        <!-- Product section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 my-5">
                @if (session()->has('message'))
                <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                {{session()->get('message')}}
                </div>
                @endif
                <?php
                    $product=session('product');
                ?>
                <div class="row gx-4 gx-lg-5 align-items-center">
                    <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="product/{{$product->image}}" alt="..." /></div>
                    <div class="col-md-6">
                        <div class="small mb-1">{{$product->category}} : {{$product->id}}</div>
                        <h1 class="display-5 fw-bolder">{{$product->title}}</h1>
                        <div class="fs-5 mb-2 mt-2 ">
                            <span>Price: </span>
                            @if($product->discount_price !=null)
                            <span class="text-decoration-line-through">${{$product->price}}</span> - 
                            <span>${{$product->discount_price}}</span>
                            @else
                            <span>${{$product->price}}</span>
                            @endif
                        </div>
                        <p class="lead text-uppercase-before-dot">{{$product->description}}</p>
                        @if($product->quantity == 0)
                        <span>Quantity: Sold Out</span>
                        @else
                        <span>Quantity: {{$product->quantity}}</span>
                        @endif
                        <form action="{{url('add_cart',$product->id)}}" method="post">
                            @csrf
                            <div class="d-flex">
                                <input  <?php echo $product->quantity == 0 ? "disabled" : ""; ?>  class="form-control text-center me-3" name="quantity" id="inputQuantity" type="num" value="1" min="1"style="max-width: 3rem" />
                                <button <?php echo $product->quantity == 0 ? "disabled" : ""; ?> class="btn btn-outline-dark flex-shrink-0 <?php echo $product->quantity == 0 ? "disabled-btn" : ''; ?>" "  type="submit">
                                    <i class="bi-cart-fill me-1"></i>
                                    Add to cart
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </section>
        <!-- Related items section-->
        <section class="py-5 bg-light">
            <div class="container px-4 px-lg-5 mt-5">
                <h2 class="fw-bolder mb-4">Related products</h2>
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    @foreach($related as $relateproduct)
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="product/{{$relateproduct->image}}" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">{{$relateproduct->title}}</h5>
                                    <!-- Product price-->
                                    @if($relateproduct->discount_price !=null)
                                    <span>Price: </span>
                                    <span class="text-decoration-line-through">${{$relateproduct->price}}</span> - 
                                    <span>${{$relateproduct->discount_price}}</span>
                                    @else
                                    <span>Price: </span>
                                    <span>${{$relateproduct->price}}</span>
                                    @endif
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <form action="{{url('product_details')}}" method="get"></form>
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="{{url('product_details',$relateproduct->id)}}">View options</a></div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
         <!-- footer start -->
         @include('home.footer')
         <!-- footer end -->
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="detail-page/js/scripts.js"></script>
        <script src="home/js/jquery-3.4.1.min.js"></script>
        <!-- popper js -->
        <script src="home/js/popper.min.js"></script>
        <!-- bootstrap js -->
        <script src="home/js/bootstrap.js"></script>
        <!-- custom js -->
        <script src="home/js/custom.js"></script>
        <script src="https://kit.fontawesome.com/7ab09b7a32.js" crossorigin="anonymous"></script>
    </body>
</html>
