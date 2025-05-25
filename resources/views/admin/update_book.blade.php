<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="/public">
    @include('admin.css')
    <style type="text/css">     
        .div_center
        {
            text-align: center;
        }
        .title_text {
            color: black;
            padding-top: 5px;
            padding-right: 56px
        }
        label {
            display:inline-block;
            width: 200px;
        }
        .div-design {
            padding-bottom: 15px;
        }
        .font-title {
            font-size: 20px;
            padding-bottom: 10px;
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

                <div class="div_center">
                    <h1 class="font-title">Update Book's Data</h1>
                    <form action="{{url('/update_book_confirm',$book->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf    
                        <div class="div-design">
                            <label>Category</label>
                            <select class="title_text"name="category" required="">
                                <option value="" selected="">{{$book->category}}</option>

                                @foreach($category as $category)
                                <option>{{$category->category_name}}</option>
                                @endforeach

                            </select>
                        </div>
                        <div class="div-design">
                            <label>Title</label>
                            <input class="title_text" type="text" name="title" placeholder="Input a title" required="" value="{{$book->title}}">
                        </div>
                        <div class="div-design">
                            <label>Writer</label>
                            <input class="title_text" type="text" name="writer" placeholder="Input the writer" required="" value="{{$book->writer}}">
                        </div>
                        <div class="div-design">
                            <label>Synopsis</label>
                            <input class="title_text" type="text" name="description" placeholder="Input the synopsis" required="" value="{{$book->description}}">
                        </div>
                        <div class="div-design">
                            <label>Publisher</label>
                            <input class="title_text" type="text" name="publisher" placeholder="Input the publisher" required="" value="{{$book->publisher}}">
                        </div>
                        <div class="div-design">
                            <label>Published Date</label>
                            <input class="title_text" type="text" name="publisher" placeholder="Input the published date" required="" value="{{$book->date_published}}">
                        </div>
                        <div class="div-design">
                            <label>Format</label>
                            <input class="title_text" type="text" name="format" placeholder="Input the format" required="" value="{{$book->format}}">
                        </div>
                        <div class="div-design">
                            <label>ISBN</label>
                            <input class="title_text" type="text" name="format" placeholder="Input the ISBN number" value="{{$book->isbn}}">
                        </div>
                        <div class="div-design">
                            <label>Quantity</label>
                            <input class="title_text" type="text" name="quantity" placeholder="Input the Quantity" required="" value="{{$book->quantity}}">
                        </div>
                        <div class="div-design">
                            <label>Current Cover Book</label>
                            <img style="margin:auto;" src="/book/{{$book->image}}">
                        </div>
                        <div class="div-design">
                            <label>Cover Book</label>
                            <input type="file" name="image">
                        </div>
                        <div class="div-design">
                            <input type="submit" value="Update Data" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>     
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>