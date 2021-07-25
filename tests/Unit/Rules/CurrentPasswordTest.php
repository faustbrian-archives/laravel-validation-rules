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

use Konceiver\ValidationRules\Rules\CurrentPassword;
use Konceiver\ValidationRules\Tests\TestCase;

/**
 * @covers \Konceiver\ValidationRules\Rules\CurrentPassword
 */
class CurrentPasswordTest extends TestCase
{
    private string $password = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi';

    /** @test */
    public function can_pass_validation()
    {
        $subject = new CurrentPassword($this->password);

        $this->assertTrue($subject->passes('country', 'password'));
    }

    /** @test */
    public function can_fail_validation()
    {
        $subject = new CurrentPassword($this->password);

        $this->assertFalse($subject->passes('country', 'invalid'));
    }

    /** @test */
    public function shows_the_correct_validation_message()
    {
        $subject = new CurrentPassword($this->password);

        $this->assertSame('The given password does not match our records.', $subject->message());
    }
}
