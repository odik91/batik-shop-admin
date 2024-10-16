<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Category extends Model
{
	use HasFactory, Notifiable, SoftDeletes;

	protected $guarded = [];
	protected $table = 'categories';

	public function getSubCategories() {
		return $this->hasMany(Subcategory::class, 'category_id', 'id');
	}
}
