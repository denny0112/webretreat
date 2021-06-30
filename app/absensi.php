<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class absensi extends Model
{
    protected $table ="detail_absensi";
    protected $primaryKey ="detail_absensi_id";
    public $timestamps = true;
    public $incrementing = true;

    public $guarded = [];

    public function peserta()
    {
        return $this->belongsTo(peserta::class, 'peserta_nrp');
    }
}
