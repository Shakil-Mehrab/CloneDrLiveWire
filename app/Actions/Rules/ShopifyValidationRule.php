<?php

namespace App\Actions\Rules;

use App\Actions\Rules\UniqueHost;

trait ShopifyValidationRule
{
    protected function urlRules()
    {

        return ['required', 'url', 'active_url', new UniqueHost()];
    }
}
