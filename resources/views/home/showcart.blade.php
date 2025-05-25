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
      <link rel="shortcut icon" href="images/favicon.png" type="">
      <title>E-Library</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="home/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="home/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="home/css/responsive.css" rel="stylesheet" />

      <style type="text/css">
        .center
        {
            margin: auto;
            text-align: center;
            padding: 30px;
        }

        table,th,td 
        {
            border:1px solid grey;
        }

        .th_deg
        {
            font-size: 30px;
            padding: 5px;
            background: skyblue;

        }

        .img_deg
        {
            height: 200px;
            width: 200px;
        }
      </style>
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
        @include('home.header')
         <!-- end header section -->
        
     
         @if(session()->has('message'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>

                    {{session()->get('message')}}
                </div>
                @endif
     <div class="center">

     <font size="7">KERANJANG BUKU</font><br><br>
        <table>

            <tr>
                <th class="th_deg">Judul Buku</th>
                <th class="th_deg">Cover Buku</th>
                <th class="th_deg">Action</th>
            </tr>

            
            @foreach($cart as $cart)
            <tr>
                <td>{{$cart->book_title}}</td>
                <td><img class="img_deg" src="/book/{{$cart->image}}" alt=""></td>
                <td><a class="btn btn-danger" onclick= "return confirm('apakah anda yakin ingin menghapus buku yang akan dipinjam?') "href="{{url('/remove_cart',$cart->id)}}">Hapus</td>
            </tr>

            @endforeach
        </table>
        <br>
        
        <div>
            <a href="{{url('borrow_book')}}" class="btn btn-danger">Pinjam</a>
        </div>


     </div>
      
      
      <!-- footer start -->
      @include('home.footer');
      <!-- footer end -->
      <div class="cpy_">
      <p class="mx-auto">© 2024 All Rights Reserved By Hustle Squad - Mercu Buana University</a><br>
         
           
         
         </p>
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