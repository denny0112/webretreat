<?php

namespace App\Http\Controllers;

use App\absensi;
use App\pembayaran;
use App\peserta;
use App\sesi;
use App\system;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class generalController extends Controller
{
    public function index()
    {
        $param["tema"] = system::find(1);
        return view('registrasi')->with($param);
    }
    public function registrasi(Request $req)
    {
        $peserta = new peserta();
        $data = $peserta->cariPeserta($req);
        if($data==null){
            $peserta->tambahMahasiswa($req);
            return 1;
        }
        else{
            return -1;
        }
    }
    public function pembayaran()
    {
        return view('pembayaan');
    }
    public function checkNRP(Request $req)
    {
        $peserta = new peserta();
        $data = $peserta->cariPeserta($req);
        if($data!=null){
            return 1;
        }
        else{
            return -1;
        }
    }
    public function bayar(Request $req)
    {

        $data = pembayaran::where('peserta_nrp',$req->nrp)->get();

        $file = $req->file('file');
        $ex = $file->getClientOriginalExtension();

        $name =uniqid().'.'.$ex;

        $files = public_path("bukti/");
        $filename = $files;
        $file->move($filename,$name);

        if(count($data)<=0){

            $pm = new pembayaran();
            $pm->tambahPembayaran($req->nrp,$name);

        }
        else{
            File::delete($filename.$data[0]["pembayaran_bukti"]);
            pembayaran::where('peserta_nrp',$req->nrp)->update([
                "pembayaran_bukti"=>$name
            ]);
        }
    }

    public function absen()
    {
        $sesi = sesi::where('status', 1)->first();
        return view('absen', ['sesi_aktif' => $sesi]);
    }

    public function absenPeserta(Request $req)
    {
        $id_qr = $req->id_qr_code;

        if($id_qr[0] == "r"){
            $id_qr = substr($id_qr, 1);
        }

        $sesi = sesi::where('status', 1)->first();
        $peserta = peserta::where('peserta_nrp', $id_qr)->first();

        if($peserta){
            if(absensi::where('peserta_nrp', $id_qr)->where('sesi_id', $sesi->sesi_id)->exists()){
                return 201;
            }

            absensi::create([
                'peserta_nrp' => $id_qr,
                'sesi_id' => $sesi->sesi_id
            ]);

            return 200;
        }else{
            return 404;
        }
    }
}
