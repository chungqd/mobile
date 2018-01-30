<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class CTPhieuNhap extends Model
{
    protected $table = 'ct_phieu_nhap';
    public $timestamps = false;

    public function phieunhap()
    {
        return $this->belongsTo('App\PhieuNhap');
    }

    public function productp()
    {
        return $this->belongsTo('App\Product', 'products_id');
    }

    // public static function searchPhieuNhap($keyword)
    // {
    //     return DB::table('ct_phieu_nhap')
    //             ->join('products', 'products.id', '=', 'ct_phieu_nhap.products_id')
    //             ->join('phieu_nhap', 'phieu_nhap.id', '=', 'ct_phieu_nhap.phieunhap_id')
    //             ->where('phieu_nhap.tenphieu', 'like', "%$keyword%")->orWhere('products.name', 'like', "%$keyword%")
    //             ->select('ct_phieu_nhap.phieunhap_id', 'ct_phieu_nhap.products_id', 'ct_phieu_nhap.soluong', 'ct_phieu_nhap.dongia')
    //             ->paginate(5);
    // }
}
