<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('spkos', function (Blueprint $table) {
            $table->increments('id_spko');
            $table->text('remarks')->nullable();
            $table->integer('employee')->unsigned();
            $table->date('trans_date');
            $table->string('process', 20);
            $table->string('sw', 25)->nullable();
            $table->timestamps();

            $table->foreign('employee')->references('id_employee')->on('employees')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('spkos');
    }
};
