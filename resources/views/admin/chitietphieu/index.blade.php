@extends('admin.layout.index')
@section('content')
<div class="content-wrapper right_col">
    <div class="row">
        <div  class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="main-content">
                <h2 class="text-center">Danh sách phiếu nhập</h2>
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
                <div class="col-md-12" style="padding-bottom: 10px;">
                <a href="admin/ctphieunhap/add" title="" class="btn btn-success pull-left"><i class="fa fa-plus-square" aria-hidden="true"></i>  Thêm chi tiết phiếu nhập</a><br>
                {{-- <a href="admin/ctphieunhap/list" title="" class="btn btn-primary">Tất cả</a> --}}
                </div>
                {{-- <div class="col-md-9"> --}}
                   {{-- <button type="button" id="btnSearch" id="btnSearch" class="btn btn-info pull-right"><span class="glyphicon glyphicon-search"></span></button>
                  <input class="form-control pull-right" style="width: 300px;" type="text" name="txtSearch" id="txtSearch" placeholder="Nhập từ khóa"> --}}
                {{-- </div> --}}

                <table id="example" class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tên Phiếu</th>
                            <th>Tên sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Đơn giá</th>
                            <th >Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $i = 1 ?>
                    @foreach ($ctphieunhaps as $ctphieunhap)
                        <tr>
                            <td>{{$i}}</td>
                            <td>{{$ctphieunhap->phieunhap->tenphieu}}</td>
                            <td>{{$ctphieunhap->productp->name}}</td>
                            <td>{{$ctphieunhap->soluong}}</td>
                            <td>{{$ctphieunhap->dongia}}</td>
                            {{-- <td><a href="admin/ctphieunhap/edit/{{$ctphieunhap->phieunhap_id}}/{{$ctphieunhap->products_id}}" title="" class="btn btn-warning pull-right">Edit <i class="fa fa-pencil-square" aria-hidden="true"></i></a></td> --}}
                            <td><a onclick="deleteData({{$ctphieunhap->phieunhap_id}},{{$ctphieunhap->products_id}})" title="" class="btn btn-danger">Delete <i class="fa fa-trash" aria-hidden="true"></i></a></td>
                        </tr>
                        <?php $i++; ?>
                    @endforeach
                    </tbody>
                </table>
                {!!$ctphieunhaps->links()!!}
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function deleteData(idphieu, idproduct){
        if (confirm("Xóa chi tiết phiếu này sẽ giảm số lượng sản phẩm hiện tại?")) {
            window.location.href = "admin/ctphieunhap/delete/"+idphieu+"/"+idproduct;
        }
    }

    $(document).ready(function() {
        $('#example').DataTable({
            responsive: true
        });
        $("#btnSearch").click(function(){
            var keyword = $.trim($("#txtSearch").val());
            window.location.href = "admin/ctphieunhap/search/"+keyword;
        });
    })
</script>

@endsection