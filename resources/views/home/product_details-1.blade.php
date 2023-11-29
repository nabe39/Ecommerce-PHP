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
    <?php
        $product=session('product');
    ?>
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

                <div class="row gx-4 gx-lg-5 align-items-center">
                    <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="product/{{$product->image}}"
                            alt="..." /></div>
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
                                <input <?php echo $product->quantity == 0 ? "disabled" : ""; ?>
                                    class="form-control text-center me-3" name="quantity" id="inputQuantity" type="num"
                                    value="1" min="1" style="max-width: 3rem" />
                                <button <?php echo $product->quantity == 0 ? "disabled" : ""; ?>
                                    class="btn btn-outline-dark flex-shrink-0 <?php echo $product->quantity == 0 ? "disabled-btn" : ''; ?>" "  type="
                                    submit">
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
            <div class="PostSlide px-4 px-lg-5 mt-5">
                
                <h1 class="fw-bolder mb-4 ml-2">Related products</h1>
                <div class="innerContainer active ">
                  <div class="slider">
                    @foreach($related as $relateproduct)
                    <div class="slide card h-100" >
                        <div class="h-100">
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
                        </div>
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <form action="{{url('product_details')}}" method="get"></form>
                            <div class="text-center"><a class="btn btn-outline-dark mt-auto"
                                    href="{{url('product_details',$relateproduct->id)}}">View options</a></div>
                        </div>
                    </div>
                    @endforeach
                  </div>
              
                  <div class="handles">
                    <span class="prev">
                      <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M15.0001 19.92L8.48009 13.4C7.71009 12.63 7.71009 11.37 8.48009 10.6L15.0001 4.07999" stroke="rgb(55 65 81/1)" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                      </svg>
                    </span>
                    <span class="next">
                      <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.99991 19.92L15.5199 13.4C16.2899 12.63 16.2899 11.37 15.5199 10.6L8.99991 4.07999" stroke="rgb(55 65 81/1)" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                      </svg>
                    </span>
                  </div>
                  <div class="dots">
                  </div>
                </div>
              </div>
        </section>

        {{-- Comment box  --}}
        <form action="{{url('add_comment',$product->id)}}" method="post" id="commentForm">
        <div style="width: 100%; text-align:center">
            <h1 style="font-size: 30px;text-align:center;padding-top:20px;padding-bottom:20px ">Comments</h1>
            {{-- Comment Textbox --}}
                @csrf
                <textarea style="height:150px;width:80% " id="commentValue" cols="30" rows="10" name="comment" class="rounded"></textarea> <br>
                <input type="submit" style="width:fit-content; margin:auto" class=" btn btn-primary"
                    value="comment"></input>
                <div id="ratingNotification" style="display: none;" class="p-2 text-danger">
                    <p>Hãy đánh giá sản phẩm.</p>
                </div>
        </div>
        
        {{-- All comment  --}}
        <div class="comment" id="commt">
            <header class="comment__header rounded-top">
                <h2>Rating product</h2>
                <hr>
                <div>
                    @php
                        use App\Models\Comment;
                    @endphp
                    <?php 
                        $ratingCount5 = Comment::where('rating', 5)->where('product_id',$product->id)->count(); 
                        $ratingCount4 = Comment::where('rating', 4)->where('product_id',$product->id)->count(); 
                        $ratingCount3 = Comment::where('rating', 3)->where('product_id',$product->id)->count(); 
                        $ratingCount2 = Comment::where('rating', 2)->where('product_id',$product->id)->count(); 
                        $ratingCount1 = Comment::where('rating', 1)->where('product_id',$product->id)->count(); 
                        if($countRating == 0){
                            $ratingAVG=0;
                        }else{
                            $ratingAVG = round(($ratingCount5*5 + $ratingCount4*4 + $ratingCount3*3 + $ratingCount2*2 + $ratingCount1) / $countRating,0);
                        }
                     ?>
                    <section class="comment__header-avg">
                        <h3>Avg rating</h3>
                        <h1>{{$ratingAVG}}/5</h1>
                        <div>
                            <?php
                            $subrating = 5 - $ratingAVG;
                            for($i = 0; $i < $ratingAVG; $i++){
                                echo '<i class="fa-solid fa-star"></i>';
                            }
                            for($i = 0; $i < $subrating; $i++){
                                echo '<i class="fa-regular fa-star" style="color: #ffd43b;"></i>';
                            }
                            ?>
                        </div>
                        <h4>{{$countRating}} rating</h4>
                    </section>
                    <section class="comment__header-rate">
                        <ul>
                            <li>
                                <span>5</span>
                                <i class="fa-solid fa-star"></i>
                                <progress id="file" value="{{($ratingCount5/5)*100}}" max="100" class="comment__header-rate-progress"></progress>
                                {{-- <span class="comment__header-rate-progress"></span> --}}
                                <span class="ratingProgress">{{$ratingCount5}}</span>
                            </li>
                            <li>
                                <span>4</span>
                                <i class="fa-solid fa-star"></i>
                                <progress id="file" value="{{($ratingCount4/5)*100}}" max="100" class="comment__header-rate-progress"></progress>
                                <span class="ratingProgress">{{$ratingCount4}}</span>
                            </li>
                            <li>
                                <span>3</span>
                                <i class="fa-solid fa-star"></i>
                                <progress id="file" value="{{($ratingCount3/5)*100}}" max="100" class="comment__header-rate-progress"></progress>

                                <span class="ratingProgress">{{$ratingCount3}}</span>
                            </li>
                            <li>
                                <span>2</span>
                                <i class="fa-solid fa-star"></i>
                                <progress id="file" value="{{($ratingCount2/5)*100}}" max="100" class="comment__header-rate-progress"></progress>

                                <span class="ratingProgress">{{$ratingCount2}}</span>
                            </li>
                            <li>
                                <span>1</span>
                                <i class="fa-solid fa-star"></i>
                                <progress id="file" value="{{($ratingCount1/5)*100}}" max="100" class="comment__header-rate-progress"></progress>
                                <span class="ratingProgress">{{$ratingCount1}}</span>
                            </li>
                        </ul>
                    </section>
                    <section class="comment__header-btn">
                        <span>You already used this product?</span>
                        <button class="btn_rating_active">Rating Now</button>
                            <div class="rating-box rating-disabled">
                                <div class="stars">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </div>
                            </div>
                            <input type="hidden" name="rating" id="ratingValue">
                            {{-- <button class="btn btn-primary disabled mt-2" id="ratingBtn"> Submit</button> --}}
        </form>
                        <div id="commentNotification" style="display: none;" class="p-2 text-danger">
                            <p>Hãy bình luận sản phẩm.</p>
                        </div>
                        @if (session()->has('success'))
                        <div class=" p-2">
                            {{session()->get('success')}}
                        </div>
                        @endif
                    </section>
                </div>
            </header>
            <div class="comment__content">
                <ul>
                    @foreach($comment as $com)
                    <li class="comment__content-item">
                        <div>
                            <img src="https://plus.unsplash.com/premium_photo-1684783848349-fe1d51ab831b?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxlZGl0b3JpYWwtZmVlZHwxMnx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=500&q=60"
                                alt="" />
                        </div>
                        <article class="comment__content-item-text">
                            <h2 class="text-capitalize">{{$com->name}}</h2>
                            <div>
                                <?php
                                    $rating = $com->rating;
                                    $subrating = 5-$rating;
                                    for($i = 0;$i<$rating;$i++){
                                        echo '<i class="fa-solid fa-star"></i>';
                                    }
                                    for($i = 0;$i<$subrating;$i++){
                                        echo '<i class="fa-regular fa-star" style="color: #ffd43b;"></i>';
                                    }
                                ?>
                            </div>
                            <p>
                                {{$com->comment}}
                            </p>
                            <small>
                                <?php
                                $created_at = $com->created_at;
                                $timestamp = strtotime($created_at);
                                $formatted_date = date("d/m/Y", $timestamp);
                                echo $formatted_date;
                                ?>
                            </small>
                        </article>
                    </li>
                    @endforeach
                    {{ $comment->links() }}
        </ul>
    </div>
    </div>
    {{-- endcomment --}}

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
    <script src="home/js/carousel.js"></script>
    <script src="home/js/custom.js" defer></script>
    <script src="https://kit.fontawesome.com/7ab09b7a32.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        //reply
        function reply(caller) {
            document.getElementById('commentId').value = $(caller).attr('data-Commentid');
            $('.replyDiv').insertAfter($(caller));
            $('.replyDiv').show();
        }

        function reply_close(caller) {
            $('.replyDiv').hide();
        }
    </script>
</body>

</html>
