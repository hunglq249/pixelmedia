<?php

namespace Database\Seeders;

use App\Models\RecruitmentBanner;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class RecruitmentBannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RecruitmentBanner::create([
            'image' => Str::random(10)
        ]);
    }
}
