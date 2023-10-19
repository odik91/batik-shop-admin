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
		Schema::create('carts', function (Blueprint $table) {
			$table->uuid('id')->primary();
			$table->unsignedBigInteger('user_id');
			$table->unsignedBigInteger('product_id');
			$table->unsignedBigInteger('size_id')->nullable();
			$table->unsignedBigInteger('color_id')->nullable();
			$table->float('quantity');
			$table->timestamps();

			$table
				->foreign('user_id')
				->references('id')
				->on('users')
				->onDelete('cascade');

			$table
				->foreign('product_id')
				->references('id')
				->on('products')
				->onDelete('cascade');

			$table
				->foreign('size_id')
				->references('id')
				->on('sizes')
				->onDelete('set null');

			$table
				->foreign('color_id')
				->references('id')
				->on('colors')
				->onDelete('set null');
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('carts');
	}
};
