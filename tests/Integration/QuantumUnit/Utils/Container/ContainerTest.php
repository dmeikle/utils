<?php

/**
 * Elentra ME [https://elentra.org]
 *
 * Copyright 2022 Queen's University or its assignee ("Queen's"). All Rights Reserved.
 *
 * This work is subject to Community Licenses ("CL(s)") between Queen's and its various licensee's,
 * respectively, and may only be viewed, accessed, used, reproduced, compiled, modified, copied or
 * exploited (together "Used") in accordance with a CL. Only Elentra or its licensees and their
 * respective Authorized Developers may Use this work in accordance with a CL. If you are not an
 * Authorized Developer, please contact Elentra Corporation (at info@elentra.com) or its applicable
 * licensee to review the rights and obligations under the applicable CL and become an Authorized
 * Developer before Using this work.
 *
 * @author    Organization: Elentra Corp
 * @author    Developer: David Meikle <dave.meikle@elentra.com>
 * @copyright Copyright 2022 Elentra Corporation. All Rights Reserved.
 */

namespace Tests\QuantumUnit\Utils\Containers;


use QuantumUnit\Utils\Container\Container;
use QuantumUnit\Utils\Container\Exceptions\ObjectNotFoundException;
use QuantumUnit\Utils\Exceptions\FileNotFoundException;
use tests\BaseTest;

/**
 * ContainerTest
 *
 * @author Organization: Elentra Corp
 * @author Developer: David Meikle <david.meikle@elentra.com>
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