<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class ProductSize extends Model
{
	use HasFactory, Notifiable;

	protected $guarded = [];

	public function getDetailSize() {
		return $this->belongsTo(Size::class, 'size_id', 'id');
	}
}
