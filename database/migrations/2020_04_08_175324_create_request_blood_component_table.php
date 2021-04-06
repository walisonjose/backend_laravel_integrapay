<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestBloodComponentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_blood_component', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('id_request_blood')->unsigned();
            $table->bigInteger('id_blood_components')->unsigned();
            $table->double('amount', 8, 2);

            $table->foreign('id_request_blood')
                ->references('id')->on('request_blood');

            $table->foreign('id_blood_components')
                ->references('id')->on('blood_components');

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
        Schema::dropIfExists('request_blood_component');
    }
}
