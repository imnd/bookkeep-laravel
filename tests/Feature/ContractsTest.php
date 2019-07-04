<?php

namespace Tests\Feature;

use Tests\TestCase,
    App\Models\Contracts;

class ContractsTest extends TestCase
{
    protected $modelName = 'Contracts';

    /**
     * Авторизированные пользователи могут видеть договоры
     * @test
     * @return void
     */
    public function authenticated_users_can_see_contracts()
    {
        $this->listAuth();
    }

    /**
     * Авторизированные пользователи могут видеть договоры
     * @test
     * @return void
     */
    public function unauthenticated_users_cant_see_contracts()
    {
        $this->listUnauth();
    }

    /**
     * Авторизированные пользователи могут создавать договоры
     * @test
     * @return void
     */
    public function authenticated_users_can_create_contract()
    {
        $this->createAuth();
    }

    /**
     * Неавторизированные пользователи не могут создавать договоры
     * @test
     */
    public function unauthenticated_users_cant_create_contract()
    {
        $this->createUnauth();
    }

    /**
     * Авторизированные пользователи могут видеть договоры
     * @test
     * @return void
     */
    public function authenticated_users_can_update_contract()
    {
        $this->updateAuth();
    }

    /**
     * Неавторизированные пользователи не могут видеть договоры
     * @test
     * @return void
     */
    public function unauthenticated_users_cant_update_contract()
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
            'sum' => $this->faker->numberBetween(0, 999),
            'payed' => $this->faker->numberBetween(0, 999),
            'date' => $this->faker->date,
            'term_start' => $this->faker->date,
            'term_end' => $this->faker->date,
            'type' => 'agreement',
            'rows' => [
                [
                    'contract_id' => $this->faker->numberBetween(0, 10),
                    'article_id' => $this->faker->numberBetween(0, 10),
                    'quantity' => $this->faker->numberBetween(0, 100),
                    'price' => $this->faker->numberBetween(10, 100),
                ],
                [
                    'contract_id' => $this->faker->numberBetween(0, 10),
                    'article_id' => $this->faker->numberBetween(0, 10),
                    'quantity' => $this->faker->numberBetween(0, 100),
                    'price' => $this->faker->numberBetween(10, 100),
                ],
                [
                    'contract_id' => $this->faker->numberBetween(0, 10),
                    'article_id' => $this->faker->numberBetween(0, 10),
                    'quantity' => $this->faker->numberBetween(0, 100),
                    'price' => $this->faker->numberBetween(10, 100),
                ],
                [
                    'contract_id' => $this->faker->numberBetween(0, 10),
                    'article_id' => $this->faker->numberBetween(0, 10),
                    'quantity' => $this->faker->numberBetween(0, 100),
                    'price' => $this->faker->numberBetween(10, 100),
                ],
            ],
        ];
    }
}
