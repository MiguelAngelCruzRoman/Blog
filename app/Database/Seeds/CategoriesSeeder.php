<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    public function run()
    {
        $categories = [
            [
                'category'      => 'General',
                'description'   => 'Publicaciones con temática general'
            ],
            [
                'category'      => 'Noticias',
                'description'   => 'Noticias'
            ],
            [
                'category'      => 'Espectáculos',
                'description'   => 'Novedades del espectáculo'
            ],
            [
                'category'      => 'Política',
                'description'   => 'Noticias de política'
            ],
            [
                'category'      => 'Tecnología',
                'description'   => 'Publicaciones sobre tecnología'
            ],
            [
                'category'      => 'Películas',
                'description'   => 'Películas'
            ],
            [
                'category'      => 'Sin categoría',
                'description'   => 'Publicaciones sin categoría'
            ],
            [
                'category'      => 'Deportes',
                'description'   => 'Noticias deportivas'
            ],
            [
                'category'      => 'Electrónica',
                'description'   => 'Electrónica'
            ],
            [
                'category'      => 'Cómputo',
                'description'   => 'Cómputo'
            ],
            [
                'category'      => 'Línea blanca',
                'description'   => 'Productos de línea blanca'
            ],
            [
                'category'      => 'Muebles',
                'description'   => 'Muebles'
            ],
            [
                'category'      => 'Ropa',
                'description'   => 'Ropa'
            ],
            [
                'category'      => 'Calzado',
                'description'   => 'Calzado'
            ],
        ];

        $builder = $this->db->table('categories');
        $builder->insertBatch($categories);
    }
}