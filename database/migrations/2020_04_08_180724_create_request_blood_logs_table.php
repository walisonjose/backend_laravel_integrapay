<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestBloodLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_blood_logs', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('id_request_blood')->unsigned();
            $table->string('log', 500);


            $table->foreign('id_request_blood')
                ->references('id')->on('request_blood');



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
        Schema::dropIfExists('request_blood_logs');
    }
}
