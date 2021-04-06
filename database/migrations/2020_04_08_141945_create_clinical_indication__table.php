<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClinicalIndicationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clinical_indication', function (Blueprint $table) {
            $table->id();
            $table->boolean('is_oncological');
            $table->boolean('is_pregnant');
            $table->boolean('has_transfusion_reaction');
            $table->boolean('has_transfusion_history');
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
        Schema::dropIfExists('clinical_indication');
    }
}
