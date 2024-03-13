<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entity;
use App\Models\Category;
use Illuminate\Support\Facades\Http;

class ApiController extends Controller
{
    public function getDataByCategory($category)
    {
        $entities = Entity::whereHas('category', function ($query) use ($category) {
            $query->where('category', $category);
        })->get();

        if ($entities->isEmpty()) {
            return response()->json(['success' => false, 'message' => 'No se encontraron datos para la categor&iacute;a ingresada'], 404);
        }

        $responseData = $entities->map(function ($entity) {
            return [
                'api' => $entity->api,
                'description' => $entity->description,
                'link' => $entity->link,
                'category' => [
                    'id' => $entity->category->id,
                    'category' => $entity->category->category,
                ],
            ];
        });

        return response()->json(['success' => true, 'data' => $responseData]);
    }

   public function importDataFromApi()
{
    $apiUrl = 'https://api.publicapis.org/entries';
    $response = Http::get($apiUrl);

    if ($response->successful()) {
        $data = $response->json();

        collect($data['entries'])->filter(function ($entry) {
            // Filtrar por categora animales y seguridad
            return in_array($entry['Category'], ['Animals', 'Security']);
        })->each(function ($entry) {
            $categoryName = $entry['Category'];

           // Verificar si la categoría ya existe
            $category = Category::where('category', $categoryName)->first();

            if ($category) {
                // Cortar el proceso si la categoria existe
                return response()->json(['error' => true, 'message' => 'La categoría ya existe en la base de datos.']);
            }

            // La categoría no existe insertar en la base de datos
            $category = Category::create(['category' => $categoryName]);

            // Insertamos la entidad
            Entity::create([
                'api' => $entry['API'],
                'description' => $entry['Description'],
                'link' => $entry['Link'],
                'category_id' => $category->id,
            ]);
        });
        return response()->json(['success' => true, 'message' => 'Datos importados con &eacute;xito.']);
    } else {
        return response()->json(['error' => false, 'message' => 'No se pudieron recuperar datos de la API.']);
    }
}
}
