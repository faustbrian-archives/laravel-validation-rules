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

class HexColor implements Rule
{
    public function passes($attribute, $value)
    {
        return (bool) preg_match('/^#([a-fA-F0-9]{6})$/', $value);
    }

    public function message()
    {
        return 'The hex color is invalid.';
    }
}
