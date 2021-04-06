<?php

use Illuminate\Database\Seeder;

class StatusRequest extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('status_request')->insert(
            [
            'name' => "PEDIDO RECEBIDO",
           'created_at'  => date("Y-m-d H:i:s"),
           'updated_at'  => date("Y-m-d H:i:s")
            ]

        );

        DB::table('status_request')->insert(
            [
            'name' => "SOLICITAÇÃO EM PROCESSAMENTO",
           'created_at'  => date("Y-m-d H:i:s"),
           'updated_at'  => date("Y-m-d H:i:s")
            ]

        );

        DB::table('status_request')->insert(
            [
            'name' => "PEDIDO A CAMINHO",
           'created_at'  => date("Y-m-d H:i:s"),
           'updated_at'  => date("Y-m-d H:i:s")
            ]

        );

        DB::table('status_request')->insert(
            [
            'name' => "RECEBIDO",
           'created_at'  => date("Y-m-d H:i:s"),
           'updated_at'  => date("Y-m-d H:i:s")
            ]

        );

        DB::table('status_request')->insert(
            [
            'name' => "CANCELADO",
           'created_at'  => date("Y-m-d H:i:s"),
           'updated_at'  => date("Y-m-d H:i:s")
            ]

        );

    }
}
