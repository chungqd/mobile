<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\DonHang;
use App\CTDonHang;
use App\PhieuNhap;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Collection;

class ReportController extends Controller
{
   	public function statisProduct()
   	{
   		return view('admin.statistical.reportProduct');
   	}

   	public function postStatisticalProduct(Request $request)
   	{

   		$messages = [
                'from.required' => 'Bạn chưa chọn ngày bắt đầu',
                'to.required' => 'Bạn chưa chọn ngày kết thúc',
        ];
        $rules = [
            'from' => 'required',
            'to' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
        $donhang = DonHang::getProductSelled($request->from, $request->to.' 23:59:59');
        return view('admin.statistical.reportProduct', compact('donhang'));
   	}

   	public function statisProfit()
   	{
   		return view('admin.statistical.DoanhThu');
   	}

   	public function postStatisProfit(Request $request)
   	{
   		$doanhThu = DonHang::layDoanhThu($request->from, $request->to.' 23:59:59');

   		$from = $request->from;
   		$to = $request->to;
   		$tienDoanhthu = (int)$doanhThu->doanhthu;
   		$giagoc = DonHang::getOldPrice($request->from, $request->to.' 23:59:59');
   		$soluong = DonHang::getQtyProduct($request->from, $request->to.' 23:59:59');
   		// dd($soluong);
   		$tiengoc = 0;
   		foreach ($soluong as $value) {
   			foreach ($giagoc as $gia) {
   				if($value->products_id == $gia->products_id){
   					$tiengoc +=  ($value->soluong*(int)$gia->giagoc);
   				}
   			}
   		}
   		$loinhuan = $tienDoanhthu - $tiengoc;
   		return view('admin.statistical.DoanhThu', compact('loinhuan', 'tienDoanhthu', 'from', 'to'));
   	}

}
