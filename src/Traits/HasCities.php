<?php

namespace Caiosalchesttes\SdkCaixaLeilaoPhp\Traits;

use Caiosalchesttes\SdkCaixaLeilaoPhp\Entities\City;

trait HasCities
{
    public function cities() : City
    {
        return new City();
    }
}
