<?php

declare(strict_types=1);

/*
 * This file is part of Laravel Validation Rules.
 *
 * (c) Konceiver <info@konceiver.dev>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Konceiver\ValidationRules\Tests;

use Mpociot\VatCalculator\VatCalculatorServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

abstract class TestCase extends Orchestra
{
    protected function getPackageProviders($app)
    {
        return [VatCalculatorServiceProvider::class];
    }
}
