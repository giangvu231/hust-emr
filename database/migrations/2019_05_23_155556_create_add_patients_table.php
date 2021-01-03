<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddPatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('add_patients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('unique_id')->unique();
            $table->string('pid')->unique();


            $table->string('title')->nullable();
            $table->string('full_name');
            $table->string('email')->unique();
            $table->string('phone_number');
            $table->string('occupation')->nullable();
            $table->string('sex')->nullable();
            $table->string('dob')->nullable();
            $table->string('religion')->nullable();
            $table->string('nationality')->nullable();
            $table->string('home_address')->nullable();
            $table->string('work_address')->nullable();
            $table->string('place_of_birth')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('name_next_of_kin')->nullable();
            $table->string('phone_next_of_kin')->nullable();
            $table->string('home_next_of_kin')->nullable();
            $table->string('type_of_object')->nullable();
            $table->string('race')->nullable();
            $table->string('foreign')->nullable();
            $table->string('health_insurance_id')->nullable();
            $table->string('health_insurance_date')->nullable();
            $table->string('job_id')->nullable();
            $table->string('job_code')->nullable();
            $table->string('job_name')->nullable();

            $table->string('userid')->nullable();
            $table->string('username')->nullable();
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
        Schema::dropIfExists('add_patients');
    }
}
