@extends('admin.layout.index')
@section('content')
<div class="content-wrapper right_col">
    <div class="row">
        <div  class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="main-content">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                    <h2 class="text-center">Thêm phiếu nhập</h2>
                    @if(count($errors) > 0)
                        <div class="alert alert-danger" role="alert">
                            @foreach ($errors->all() as $error)
                                <strong>Warning!</strong> {{$error}}
                            @endforeach
                        </div>
                    @endif
                    <a href="admin/phieunhap/list" title="" class="btn btn-primary"><i class="fa fa-chevron-left" aria-hidden="true"></i> Back</a>
                        <form action="admin/phieunhap/add" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                          <div class="form-group">
                            <label for="txtName">Tên phiếu</label>
                            <input type="text" class="form-control" name="txtName" id="txtName" placeholder="Tên phiếu">
                          </div>
                          <div class="form-group">
                            <label for="txtNameNCC">Tên nhà cung cấp</label>
                            <input type="text" class="form-control" name="txtNameNCC" id="txtNameNCC" placeholder="Tên nhà cung cấp">
                          </div>
                          <div class="form-group">
                            <label class="radio-inline">
                              <input type="radio" name="status" id="inlineRadio1" value="1"> Đã thanh toán
                            </label>
                            <label class="radio-inline">
                              <input type="radio" name="status" id="inlineRadio2" value="0"> Chưa thanh toán
                            </label>
                        </div>
                          <button type="submit" class="btn btn-success"><i class="fa fa-plus-circle" aria-hidden="true" ></i> Thêm</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection