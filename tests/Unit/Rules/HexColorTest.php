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

namespace Konceiver\ValidationRules\Tests\Unit\Rules;

use Konceiver\ValidationRules\Rules\HexColor;
use Konceiver\ValidationRules\Tests\TestCase;

/**
 * @covers \Konceiver\ValidationRules\Rules\HexColor
 */
class HexColorTest extends TestCase
{
    /** @test */
    public function can_pass_validation()
    {
        $subject = new HexColor();

        $this->assertTrue($subject->passes('color', '#ffffff'));
    }

    /** @test */
    public function can_fail_validation()
    {
        $subject = new HexColor();

        $this->assertFalse($subject->passes('color', 'invalid'));
    }

    /** @test */
    public function shows_the_correct_validation_message()
    {
        $subject = new HexColor();

        $this->assertSame('The hex color is invalid.', $subject->message());
    }
}
