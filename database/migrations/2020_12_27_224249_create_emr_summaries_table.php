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

            $table->string('discharge_type')->nullable();
            $table->string('discharge_time')->nullable();

            $table->string('discharge_maindisease_id')->nullable();
            $table->string('discharge_maindisease_code')->nullable();
            $table->longText('discharge_maindisease_name')->nullable();

            $table->string('discharge_subdisease_id')->nullable();
            $table->string('discharge_subdisease_code')->nullable();
            $table->longText('discharge_subdisease_name')->nullable();

            $table->string('death_reason_id')->nullable();
            $table->string('death_reason_code')->nullable();
            $table->longText('death_reason_name')->nullable();

            $table->string('autopsy_diagnosis_id')->nullable();
            $table->string('autopsy_diagnosis_code')->nullable();
            $table->longText('autopsy_diagnosis_name')->nullable();

            $table->longText('discharge_stroke')->nullable();
            $table->longText('discharge_complication')->nullable();

            $table->longText('treatment_result')->nullable();
            $table->longText('anapath')->nullable();

            $table->longText('death_type')->nullable();
            $table->longText('death_time')->nullable();
            $table->longText('death_time_range')->nullable();
            $table->longText('autopsy')->nullable();

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
