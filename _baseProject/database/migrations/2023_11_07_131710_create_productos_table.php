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
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('codigo');
            $table->string('descripcion')->nullable();
            $table->string('marca')->nullable();
            $table->string('talle')->nullable();
            $table->string('tipodeprenda')->nullable();
            $table->string('color')->nullable();
            $table->decimal('precioCosto', 10, 2)->nullable();
            $table->decimal('precioFinal', 10, 2)->nullable();
            $table->string('imagen')->nullable();
            $table->bigInteger('cantidad')->nullable();
            $table->unsignedBigInteger('proveedor')->nullable();
            $table->unsignedBigInteger('producto_id')->nullable();
            $table->timestamps();

            $table->foreign('proveedor')->references('id')->on('proveedors');
            $table->foreign('producto_id')->references('id')->on('ventas')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
};
