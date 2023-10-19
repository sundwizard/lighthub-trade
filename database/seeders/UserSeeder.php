<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Branch;
use App\Models\Department;
use Illuminate\Support\Collection;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        User::create([
            'surname' => 'Ifeanyi',
            'othernames' => 'Integrity',
            'email' => 'info@lighthubtech.com',
            'phoneno' => '08179333021',
            'password' => Hash::make('Lighthub@2023'),
            'user_type' => 'Super Admin',
            'status' => "Active"
        ]);

        User::create([
            'surname' => 'Ugbon',
            'othernames' => 'Ember Sunday',
            'email' => 'emberugbon@gmail.com',
            'phoneno' => '08031841291',
            'password' => Hash::make('Luvday1994'),
            'user_type' => 'Super Admin',
            'status' => "Active"
        ]);
    }
}
