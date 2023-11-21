<?php

namespace Caiosalchesttes\SdkCaixaLeilaoPhp\Traits;

use Caiosalchesttes\SdkCaixaLeilaoPhp\Entities\Property;

trait hasProperties
{
    public function properties(): Property
    {
        return new Property();
    }
}
