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
        Schema::create('adminregs', function (Blueprint $table) {
            $table->id();
            $table->string('AD_ID')->nullable();
            $table->string('token')->nullable()->comment('0: requested; 1confirmed: ; 2:rejected');
            $table->string('firstname')->nullable();
            $table->string('lastname')->nullable();
            $table->string('middlename')->nullable();
            $table->string('shopname')->nullable();
            $table->string('pincode')->nullable();
            $table->string('education')->nullable();
            $table->string('gender')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->string('mobilenumber')->nullable();
            $table->string('gstno')->nullable();
            $table->string('bankname')->nullable();
            $table->string('branchname')->nullable();
            $table->string('ifsccode')->nullable();
            $table->string('email')->nullable();
            $table->string('password')->nullable();
            $table->string('address')->nullable();
            $table->string('message')->nullable();
            $table->string('profileimage')->nullable();

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
        Schema::dropIfExists('adminregs');
    }
};
