<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class system extends Model
{
    protected $table ="systems";
    protected $primaryKey ="system_id";
    public $timestamps = true;
    public  $incrementing = true;

    public function updateTema($req)
    {
        $s = system::find(1);
        $s->system_judul = $req->judul;
        $s->system_deskripsi = $req->deskripsi;
        $s->save();
    }
}
