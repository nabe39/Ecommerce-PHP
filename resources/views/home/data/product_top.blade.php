<section class="py-5 bg-light product_section layout_padding">
   <div class="PostSlide px-4 px-lg-5 mt-5">
      <div class="heading_container heading_center">
         <h2>
            Best <span>Seller</span>
         </h2>
      </div>
       <div class="innerContainer active ">
         <div class="slider">
            @foreach ($topSaleProducts as $products)
            <div class="col-sm-6 col-md-4 col-lg-4 slide h-100">
               <div class="box shadow mb-5 bg-white rounded" style="">
                  <div class="icon-fire">
                     <i class="bi bi-fire"></i>
                  </div>
                  <div class="option_container">
                     <div class="options">
                        <a href="{{url('product_details',$products->id)}}" class="option1 btn" id="idProduct">
                          Details
                        </a>
                        {{-- fix UI/ add to cart --}}
                        <form action="{{url('add_cart',$products->id)}}" method="post">
                          @csrf
                          <div class="row">
                             <div class="col-md-4">
                                <input type="number" name="quantity" value="1" min="1" style="width: 100px">
                             </div>
                             <div class="col-md-4">
                                <input  <?php echo $products->quantity == 0 ? "disabled" : ""; ?> type="submit" value="Add to Cart" class="option2 rounded-pill <?php echo $products->quantity == 0 ? 'disabled-btn' : ''; ?>">   </div>
                          </div>
                        </form>
                        {{-- fix UI --}}
                     </div>
                  </div>
                  <img  src="product/{{$products->image}}" class="card-img-top" style="height: 300px" alt="...">
                  <div class="card-body card-home">
                    <h5 class="card-title">{{$products->title}}</h5>
                    <p class="card-text">{{$products->description}}</p>
                 </div>
                  <div class="d-flex justify-content-between">
                    @if($products->quantity == 0)
                    <h5> Sold out </h5>
                    @else
                    <h5><i style="color:black" class="bi bi-cart "></i> {{$products->quantity}}</h5>
                    @endif
                    @if($products->discount_price !=null)
                    <h5 style="text-decoration: line-through; opacity:0.5">
                       {{$products->price}}VND
                    </h5>
                    <h5 class="card-text pl-2">
                       {{$products->discount_price}}VND
                    </h5>
                    @else
                    <h5>
                       {{$products->price}}VND
                    </h5>
                  @endif
  
                 </div>
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