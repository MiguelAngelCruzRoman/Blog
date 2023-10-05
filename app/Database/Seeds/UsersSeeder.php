<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class UsersSeeder extends Seeder
{
    public function run()
    {
        $faker = Factory::create();
        $users = [];

        for ($i=0; $i < 100; $i++) {
            $created_at = $faker->dateTime();
            $updated_at = $faker->dateTimeBetween($created_at);
            $deleted_at = $faker->dateTimeBetween($updated_at);

            $users[] = [
                'username'      => $faker->userName(),
                'password'      => $faker->password(8, 15),
                'profile'       => $faker->numberBetween(1, 2),
                'status'        => $faker->numberBetween(0, 1),
                'created_at'    => $created_at->format('Y-m-d H:i:s'),
                'updated_at'    => $updated_at->format('Y-m-d H:i:s'),
               'deleted_at'    => $deleted_at->format('Y-m-d H:i:s')
            ];
        }

        $builder = $this->db->table('users');
        $builder->insertBatch($users);
    }
}