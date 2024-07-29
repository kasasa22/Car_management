<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Kasasa Trevor',
            'username' => 'malware_ug',
            'email' => 'kasasatrevor25@gmail.com',
            'password' => Hash::make('Kasasa@2022'),
            'is_superadmin' => true,
        ]);
    }
}
