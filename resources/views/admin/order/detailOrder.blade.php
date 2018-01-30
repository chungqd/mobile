@extends('admin.layout.index')
@section('content')
<div class="content-wrapper right_col">

    <div class="row">
        <div  class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="main-content">
                <xml>
                    <x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet>
                                <x:WorksheetOptions>
                                    <x:Panes></x:Panes></x:WorksheetOptions>
                            </x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook>
                </xml>
                <a href="#" id="test" onClick="javascript:fnExcelReport();">download</a>
                <table class="text-center" id="export" width="950px">
                    <tr>
                        <td>
                <div id="exportID">
                    <div class="text-center">
                        <h2>CHUNG MOBILE</h2>
                        <p>Địa chỉ: 23 Đông Kết - Khoái Chấu - Hưng Yên</p>
                        <p>Điện thoại: 0966 432 963</p>
                        <p>Website: chungmobile.com.vn</p>
                        <h1><strong>HÓA ĐƠN MUA HÀNG</strong></h1>
                    </div>
                <div class="row">
                    <div class="col-md-push-2 col-md-6 text-left">
                        <p>Ngày đặt hàng: {{ $order->created_at }}</p>
                        {{-- <p>Ngày nhận hàng: </p> --}}
                        <ul>
                            <strong>Thông tin người mua</strong>
                            <li>Họ và tên: {{ $order->ten_kh }}</li>
                            <li>Địa chỉ: {{ $order->diachi }}</li>
                            <li>Điện thoại: {{ $order->sdt }}</li>
                            <li>Email: {{ $order->email }}</li>
                        </ul>
					
                    </div>
                    <div class="col-md-push-1 col-md-6">
                        <ul style="list-style: none;">
                            <li><strong>Phương thức thanh toán:</strong> COD</li>
                            <li><strong>Trạng thái đơn hàng:</strong> <span style="color: red;">{{ $order->status == 1 ? 'Đã thanh toán' : 'Chưa thanh toán' }}</span></li>
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
                            @foreach ($detailOrder as $element)
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
                                    <td>{{ number_format($order->tongtien, 0, ",", ".") }}</td>
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
</div>
<script type="text/javascript">
    function fnExcelReport() {
        var tab_text = '<html xmlns:x="urn:schemas-microsoft-com:office:excel">';
        tab_text = tab_text + '<head><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet>';

        tab_text = tab_text + '<x:Name>Test Sheet</x:Name>';

        tab_text = tab_text + '<x:WorksheetOptions><x:Panes></x:Panes></x:WorksheetOptions></x:ExcelWorksheet>';
        tab_text = tab_text + '</x:ExcelWorksheets></x:ExcelWorkbook></xml></head><body>';

        tab_text = tab_text + "<table border='1px'>";
        tab_text = tab_text + $('#export').html();
        tab_text = tab_text + '</table></body></html>';

        var data_type = 'data:application/vnd.ms-excel';

        var ua = window.navigator.userAgent;
        var msie = ua.indexOf("MSIE ");

        if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./)) {
            if (window.navigator.msSaveBlob) {
                var blob = new Blob([tab_text], {
                    type: "application/csv;charset=utf-8;"
                });
                navigator.msSaveBlob(blob, 'Test file.xls');
            }
        } else {
            $('#test').attr('href', data_type + ', ' + encodeURIComponent(tab_text));
            $('#test').attr('download', 'Test file.xls');
        }

    }
</script>
@endsection