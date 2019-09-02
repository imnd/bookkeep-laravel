<?php

namespace Tests\Feature;

use Tests\TestCase;

class ClientsTest extends TestCase
{
    /**
     * @inheritdoc
     */
    protected $modelName = 'Clients';

    /**
     * Авторизированные пользователи могут видеть клиентов
     * @test
     * @return void
     */
    public function authenticated_users_can_see_clients()
    {
        $this->listAuth();
    }

    /**
     * Авторизированные пользователи могут видеть клиентов
     * @test
     * @return void
     */
    public function unauthenticated_users_cant_see_clients()
    {
        $this->listUnauth();
    }

    /**
     * Авторизированные пользователи могут создавать клиентов
     * @test
     * @return void
     */
    public function authenticated_users_can_create_client()
    {
        $this->createAuth();
    }

    /**
     * Неавторизированные пользователи не могут создавать клиентов
     * @test
     */
    public function unauthenticated_users_cant_create_client()
    {
        $this->createUnauth();
    }

    /**
     * Авторизированные пользователи могут видеть клиентов
     * @test
     * @return void
     */
    public function authenticated_users_can_update_client()
    {
        $this->updateAuth();
    }

    /**
     * Неавторизированные пользователи не могут видеть клиентов
     * @test
     * @return void
     */
    public function unauthenticated_users_cant_update_client()
    {
        $this->updateUnauth();
    }

    /**
     * @inheritdoc
     */
    protected function getData(): array
    {
        return [
            'name' => $this->faker->text,
            'address' => $this->faker->address,
            'region_id' => $this->faker->numberBetween(0, 10),
            'telephone' => $this->_get10Digits(),
            'fax' => $this->_get10Digits(),
            'contact_fio' => $this->faker->name,
            'contact_post' => $this->faker->text,
            'account' => $this->_get10Digits(),
            'bank' => $this->faker->text,
            'INN' => $this->_get10Digits(),
            'KPP' => $this->_get10Digits(),
            'BIK' => $this->_get10Digits(),
            'sort' => $this->faker->numberBetween(0, 999),
            'active' => $this->faker->numberBetween(0, 1),
        ];
    }

    /**
     * 
     * 
     * @param boolean string integer array mixed 
     * @return 
     */
    private function _get10Digits()
    {
        return $this->faker->numberBetween(1, 9) . $this->faker->numerify('#########');
    }
}
