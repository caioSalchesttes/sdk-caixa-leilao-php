<?php

namespace App\Services\CaixaGov\Facades;

use App\Services\CaixaGov\CaixaGovService;
use Illuminate\Support\Facades\Facade;

class CaixaLeilao extends Facade
{
    protected static function getFacadeAccessor()
    {
        return CaixaGovService::class;
    }
}
