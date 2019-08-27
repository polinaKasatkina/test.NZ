<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::create([
            'name'     => 'Polina Kasatkina',
            'email'    => 'p.s.kasatkina@gmail.com',
            'password' => bcrypt('12345')
        ]);

        \App\Models\User::create([
            'name'     => 'John Doe',
            'email'    => 'john.doe@gmail.com',
            'password' => bcrypt('54321')
        ]);
    }
}
