<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class OrderDetail extends Model
{
	use HasFactory, Notifiable, HasUuids;
	protected $guarded = [];

	public function getProduct()
	{
		return $this->belongsTo(Product::class, 'product_id', 'id');
	}
}
