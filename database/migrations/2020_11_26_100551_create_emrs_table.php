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
            $table->string('appointment_id')->nullable();
            $table->string('lab_id')->nullable();
            $table->string('imaging_id')->nullable();
            $table->string('pham_id')->nullable();
            $table->string('treatment_id')->nullable();
            $table->string('emr_summary_id')->nullable();
            $table->string('medicine_id')->nullable();
            $table->string('pham_id')->nullable();

            $table->string('medical_user_id')->nullable();
            $table->string('medical_user_name')->nullable();
            $table->string('treatment_user_id')->nullable();
            $table->string('treatment_user_name')->nullable();

            $table->string('emr_type')->nullable();

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
