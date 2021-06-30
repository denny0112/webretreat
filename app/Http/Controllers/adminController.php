<?php

namespace App\Http\Controllers;

use App\absensi;
use Endroid\QrCode\Color\Color;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelLow;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Label\Label;
use Endroid\QrCode\Logo\Logo;
use Endroid\QrCode\RoundBlockSizeMode\RoundBlockSizeModeMargin;
use Endroid\QrCode\Writer\PngWriter;
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

        $this->createQrCode($pm->peserta_nrp);

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

    public function createQrCode($text){
        $writer = new PngWriter();

        // Create QR code
        $qrCode = QrCode::create('r' . $text)
            ->setEncoding(new Encoding('UTF-8'))
            ->setErrorCorrectionLevel(new ErrorCorrectionLevelLow())
            ->setSize(300)
            ->setMargin(10)
            ->setRoundBlockSizeMode(new RoundBlockSizeModeMargin())
            ->setForegroundColor(new Color(0, 0, 0))
            ->setBackgroundColor(new Color(255, 255, 255));

        // Create generic logo
        $logo = Logo::create(public_path('logo_if.png'))
            ->setResizeToWidth(75);

        $result = $writer->write($qrCode, $logo);
        $result->saveToFile(public_path('qrcodes/') . 'peserta-'.$text.'.png');
    }

    public function absensi()
    {
        return view('admin.absensi');
    }

    public function aktifkan_sesi($id)
    {
        $sesi = sesi::where('status', 1)->first();
        if($sesi){
            $sesi->status = 0;
            $sesi->save();
        }

        $sesi = sesi::where('sesi_id', $id)->first();
        $sesi->status = 1;
        $sesi->save();

        return back();
    }

    public function detail_absensi($id)
    {
        $sesi = sesi::where('sesi_id', $id)->first();
        $detail = absensi::where('sesi_id', $sesi->sesi_id)->get();

        return view('admin.detail_absensi', ['sesi' => $sesi, 'detail' => $detail]);
    }
}
