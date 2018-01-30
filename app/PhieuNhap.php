<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhieuNhap extends Model
{
    protected $table = 'phieu_nhap';

    public function CTPhieuNhap()
    {
        return $this->hasMany('App\CTPhieuNhap');
    }
}
