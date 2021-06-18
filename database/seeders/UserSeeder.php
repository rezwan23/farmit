<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'  =>  'admin',
            'email' =>  'admin@gmail.com',
            'nid'   =>  '1234',
            'phone_no'  =>  '01737603707',
            'password'  =>  Hash::make('12345678'),
            'type'  =>  'admin',
        ]);
        User::create([
            'name'  =>  'farmer',
            'email' =>  'farmer@gmail.com',
            'nid'   =>  '1234',
            'phone_no'  =>  '01313474843',
            'password'  =>  Hash::make('12345678'),
            'type'  =>  'farmer',
        ]);
        
    }
}
