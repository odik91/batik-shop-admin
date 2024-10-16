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
				"province" => "Bali"
			],
			[
				"province" => "Bangka Belitung"
			],
			[
				"province" => "Banten"
			],
			[
				"province" => "Bengkulu"
			],
			[
				"province" => "DI Yogyakarta"
			],
			[
				"province" => "DKI Jakarta"
			],
			[
				"province" => "Gorontalo"
			],
			[
				"province" => "Jambi"
			],
			[
				"province" => "Jawa Barat"
			],
			[
				"province" => "Jawa Tengah"
			],
			[
				"province" => "Jawa Timur"
			],
			[
				"province" => "Kalimantan Barat"
			],
			[
				"province" => "Kalimantan Selatan"
			],
			[
				"province" => "Kalimantan Tengah"
			],
			[
				"province" => "Kalimantan Timur"
			],
			[
				"province" => "Kalimantan Utara"
			],
			[
				"province" => "Kepulauan Riau"
			],
			[
				"province" => "Lampung"
			],
			[
				"province" => "Maluku"
			],
			[
				"province" => "Maluku Utara"
			],
			[
				"province" => "Nanggroe Aceh Darussalam (NAD)"
			],
			[
				"province" => "Nusa Tenggara Barat (NTB)"
			],
			[
				"province" => "Nusa Tenggara Timur (NTT)"
			],
			[
				"province" => "Papua"
			],
			[
				"province" => "Papua Barat"
			],
			[
				"province" => "Riau"
			],
			[
				"province" => "Sulawesi Barat"
			],
			[
				"province" => "Sulawesi Selatan"
			],
			[
				"province" => "Sulawesi Tengah"
			],
			[
				"province" => "Sulawesi Tenggara"
			],
			[
				"province" => "Sulawesi Utara"
			],
			[
				"province" => "Sumatera Barat"
			],
			[
				"province" => "Sumatera Selatan"
			],
			[
				"province" => "Sumatera Utara"
			],
		];

		Province::insert($data);
	}
}
