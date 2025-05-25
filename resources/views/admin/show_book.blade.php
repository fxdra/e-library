<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')

    <style type="text/css">
        .center {
            margin: auto;
            width: 50%;
            border: 2px solid white;
            text-align: center;
            margin-top: 40px;
        }
        .font_size {
            text-align: center;
            padding-top: 20px;
        }
        .img_size {
            width: 700px;
            height: 200px;
        }
        .th_style {
            padding: 20px;
        }
        .heading {
            background-color: gray;
        }
    </style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      @include('admin.header')
        <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
            @if(session()->has('message'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>

                    {{session()->get('message')}}
                </div>
            @endif
            <h2 class="font_size">All Book</h2>
            <table class="center">
                <tr class="heading">
                    <th class="th_style">Book Title</th>
                    <th class="th_style">ISBN</th>
                    <th class="th_style">Writer</th>
                    <th class="th_style">Publisher</th>
                    <th class="th_style">Date Published</th>
                    <th class="th_style">Synopsis</th>
                    <th class="th_style">Quantity</th>
                    <th class="th_style">Category</th>
                    <th class="th_style">Book Cover</th>
                    <th class="th_style">Delete</th>
                    <th class="th_style">Edit</th>
                </tr>

                @foreach($book as $book)
                <tr>
                    <td>{{$book->title}}</td>
                    <td>{{$book->isbn}}</td>
                    <td>{{$book->writer}}</td>
                    <td>{{$book->publisher}}</td>
                    <td>{{$book->date_published}}</td>
                    <td>{{$book->synopsis}}</td>
                    <td>{{$book->quantity}}</td>
                    <td>{{$book->category}}</td>
                    <td>
                        <img  src="/book/{{$book->image}}">
                    </td>
                    <td>
                      <a class="btn btn-danger" onclick="return confirm('Are you sure want to delete the data?')" 
                      href="{{url('delete_book', $book->id)}}">Delete</a>
                    </td>
                    <td>
                      <a class="btn btn-success" href="{{url('update_book',$book->id)}}">Edit</a>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
      </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>