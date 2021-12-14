<?php

namespace Database\Seeders;

use App\Models\Admin\Organizations;
use App\Models\Admin\Unit;
use App\Models\Country;
use App\Models\Inquiry;
use App\Models\Seller\Product;
use App\Models\Seller\Service;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        User::truncate();
        Inquiry::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        $faker = Faker::create();
        User::factory()
            ->count(50)
            ->create();
    }
}
