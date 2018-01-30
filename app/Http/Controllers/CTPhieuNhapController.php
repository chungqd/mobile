<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PhieuNhap;
use App\CTPhieuNhap;
use App\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use DB;

class CTPhieuNhapController extends Controller
{

	public function index()
    {
        $ctphieunhaps = CTPhieuNhap::paginate(5);
        return view('admin.chitietphieu.index', compact('ctphieunhaps'));
    }

	public function getAdd()
    {
        return view('admin.chitietphieu.add');;
    }

    public function postAdd(Request $request)
    {
        $messages = [
                'txtName.required' => 'Bạn chưa chọn tên phiếu',
                'txtNameProduct.required' => 'Bạn chưa chọn tên sản phẩm',
                'txtSoLuong.required' => 'Bạn chưa nhập số lượng',
                'txtSoLuong.numeric' => 'Số lượng phải là số',
                'txtDonGia.required' => 'Bạn đơn giá của sản phẩm',
                'txtDonGia.numeric' => 'Đơn giá phải là số',

        ];
        $rules = [
            'txtName' => 'required',
            'txtNameProduct' => 'required',
            'txtSoLuong' => 'required|numeric',
            'txtDonGia' => 'required|numeric',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $ctphieunhap = new CTPhieuNhap;
        $ctphieunhap->phieunhap_id = $request->txtName;
        $ctphieunhap->products_id = $request->txtNameProduct;
        $ctphieunhap->soluong = $request->txtSoLuong;
        $ctphieunhap->dongia = $request->txtDonGia;
        $ctphieunhap->save();

        // cap nhap so luong san pham
        $product = Product::find($request->txtNameProduct);
        $soluong = $product->soluong + $request->txtSoLuong;
        DB::beginTransaction();
        try {
            $product->soluong = $soluong;
	        $product->save();
            DB::commit();
        } catch (Exception $ex) {
            DB::rollback();
            throw $ex;
        }
        return redirect('admin/ctphieunhap/list')->with('thongbao', "Thêm thành công");
    }

    public function getTenPhieu(Request $request)
    {
        $keyword = '%'.$request->q.'%';
        $phieunhap = PhieuNhap::where('tenphieu', 'like', $keyword)->get();
        $data[] = '';
        foreach ($phieunhap as $value) {
            $data[] = ['id'=> $value->id, 'text'=> $value->tenphieu];
        }
         return response($data);
    }

    public function getTenSP(Request $request)
    {
        $keyword = '%'.$request->q.'%';
        $products = Product::where('name', 'like', $keyword)->get();
        $data[] = '';
        foreach ($products as $value) {
            $data[] = ['id'=> $value->id, 'text'=> $value->name];
        }
         return response($data);
    }

    public function getEdit($idphieu, $idproduct)
    {
        $ctphieunhap = CTPhieuNhap::where('phieunhap_id', $idphieu)->where('products_id', $idproduct)->first();
        // dd($ctphieunhap);
        if (empty($ctphieunhap)) {
            return redirect('admin/ctphieunhap/list')->with('mess', 'Không tồn tại chi tiết phiếu nhập cần sửa');
        } else {
            return view('admin.chitietphieu.edit', compact('ctphieunhap'));
        }
    }

    public function delete($idphieu, $idproduct)
    {
        $ctphieunhap = CTPhieuNhap::where('phieunhap_id', $idphieu)->where('products_id', $idproduct)->first();
        if (empty($ctphieunhap)) {
            return redirect('admin/ctphieunhap/list')->with('mess', 'Không tồn tại chi tiết phiếu nhập cần xóa');
        }
        $product = Product::find($idproduct);
        $soluong = $product->soluong - $ctphieunhap->soluong;
        DB::beginTransaction();
        try {
            $product->soluong = $soluong;
	        $product->save();
            DB::commit();
        } catch (Exception $ex) {
            DB::rollback();
            throw $ex;
        }
        $xoa = CTPhieuNhap::where('phieunhap_id', $idphieu)->where('products_id', $idproduct)->delete();
        return redirect('admin/ctphieunhap/list')->with('thongbao', "Xóa thành công");
    }

    public function search($keyword)
    {
        $ctphieunhaps = CTPhieuNhap::searchPhieuNhap($keyword);
        return view('admin.chitietphieu.index', compact('ctphieunhaps'));
    }

}
