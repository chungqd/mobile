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
                <a href="admin/phieunhap/add" title="" class="btn btn-primary"><i class="fa fa-plus-square" aria-hidden="true"></i>  Thêm phiếu nhập</a>
                <a href="admin/phieunhap/list" title="" class="btn btn-primary">Tất cả</a>
                </div>
                <div class="col-md-9">
                   <button type="button" id="btnSearch" id="btnSearch" class="btn btn-info pull-right"><span class="glyphicon glyphicon-search"></span></button>
                  <input class="form-control pull-right" style="width: 300px;" type="text" name="txtSearch" id="txtSearch" placeholder="Nhập từ khóa">
                </div>

                <table id="example" class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tên Phiếu</th>
                            <th>Nhà cung cấp</th>
                            <th>Tình trạng</th>
                            <th>Ngày tạo</th>
                            <th class="text-center" colspan="2">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($phieunhaps as $phieunhap)
                        <tr>
                            <td>{{$phieunhap->id}}</td>
                            <td>{{$phieunhap->tenphieu}}</td>
                            <td>{{$phieunhap->nhacungcap}}</td>
                            <td>{{$phieunhap->tinhtrang == 0 ? 'Chưa thanh toán' : 'Đã thanh toán'}}</td>
                            <td>{{$phieunhap->created_at}}</td>
                            <td><a href="admin/phieunhap/edit/{{$phieunhap->id}}" title="" class="btn btn-warning pull-right">Edit <i class="fa fa-pencil-square" aria-hidden="true"></i></a></td>
                            <td><a onclick="deleteData({{$phieunhap->id}})" title="" class="btn btn-danger">Delete <i class="fa fa-trash" aria-hidden="true"></i></a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {!!$phieunhaps->links()!!}
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function deleteData(id){
        if (confirm("Bạn có muốn xóa không")) {
            window.location.href = "admin/phieunhap/delete/"+id;
        }
    }

    $(document).ready(function() {
        $("#btnSearch").click(function(){
            var keyword = $.trim($("#txtSearch").val());
            window.location.href = "admin/phieunhap/search/"+keyword;
        });
    })
</script>

@endsection