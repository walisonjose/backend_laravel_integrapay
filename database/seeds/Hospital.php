<?php

use Illuminate\Database\Seeder;

class Hospital extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('hospital')->insert(
            [
            'name' => "Hospital de UrgÊncias de Goiânia - HUGO",
            'address' => "Av. 1ª Radial - St. Pedro Ludovico, Goiânia - GO, 74855-700",
            'latitude' => -16.7087059,
            'longitude' => -49.2567424,
           'created_at'  => date("Y-m-d H:i:s"),
           'updated_at'  => date("Y-m-d H:i:s"),
            ]);

    }
}
