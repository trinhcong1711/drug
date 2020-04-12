<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdminSeeder::class);
        $this->call(UnitSeeder::class);
        $this->call(PositionSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(BranchSeeder::class);
        $this->call(CustomerSeeder::class);
        $this->call(StaffSeeder::class);
        $this->call(CardSeeder::class);
        $this->call(SalarySeeder::class);
        $this->call(BillSeeder::class);
        $this->call(MedicineSeeder::class);
        $this->call(BillMedicineSeeder::class);
        $this->call(BranchCustomerSeeder::class);
    }
}
