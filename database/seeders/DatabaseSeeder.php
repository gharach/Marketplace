<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Product;
use App\Models\Store;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Eloquent\Factories\Factory;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory()->create([
            'name' => 'admin',
            'email' => 'ali.gharachorloo@gmail.com',
            'role' => "admin",
            'password' => bcrypt('123456789'),
        ]);
        \App\Models\Profile::factory()->create([
            'first_name' => fake()->name(),
            'last_name' => fake()->name(),
            'address' => fake()->address(),
            'lat' => fake()->randomFloat(2, -10, 10),
            'lang' => fake()->randomFloat(2, -100, 10),
            'user_id' => 1
        ]);
        \App\Models\User::factory(10)
            ->state(new Sequence(
                ['role' => 'customer'],
                ['role' => 'seller'],
            ))->hasProfile(1)
            ->has(Store::factory(10)
                ->has(Product::factory()->count(15)))
            ->create();

//        Store::factory(10)
//            ->has(Product::factory()->count(15))
//            ->create();


    }
}
