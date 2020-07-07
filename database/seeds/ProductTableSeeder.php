<?php

use Illuminate\Database\Seeder;
use App\Entities\Product;
use Faker\Factory as Faker;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $faker->addProvider(new \Bezhanov\Faker\Provider\Commerce($faker));
        foreach(range(0,15) as $i){
            Product::create([
                'name' => $faker->productName,
                'description' =>  $faker->department(6),
                'stock' => $faker->numberBetween($min = 10, $max = 30),
                'price' => $faker->numberBetween($min = 500, $max = 8000),
                'user_id' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        }
    }
}
