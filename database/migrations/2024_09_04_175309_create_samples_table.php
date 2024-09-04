<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('samples', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patient_id');  // Foreign key to patients table
            $table->string('sample_type');
            $table->date('collection_date');
            $table->string('collected_by');
            $table->string('status')->default('Pending');
            $table->unsignedBigInteger('location')->nullable();  // Location can be null initially
            $table->text('comments')->nullable();
            $table->timestamps();
            // Foreign key constraint
            $table->foreign('patient_id')->references('id')->on('patients')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('samples');
    }
};
