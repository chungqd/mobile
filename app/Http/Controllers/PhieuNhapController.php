<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PhieuNhap;
use App\CTPhieuNhap;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use DB;

class PhieuNhapController extends Controller
{
    public function index()
    {
        $phieunhaps = PhieuNhap::paginate(5);
        return view('admin.phieunhap.index', compact('phieunhaps'));
    }

    public function getAdd()
    {
        return view('admin.phieunhap.add');;
    }

    public function postAdd(Request $request)
    {
        $messages = [
                'txtName.required' => 'Bạn chưa nhập tên phiếu',
                'txtName.max' => 'Tên phiếu phải có độ dài 3 - 100 kí tự',
                'txtName.min' => 'Tên phiếu phải có độ dài 3 - 100 kí tự',
                'txtNameNCC.required' => 'Bạn chưa nhập tên nhà cung cấp',
                'txtNameNCC.max' => 'Tên nhà cung cấp phải có độ dài 3 - 100 kí tự',
                'txtNameNCC.min' => 'Tên nhà cung cấp phải có độ dài 3 - 100 kí tự',
                'status.required' => 'Bạn chưa chọn tình trạng phiếu nhập',
                'status.numeric' => 'Sai định dạng của trạng thái'
        ];
        $rules = [
            'txtName' => 'required|min:3|max:100',
            'txtNameNCC' => 'required|min:3|max:100',
            'status' => 'required|numeric',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $phieunhap = new PhieuNhap;
        $phieunhap->tenphieu = $request->txtName;
        $phieunhap->tinhtrang = $request->status;
        $phieunhap->nhacungcap = $request->txtNameNCC;
        $phieunhap->save();
        return redirect('admin/phieunhap/list')->with('thongbao', "Thêm thành công");
    }

    public function getEdit($id)
    {
        $phieunhap = PhieuNhap::find($id);
        if (empty($phieunhap)) {
            return redirect('admin/phieunhap/list')->with('mess', 'Không tồn tại phiếu nhập cần sửa');
        } else {
            return view('admin.phieunhap.edit', compact('phieunhap'));
        }
    }

    public function postEdit(Request $request, $id)
    {
        $phieunhap = PhieuNhap::find($id);
        if (empty($phieunhap)) {
            return redirect('admin/phieunhap/list')->with('mess', 'Không tồn tại phiếu nhập cần sửa');
        } 

        $messages = [
                'txtName.required' => 'Bạn chưa nhập tên phiếu',
                'txtName.max' => 'Tên phiếu phải có độ dài 3 - 100 kí tự',
                'txtName.min' => 'Tên phiếu phải có độ dài 3 - 100 kí tự',
                'txtNameNCC.required' => 'Bạn chưa nhập tên nhà cung cấp',
                'txtNameNCC.max' => 'Tên nhà cung cấp phải có độ dài 3 - 100 kí tự',
                'txtNameNCC.min' => 'Tên nhà cung cấp phải có độ dài 3 - 100 kí tự',
                'status.required' => 'Bạn chưa chọn tình trạng phiếu nhập',
                'status.numeric' => 'Sai định dạng của trạng thái'
        ];
        $rules = [
            'txtName' => 'required|min:3|max:100',
            'txtNameNCC' => 'required|min:3|max:100',
            'status' => 'required|numeric',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        DB::beginTransaction();
        try {
            $phieunhap->tenphieu = $request->txtName;
	        $phieunhap->tinhtrang = $request->status;
	        $phieunhap->nhacungcap = $request->txtNameNCC;
	        $phieunhap->save();
            DB::commit();
        } catch (Exception $ex) {
            DB::rollback();
            throw $ex;
        }

        return redirect('admin/phieunhap/list')->with('thongbao', "Sửa thành công");
    }

    public function delete($id)
    {
        $phieunhap = PhieuNhap::find($id);
        if (empty($phieunhap)) {
            return redirect('admin/phieunhap/list')->with('mess', 'Không tồn tại phiếu nhập cần xóa');
        }
        $ctphieunhap = CTPhieuNhap::where('phieunhap_id',$id)->count();
        if ($ctphieunhap == 0) {
            $phieunhap->delete();
            return redirect('admin/phieunhap/list')->with('thongbao', "Xóa thành công");
        } else {
         echo "<script type='text/javascript'>
             alert('Xin lỗi! Bạn phải xóa chi tiết phiếu nhập trước');
             window.location = '";
                 echo route('ds_phieunhap');
         echo "'</script>";
        }
    }

    public function search($keyword)
    {
        $phieunhaps = PhieuNhap::where('tenphieu', 'like', "%$keyword%")->orWhere('nhacungcap', 'like', "%$keyword%")->simplePaginate(5);
        return view('admin.phieunhap.index', compact('phieunhaps'));
    }
}
