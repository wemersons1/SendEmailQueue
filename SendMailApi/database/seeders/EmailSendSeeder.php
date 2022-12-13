<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmailSendSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('emails_status')->insert([
            'name' => 'Enviado'
        ]);

        DB::table('emails_status')->insert([
            'name' => 'Aguardando envio'
        ]);

        DB::table('emails_status')->insert([
            'name' => 'Ocorreu um erro'
        ]);
    }
}
