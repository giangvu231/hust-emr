<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmrsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emrs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('emr_id');
            $table->string('patient_id');
            $table->string('vital_id')->nullable();
            $table->string('soap_id')->nullable();
            $table->string('diagnosishealth_id')->nullable();
            $table->string('subclinical_id')->nullable();
            $table->string('appointment_id')->nullable();
            // $table->string('emr_mngtcol')->nullable();
            $table->string('patient_history_id')->nullable();
            $table->string('lab_id')->nullable();
            $table->string('diagnosis_id')->nullable();
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
        Schema::dropIfExists('emrs');
    }
}
