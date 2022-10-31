<?php
/*
 *  This file is part of the Quantum Unit Solutions development package.
 *
 *  (c) Quantum Unit Solutions <http://github.com/dmeikle/>
 *
 *  For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
 */

namespace QuantumUnit\Utils\Yaml;


use QuantumUnit\Utils\Exceptions\FileNotFoundException;
use Symfony\Component\Yaml\Yaml;

/**
 * YamlLoader
 *
 * @author Organization: Quantum Unit
 * @author Developer: David Meikle <david@quantumunit.com>
 */
class YamlLoader
{
    private function __construct(){}

    /**
     * @param string $filepath
     * @return mixed
     * @throws FileNotFoundException
     */
    public static function loadConfig(string $filepath) {
        if(!file_exists($filepath)) {
            throw new FileNotFoundException($filepath);
        }

        return @Yaml::parse(file_get_contents($filepath));
    }
}