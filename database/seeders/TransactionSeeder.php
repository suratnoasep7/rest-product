<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Transaction;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Transaction::insert([
            [
                'kd_transactions' => 'PR01',
                'product_id' => 1,
                'qty' => 10,
                'total' => 23000000,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'kd_transactions' => 'PR02',
                'product_id' =>  2,
                'qty' => 5,
                'total' => 550000,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'kd_transactions' => 'PR03',
                'product_id' =>  3,
                'qty' => 19,
                'total' => 2375000,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ]

        ]);
    }
}
