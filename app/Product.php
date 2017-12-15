<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use App\Brands;

class Product extends Model
{
    protected $table = 'products';

    public function image()
    {
        return $this->hasMany('App\ImageProduct', 'products_id', 'id');
    }

    public function brand()
    {
        return $this->belongsTo('App\Brands');
    }

    public static function getListProduct($id = null)
    {
        return DB::table('products')
                    ->join('brands', 'brands.id', '=', 'products.brands_id')
                    ->select('products.id', 'products.name as product_name', 'hinhanh', 'soluong', 'giacu', 'giamoi', 'brands.name as brand_name', 'dungluong', 'cameratruoc', 'camerasau', 'ram', 'cpu', 'hedieuhanh', 'baohanh', 'created_at')
                    ->orderBy('products.created_at', 'desc')
                    ->simplePaginate(5);
    }

    public static function getProductById($id)
    {
        return DB::table('products')
            ->join('brands', 'brands.id', '=', 'products.brands_id')
            ->where('products.id', $id)
            ->select('products.id', 'products.name as product_name', 'hinhanh', 'soluong', 'giacu', 'giamoi', 'brands.id as brands_id', 'brands.name as brand_name', 'dungluong', 'cameratruoc', 'camerasau', 'ram', 'cpu', 'hedieuhanh', 'baohanh', 'mota', 'danhgia','pin', 'created_at')
            ->first();
    }

    public static function searchProducts($keyword)
    {
        return DB::table('products')
            ->join('brands', 'brands.id', '=', 'products.brands_id')
            ->where('products.name', 'like', "%$keyword%")
            ->select('products.id', 'products.name as product_name', 'hinhanh', 'soluong', 'giacu', 'giamoi', 'brands.id as brands_id', 'brands.name as brand_name', 'dungluong', 'cameratruoc', 'camerasau', 'ram', 'cpu', 'hedieuhanh', 'baohanh', 'mota', 'danhgia','pin', 'created_at')
            ->simplePaginate(5);
    }

    public static function getDetailProduct($id)
    {
        return DB::table('products')
            ->join('brands', 'brands.id', '=', 'products.brands_id')
            ->where('products.id', $id)
            ->select('products.id', 'products.name as product_name', 'hinhanh', 'soluong', 'giacu', 'giamoi', 'brands.id as brands_id', 'brands.name as brand_name', 'dungluong', 'cameratruoc', 'camerasau', 'ram', 'cpu', 'hedieuhanh', 'baohanh', 'mota', 'danhgia','pin', 'created_at')
            ->first();
    }
}
