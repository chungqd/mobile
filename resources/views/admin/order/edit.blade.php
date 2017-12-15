@extends('admin.layout.index')
@section('content')
    <div class="content-wrapper right_col">
        <div class="row">
            <div  class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="main-content">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <h2 class="text-center">Edit Order</h2>
                            <h4>
                                @if(count($errors) > 0)
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            </h4>
                            <a href="admin/order/list" title="" class="btn btn-primary"><i class="fa fa-chevron-left" aria-hidden="true"></i> Back</a>
                            <form action="admin/order/edit/{{$order->id}}" method="post" enctype="multipart/form-data">
                                {{csrf_field()}}

                                <div class="form-group">
                                    <label for="slcRole">Trạng thái</label>
                                    <select name="slcRole" class="form-control">
                                        <option {{$order->status == 0 ? 'selected' : ''}} value="0" >Đang chờ xử lý</option>
                                        <option {{$order->status == 1 ? 'selected' : ''}} value="1" >Đã xử lý</option>
                                    </select>
                                </div>
                                <button name="btnSubmit" type="submit" class="btn btn-success"><i class="fa fa-plus-circle" aria-hidden="true" ></i> Sửa</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#changePass").change(function() {
                if($(this).is(":checked")) {
                    $(".password").removeAttr('disabled');
                } else {
                    $(".password").attr('disabled', '');
                }
            });
        });
    </script>
@endsection