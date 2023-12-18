<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('order_line', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('beli');
            $table->foreign('beli')->references('id')->on('beli');

            $table->unsignedBigInteger('foods');
            $table->foreign('foods')->references('id')->on('foods');

            $table->string('nama_penerima');
            $table->string('alamat');
            $table->integer('subtotal');
            $table->timestamps();
        });

    }

    public function down(): void
    {
        Schema::dropIfExists('order_line');
    }
};
