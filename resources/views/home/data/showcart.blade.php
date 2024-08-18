<?php 
    $totalprice=0; $totalquantity=0;
?>
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
        <h6 class="text-black -3">{{$cart->price}}VND</h6>
    </div>
    <div class="col-md-1 col-lg-1 col-xl-1 text-end">

        <a class="text-muted"
            onclick="return confirm('Are you sure to remove this product')"
            href="{{url('remove_cart',$cart->id)}}"><i
                class="fas fa-times"></i></a>
    </div>
</div>
<?php 
    $totalprice=$totalprice + $cart->price; $totalquantity=$totalquantity + $cart->quantity;
?>
@endforeach
<?php
    session_start(); 
    $_SESSION['totalprice'] = $totalprice;
    $_SESSION['totalquantity'] = $totalquantity;
    
?>
