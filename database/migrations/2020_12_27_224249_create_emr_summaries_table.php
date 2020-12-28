<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmrSummariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emr_summaries', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('patient_id')->nullable();
            $table->string('therapy')->nullable();
            $table->string('patient_condition')->nullable();
            $table->string('therapy_plan')->nullable();

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
        Schema::dropIfExists('emr_summaries');
    }
}
