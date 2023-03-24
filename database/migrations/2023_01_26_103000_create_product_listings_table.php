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
            $table->string('token')->nullable()->comment('1:confirmed;  2:rejected; 3:Account Delete;');
            $table->string('PI_ID')->nullable();
            $table->string('shopname')->nullable();
            $table->string('category')->nullable();
            $table->string('productname')->nullable();
            $table->float('price')->nullable();
            $table->integer('discount')->nullable();
            $table->float('selling')->nullable();
            $table->string('age')->nullable()->comment('1:0-6(Months); 2:6-24(Months); 3:2-4(Year): 4:4-6(Year); 5:6-8(Year); 6:8-10(Year): 7:10-12(Year);');
            $table->string('size')->nullable()->comment('1:XS; 2:S; 3:M: 4:L; 5:XL;');
            $table->string('collection')->nullable()->comment('1:Shirts; 2:T-Shirts; 3:Jeans And Trousers: 4:Sweatshirts; 5:Jackets; 6:Ethnic Wear: 7:Sets And Suits; 8:Tops And T-Shirts; 9:Jeans And Jeggings: 10:Jumpsuit And Dungarees; 11:Jackets; 12:Ethnic Wear:');
            $table->string('color')->nullable()->comment('1:Black; 2:White; 3:Red: 4:Blue; 5:Green;');
            $table->string('stock')->nullable()->comment('1:stock;  2:out of stock;');
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
