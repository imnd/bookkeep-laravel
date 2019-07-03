<?php

namespace Tests\Feature;

use Tests\TestCase,
    Illuminate\Foundation\Testing\WithFaker,
    App\Models\Bills
;

class BillsTest extends TestCase
{
    /**
     * Авторизированные пользователи могут создавать товары
     * @test
     * @return void
     */
    public function authenticated_users_can_create_bill()
    {
        $this->assertEquals(0, Bills::count());
        $data = [
            'client_id' => $this->faker->numberBetween(0, 10),
            'contract_num' => $this->faker->numberBetween(0, 10),
            'sum' => $this->faker->numberBetween(0, 100),
            'remainder' => $this->faker->numberBetween(0, 100),
            'date' => $this->faker->date,
            'contents' => 'payment',
        ];
        $this
            ->actingAs($this->user, 'api')
            ->postJson(route('api.bills.store'), $data)
            ->assertStatus(201);

        $this->assertEquals(1, Bills::count());

        $model = Bills::first();
        foreach (array_keys($data) as $key) {
            $this->assertEquals($data[$key], $model->$key);
        }
    }

    /**
     * Неавторизированные пользователи не могут создавать товары
     * @test
     */
    public function unauthenticated_users_cant_create_bill()
    {
        $this->withExceptionHandling();

        $this->postJson(route('api.bills.store'))
            ->assertStatus(401);
    }
}
