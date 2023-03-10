<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css')

    <style>
        .title_deg
        {
           text-align: center;
           font-size: 35px;
           font-weight: bold;  
           padding-bottom: 40px;

        }
        .table_deg
        {
          border: 2px solid white;
          width: 70%;
          margin: auto;
          text-align: center;
           
        }
        .tr_deg
        {
            background-color: skyblue;
            color: black;
            font-size: 20px;
        }
        td,th
        {
            border: 1px solid white;
        }
        img
        {
            width: 80px;
            margin: auto;
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
                <h1 class="title_deg">All Orders</h1>

                <div style="padding-left:400px; padding-bottom:30px;">
                  <form action="{{url('search')}}" method="get">
                    @csrf
                    <input  type="text" name="search" placeholder="Search For Somthing" style="color: black" >
                    
                    <input type="submit" value="Search" class="btn btn-outline-primary">
                  </form>
                </div>

                <table class="table_deg">
                    <tr class="tr_deg">
                        <th>Name</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Product Title</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Payment Status</th>
                        <th>Delivery Status</th>
                        <th>Image</th>
                        <th>Delivered</th>
                        <th>Print PDF</th>
                        <th>Send Email</th>
                    </tr>

                    @forelse ($order as $order)
                        
                    <tr>
                        <td>{{ $order->name }}</td>
                        <td>{{ $order->email }}</td>
                        <td>{{ $order->address }}</td>
                        <td>{{ $order->phone }}</td>
                        <td>{{ $order->product_title }}</td>
                        <td>{{ $order->quantity }}</td>
                        <td>{{ $order->price }}</td>
                        <td>{{ $order->payment_status }}</td>
                        <td>{{ $order->delivery_status }}</td>
                        <td>
                            <img  src="/product/{{ $order->image }}" alt="">
                        </td>
                        <td>
                          @if ($order->delivery_status=='processing')
                              
                          <a href="{{url('delivered',$order->id)}}" class="btn btn-primary" onclick="return confirm('Are you sure do it')" >Delivered</a>
                          @else
                          <p style="color: skyblue; ">Delivered</p>
                          @endif

                        </td>

                        <td>
                          <a href="{{url('print_pdf',$order->id)}}" class="btn btn-secondary">Print</a>
                        </td>

                        <td>
                          <a href="{{url('send_email',$order->id)}}" class="btn btn-info ">Email</a>
                        </td>

                    </tr>
                    @empty
                    <tr>
                      <td colspan="16">
                        No Data Found
                      </td>
                    </tr>

                    @endforelse

                </table>

            </div>
        </div>
        
    <!-- container-scroller -->
    <!-- plugins:js -->
       @include('admin.script')
  </body>
</html>