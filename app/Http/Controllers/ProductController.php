<?php

namespace App\Http\Controllers;


use App\Brands;
use App\Product;
use App\DonHang;
use App\CTDonHang;
use App\ImageProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;
use File;
use DB;


class ProductController extends Controller
{
    public function index()
    {
        $products = Product::getListProduct();
//        dd($products);
        return view('admin.product.index', compact('products'));
    }

    public function getAdd()
    {
        $brands = Brands::all();
        return view('admin.product.add', compact('brands'));
    }

    public function postAdd(Request $request)
    {
        $messages = [
            'name.required'             => 'Bạn chưa nhập tên sản phẩm',
            'name.min'                  => 'Tên sản phẩm phải có độ dài 10 - 255 kí tự',
            'name.max'                  => 'Tên sản phẩm phải có độ dài 10 - 255 kí tự',
            'dungluong.required'        => 'Bạn chưa nhập dung lượng của sản phẩm',
            'dungluong.min'             => 'Dung lượng phải có độ dài 10 - 255 kí tự',
            'dungluong.max'             => 'Dung lượng phải có độ dài 10 - 255 kí tự',
            'ram.required'              => 'Bạn chưa nhập thông số ram của sản phẩm',
            'ram.min'                   => 'Thông số ram phải có độ dài 10 - 255 kí tự',
            'ram.max'                   => 'Thông số ram phải có độ dài 10 - 255 kí tự',
            'camtruoc.required'         => 'Bạn chưa nhập thông số camera trước của sản phẩm',
            'camtruoc.min'              => 'Thông số camera trước phải có độ dài 10 - 255 kí tự',
            'camtruoc.max'              => 'Thông số camera trước phải có độ dài 10 - 255 kí tự',
            'camsau.required'           => 'Bạn chưa nhập thông số camera sau của sản phẩm',
            'camsau.min'                => 'Thông số camera sau phải có độ dài 10 - 255 kí tự',
            'camsau.max'                => 'Thông số camera sau phải có độ dài 10 - 255 kí tự',
            'cpu.required'              => 'Bạn chưa nhập thông số cpu của sản phẩm',
            'cpu.min'                   => 'Thông số cpu phải có độ dài 10 - 255 kí tự',
            'cpu.max'                   => 'Thông số cpu phải có độ dài 10 - 255 kí tự',
            'hedieuhanh.required'       => 'Bạn chưa nhập thông tin hệ điều hành của sản phẩm',
            'hedieuhanh.min'            => 'Thông tin hệ điều hành phải có độ dài 10 - 255 kí tự',
            'hedieuhanh.max'            => 'Thông tin hệ điều hành phải có độ dài 10 - 255 kí tự',
            'pin.required'              => 'Bạn chưa nhập dung lượng pin của sản phẩm',
            'pin.min'                   => 'Dung lượng pin phải có độ dài 10 - 255 kí tự',
            'pin.max'                   => 'Dung lượng pin phải có độ dài 10 - 255 kí tự',
            'soluong.required'          => 'Bạn chưa nhập số lượng của sản phẩm',
            'giabd.required'            => 'Bạn chưa giá ban đầu của sản phẩm',
            'brand.required'            => 'Bạn chưa chọn hãng của sản phẩm',
            'baohanh.required'          => 'Bạn chưa nhập thời gian bảo hành',
            'mota.required'             => 'Bạn chưa nhập nội dung mô tả',
            'mota.min'                  => 'Mô tả tối thiểu phải có 10 kí tự',
            'file.required'             => 'Chưa thêm hình ảnh chính',
            'file.image'                => 'Hình ảnh chính chưa đúng định dạng ảnh',
            'imgProduct.image'          => 'Chưa đúng định dạng ảnh',
        ];
        $rules = [
            'name'          => 'required|min:1|max:255',
            'dungluong'     => 'required|min:1|max:255',
            'ram'           => 'required|min:1|max:255',
            'camtruoc'      => 'required|min:1|max:255',
            'camsau'        => 'required|min:1|max:255',
            'cpu'           => 'required|min:1|max:255',
            'hedieuhanh'    => 'required|min:1|max:255',
            'pin'           => 'required|min:1|max:255',
            'soluong'       => 'required',
            'giabd'         => 'required',
            'brand'         => 'required',
            'baohanh'       => 'required',
            'mota'          => 'required|min:1',
            'file'          => 'required|image',
            'imgProduct[]'  => 'image',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator    ->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        if ($request->hasFile('file')) {
            $file    = $request->file('file');
            $nameImg = str_random(3)."_".$file->getClientOriginalName();
            while (file_exists("uploads/products/".$nameImg)) {
                $nameImg = str_random(3)."_".$file->getClientOriginalName();
            }
            $file->move('uploads/products', $nameImg);
        }

        $product = new Product();
        $product->name         = $request->name;
        $product->hinhanh      = $nameImg;
        $product->brands_id    = $request->brand;
        $product->dungluong    = $request->dungluong;
        $product->cameratruoc  = $request->camtruoc;
        $product->camerasau    = $request->camsau;
        $product->ram          = $request->ram;
        $product->cpu          = $request->cpu;
        $product->hedieuhanh   = $request->hedieuhanh;
        $product->giacu        = $request->giabd;
        $product->giamoi       = ($request->giakm) ? $request->giakm : 0;
        $product->soluong      = $request->soluong;
        $product->baohanh      = $request->baohanh;
        $product->mota         = $request->mota;
        $product->danhgia      = $request->danhgia;
        $product->pin          = $request->pin;
        $product->save();

        if ($request->hasFile('imgProduct')) {
            foreach ($request->file('imgProduct') as $imgDetail) {
                if (isset($imgDetail)) {
                    $imgProduct = new ImageProduct();
                    $imageDetail = str_random(3)."_".$imgDetail->getClientOriginalName();
                    while (file_exists("uploads/products/".$imageDetail)) {
                        $imageDetail = str_random(3)."_".$imgDetail->getClientOriginalName();
                    }
                    $imgProduct->products_id = $product->id;
                    $imgProduct->img_path    = $imageDetail;
                    $imgDetail->move('uploads/products', $imageDetail);
                    $imgProduct->save();
                }
            }
        }
        return redirect('admin/product/add')->with('thongbao', "Thêm thành công");
    }

    public function delete($id) {
        $product = Product::find($id);

        if (empty($product)) {
            return redirect('admin/product/list')->with('mess', 'Không tồn tại sản phẩm cần xóa');
        }

        $detailOrders = CTDonHang::where('products_id', $id)->get();

        if (count($detailOrders) > 0 ) {
            echo "<script type='text/javascript'>
                alert('Xin lỗi! Bạn phải xóa chi tiết đơn hàng và đơn hàng của sản phẩm này trước');
                window.location = '";
            echo route('ds.product');
            echo "'</script>";
        }
        if (Auth::user()->quyen == 2 || Auth::user()->quyen == 3) {

            //delete in table imagepath
            $imageDetail = Product::find($id)->image->toArray();

            foreach ($imageDetail as $item) {
                File::delete("uploads/products/".$item['img_path']);
            }

            unlink("uploads/products/".$product->hinhanh);
            $product->delete();
            return redirect('admin/product/list')->with('thongbao', "Xóa thành công");
        } else {
            return redirect('admin/product/list')->with('mess', "Không tồn tại sản phẩm cần xóa");
        }
    }

//    public function getDelImg(Request $request)
//    {
//        dd($request->path);
//    }

    public function getEdit($id)
    {
        $product = Product::getProductById($id);
        $brands = Brands::all();
        $detailImg = Product::find($id)->image;
        return view('admin.product.edit', ['product' => $product, 'brands' => $brands, 'detailImg' => $detailImg]);
    }

    public function postEdit(Request $request, $id) {
        $product = Product::find($id);

        if (empty($product)) {
            return redirect('admin/product/list')->with('mess', "Không tồn tại sản phẩm cần sửa");
        }
        if (Auth::user()->quyen == 2 || Auth::user()->quyen == 3) {
            $messages = [
                'name.required'             => 'Bạn chưa nhập tên sản phẩm',
                'name.min'                  => 'Tên sản phẩm phải có độ dài 10 - 255 kí tự',
                'name.max'                  => 'Tên sản phẩm phải có độ dài 10 - 255 kí tự',
                'dungluong.required'        => 'Bạn chưa nhập dung lượng của sản phẩm',
                'dungluong.min'             => 'Dung lượng phải có độ dài 10 - 255 kí tự',
                'dungluong.max'             => 'Dung lượng phải có độ dài 10 - 255 kí tự',
                'ram.required'              => 'Bạn chưa nhập thông số ram của sản phẩm',
                'ram.min'                   => 'Thông số ram phải có độ dài 10 - 255 kí tự',
                'ram.max'                   => 'Thông số ram phải có độ dài 10 - 255 kí tự',
                'camtruoc.required'         => 'Bạn chưa nhập thông số camera trước của sản phẩm',
                'camtruoc.min'              => 'Thông số camera trước phải có độ dài 10 - 255 kí tự',
                'camtruoc.max'              => 'Thông số camera trước phải có độ dài 10 - 255 kí tự',
                'camsau.required'           => 'Bạn chưa nhập thông số camera sau của sản phẩm',
                'camsau.min'                => 'Thông số camera sau phải có độ dài 10 - 255 kí tự',
                'camsau.max'                => 'Thông số camera sau phải có độ dài 10 - 255 kí tự',
                'cpu.required'              => 'Bạn chưa nhập thông số cpu của sản phẩm',
                'cpu.min'                   => 'Thông số cpu phải có độ dài 10 - 255 kí tự',
                'cpu.max'                   => 'Thông số cpu phải có độ dài 10 - 255 kí tự',
                'hedieuhanh.required'       => 'Bạn chưa nhập thông tin hệ điều hành của sản phẩm',
                'hedieuhanh.min'            => 'Thông tin hệ điều hành phải có độ dài 10 - 255 kí tự',
                'hedieuhanh.max'            => 'Thông tin hệ điều hành phải có độ dài 10 - 255 kí tự',
                'pin.required'              => 'Bạn chưa nhập dung lượng pin của sản phẩm',
                'pin.min'                   => 'Dung lượng pin phải có độ dài 10 - 255 kí tự',
                'pin.max'                   => 'Dung lượng pin phải có độ dài 10 - 255 kí tự',
                'soluong.required'          => 'Bạn chưa nhập số lượng của sản phẩm',
                'giabd.required'            => 'Bạn chưa giá ban đầu của sản phẩm',
                'brand.required'            => 'Bạn chưa chọn hãng của sản phẩm',
                'baohanh.required'          => 'Bạn chưa nhập thời gian bảo hành',
                'mota.required'             => 'Bạn chưa nhập nội dung mô tả',
                'mota.min'                  => 'Mô tả tối thiểu phải có 10 kí tự',
                'danhgia.required'          => 'Bạn chưa nhập nội dung đánh giá',
                'danhgia.min'               => 'Nội dung đánh giá tối thiểu phải có 10 kí tự',
                'file.image'                => 'Hình ảnh chính chưa đúng định dạng ảnh',
            ];
            $rules = [
                'name'          => 'required|min:1|max:255',
                'dungluong'     => 'required|min:1|max:255',
                'ram'           => 'required|min:1|max:255',
                'camtruoc'      => 'required|min:1|max:255',
                'camsau'        => 'required|min:1|max:255',
                'cpu'           => 'required|min:1|max:255',
                'hedieuhanh'    => 'required|min:1|max:255',
                'pin'           => 'required|min:1|max:255',
                'soluong'       => 'required',
                'giabd'         => 'required',
                'brand'         => 'required',
                'baohanh'       => 'required',
                'mota'          => 'required|min:1',
                'danhgia'       => 'required|min:1',
                'file'          => 'image',
            ];
            $validator = Validator::make($request->all(), $rules, $messages);
            if ($validator    ->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }

            // upload image
            $nameImg = '';
            if ($request->hasFile('file')) {
                $file    = $request->file('file');
                $nameImg = str_random(3)."_".$file->getClientOriginalName();
                while (file_exists("uploads/products/".$nameImg)) {
                    $nameImg = str_random(3)."_".$file->getClientOriginalName();
                }
                unlink("uploads/products/".$product->hinhanh);
                $file->move('uploads/products', $nameImg);
            }

            //update post
            DB::beginTransaction();
            try {
                $product->name         = $request->name;
                $product->brands_id    = $request->brand;
                $product->dungluong    = $request->dungluong;
                $product->cameratruoc  = $request->camtruoc;
                $product->camerasau    = $request->camsau;
                $product->ram          = $request->ram;
                $product->cpu          = $request->cpu;
                $product->hedieuhanh   = $request->hedieuhanh;
                $product->giacu        = $request->giabd;
                $product->giamoi       = ($request->giakm) ? $request->giakm : 0;
                $product->soluong      = $request->soluong;
                $product->baohanh      = $request->baohanh;
                $product->mota         = $request->mota;
                $product->danhgia      = $request->danhgia;
                $product->pin          = $request->pin;

                if (!empty($nameImg)) {
                    $product->hinhanh = $nameImg;
                }
                $product->save();
                DB::commit();
            } catch (Exception $ex) {
                DB::rollback();
                throw $ex;
            }

            return redirect('admin/product/list')->with('thongbao', "Sửa sản phẩm thành công");
        } else {
            return redirect('admin/product/list')->with('mess', "Không tồn tại sản phẩm cần sửa");
        }
    }

    public function search($keyword) {
        $products = Product::searchProducts($keyword);
        return view('admin.product.index', ['products' => $products]);
    }
}

