<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    @include('admin.css')

    <style>
        #center {
            margin: auto;
            width: 50%;
            text-align: center;
            margin-top: 30px;
            border: 3px solid green;
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
                    <h2> Add catagory</h2>
                </div>
                @if (session()->has('message'))
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        {{ session()->get('message') }}.
                    </div>
                @endif

                @if (session()->has('dmessage'))
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        {{ session()->get('dmessage') }}.
                    </div>
                @endif

                <form action="{{ url('/add_catagory') }}" method="POST">
                    @csrf
                    <input style=" background-color: black;" type="text" name="name"
                        placeholder="write cateagory name">
                    <input type="submit" class="btn btn-primary" name="submit" value="Add catagory">
                </form>

                <div>
                    <table id="center">

                        <tr>
                            <td>catagory Name</td>
                            <td> Action</td>
                        </tr>
                        @foreach ($data as $data)
                            <tr>
                                <td>{{ $data->catagory_name }}</td>
                                <td>
                                    <a onclick="return confirm('are you confir to delete this')" class="btn btn-danger"
                                        href="{{ url('delete_catagory', $data->id) }}">Delete</a>
                                </td>
                            </tr>
                        @endforeach

                    </table>
                </div>

            </div>
        </div>


        @include('admin.script')

</body>

</html>
