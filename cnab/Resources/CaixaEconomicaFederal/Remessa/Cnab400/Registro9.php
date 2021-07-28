<?php
namespace CnabPHP\Resources\CaixaEconomicaFederal\Remessa\Cnab400;

use CnabPHP\Resources\Generico\Remessa\Cnab400\Generico9;

class Registro9 extends Generico9
{
    protected $meta = [
        'tipo_registro' => [
            'tamanho' => 1,
            'default' => '9',
            'tipo' => 'int',
            'required' => true
        ],
        'filler1' => [
            'tamanho' => 393,
            'default' => ' ',
            'tipo' => 'alfa',
            'required' => true
        ],
        'numero_registro' => [
            'tamanho' => 6,
            'default' => '0',
            'tipo' => 'int',
            'required' => true
        ],
    ];
}

?>
