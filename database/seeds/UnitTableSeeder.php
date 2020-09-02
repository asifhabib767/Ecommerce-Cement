<?php

use App\Models\Unit;
use Illuminate\Database\Seeder;

class UnitTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $unit = new Unit();
        // $unit->vendor_id = 1;
        $unit->actual_name = 'Pcs';
        $unit->created_by = 1;
        $unit->short_name = 'pcs';
        $unit->save();

        $unit1 = new Unit();
        // $unit1->vendor_id = 1;
        $unit1->actual_name = 'Kilogram';
        $unit->created_by = 1;
        $unit1->short_name = 'kg';
        $unit1->save();
    }
}
