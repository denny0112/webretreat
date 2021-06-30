<?php

namespace App\Http\Controllers;

use App\pembayaran;
use App\peserta;
use App\sesi;
use App\system;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;

class adminController extends Controller
{
    public function index()
    {
        return view('admin.login');
    }

    public function dashboard()
    {
        $param["belum"] = peserta::where('peserta_status',0)->count();
        $param["sudah"] = peserta::where('peserta_status',1)->count();
        $param["request"] = pembayaran::count();
        $param["total"] = peserta::count();
        return view('admin.dashboard')->with($param);
    }

    public function login(Request $req)
    {
        if($req->username=="admin"&&$req->password=="admin"){
            Session::put("admin","admin");
            return 1;
        }
        else{
            return -1;
        }
    }

    public function logout()
    {
        Session::flush();
        return redirect('/');
    }

    public function getMahasiswa()
    {
        $param["data"] = peserta::orderBy('created_at',"desc")->get();
        return view('admin.List.list_mahasiswa_dashboard')->with($param);
    }

    public function getMahasiswaFull()
    {
        $param["data"] = peserta::orderBy('created_at',"desc")->get();
        return view('admin.List.list_mahasiswa_full')->with($param);
    }

    public function getBayar()
    {
        $param["data"] = pembayaran::orderBy('created_at',"desc")->get();
        return view('admin.List.list_bayar')->with($param);
    }
    public function verifikasi($id)
    {
        $pm = pembayaran::find($id);
        peserta::where('peserta_nrp',$pm->peserta_nrp)->update([
            "peserta_status"=>1
        ]);
        $data = peserta::where('peserta_nrp',$pm->peserta_nrp)->get();

        File::delete(public_path("bukti/").$pm->peserta_bukti);

        $pm->delete();

        return $data[0]["peserta_nama"];
    }
    public function vpembayaran()
    {
        return view('admin.pembayaran');
    }
    public function peserta()
    {
        return view('admin.peserta');
    }
    public function sesi()
    {
        return view('admin.sesi');
    }

    public function getSesi()
    {
        $param["data"] = sesi::all();
        return view('admin.List.list_sesi')->with($param);
    }
    public function tambahSesi(Request $req)
    {
        $ss = new sesi();
        $ss->tambahSesi($req->nama);
    }
    public function updateTema(Request $req)
    {
        $s = new system();
        $s->updateTema($req);
    }
}
