<?php

use Illuminate\Database\Seeder;

class BranchCustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\Branch_Customer::class, 100)->create();
    }
}
