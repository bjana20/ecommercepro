<!DOCTYPE html>
<html lang="en">

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
        <!-- partial -->
        
        <div class="main-panel">
            <div class="content-wrapper" >
                @if (session()->has('delete_message'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    {{ session()->get('delete_message') }}.
                </div>
            @endif

    
                <h2>All Product</h2>

                <table>
                    <tr >

                        <th>Product tittle</th>
                        <th>Description</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Discount Price</th>
                        <th>Product Image</th>
                        <th>Delete</th>
                        <th>Edit</th>


                    </tr>
                    @foreach ($productdata as $product )
                    
                    <tr>
                        <td>{{$product->tittel}}</td>
                        <td>{{$product->description}}</td>
                        <td>{{$product->quantity}}</td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->discount_price}}</td>
                        <td>

                        <img style="width: 150px; height: 150px;" src="/product/{{$product->image}}" alt="">
                        
                        </td>
                        <td>
                            <a class="btn btn-danger" onclick="return confirm('are you sure to delete this')" href="{{url('delete_product',$product->id)}}">Delete</a>
                        </td>
                        <td><a class="btn btn-success" href="{{url('update_product',$product->id)}}">Edit</a>
                        </td>
                    </tr>
                    @endforeach
                
                </table>

            </div>
        </div>
    
        @include('admin.script')

</body>

</html>
