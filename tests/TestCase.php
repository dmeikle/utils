<?php

namespace Tests;

use Entrada\Support\Testing\Concerns\InteractsWithElentra;
use Illuminate\Contracts\Console\Kernel;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\DB;
use Tests\Helpers\AbstractClassMethods;
use Tests\Helpers\ComparisonHelper;
use Tests\Helpers\IOHelper;
use Tests\Helpers\JsonResponseHelper;

abstract class TestCase extends BaseTestCase
{
    use InteractsWithElentra;
    use IOHelper;
    use JsonResponseHelper;
    use ComparisonHelper;
    use AbstractClassMethods;

    /**
     * Creates the application.
     *
     * @return Application
     */
    public function createApplication(): Application
    {
        // Define the absolute path to Elentra ME
        if (!defined('ENTRADA_PATH')) {
            define('ENTRADA_PATH', getcwd() . 'TestCase.php/' . getenv('ENTRADA_PATH'));
        }

        $bootstrap = __DIR__ . '/../bootstrap';

        $this->bootElentra($bootstrap, ENTRADA_PATH);

        $app = require $bootstrap . '/app.php';
        $app->make(Kernel::class)->bootstrap();

        return $app;
    }

    /**
     * Check to see if a trait is used
     *
     * @param string $trait
     * @return bool
     */
    protected function uses(string $trait): bool
    {
        return isset(array_flip(class_uses_recursive(static::class))[$trait]);
    }
}
