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

namespace QuantumUnit\Utils\Yaml;


use QuantumUnit\Utils\Exceptions\FileNotFoundException;
use Symfony\Component\Yaml\Yaml;

/**
 * YamlLoader
 *
 * @author Organization: Elentra Corp
 * @author Developer: David Meikle <david.meikle@elentra.com>
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