<?php

use Illuminate\Database\Seeder;
use App\Teacher;

class TeacherTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(App\Teacher::class, 20)->create();
    }
}
