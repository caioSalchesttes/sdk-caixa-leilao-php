<?php

namespace Caiosalchesttes\SdkCaixaLeilaoPhp\Traits;

use Caiosalchesttes\SdkCaixaLeilaoPhp\Entities\City;
use Caiosalchesttes\SdkCaixaLeilaoPhp\Entities\Detail;

trait HasDetails
{
    public function details() : Detail
    {
        return new Detail();
    }
}
