<?php

use Illuminate\Database\Seeder;

class TypeTransfusion extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('type_transfusion')->insert(
            [
            'name' => "PROGRAMADA",
           'created_at'  => date("Y-m-d H:i:s"),
           'updated_at'  => date("Y-m-d H:i:s")
            ]

    );


    DB::table('type_transfusion')->insert(
        [
        'name' => "NAO URGENTE",
       'created_at'  => date("Y-m-d H:i:s"),
       'updated_at'  => date("Y-m-d H:i:s")
        ]

);

DB::table('type_transfusion')->insert(
    [
    'name' => "URGENTE",
   'created_at'  => date("Y-m-d H:i:s"),
   'updated_at'  => date("Y-m-d H:i:s")
    ]

);

DB::table('type_transfusion')->insert(
    [
    'name' => "EXTREMA URGENCIA",
   'created_at'  => date("Y-m-d H:i:s"),
   'updated_at'  => date("Y-m-d H:i:s")
    ]

);

    }
}
