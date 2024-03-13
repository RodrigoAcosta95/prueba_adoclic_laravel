<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Entity;
use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ModelsTest extends TestCase
{
    use RefreshDatabase;

    /** el siguiente test es para crear entidad */
    public function create_entity()
    {
        $entity = Entity::factory()->create();

        $this->assertInstanceOf(Entity::class, $entity);
    }

    /**  el siguiente test es para crear categoria */
    public function create_category()
    {
        $category = Category::factory()->create();

        $this->assertInstanceOf(Category::class, $category);
    }
}
