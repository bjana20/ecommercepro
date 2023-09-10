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
    .intro {
      height: 100%;
    }

    table td,
    table th {
      text-overflow: ellipsis;
      white-space: nowrap;
      overflow: hidden;
      font-size: small;
    }

    .card {
      border-radius: .5rem;
    }

    .mask-custom {
      background: rgba(24, 24, 16, .2);
      border-radius: 2em;
      backdrop-filter: blur(25px);
      border: 2px solid rgba(255, 255, 255, 0.05);
      background-clip: padding-box;
      box-shadow: 10px 10px 10px rgba(46, 54, 68, 0.03);
    }

    .fs-2 {
      font-size: 20px;

    }
  </style>
</head>

<body>
  <div>
    <!-- header section strats -->
    @include('home.header')

    @if(session()->has('message'))
    <div class="alert alert-success">
      

    </div>
    @endif
    <!-- end header section -->
    <!-- slider section -->

  </div>

  <section class="intro">
    <div class="bg-image h-100" style="background-color: #878c93;">
      <div class="mask d-flex align-items-center h-100">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-12">
              <div class="card shadow-2-strong" style="background-color: #f5f7fa;">
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-borderless mb-0">
                      <thead>
                        <tr>

                          <th scope="col">Product Tittle</th>
                          <th scope="col">Product Quantity</th>
                          <th scope="col">price</th>
                          <th scope="col">Image</th>
                          <th scope="col">Action</th>

                        </tr>
                      </thead>
                      <tbody>

                        <?php $totalprice=0; ?>


                        @foreach($cart as $cart)
                        <tr>

                          <td> {{$cart->product_tittle}} </td>
                          <td>{{$cart->quantity}}</td>
                          <td>{{$cart->price}}</td>
                          <td>
                            <img style=" height: 15vh; width: 20vh; " 
                              src="/product/{{$cart->image}}">
                          </td>
                          
                          <td><a class="btn btn-danger" onclick="return confirm('are you to  sure to remove?')" href="{{url('/remove_cart',$cart->id)}}">Remove</a></td>

                        </tr>
                        <?php $totalprice=$totalprice+$cart->price ?>


                        @endforeach



                      </tbody>
                    </table>

                    <div>
                      <h1 class="fs-2"> <b>Total Price: {{$totalprice}}</b> </h1>
                    </div>

                    <div class="text-center">
                      <h1> BUY NOW </h1>
                      <a href="{{url('cash_order')}}"class="btn btn-danger">Cash On delivery</a>
                      
                      <a href="{{url('stripe',$totalprice)}}" class="btn btn-danger">Pay via card</a>
                    </div>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- footer start -->
  @include('home.footer')
  <!-- footer end -->
  <div class="cpy_">
    <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>

      Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>

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