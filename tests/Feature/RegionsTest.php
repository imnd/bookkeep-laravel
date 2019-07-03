<?php

namespace Tests\Feature;

use Tests\TestCase,
    Illuminate\Foundation\Testing\WithFaker,
    App\Models\Regions
;

class RegionsTest extends TestCase
{
    /**
     * Авторизированные пользователи могут создавать товары
     * @test
     * @return void
     */
    public function authenticated_users_can_create_contract()
    {
        $this->assertEquals(0, Regions::count());
        $data = [
            'name' => $this->faker->text,
            'description' => $this->faker->text,
        ];
        $this
            ->actingAs($this->user, 'api')
            ->postJson(route('api.regions.store'), $data)
            ->assertStatus(201);

        $this->assertEquals(1, Regions::count());

        $model = Regions::first();

        foreach (array_keys($data) as $key) {
            $this->assertEquals($data[$key], $model->$key);
        }
    }

    /**
     * Неавторизированные пользователи не могут создавать товары
     * @test
     */
    public function unauthenticated_users_cant_create_contract()
    {
        $this->withExceptionHandling();

        $this->postJson(route('api.regions.store'))
            ->assertStatus(401);
    }
}
