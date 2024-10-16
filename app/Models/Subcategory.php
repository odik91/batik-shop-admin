<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Subcategory extends Model
{
	use HasFactory, Notifiable, SoftDeletes;

	protected $guarded = [];

	public function getCategory()
	{
		return $this->belongsTo(Category::class, 'category_id', 'id');
	}
}
