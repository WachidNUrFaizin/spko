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
        Schema::create('spko_items', function (Blueprint $table) {
            $table->increments('idm');
            $table->integer('ordinal');
            $table->integer('idm_spko')->unsigned();
            $table->integer('id_product')->unsigned();
            $table->integer('qty');
            $table->timestamps();

            $table->foreign('id_product')->references('id_product')->on('products')->onDelete('cascade');
            $table->foreign('idm_spko')->references('id_spko')->on('spkos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('spko_items');
    }
};
