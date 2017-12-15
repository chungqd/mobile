@extends('admin.layout.index')
@section('content')
    <style>
        .btn-circle {
            position: relative;
            border-radius: 50%;
            top: -50px;
            right: 20px;
        }
        #addImg {
            margin-bottom: 20px;
            /*margin-left: 15px;*/
        }
    </style>
    <div class="content-wrapper right_col">
        <div class="row">
            <div  class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="main-content">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <h2 class="text-center">Add Product</h2>
                            @if(count($errors) > 0)
                                <div class="alert alert-danger" role="alert">
                                    @foreach ($errors->all() as $error)
                                        <strong>Warning!</strong> {{$error}} <br>
                                    @endforeach
                                </div>
                            @endif
                            <a href="admin/product/list" title="" class="btn btn-primary"><i class="fa fa-chevron-left" aria-hidden="true"></i> Back</a>
                            @if(session('thongbao'))
                                <div class="alert alert-success" role="alert">
                                    <strong>Well done!</strong> {{session('thongbao')}}
                                </div>
                            @endif
                            <form action="admin/product/edit/{{$product->id}}" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <div class="row">
                                    <div class="col-md-12 col-xs-12">
                                        <div class="form-group">
                                            <label for="name">Tên sản phẩm</label>
                                            <input type="text" class="form-control" name="name" id="name" placeholder="Nhập tên sản phẩm" value="{{old('name', isset($product)?$product->product_name : null)}}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 col-xs-12">
                                        <div class="form-group">
                                            <label for="dungluong">Dung Lượng</label>
                                            <input type="text" class="form-control" name="dungluong" id="dungluong" placeholder="Dung lượng" value="{{old('dungluong', isset($product)?$product->dungluong : null)}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-xs-12">
                                        <div class="form-group">
                                            <label for="ram">Ram</label>
                                            <input type="text" class="form-control" name="ram" id="ram" placeholder="Ram" value="{{old('ram', isset($product) ? $product->ram : null)}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-xs-12">
                                        <div class="form-group">
                                            <label for="camtruoc">Camera trước</label>
                                            <input type="text" class="form-control" name="camtruoc" id="camtruoc" placeholder="Camera trước" value="{{old('camtruoc', isset($product)?$product->cameratruoc:null)}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-xs-12">
                                        <div class="form-group">
                                            <label for="camsau">Camera sau</label>
                                            <input type="text" class="form-control" name="camsau" id="camsau" placeholder="Camera sau" value="{{old('camsau', isset($product)?$product->camerasau:null)}}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 col-xs-12">
                                        <div class="form-group">
                                            <label for="cpu">CPU</label>
                                            <input type="text" class="form-control" name="cpu" id="cpu" placeholder="CPU" value="{{old('cpu',isset($product)?$product->cpu:null)}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-xs-12">
                                        <div class="form-group">
                                            <label for="hedieuhanh">Hệ điều hành</label>
                                            <input type="text" class="form-control" name="hedieuhanh" id="hedieuhanh" placeholder="Hệ điều hành" value="{{old('hedieuhanh',isset($product)?$product->hedieuhanh:null)}}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 col-xs-12">
                                        <div class="form-group">
                                            <label for="pin">Pin</label>
                                            <input type="text" class="form-control" name="pin" id="pin" placeholder="Pin" value="{{old('pin', isset($product)?$product->pin:null)}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-xs-12">
                                        <div class="form-group">
                                            <label for="soluong">Số lượng</label>
                                            <input type="number" class="form-control" name="soluong" id="soluong" placeholder="Số lượng" value="{{old('soluong',isset($product)?$product->soluong:null)}}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 col-xs-12">
                                        <div class="form-group">
                                            <label for="giabd">Giá ban đầu</label>
                                            <input type="number" class="form-control" name="giabd" id="giabd" placeholder="Giá ban đầu" value="{{old('giabd',isset($product)?$product->giacu:null)}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-xs-12">
                                        <div class="form-group">
                                            <label for="giakm">Giá khuyến mại</label>
                                            <input type="text" class="form-control" name="giakm" id="giakm" placeholder="Giá khuyến mại" value="{{old('giakm',isset($product)?$product->giamoi:null)}}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 col-xs-12">
                                        <div class="form-group">
                                            <label for="brand">Chọn hãng</label>
                                            <select class="form-control" id="brand" name="brand">
                                                <option value="">Hãng sản xuất</option>
                                                @foreach($brands as $brand)
                                                    <option value="{{$brand->id}}" {{$brand->id == $product->brands_id ? 'selected' :''}}>{{$brand->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-xs-12">
                                        <div class="form-group">
                                            <label for="baohanh">Bảo hành</label>
                                            <input type="text" class="form-control" name="baohanh" id="baohanh" placeholder="Thời gian bảo hành" value="{{old('baohanh', isset($product)?$product->baohanh:null)}}">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="mota">Mô tả</label>
                                    <textarea name="mota" id="mota" rows="10" cols="80">{{old('mota', isset($product)?$product->mota:null)}}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="danhgia">Đánh giá</label>
                                    <textarea name="danhgia" id="danhgia" class="form-control" rows="5" cols="80">{{old('mota', isset($product)?$product->danhgia:null)}}</textarea>
                                </div>

                                <div class="form-group">
                                    <label>Hình ảnh chính</label>
                                    <div class="fallback">
                                        <input type="file" name="file" accept="image/*"><br>
                                        <img src="uploads/products/{{$product->hinhanh}}" alt="" width="150" height="150">
                                    </div>
                                </div>

                                {{--<div class="row">--}}
                                    {{--@foreach($detailImg as $image)--}}
                                        {{--@if($image->products_id % 2 == 1)--}}
                                        {{--<div class="col-md-6 col-xs-12">--}}
                                            {{--<div class="form-group">--}}
                                                {{--<label>Hình ảnh phụ</label>--}}
                                                {{--<div class="fallback">--}}
                                                    {{--<input type="file" name="imgProduct[]" accept="image/*"><br>--}}
                                                    {{--<img src="uploads/products/{{$image['img_path']}}" alt="" width="100" height="100">--}}
                                                    {{--<a href="delImg/{{$image['img_path']}}" id="del_img" class="btn btn-danger btn-circle"><i class="fa fa-times"></i></a>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        {{--@else--}}
                                        {{--<div class="col-md-6 col-xs-12">--}}
                                            {{--<div class="form-group">--}}
                                                {{--<label>Hình ảnh phụ</label>--}}
                                                {{--<div class="fallback">--}}
                                                    {{--<input type="file" name="imgProduct[]" accept="image/*"><br>--}}
                                                    {{--<img src="uploads/products/{{$image['img_path']}}" alt="" width="100" height="100">--}}
                                                    {{--<a href="delImg/{{$image['img_path']}}" id="del_img" class="btn btn-danger btn-circle"><i class="fa fa-times"></i></a>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        {{--@endif--}}
                                    {{--@endforeach--}}
                                    {{--<div class="col-md-6 col-xs-12">--}}
                                        {{--<div id="insertImg"></div>--}}
                                        {{--<button id="addImg" type="button" class="btn btn-primary">Add Image</button>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                <button type="submit" class="btn btn-success"><i class="fa fa-plus-circle" aria-hidden="true" ></i> Thêm</button>
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
        CKEDITOR.replace( 'mota' );
        //        CKEDITOR.replace( 'danhgia' );
        $(document).ready(function () {
            $('#addImg').click(function () {
                $('#insertImg').append('<div class="form-group"><label>Hình ảnh phụ</label><div class="fallback"><input type="file" name="imgProduct[]" accept="image/*"><br></div></div>');
            });
        });
    </script>
@endsection