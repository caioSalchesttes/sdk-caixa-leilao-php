# Manual da SDK CaixaLeilao

Este documento fornece uma visão geral e exemplos de uso da SDK `CaixaLeilao`.

## Índice

- [Obtendo Cidades](#obtendo-cidades)
- [Pesquisando Propriedades](#pesquisando-propriedades)
- [Detalhes do Imóvel](#detalhes-do-imóvel)

## Obtendo Cidades

Para obter informações sobre cidades, utilize o método `cities()`. Exemplo:

```php
CaixaLeilao::cities()->get("SP");


Claro! Aqui está a versão em Markdown do manual para a SDK CaixaLeilao, organizada de forma contínua para fácil cópia:

markdown
Copy code
# Manual da SDK CaixaLeilao

Este documento fornece uma visão geral e exemplos de uso da SDK `CaixaLeilao`.

## Índice

- [Obtendo Cidades](#obtendo-cidades)
- [Pesquisando Propriedades](#pesquisando-propriedades)
- [Detalhes do Imóvel](#detalhes-do-imóvel)

## Obtendo Cidades

Para obter informações sobre cidades, utilize o método `cities()`. Exemplo:

```php
CaixaLeilao::cities()->get("SP");
Este método retorna informações sobre a cidade especificada, neste caso, São Paulo (SP).
```php
 
## Pesquisando Propriedades
Para buscar propriedades com base no código da cidade, utilize o método properties(). Exemplo:

```php
CaixaLeilao::properties()->get("Codigo da cidade");
```php

Substitua "Codigo da cidade" pelo código específico da cidade para obter informações sobre propriedades disponíveis nessa localidade.

Detalhes do Imóvel
Para obter detalhes específicos de um imóvel, use o método details(). Exemplo:

CaixaLeilao::details()->find("Codigo do imovel");


Claro! Aqui está a versão em Markdown do manual para a SDK CaixaLeilao, organizada de forma contínua para fácil cópia:

markdown
Copy code
# Manual da SDK CaixaLeilao

Este documento fornece uma visão geral e exemplos de uso da SDK `CaixaLeilao`.

## Índice

- [Obtendo Cidades](#obtendo-cidades)
- [Pesquisando Propriedades](#pesquisando-propriedades)
- [Detalhes do Imóvel](#detalhes-do-imóvel)

## Obtendo Cidades

Para obter informações sobre cidades, utilize o método `cities()`. Exemplo:

```php
CaixaLeilao::cities()->get("SP");
Este método retorna informações sobre a cidade especificada, neste caso, São Paulo (SP).

Pesquisando Propriedades
Para buscar propriedades com base no código da cidade, utilize o método properties(). Exemplo:

```php
CaixaLeilao::properties()->get("Codigo da cidade");
```

Substitua "Codigo da cidade" pelo código específico da cidade para obter informações sobre propriedades disponíveis nessa localidade.

## Detalhes do Imóvel
Para obter detalhes específicos de um imóvel, use o método details(). Exemplo:

```php
CaixaLeilao::details()->find("Codigo do imovel");
```

Substitua "Codigo do imovel" pelo código específico do imóvel para obter informações detalhadas.

Este manual é um guia básico para começar a usar a SDK CaixaLeilao. Para mais informações e métodos avançados, consulte a documentação oficial da SDK.