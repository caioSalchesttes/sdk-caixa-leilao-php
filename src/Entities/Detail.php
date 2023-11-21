<?php

namespace App\Services\CaixaGov\Entities;

use App\Services\CaixaGov\CaixaGovService;

class Detail
{
    public readonly string $hdnimovel;
    public readonly string $propertyType;
    public readonly string $address;
    public readonly string $description;
    public readonly float $avaliationPrice;
    public readonly float $minimumPrice;
    public readonly float $discount;
    public readonly string $rooms;
    public readonly string $privateArea;
    public readonly string $totalArea;
    public readonly bool $acceptFgts;
    public readonly bool $acceptFinancing;

    public function setHdnimovel(string $hdnimovel): void
    {
        $this->hdnimovel = $hdnimovel;
    }

    public function setAcceptFinancing(bool $acceptFinancing): void
    {
        $this->acceptFinancing = $acceptFinancing;
    }

    public function setPropertyType(string $propertyType): void
    {
        $this->propertyType = $propertyType;
    }

    public function setAvaliationPrice(string $avaliationPrice): void
    {
        $this->avaliationPrice = $avaliationPrice;
    }

    public function setMinimumPrice(string $minimumPrice): void
    {
        $this->minimumPrice = $minimumPrice;
    }

    public function setDiscount(string $discount): void
    {
        $this->discount = $discount;
    }

    public function setRooms(string $rooms): void
    {
        $this->rooms = $rooms;
    }

    public function setPrivateArea(string $privateArea): void
    {
        $this->privateArea = $privateArea;
    }

    public function setTotalArea(string $totalArea): void
    {
        $this->totalArea = $totalArea;
    }

    public function setAcceptFgts(string $acceptFgts): void
    {
        $this->acceptFgts = $acceptFgts;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }


    public function setAddress(string $address): void
    {
        $this->address = $address;
    }

    function getStringBetween($string, $start, $end)
    {
        $string = ' ' . $string;
        $ini = strpos($string, $start);
        if ($ini == 0) return '';
        $ini += strlen($start);
        $len = strpos($string, $end, $ini) - $ini;
        return substr($string, $ini, $len);
    }

    public function getAvaliationPrice()
    {
        return $this->avaliationPrice;
    }

    public function getMinimumPrice()
    {
        return $this->minimumPrice;
    }

    public function calculateDiscount()
    {
        $discount_amount = $this->getAvaliationPrice() - $this->getMinimumPrice();

        if($this->getAvaliationPrice() <= 0 || $this->getMinimumPrice() <= 0) {
            return 0;
        }

        return round(($discount_amount / $this->getAvaliationPrice()) * 100, 2);
    }

    public function convertToFloat(string $value)
    {
        return (float) str_replace(',', '.', str_replace('.', '', $value));
    }

    public function ifContains(string $text): bool
    {
        return strlen($text) > 0 ? false : true;
    }

    public function setData(string $context): void
    {
        $this->setAvaliationPrice($this->convertToFloat($this->getStringBetween($context, "Valor de avaliação: R$ ", "<br")));
        $this->setMinimumPrice($this->convertToFloat($this->getStringBetween($context, "Valor mínimo de venda: R$ ", "</b>")));
        $this->setPropertyType($this->getStringBetween($context, "Tipo de imóvel: <strong>", "</strong>"));
        $this->setRooms($this->getStringBetween($context, "Quartos: <strong>", "</strong>"));
        $this->setAddress($this->getStringBetween($context, "<strong>Endereço:</strong><br>", "</p>"));
        $this->setPrivateArea($this->getStringBetween($context, "Área privativa = <strong>", "</strong>"));
        $this->setTotalArea($this->getStringBetween($context, "Área do terreno = <strong>", "</strong>"));
        $this->setDescription($this->getStringBetween($context, "Descrição:</strong><br>", "</p>"));
        $this->setAcceptFinancing($this->ifContains($this->getStringBetween($context, "Imóvel NÃO aceita financiamento habitacional.", "<br>")));
        $this->setAcceptFgts($this->ifContains($this->getStringBetween($context, "Imóvel NÃO aceita utilização de FGTS.", "<br>")));
        $this->setDiscount($this->calculateDiscount());
    }

    public function find(string $hdnimovel)
    {
        $service = new CaixaGovService();
        $getBody = $service->getApi()->post('detalhe-imovel.asp', $this->getBody($hdnimovel))->body();

        $this->setHdnimovel($hdnimovel);
        $this->setData($getBody);

        return $this;
    }

    public function getBody(string $hdnimovel): array
    {
        return [
            "hdnimovel" => $hdnimovel,
        ];
    }
}
