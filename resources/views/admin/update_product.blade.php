<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>

    <base href="/public">
    @include('admin.css')

    <style>
        label {
            display: inline inline-block;
            width: 200px;
        }
    </style>

</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        @include('admin.slidebar')
        <!-- partial -->
        @include('admin.header')
        <!-- partial -->


        <div class="main-panel">
            <div class="content-wrapper">

             @if (session()->has('umessage'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    {{ session()->get('usmessage') }}.
                </div>
            @endif

                <div class="text-center">
                    <h1 class="display-5"> UPDATE Product</h1>
                    <br>

                    <form action="{{url('/update_Nproduct',$updateproduct->id)}}"  method="POST" enctype="multipart/form-data">

                     @csrf
                        <div>
                            <label for=""> Product tittle :</label>
                            <input required="" class="bg-secondary text-dark" type="text" name="tittle" id=""
                               value="{{$updateproduct->tittel}}" placeholder=" write a product name">
                        </div>
                        <div>
                            <label for=""> Product Description :</label>
                            <input required="" class="bg-secondary text-dark" type="text" name="description" id=""
                            value="{{$updateproduct->description}}" placeholder=" write a about product ">
                        </div>
                        <div>
                            <label for=""> Product price :</label>
                            <input required="" class="bg-secondary text-dark" type="number" name="price" id=""
                            value="{{$updateproduct->price}}" placeholder=" price">
                        </div>
                        <div>
                            <label for=""> Discount price :</label>
                            <input required="" class="bg-secondary text-dark" type="number" name="dprice" id=""
                            value="{{$updateproduct->discount_price}}" placeholder="Discount price">
                        </div>
                        <div>
                            <label for=""> Product Quantity :</label>
                            <input required="" class="bg-secondary text-dark" min="0" type="number" name="quantity"
                            value="{{$updateproduct->quantity}}" id="" placeholder=" write a product name">
                        </div>

                        <div>
                            <label for=""> Product Catagory :</label>
                            <select class="bg-secondary text-dark"  required="" name="catagory" id="">
                                <option class="bg-secondary text-dark" value="">{{$updateproduct->catagory}}</option>

                                

                                @foreach ($catagory as $catagory )
                                <option class="bg-secondary text-dark" value="{{$catagory->catagory_name}}">{{$catagory->catagory_name}}</option>
                                  
                              @endforeach



                              
                            </select>
                        </div>

                        <div>
                            <label for=""> current image Here :</label>
                          <img height="100" width="100" style="margin:auto" src="/product/{{$updateproduct->image}}" alt="">
                        </div>




                        <div>
                            <label for=""> Update image Here :</label>
                            <input value="" type="file" name="image" >
                        </div>
                        <div>
                           
                            <input required="" type="submit" value="Update product" class="btn btn-primary">
                          
                        </div>
                    </form>

                </div>
            </div>
        </div>

        @include('admin.script')

</body>

</html>