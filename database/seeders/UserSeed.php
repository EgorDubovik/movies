<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Any company name',
            'email' => 'test@example.com',
            'is_driver' => '1',
            'is_mover' => '0',
            'password' => password_hash('1234', PASSWORD_BCRYPT),
            'mc' => '2134',
            'dot' => '2134',
        ]);

        DB::table('users')->insert([
            'name' => 'One more company name',
            'email' => 'test2@example.com',
            'is_driver' => '1',
            'is_mover' => '1',
            'password' => password_hash('1234', PASSWORD_BCRYPT),
            'mc' => '2134',
            'dot' => '2134',
        ]);


        DB::table('users')->insert([
            'name' => 'I have couple more name',
            'email' => 'test3@example.com',
            'is_driver' => '0',
            'is_mover' => '1',
            'password' => password_hash('1234', PASSWORD_BCRYPT),
            'mc' => '2134',
            'dot' => '2134',
        ]);


        DB::table('users')->insert([
            'name' => 'Belarus give',
            'email' => 'test4@example.com',
            'is_driver' => '1',
            'is_mover' => '0',
            'password' => password_hash('1234', PASSWORD_BCRYPT),
            'mc' => '2134',
            'dot' => '2134',
        ]);

    }
}
