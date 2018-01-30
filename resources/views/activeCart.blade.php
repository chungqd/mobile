<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Xác thực mua hàng</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <h2 class="text-center">Xác thực mua hàng</h2>
    <div class="row text-center">
        <p>{{$thongbao or ''}}</p>
        <a href="{{route('home')}}" title="" class="btn btn-success">Trang Chủ</a>
    </div>
</div>
</body>
</html>