<!DOCTYPE html>
<html lang="en">
  <head>

    <!-- Required meta tags -->
    @include('admin.css');

    <style>
        .div_center
        {
            text-align: center;
            padding: 40px;
        }
        .h1_font
        {
           font-size: 40px;
           padding-bottom: 40px;
        }
        .text_color
        {
            color: black;
            padding-bottom: 20px;
        }

        label
        {
            display: inline-block;
            width: 200px;
        }
        .div_design
        {
            padding-bottom: 15px;
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

               @if (session()->has('message'))
               <div class="alert alert-success">
                  <button class="btn-close" type="button" data-dismiss="alert" >X</button>
                  {{ session()->get('message') }}
               </div>
                   
               @endif
               <div class="div_center">

                <h1 class="h1_font">Update Product</h1>

             <form action="{{ url('/update_product_confirm',$product->id) }}" method="POST" enctype="multipart/form-data">
               @csrf

                <div class="div_design">
                   <label>Product Title :</label>
                   <input class="text_color" type="text" name="title" placeholder="Write a title" required="" value="{{ $product->title }}">
                </div>

                <div class="div_design">
                    <label>Product Description :</label>
                    <input class="text_color" type="text" name="description" placeholder="Write a description" required="" value="{{ $product->description }}">
                 </div>

                 <div class="div_design">
                    <label>Product Price :</label>
                    <input class="text_color" type="number" name="price" placeholder="Write a price" required="" value="{{ $product->price }}">
                 </div>

                 <div class="div_design">
                    <label>Discount Price :</label>
                    <input class="text_color" type="number" name="dis_price" placeholder="Write a price" required="" value="{{ $product ->discount_price }}">
                 </div>

                 <div class="div_design">
                    <label>Product Quantity :</label>
                    <input class="text_color" type="number" min="0" name="quantity" placeholder="Write a quantity" required="" value="{{ $product->quantity }}">
                 </div>

                 <div class="div_design">
                    <label>Product Category :</label>
                    <select class="text_color" name="category" required="" >

                        <option  value="{{ $product->category }}" selected="" >{{ $product->category }}</option>
                        @foreach ($category as $category)
                        <option value="{{ $category->category_name}}">{{  $category->category_name}}</option>

                        @endforeach
                    </select>
                 </div>

                 <div class="div_design">
                    <label>Old Product Image :</label>
                    <img style="margin: auto;" height="80" width="80" src="/product/{{ $product->image }}" alt="">
                 </div>
                
                 <div class="div_design">
                    <label>Change Product Image :</label>
                    <input  type="file" name="image">
                 </div>

                 <div>
                    <input class="btn btn-success" type="submit" value="Update Product">
                 </div>
               </form>
                 


                
              </div>



            </div>
          </div>

    <!-- container-scroller -->
    <!-- plugins:js -->
       @include('admin.script')
  </body>
</html>