@extends('admin.layout.index')
@section('content')
<div class="content-wrapper right_col">
    <div class="row">
        <div  class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="main-content">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                    <h2 class="text-center">Thêm chi tiết phiếu nhập</h2>
                    @if(count($errors) > 0)
                        <div class="alert alert-danger" role="alert">
                            @foreach ($errors->all() as $error)
                                <strong>Warning!</strong> {{$error}}
                            @endforeach
                        </div>
                    @endif
                    <a href="admin/ctphieunhap/list" title="" class="btn btn-primary"><i class="fa fa-chevron-left" aria-hidden="true"></i> Back</a>
                        <form action="admin/ctphieunhap/add" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                          <div class="form-group">
                                <label for="txtName">Tên phiếu</label><br>
                                <select class="js-example-data-ajax form-control" name="txtName">
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="txtNameProduct">Tên sản phẩm</label><br>
                                <select class="js-example-data-ajax-1 form-control" name="txtNameProduct">
                                </select>
                            </div>
                            <div class="form-group">
                            <label for="txtSoLuong">Số lượng</label>
                            <input type="text" class="form-control" name="txtSoLuong" id="txtSoLuong" placeholder="Số lượng">
                          </div>
                          <div class="form-group">
                            <label for="txtDonGia">Đơn giá</label>
                            <input type="text" class="form-control" name="txtDonGia" id="txtDonGia" placeholder="Đơn giá">
                          </div>
                          <button type="submit" class="btn btn-success"><i class="fa fa-plus-circle" aria-hidden="true" ></i> Thêm</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    var trang = 1;
    $(document).ready(function() {
        $('.js-example-data-ajax').select2({
            ajax: {
                url: 'admin/ctphieunhap/getTenPhieu',
                dataType: 'json',
                data: function (params) {
                var queryParameters = {
                    q: params.term
                }

                    return queryParameters;
                },
                processResults: function (data) {
                    return {
                        results: data
                    };
                }
            }
        });

        $('.js-example-data-ajax-1').select2({
            ajax: {
                url: 'admin/ctphieunhap/getTenSP',
                dataType: 'json',
                data: function (params) {
                var queryParameters = {
                    q: params.term
                }

                    return queryParameters;
                },
                processResults: function (data) {
                    return {
                        results: data
                    };
                }
            }
        });
    });
</script>
@endsection