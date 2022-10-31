<?php
/*
 *  This file is part of the Quantum Unit Solutions development package.
 *
 *  (c) Quantum Unit Solutions <http://github.com/dmeikle/>
 *
 *  For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
 */

namespace Tests\QuantumUnit\Utils\Yaml;


use QuantumUnit\Utils\Exceptions\FileNotFoundException;
use QuantumUnit\Utils\Yaml\YamlLoader;
use tests\BaseTest;

/**
 * YamlLoaderTest
 *
 * @author Organization: Quantum Unit
 * @author Developer: David Meikle <david@quantumunit.com>
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