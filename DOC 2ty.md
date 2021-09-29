# FORMULÁRIOS 2TY

## Súmario

- [Estrutura Formulários](#estrutura)

  - [ARQUIVO.PHP](#arquivo-php)

    - [Exemplo COM Carregamento Prévio](#exemplo-com-carregamento-prévio)

    - [Exemplo SEM carregamento Prévio](#exemplo-sem-carregamento-prévio)

  - [Interface FormMaker](#interface-formmaker)

    - [Ocultar Fieldset](#ocultar-fieldset)

    - [Ocultar Campo](#ocultar-campo)

- [Tabelas](#tabelas-2ty)

  - [Horizontal](#tabela-horizontal)

  - [Vertical](#tabela-vertical)

  - [CSS/STYLES](#customização-css-ou-styles)


## Estrutura

Ao criar uma nova aba para formulario precisa-se de:

- raiz/
  - nome.php : onde poderá carregar dados previamente e gerar o formulario
  - nome.form.php: onde deve-se criar o formulario a extensão .form permite a utilização do ambiene FORMMAKER

### ARQUIVO PHP

#### Exemplo COM Carregamento Prévio

```php
// checagem do GET
if($_GET['id']) {

// carrega dados previos
$dadoFields = $Tabela->carregar(['idTabela' => $_GET['id']]);

}
require 'arquivo.form.php';
$idForm = $generate->gridform($params);
```

#### Exemplo SEM carregamento Prévio

```php

require 'arquivo.form.php';
$idForm = $generate->gridform($params);
```

## Interface FormMaker

O ambiente de desenvolvimento pode ser aberto em arquivos ```[arquivo].form.php```

O ambiente é divido em:

- Fieldset : Blocos de campos
  - Campos : Textos, numeros, selects, require e outros

### Ocultar Fieldset

Oculta fieldset apartir do id do Fieldset

Uso no FORMAKER:  ```[TEXTO_FIELDSET:ID_FIELDSET]```.

Exemplo de criação de Fieldset: Nota Fiscal:dadosFiscais

```php

$generate->gridform_ocultarFieldset('[IDFIELDSET]');

```

### Ocultar Campo

Oculta campo apartir do seu nome

Uso no FORMAKER:  

```

Rotulo: um texto qualquer
Nome do campo: Nome_CAMPO_TABELA_SQL   

```

Exemplo de criação de Fieldset: Nota Fiscal:dadosFiscais

```php

$generate->gridform_ocultarCampo('[NOME DO CAMPO]');

```

# Tabelas 2TY

Os modelos de tabela são regindos pela classe ```$tables```. os dados/css são obtidos apartir de arrays

## Tabela Horizontal

É compostas por N colunas e N linhas, definidos apartir do array de objetos.

Exemplo de tabela (Renderizado):

col_1 | col_2 | col_N
------|-------|-----
dado_1| dado_2| dados_N     [row_1]
dado_11| dado_12| dado_1N     [row_N]

Exemplo do **array de entrada de dados**:

```php
    $dados = [
        "row_1" => [
            "col_1" => "dado_1",
            "col_2" => "dado_2",
            "col_N" => "dado_N",
        ],

        "row_N" => [
            "col_1" => "dado_11",
            "col_2" => "dado_12",
            "col_N" => "dado_1N",
        ],

    ];
```

Como renderizar tabela:

``` php
//entradas: 
    # dados : array
    # classes e styles : array
$tables->tabelaHorizontal($dados,$styles);

```

Opcional ```$styles``` é um array contendo styles e classes html/css.

``` php

$styles = [
    "class" => [
        "tables" => "",
        "td" => "",
        "th" => "",
        "..." => "",
    ],
    "styles" => [
        "tables" => "width: px",
        "td" => "paddgin:",
        "th" => "etc.",
         "..." => "",
    ],


];

```

## Tabela Vertical

É compostas por 2 colunas e N linhas, definidos apartir do array de objetos.

Exemplo de tabela (Renderizado):

key  |  valor |
------|-------|
key_1| dado_1|
key_2| dado_2|

Exemplo do **array de entrada de dados**:

```php
    $dados[] = [
        "key_1" => "dado_1",
        "key_2" => "dado_2",
    ];
```

Como renderizar tabela:

``` php
//entradas: 
    # dados : array
    # classes e styles : array
$tables->tabelaHorizontal($dados,$styles);

```

### Customização CSS ou STYLES

Opcional ```$styles``` é um array contendo styles e classes html/css.

``` php

$styles = [
    "class" => [
        "tables" => "",
        "td" => "",
        "th" => "",
        "..." => "",
    ],
    "styles" => [
        "tables" => "width: px",
        "td" => "paddgin:",
        "th" => "etc.",
         "..." => "",
    ],


];

```