<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class ResetSequence extends Model
{
	use HasFactory, Notifiable, SoftDeletes;
	protected $table = 'reset_sequences';
	protected $primaryKey = 'id';
	protected $guarded = [];

}
