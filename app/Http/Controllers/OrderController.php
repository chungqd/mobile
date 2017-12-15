<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brands;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\Product;
use App\DonHang;
use App\CTDonHang;
use Cart;
use DB;

class OrderController extends Controller
{
    public function index()
    {
        $orders = DonHang::paginate(5);
        return view('admin.order.index', compact('orders'));
    }

    public function getEdit($id)
    {
        $order = DonHang::find($id);
        if (empty($order)) {
            return redirect('admin/order/list')->with('mess', 'Không tồn tại đơn hàng cần sửa');
        } else {
            return view('admin.order.edit', compact('order'));
        }
    }

    public function postEdit(Request $request, $id)
    {
        $order = DonHang::find($id);
        if (empty($order)) {
            return redirect('admin/order/list')->with('mess', 'Không tồn tại đơn hàng cần sửa');
        }


        DB::beginTransaction();
        try {
            $order->status = $request->slcRole;
            $order->save();
            DB::commit();
        } catch (Exception $ex) {
            DB::rollback();
            throw $ex;
        }

        return redirect('admin/order/list')->with('thongbao', "Sửa thành công");
    }

    public function delete($id) {
        $order = DonHang::find($id);

        if (empty($order)) {
            return redirect('admin/order/list')->with('mess', 'Không tồn tại đơn hàng cần xóa');
        }

        $detailOrders = CTDonHang::where('don_hang_id', $id)->get();

        if (Auth::user()->quyen == 2 || Auth::user()->quyen == 3) {
            if(count($detailOrders) > 0) {
                $delOrders= CTDonHang::where('don_hang_id', $id)->delete();
            }
            //delete in table imagepath

            $order->delete();
            return redirect('admin/order/list')->with('thongbao', "Xóa thành công");
        } else {
            return redirect('admin/order/list')->with('mess', "Không tồn tại đơn hàng cần xóa");
        }
    }
}
