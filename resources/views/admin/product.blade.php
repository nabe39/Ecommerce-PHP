<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css')
    <style type="text/css">
        .div_center{
            text-align: center;
            padding-top: 40px; 
        }
        .font_size{
            font-size: 40px;
            padding-top: 40px;
        }
        .text_color{
            color:black;
            padding-bottom: 20px
        }
        label{
            display: inline-block;
            width: 200px;
        }
        .div_design{
            padding-bottom: 15px;
        }
    </style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')
      <!-- partial -->
        <!-- partial:partials/_navbar.html -->
            @include('admin.header')
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                @if (session()->has('message'))
                    <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    {{session()->get('message')}}
                    </div>
                @endif
                <div class="div_center">
                    <h1 class="font_size">Add Product</h1>
                    <form action="{{url('/add_product')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="div_design">
                                <label for="">Product Title</label>
                                <input class="text_color" type="text" name="title" placeholder="Write a title" required=''>
                        </div>
                            <div class="div_design">
                                <label for="">Product Description</label>
                                <input class="text_color" type="text" name="description" placeholder="Write a title" required=''>
                        </div>
                            <div class="div_design" class="div_design">
                                <label for="">Product Price</label>
                                <input class="text_color" type="number" name="price" placeholder="Write a title" required=''>
                        </div>
                        <div class="div_design">
                            <label for="">Discount Price</label>
                            <input class="text_color" type="text" name="discount" placeholder="Write a title">
                        </div>
                            <div class="div_design">
                                <label for="">Product Quantity</label>
                                <input class="text_color" type="number" min="0" name="quantity" placeholder="Write a title" required=''>
                        </div>
                            <div class="div_design">
                                <label for="">Product Category</label>
                                <select class="text_color" name="category" required=''>
                                    <option value="" selected=''>Add a catagory here</option>
                                    @foreach ($categories as $category)
                                        <option value="{{$category->category_name}}" >{{$category->category_name}}</option>
                                    @endforeach

                                </select>
                        </div>
                            <div class="div_design">
                                <label for="">Product Image here</label>
                                <input type="file" name="image">
                        </div>
                        <div class="div_design" >
                                <input type="submit" value="Add a Product" class="btn btn-primary">
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