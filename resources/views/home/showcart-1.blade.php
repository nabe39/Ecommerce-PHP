<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{--title  --}}
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Cart</title>
    <link rel="shortcut icon" href="favicon.ico" type="image/png">
    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
    <!-- font awesome style -->
    <link href="home/css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="add-cart/css/style.css" rel="stylesheet" />
    <link href="home/css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="home/css/responsive.css" rel="stylesheet" />
    {{-- link icon --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
</head>
<body>
    <div class="hero_area">
        <!-- header section strats -->
           @include('home.header')
        <!-- end header section -->
       <section class="h-100 h-custom" style="background-color: #d2c9ff;">
        <div class="container py-5 h-100">
            @if (session()->has('message'))
            <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
            {{session()->get('message')}}
            </div>
            @endif
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12">
              <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                <div class="card-body p-0">
                  <div class="row g-0">
                    <div class="col-lg-8">
                      <div class="p-5">
                        <div class="d-flex justify-content-between align-items-center mb-5">
                          <h1 style="font-family: 'Montserrat', sans-serif" class="fw-bold mb-0 ">Shopping Cart</h1>
                        </div>
                        <?php $totalprice=0; $totalquantity=0?>
                        @foreach($cart as $cart)
                        <hr class="my-4">
                        <div class="row mb-4 d-flex justify-content-between align-items-center">
                          <input class="test" type="checkbox" value="{{$cart->id}}"></input>
                          <div class="col-md-2 col-lg-2 col-xl-2">
                            
                            <img
                            src="/product/{{$cart->image}}"
                              class="img-fluid rounded-3" alt="Cotton T-shirt">
                          </div>
                          <div class="col-md-3 col-lg-3 col-xl-3">
                            {{-- <h6 class="text-muted">{{$cart->category}}</h6> --}}
                            <h6 class="text-black mb-0">{{$cart->product_title}}</h6>
                          </div>
                          <div class="col-md-3 col-lg-3 col-xl-2 d-flex">      
                            <input id="form1" min="0" name="quantity" value="{{$cart->quantity}}" type="number"
                              class="form-control form-control-sm" disabled />

                          </div>
                          <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                            <h6 class="text-black -3">${{$cart->price}}</h6>
                          </div>
                          <div class="col-md-1 col-lg-1 col-xl-1 text-end">

                            <a class="text-muted"  onclick="return confirm('Are you sure to remove this product')" href="{{url('remove_cart',$cart->id)}}"><i class="fas fa-times"></i></a>
                          </div>
                        </div>
                        <?php $totalprice=$totalprice + $cart->price; $totalquantity=$totalquantity + $cart->quantity?>
                        @endforeach
                        <div class="pt-5">
                            <form action="{{url('/')}}" method="get">
                                <h6 class="mb-0"><a href="{{url('/')}}" class="text-body"><i
                                    class="fas fa-long-arrow-alt-left me-2"></i> Back to shop</a>
                                </h6>
                            </form>
                            </div>
                      </div>
                    </div>
                    <div class="col-lg-4 bg-grey">
                      <div class="p-5">
                        <h3 class="fw-bold mb-5 mt-2 pt-1">Summary</h3>
                        <span style="font-family: 'Montserrat', sans-serif" class="fw-bold mb-0 ">{{$totalquantity}} iteams</span>
                        <hr class="my-4">
      
                        {{-- <div class="d-flex justify-content-between mb-4">
                          <h5 class="text-uppercase">{{$totalquantity}}</h5>
                          <h5>$ {{$totalprice}}</h5>
                        </div> --}}
      
                        {{-- <h5 class="text-uppercase mb-3">Shipping</h5>
      
                        <div class="mb-4 pb-2">
                          <select class="select">
                            <option value="1">Standard-Delivery- €5.00</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                            <option value="4">Four</option>
                          </select>
                        </div>
      
                        <h5 class="text-uppercase mb-3">Give code</h5>
      
                        <div class="mb-5">
                          <div class="form-outline">
                            <input type="text" id="form3Examplea2" class="form-control form-control-lg" />
                            <label class="form-label" for="form3Examplea2">Enter your code</label>
                          </div>
                        </div> --}}
      
                        {{-- <hr class="my-4"> --}}
      
                        <div class="d-flex justify-content-between mb-5">
                          <h5 class="text-uppercase">Total price</h5>
                          <h5>${{$totalprice}}</h5>
                        </div>
                        <a href="{{url('cash_order')}}" type="button" class="btn btn-outline-dark btn-block btn-lg"
                          data-mdb-ripple-color="dark">Cash on delivery</a>
                        <a href="" type="button" class="btn btn-outline-dark btn-block btn-lg " data-mdb-ripple-color="dark">Pay using card</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
       <!-- footer start -->
       @include('home.footer')
       <!-- footer end -->
       </div>
       <!-- jQery -->
       <script src="home/js/jquery-3.4.1.min.js"></script>
       <!-- popper js -->
       <script src="home/js/popper.min.js"></script>
       <!-- bootstrap js -->
       <script src="home/js/bootstrap.js"></script>
       <!-- custom js -->
       <script src="home/js/custom.js"></script>

       <script>
        let test = document.querySelectorAll(".test");
        test.forEach(element => {
          element.addEventListener("change", function() {
    // Kiểm tra trạng thái của checkbox
    if (element.checked) {
        console.log("Checkbox đã được chọn");
        // Thực hiện các hành động khác khi checkbox được chọn
    } else {
        console.log("Checkbox đã được bỏ chọn");
        // Thực hiện các hành động khác khi checkbox bị bỏ chọn
    }
});
        });
    </script>
</body>
</html>