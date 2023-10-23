<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class Order extends Model
{
	use HasFactory, Notifiable, HasUuids;
	protected $guarded = [];

	public function getOrderItems()
	{
		return $this->hasMany(OrderDetail::class, 'order_id', 'id');
	}

	public static function generateInvoice($param)
	{
		HelperModel::tryResetSequences('invoice_sequence');

		$prefix = $param . substr(date('Y'), -2) . date('m');

		$maxSequence = DB::table('invoice_sequence')->max('id');
		$next_value = $maxSequence == "" ? 1 : $maxSequence++;

		DB::table('invoice_sequence')->insert([]);
		
		// Concatenate the prefix and the next value with leading zeros
		$no_ref = $prefix . str_pad($next_value, 5, '0', STR_PAD_LEFT);

		return $no_ref;
	}

}
