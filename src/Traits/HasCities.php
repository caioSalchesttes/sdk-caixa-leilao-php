<?php

namespace App\Services\CaixaGov\Traits;

use App\Services\CaixaGov\Entities\City;

trait HasCities
{
    public function cities() : City
    {
        return new City();
    }
}
