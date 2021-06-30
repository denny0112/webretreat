<?php

use App\system;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        system::create([
            'system_judul'=>"I'M FOUND",
            'system_deskripsi'=>"Menjadi generasi yang mengalami perubahan hidup dan menyadari bahwa
            segala sesuatu bersumber dari Tuhan",
        ]);
    }
}
