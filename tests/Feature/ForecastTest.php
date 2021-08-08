<?php

namespace Tests\Feature;

use Tests\TestCase;

class ForecastTest extends TestCase
{
    /**
     *
     * @return void
     */
    public function testGetForecastResponse200()
    {
        $this->json('GET', "api/forecast/guinobatan", ['Accept' => 'application/json'])
        ->assertStatus(200)
            ->assertJson([
            "cod" => "200",
            ]);
    }

    /**
     *
     * @return void
     */
    public function testGetForecastResponse404()
    {
        $this->json('GET', 'api/forecast/test', ['Accept' => 'application/json'])
        ->assertStatus(404)
            ->assertJson([
                "cod" => "404",
            ]);
    }
}
