<?php

namespace Tests\Feature;

use Tests\TestCase,
    App\Models\Invoices;

class InvoicesTest extends TestCase
{
    protected $modelName = 'Invoices';

    /**
     * Авторизированные пользователи могут видеть фактуры
     * @test
     * @return void
     */
    public function authenticated_users_can_see_invoices()
    {
        $this->listAuth();
    }

    /**
     * Авторизированные пользователи могут видеть фактуры
     * @test
     * @return void
     */
    public function unauthenticated_users_cant_see_invoices()
    {
        $this->listUnauth();
    }

    /**
     * Авторизированные пользователи могут создавать фактуры
     * @test
     * @return void
     */
    public function authenticated_users_can_create_invoice()
    {
        $this->createAuth();
    }

    /**
     * Неавторизированные пользователи не могут создавать фактуры
     * @test
     */
    public function unauthenticated_users_cant_create_invoice()
    {
        $this->createUnauth();
    }

    /**
     * Авторизированные пользователи могут видеть фактуры
     * @test
     * @return void
     */
    public function authenticated_users_can_update_invoice()
    {
        $this->updateAuth();
    }

    /**
     * Неавторизированные пользователи не могут видеть фактуры
     * @test
     * @return void
     */
    public function unauthenticated_users_cant_update_invoice()
    {
        $this->updateUnauth();
    }

    /**
     * @inheritdoc
     */
    protected function getData(): array
    {
        return [
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
    }
}
