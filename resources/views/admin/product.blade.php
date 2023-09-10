<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
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
                <div class="text-center">
                    <h1 class="display-5"> ADD Product</h1>
                    <br>

                    <form action="{{ url('/addproduct') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div>
                            <label for=""> Product tittle :</label>
                            <input required="" class="bg-secondary text-dark" type="text" name="tittle"
                                id="" placeholder=" write a product name">
                        </div>
                        <div>
                            <label for=""> Product Description :</label>
                            <input required="" class="bg-secondary text-dark" type="text" name="description"
                                id="" placeholder=" write a about product ">
                        </div>
                        <div>
                            <label for=""> Product price :</label>
                            <input required="" class="bg-secondary text-dark" type="number" name="price"
                                id="" placeholder=" price">
                        </div>
                        <div>
                            <label for=""> Discount price :</label>
                            <input required="" class="bg-secondary text-dark" type="number" name="dprice"
                                id="" placeholder="Discount price">
                        </div>
                        <div>
                            <label for=""> Product Quantity :</label>
                            <input required="" class="bg-secondary text-dark" min="0" type="number"
                                name="quantity" id="" placeholder=" write a product name">
                        </div>

                        <div>
                            <label for=""> Product Catagory :</label>
                            <select class="bg-secondary text-dark" required="" name="catagory" id="">
                                <option class="bg-secondary text-dark" value="">add a catagory here</option>

                                @foreach ($catagory as $catagory)
                                    <option class="bg-secondary text-dark" value="{{ $catagory->catagory_name }}">
                                        {{ $catagory->catagory_name }}</option>
                                @endforeach



                            </select>
                        </div>

                        <div>
                            <label for=""> Product image Here :</label>
                            <input required="" type="file" name="image" id="">
                        </div>
                        <div>

                            <input required="" type="submit" value="Add product" class="btn btn-primary">

                        </div>
                    </form>

                </div>
            </div>
        </div>

        @include('admin.script')

</body>

</html>
