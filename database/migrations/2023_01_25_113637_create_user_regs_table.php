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
    Schema::create('user_regs', function (Blueprint $table) {
      $table->id();
      $table->string('FirstName')->nullable();
      $table->string('LastName')->nullable();
      $table->string('Address')->nullable;
      $table->string('BirthDate')->nullable();
      $table->string('PhoneNo')->nullable;
      $table->string('Gender')->nullable;
      $table->string('Email')->nullable;
      $table->string('Password')->nullable;

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
    Schema::dropIfExists('user_regs');
  }
};
