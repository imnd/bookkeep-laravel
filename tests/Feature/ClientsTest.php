<?php

namespace Tests\Feature;

use Tests\TestCase,
    Illuminate\Foundation\Testing\WithFaker,
    App\Models\Clients
;

class ClientsTest extends TestCase
{
    /**
     * Авторизированные пользователи могут создавать товары
     * @test
     * @return void
     */
    public function authenticated_users_can_create_client()
    {
        $this->assertEquals(0, Clients::count());
        $data = [
            'name' => $this->faker->text,
            'address' => $this->faker->address,
            'region_id' => $this->faker->numberBetween(0, 10),
            'telephone' => $this->_get10digits(),
            'fax' => $this->_get10digits(),
            'contact_fio' => $this->faker->name,
            'contact_post' => $this->faker->text,
            'account' => $this->_get10digits(),
            'bank' => $this->faker->text,
            'INN' => $this->_get10digits(),
            'KPP' => $this->_get10digits(),
            'BIK' => $this->_get10digits(),
            'sort' => $this->faker->numberBetween(0, 999),
            'active' => $this->faker->numberBetween(0, 1),
        ];
        $this
            ->actingAs($this->user, 'api')
            ->postJson(route('api.clients.store'), $data)
            ->assertStatus(201);

        $this->assertEquals(1, Clients::count());

        $model = Clients::first();

        foreach (array_keys($data) as $key) {
            $this->assertEquals($data[$key], $model->$key);
        }
    }

    /**
     * Неавторизированные пользователи не могут создавать товары
     * @test
     */
    public function unauthenticated_users_cant_create_client()
    {
        $this->withExceptionHandling();

        $this->postJson(route('api.clients.store'))
            ->assertStatus(401);
    }

    /**
     * Строка длиной в 10 цифр
     * @return string
     */
    private function _get10digits()
    {
        return $this->faker->numberBetween(10000000, 999999999) . $this->faker->numberBetween(1, 9);
    }
}
