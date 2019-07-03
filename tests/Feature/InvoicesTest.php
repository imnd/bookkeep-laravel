<?php

namespace Tests\Feature;

use Tests\TestCase,
    Illuminate\Foundation\Testing\WithFaker,
    App\Models\Invoices
;

class InvoicesTest extends TestCase
{
    /**
     * Авторизированные пользователи могут создавать товары
     * @test
     * @return void
     */
    public function authenticated_users_can_create_contract()
    {
        $this->assertEquals(0, Invoices::count());
        $data = [
            'client_id' => $this->faker->numberBetween(0, 10),
            'contract_num' => $this->faker->numberBetween(0, 10),
            'number' => $this->faker->numberBetween(0, 10),
            'sum' => $this->faker->numberBetween(0, 999),
            'payed' => $this->faker->numberBetween(0, 999),
            'date' => $this->faker->date,
            'rows' => [
                [
                    'invoice_id' => $this->faker->numberBetween(0, 10),
                    'article_id' => $this->faker->numberBetween(0, 10),
                    'quantity' => $this->faker->numberBetween(0, 100),
                    'price' => $this->faker->numberBetween(10, 100),
                ],
                [
                    'invoice_id' => $this->faker->numberBetween(0, 10),
                    'article_id' => $this->faker->numberBetween(0, 10),
                    'quantity' => $this->faker->numberBetween(0, 100),
                    'price' => $this->faker->numberBetween(10, 100),
                ],
                [
                    'invoice_id' => $this->faker->numberBetween(0, 10),
                    'article_id' => $this->faker->numberBetween(0, 10),
                    'quantity' => $this->faker->numberBetween(0, 100),
                    'price' => $this->faker->numberBetween(10, 100),
                ],
            ],
        ];
        $this
            ->actingAs($this->user, 'api')
            ->postJson(route('api.invoices.store'), $data)
            ->assertStatus(201);

        $this->assertEquals(1, Invoices::count());

        $model = Invoices::first();

        $fields = array_keys($data);
        unset($fields[count($data) - 1]);
        foreach ($fields as $key) {
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

        $this->postJson(route('api.invoices.store'))
            ->assertStatus(401);
    }
}
