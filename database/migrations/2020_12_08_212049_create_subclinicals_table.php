<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubclinicalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subclinicals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('patient_id');
            $table->longText('lab_order');
            $table->longText('lab_result');
            $table->longText('imaging_order');
            $table->longText('imaging_result');
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
        Schema::dropIfExists('subclinicals');
    }
}
