<?php

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = new Product();
        $product->name = "PCC-1";
        $product->vendor_id = 1;
        $product->tax_type = 'inclusive';
        $product->alert_quantity = 10;
        $product->sku = 'PCC-1';
        $product->barcode_type = 'C39';
        $product->created_by = 1;
        $product->save();

        $product = new Product();
        $product->name = "OPC-1";
        $product->vendor_id = 1;
        $product->tax_type = 'inclusive';
        $product->alert_quantity = 10;
        $product->sku = 'OPC-1';
        $product->barcode_type = 'C39';
        $product->created_by = 1;
        $product->save();
    }
}
