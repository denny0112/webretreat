<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pembayaran extends Model
{
    protected $table ="pembayarans";
    protected $primaryKey ="pembayaran_id";
    public $timestamps = true;
    public  $incrementing = true;

    public function tambahPembayaran($nrp,$bukti)
    {
        $pm = new pembayaran();
        $pm->peserta_nrp = $nrp;
        $pm->pembayaran_bukti = $bukti;
        $pm->save();
    }

    public function deletePembayaaran($id)
    {
        $pm = pembayaran::find($id);
        $pm->delete();
    }
    public function deleteAll()
    {
        pembayaran::where('pembayaran_id', 'like','%%')->delete();
    }
}
