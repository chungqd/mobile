@extends('admin.layout.index')
@section('content')
    <div class="content-wrapper right_col">
        <div class="row">
            <div  class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="main-content">
                    <h2>
                        @if(session('mess'))
                            <div class="alert alert-warning" role="alert">
                                {{session('mess')}}
                            </div>
                        @endif
                        @if(session('thongbao'))
                            <div class="alert alert-success" role="alert">
                                {{session('thongbao')}}
                            </div>
                        @endif
                    </h2>
                    <div class="col-md-3">
                        {{--<a href="admin/user/add" title="" class="btn btn-primary"><i class="fa fa-plus-square" aria-hidden="true"></i>  Add Member</a>--}}
                        <a href="admin/order/list" title="" class="btn btn-primary">View All</a>
                    </div>
                    <div class="col-md-9">
                        <button type="button" id="btnSearch" id="btnSearch" class="btn btn-info pull-right"><span class="glyphicon glyphicon-search"></span></button>
                        <input class="form-control pull-right" style="width: 300px;" type="text" name="txtSearch" id="txtSearch" placeholder="Nhập từ khóa">
                    </div>
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Tên</th>
                            <th>Địa chỉ</th>
                            <th>Email</th>
                            <th>SĐT</th>
                            <th>Tổng tiền</th>
                            <th>Ghi chú</th>
                            <th>Trạng thái</th>
                            <th class="text-center" colspan="2">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td>{{$order->id}}</td>
                                <td>{{$order->ten_kh}}</td>
                                <td>{{$order->diachi}}</td>
                                <td>{{$order->email}}</td>
                                <td>{{$order->sdt}}</td>
                                <td>{{$order->tongtien}}</td>
                                <td>{{$order->ghichu}}</td>
                                <td>{{$order->status == 0 ? 'Đang đợi xử lý' : 'Đã xử lý'}}</td>
                                <td><a href="admin/order/edit/{{$order->id}}" title="" class="btn btn-warning pull-right">Edit <i class="fa fa-pencil-square" aria-hidden="true"></i></a></td>
                                <td><a onclick="deleteData({{$order->id}})" title="" class="btn btn-danger">Delete <i class="fa fa-trash" aria-hidden="true"></i></a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {!!$orders->links()!!}
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function deleteData(id){
            if (confirm("Bạn có muốn xóa cả đơn hàng và chi tiết đơn hàng không?")) {
                window.location.href = "admin/order/delete/"+id;
            }
        }

        $(document).ready(function() {
            $("#btnSearch").click(function(){
                var keyword = $.trim($("#txtSearch").val());
                window.location.href = "admin/user/search/"+keyword;
            });
        });
    </script>
@endsection