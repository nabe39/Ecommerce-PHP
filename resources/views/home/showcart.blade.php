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
      <link rel="shortcut icon" href="favicon.ico" type="image/png">
      <title>Cart</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="home/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="home/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="home/css/responsive.css" rel="stylesheet" />
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

      <style type="text/css">
        .center{
            margin:auto;
            text-align: center;
            padding-top: 30px
        }
        table,th,td{
            border:1px solid black;
        }
        .th_deg{
            font-size: 30px;
            padding: 5px;
            background: skyblue;
        }
        .img_deg{
            height: 200px;
            widows: 200px;
        }
        .total_deg{
            margin: 20px;
            font-size: 20px;
        }
      </style>
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
            @include('home.header')
         <!-- end header section -->
      <div class="center">
        @if (session()->has('message'))
        <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
        {{session()->get('message')}}
        </div>
        @endif
        <table>
            <tr>
                <th class="th_deg">Product title</th>
                <th class="th_deg">product quantity</th>
                <th class="th_deg">price</th>
                <th class="th_deg">Image</th>
                <th class="th_deg">Action</th>
            </tr>
            <?php $totalprice=0; ?>
            @foreach ($cart as $cart)
                <tr>
                    <td>{{$cart->product_title}}</td>
                    <td>{{$cart->quantity}}</td>
                    <td>{{$cart->price}}$</td>
                    <td><img class="img_deg" src="/product/{{$cart->image}}" alt=""></td>
                    <td><a onclick="return confirm('Are you sure to remove this product')" class="btn btn-danger" href="{{url('remove_cart',$cart->id)}}">Remove product</a></td>
                </tr>
                <?php $totalprice=$totalprice + $cart->price; ?>
            @endforeach           
        </table>
        <div>
            <h1 class="total_deg">Total price: {{$totalprice}}$</h1>
        </div>
        <div>
            <h1 class="lead">Proceed to Order</h1>
            <a href="{{url('cash_order')}}" class="btn btn-danger">Cash on delivery</a>
            <a href="" class="btn btn-primary">Pay using card</a>

        </div>
      </div>
      
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
   </body>
</html>