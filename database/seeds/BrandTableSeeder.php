<?php

use App\Models\Brand;
use Illuminate\Database\Seeder;

class BrandTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brand = new Brand();
        $brand->name = "Akij Cement";
        $brand->slug = "akij-cement";
        $brand->save();

        $brand2 = new Brand();
        $brand2->name = "Ambuja Cement";
        $brand2->slug = "ambuja-cement";
        $brand2->save();

        $brand3 = new Brand();
        $brand3->name = "Supercrete Cement";
        $brand3->slug = "super-crete-cement";
        $brand3->save();
    }
}
