<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $faker = Factory::create();

        $products = [];

        for($i = 0; $i<100; $i++){
            $created_at = $faker->dateTime();
            $updated_at = $faker->dateTimeBetween($created_at);
            $deleted_at = $faker->dateTimeBetween($updated_at);
            $purchase_price = $faker->randomFloat(2, 0.1, 4500);
            $unit_price = $purchase_price + $faker->randomFloat(2,0,500);

            $products[] = [
                'name' => $faker->sentence(),
                'description' => $faker->paragraph(),
                'purchase_price' => $purchase_price,
                'unit_price'=> $unit_price,
                'min_stock'=> $faker->numberBetween(5,20),
                'max_stock'=> $faker->numberBetween(100,2000),
                'stock'=> $faker->numberBetween(0,2000),
                'dimensions'=>$faker->randomNumber(3,false),
                'weight'=>$faker->numberBetween(1,15),
                'observation'=>$faker->sentence(),
                'status'=>$faker->numberBetween(0,1),
                'category'=>$faker->numberBetween(1,200),
                'created_at' => $created_at->format('Y-m-d H:i:s'),
                'updated_at' => $updated_at->format('Y-m-d H:i:s'),
                'deleted_at' => $deleted_at->format('Y-m-d H:i:s')
            ];
        }

        $builder = $this->db->table('products');
        $builder->insertBatch($products);

    }
}
