<?php

namespace App\Actions\Rules;

use App\Models\Connector;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Str;

class UniqueHost implements Rule
{
    public function passes($attribute, $value)
    {
        $host = parse_url($value)['host'];

        return !Connector::where('host', $host)->exists();
    }

    public function message()
    {
        return 'The provided shop :attribute is already in use.';
    }
}