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
		Schema::create('order_details', function (Blueprint $table) {
			$table->uuid('id')->primary();
			$table->string('order_id');
			$table->unsignedBigInteger('product_id');
			$table->unsignedBigInteger('color_id')->nullable();
			$table->unsignedBigInteger('size_id')->nullable();
			$table->float('total_item');
			$table->float('price');
			$table->float('discount')->nullable();
			$table->float('total');
			$table->timestamps();

			$table->foreign('order_id')
				->references('id')
				->on('orders')
				->onDelete('cascade');

			$table->foreign('product_id')
				->references('id')
				->on('products')
				->onDelete('cascade');
		});
	}


	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('order_details');
	}
};
