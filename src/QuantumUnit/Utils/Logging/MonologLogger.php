<?php
/*
 *  This file is part of the Quantum Unit Solutions development package.
 *
 *  (c) Quantum Unit Solutions <http://github.com/dmeikle/>
 *
 *  For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
 */

namespace QuantumUnit\Utils\Logging;


/**
 * MonologLogger
 *
 * @author Organization: Quantum Unit
 * @author Developer: David Meikle <david@quantumunit.com>
 */

use Monolog\Logger;
use QuantumUnit\Utils\Logging\Contracts\LoggingInterface;

class MonologLogger extends Logger implements LoggingInterface
{
    /**
     * @param string $message
     * @param array $context
     * @return mixed
     */
    public function addDebug($message, array $context = []): void {
        parent::debug($message, $context);
    }

    /**
     * @param string $message
     * @param array $context
     * @return mixed
     */
    public function addInfo($message, array $context = []):void {
        parent::info($message, $context);
    }

    /**
     * @param string $message
     * @param array $context
     * @return mixed
     */
    public function addNotice($message, array $context = []): void{
        parent::notice($message, $context);
    }

    /**
     * @param string $message
     * @param array $context
     * @return mixed
     */
    public function addWarning($message, array $context = []): void{
        parent::warning($message, $context);
    }

    /**
     * @param string $message
     * @param array $context
     * @return mixed
     */
    public function addError($message, array $context = []): void{
        parent::error($message, $context);
    }

    /**
     * @param string $message
     * @param array $context
     * @return mixed
     */
    public function addCritical($message, array $context = []): void{
        parent::critical($message, $context);
    }

    /**
     * @param string $message
     * @param array $context
     * @return mixed
     */
    public function addAlert($message, array $context = []): void{
        parent::alert($message, $context);
    }

    /**
     * @param string $message
     * @param array $context
     * @return mixed
     */
    public function addEmergency($message, array $context = []): void{
        parent::emergency($message, $context);
    }

}