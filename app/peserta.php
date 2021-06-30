<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class peserta extends Model
{
    protected $table ="pesertas";
    protected $primaryKey ="peserta_nrp";
    public $timestamps = true;
    public  $incrementing = false;

    public function tambahMahasiswa($req)
    {
        $alergi ="";
        if($req->alergi!=null){
            $alergi = $req->alergi;
        }
        $mhs = new peserta();
        $mhs->peserta_nrp = $req->nrp;
        $mhs->peserta_nama = $req->nama;
        $mhs->peserta_jurusan = $req->jurusan;
        $mhs->peserta_jenis = $req->jenis;
        $mhs->peserta_alergi =  $alergi;
        $mhs->peserta_kontak = $req->kontak;
        $mhs->save();
    }
    public function cariPeserta($req)
    {
        return peserta::find($req->nrp);
    }
    public function deleteAll()
    {
        $pm = new pembayaran();
        $pm->deleteAll();
        peserta::where('peserta_nrp', 'like','%%')->delete();
    }
}
