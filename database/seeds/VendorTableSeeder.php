<?php

use App\Models\Vendor;
use Illuminate\Database\Seeder;

class VendorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vendor = new Vendor();
        $vendor->name = "Akij Cement";
        $vendor->tax_number_1 = 'cement';
        $vendor->tax_label_1 = 'cement';
        $vendor->default_profit_percent = 25;
        $vendor->owner_name = 'Akij Cment';
        $vendor->time_zone = 'Asia/Dhaka';
        $vendor->created_at = 1;
        $vendor->updated_at = 1;
        $vendor->save();

        $vendor = new Vendor();
        $vendor->name = "Akij Cement";
        $vendor->tax_number_1 = 'cement';
        $vendor->tax_label_1 = 'cement';
        $vendor->default_profit_percent = 25;
        $vendor->owner_name = 'Akij Cment';
        $vendor->time_zone = 'Asia/Dhaka';
        $vendor->created_at = 1;
        $vendor->updated_at = 1;
        $vendor->save();
    }
}
