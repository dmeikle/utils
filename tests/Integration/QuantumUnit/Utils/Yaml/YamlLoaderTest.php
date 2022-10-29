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

namespace Tests\QuantumUnit\Utils\Yaml;


use QuantumUnit\Utils\Exceptions\FileNotFoundException;
use QuantumUnit\Utils\Yaml\YamlLoader;
use tests\BaseTest;

/**
 * YamlLoaderTest
 *
 * @author Organization: Elentra Corp
 * @author Developer: David Meikle <david.meikle@elentra.com>
 */
class YamlLoaderTest extends BaseTest
{
    public const BASIC_FILE_PATH = 'test.yml';
    public const INVALID_FILE_PATH = '.yml';

    /**
     * @return void
     * @test
     * @throws \QuantumUnit\Utils\Exceptions\FileNotFoundException
     */
    public function load_basic_file__should_return_file(): void
    {
        $file = YamlLoader::loadConfig(__INPUT_PATH . self::BASIC_FILE_PATH);

        $this->assertJsonEquals($file);
    }

    /**
     * @return void
     * @test
     * @throws \QuantumUnit\Utils\Exceptions\FileNotFoundException
     */
    public function load_nonexistent_file__should_throw_exception(): void
    {
        $this->expectException(FileNotFoundException::class);
        //$this->expectExceptionCode('the_expected_code');
        //$this->expectExceptionMessage('Wrong exception');

        YamlLoader::loadConfig(__INPUT_PATH . self::INVALID_FILE_PATH);
    }
}