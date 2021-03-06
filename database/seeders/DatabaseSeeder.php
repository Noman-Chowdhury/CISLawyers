<?php

namespace Database\Seeders;

use App\Models\Admin\AdminSetting;
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
        $this->call(AdminTableSeeder::class);
        $this->call(ServiceTableSeeder::class);
//        $this->call(DivisionSeeder::class);
//        $this->call(DistrictSeeder::class);
//        $this->call(UpazilaSeeder::class);
//        $this->call(AdminTableSeeder::class);
    }
}
