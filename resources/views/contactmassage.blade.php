<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
   <h3>{{$data->subject}}</h3>
    <h5>you have recieve a new email from {{$data->name}}</h5>
   <h5>phone is :{{$data->phone}}</h5>
   <h5>email is :{{$data->email}}</h5>
   <p>{{$data->message}}</p>
    
</body>
</html>