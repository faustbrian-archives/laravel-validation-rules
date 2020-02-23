<?php

declare(strict_types=1);

/*
 * This file is part of Laravel Validation Rules.
 *
 * (c) KodeKeep <hello@kodekeep.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace KodeKeep\ValidationRules\Rules;

use Illuminate\Contracts\Validation\Rule;
use Mpociot\VatCalculator\Exceptions\VATCheckUnavailableException;
use Mpociot\VatCalculator\Facades\VatCalculator;

class VatId implements Rule
{
    public function passes($attribute, $value)
    {
        try {
            return VatCalculator::isValidVATNumber($value);
        } catch (VATCheckUnavailableException $e) {
            return false;
        }
    }

    public function message()
    {
        return 'The VAT ID is invalid.';
    }
}
