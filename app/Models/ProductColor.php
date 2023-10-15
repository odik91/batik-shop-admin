<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class ProductColor extends Model
{
	use HasFactory, Notifiable;

	protected $guarded = [];

	public function getDetailColor() {
		return $this->belongsTo(Color::class, 'color_id', 'id');
	}
}
