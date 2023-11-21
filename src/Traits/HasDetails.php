<?php

namespace App\Services\CaixaGov\Traits;

use App\Services\CaixaGov\Entities\City;
use App\Services\CaixaGov\Entities\Detail;

trait HasDetails
{
    public function details() : Detail
    {
        return new Detail();
    }
}
