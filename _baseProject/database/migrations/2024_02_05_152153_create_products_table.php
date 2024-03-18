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
        Schema::create('products', function (Blueprint $table) {

            $table->id();
            $table->string('code');
            $table->string('description')->nullable();
            $table->string('brand')->nullable();
            $table->string('size')->nullable();
            $table->string('typeClothes')->nullable();
            $table->string('color')->nullable();
            $table->decimal('costPrice', 10, 2)->nullable();
            $table->decimal('finalPrice', 10, 2)->nullable();
            $table->string('image')->nullable();
            $table->bigInteger('quantity')->nullable();
            $table->timestamps();

            // $table->unsignedBigInteger('proveedor')->nullable();
            // $table->unsignedBigInteger('producto_id')->nullable();
            // $table->foreign('proveedor')->references('id')->on('proveedors');
            // $table->foreign('producto_id')->references('id')->on('ventas')->onUpdate('cascade')->onDelete('cascade');

            





        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
