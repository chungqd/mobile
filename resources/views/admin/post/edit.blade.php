@extends('admin.layout.index')
@section('content')
    <div class="content-wrapper right_col">
        <div class="row">
            <div  class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="main-content">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <h2 class="text-center">Edit Post</h2>
                            @if(count($errors) > 0)
                                <div class="alert alert-danger" role="alert">
                                    @foreach ($errors->all() as $error)
                                        <strong>Warning!</strong> {{$error}} <br>
                                    @endforeach
                                </div>
                            @endif
                            <a href="admin/post/list" title="" class="btn btn-primary"><i class="fa fa-chevron-left" aria-hidden="true"></i> Back</a>
                            @if(session('thongbao'))
                                <div class="alert alert-success" role="alert">
                                    <strong>Well done!</strong> {{session('thongbao')}}
                                </div>
                            @endif
                            <form action="admin/post/edit/{{$post->id}}" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">

                                <div class="form-group">
                                    <label for="title">Tiêu đề</label>
                                    <input type="text" class="form-control" name="tieude" id="title" value="{{$post->tieu_de}}">
                                </div>

                                <div class="form-group">
                                    <label for="tomtat">Tóm tắt</label>
                                    <input type="text" class="form-control" name="tomtat" id="tomtat" value="{{$post->tomtat}}">
                                </div>

                                <div class="form-group">
                                    <label for="noidung">Nội dung</label>
                                    <textarea name="noidung" id="noidung" rows="10" cols="80">
                                        {{$post->noidung}}
                                    </textarea>
                                </div>

                                <div class="form-group">
                                    <label for="file">Chọn hình</label>
                                    <input type="file" id="file" name="file" accept="image/*">
                                    <br/>
                                    <img src="uploads/posts/{{$post->hinhanh}}" alt="" width="150" height="150">
                                </div>
                                <button type="submit" class="btn btn-success"><i class="fa fa-plus-circle" aria-hidden="true" ></i> Sửa</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <script>
        // Replace the <textarea id="noidung"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace( 'noidung' );
    </script>
@endsection