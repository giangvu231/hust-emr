<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSoapsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('soaps', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('patient_id');
            $table->longText('subjective');
            $table->longText('objective');
            $table->longText('assessment');
            $table->longText('plan');
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
        Schema::dropIfExists('soaps');
    }
}