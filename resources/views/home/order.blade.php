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
  <title>Famms - Fashion HTML Template</title>
  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
  <!-- font awesome style -->
  <link href="home/css/font-awesome.min.css" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="home/css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="home/css/responsive.css" rel="stylesheet" />

  <style>
    .tab {
      width: 77%;
      margin-left: 10%;

    }
  </style>


</head>

<body>

  <!-- header section strats -->
  @include('home.header')

  <div class="tab">

    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">Product Tittle</th>
          <th scope="col">Quantity</th>
          <th scope="col">Price</th>
          <th scope="col">Payment status</th>
          <th scope="col">Delivery status</th>
          <th scope="col">Images</th>
          <th scope="col">Cancle order</th>

        </tr>
      </thead>
      <tbody>
        @foreach ($order as $order)
        <tr>
          <!-- <th scope="row">1</th> -->
          <td>{{$order->product_tittle}}</td>
          <td>{{$order->quantity}}</td>
          <td>{{$order->price}}</td>
          <td>{{$order->payment_status}}</td>
          <td>{{$order->delivery_status}}</td>
          <td><img height="70" width="90" src="product/{{$order->image}}" alt=""></td>

          <td>
            @if($order->delivery_status=='processing')
            <a onclick="return confirm('are you sure to cancle the order??')" class="btn btn-danger"
              href="{{url('cancle_order',$order->id)}}">Cancle order</a>

            @else
            <p> <button class="btn btn-primary"> not alowed</button> </p>

            @endif
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
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