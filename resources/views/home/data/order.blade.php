@foreach($order as $order) 
                                                <hr class="my-4">
                                                <div class="row mb-4 d-flex justify-content-between align-items-center">
                                                    {{-- <div>
                                                        <input name="checkbox[]" type="checkbox" class="checkbox"
                                                            value=""></input>
                                                    </div> --}}
                                                    <div class="col">
                                                        {{-- <h6 class="text-muted">{{$cart->category}}</h6> --}}
                                                        <h6 class="text-black mb-0">{{$order->product_title}}</h6>
                                                    </div>
                                                    <div class="col">
                                                        <h6 class="text-black -3">{{$order->quantity}}</h6>
                                                    </div>
                                                    <div class="col">
                                                        <h6 class="text-black -3">{{$order->price}}</h6>
                                                    </div>
                                                    <div class="col">
                                                        <h6 class="text-black -3">{{$order->payment_status}}</h6>
                                                    </div>
                                                    <div class="col">
                                                        <h6 class="text-black -3">{{$order->delivery_status}}</h6>
                                                    </div>
                                                    <div class="col">
                                                        <img src="/product/{{$order->image}}" class="img-fluid rounded-3" alt="Cotton T-shirt">
                                                    </div>
                                                    <div class="col-0">
                                                        @if($order->delivery_status=='processing')
                                                            <a class="text-muted"
                                                                onclick="return confirm('Are you sure to cancel this Order')"
                                                                href="{{url('remove_order',$id=$order->id)}}"><i class="fas fa-times"></i></a>
                                                        @endif
                                                    </div>
                                                </div>
                                                @endforeach 