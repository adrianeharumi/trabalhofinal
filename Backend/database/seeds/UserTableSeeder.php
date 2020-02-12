<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      User::create([
          'name' => 'Master',
          'email' => 'master@gmail.com',
          'email_verified_at' => now(),
          'password' => '123456',
          'birth' => '01/01/1950',
          'admin' => 1
        ]);
    }
}
