<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    Schema::create('products', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('category_id')->nullable();
      $table->unsignedBigInteger('subcategory_id')->nullable();
      $table->unsignedBigInteger('unit_id')->nullable();
      $table->string('product');
      $table->string('slug');
      $table->longText('description')->nullable();
      $table->float('price');
      $table->float('discount')->nullable();
      $table->float('weight_estimation')->nullable();
      $table->enum('active', ['Y', 'T']);
      $table->timestamps();

      $table
        ->foreign('category_id')
        ->references('id')
        ->on('categories')
        ->onDelete('set null');

      $table
        ->foreign('subcategory_id')
        ->references('id')
        ->on('subcategories')
        ->onDelete('set null');

      $table
        ->foreign('unit_id')
        ->references('id')
        ->on('units')
        ->onDelete('set null');
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('products');
  }
};
