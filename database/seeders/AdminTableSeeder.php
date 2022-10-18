<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Brand;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	// Category Inserted //
       	$category = Category::create([
            'name' => 'Electronic Devices',
            'slug'=>'Electronic-Devices-YKFd6',
            'created_at'=>'2022-10-18 08:50:38'
        ]);

        // Brand Inserted //
        $brand = Brand::create([
            'name' => 'Mi',
            'slug'=>'miYKF',
            'created_at'=>'2022-10-18 08:50:38'
        ]);

    }
}
