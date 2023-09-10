<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    <base href="/public">
    @include('admin.css')

    <style type="text/css">
        label {
            display: inline-block;
            width: 200px;
            font-size: 15px;
            font-weight: bold;
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

                <h1 class="text-center"> send email to {{$order->email}} </h1>

                <form action="{{url('send_user_email',$order->id)}}" method="POST">
                    
                    @csrf

                    <div class="text-center">
                        <label for=""> email greeting</label>
                        <input class="text-dark" type="text" name="greeting">
                    </div>

                    <div class="text-center">
                        <label for=""> email firstline</label>
                        <input  class="text-dark"  type="text" name="firstline">
                    </div>

                    <div class="text-center">
                        <label for=""> email body</label>
                        <input class="text-dark"  type="text" name="body">
                    </div>

                    <div class="text-center">
                        <label for=""> email button name</label>
                        <input class="text-dark"  type="text" name="button">
                    </div>

                    <div class="text-center">
                        <label for=""> email url </label>
                        <input  class="text-dark"  type="text" name="url">
                    </div>

                    <div class="text-center">
                        <label for=""> email lastline</label>
                        <input  class="text-dark" type="text" name="lastline">
                    </div>
                    <div class="text-center">
                        <input type="submit" value="send_email" class="btn btn-primary">
                    </div>
                </form>
            </div>

        </div>


        @include('admin.script')

</body>

</html>