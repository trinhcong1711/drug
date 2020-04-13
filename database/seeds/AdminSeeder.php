<?php

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\Admin;
use Faker\Generator as Faker;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
//        $admin = factory(Admin::class, 100)->create();
        $admin = Admin::create([
            'name' => $faker->name,
            'email' => $faker->unique()->freeEmail,
            'tel' => $faker->unique()->numberBetween(1111111111,999999999),
            'image' => $faker->imageUrl(640, 480),
            'status' => $faker->randomElement([0,1]),
            'gender' => $faker->randomElement([0,1]),
            'address' => $faker->address,
            'facebook' => $faker->url,
            'zalo' => $faker->url,
            'email_verified_at' => now(),
            'api_token' => Str::random(10),
            'password' => bcrypt('admin123'), // password
            'remember_token' => Str::random(10),
            'created_at' => new DateTime,
            'updated_at' => new DateTime
        ]);
        $role = Role::create(['name' => 'Admin']);

        $permissions = Permission::pluck('id','id')->all();

        $role->syncPermissions($permissions);

        $admin->assignRole([$role->id]);
    }
}
