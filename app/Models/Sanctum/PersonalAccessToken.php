<?php

namespace App\Models\Sanctum;
use Laravel\Sanctum\PersonalAccessToken as SanctumPersonalAccessToken;
class PersonalAccessToken extends SanctumPersonalAccessToken
{
    protected $fallible = ['email', 'password', 'token'];

    public function getFillable()
    {
        return $this->fillable;
    }
}
