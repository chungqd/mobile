@extends('admin.layout.index')
@section('content')
<div class="content-wrapper right_col">
    <div class="row">
        <div  class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="main-content">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <h2 class="text-center">Sửa phiếu nhập</h2>
                        <h3>
                            @if(count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </h3>
                        <a href="admin/phieunhap/list" title="" class="btn btn-primary"><i class="fa fa-chevron-left" aria-hidden="true"></i> Trở lại</a>
                        <form action="admin/phieunhap/edit/{{$phieunhap->id}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}} 
                        <div class="form-group">
                            <label for="txtName">Tên Phiếu</label>
                            <input type="text" class="form-control" name="txtName" id="txtName" placeholder="Tên Phiếu Nhập" value="{{$phieunhap->tenphieu}}">
                            <input type="hidden" name="hddName" value="{{$phieunhap->tenphieu}}">
                        </div>
                        <div class="form-group">
                            <label for="txtNameNCC">Nhà cung cấp</label>
                            <input type="text" class="form-control" name="txtNameNCC" id="txtNameNCC" placeholder="Nhà cung cấp" value="{{$phieunhap->nhacungcap}}">
                            <input type="hidden" name="hddNameNCC" value="{{$phieunhap->nhacungcap}}">
                        </div>
                        <div class="form-group">
                            <label class="radio-inline">
                              <input {{ $phieunhap->tinhtrang == 1 ? 'checked' : '' }} type="radio" name="status" id="inlineRadio1" value="1"> Đã thanh toán
                            </label>
                            <label class="radio-inline">
                              <input {{ $phieunhap->tinhtrang == 0 ? 'checked' : '' }} type="radio" name="status" id="inlineRadio2" value="0"> Chưa thanh toán
                            </label>
                        </div>
                          <button name="btnSubmit" type="submit" class="btn btn-success"><i class="fa fa-plus-circle" aria-hidden="true" ></i> Sửa</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection