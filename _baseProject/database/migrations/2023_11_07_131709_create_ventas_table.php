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
        Schema::create('ventas', function (Blueprint $table) {
            $table->id();
            $table->string('vendedor')->nullable();
            $table->bigInteger('cantidadprenda')->nullable();
            $table->string('transacciontipo')->nullable();
            $table->string('codigotransaccion')->nullable();
            $table->bigInteger('monto')->nullable();
            $table->string('descripcion')->nullable();
            $table->unsignedBigInteger('producto')->nullable();
            $table->string('formadepago')->nullable();
            $table->string('operacion')->nullable();
            $table->bigInteger('cantidaddelooperado')->nullable();
            $table->string('comprobantepago')->nullable();
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
        Schema::dropIfExists('ventas');
    }
};
