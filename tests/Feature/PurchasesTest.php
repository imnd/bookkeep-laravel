<?php

namespace Tests\Feature;

use Tests\TestCase,
    App\Models\Purchases;

class PurchasesTest extends TestCase
{
    protected $modelName = 'Purchases';

    /**
     * Авторизированные пользователи могут видеть закупки
     * @test
     * @return void
     */
    public function authenticated_users_can_see_purchases()
    {
        $this->listAuth();
    }

    /**
     * Авторизированные пользователи могут видеть закупки
     * @test
     * @return void
     */
    public function unauthenticated_users_cant_see_purchases()
    {
        $this->listUnauth();
    }

    /**
     * Авторизированные пользователи могут создавать закупки
     * @test
     * @return void
     */
    public function authenticated_users_can_create_purchase()
    {
        $this->createAuth();
    }

    /**
     * Неавторизированные пользователи не могут создавать закупки
     * @test
     */
    public function unauthenticated_users_cant_create_purchase()
    {
        $this->createUnauth();
    }

    /**
     * Авторизированные пользователи могут видеть закупки
     * @test
     * @return void
     */
    public function authenticated_users_can_update_purchase()
    {
        $this->updateAuth();
    }

    /**
     * Неавторизированные пользователи не могут видеть закупки
     * @test
     * @return void
     */
    public function unauthenticated_users_cant_update_purchase()
    {
        $this->updateUnauth();
    }

    /**
     * @inheritdoc
     */
    protected function getData(): array
    {
        return [
            'number' => $this->faker->numberBetween(0, 10),
            'sum' => $this->faker->numberBetween(0, 999),
            'date' => $this->faker->date,
            'rows' => [
                [
                    'purchase_id' => $this->faker->numberBetween(0, 10),
                    'article_subcategory_id' => $this->faker->numberBetween(0, 10),
                    'quantity' => $this->faker->numberBetween(0, 100),
                    'price' => $this->faker->numberBetween(10, 100),
                ],
            ],
        ];
    }
}
