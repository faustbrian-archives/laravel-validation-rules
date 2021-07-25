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

use Konceiver\ValidationRules\Rules\VatId;
use Konceiver\ValidationRules\Tests\TestCase;
use Mpociot\VatCalculator\Exceptions\VATCheckUnavailableException;
use Mpociot\VatCalculator\Facades\VatCalculator;

/**
 * @covers \Konceiver\ValidationRules\Rules\VatId
 */
class VatIdTest extends TestCase
{
    /** @test */
    public function can_pass_validation()
    {
        VatCalculator::shouldReceive('isValidVATNumber')
            ->with('DE315110518')
            ->andReturn(true);

        $subject = new VatId();

        $this->assertTrue($subject->passes('vat_id', 'DE315110518'));
    }

    /** @test */
    public function can_fail_validation()
    {
        VatCalculator::shouldReceive('isValidVATNumber')
            ->with('invalid')
            ->andReturn(false);

        $subject = new VatId();

        $this->assertFalse($subject->passes('vat_id', 'invalid'));
    }

    /** @test */
    public function can_fail_validation_if_it_encounters_an_exception()
    {
        VatCalculator::shouldReceive('isValidVATNumber')
            ->with('invalid')
            ->andThrow(new VATCheckUnavailableException());

        $subject = new VatId();

        $this->assertFalse($subject->passes('vat_id', 'invalid'));
    }

    /** @test */
    public function shows_the_correct_validation_message()
    {
        $subject = new VatId();

        $this->assertSame('The VAT ID is invalid.', $subject->message());
    }
}
