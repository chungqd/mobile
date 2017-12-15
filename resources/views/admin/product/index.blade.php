@extends('admin.layout.index')
@section('content')
    <div class="content-wrapper right_col">
        <div class="row">
            <div  class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="main-content">
                    <h2 class="text-center">Danh sách sản phẩm</h2>
                    <div class="col-md-3">
                        @if(session('thongbao'))
                            <div class="alert alert-success" role="alert">
                                {{session('thongbao')}}
                            </div>
                        @endif
                        @if(session('mess'))
                            <div class="alert alert-warning" role="alert">
                                {{session('mess')}}
                            </div>
                        @endif
                        <a href="admin/product/add" title="" class="btn btn-primary"><i class="fa fa-plus-square" aria-hidden="true"></i>  Add Product</a>
                        <a href="admin/product/list" title="" class="btn btn-primary">View All</a>
                    </div>
                    <div class="col-md-9">
                        <button type="button" id="btnSearch" id="btnSearch" class="btn btn-info pull-right"><span class="glyphicon glyphicon-search"></span></button>
                        <input class="form-control pull-right" style="width: 300px;" type="text" name="txtSearch" id="txtSearch" placeholder="Nhập từ khóa">
                    </div>
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Tên sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Hãng sản xuất</th>
                            <th>Giá ban đầu</th>
                            <th>Giá khuyến mại</th>
                            <th>Ngày tạo</th>
                            {{--<th>Dung lượng</th>--}}
                            {{--<th>Camera trước</th>--}}
                            {{--<th>Camera sau</th>--}}
                            {{--<th>Ram</th>--}}
                            {{--<th>CPU</th>--}}
                            {{--<th>Hệ điều hành</th>--}}
                            {{--<th>Bảo hành</th>--}}
                            <th class="text-center" colspan="2">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{$product->id}}</td>
                                <td>
                                    <p><b>{{$product->product_name}}</b></p>
                                    <img height="100" width="100" src="uploads/products/{{$product->hinhanh}}" alt="">
                                </td>
                                <td>{{$product->soluong}}</td>
                                <td>{{$product->brand_name}}</td>
                                <td>{{number_format($product->giacu,0,",",".")}}</td>
                                <td>{{number_format($product->giamoi,0,",",".")}}</td>
                                <td>
                                    {{--@php--}}
                                        {{--echo \Carbon\Carbon::createFromTimestamp(strtotime($product->created_at))->diffForHumans()--}}
                                    {{--@endphp--}}
                                    {{$product->created_at}}
                                </td>
                                {{--<td>{{$product->dungluong}}</td>--}}
                                {{--<td>{{$product->cameratruoc}}</td>--}}
                                {{--<td>{{$product->camerasau}}</td>--}}
                                {{--<td>{{$product->ram}}</td>--}}
                                {{--<td>{{$product->cpu}}</td>--}}
                                {{--<td>{{$product->hedieuhanh}}</td>--}}
                                {{--<td>{{$product->baohanh}}</td>--}}
                                <td><a href="admin/product/edit/{{$product->id}}" title="" class="btn btn-warning pull-right"><i class="fa fa-pencil-square" aria-hidden="true"></i></a></td>
                                <td><a onclick="deleteData({{$product->id}})" title="" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {!!$products->links()!!}
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function deleteData(id){
            if (confirm("Bạn có muốn xóa không")) {
                window.location.href = "admin/product/delete/"+id;
            }
        }

        $(document).ready(function() {
            $("#btnSearch").click(function(){
                var keyword = $.trim($("#txtSearch").val());
                window.location.href = "admin/product/search/"+keyword;
            });
        });
    </script>

@endsection