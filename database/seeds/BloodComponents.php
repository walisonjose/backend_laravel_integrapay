<?php

use Illuminate\Database\Seeder;

class BloodComponents extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('blood_components')->insert(
            [
            'name' => "CONCENTRADO DE HEMÁCIAS",
           'created_at'  => date("Y-m-d H:i:s"),
           'updated_at'  => date("Y-m-d H:i:s")
            ]

    );

    DB::table('blood_components')->insert(

        [
            'name' => "CONCENTRADO DE PLAQUETAS",
           'created_at'  => date("Y-m-d H:i:s"),
           'updated_at'  => date("Y-m-d H:i:s")
        ]
);

DB::table('blood_components')->insert(

    [
        'name' => "PLASMA FRESCO",
       'created_at'  => date("Y-m-d H:i:s"),
       'updated_at'  => date("Y-m-d H:i:s")
    ]
);

DB::table('blood_components')->insert(

    [
        'name' => "CRIOPRECIPITADO",
       'created_at'  => date("Y-m-d H:i:s"),
       'updated_at'  => date("Y-m-d H:i:s")
    ]
);
DB::table('blood_components')->insert(

    [
        'name' => "COMPLEXO PROTROMBÍNICO",
       'created_at'  => date("Y-m-d H:i:s"),
       'updated_at'  => date("Y-m-d H:i:s")
    ]
);
DB::table('blood_components')->insert(

    [
        'name' => "CONCENTRADO DE FATOR VIII",
       'created_at'  => date("Y-m-d H:i:s"),
       'updated_at'  => date("Y-m-d H:i:s")
    ]
);

    }
}
