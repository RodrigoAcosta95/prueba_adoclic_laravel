<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Http\Controllers\ApiController;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ApiServiceTest extends TestCase
{
    use RefreshDatabase;

    /** para recuperar datos de la api */
    public function fetch_data_from_api()
    {
        $response = (new ApiController())->fetchDataFromApi();

        $this->assertTrue($response->json('success'));
    }
}
