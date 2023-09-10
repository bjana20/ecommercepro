<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=h1, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>order details</h1>
    <h3>{{$order->name}}</h3>
    <h3>{{$order->email}}</h3>
    <h3>{{$order->phone}}</h3>
    <h3>{{$order->address}}</h3>
    <h3>{{$order->user_id}}</h3>
    <h3>{{$order->product_tittle}}</h3>
    <h3>{{$order->price}}</h3>
    <h3>{{$order->quantity}}</h3>
    <h3>{{$order->payment_status}}</h3>
    <h3>{{$order->product_id}}</h3>
    <img height="60px" width="70px" src="product/{{$order->image}}" alt="">
    
</body>
</html>