<?php

namespace Caiosalchesttes\SdkCaixaLeilaoPhp\Facades;

use Caiosalchesttes\SdkCaixaLeilaoPhp\CaixaGovService;
use Illuminate\Support\Facades\Facade;

class CaixaLeilao extends Facade
{
    protected static function getFacadeAccessor()
    {
        return CaixaGovService::class;
    }
}
