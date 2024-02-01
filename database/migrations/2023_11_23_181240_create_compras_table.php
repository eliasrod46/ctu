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
        Schema::create('compras', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion')->nullable();
            $table->decimal('compraconcaja', 10, 2)->nullable();
            $table->decimal('compraconotro', 10, 2)->nullable();
            $table->string('comprador')->nullable();
            $table->string('formadepago')->nullable();
            $table->string('comprobantepago')->nullable();
            $table->string('factura')->nullable();
            $table->timestampTz('fecha_y_hora')->default(now());
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
        Schema::dropIfExists('compras');
    }
};
