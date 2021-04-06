<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestBloodExamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_blood_exams', function (Blueprint $table) {
            $table->id();
            $table->integer('hb');
            $table->integer('ht');
            $table->integer('plq');
            $table->boolean('irradiado');
            $table->boolean('filtro_leucocitos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('request_blood_exams');
    }
}
