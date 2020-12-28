<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHospitalHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hospital_histories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('patient_id');
            $table->string('date_attented')->nullable();
            $table->string('date_admitted')->nullable();
            $table->string('symptoms')->nullable();
            $table->string('comment_box')->nullable();
            $table->string('modal_id')->unique()->nullable();
            $table->string('admit_dept')->nullable();
            $table->string('refer_dept')->nullable();
            $table->longText('disease_in')->nullable();
            $table->longText('disease_out')->nullable();
            $table->longText('reason')->nullable();
            $table->string('reason_date')->nullable();
            $table->string('disease_diung')->nullable();
            $table->string('disease_diung_time')->nullable();
            $table->string('disease_matuy')->nullable();
            $table->string('disease_matuy_time')->nullable();
            $table->string('disease_ruoubia')->nullable();
            $table->string('disease_ruoubia_time')->nullable();
            $table->string('disease_thuocla')->nullable();
            $table->string('disease_thuocla_time')->nullable();
            $table->string('disease_thuoclao')->nullable();
            $table->string('disease_thuoclao_time')->nullable();
            $table->string('disease_khac')->nullable();
            $table->string('disease_khac_time')->nullable();
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
        Schema::dropIfExists('hospital_histories');
    }
}
