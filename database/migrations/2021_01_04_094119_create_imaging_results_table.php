<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagingResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imaging_results', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('patient_id');
            $table->string('diagnose_id')->unique()->nullable();
            $table->string('type')->nullable();
            $table->string('comment')->nullable();
            $table->string('imaging_id')->nullable();
            $table->string('imaging_code')->nullable();
            $table->string('imaging_name')->nullable();

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
        Schema::dropIfExists('imaging_results');
    }
}
