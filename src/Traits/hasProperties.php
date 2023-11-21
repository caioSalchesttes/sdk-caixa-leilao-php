<?php

namespace App\Services\CaixaGov\Traits;

use App\Services\CaixaGov\Entities\Property;

trait hasProperties
{
    public function properties(): Property
    {
        return new Property();
    }
}
