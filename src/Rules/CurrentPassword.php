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
use Illuminate\Support\Facades\Hash;

class CurrentPassword implements Rule
{
    private string $password;

    public function __construct(string $password)
    {
        $this->password = $password;
    }

    public function passes($attribute, $value)
    {
        return Hash::check($value, $this->password);
    }

    public function message()
    {
        return 'The given password does not match our records.';
    }
}
