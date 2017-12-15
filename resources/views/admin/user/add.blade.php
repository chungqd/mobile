@extends('admin.layout.index')
@section('content')
<div class="content-wrapper right_col">
    <div class="row">
        <div  class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="main-content">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                    <h2 class="text-center">Add Member</h2>
                    @if(count($errors) > 0)
                        <div class="alert alert-danger" role="alert">
                            @foreach ($errors->all() as $error)
                                <strong>Warning!</strong> {{$error}} <br>
                            @endforeach
                        </div>
                    @endif
                    <a href="admin/user/list" title="" class="btn btn-primary"><i class="fa fa-chevron-left" aria-hidden="true"></i> Back</a>
                        <form action="admin/user/add" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">

                            <div class="form-group">
                                <label for="txtName">Tên tài khoản</label>
                                <input type="text" class="form-control" name="txtName" id="txtName" placeholder="Tên tài khoản">
                            </div>

                            <div class="form-group">
                                <label for="txtEmail">Email</label>
                                <input type="email" class="form-control" name="txtEmail" id="txtEmail" placeholder="Địa chỉ email">
                            </div>

                            <div class="form-group">
                                <label for="txtPassword">Mật khẩu</label>
                                <input type="password" class="form-control" name="txtPassword" id="txtPassword" placeholder="Nhập mật khẩu">
                            </div>

                            <div class="form-group">
                                <label for="re-password">Nhập lại mật khẩu</label>
                                <input type="password" class="form-control" name="re-password" id="re-password" placeholder="Nhập mật khẩu">
                            </div>

                            <div class="form-group">
                                <label for="slcRole">Chọn quyền</label>
                                <select name="slcRole" class="form-control"> 
                                    <option value="3">Quản trị hệ thống</option> 
                                    <option value="2">Nhân viên</option> 
                                    <option value="1">Thành viên</option> 
                                </select>
                            </div>

                            {{-- <div class="form-group">
                                <label for="txtSearch">Tìm kiếm group</label><br>
                                <select class="js-example-data-ajax form-control" name="group[]" multiple="multiple">
                                </select>
                            </div> --}}
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
                url: 'admin/group/getGroup',
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