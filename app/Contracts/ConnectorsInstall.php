<?php

namespace App\Actions\Contracts;

interface ConnectorsInstall
{
    public function install($user, array $input);
}