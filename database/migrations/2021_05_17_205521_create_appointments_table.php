<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->unsignedBigInteger('availability_id');
            $table->unsignedBigInteger('patient_id');
            $table->timestamp('created_at')->index();

            $table->primary(['availability_id', 'patient_id']);

            $table->foreign('availability_id', 'fk_appointment_availability')
                ->references('id')
                ->on('availabilities')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('patient_id', 'fk_appointment_patien')
                ->references('id')
                ->on('patients')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appointments');
    }
}
