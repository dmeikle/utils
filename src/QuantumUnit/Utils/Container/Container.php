<?php
/*
 *  This file is part of the Quantum Unit Solutions development package.
 *
 *  (c) Quantum Unit Solutions <http://github.com/dmeikle/>
 *
 *  For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
 */

/**
 * Created by PhpStorm.
 * User: user
 * Date: 3/1/2017
 * Time: 10:36 PM
 */

namespace QuantumUnit\Utils\Container;

use QuantumUnit\Utils\Container\Exceptions\ObjectNotFoundException;

/**
 * Container
 *
 * @author Organization: Elentra Corp
 * @author Developer: David Meikle <david.meikle@elentra.com>
 */
class Container 
{

    /**
     * @var array
     */
    private $directory = [];

    /**
     * remove all items from memory
     */
    public function __destruct() {
        while (count($this->directory) > 0) {
            try {
                $item = array_pop($this->directory);
                unset($item);
            } catch (\Exception $e) {

            }
        }
    }

    /**
     * @param $key
     * @return mixed
     * @throws ObjectNotFoundException
     */
    public function get(string $key) {

        if (!array_key_exists($key, $this->directory)) {
            throw new ObjectNotFoundException($key . ' does not exist in container');
        }

        return $this->directory[$key];
    }


    /**
     * @param $key
     * @param $object
     */
    public function set(string $key, $object) {
        $this->directory[$key] = $object;
    }

    /**
     * @return array
     */
    public function getKeys(): array {
        return array_keys($this->directory);
    }
}