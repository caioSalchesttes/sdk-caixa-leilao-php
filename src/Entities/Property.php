<?php

namespace Caiosalchesttes\SdkCaixaLeilaoPhp\Entities;

use Caiosalchesttes\SdkCaixaLeilaoPhp\CaixaGovService;
use Illuminate\Support\Collection;

class Property
{
    public readonly string $hdnimovel;
    public readonly string $uf;

    public function setUf(string $uf): void
    {
        $this->uf = $uf;
    }

    public function setHdnimovel(string $hdnimovel): void
    {
        $this->hdnimovel = $hdnimovel;
    }

    public function tranformToArray(string $context): array
    {
        preg_match_all("/value='([^']+)'/", $context, $matches);

        $allValues = [];
        foreach ($matches[1] as $valuesString) {
            $allValues = array_merge($allValues, explode('||', $valuesString));
        }

        return array_values(array_filter($allValues, function($value) {
            return strlen($value) > 12;
        }));
    }

    public function get(string $hdnCity, string $uf = 'SP'): Collection
    {
        $service = new CaixaGovService();
        $getBody = $service->getApi()->post('carregaPesquisaImoveis.asp', $this->getBody($hdnCity, $uf))->body();
        $this->setUf($uf);
        return $this->transform(
            $this->tranformToArray($getBody)
        );
    }

    protected function transform(array $citiesArray): Collection
    {
        return collect($citiesArray)->map(function ($cityData) {
            $city = new self();
            $city->setHdnimovel($cityData);
            return $city;
        });
    }

    public function getBody(string $hdnCity, string $uf)
    {
        return [
            'hdn_estado' => $uf,
            'hdn_cidade'=> $hdnCity,
            'hdn_bairro'=> '',
            'hdn_tp_venda'=> '',
            'hdn_tp_imovel'=> 'Selecione',
            'hdn_area_util'=> 'Selecione',
            'hdn_faixa_vlr'=> 'Selecione',
            'hdn_quartos'=> 'Selecione',
            'hdn_vg_garagem'=> 'Selecione',
            'strValorSimulador'=> '',
            'strAceitaFGTS'=> '',
            'strAceitaFinanciamento'=> ''
        ];
    }
}
