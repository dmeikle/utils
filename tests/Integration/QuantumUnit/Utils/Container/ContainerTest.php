<?php
/*
 *  This file is part of the Quantum Unit Solutions development package.
 *
 *  (c) Quantum Unit Solutions <http://github.com/dmeikle/>
 *
 *  For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
 */

namespace Tests\QuantumUnit\Utils\Containers;


use QuantumUnit\Utils\Container\Container;
use QuantumUnit\Utils\Container\Exceptions\ObjectNotFoundException;
use QuantumUnit\Utils\Exceptions\FileNotFoundException;
use tests\BaseTest;

/**
 * ContainerTest
 *
 * @author Organization: Quantum Unit
 * @author Developer: David Meikle <david@quantumunit.com>
 */
class ContainerTest extends BaseTest
{
    public const KEY1 ='key1';
    public const BASIC_ARRAY = ['foo' => 'bar'];
    public const KEY2 ='key2';
    public const BASIC_ARRAY2 = ['foo2' => 'bar2'];
    public const INVALID_KEY = 'invalid';

    /**
     * @test
     * @return void
     * @throws \QuantumUnit\Utils\Container\Exceptions\ObjectNotFoundException
     */
    public function basic_container__should_return_passed_value(): void
    {
        $container = new Container();
        $container->set(self::KEY1, self::BASIC_ARRAY);

        $returned = $container->get(self::KEY1);
        $this->generate($returned);
        $this->assertJsonEquals($returned);
    }

    /**
     * @test
     * @return void
     * @throws \QuantumUnit\Utils\Container\Exceptions\ObjectNotFoundException
     */
    public function basic_container__2_params__should_return_passed_value(): void
    {
        $container = new Container();
        $container->set(self::KEY1, self::BASIC_ARRAY);
        $container->set(self::KEY2, self::BASIC_ARRAY2);

        $returned2 = $container->get(self::KEY2);

        $this->assertJsonEquals($returned2);
    }

    /**
     * @test
     * @return void
     * @throws \QuantumUnit\Utils\Container\Exceptions\ObjectNotFoundException
     */
    public function basic_container__get_all_keys__should_return_passed_values(): void
    {
        $container = new Container();
        $container->set(self::KEY1, self::BASIC_ARRAY);
        $container->set(self::KEY2, self::BASIC_ARRAY2);

        $returned = $container->getKeys();

        $this->assertTrue($returned === [self::KEY1,self::KEY2]);
    }

    /**
     * @test
     * @return void
     * @throws \QuantumUnit\Utils\Container\Exceptions\ObjectNotFoundException
     */
    public function basic_container__get_invalid__should_throw_exception(): void
    {

        $this->expectException(ObjectNotFoundException::class);
        $container = new Container();
        $container->set(self::KEY1, self::BASIC_ARRAY);
        $container->set(self::KEY2, self::BASIC_ARRAY2);

        $container->get(self::INVALID_KEY);
    }
}