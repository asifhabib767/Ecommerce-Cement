<?php

use App\Models\Transaction;
use Illuminate\Database\Seeder;

class TransactionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $transaction = new Transaction();
        $transaction->type = 'purchase';
        $transaction->vendor_id = 1;
        $transaction->status = 0;
        $transaction->delivery_status = 'not_delivered';
        $transaction->payment_status = 'paid';
        $transaction->shipping_charges = 100;
        $transaction->paid_total = 200;
        $transaction->discount_type_id = 1;
        $transaction->due_total = 0;
        $transaction->created_by = 'Super Admin';
        $transaction->save();

        $transaction = new Transaction();
        $transaction->type = 'purchase';
        $transaction->vendor_id = 1;
        $transaction->status = 1;
        $transaction->delivery_status = 'delivered';
        $transaction->payment_status = 'paid';
        $transaction->shipping_charges = 100;
        $transaction->paid_total = 200;
        $transaction->discount_type_id = 1;
        $transaction->due_total = 0;
        $transaction->created_by = 'Super Admin';
        $transaction->save();

        $transaction = new Transaction();
        $transaction->type = 'purchase';
        $transaction->vendor_id = 1;
        $transaction->status = 0;
        $transaction->delivery_status = 'not_delivered';
        $transaction->payment_status = 'paid';
        $transaction->shipping_charges = 100;
        $transaction->paid_total = 200;
        $transaction->discount_type_id = 1;
        $transaction->due_total = 0;
        $transaction->created_by = 'Super Admin';
        $transaction->save();
    }
}
