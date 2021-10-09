<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        for($m=0; $m<20; $m++){
            $user = new User();
            $user->name='name'.$m;
            $user->email='2502mien@gmail.com'.$m;
            $user->phone='086745416'.$m;
            $user->password='123456'.$m;
            $user->save();

        }
    }
}
