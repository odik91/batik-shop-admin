<?php

namespace Database\Seeders;

use App\Models\Admin;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DefaultAdminSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $admin = new Admin([
      'name' => 'admin',
      'email' => 'admin@test.com',
      'email_verified_at' => Carbon::now(),
      'password' => Hash::make('Test1234!'),
    ]);
    $admin->save();
  }
}
