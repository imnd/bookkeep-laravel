<?php

namespace Tests\Feature;

use Tests\TestCase,
    Illuminate\Foundation\Testing\WithFaker,
    App\Models\Settings
;

class SettingsTest extends TestCase
{
    /**
     * Авторизированные пользователи могут создавать товары
     * @test
     * @return void
     */
    public function authenticated_users_can_create_contract()
    {
        $this->assertEquals(0, Settings::count());
        $data = [
            'name' => $this->faker->text,
            'key' => $this->faker->text,
            'value' => $this->faker->text,
        ];
        $this
            ->actingAs($this->user, 'api')
            ->postJson(route('api.settings.store'), $data)
            ->assertStatus(201);

        $this->assertEquals(1, Settings::count());

        $model = Settings::first();

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

        $this->postJson(route('api.settings.store'))
            ->assertStatus(401);
    }
}
