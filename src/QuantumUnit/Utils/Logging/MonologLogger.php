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

namespace QuantumUnit\Utils\Logging;


/**
 * MonologLogger
 *
 * @author Organization: Elentra Corp
 * @author Developer: David Meikle <david.meikle@elentra.com>
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