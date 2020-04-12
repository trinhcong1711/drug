<?php

use Illuminate\Database\Seeder;

class BillMedicineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\Bill_Medicine::class, 100)->create();
    }
}
