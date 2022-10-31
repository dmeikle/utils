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
 * Date: 3/5/2017
 * Time: 10:02 PM
 */

namespace QuantumUnit\Utils\Container;

/**
 * ContainerTrait
 *
 * @author Organization: Quantum Unit
 * @author Developer: David Meikle <david@quantumunit.com>
 */
trait ContainerTrait
{
    protected $container;

    /**
     * @return \QuantumUnit\Utils\Container\Container
     */
    public function getContainer():Container {
        return $this->container;
    }

    /**
     * @param \QuantumUnit\Utils\Container\Container $container
     * @return void
     */
    public function setContainer(Container &$container): void {
        $this->container = $container;
    }

}