<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiagnosishealthsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diagnosishealths', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('patient_id');
            $table->string('diagnosis_type');
            $table->string('diagnosis_header');
            $table->string('icd10_id');
            $table->string('icd10_name');
            $table->string('start_date');
            $table->string('end_date');
            $table->string('diagnosis_status');
            $table->longText('diagnosis_note');
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
        Schema::dropIfExists('diagnosishealths');
    }
}
