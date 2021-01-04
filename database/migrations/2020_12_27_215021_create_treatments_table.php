<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTreatmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('treatments', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('patient_id')->nullable();

            $table->longText('disease_main')->nullable();
            $table->longText('disease_sub')->nullable();
            $table->longText('disease_difference')->nullable();
            $table->longText('disease_prognosis')->nullable();
            $table->longText('disease_plan')->nullable();
            $table->string('department')->nullable();
            $table->string('room')->nullable();
            $table->string('bed_id')->nullable();
            $table->string('reason_count')->nullable();

            $table->string('icd10_admit_id')->nullable();
            $table->string('icd10_admit_name')->nullable();
            $table->string('icd10_admit_code')->nullable();
            $table->string('icd10_emergency_id')->nullable();
            $table->string('icd10_emergency_name')->nullable();
            $table->string('icd10_emergency_code')->nullable();
            $table->string('icd10_treatment_id')->nullable();
            $table->string('icd10_treatment_name')->nullable();
            $table->string('icd10_treatment_code')->nullable();

            $table->string('dept_name_2nd')->nullable();
            $table->string('dept_time_2nd')->nullable();
            $table->string('dept_name_3rd')->nullable();
            $table->string('dept_time_3rd')->nullable();
            $table->string('dept_name_4th')->nullable();
            $table->string('dept_time_4th')->nullable();

            $table->string('hosp_transfer_type')->nullable();
            $table->string('hosp_transfer_name')->nullable();

            $table->string('diagnosis_procedure')->nullable();
            $table->string('diagnosis_surgery')->nullable();

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
        Schema::dropIfExists('treatments');
    }
}
