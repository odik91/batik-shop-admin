<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Province;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RegionSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 */
	public function run(): void
	{
		$now = Carbon::now();
		$data = [
			[
				'province' => 'Aceh',
				'code' => 'ID-AC',
				'created_at' => $now, 
				'updated_at' => $now
			],
			[
				'province' => 'Sumatra Utara',
				'code' => 'ID-SU',
				'created_at' => $now, 
				'updated_at' => $now
			],
			[
				'province' => 'Sumatra Barat',
				'code' => 'ID-SB',
				'created_at' => $now, 
				'updated_at' => $now
			],
			[
				'province' => 'Riau',
				'code' => 'ID-RI',
				'created_at' => $now, 
				'updated_at' => $now
			],
			[
				'province' => 'Jambi',
				'code' => 'ID-JA',
				'created_at' => $now, 
				'updated_at' => $now
			],
			[
				'province' => 'Sumatra Selatan',
				'code' => 'ID-SS',
				'created_at' => $now, 
				'updated_at' => $now
			],
			[
				'province' => 'Bengkulu',
				'code' => 'ID-BE',
				'created_at' => $now, 
				'updated_at' => $now
			],
			[
				'province' => 'Lampung',
				'code' => 'ID-LA',
				'created_at' => $now, 
				'updated_at' => $now
			],
			[
				'province' => 'Kepulauan Bangka Belitung',
				'code' => 'ID-BB',
				'created_at' => $now, 
				'updated_at' => $now
			],
			[
				'province' => 'Kepulauan Riau',
				'code' => 'ID-KR',
				'created_at' => $now, 
				'updated_at' => $now
			],
			[
				'province' => 'Daerah Khusus Ibukota Jakarta',
				'code' => 'ID-JK',
				'created_at' => $now, 
				'updated_at' => $now
			],
			[
				'province' => 'Jawa Barat',
				'code' => 'ID-JB',
				'created_at' => $now, 
				'updated_at' => $now
			],
			[
				'province' => 'Jawa Tengah',
				'code' => 'ID-JT',
				'created_at' => $now, 
				'updated_at' => $now
			],
			[
				'province' => 'Daerah Istimewa Yogyakarta',
				'code' => 'ID-YO',
				'created_at' => $now, 
				'updated_at' => $now
			],
			[
				'province' => 'Jawa Timur',
				'code' => 'ID-JI',
				'created_at' => $now, 
				'updated_at' => $now
			],
			[
				'province' => 'Banten',
				'code' => 'ID-BT',
				'created_at' => $now, 
				'updated_at' => $now
			],
			[
				'province' => 'Bali',
				'code' => 'ID-BA',
				'created_at' => $now, 
				'updated_at' => $now
			],
			[
				'province' => 'Nusa Tenggara Barat',
				'code' => 'ID-NB',
				'created_at' => $now, 
				'updated_at' => $now
			],
			[
				'province' => 'Nusa Tenggara Timur',
				'code' => 'ID-NT',
				'created_at' => $now, 
				'updated_at' => $now
			],
			[
				'province' => 'Kalimantan Barat',
				'code' => 'ID-KB',
				'created_at' => $now, 
				'updated_at' => $now
			],
			[
				'province' => 'Kalimantan Tengah',
				'code' => 'ID-KT',
				'created_at' => $now, 
				'updated_at' => $now
			],
			[
				'province' => 'Kalimantan Selatan',
				'code' => 'ID-KS',
				'created_at' => $now, 
				'updated_at' => $now
			],
			[
				'province' => 'Kalimantan Timur',
				'code' => 'ID-KI',
				'created_at' => $now, 
				'updated_at' => $now
			],
			[
				'province' => 'Kalimantan Utara',
				'code' => 'ID-KU',
				'created_at' => $now, 
				'updated_at' => $now
			],
			[
				'province' => 'Sulawesi Utara',
				'code' => 'ID-SA',
				'created_at' => $now, 
				'updated_at' => $now
			],
			[
				'province' => 'Sulawesi Tengah',
				'code' => 'ID-ST',
				'created_at' => $now, 
				'updated_at' => $now
			],
			[
				'province' => 'Sulawesi Selatan',
				'code' => 'ID-SN',
				'created_at' => $now, 
				'updated_at' => $now
			],
			[
				'province' => 'Sulawesi Tenggara',
				'code' => 'ID-SG',
				'created_at' => $now, 
				'updated_at' => $now
			],
			[
				'province' => 'Gorontalo',
				'code' => 'ID-GO',
				'created_at' => $now, 
				'updated_at' => $now
			],
			[
				'province' => 'Sulawesi Barat',
				'code' => 'ID-SR',
				'created_at' => $now, 
				'updated_at' => $now
			],
			[
				'province' => 'Maluku',
				'code' => 'ID-MA',
				'created_at' => $now, 
				'updated_at' => $now
			],
			[
				'province' => 'Maluku Utara',
				'code' => 'ID-MU',
				'created_at' => $now, 
				'updated_at' => $now
			],
			[
				'province' => 'Papua',
				'code' => 'ID-PA',
				'created_at' => $now, 
				'updated_at' => $now
			],
			[
				'province' => 'Papua Barat',
				'code' => 'ID-PB',
				'created_at' => $now, 
				'updated_at' => $now
			],
		];			

		Province::insert($data);			
	}
}
