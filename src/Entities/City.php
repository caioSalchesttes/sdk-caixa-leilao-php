<?php

namespace App\Services\CaixaGov\Entities;

use App\Services\CaixaGov\CaixaGovService;
use Illuminate\Support\Collection;

class City
{
    public int $hdnCity;
    public string $name;
    public string $state;

    public function setState(string $state): void
    {
        $this->state = $state;
    }
    public function setHdnCity(int $hdnCity): void
    {
        if ($hdnCity < 0) {
            throw new \InvalidArgumentException('Id must be greater than 0');
        }
        $this->hdnCity = $hdnCity;
    }

    public function setName(string $name): void
    {
        if (strlen($name) < 3) {
            throw new \InvalidArgumentException('Name must be greater than 3');
        }
        $this->name = $name;
    }

    public static function tranformToArray(string $context): array
    {
        preg_match_all("/value='(\d+)'\>([^<]+)/", $context, $matches);

        $result = array();
        for ($i = 0; $i < count($matches[1]); $i++) {
            $result[] = array('id' => $matches[1][$i], 'name' => $matches[2][$i]);
        }

        return $result;
    }

    public function get(string $state = 'SP'): Collection
    {
        $service = new CaixaGovService();
        $getBody = $service->getApi()->post('carregaListaCidades.asp', $this->getBody($state))->body();
        return $this->transform(
            $this->tranformToArray($getBody)
        , $state);
    }

    protected function transform(array $citiesArray, string $state): Collection
    {
        return collect($citiesArray)->map(function ($cityData) use($state){
            $city = new self();
            $city->setHdnCity($cityData['id']);
            $city->setName($cityData['name']);
            $city->setState($state);
            return $city;
        });
    }

    public function getBody(string $state): array
    {
        return [
            'cmb_estado' => $state,
            'cmb_cidade' => '',
            'cmb_tp_venda' => '',
            'cmb_tp_imovel' => 'Selecione',
            'cmb_area_util' => 'Selecione',
            'cmb_faixa_vlr' => 'Selecione',
            'cmb_quartos' => 'Selecione',
            'cmb_vg_garagem' => 'Selecione',
            'strValorSimulador' => '',
            'strAceitaFGTS' => '',
            'strAceitaFinanciamento' => ''
        ];
    }
}
