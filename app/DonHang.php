<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class DonHang extends Model
{
    protected $table = 'don_hang';
    public static function getDetailOrder($iddonhang)
    {
    	return DB::table('ct_donhang')
            ->join('products', 'products.id', '=', 'ct_donhang.products_id')
            ->where('ct_donhang.don_hang_id', $iddonhang)
            ->select('ct_donhang.soluong', 'ct_donhang.thanhtien', 'products.name')
            ->get();

        // return DB::table('don_hang')
        //     ->join('ct_donhang', 'don_hang.id', '=', 'ct_donhang.don_hang_id')
        //     ->join('products', 'products.id', '=', 'ct_donhang.products_id')
        //     ->where('don_hang.id', $id)
        //     ->select('don_hang.ten_kh', 'don_hang.diachi', 'don_hang.email', 'don_hang.sdt', 'don_hang.tongtien', 'don_hang.ghichu', 'don_hang.status', 'don_hang.created_at', 'ct_donhang.soluong', 'ct_donhang.thanhtien', 'products.name')
        //     ->first();
    }

    public static function getProductSelled($from, $to)
    {
        return DB::table('ct_donhang')
                ->join('don_hang', 'ct_donhang.don_hang_id', '=','don_hang.id')
                ->join('products', 'products.id', '=', 'ct_donhang.products_id')
                ->where('don_hang.status', 1)->whereBetween('don_hang.created_at', [$from, $to])
                ->select('products.name', 'products.id', 'products.soluong', DB::raw('sum(ct_donhang.soluong) as slban'))
                ->groupBy('products_id')
                ->get();
    }

    public static function layDoanhThu($from, $to)
    {
        return DB::table('don_hang')->where('status', 1)->whereBetween('don_hang.created_at', [$from, $to])->select(DB::raw('sum(tongtien) as doanhthu'))->first();
    }

    public static function getOldPrice($from, $to)
    {
        return DB::table('ct_phieu_nhap')
                ->join('phieu_nhap', 'phieu_nhap.id', '=', 'ct_phieu_nhap.phieunhap_id')
                ->whereBetween('phieu_nhap.created_at', [$from, $to])
                ->select('products_id', DB::raw('(sum(soluong*dongia)/sum(soluong)) as giagoc'))
                ->groupBy('products_id')
                ->get();
    }

    public static function getQtyProduct($from, $to)
    {
        return DB::table('ct_donhang')
                ->join('don_hang', 'don_hang.id', '=', 'ct_donhang.don_hang_id')
                ->where('don_hang.status', 1)
                ->whereBetween('don_hang.created_at', [$from, $to])
                ->select('products_id', DB::raw('sum(soluong) as soluong'))
                ->groupBy('products_id')
                ->get();
    }

    public static function getDetailOrderCart($id)
    {
        return DB::table('ct_donhang')
                ->join('products', 'products.id', '=', 'ct_donhang.products_id')
                ->where('ct_donhang.don_hang_id', $id)
                ->select('products.id', 'name', 'ct_donhang.soluong', 'thanhtien')
                ->get();
    }


    public static function searchOrders($keyword)
    {
        return DB::table('don_hang')
            ->where('ten_kh', 'like', "%$keyword%")
            ->orWhere('email', 'like', "%$keyword%")
            ->orWhere('sdt', 'like', "%$keyword%")
            ->simplePaginate(5);
    }
}
