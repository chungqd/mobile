@extends('layouts.master')
@section('content')
    <div class="lab-breadcrumb">
        <div class="container">

            <!-- Breadcrumb -->
            <div class="breadcrumb clearfix">
                <div class="breadcrumb-i">
                    <a class="home" href="{{ route('home') }}" title="Return to Home">Trang chủ</a>
                    {{-- <span class="navigation-pipe">&gt;</span> --}}
                    
                </div>
            </div>
            <!-- /Breadcrumb -->
        </div>
    </div>
    <div class="columns-container">
        <div id="columns" class="container">

            <div class="row">
                <div id="center_column" class="center_column col-xs-12 col-sm-12">
                    <h1 class="page-heading">Đăng kí</h1>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-sm-offset-3">
                            <!--error-->
                            @if(count($errors) > 0)
                                <div class="alert alert-danger">
                                    <p>Có {{count($errors)}} lỗi:</p>
                                    <ol>
                                        @foreach($errors->all() as $error)
                                            <li>{{$error}}</li>
                                        @endforeach
                                    </ol>
                                    {{--<p class="lnk"><a class="alert-link" href="/prestashop/lab_techstore16/" title="Back">« Back</a></p>--}}
                                </div>
                            @endif

                            @if(session('error'))
                                <div class="alert alert-danger text-center">
                                    <ul>
                                        <li style="list-style-type: none;">{{session('error') }}</li>
                                    </ul>
                                </div>
                            @endif
                            @if(session('thongbao'))
                                <div class="alert alert-success" role="alert">
                                    {{session('thongbao')}}
                                </div>
                            @endif
                            <form action="{{route('register')}}" method="post" id="create-account_form" class="box">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <h3 class="page-subheading">Tạo tài khoản mới</h3>

                                <div class="form_content clearfix">
                                    <p>Vui lòng nhập email của bạn để tạo tài khoản.</p>
                                    <div class="alert alert-danger" id="create_account_error" style="display:none"></div>

                                    <div class="form-group">
                                        <label for="email_create">Địa chỉ email</label>
                                        <input type="email" class="is_required validate account_input form-control" data-validate="isEmail" id="email_create" name="email_create" value="{{old('email')}}" />
                                    </div>

                                    <div class="form-group">
                                        <label for="fullname">Tên hiển thị</label>
                                        <input type="text" class="is_required validate account_input form-control"  id="fullname" name="fullname" value="{{old('fullname')}}" />
                                    </div>

                                    <div class="form-group">
                                        <label for="passwd">Mật khẩu</label>
                                        <input class="is_required validate account_input form-control" type="password" data-validate="isPasswd" id="passwd" name="passwd" value="" />
                                    </div>

                                    <div class="form-group">
                                        <label for="repasswd">Nhập lại mật khẩu</label>
                                        <input class="is_required validate account_input form-control" type="password" data-validate="isRePasswd" id="repasswd" name="repasswd" value="" />
                                    </div>

                                    <div class="submit">
                                        <input type="hidden" class="hidden" name="back" value="my-account" />
                                        <button class="btn btn-default button button-medium exclusive" type="submit" id="SubmitCreate" name="SubmitCreate">
                                            <span>
                                                <i class="icon-user left"></i>
                                                Create an account
                                            </span>
                                        </button>
                                        <input type="hidden" class="hidden" name="SubmitCreate" value="Create an account" />
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div><!-- #center_column -->
            </div><!-- .row -->
        </div><!-- #columns -->
    </div><!-- .columns-container -->
@endsection