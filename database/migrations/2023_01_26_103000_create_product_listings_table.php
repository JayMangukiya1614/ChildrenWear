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
        Schema::create('product_listings', function (Blueprint $table) {
            $table->id();
            $table->string('AD_ID')->nullable();
            $table->string('token')->nullable();
            $table->string('shopname')->nullable();
            $table->string('category')->nullable();
            $table->string('productname')->nullable();
            $table->string('price')->nullable();
            $table->string('discount')->nullable();
            $table->string('selling')->nullable();
            $table->string('age')->nullable();
            $table->string('size')->nullable();
            $table->string('collection')->nullable();
            $table->string('color')->nullable();
            $table->string('stock')->nullable();
            $table->string('description','500')->nullable();
            $table->string('Ldescription','1000')->nullable();
            $table->string('productimage')->nullable();
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
        Schema::dropIfExists('product_listings');
    }
};
