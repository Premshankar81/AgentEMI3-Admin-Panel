<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SystemSetting;

class SystemSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $SystemSetting = [
            ['key' => 'business_name','value' => 'Loan Management'],
            ['key' => 'business_tag_line','value' => 'Loan Management'],
            ['key' => 'business_description','value' => 'Loan Management'],
        ];
       SystemSetting::insert($SystemSetting);
    }
}
 