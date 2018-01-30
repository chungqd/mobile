<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Hệ thống bán điện thoại di động CHUNG MOBILE</title>
    <base href="{{asset('')}}" >
    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" media="screen" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
<p>Dear {{$name}},</p>
<p>Vui lòng click vào link bên dưới kích hoạt tài khoản. Nếu bạn không đăng kí tài khoản tại CHUNG MOBILE, chúng tôi xin lỗi vì đã làm phiền</p>
<p>Link kích hoạt chỉ tồn tại trong 30 phút</p>
{{ URL::to('active/' . $link) }}.<br/>
<p>Xin cảm ơn!</p>
</body>

</html>