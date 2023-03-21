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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('OI_ID')->nullable();
            $table->string('token')->nullable()->comment('0:Pending; 1:confiremed;  2: delievered ; 3:deleted; 4:pdf; ');
            $table->string('CI_ID')->nullable();
            $table->string('product_id')->nullable();
            $table->string('AD_ID')->nullable();
            $table->string('age')->nullable();
            $table->string('color')->nullable();
            $table->string('size')->nullable();
            $table->integer('quantity')->nullable();
            $table->string('date')->nullable();
            $table->string('is_set')->nullable()->comment('0:Pending; 1:Pdf Doenload;  ');


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
        Schema::dropIfExists('orders');
    }
};
