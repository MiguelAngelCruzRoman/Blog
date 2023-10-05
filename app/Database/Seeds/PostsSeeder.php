<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class PostsSeeder extends Seeder
{
    public function run()
    {
        $faker = Factory::create();
        $posts = [];

        for ($i=0; $i < 1000; $i++) {
            $created_at = $faker->dateTime();
            $updated_at = $faker->dateTimeBetween($created_at);
            $deleted_at = $faker->dateTimeBetween($updated_at);
            $purchase_price = $faker->randomFloat(2, 0.1, 4500);
            $unit_price = $purchase_price + $faker->randomFloat(2, 0, 500);

            $posts[] = [
             'category'   => $faker->numberBetween(1,214),
                'title'          => $faker->sentence(),
                'content'   => $faker->paragraph(),
                'autor' => $faker->randomNumber(1,2),
                'created_at'    => $created_at->format('Y-m-d H:i:s'),
                'updated_at'    => $updated_at->format('Y-m-d H:i:s'),
                'deleted_at'    => $deleted_at->format('Y-m-d H:i:s'),               
                'status'        => $faker->numberBetween(0, 1),

            ];
        }
            $builder = $this->db->table('posts');
            $builder->insertBatch($posts);
    }
}
