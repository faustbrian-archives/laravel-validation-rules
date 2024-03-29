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

namespace Konceiver\ValidationRules\Tests\Analysis;

use GrahamCampbell\Analyzer\AnalysisTrait;
use Konceiver\ValidationRules\Tests\TestCase;

/**
 * @coversNothing
 */
class AnalysisTest extends TestCase
{
    use AnalysisTrait;

    public function getPaths(): array
    {
        return [
            realpath(__DIR__.'/../../src'),
            realpath(__DIR__),
        ];
    }
}
