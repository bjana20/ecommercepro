<section class="product_section layout_padding">
   <div class="container">
      <div class="heading_container heading_center">
         <h2>
            Our <span>products</span>
         </h2>
      </div>
      <div class="row">

         @foreach ($product as $products)
         <div class="col-sm-6 col-md-4 col-lg-4">
            <div class="box">
               <div class="option_container">
                  <div class="options">
                     <a href="{{url('product_details', $products->id)}}" class="option1">
                        product Details
                     </a>
                     <form action="{{url('add_cart', $products->id)}}" method="POST">
                        @csrf
                        <div >
                           <input class="rounded-pill" type="number" name="Quantity" value="1" min="1">
                           {{-- input field value and min use kora hoyacha sei janno home controller .php te  Request use kora holo --}}
                        </div>

                        <br>
                        <div>
                           <input class="rounded-pill" type="submit" value="Add to cart">
                        </div>

                     </form>
                  </div>
               </div>
               <div class="img-box">
                  <img src="product/{{ $products->image }}" alt="">
               </div>
               <div class="detail-box">
                  <h5>
                     {{ $products->tittel }}
                  </h5>
                  @if ($products->discount_price != null)
                  <h6 class="text-primary">
                     Discount price
                     <br>
                     {{ $products->discount_price }}
                  </h6>
                  <h6 class="text-danger" style="text-decoration: line-through;">
                     price
                     <br>
                     {{ $products->price }}
                  </h6>
                  @else
                  <h6 class="text-danger">
                     price
                     <br>
                     {{ $products->price }}
                  </h6>
                  @endif


               </div>
            </div>
         </div>
         @endforeach

         {{-- {{!!$product->appends(Request::all())->links()!!}} --}}

         <div class="mt-4">
            {!!$product->withQueryString()->links('pagination::bootstrap-5')!!};
         </div>
         <!-- 
            <div class="btn-box">
                <a href="">
                    View All products
                </a>
            </div> -->
      </div>
</section>