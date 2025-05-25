<section class="product_section layout_padding">
         <div class="container">
            <div class="heading_container heading_center">
               <h2>
                  Our <span>Book Collections</span>
               </h2>
            </div>
            <div class="row">
               @foreach($book as $book)
               <div class="col-sm-6 col-md-4 col-lg-4">
                  <div class="box">
                     <div class="option_container">
                        <div class="options">
                           <a href="{{url('book_details', $book->id)}}" class="option1">
                           Detail Buku 
                           </a>
                           <!-- <a href="" class="option2">
                           Mau Pinjam
                           </a> -->

                        <form action="{{url('add_cart',$book->id)}}"method="Post">

                        @csrf

                        <div class="row">

                          <!-- <div class="col-md-4">
                        
                              <input type="number" name="quantity" value="1" min="1" style="width: 100px">

                           </div> -->
                           
                           <div class="options">

                              <input type="submit" value="Add to cart" class="option1">

                           </div>

                        </div>
                        </form>
                        </div>
                     </div>
                     <div class="img-box">
                        <img src="book/{{$book->image}}" alt="">
                     </div>
                     <div class="detail-box">
                        <h5>
                           {{$book->title}}
                        </h5>
                        <h6>
                           {{$book->writer}}
                        </h6>
                     </div>
                  </div>
               </div>
            @endforeach
         </div>
      </section>