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
