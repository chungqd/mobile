@extends('layouts.master')
@section('content')
    <div class="lab-breadcrumb">
        <div class="container">

            <!-- Breadcrumb -->
            <div class="breadcrumb clearfix">
                <div class="breadcrumb-i">
                    <a class="home" href="{{ route('home') }}" title="Return to Home">Home</a>
                    {{-- <span class="navigation-pipe">&gt;</span>
                    Authentication --}}
                </div>
            </div>
            <!-- /Breadcrumb -->
        </div>
    </div>
    <div class="columns-container">
        <div id="columns" class="container">

            <div class="row">
                <div id="center_column" class="center_column col-xs-12 col-sm-12">
                    <h1 class="page-heading">Đăng nhập</h1>
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
                            <form action="{{route('signin')}}" method="post" id="login_form" class="box">
                                {{ csrf_field() }}
                                <h3 class="page-subheading">Bạn đã có tài khoản chưa?</h3>
                                <div class="form_content clearfix">
                                    <div class="form-group">
                                        <label for="email">Địa chỉ email</label>
                                        <input class="is_required validate account_input form-control" data-validate="isEmail" type="email" id="email" name="email" value="{{old('email')}}" />
                                    </div>
                                    <div class="form-group">
                                        <label for="passwd">Mật khẩu</label>
                                        <input class="is_required validate account_input form-control" type="password" data-validate="isPasswd" id="passwd" name="passwd" value="{{old('passwd')}}" />
                                    </div>
                                    {{--<p class="lost_password form-group"><a href="password-recovery.html" title="Recover your forgotten password" rel="nofollow">Forgot your password?</a></p>--}}
                                    <p class="submit">
                                        <input type="hidden" class="hidden" name="back" value="my-account" />
                                        <button type="submit" id="SubmitLogin" name="SubmitLogin" class="button btn btn-default button-medium">
                                            <span>
                                                <i class="icon-lock left"></i>
                                                Đăng nhập
                                            </span>
                                        </button>
                                    </p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div><!-- #center_column -->
            </div><!-- .row -->
        </div><!-- #columns -->
    </div><!-- .columns-container -->
@endsection
