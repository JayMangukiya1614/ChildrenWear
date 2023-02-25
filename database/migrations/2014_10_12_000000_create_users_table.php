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
    Schema::create('users', function (Blueprint $table) {
      $table->id();
      $table->string('CI_ID')->nullable();
      $table->string('FirstName')->nullable();
      $table->string('LastName')->nullable();
      $table->string('Address')->nullable();
      $table->string('State')->nullable();
      $table->string('City')->nullable();
      $table->string('Address')->nullable;
      $table->string('ZipCode')->nullable;
      $table->string('State')->nullable;
      $table->string('City')->nullable;
      $table->string('BirthDate')->nullable();
      $table->string('PhoneNo')->nullable();
      $table->string('Gender')->nullable();
      $table->string('Email')->nullable();
      $table->string('Password')->nullable();
      $table->string('ZipCode')->nullable();
      $table->timestamp('email_verified_at')->nullable();
      $table->rememberToken();
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
    Schema::dropIfExists('users');
  }
};