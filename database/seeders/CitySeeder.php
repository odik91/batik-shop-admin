<?php

namespace Database\Seeders;

use App\Models\City;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 */
	public function run(): void
	{
		$now = Carbon::now();
		$city = [
			[
				"province_id" => 21,
				"type" => "Kabupaten",
				"city" => "Aceh Barat",
			],
			[
				"province_id" => 21,
				"type" => "Kabupaten",
				"city" => "Aceh Barat Daya",
			],
			[
				"province_id" => 21,
				"type" => "Kabupaten",
				"city" => "Aceh Besar",
			],
			[
				"province_id" => 21,
				"type" => "Kabupaten",
				"city" => "Aceh Jaya",
			],
			[
				"province_id" => 21,
				"type" => "Kabupaten",
				"city" => "Aceh Selatan",
			],
			[
				"province_id" => 21,
				"type" => "Kabupaten",
				"city" => "Aceh Singkil",
			],
			[
				"province_id" => 21,
				"type" => "Kabupaten",
				"city" => "Aceh Tamiang",
			],
			[
				"province_id" => 21,
				"type" => "Kabupaten",
				"city" => "Aceh Tengah",
			],
			[
				"province_id" => 21,
				"type" => "Kabupaten",
				"city" => "Aceh Tenggara",
			],
			[
				"province_id" => 21,
				"type" => "Kabupaten",
				"city" => "Aceh Timur",
			],
			[
				"province_id" => 21,
				"type" => "Kabupaten",
				"city" => "Aceh Utara",
			],
			[
				"province_id" => 32,
				"type" => "Kabupaten",
				"city" => "Agam",
			],
			[
				"province_id" => 23,
				"type" => "Kabupaten",
				"city" => "Alor",
			],
			[
				"province_id" => 19,
				"type" => "Kota",
				"city" => "Ambon",
			],
			[
				"province_id" => 34,
				"type" => "Kabupaten",
				"city" => "Asahan",
			],
			[
				"province_id" => 24,
				"type" => "Kabupaten",
				"city" => "Asmat",
			],
			[
				"province_id" => 1,
				"type" => "Kabupaten",
				"city" => "Badung",
			],
			[
				"province_id" => 13,
				"type" => "Kabupaten",
				"city" => "Balangan",
			],
			[
				"province_id" => 15,
				"type" => "Kota",
				"city" => "Balikpapan",
			],
			[
				"province_id" => 21,
				"type" => "Kota",
				"city" => "Banda Aceh",
			],
			[
				"province_id" => 18,
				"type" => "Kota",
				"city" => "Bandar Lampung",
			],
			[
				"province_id" => 9,
				"type" => "Kabupaten",
				"city" => "Bandung",
			],
			[
				"province_id" => 9,
				"type" => "Kota",
				"city" => "Bandung",
			],
			[
				"province_id" => 9,
				"type" => "Kabupaten",
				"city" => "Bandung Barat",
			],
			[
				"province_id" => 29,
				"type" => "Kabupaten",
				"city" => "Banggai",
			],
			[
				"province_id" => 29,
				"type" => "Kabupaten",
				"city" => "Banggai Kepulauan",
			],
			[
				"province_id" => 2,
				"type" => "Kabupaten",
				"city" => "Bangka",
			],
			[
				"province_id" => 2,
				"type" => "Kabupaten",
				"city" => "Bangka Barat",
			],
			[
				"province_id" => 2,
				"type" => "Kabupaten",
				"city" => "Bangka Selatan",
			],
			[
				"province_id" => 2,
				"type" => "Kabupaten",
				"city" => "Bangka Tengah",
			],
			[
				"province_id" => 11,
				"type" => "Kabupaten",
				"city" => "Bangkalan",
			],
			[
				"province_id" => 1,
				"type" => "Kabupaten",
				"city" => "Bangli",
			],
			[
				"province_id" => 13,
				"type" => "Kabupaten",
				"city" => "Banjar",
			],
			[
				"province_id" => 9,
				"type" => "Kota",
				"city" => "Banjar",
			],
			[
				"province_id" => 13,
				"type" => "Kota",
				"city" => "Banjarbaru",
			],
			[
				"province_id" => 13,
				"type" => "Kota",
				"city" => "Banjarmasin",
			],
			[
				"province_id" => 10,
				"type" => "Kabupaten",
				"city" => "Banjarnegara",
			],
			[
				"province_id" => 28,
				"type" => "Kabupaten",
				"city" => "Bantaeng",
			],
			[
				"province_id" => 5,
				"type" => "Kabupaten",
				"city" => "Bantul",
			],
			[
				"province_id" => 33,
				"type" => "Kabupaten",
				"city" => "Banyuasin",
			],
			[
				"province_id" => 10,
				"type" => "Kabupaten",
				"city" => "Banyumas",
			],
			[
				"province_id" => 11,
				"type" => "Kabupaten",
				"city" => "Banyuwangi",
			],
			[
				"province_id" => 13,
				"type" => "Kabupaten",
				"city" => "Barito Kuala",
			],
			[
				"province_id" => 14,
				"type" => "Kabupaten",
				"city" => "Barito Selatan",
			],
			[
				"province_id" => 14,
				"type" => "Kabupaten",
				"city" => "Barito Timur",
			],
			[
				"province_id" => 14,
				"type" => "Kabupaten",
				"city" => "Barito Utara",
			],
			[
				"province_id" => 28,
				"type" => "Kabupaten",
				"city" => "Barru",
			],
			[
				"province_id" => 17,
				"type" => "Kota",
				"city" => "Batam",
			],
			[
				"province_id" => 10,
				"type" => "Kabupaten",
				"city" => "Batang",
			],
			[
				"province_id" => 8,
				"type" => "Kabupaten",
				"city" => "Batang Hari",
			],
			[
				"province_id" => 11,
				"type" => "Kota",
				"city" => "Batu",
			],
			[
				"province_id" => 34,
				"type" => "Kabupaten",
				"city" => "Batu Bara",
			],
			[
				"province_id" => 30,
				"type" => "Kota",
				"city" => "Bau-Bau",
			],
			[
				"province_id" => 9,
				"type" => "Kabupaten",
				"city" => "Bekasi",
			],
			[
				"province_id" => 9,
				"type" => "Kota",
				"city" => "Bekasi",
			],
			[
				"province_id" => 2,
				"type" => "Kabupaten",
				"city" => "Belitung",
			],
			[
				"province_id" => 2,
				"type" => "Kabupaten",
				"city" => "Belitung Timur",
			],
			[
				"province_id" => 23,
				"type" => "Kabupaten",
				"city" => "Belu",
			],
			[
				"province_id" => 21,
				"type" => "Kabupaten",
				"city" => "Bener Meriah",
			],
			[
				"province_id" => 26,
				"type" => "Kabupaten",
				"city" => "Bengkalis",
			],
			[
				"province_id" => 12,
				"type" => "Kabupaten",
				"city" => "Bengkayang",
			],
			[
				"province_id" => 4,
				"type" => "Kota",
				"city" => "Bengkulu",
			],
			[
				"province_id" => 4,
				"type" => "Kabupaten",
				"city" => "Bengkulu Selatan",
			],
			[
				"province_id" => 4,
				"type" => "Kabupaten",
				"city" => "Bengkulu Tengah",
			],
			[
				"province_id" => 4,
				"type" => "Kabupaten",
				"city" => "Bengkulu Utara",
			],
			[
				"province_id" => 15,
				"type" => "Kabupaten",
				"city" => "Berau",
			],
			[
				"province_id" => 24,
				"type" => "Kabupaten",
				"city" => "Biak Numfor",
			],
			[
				"province_id" => 22,
				"type" => "Kabupaten",
				"city" => "Bima",
			],
			[
				"province_id" => 22,
				"type" => "Kota",
				"city" => "Bima",
			],
			[
				"province_id" => 34,
				"type" => "Kota",
				"city" => "Binjai",
			],
			[
				"province_id" => 17,
				"type" => "Kabupaten",
				"city" => "Bintan",
			],
			[
				"province_id" => 21,
				"type" => "Kabupaten",
				"city" => "Bireuen",
			],
			[
				"province_id" => 31,
				"type" => "Kota",
				"city" => "Bitung",
			],
			[
				"province_id" => 11,
				"type" => "Kabupaten",
				"city" => "Blitar",
			],
			[
				"province_id" => 11,
				"type" => "Kota",
				"city" => "Blitar",
			],
			[
				"province_id" => 10,
				"type" => "Kabupaten",
				"city" => "Blora",
			],
			[
				"province_id" => 7,
				"type" => "Kabupaten",
				"city" => "Boalemo",
			],
			[
				"province_id" => 9,
				"type" => "Kabupaten",
				"city" => "Bogor",
			],
			[
				"province_id" => 9,
				"type" => "Kota",
				"city" => "Bogor",
			],
			[
				"province_id" => 11,
				"type" => "Kabupaten",
				"city" => "Bojonegoro",
			],
			[
				"province_id" => 31,
				"type" => "Kabupaten",
				"city" => "Bolaang Mongondow (Bolmong)",
			],
			[
				"province_id" => 31,
				"type" => "Kabupaten",
				"city" => "Bolaang Mongondow Selatan",
			],
			[
				"province_id" => 31,
				"type" => "Kabupaten",
				"city" => "Bolaang Mongondow Timur",
			],
			[
				"province_id" => 31,
				"type" => "Kabupaten",
				"city" => "Bolaang Mongondow Utara",
			],
			[
				"province_id" => 30,
				"type" => "Kabupaten",
				"city" => "Bombana",
			],
			[
				"province_id" => 11,
				"type" => "Kabupaten",
				"city" => "Bondowoso",
			],
			[
				"province_id" => 28,
				"type" => "Kabupaten",
				"city" => "Bone",
			],
			[
				"province_id" => 7,
				"type" => "Kabupaten",
				"city" => "Bone Bolango",
			],
			[
				"province_id" => 15,
				"type" => "Kota",
				"city" => "Bontang",
			],
			[
				"province_id" => 24,
				"type" => "Kabupaten",
				"city" => "Boven Digoel",
			],
			[
				"province_id" => 10,
				"type" => "Kabupaten",
				"city" => "Boyolali",
			],
			[
				"province_id" => 10,
				"type" => "Kabupaten",
				"city" => "Brebes",
			],
			[
				"province_id" => 32,
				"type" => "Kota",
				"city" => "Bukittinggi",
			],
			[
				"province_id" => 1,
				"type" => "Kabupaten",
				"city" => "Buleleng",
			],
			[
				"province_id" => 28,
				"type" => "Kabupaten",
				"city" => "Bulukumba",
			],
			[
				"province_id" => 16,
				"type" => "Kabupaten",
				"city" => "Bulungan (Bulongan)",
			],
			[
				"province_id" => 8,
				"type" => "Kabupaten",
				"city" => "Bungo",
			],
			[
				"province_id" => 29,
				"type" => "Kabupaten",
				"city" => "Buol",
			],
			[
				"province_id" => 19,
				"type" => "Kabupaten",
				"city" => "Buru",
			],
			[
				"province_id" => 19,
				"type" => "Kabupaten",
				"city" => "Buru Selatan",
			],
			[
				"province_id" => 30,
				"type" => "Kabupaten",
				"city" => "Buton",
			],
			[
				"province_id" => 30,
				"type" => "Kabupaten",
				"city" => "Buton Utara",
			],
			[
				"province_id" => 9,
				"type" => "Kabupaten",
				"city" => "Ciamis",
			],
			[
				"province_id" => 9,
				"type" => "Kabupaten",
				"city" => "Cianjur",
			],
			[
				"province_id" => 10,
				"type" => "Kabupaten",
				"city" => "Cilacap",
			],
			[
				"province_id" => 3,
				"type" => "Kota",
				"city" => "Cilegon",
			],
			[
				"province_id" => 9,
				"type" => "Kota",
				"city" => "Cimahi",
			],
			[
				"province_id" => 9,
				"type" => "Kabupaten",
				"city" => "Cirebon",
			],
			[
				"province_id" => 9,
				"type" => "Kota",
				"city" => "Cirebon",
			],
			[
				"province_id" => 34,
				"type" => "Kabupaten",
				"city" => "Dairi",
			],
			[
				"province_id" => 24,
				"type" => "Kabupaten",
				"city" => "Deiyai (Deliyai)",
			],
			[
				"province_id" => 34,
				"type" => "Kabupaten",
				"city" => "Deli Serdang",
			],
			[
				"province_id" => 10,
				"type" => "Kabupaten",
				"city" => "Demak",
			],
			[
				"province_id" => 1,
				"type" => "Kota",
				"city" => "Denpasar",
			],
			[
				"province_id" => 9,
				"type" => "Kota",
				"city" => "Depok",
			],
			[
				"province_id" => 32,
				"type" => "Kabupaten",
				"city" => "Dharmasraya",
			],
			[
				"province_id" => 24,
				"type" => "Kabupaten",
				"city" => "Dogiyai",
			],
			[
				"province_id" => 22,
				"type" => "Kabupaten",
				"city" => "Dompu",
			],
			[
				"province_id" => 29,
				"type" => "Kabupaten",
				"city" => "Donggala",
			],
			[
				"province_id" => 26,
				"type" => "Kota",
				"city" => "Dumai",
			],
			[
				"province_id" => 33,
				"type" => "Kabupaten",
				"city" => "Empat Lawang",
			],
			[
				"province_id" => 23,
				"type" => "Kabupaten",
				"city" => "Ende",
			],
			[
				"province_id" => 28,
				"type" => "Kabupaten",
				"city" => "Enrekang",
			],
			[
				"province_id" => 25,
				"type" => "Kabupaten",
				"city" => "Fakfak",
			],
			[
				"province_id" => 23,
				"type" => "Kabupaten",
				"city" => "Flores Timur",
			],
			[
				"province_id" => 9,
				"type" => "Kabupaten",
				"city" => "Garut",
			],
			[
				"province_id" => 21,
				"type" => "Kabupaten",
				"city" => "Gayo Lues",
			],
			[
				"province_id" => 1,
				"type" => "Kabupaten",
				"city" => "Gianyar",
			],
			[
				"province_id" => 7,
				"type" => "Kabupaten",
				"city" => "Gorontalo",
			],
			[
				"province_id" => 7,
				"type" => "Kota",
				"city" => "Gorontalo",
			],
			[
				"province_id" => 7,
				"type" => "Kabupaten",
				"city" => "Gorontalo Utara",
			],
			[
				"province_id" => 28,
				"type" => "Kabupaten",
				"city" => "Gowa",
			],
			[
				"province_id" => 11,
				"type" => "Kabupaten",
				"city" => "Gresik",
			],
			[
				"province_id" => 10,
				"type" => "Kabupaten",
				"city" => "Grobogan",
			],
			[
				"province_id" => 5,
				"type" => "Kabupaten",
				"city" => "Gunung Kidul",
			],
			[
				"province_id" => 14,
				"type" => "Kabupaten",
				"city" => "Gunung Mas",
			],
			[
				"province_id" => 34,
				"type" => "Kota",
				"city" => "Gunungsitoli",
			],
			[
				"province_id" => 20,
				"type" => "Kabupaten",
				"city" => "Halmahera Barat",
			],
			[
				"province_id" => 20,
				"type" => "Kabupaten",
				"city" => "Halmahera Selatan",
			],
			[
				"province_id" => 20,
				"type" => "Kabupaten",
				"city" => "Halmahera Tengah",
			],
			[
				"province_id" => 20,
				"type" => "Kabupaten",
				"city" => "Halmahera Timur",
			],
			[
				"province_id" => 20,
				"type" => "Kabupaten",
				"city" => "Halmahera Utara",
			],
			[
				"province_id" => 13,
				"type" => "Kabupaten",
				"city" => "Hulu Sungai Selatan",
			],
			[
				"province_id" => 13,
				"type" => "Kabupaten",
				"city" => "Hulu Sungai Tengah",
			],
			[
				"province_id" => 13,
				"type" => "Kabupaten",
				"city" => "Hulu Sungai Utara",
			],
			[
				"province_id" => 34,
				"type" => "Kabupaten",
				"city" => "Humbang Hasundutan",
			],
			[
				"province_id" => 26,
				"type" => "Kabupaten",
				"city" => "Indragiri Hilir",
			],
			[
				"province_id" => 26,
				"type" => "Kabupaten",
				"city" => "Indragiri Hulu",
			],
			[
				"province_id" => 9,
				"type" => "Kabupaten",
				"city" => "Indramayu",
			],
			[
				"province_id" => 24,
				"type" => "Kabupaten",
				"city" => "Intan Jaya",
			],
			[
				"province_id" => 6,
				"type" => "Kota",
				"city" => "Jakarta Barat",
			],
			[
				"province_id" => 6,
				"type" => "Kota",
				"city" => "Jakarta Pusat",
			],
			[
				"province_id" => 6,
				"type" => "Kota",
				"city" => "Jakarta Selatan",
			],
			[
				"province_id" => 6,
				"type" => "Kota",
				"city" => "Jakarta Timur",
			],
			[
				"province_id" => 6,
				"type" => "Kota",
				"city" => "Jakarta Utara",
			],
			[
				"province_id" => 8,
				"type" => "Kota",
				"city" => "Jambi",
			],
			[
				"province_id" => 24,
				"type" => "Kabupaten",
				"city" => "Jayapura",
			],
			[
				"province_id" => 24,
				"type" => "Kota",
				"city" => "Jayapura",
			],
			[
				"province_id" => 24,
				"type" => "Kabupaten",
				"city" => "Jayawijaya",
			],
			[
				"province_id" => 11,
				"type" => "Kabupaten",
				"city" => "Jember",
			],
			[
				"province_id" => 1,
				"type" => "Kabupaten",
				"city" => "Jembrana",
			],
			[
				"province_id" => 28,
				"type" => "Kabupaten",
				"city" => "Jeneponto",
			],
			[
				"province_id" => 10,
				"type" => "Kabupaten",
				"city" => "Jepara",
			],
			[
				"province_id" => 11,
				"type" => "Kabupaten",
				"city" => "Jombang",
			],
			[
				"province_id" => 25,
				"type" => "Kabupaten",
				"city" => "Kaimana",
			],
			[
				"province_id" => 26,
				"type" => "Kabupaten",
				"city" => "Kampar",
			],
			[
				"province_id" => 14,
				"type" => "Kabupaten",
				"city" => "Kapuas",
			],
			[
				"province_id" => 12,
				"type" => "Kabupaten",
				"city" => "Kapuas Hulu",
			],
			[
				"province_id" => 10,
				"type" => "Kabupaten",
				"city" => "Karanganyar",
			],
			[
				"province_id" => 1,
				"type" => "Kabupaten",
				"city" => "Karangasem",
			],
			[
				"province_id" => 9,
				"type" => "Kabupaten",
				"city" => "Karawang",
			],
			[
				"province_id" => 17,
				"type" => "Kabupaten",
				"city" => "Karimun",
			],
			[
				"province_id" => 34,
				"type" => "Kabupaten",
				"city" => "Karo",
			],
			[
				"province_id" => 14,
				"type" => "Kabupaten",
				"city" => "Katingan",
			],
			[
				"province_id" => 4,
				"type" => "Kabupaten",
				"city" => "Kaur",
			],
			[
				"province_id" => 12,
				"type" => "Kabupaten",
				"city" => "Kayong Utara",
			],
			[
				"province_id" => 10,
				"type" => "Kabupaten",
				"city" => "Kebumen",
			],
			[
				"province_id" => 11,
				"type" => "Kabupaten",
				"city" => "Kediri",
			],
			[
				"province_id" => 11,
				"type" => "Kota",
				"city" => "Kediri",
			],
			[
				"province_id" => 24,
				"type" => "Kabupaten",
				"city" => "Keerom",
			],
			[
				"province_id" => 10,
				"type" => "Kabupaten",
				"city" => "Kendal",
			],
			[
				"province_id" => 30,
				"type" => "Kota",
				"city" => "Kendari",
			],
			[
				"province_id" => 4,
				"type" => "Kabupaten",
				"city" => "Kepahiang",
			],
			[
				"province_id" => 17,
				"type" => "Kabupaten",
				"city" => "Kepulauan Anambas",
			],
			[
				"province_id" => 19,
				"type" => "Kabupaten",
				"city" => "Kepulauan Aru",
			],
			[
				"province_id" => 32,
				"type" => "Kabupaten",
				"city" => "Kepulauan Mentawai",
			],
			[
				"province_id" => 26,
				"type" => "Kabupaten",
				"city" => "Kepulauan Meranti",
			],
			[
				"province_id" => 31,
				"type" => "Kabupaten",
				"city" => "Kepulauan Sangihe",
			],
			[
				"province_id" => 6,
				"type" => "Kabupaten",
				"city" => "Kepulauan Seribu",
			],
			[
				"province_id" => 31,
				"type" => "Kabupaten",
				"city" => "Kepulauan Siau Tagulandang Biaro (Sitaro)",
			],
			[
				"province_id" => 20,
				"type" => "Kabupaten",
				"city" => "Kepulauan Sula",
			],
			[
				"province_id" => 31,
				"type" => "Kabupaten",
				"city" => "Kepulauan Talaud",
			],
			[
				"province_id" => 24,
				"type" => "Kabupaten",
				"city" => "Kepulauan Yapen (Yapen Waropen)",
			],
			[
				"province_id" => 8,
				"type" => "Kabupaten",
				"city" => "Kerinci",
			],
			[
				"province_id" => 12,
				"type" => "Kabupaten",
				"city" => "Ketapang",
			],
			[
				"province_id" => 10,
				"type" => "Kabupaten",
				"city" => "Klaten",
			],
			[
				"province_id" => 1,
				"type" => "Kabupaten",
				"city" => "Klungkung",
			],
			[
				"province_id" => 30,
				"type" => "Kabupaten",
				"city" => "Kolaka",
			],
			[
				"province_id" => 30,
				"type" => "Kabupaten",
				"city" => "Kolaka Utara",
			],
			[
				"province_id" => 30,
				"type" => "Kabupaten",
				"city" => "Konawe",
			],
			[
				"province_id" => 30,
				"type" => "Kabupaten",
				"city" => "Konawe Selatan",
			],
			[
				"province_id" => 30,
				"type" => "Kabupaten",
				"city" => "Konawe Utara",
			],
			[
				"province_id" => 13,
				"type" => "Kabupaten",
				"city" => "Kotabaru",
			],
			[
				"province_id" => 31,
				"type" => "Kota",
				"city" => "Kotamobagu",
			],
			[
				"province_id" => 14,
				"type" => "Kabupaten",
				"city" => "Kotawaringin Barat",
			],
			[
				"province_id" => 14,
				"type" => "Kabupaten",
				"city" => "Kotawaringin Timur",
			],
			[
				"province_id" => 26,
				"type" => "Kabupaten",
				"city" => "Kuantan Singingi",
			],
			[
				"province_id" => 12,
				"type" => "Kabupaten",
				"city" => "Kubu Raya",
			],
			[
				"province_id" => 10,
				"type" => "Kabupaten",
				"city" => "Kudus",
			],
			[
				"province_id" => 5,
				"type" => "Kabupaten",
				"city" => "Kulon Progo",
			],
			[
				"province_id" => 9,
				"type" => "Kabupaten",
				"city" => "Kuningan",
			],
			[
				"province_id" => 23,
				"type" => "Kabupaten",
				"city" => "Kupang",
			],
			[
				"province_id" => 23,
				"type" => "Kota",
				"city" => "Kupang",
			],
			[
				"province_id" => 15,
				"type" => "Kabupaten",
				"city" => "Kutai Barat",
			],
			[
				"province_id" => 15,
				"type" => "Kabupaten",
				"city" => "Kutai Kartanegara",
			],
			[
				"province_id" => 15,
				"type" => "Kabupaten",
				"city" => "Kutai Timur",
			],
			[
				"province_id" => 34,
				"type" => "Kabupaten",
				"city" => "Labuhan Batu",
			],
			[
				"province_id" => 34,
				"type" => "Kabupaten",
				"city" => "Labuhan Batu Selatan",
			],
			[
				"province_id" => 34,
				"type" => "Kabupaten",
				"city" => "Labuhan Batu Utara",
			],
			[
				"province_id" => 33,
				"type" => "Kabupaten",
				"city" => "Lahat",
			],
			[
				"province_id" => 14,
				"type" => "Kabupaten",
				"city" => "Lamandau",
			],
			[
				"province_id" => 11,
				"type" => "Kabupaten",
				"city" => "Lamongan",
			],
			[
				"province_id" => 18,
				"type" => "Kabupaten",
				"city" => "Lampung Barat",
			],
			[
				"province_id" => 18,
				"type" => "Kabupaten",
				"city" => "Lampung Selatan",
			],
			[
				"province_id" => 18,
				"type" => "Kabupaten",
				"city" => "Lampung Tengah",
			],
			[
				"province_id" => 18,
				"type" => "Kabupaten",
				"city" => "Lampung Timur",
			],
			[
				"province_id" => 18,
				"type" => "Kabupaten",
				"city" => "Lampung Utara",
			],
			[
				"province_id" => 12,
				"type" => "Kabupaten",
				"city" => "Landak",
			],
			[
				"province_id" => 34,
				"type" => "Kabupaten",
				"city" => "Langkat",
			],
			[
				"province_id" => 21,
				"type" => "Kota",
				"city" => "Langsa",
			],
			[
				"province_id" => 24,
				"type" => "Kabupaten",
				"city" => "Lanny Jaya",
			],
			[
				"province_id" => 3,
				"type" => "Kabupaten",
				"city" => "Lebak",
			],
			[
				"province_id" => 4,
				"type" => "Kabupaten",
				"city" => "Lebong",
			],
			[
				"province_id" => 23,
				"type" => "Kabupaten",
				"city" => "Lembata",
			],
			[
				"province_id" => 21,
				"type" => "Kota",
				"city" => "Lhokseumawe",
			],
			[
				"province_id" => 32,
				"type" => "Kabupaten",
				"city" => "Lima Puluh Koto/Kota",
			],
			[
				"province_id" => 17,
				"type" => "Kabupaten",
				"city" => "Lingga",
			],
			[
				"province_id" => 22,
				"type" => "Kabupaten",
				"city" => "Lombok Barat",
			],
			[
				"province_id" => 22,
				"type" => "Kabupaten",
				"city" => "Lombok Tengah",
			],
			[
				"province_id" => 22,
				"type" => "Kabupaten",
				"city" => "Lombok Timur",
			],
			[
				"province_id" => 22,
				"type" => "Kabupaten",
				"city" => "Lombok Utara",
			],
			[
				"province_id" => 33,
				"type" => "Kota",
				"city" => "Lubuk Linggau",
			],
			[
				"province_id" => 11,
				"type" => "Kabupaten",
				"city" => "Lumajang",
			],
			[
				"province_id" => 28,
				"type" => "Kabupaten",
				"city" => "Luwu",
			],
			[
				"province_id" => 28,
				"type" => "Kabupaten",
				"city" => "Luwu Timur",
			],
			[
				"province_id" => 28,
				"type" => "Kabupaten",
				"city" => "Luwu Utara",
			],
			[
				"province_id" => 11,
				"type" => "Kabupaten",
				"city" => "Madiun",
			],
			[
				"province_id" => 11,
				"type" => "Kota",
				"city" => "Madiun",
			],
			[
				"province_id" => 10,
				"type" => "Kabupaten",
				"city" => "Magelang",
			],
			[
				"province_id" => 10,
				"type" => "Kota",
				"city" => "Magelang",
			],
			[
				"province_id" => 11,
				"type" => "Kabupaten",
				"city" => "Magetan",
			],
			[
				"province_id" => 9,
				"type" => "Kabupaten",
				"city" => "Majalengka",
			],
			[
				"province_id" => 27,
				"type" => "Kabupaten",
				"city" => "Majene",
			],
			[
				"province_id" => 28,
				"type" => "Kota",
				"city" => "Makassar",
			],
			[
				"province_id" => 11,
				"type" => "Kabupaten",
				"city" => "Malang",
			],
			[
				"province_id" => 11,
				"type" => "Kota",
				"city" => "Malang",
			],
			[
				"province_id" => 16,
				"type" => "Kabupaten",
				"city" => "Malinau",
			],
			[
				"province_id" => 19,
				"type" => "Kabupaten",
				"city" => "Maluku Barat Daya",
			],
			[
				"province_id" => 19,
				"type" => "Kabupaten",
				"city" => "Maluku Tengah",
			],
			[
				"province_id" => 19,
				"type" => "Kabupaten",
				"city" => "Maluku Tenggara",
			],
			[
				"province_id" => 19,
				"type" => "Kabupaten",
				"city" => "Maluku Tenggara Barat",
			],
			[
				"province_id" => 27,
				"type" => "Kabupaten",
				"city" => "Mamasa",
			],
			[
				"province_id" => 24,
				"type" => "Kabupaten",
				"city" => "Mamberamo Raya",
			],
			[
				"province_id" => 24,
				"type" => "Kabupaten",
				"city" => "Mamberamo Tengah",
			],
			[
				"province_id" => 27,
				"type" => "Kabupaten",
				"city" => "Mamuju",
			],
			[
				"province_id" => 27,
				"type" => "Kabupaten",
				"city" => "Mamuju Utara",
			],
			[
				"province_id" => 31,
				"type" => "Kota",
				"city" => "Manado",
			],
			[
				"province_id" => 34,
				"type" => "Kabupaten",
				"city" => "Mandailing Natal",
			],
			[
				"province_id" => 23,
				"type" => "Kabupaten",
				"city" => "Manggarai",
			],
			[
				"province_id" => 23,
				"type" => "Kabupaten",
				"city" => "Manggarai Barat",
			],
			[
				"province_id" => 23,
				"type" => "Kabupaten",
				"city" => "Manggarai Timur",
			],
			[
				"province_id" => 25,
				"type" => "Kabupaten",
				"city" => "Manokwari",
			],
			[
				"province_id" => 25,
				"type" => "Kabupaten",
				"city" => "Manokwari Selatan",
			],
			[
				"province_id" => 24,
				"type" => "Kabupaten",
				"city" => "Mappi",
			],
			[
				"province_id" => 28,
				"type" => "Kabupaten",
				"city" => "Maros",
			],
			[
				"province_id" => 22,
				"type" => "Kota",
				"city" => "Mataram",
			],
			[
				"province_id" => 25,
				"type" => "Kabupaten",
				"city" => "Maybrat",
			],
			[
				"province_id" => 34,
				"type" => "Kota",
				"city" => "Medan",
			],
			[
				"province_id" => 12,
				"type" => "Kabupaten",
				"city" => "Melawi",
			],
			[
				"province_id" => 8,
				"type" => "Kabupaten",
				"city" => "Merangin",
			],
			[
				"province_id" => 24,
				"type" => "Kabupaten",
				"city" => "Merauke",
			],
			[
				"province_id" => 18,
				"type" => "Kabupaten",
				"city" => "Mesuji",
			],
			[
				"province_id" => 18,
				"type" => "Kota",
				"city" => "Metro",
			],
			[
				"province_id" => 24,
				"type" => "Kabupaten",
				"city" => "Mimika",
			],
			[
				"province_id" => 31,
				"type" => "Kabupaten",
				"city" => "Minahasa",
			],
			[
				"province_id" => 31,
				"type" => "Kabupaten",
				"city" => "Minahasa Selatan",
			],
			[
				"province_id" => 31,
				"type" => "Kabupaten",
				"city" => "Minahasa Tenggara",
			],
			[
				"province_id" => 31,
				"type" => "Kabupaten",
				"city" => "Minahasa Utara",
			],
			[
				"province_id" => 11,
				"type" => "Kabupaten",
				"city" => "Mojokerto",
			],
			[
				"province_id" => 11,
				"type" => "Kota",
				"city" => "Mojokerto",
			],
			[
				"province_id" => 29,
				"type" => "Kabupaten",
				"city" => "Morowali",
			],
			[
				"province_id" => 33,
				"type" => "Kabupaten",
				"city" => "Muara Enim",
			],
			[
				"province_id" => 8,
				"type" => "Kabupaten",
				"city" => "Muaro Jambi",
			],
			[
				"province_id" => 4,
				"type" => "Kabupaten",
				"city" => "Muko Muko",
			],
			[
				"province_id" => 30,
				"type" => "Kabupaten",
				"city" => "Muna",
			],
			[
				"province_id" => 14,
				"type" => "Kabupaten",
				"city" => "Murung Raya",
			],
			[
				"province_id" => 33,
				"type" => "Kabupaten",
				"city" => "Musi Banyuasin",
			],
			[
				"province_id" => 33,
				"type" => "Kabupaten",
				"city" => "Musi Rawas",
			],
			[
				"province_id" => 24,
				"type" => "Kabupaten",
				"city" => "Nabire",
			],
			[
				"province_id" => 21,
				"type" => "Kabupaten",
				"city" => "Nagan Raya",
			],
			[
				"province_id" => 23,
				"type" => "Kabupaten",
				"city" => "Nagekeo",
			],
			[
				"province_id" => 17,
				"type" => "Kabupaten",
				"city" => "Natuna",
			],
			[
				"province_id" => 24,
				"type" => "Kabupaten",
				"city" => "Nduga",
			],
			[
				"province_id" => 23,
				"type" => "Kabupaten",
				"city" => "Ngada",
			],
			[
				"province_id" => 11,
				"type" => "Kabupaten",
				"city" => "Nganjuk",
			],
			[
				"province_id" => 11,
				"type" => "Kabupaten",
				"city" => "Ngawi",
			],
			[
				"province_id" => 34,
				"type" => "Kabupaten",
				"city" => "Nias",
			],
			[
				"province_id" => 34,
				"type" => "Kabupaten",
				"city" => "Nias Barat",
			],
			[
				"province_id" => 34,
				"type" => "Kabupaten",
				"city" => "Nias Selatan",
			],
			[
				"province_id" => 34,
				"type" => "Kabupaten",
				"city" => "Nias Utara",
			],
			[
				"province_id" => 16,
				"type" => "Kabupaten",
				"city" => "Nunukan",
			],
			[
				"province_id" => 33,
				"type" => "Kabupaten",
				"city" => "Ogan Ilir",
			],
			[
				"province_id" => 33,
				"type" => "Kabupaten",
				"city" => "Ogan Komering Ilir",
			],
			[
				"province_id" => 33,
				"type" => "Kabupaten",
				"city" => "Ogan Komering Ulu",
			],
			[
				"province_id" => 33,
				"type" => "Kabupaten",
				"city" => "Ogan Komering Ulu Selatan",
			],
			[
				"province_id" => 33,
				"type" => "Kabupaten",
				"city" => "Ogan Komering Ulu Timur",
			],
			[
				"province_id" => 11,
				"type" => "Kabupaten",
				"city" => "Pacitan",
			],
			[
				"province_id" => 32,
				"type" => "Kota",
				"city" => "Padang",
			],
			[
				"province_id" => 34,
				"type" => "Kabupaten",
				"city" => "Padang Lawas",
			],
			[
				"province_id" => 34,
				"type" => "Kabupaten",
				"city" => "Padang Lawas Utara",
			],
			[
				"province_id" => 32,
				"type" => "Kota",
				"city" => "Padang Panjang",
			],
			[
				"province_id" => 32,
				"type" => "Kabupaten",
				"city" => "Padang Pariaman",
			],
			[
				"province_id" => 34,
				"type" => "Kota",
				"city" => "Padang Sidempuan",
			],
			[
				"province_id" => 33,
				"type" => "Kota",
				"city" => "Pagar Alam",
			],
			[
				"province_id" => 34,
				"type" => "Kabupaten",
				"city" => "Pakpak Bharat",
			],
			[
				"province_id" => 14,
				"type" => "Kota",
				"city" => "Palangka Raya",
			],
			[
				"province_id" => 33,
				"type" => "Kota",
				"city" => "Palembang",
			],
			[
				"province_id" => 28,
				"type" => "Kota",
				"city" => "Palopo",
			],
			[
				"province_id" => 29,
				"type" => "Kota",
				"city" => "Palu",
			],
			[
				"province_id" => 11,
				"type" => "Kabupaten",
				"city" => "Pamekasan",
			],
			[
				"province_id" => 3,
				"type" => "Kabupaten",
				"city" => "Pandeglang",
			],
			[
				"province_id" => 9,
				"type" => "Kabupaten",
				"city" => "Pangandaran",
			],
			[
				"province_id" => 28,
				"type" => "Kabupaten",
				"city" => "Pangkajene Kepulauan",
			],
			[
				"province_id" => 2,
				"type" => "Kota",
				"city" => "Pangkal Pinang",
			],
			[
				"province_id" => 24,
				"type" => "Kabupaten",
				"city" => "Paniai",
			],
			[
				"province_id" => 28,
				"type" => "Kota",
				"city" => "Parepare",
			],
			[
				"province_id" => 32,
				"type" => "Kota",
				"city" => "Pariaman",
			],
			[
				"province_id" => 29,
				"type" => "Kabupaten",
				"city" => "Parigi Moutong",
			],
			[
				"province_id" => 32,
				"type" => "Kabupaten",
				"city" => "Pasaman",
			],
			[
				"province_id" => 32,
				"type" => "Kabupaten",
				"city" => "Pasaman Barat",
			],
			[
				"province_id" => 15,
				"type" => "Kabupaten",
				"city" => "Paser",
			],
			[
				"province_id" => 11,
				"type" => "Kabupaten",
				"city" => "Pasuruan",
			],
			[
				"province_id" => 11,
				"type" => "Kota",
				"city" => "Pasuruan",
			],
			[
				"province_id" => 10,
				"type" => "Kabupaten",
				"city" => "Pati",
			],
			[
				"province_id" => 32,
				"type" => "Kota",
				"city" => "Payakumbuh",
			],
			[
				"province_id" => 25,
				"type" => "Kabupaten",
				"city" => "Pegunungan Arfak",
			],
			[
				"province_id" => 24,
				"type" => "Kabupaten",
				"city" => "Pegunungan Bintang",
			],
			[
				"province_id" => 10,
				"type" => "Kabupaten",
				"city" => "Pekalongan",
			],
			[
				"province_id" => 10,
				"type" => "Kota",
				"city" => "Pekalongan",
			],
			[
				"province_id" => 26,
				"type" => "Kota",
				"city" => "Pekanbaru",
			],
			[
				"province_id" => 26,
				"type" => "Kabupaten",
				"city" => "Pelalawan",
			],
			[
				"province_id" => 10,
				"type" => "Kabupaten",
				"city" => "Pemalang",
			],
			[
				"province_id" => 34,
				"type" => "Kota",
				"city" => "Pematang Siantar",
			],
			[
				"province_id" => 15,
				"type" => "Kabupaten",
				"city" => "Penajam Paser Utara",
			],
			[
				"province_id" => 18,
				"type" => "Kabupaten",
				"city" => "Pesawaran",
			],
			[
				"province_id" => 18,
				"type" => "Kabupaten",
				"city" => "Pesisir Barat",
			],
			[
				"province_id" => 32,
				"type" => "Kabupaten",
				"city" => "Pesisir Selatan",
			],
			[
				"province_id" => 21,
				"type" => "Kabupaten",
				"city" => "Pidie",
			],
			[
				"province_id" => 21,
				"type" => "Kabupaten",
				"city" => "Pidie Jaya",
			],
			[
				"province_id" => 28,
				"type" => "Kabupaten",
				"city" => "Pinrang",
			],
			[
				"province_id" => 7,
				"type" => "Kabupaten",
				"city" => "Pohuwato",
			],
			[
				"province_id" => 27,
				"type" => "Kabupaten",
				"city" => "Polewali Mandar",
			],
			[
				"province_id" => 11,
				"type" => "Kabupaten",
				"city" => "Ponorogo",
			],
			[
				"province_id" => 12,
				"type" => "Kabupaten",
				"city" => "Pontianak",
			],
			[
				"province_id" => 12,
				"type" => "Kota",
				"city" => "Pontianak",
			],
			[
				"province_id" => 29,
				"type" => "Kabupaten",
				"city" => "Poso",
			],
			[
				"province_id" => 33,
				"type" => "Kota",
				"city" => "Prabumulih",
			],
			[
				"province_id" => 18,
				"type" => "Kabupaten",
				"city" => "Pringsewu",
			],
			[
				"province_id" => 11,
				"type" => "Kabupaten",
				"city" => "Probolinggo",
			],
			[
				"province_id" => 11,
				"type" => "Kota",
				"city" => "Probolinggo",
			],
			[
				"province_id" => 14,
				"type" => "Kabupaten",
				"city" => "Pulang Pisau",
			],
			[
				"province_id" => 20,
				"type" => "Kabupaten",
				"city" => "Pulau Morotai",
			],
			[
				"province_id" => 24,
				"type" => "Kabupaten",
				"city" => "Puncak",
			],
			[
				"province_id" => 24,
				"type" => "Kabupaten",
				"city" => "Puncak Jaya",
			],
			[
				"province_id" => 10,
				"type" => "Kabupaten",
				"city" => "Purbalingga",
			],
			[
				"province_id" => 9,
				"type" => "Kabupaten",
				"city" => "Purwakarta",
			],
			[
				"province_id" => 10,
				"type" => "Kabupaten",
				"city" => "Purworejo",
			],
			[
				"province_id" => 25,
				"type" => "Kabupaten",
				"city" => "Raja Ampat",
			],
			[
				"province_id" => 4,
				"type" => "Kabupaten",
				"city" => "Rejang Lebong",
			],
			[
				"province_id" => 10,
				"type" => "Kabupaten",
				"city" => "Rembang",
			],
			[
				"province_id" => 26,
				"type" => "Kabupaten",
				"city" => "Rokan Hilir",
			],
			[
				"province_id" => 26,
				"type" => "Kabupaten",
				"city" => "Rokan Hulu",
			],
			[
				"province_id" => 23,
				"type" => "Kabupaten",
				"city" => "Rote Ndao",
			],
			[
				"province_id" => 21,
				"type" => "Kota",
				"city" => "Sabang",
			],
			[
				"province_id" => 23,
				"type" => "Kabupaten",
				"city" => "Sabu Raijua",
			],
			[
				"province_id" => 10,
				"type" => "Kota",
				"city" => "Salatiga",
			],
			[
				"province_id" => 15,
				"type" => "Kota",
				"city" => "Samarinda",
			],
			[
				"province_id" => 12,
				"type" => "Kabupaten",
				"city" => "Sambas",
			],
			[
				"province_id" => 34,
				"type" => "Kabupaten",
				"city" => "Samosir",
			],
			[
				"province_id" => 11,
				"type" => "Kabupaten",
				"city" => "Sampang",
			],
			[
				"province_id" => 12,
				"type" => "Kabupaten",
				"city" => "Sanggau",
			],
			[
				"province_id" => 24,
				"type" => "Kabupaten",
				"city" => "Sarmi",
			],
			[
				"province_id" => 8,
				"type" => "Kabupaten",
				"city" => "Sarolangun",
			],
			[
				"province_id" => 32,
				"type" => "Kota",
				"city" => "Sawah Lunto",
			],
			[
				"province_id" => 12,
				"type" => "Kabupaten",
				"city" => "Sekadau",
			],
			[
				"province_id" => 28,
				"type" => "Kabupaten",
				"city" => "Selayar (Kepulauan Selayar)",
			],
			[
				"province_id" => 4,
				"type" => "Kabupaten",
				"city" => "Seluma",
			],
			[
				"province_id" => 10,
				"type" => "Kabupaten",
				"city" => "Semarang",
			],
			[
				"province_id" => 10,
				"type" => "Kota",
				"city" => "Semarang",
			],
			[
				"province_id" => 19,
				"type" => "Kabupaten",
				"city" => "Seram Bagian Barat",
			],
			[
				"province_id" => 19,
				"type" => "Kabupaten",
				"city" => "Seram Bagian Timur",
			],
			[
				"province_id" => 3,
				"type" => "Kabupaten",
				"city" => "Serang",
			],
			[
				"province_id" => 3,
				"type" => "Kota",
				"city" => "Serang",
			],
			[
				"province_id" => 34,
				"type" => "Kabupaten",
				"city" => "Serdang Bedagai",
			],
			[
				"province_id" => 14,
				"type" => "Kabupaten",
				"city" => "Seruyan",
			],
			[
				"province_id" => 26,
				"type" => "Kabupaten",
				"city" => "Siak",
			],
			[
				"province_id" => 34,
				"type" => "Kota",
				"city" => "Sibolga",
			],
			[
				"province_id" => 28,
				"type" => "Kabupaten",
				"city" => "Sidenreng Rappang/Rapang",
			],
			[
				"province_id" => 11,
				"type" => "Kabupaten",
				"city" => "Sidoarjo",
			],
			[
				"province_id" => 29,
				"type" => "Kabupaten",
				"city" => "Sigi",
			],
			[
				"province_id" => 32,
				"type" => "Kabupaten",
				"city" => "Sijunjung (Sawah Lunto Sijunjung)",
			],
			[
				"province_id" => 23,
				"type" => "Kabupaten",
				"city" => "Sikka",
			],
			[
				"province_id" => 34,
				"type" => "Kabupaten",
				"city" => "Simalungun",
			],
			[
				"province_id" => 21,
				"type" => "Kabupaten",
				"city" => "Simeulue",
			],
			[
				"province_id" => 12,
				"type" => "Kota",
				"city" => "Singkawang",
			],
			[
				"province_id" => 28,
				"type" => "Kabupaten",
				"city" => "Sinjai",
			],
			[
				"province_id" => 12,
				"type" => "Kabupaten",
				"city" => "Sintang",
			],
			[
				"province_id" => 11,
				"type" => "Kabupaten",
				"city" => "Situbondo",
			],
			[
				"province_id" => 5,
				"type" => "Kabupaten",
				"city" => "Sleman",
			],
			[
				"province_id" => 32,
				"type" => "Kabupaten",
				"city" => "Solok",
			],
			[
				"province_id" => 32,
				"type" => "Kota",
				"city" => "Solok",
			],
			[
				"province_id" => 32,
				"type" => "Kabupaten",
				"city" => "Solok Selatan",
			],
			[
				"province_id" => 28,
				"type" => "Kabupaten",
				"city" => "Soppeng",
			],
			[
				"province_id" => 25,
				"type" => "Kabupaten",
				"city" => "Sorong",
			],
			[
				"province_id" => 25,
				"type" => "Kota",
				"city" => "Sorong",
			],
			[
				"province_id" => 25,
				"type" => "Kabupaten",
				"city" => "Sorong Selatan",
			],
			[
				"province_id" => 10,
				"type" => "Kabupaten",
				"city" => "Sragen",
			],
			[
				"province_id" => 9,
				"type" => "Kabupaten",
				"city" => "Subang",
			],
			[
				"province_id" => 21,
				"type" => "Kota",
				"city" => "Subulussalam",
			],
			[
				"province_id" => 9,
				"type" => "Kabupaten",
				"city" => "Sukabumi",
			],
			[
				"province_id" => 9,
				"type" => "Kota",
				"city" => "Sukabumi",
			],
			[
				"province_id" => 14,
				"type" => "Kabupaten",
				"city" => "Sukamara",
			],
			[
				"province_id" => 10,
				"type" => "Kabupaten",
				"city" => "Sukoharjo",
			],
			[
				"province_id" => 23,
				"type" => "Kabupaten",
				"city" => "Sumba Barat",
			],
			[
				"province_id" => 23,
				"type" => "Kabupaten",
				"city" => "Sumba Barat Daya",
			],
			[
				"province_id" => 23,
				"type" => "Kabupaten",
				"city" => "Sumba Tengah",
			],
			[
				"province_id" => 23,
				"type" => "Kabupaten",
				"city" => "Sumba Timur",
			],
			[
				"province_id" => 22,
				"type" => "Kabupaten",
				"city" => "Sumbawa",
			],
			[
				"province_id" => 22,
				"type" => "Kabupaten",
				"city" => "Sumbawa Barat",
			],
			[
				"province_id" => 9,
				"type" => "Kabupaten",
				"city" => "Sumedang",
			],
			[
				"province_id" => 11,
				"type" => "Kabupaten",
				"city" => "Sumenep",
			],
			[
				"province_id" => 8,
				"type" => "Kota",
				"city" => "Sungaipenuh",
			],
			[
				"province_id" => 24,
				"type" => "Kabupaten",
				"city" => "Supiori",
			],
			[
				"province_id" => 11,
				"type" => "Kota",
				"city" => "Surabaya",
			],
			[
				"province_id" => 10,
				"type" => "Kota",
				"city" => "Surakarta (Solo)",
			],
			[
				"province_id" => 13,
				"type" => "Kabupaten",
				"city" => "Tabalong",
			],
			[
				"province_id" => 1,
				"type" => "Kabupaten",
				"city" => "Tabanan",
			],
			[
				"province_id" => 28,
				"type" => "Kabupaten",
				"city" => "Takalar",
			],
			[
				"province_id" => 25,
				"type" => "Kabupaten",
				"city" => "Tambrauw",
			],
			[
				"province_id" => 16,
				"type" => "Kabupaten",
				"city" => "Tana Tidung",
			],
			[
				"province_id" => 28,
				"type" => "Kabupaten",
				"city" => "Tana Toraja",
			],
			[
				"province_id" => 13,
				"type" => "Kabupaten",
				"city" => "Tanah Bumbu",
			],
			[
				"province_id" => 32,
				"type" => "Kabupaten",
				"city" => "Tanah Datar",
			],
			[
				"province_id" => 13,
				"type" => "Kabupaten",
				"city" => "Tanah Laut",
			],
			[
				"province_id" => 3,
				"type" => "Kabupaten",
				"city" => "Tangerang",
			],
			[
				"province_id" => 3,
				"type" => "Kota",
				"city" => "Tangerang",
			],
			[
				"province_id" => 3,
				"type" => "Kota",
				"city" => "Tangerang Selatan",
			],
			[
				"province_id" => 18,
				"type" => "Kabupaten",
				"city" => "Tanggamus",
			],
			[
				"province_id" => 34,
				"type" => "Kota",
				"city" => "Tanjung Balai",
			],
			[
				"province_id" => 8,
				"type" => "Kabupaten",
				"city" => "Tanjung Jabung Barat",
			],
			[
				"province_id" => 8,
				"type" => "Kabupaten",
				"city" => "Tanjung Jabung Timur",
			],
			[
				"province_id" => 17,
				"type" => "Kota",
				"city" => "Tanjung Pinang",
			],
			[
				"province_id" => 34,
				"type" => "Kabupaten",
				"city" => "Tapanuli Selatan",
			],
			[
				"province_id" => 34,
				"type" => "Kabupaten",
				"city" => "Tapanuli Tengah",
			],
			[
				"province_id" => 34,
				"type" => "Kabupaten",
				"city" => "Tapanuli Utara",
			],
			[
				"province_id" => 13,
				"type" => "Kabupaten",
				"city" => "Tapin",
			],
			[
				"province_id" => 16,
				"type" => "Kota",
				"city" => "Tarakan",
			],
			[
				"province_id" => 9,
				"type" => "Kabupaten",
				"city" => "Tasikmalaya",
			],
			[
				"province_id" => 9,
				"type" => "Kota",
				"city" => "Tasikmalaya",
			],
			[
				"province_id" => 34,
				"type" => "Kota",
				"city" => "Tebing Tinggi",
			],
			[
				"province_id" => 8,
				"type" => "Kabupaten",
				"city" => "Tebo",
			],
			[
				"province_id" => 10,
				"type" => "Kabupaten",
				"city" => "Tegal",
			],
			[
				"province_id" => 10,
				"type" => "Kota",
				"city" => "Tegal",
			],
			[
				"province_id" => 25,
				"type" => "Kabupaten",
				"city" => "Teluk Bintuni",
			],
			[
				"province_id" => 25,
				"type" => "Kabupaten",
				"city" => "Teluk Wondama",
			],
			[
				"province_id" => 10,
				"type" => "Kabupaten",
				"city" => "Temanggung",
			],
			[
				"province_id" => 20,
				"type" => "Kota",
				"city" => "Ternate",
			],
			[
				"province_id" => 20,
				"type" => "Kota",
				"city" => "Tidore Kepulauan",
			],
			[
				"province_id" => 23,
				"type" => "Kabupaten",
				"city" => "Timor Tengah Selatan",
			],
			[
				"province_id" => 23,
				"type" => "Kabupaten",
				"city" => "Timor Tengah Utara",
			],
			[
				"province_id" => 34,
				"type" => "Kabupaten",
				"city" => "Toba Samosir",
			],
			[
				"province_id" => 29,
				"type" => "Kabupaten",
				"city" => "Tojo Una-Una",
			],
			[
				"province_id" => 29,
				"type" => "Kabupaten",
				"city" => "Toli-Toli",
			],
			[
				"province_id" => 24,
				"type" => "Kabupaten",
				"city" => "Tolikara",
			],
			[
				"province_id" => 31,
				"type" => "Kota",
				"city" => "Tomohon",
			],
			[
				"province_id" => 28,
				"type" => "Kabupaten",
				"city" => "Toraja Utara",
			],
			[
				"province_id" => 11,
				"type" => "Kabupaten",
				"city" => "Trenggalek",
			],
			[
				"province_id" => 19,
				"type" => "Kota",
				"city" => "Tual",
			],
			[
				"province_id" => 11,
				"type" => "Kabupaten",
				"city" => "Tuban",
			],
			[
				"province_id" => 18,
				"type" => "Kabupaten",
				"city" => "Tulang Bawang",
			],
			[
				"province_id" => 18,
				"type" => "Kabupaten",
				"city" => "Tulang Bawang Barat",
			],
			[
				"province_id" => 11,
				"type" => "Kabupaten",
				"city" => "Tulungagung",
			],
			[
				"province_id" => 28,
				"type" => "Kabupaten",
				"city" => "Wajo",
			],
			[
				"province_id" => 30,
				"type" => "Kabupaten",
				"city" => "Wakatobi",
			],
			[
				"province_id" => 24,
				"type" => "Kabupaten",
				"city" => "Waropen",
			],
			[
				"province_id" => 18,
				"type" => "Kabupaten",
				"city" => "Way Kanan",
			],
			[
				"province_id" => 10,
				"type" => "Kabupaten",
				"city" => "Wonogiri",
			],
			[
				"province_id" => 10,
				"type" => "Kabupaten",
				"city" => "Wonosobo",
			],
			[
				"province_id" => 24,
				"type" => "Kabupaten",
				"city" => "Yahukimo",
			],
			[
				"province_id" => 24,
				"type" => "Kabupaten",
				"city" => "Yalimo",
			],
			[
				"province_id" => 5,
				"type" => "Kota",
				"city" => "Yogyakarta",
			],
		];

		City::insert($city);
	}
}
