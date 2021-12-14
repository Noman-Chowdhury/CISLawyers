<?php

namespace Database\Seeders;

use App\Models\Admin\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::truncate();  //empty table data

        $admin=Admin::create([
            'name' => 'Super Admin',
            'phone_number' => '01777873960',
            'email' => 'superadmin@gmail.com',
            'password' => Hash::make('123@webtech'),
        ]);
        $admin->assignRole(2);


    }
}
