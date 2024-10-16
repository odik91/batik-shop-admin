<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class HelperModel extends Model
{
	use HasFactory, Notifiable, SoftDeletes;
	protected $table = 'reset_sequences';

	public static function tryResetSequences($sequenceName)
	{
		try {
			if (date('d') !== '1') {
				$isReset = ResetSequence::where('nama_sequence', $sequenceName)->where('tanggal_reset', Carbon::now()->format('Y-m-01'))->first();
				if ($isReset !== null) {
					return;
				}
			}
			$sql = "ALTER TABLE {$sequenceName}";
			DB::statement($sql);
			ResetSequence::create([
				'nama_sequence' => $sequenceName,
				'tanggal_reset' =>  Carbon::now()->format('Y-m-01'),
			]);
		} catch (\Exception $e) {
			throw new \Exception($e->getMessage());
		}
	}
}
