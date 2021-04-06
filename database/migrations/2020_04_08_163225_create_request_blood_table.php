<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestBloodTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_blood', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_patient')->unsigned();
            $table->bigInteger('id_clinical_indication')->unsigned();
            $table->bigInteger('id_request_blood_exams')->unsigned();
            $table->bigInteger('id_type_transfusion')->unsigned();
            $table->bigInteger('id_status_request')->unsigned();
            $table->bigInteger('id_hospital')->unsigned();
            $table->bigInteger('id_deliveryman')->unsigned();
            $table->bigInteger('id_user')->unsigned();
            $table->bigInteger('id_doctor')->unsigned();

            $table->foreign('id_patient')
                ->references('id')->on('patient');

            $table->foreign('id_clinical_indication')
                ->references('id')->on('clinical_indication');

                $table->foreign('id_request_blood_exams')
                ->references('id')->on('request_blood_exams');

                $table->foreign('id_type_transfusion')
                ->references('id')->on('type_transfusion');

                $table->foreign('id_status_request')
                ->references('id')->on('status_request');

                $table->foreign('id_hospital')
                ->references('id')->on('hospital');

                $table->foreign('id_deliveryman')
                ->references('id')->on('users');

                $table->foreign('id_user')
                ->references('id')->on('users');

                $table->foreign('id_doctor')
                ->references('id')->on('users');


                $table->date('date_type_transfusion');
                $table->date('date_request');


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
        Schema::dropIfExists('request_blood');
    }
}
