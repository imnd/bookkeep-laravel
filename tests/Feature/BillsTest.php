<?php

namespace Tests\Feature;

use Tests\TestCase;

class BillsTest extends TestCase
{
    /**
     * @inheritdoc
     */
    protected $modelName = 'Bills';

    /**
     * Авторизированные пользователи могут видеть счета
     * @test
     * @return void
     */
    public function authenticated_users_can_see_bills()
    {
        $this->listAuth();
    }

    /**
     * Авторизированные пользователи могут видеть счета
     * @test
     * @return void
     */
    public function unauthenticated_users_cant_see_bills()
    {
        $this->listUnauth();
    }

    /**
     * Авторизированные пользователи могут создавать счета
     * @test
     * @return void
     */
    public function authenticated_users_can_create_bill()
    {
        $this->createAuth();
    }

    /**
     * Неавторизированные пользователи не могут создавать счета
     * @test
     */
    public function unauthenticated_users_cant_create_bill()
    {
        $this->createUnauth();
    }

    /**
     * Авторизированные пользователи могут видеть счета
     * @test
     * @return void
     */
    public function authenticated_users_can_update_bill()
    {
        $this->updateAuth();
    }

    /**
     * Неавторизированные пользователи не могут видеть счета
     * @test
     * @return void
     */
    public function unauthenticated_users_cant_update_bill()
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
            'sum' => $this->faker->numberBetween(0, 100),
            'remainder' => $this->faker->numberBetween(0, 100),
            'date' => $this->faker->date,
            'contents' => 'payment',
        ];
    }
}
