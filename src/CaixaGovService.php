<?php

namespace Caiosalchesttes\SdkCaixaLeilaoPhp;

use Caiosalchesttes\SdkCaixaLeilaoPhp\Traits\HasCities;
use Caiosalchesttes\SdkCaixaLeilaoPhp\Traits\HasDetails;
use Caiosalchesttes\SdkCaixaLeilaoPhp\Traits\hasProperties;
use Illuminate\Support\Facades\Http;

class CaixaGovService
{
    use HasCities;
    use HasProperties;
    use HasDetails;

    protected $api;
    public function getApiUrl()
    {
        return 'https://venda-imoveis.caixa.gov.br/sistema';
    }

    public function getHeaders(): array
    {
        return [
            'authority'          => 'venda-imoveis.caixa.gov.br',
            'accept'             => '*/*',
            'accept-language'    => 'pt-BR,pt;q=0.9,en-US;q=0.8,en;q=0.7',
            'cookie'             => '_gcl_au=1.1.1174575467.1700487076; _gid=GA1.3.1116141520.1700487077; _ga_RD3F5P2Z1Q=GS1.3.1700487077.1.0.1700487077.60.0.0; AdoptVisitorId=MwFgxgRiCGEOwFoAM9gJHAnCBm5IA4E4AzWEpAJgEZMSBTMIA===; AdoptConsent=N4Ig7gpgRgzglgFwgSQCIgFwgBwGYDGAbAIYSEBMAtAAwCc5hlALAKzUSXFMDsAJpbQBm+QYTpNquKIJAAaEAHsADgmQA7ACrEA5jEwBtEAEcAqgDkAMrgBqEAJpwAXnPABpABIWTxANYBZO20XABtiOHIAD2oAQXwmJRdUGgArV1wACzVCZJcAVwA3ADEwYkpgpgB9GXkzWiVXZEEWWg0LF0dqcIi1XOwTaJc4AGEAUQjbWgBPXjsXKCNaAEUAdTNlwvyALRcTGHwKiqU+lmwXDW1rNV5BYMmNU/lqJhhefKMRx14ARhd8fOIWMQ1ABbWgjABCIAAuvJlAgAPK5BBaXQGKEAXyAA===; _fbp=fb.2.1700487079220.535955330; __uzma=e3983e0f-f504-465a-82ec-31a323f54812; __uzmb=1700487080; __uzme=8383; ASPSESSIONIDACDTQRDB=AGCJFNABIDJLONDLKKDCKAPD; ARRAffinity02=9ee91e4c259ffc5253f885ab61cda13ff93e106bfae44f9c02f958484585cdd2; UqZBpD3n3kS4aGYulCWJiSbNcs42xA__=v1LPZXgw__ksf; _ga=GA1.1.1353081109.1700487077; _ga=GA1.4.1353081109.1700487077; _gid=GA1.4.1116141520.1700487077; __uzmc=2667310016458; __uzmd=1700487445; _ga_PD5EBJFQ7X=GS1.1.1700487077.1.1.1700487444.0.0.0',
            'origin'             => 'https://venda-imoveis.caixa.gov.br',
            'referer'            => 'https://venda-imoveis.caixa.gov.br/sistema/busca-imovel.asp?sltTipoBusca=imoveis',
            'sec-ch-ua'          => '"Google Chrome";v="119", "Chromium";v="119", "Not?A_Brand";v="24"',
            'sec-ch-ua-mobile'   => '?0',
            'sec-ch-ua-platform' => '"Linux"',
            'sec-fetch-dest'     => 'empty',
            'sec-fetch-mode'     => 'cors',
            'sec-fetch-site'     => 'same-origin',
            'user-agent'         => 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36',
            'x-requested-with'   => 'XMLHttpRequest'
        ];
    }

    public function __construct()
    {
        $this->api = Http::asForm()->withHeaders($this->getHeaders())->baseUrl($this->getApiUrl());
    }

    public function getApi()
    {
        return $this->api;
    }
}
