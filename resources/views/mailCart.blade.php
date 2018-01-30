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
<p>Dear {{$ten_kh}},</p>
<div class="row">
        <div  class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="main-content">

                <table class="text-center" id="export" width="950px">
                    <tr>
                        <td>
                <div id="exportID">
                    <div class="text-center">
                        <h2>CHUNG MOBILE</h2>
                        <p>Địa chỉ: 23 Đông Kết - Khoái Chấu - Hưng Yên</p>
                        <p>Điện thoại: 0966 432 963</p>
                        <p>Website: chungmobile.com.vn</p>
                        <h1><strong>THÔNG TIN ĐƠN HÀNG</strong></h1>
                    </div>
                <div class="row">
                    <div class="col-md-push-2 col-md-6 text-left">
                        <p>Ngày đặt hàng: {{ $ngaydat }}</p>
                        {{-- <p>Ngày nhận hàng: </p> --}}
                        <ul>
                            <strong>Thông tin người mua</strong>
                            <li>Họ và tên: {{ $ten_kh }}</li>
                            <li>Địa chỉ: {{ $diachi }}</li>
                            <li>Điện thoại: {{ $sdt }}</li>
                            <li>Email: {{ $email }}</li>
                        </ul>
                    
                    </div>
                    <div class="col-md-push-1 col-md-6">
                        <ul style="list-style: none;">
                            <li><strong>Phương thức thanh toán:</strong> COD</li>
                            {{-- <li><strong>Trạng thái đơn hàng:</strong> <span style="color: red;">{{ $order->status == 1 ? 'Đã thanh toán' : 'Chưa thanh toán' }}</span></li> --}}
                        </ul>
                    </div>
                </div>
                <div class="row table-responsive">
                    <div class="col-md-push-2 col-md-8">
                        <table id="export" class="table table-bordered">
                            <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên sản phẩm</th>
                                <!-- <th>Hình ảnh</th> -->
                                <th>Số lượng</th>
                                <th>Giá</th>
                                {{-- <th>Đơn giá</th> --}}
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($bill as $element)
                                <tr>
                                    <td>1</td>
                                    <td>{{ $element->name }}</td>

                                    <td>{{ $element->soluong }}</td>
                                    <td>{{ number_format((($element->thanhtien)/($element->soluong)), 0, ",", ".") }}</td>
                                    {{-- <td></td> --}}
                                </tr>
                            @endforeach
                                <tr>
                                    <td></td>
                                    <td></td>

                                    <td><b>Tổng tiền:</b></td>
                                    <td>{{ number_format($tongtien, 0, ",", ".") }}</td>
                                    {{-- <td></td> --}}
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                </div>
                        </td>
                    </tr>
                </table>
<!--                <a href="#" onClick ="$('#export').tableExport({type:'excel',escape:'false'});">XLS</a>-->
            </div>
        </div>
    </div>
<p>Nếu bạn không thực hiện mua hàng tại CHUNG MOBILE, chúng tôi xin lỗi vì đã làm phiền, bạn có thể bỏ qua email này</p>
{{-- <p>Link xác thực email mua hàng chỉ tồn tại trong 30 phút</p>
{{ URL::to('xacminh/' . $link) }}.<br/> --}}
<p>Xin cảm ơn!</p>
</body>

</html>