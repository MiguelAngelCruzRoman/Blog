<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class CommentSeeder extends Seeder
{
    public function run()
    {
        $faker = Factory::create();

        $comments = [];

        for($i = 0; $i<100; $i++){
            $created_at = $faker->dateTime();
            $updated_at = $faker->dateTimeBetween($created_at);
            $deleted_at = $faker->dateTimeBetween($updated_at);

            $comments[] = [
                'post'=> $faker->numberBetween(5,20),
                'message' => $faker->paragraph(),
                'created_at' => $created_at->format('Y-m-d H:i:s'),
                'updated_at' => $updated_at->format('Y-m-d H:i:s'),
                'deleted_at' => $deleted_at->format('Y-m-d H:i:s')
            ];
        }

        $builder = $this->db->table('comments');
        $builder->insertBatch($comments);

    }
}
