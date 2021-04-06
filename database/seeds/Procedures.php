<?php

use Illuminate\Database\Seeder;

class Procedures extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('procedures')->insert(
            [
            'name' => "PREPARADO DE HEMOCOMPONENTES PARA EXSANGUÍNEO TRANSFUSÃO",
           'created_at'  => date("Y-m-d H:i:s"),
           'updated_at'  => date("Y-m-d H:i:s")
            ]

    );

    DB::table('procedures')->insert(

        [
            'name' => "PLASMAFÉRESE TERAPÊUTICA",
           'created_at'  => date("Y-m-d H:i:s"),
           'updated_at'  => date("Y-m-d H:i:s")
        ]
);

DB::table('procedures')->insert(

    [
        'name' => "CITAFÉRESE TERAPÊUTICA",
       'created_at'  => date("Y-m-d H:i:s"),
       'updated_at'  => date("Y-m-d H:i:s")
    ]
);

DB::table('procedures')->insert(

    [
        'name' => "SANGRIA TERAPÊUTICA",
       'created_at'  => date("Y-m-d H:i:s"),
       'updated_at'  => date("Y-m-d H:i:s")
    ]
);
DB::table('procedures')->insert(

    [
        'name' => "OUTROS",
       'created_at'  => date("Y-m-d H:i:s"),
       'updated_at'  => date("Y-m-d H:i:s")
    ]
);


    }
}
