<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sesi extends Model
{
    protected $table ="sesis";
    protected $primaryKey ="sesi_id";
    public $timestamps = false;
    public  $incrementing = true;

    public function tambahSesi($nama)
    {
        $ss = new sesi();
        $ss->sesi_nama = $nama;
        $ss->save();
    }
}
