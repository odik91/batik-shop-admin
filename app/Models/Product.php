<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Product extends Model
{
	use HasFactory, Notifiable;
	protected $guarded = [];

	public function getGalleries() {
		return $this->hasMany(ProductGallery::class, 'product_id', 'id');
	}
}
