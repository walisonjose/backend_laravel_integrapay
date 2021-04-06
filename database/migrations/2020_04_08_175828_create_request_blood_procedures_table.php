<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestBloodProceduresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_blood_procedures', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_request_blood')->unsigned();
            $table->bigInteger('id_procedures')->unsigned();


            $table->foreign('id_request_blood')
                ->references('id')->on('request_blood');

            $table->foreign('id_procedures')
                ->references('id')->on('procedures');


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
        Schema::dropIfExists('request_blood_procedures');
    }
}
