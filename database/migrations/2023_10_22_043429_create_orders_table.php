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
		Schema::create('orders', function (Blueprint $table) {
			$table->uuid('id')->primary();
			$table->unsignedBigInteger('user_id');
			$table->string('invoice');
			$table->enum('status', ['ordered', 'waiting payment', 'paid', 'process', 'deliver', 'recieved', 'completed', 'complaint', 'refound', 'closed', 'rejected', 'canceled']);
			$table->longText('description')->nullable();
			$table->unsignedBigInteger('province_id')->nullable();
			$table->unsignedBigInteger('city_id')->nullable();
			$table->string('courier');
			$table->string('service')->nullable();
			$table->float('shipping_expenses')->nullable();
			$table->float('wight')->nullable();
			$table->float('total')->nullable();
			$table->enum('payment_term', ['pickup', 'cod', 'transfer'])->nullable();
			$table->string('file')->nullable();
			$table->enum('payment_approvement', ['approve', 'reject'])->nullable();
			$table->timestamps();

			$table
				->foreign('user_id')
				->references('id')
				->on('users')
				->onDelete('cascade');

			$table->foreign('province_id')
				->references('id')
				->on('provinces')
				->onDelete('set null');

			$table
				->foreign('city_id')
				->references('id')
				->on('cities')
				->onDelete('set null');
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('orders');
	}
};
