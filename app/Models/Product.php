<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Product extends Model
{
	use HasFactory, Notifiable;
	protected $guarded = [];

	public function getGalleries()
	{
		return $this->hasMany(ProductGallery::class, 'product_id', 'id');
	}

	public function getSizes()
	{
		return $this->hasMany(ProductSize::class, 'product_id', 'id');
	}

	public function getColors()
	{
		return $this->hasMany(ProductColor::class, 'product_id', 'id');
	}

	public function getSubcategory()
	{
		return $this->belongsTo(Subcategory::class, 'subcategory_id', 'id');
	}

	public function getUnit()
	{
		return $this->belongsTo(Unit::class, 'unit_id', 'id');
	}
}
