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
                                <form id="cash_oder" action="{{url('cash_order')}}" method="POST">
                                    <div class="row g-0">
                                        <div class="col-lg-8">
                                            <div class="p-5">
                                                <div class="d-flex justify-content-between align-items-center mb-5">
                                                    <h1 style="font-family: 'Montserrat', sans-serif"
                                                        class="fw-bold mb-0 ">
                                                        Shopping Cart</h1>
                                                </div>
                                                @csrf
                                                <div class="container">
                                                    <div
                                                        class="row mb-4 d-flex justify-content-center align-items-center">
                                                        <div class=" col-md-4 col-lg-4 col-xl-6 font-weight-bold">
                                                            Product Name
                                                        </div>
                                                        <div class="col-md-2 col-lg-2 col-xl-3 pl-2 font-weight-bold">
                                                            Quantity
                                                        </div>
                                                        <div class="col-md-2 col-lg-2 col-xl-3 font-weight-bold">
                                                            Price
                                                        </div>
                                                        <div></div>
                                                    </div>
                                                </div>
                                                <?php $totalprice=0; $totalquantity=0?>
                                                @foreach($cart as $cart)
                                                <hr class="my-4">
                                                <div class="row mb-4 d-flex justify-content-between align-items-center">
                                                    <div>
                                                        <input name="checkbox[]" type="checkbox" class="checkbox"
                                                            value="{{$cart->id}}"></input>
                                                    </div>
                                                    <div class="col-md-2 col-lg-2 col-xl-2">
                                                        <img src="/product/{{$cart->image}}" class="img-fluid rounded-3"
                                                            alt="Cotton T-shirt">
                                                    </div>
                                                    <div class="col-md-3 col-lg-3 col-xl-3">
                                                        {{-- <h6 class="text-muted">{{$cart->category}}</h6> --}}
                                                        <h6 class="text-black mb-0">{{$cart->product_title}}</h6>
                                                    </div>
                                                    <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                                                        <input id="form1" min="0" name="quantity"
                                                            value="{{$cart->quantity}}" type="number"
                                                            class="form-control form-control-sm" disabled />

                                                    </div>
                                                    <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                                        <h6 class="text-black -3">${{$cart->price}}</h6>
                                                    </div>
                                                    <div class="col-md-1 col-lg-1 col-xl-1 text-end">

                                                        <a class="text-muted"
                                                            onclick="return confirm('Are you sure to remove this product')"
                                                            href="{{url('remove_cart',$cart->id)}}"><i
                                                                class="fas fa-times"></i></a>
                                                    </div>
                                                </div>
                                                <?php $totalprice=$totalprice + $cart->price; $totalquantity=$totalquantity + $cart->quantity?>
                                                @endforeach
                                                <div class="container">
                                                    <div class="row d-flex  justify-content-end">
                                                        <div class="">
                                                            <label for="">Select All</label>
                                                        </div>
                                                        <div class="pl-2">
                                                            <input type="checkbox" id="select-all">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="pt-5">
                                                    <form action="{{url('/')}}" method="get">
                                                        <h6 class="mb-0"><a href="{{url('/')}}" class="text-body"><i
                                                                    class="fas fa-long-arrow-alt-left me-2"></i> Back to
                                                                shop</a>
                                                        </h6>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 bg-grey">
                                            <div class="p-5">
                                                <h3 class="fw-bold mb-5 mt-2 pt-1">Summary</h3>
                                                <span style="font-family: 'Montserrat', sans-serif"
                                                    class="fw-bold mb-0 ">{{$totalquantity}} iteams</span>
                                                <hr class="my-4">
                                                <div class="d-flex justify-content-between mb-5">
                                                    <h5 class="text-uppercase">Total price</h5>
                                                    <h5>${{$totalprice}}</h5>
                                                </div>
                                                <button href="{{url('cash_order')}}" type="submit"
                                                    class="btn btn-outline-dark btn-block btn-lg"
                                                    data-mdb-ripple-color="dark">Cash on delivery</button>
                                                <button href="" type="button" class="btn btn-outline-dark btn-block btn-lg "
                                                    data-mdb-ripple-color="dark">Pay using card</button>
                                            </div>
                                </form>
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
        // Lấy checkbox "select all" và tất cả các checkbox khác
        var form = document.getElementById("cash_order");
        var selectAllCheckbox = document.getElementById("select-all");
        var checkboxes = document.getElementsByClassName("checkbox");
        var selectProductIds = [];
        // Thêm sự kiện "click" vào checkbox "select all"
        selectAllCheckbox.addEventListener("click", function () {
            var isChecked = this.checked;

            // Đặt trạng thái checked cho tất cả các checkbox khác
            for (var i = 0; i < checkboxes.length; i++) {
                checkboxes[i].checked = isChecked;
            }
        });

        // Thêm sự kiện "click" vào từng checkbox khác
        for (var i = 0; i < checkboxes.length; i++) {
            checkboxes[i].addEventListener("click", function () {
                var isAllChecked = true;
                // Kiểm tra xem checkbox "select all" có được chọn hay không
                if (selectAllCheckbox.checked) {
                    // Kiểm tra xem tất cả các checkbox khác có được chọn hết hay không

                    for (var j = 0; j < checkboxes.length; j++) {
                        if (!checkboxes[j].checked) {
                            isAllChecked = false;
                            break;
                        }
                    }

                    // Nếu không có checkbox nào không được chọn, hãy bỏ chọn checkbox "select all"
                    if (!isAllChecked) {
                        selectAllCheckbox.checked = false;
                    }
                } else {
                    // Kiểm tra xem tất cả các checkbox khác đã được chọn hết hay chưa
                    var isAllChecked = true;
                    for (var j = 0; j < checkboxes.length; j++) {
                        if (!checkboxes[j].checked) {
                            isAllChecked = false;
                            break;
                        }
                    }

                    // Nếu tất cả các checkbox khác đều được chọn, hãy chọn checkbox "select all"
                    if (isAllChecked) {
                        selectAllCheckbox.checked = true;
                    }
                }
                if (isAllChecked) {
                    // Lấy ID của sản phẩm từ thuộc tính "value" của checkbox
                    var productId = this.value;
                    console.log("ID của sản phẩm được chọn: " + productId);
                    // Thêm ID vào mảng selectedProductIds
                    selectedProductIds.push(productId);
                    // Thực hiện các thao tác tiếp theo với ID sản phẩm
                    } else {
                    // Bỏ chọn checkbox, xử lý bỏ ID của sản phẩm khỏi danh sách
                    var productId = this.value;
                    console.log("ID của sản phẩm bị bỏ chọn: " + productId);
                    // Loại bỏ ID khỏi mảng selectedProductIds
                    var index = selectedProductIds.indexOf(productId);
                    if (index > -1) {
                        selectedProductIds.splice(index, 1);
                    }
                    // Xử lý loại bỏ ID sản phẩm khỏi danh sách hoặc các thao tác khác
                }

               
            });
        }
    </script>
</body>

</html>
