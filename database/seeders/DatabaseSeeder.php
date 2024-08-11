<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Product;
use App\Models\Country;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Storage::deleteDirectory('products');
        Storage::makeDirectory('products');

        \App\Models\Country::factory()->create([
            'id' => 1,
            'name' => 'Panama',
            'code' => 'PA',

        ]);

        $role = Role::create(['name' => 'admin']);
        \App\Models\User::factory()->create([
            'id'=> 10,
            'name' => 'Test User',
            'email' => 'gilbertojavier2@gmail.com',
            'password' => bcrypt('12345678'),
            'country_id' => 1,
        ])->assignRole($role);
        

        $this->call([
            FamilySeeder::class,
            OptionSeeder::class,
        ]);

        Product::factory(100)->create();
    }
}
