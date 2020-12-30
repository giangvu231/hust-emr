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

            $table->longText('diagnosis_tuanhoan')->nullable();
            $table->longText('diagnosis_hohap')->nullable();
            $table->longText('diagnosis_tieuhoa')->nullable();
            $table->longText('diagnosis_than_tietnieu_sinhduc')->nullable();
            $table->longText('diagnosis_thankinh')->nullable();
            $table->longText('diagnosis_coxuongkhop')->nullable();
            $table->longText('diagnosis_taimuihong')->nullable();
            $table->longText('diagnosis_ranghammat')->nullable();
            $table->longText('diagnosis_mat')->nullable();
            $table->longText('diagnosis_noitiet_dinhduong_khac')->nullable();
            $table->longText('diagnosis_syndrome')->nullable();

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
