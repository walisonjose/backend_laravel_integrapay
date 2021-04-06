<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserHospitalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_hospital', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('id_user')->unsigned();
            $table->bigInteger('id_hospital')->unsigned();

            $table->foreign('id_user')
                ->references('id')->on('users');

            $table->foreign('id_hospital')
                ->references('id')->on('hospital');


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
        Schema::dropIfExists('user_hospital');
    }
}
