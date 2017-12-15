<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brands;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use DB;
use App\Product;

class BrandsController extends Controller
{
    public function index()
    {
        $brands = Brands::paginate(5);
        return view('admin.brand.index', compact('brands'));
    }

    /**
     * show view add brand
     * 
     * @return view
     */
    public function getAdd()
    {
        return view('admin.brand.add');;
    }

    /**
     * add new brand
     * @param  Request $request 
     * @return view
     */
    public function postAdd(Request $request)
    {
        $messages = [
                'txtName.required' => 'Bạn chưa nhập tên hãng',
                'txtName.unique' => 'Tên hãng đã tồn tại',
                'txtName.max' => 'Tên hãng phải có độ dài 3 - 100 kí tự',
                'txtName.min' => 'Tên hãng phải có độ dài 3 - 100 kí tự',
        ];
        $rules = [
            'txtName' => 'required|unique:brands,name|min:3|max:100',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $brand = new Brands;
        $brand->name = $request->txtName;
        $brand->save();
        return redirect('admin/brand/list')->with('thongbao', "Thêm thành công");
    }

    /**
     * show view edit brand
     *
     * @param int $id
     * @return [view]
     */
    public function getEdit($id)
    {
        $brand = Brands::find($id);
        if (empty($brand)) {
            return redirect('admin/brand/list')->with('mess', 'Không tồn tại hãng cần sửa');
        } else {
            return view('admin.brand.edit', compact('brand'));
        }
    }

    /**
     * edit brand
     *
     * @param Request $request
     * @param int $id
     * @return [view]
     * @throws \Exception
     */
    public function postEdit(Request $request, $id)
    {
        $brand = Brands::find($id);
        if (empty($brand)) {
            return redirect('admin/brand/list')->with('mess', 'Không tồn tại hãng cần sửa');
        }

        if ($request->txtName === $request->hddName) {
            return redirect('admin/brand/list')->with('thongbao', "Sửa thành công");
        } 

        $messages = [
            'txtName.required' => 'Bạn chưa nhập tên hãng',
            'txtName.unique'   => 'Tên hãng đã tồn tại',
            'txtName.max'      => 'Tên hãng phải có độ dài 3 - 100 kí tự',
            'txtName.min'      => 'Tên hãng phải có độ dài 3 - 100 kí tự',
        ];
        $rules = [
            'txtName' => 'required|unique:brands,name|min:3|max:100',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        DB::beginTransaction();
        try {
            $brand->name = $request->txtName;
            $brand->save();
            DB::commit();
        } catch (Exception $ex) {
            DB::rollback();
            throw $ex;
        }

        return redirect('admin/brand/list')->with('thongbao', "Sửa thành công");
    }

    /**
     * delete brand
     *
     * @param int $id
     * @return [view]
     */
    public function delete($id)
    {
        $brand = Brands::find($id);
        if (empty($brand)) {
            return redirect('admin/brand/list')->with('mess', 'Không tồn tại hãng cần xóa');
        }
        $product = Product::where('brands_id',$id)->count();
        if ($product == 0) {
            $brand->delete();
            return redirect('admin/brand/list')->with('thongbao', "Xóa thành công");
        } else {
         echo "<script type='text/javascript'>
             alert('Xin lỗi! Bạn phải xóa sản phẩm của hãng này trước');
             window.location = '";
                 echo route('ds.brand');
         echo "'</script>";
        }
    }

    /**
     * search brand
     * 
     * @param  Request $request 
     * @return view
     */
    public function search($keyword)
    {
        $brands = Brands::where('name', 'like', "%$keyword%")->simplePaginate(5);
        return view('admin.brand.index', compact('brands'));
    }
}
