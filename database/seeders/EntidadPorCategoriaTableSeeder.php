<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Entity;
use Illuminate\Database\Seeder;

class EntidadPorCategoriaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        // Verificar si las categorías requeridas existen
        $categoriaAnimales = Category::where('category', 'Animals-Seeder')->first();
        $categoriaSeguridad = Category::where('category', 'Security-Seeder')->first();

        if (!$categoriaAnimales || !$categoriaSeguridad) {
            // Emitir un mensaje de advertencia si alguna de las categorías no existe
            $this->command->warn('Las categorías Animals-Seeder y/o Security-Seeder no existen en la base de datos. Debe ejecutar primero el seeders que cree dichas categorias: php artisan db:seed --class=CategoriesTableSeeder');
            return;
        }

        // Las categorías requeridas existen, entonces creamos las entidades asociadas a ellas
        Entity::create([
            'api' => 'https://ejemplo.com/api/animals',
            'description' => 'Descripción de la entidad de animales',
            'link' => 'https://ejemplo.com/entity/animals',
            'category_id' => $categoriaAnimales->id,
        ]);

        Entity::create([
            'api' => 'https://ejemplo.com/api/security',
            'description' => 'Descripción de la entidad de seguridad',
            'link' => 'https://ejemplo.com/entity/security',
            'category_id' => $categoriaSeguridad->id,
        ]);
    }
}
