<!DOCTYPE html>
<html lang="en">

<!-- <style>
   .size{
     width: 100px;
   }
</style> -->

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Corona Admin</title>
  @include('admin.css')

</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_sidebar.html -->
    @include('admin.slidebar')
    <!-- partial -->
    @include('admin.header')

    <div class="main-panel">
      <div class="content-wrapper">

        <h1 class="text-center"> All Orders</h1>
        <table class="table" class="-50" style="border: 2px solid red;">
          <div style="padding: 11px;
          margin: 2px;
           text-align: center;">

            <form action="{{url('search')}}" method="get">
              @csrf
              <input class="text-dark" type="text" name="search" placeholder="search for something">
              
              <input type="submit" value="search" class="btn-btn-outline-primary">
            </form>
          </div>


          <thead class="thead-dark">
            <tr>
              <th scope="col">Name</th>
              <th scope="col">Email</th>
              <th scope="col">Address</th>
              <th scope="col">Phone</th>
              <th scope="col">Product tittle</th>
              <th scope="col">Qusntity</th>
              <th scope="col">Price</th>
              <th scope="col">PAyment Status</th>
              <th scope="col">delivery status</th>
              <th scope="col">image</th>
              <th scope="col">Deliverd</th>
              <th scope="col">Print pdf</th>
              <th scope="col">Send Email</th>

            </tr>
          </thead>
          <tbody>
            @forelse($order as $order)
            <tr>

              <td>{{$order->name}}</td>
              <td>{{$order->email}}</td>
              <td>{{$order->address}}</td>
              <td>{{$order->phone}}</td>
              <td>{{$order->product_tittle}}</td>
              <td>{{$order->quantity}}</td>
              <td>{{$order->price}}</td>
              <td>{{$order->payment_status}}</td>
              <td>{{$order->delivery_status}}</td>
              <td> <img src="/product/{{$order->image}}" alt=""> </td>

              <button>
                <td>
                  @if($order->delivery_status=='processing')
                  <a href="{{url('deliverd',$order->id)}}"
                    onclick="return confirm('are you sure to Deliverd the product')" type="button"
                    class="btn btn-primary">Deliverd</a>
                  @else
                  <p>Deliverd</p>
                  @endif
                </td>

                <td>
                  <a href="{{url('print_pdf',$order->id)}}" class="btn btn-secondary">print pdf</a>
                </td>

                <td>
                  <a href="{{url('send_email',$order->id)}}" class=" btn btn-info"> send email</a>
                </td>
              </button>

              @empty

              <tr>
                <td colspan="16">
                  NO DATA FOUND

                </td>
              </tr>




            </tr>
            @endforelse

          </tbody>
        </table>




      </div>
    </div>

    <!-- partial -->

    @include('admin.script')

</body>

</html>