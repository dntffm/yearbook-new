<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('123123123')
        ]);
        $user2 = User::create([
            'name' => 'user',
            'email' => 'user@example.com',
            'password' => Hash::make('123123123')
        ]);
        $user->assignRole('admin');
        $user2->assignRole('user');
    }
}
