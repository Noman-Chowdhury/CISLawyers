<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('services')->insert([
            [
                'name' => 'Visit Visa',
                'slug' => 'visit_visa',
                'code' => substr(hexdec(uniqid()), -5),
            ], [
                'name' => 'Student Visa',
                'slug' => 'student_visa',
                'code' => substr(hexdec(uniqid()), -5),
            ], [
                'name' => 'Work Permit',
                'slug' => 'work_permit',
                'code' => substr(hexdec(uniqid()), -5),
            ], [
                'name' => 'Immigration',
                'slug' => 'immigration',
                'code' => substr(hexdec(uniqid()), -5),
            ], [
                'name' => 'Appeal',
                'slug' => 'appeal',
                'code' => substr(hexdec(uniqid()), -5),
            ], [
                'name' => 'ECA',
                'slug' => 'eca',
                'code' => substr(hexdec(uniqid()), -5),
            ], [
                'name' => 'NCA',
                'slug' => 'nca',
                'code' => substr(hexdec(uniqid()), -5),
            ], [
                'name' => 'NID',
                'slug' => 'nid',
                'code' => substr(hexdec(uniqid()), -5),
            ], [
                'name' => 'Passport',
                'slug' => 'passport',
                'code' => substr(hexdec(uniqid()), -5),
            ], [
                'name' => 'Police Clearance',
                'slug' => 'police_clearance',
                'code' => substr(hexdec(uniqid()), -5),
            ], [
                'name' => 'Immigration Clearance',
                'slug' => 'immigration_clearance',
                'code' => substr(hexdec(uniqid()), -5),
            ], [
                'name' => 'Unmarried Certificate',
                'slug' => 'unmarried_certificate',
                'code' => substr(hexdec(uniqid()), -5),
            ], [
                'name' => 'Notary & Affidavit',
                'slug' => 'notary_and_affidavit',
                'code' => substr(hexdec(uniqid()), -5),
            ], [
                'name' => 'Special Marriage',
                'slug' => 'special_marriage',
                'code' => substr(hexdec(uniqid()), -5),
            ],
        ]);
    }
}
