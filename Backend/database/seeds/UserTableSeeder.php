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
          'name' => 'João',
          'email' => 'joao@gmail.com',
          'birth' => '12/12/2000',
          'password' => '123456',
          'number' => 99999-9999,
      ]);
      User::create([
          'name' => 'Lucas',
          'email' => 'lucas@gmail.com',
          'birth' => '11/11/2000',
          'password' => '123456',
          'number' => 99999-9999,
      ]);
      User::create([
          'name' => 'Leonardo',
          'email' => 'leo@gmail.com',
          'birth' => '10/10/2000',
          'password' => '123456',
          'number' => 99999-9999,
      ]);
      User::create([
          'name' => 'Gabriel',
          'email' => 'gabriel@gmail.com',
          'birth' => '09/09/2000',
          'password' => '123456',
          'number' => 99999-9999,
      ]);
      User::create([
          'name' => 'Gil',
          'email' => 'gil@gmail.com',
          'birth' => '11/11/2000',
          'password' => '123456',
          'number' => 99999-9999,
      ]);
      User::create([
          'name' => 'Marta',
          'email' => 'marta@gmail.com',
          'birth' => '25/12/2000',
          'password' => '123456',
          'number' => 99999-9999,
      ]);
      User::create([
          'name' => 'Haaland',
          'email' => 'borussia@gmail.com',
          'birth' => '03/03/2000',
          'password' => '123456',
          'number' => 99999-9999,
      ]);
      User::create([
          'name' => 'Flavia',
          'email' => 'flavia@gmail.com',
          'birth' => '28/02/2000',
          'password' => '123456',
          'number' => 99999-9999,
      ]);
      User::create([
          'name' => 'Leticia',
          'email' => 'leticia@gmail.com',
          'birth' => '01/01/2000',
          'password' => '123456',
          'number' => 99999-9999,
      ]);
      User::create([
          'name' => 'Layla',
          'email' => 'eric@gmail.com',
          'birth' => '07/09/2000',
          'password' => '123456',
          'number' => 99999-9999,
      ]);
    }
}
