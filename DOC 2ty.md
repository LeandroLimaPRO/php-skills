# DOCUMENTAÇÃO PHP

## Súmario

- [Classe Codigo de Barras](#classe-codigo-de-barras)

  - [Ean13](#ean13)

    - [getInfo()](#getinfo)

    - [getNumero()](#getnumero)

    - [getEan()](#getean)

    - [getValido()](#getvalido)

    - [getImagem()](#getimagem)

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

# Classe Codigo de Barras

Intancie o a classe importando e criando objeto

 ```php
    

    $ean = new ean_classe();
 ```

## Ean13

Pode informar um array com até 2 parametros:

```"ean"``` informando este, você terar NUMEROS, ENDEREÇOIMAGEM, É VALIDO,

 ```php
    

    $ean = new ean_classe([

        "ean" => $codigodeBarras,
    ]);
 ```

ou ```"numeros"``` informando este, você terar EAN, ENDEREÇOIMAGEM, É VALIDO,

 ```php
    

    $ean = new ean_classe([
        "numero" => $numero,
    ]);

 ```

### ->getInfo()

Função retorna um array de dados. Sendo eles: **

#### USO

```php
 
 $dados = $ean->getInfo();
 print_r($dados);
 ```

##### resposta

```html
    <pre>
    Array(
            [Ean] => 1000000000245
            [Numeros] => 24
            [Tamanho] => 13
            [Tipo] => ean13
            [Validado] => Sim
            [EnderecoImagem] => http://.../imagens/barcode.php?id=1000000000245&type=ean13
    )
    </pre>
```

### ->getNumero()

Função retorna a numeração correspondente (convertido).

#### Uso

```php
$dado = $ean->getNumero();
```

### ->getEan()

Da mesma forma da função anterior só que retorna o codigo de barras. Preferencialmente quando informo uma numeração qualquer com:

```php

$var = new ean_classe(["numero" => 123135]);

```

#### Uso

```php

$codigo = $var->getEan();

```

### ->getValido()

Retorna uma resposta do tipo "String" de "Sim" ou "Não". A resposta corresponde a validação do Ean se é verdadeiro ou falso. Otimo para se trabalhar condicionais

#### Uso

```php

$var = new ean_classe(["numero" => 123135]);

if($var->valido == "Sim"){
    echo "Codigo gerado com sucesso"
}

```

### ->getImagem()

Retorna o link da imagem do codigo de barras. O retorno é do tipo String.

#### Uso

```php
$img = $var->getImagem(); //http://.../imagens/barcode.php?id=1000000000245&type=ean13


echo "<img src='{$img}'/>"

```

# FORMULÁRIOS 2TY

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

Os modelos de tabela são regindos pela classe ```$tabelaDados```. os dados/css são obtidos apartir de arrays.
A tabela se adequa de acordo com o padrão do arrays.
se for:

```php 
$array = [key => dado] 
```

torna-se uma tabela vertical

------|------
------|-------
key1| dado_1
key2| dado_2 

se for: 

```php 
$array[row] = [key => dado] 
```

key1 | key2 | key3
------|-------|-----
dado_1| dado_2| dados_N     [row_1]
dado_11| dado_12| dado_1N     [row_N]



Exemplo do **array de entrada de dados**:

### Como renderizar tabela:
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
    $dados[] = [
        "Codigo do funcionario" =>"{$funcionario['idFuncionario']}",
        "data de nascimento" =>"{$funcionario['dtNascido']}",
        "endereco" =>"{$funcionario['dsEndereco']}",

    ]
```


``` php
//entradas: 
    # dados : array
    # classes e styles : array
#padrão da classe
class tabelaDados($dados:Array, $styles:Array, names_key:Array, forcevertical:bool, autorender:bool,debug:bool);
$tabela = new tabelaDados($dados,$styles);
$tabela->render();

```

Opcional ```$styles``` é um array contendo styles e classes html/css.

### Customização CSS ou STYLES

Opcional ```$styles``` é um array contendo styles e classes html/css.

``` php

$styles = [
    "width" => "",
    "height" => "",
    "class" => [
        "table" => "",
        "td" => "",
        "th" => "",
        "..." => "",
    ],
    "styles" => [
        "table" => "width: px",
        "td" => "paddgin:",
        "th" => "etc.",
         "..." => "",
    ],
    "td" => [
        "width" => "",
        "height" => "",

    ]


];

```
