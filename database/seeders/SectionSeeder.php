<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sections')->insert([
            ['name' => 'دور المسك'],
            ['name' => 'دور العنبر'],
            ['name' => 'دور القداح'],
            ['name' => 'دور الجوري'],
        ]);
    }
}
