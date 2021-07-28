<?php

namespace CnabPHP\Resources\CaixaEconomicaFederal\Remessa\Cnab240SIACC;

use CnabPHP\Resources\Generico\Remessa\Cnab240\Generico0;

/**
 * Class Registro0
 * @package CnabPHP\Resources\CaixaEconomicaFederal\Remessa\Cnab240SIACC
 */
class Registro0 extends Generico0
{
    /**
     * @var array
     */
    protected $meta = [
        'codigo_banco' => [
            'tamanho' => 3,
            'default' => '104',
            'tipo' => 'int',
            'required' => true
        ],
        'lote_servico' => [
            'tamanho' => 4,
            'default' => '0000',
            'tipo' => 'int',
            'required' => true
        ],
        'codigo_registro' => [
            'tamanho' => 1,
            'default' => '0',
            'tipo' => 'int',
            'required' => true
        ],
        'filler1' => [
            'tamanho' => 9,
            'default' => ' ',
            'tipo' => 'alfa',
            'required' => true
        ],
        'tipo_inscricao' => [
            'tamanho' => 1,
            'default' => '',
            'tipo' => 'int',
            'required' => true
        ],
        'int_inscricao' => [
            'tamanho' => 14,
            'default' => '',
            'tipo' => 'int',
            'required' => true
        ],
        'codigo_convenio' => [
            'tamanho' => 6,
            'default' => '',
            'tipo' => 'int',
            'required' => true
        ],
        'parametro_transmissao' => [
            'tamanho' => 2,
            'default' => '',
            'tipo' => 'int',
            'required' => true
        ],
        'ambiente_cliente' => [
            'tamanho' => 1,
            'default' => 'P',
            'tipo' => 'alfa',
            'required' => true
        ],
        'ambiente_caixa' => [
            'tamanho' => 1,
            'default' => ' ',
            'tipo' => 'alfa',
            'required' => true
        ],
        'origem_aplicativo' => [
            'tamanho' => 3,
            'default' => ' ',
            'tipo' => 'alfa',
            'required' => true
        ],
        'int_versao' => [
            'tamanho' => 4,
            'default' => '0',
            'tipo' => 'int',
            'required' => true
        ],
        'filler2' => [
            'tamanho' => 3,
            'default' => ' ',
            'tipo' => 'alfa',
            'required' => true
        ],
        'agencia' => [
            'tamanho' => 5,
            'default' => '',
            'tipo' => 'int',
            'required' => true
        ],
        'agencia_dv' => [
            'tamanho' => 1,
            'default' => '',
            'tipo' => 'int',
            'required' => true
        ],
        'conta' => [
            'tamanho' => 12,
            'default' => '',
            'tipo' => 'int',
            'required' => true
        ],
        'conta_dv' => [
            'tamanho' => 1,
            'default' => '',
            'tipo' => 'alfa',
            'required' => true
        ],
        'agencia_conta_dv' => [
            'tamanho' => 1,
            'default' => '',
            'tipo' => 'alfa',
            'required' => true
        ],
        'nome_empresa' => [
            'tamanho' => 30,
            'default' => '',
            'tipo' => 'alfa',
            'required' => true
        ],
        'nome_banco' => [
            'tamanho' => 30,
            'default' => 'CAIXA',
            'tipo' => 'alfa',
            'required' => true
        ],
        'filler3' => [
            'tamanho' => 10,
            'default' => ' ',
            'tipo' => 'alfa',
            'required' => true
        ],
        'codigo_remessa' => [
            'tamanho' => 1,
            'default' => '1',
            'tipo' => 'int',
            'required' => true
        ],
        'data_geracao' => [
            'tamanho' => 8,
            'default' => '',// nao informar a data na criacao da instancia - gerada dinamicamente
            'tipo' => 'int',
            'required' => true
        ],
        'hora_geracao' => [
            'tamanho' => 6,
            'default' => '',// nao informar a data na criacao da instancia - gerada dinamicamente
            'tipo' => 'int',
            'required' => true
        ],
        'NSA' => [
            'tamanho' => 6,
            'default' => '',
            'tipo' => 'int',
            'required' => true
        ],
        'versao_layout' => [
            'tamanho' => 3,
            'default' => '080',
            'tipo' => 'int',
            'required' => true
        ],
        'densidade_gravacao' => [
            'tamanho' => 5,
            'default' => '01600',
            'tipo' => 'int',
            'required' => true
        ],
        'reservado_banco' => [
            'tamanho' => 20,
            'default' => ' ',
            'tipo' => 'alfa',
            'required' => true
        ],
        'reservado_empresa' => [
            'tamanho' => 20,
            'default' => ' ',
            'tipo' => 'alfa',
            'required' => true
        ],
        'uso_febraban' => [
            'tamanho' => 11,
            'default' => ' ',
            'tipo' => 'alfa',
            'required' => true
        ],
        'indet_cobranca' => [
            'tamanho' => 3,
            'default' => ' ',
            'tipo' => 'alfa',
            'required' => true
        ],
        'uso_van' => [
            'tamanho' => 3,
            'default' => ' ',
            'tipo' => 'int',
            'required' => true
        ],
        'tipo_servico' => [
            'tamanho' => 2,
            'default' => ' ',
            'tipo' => 'alfa',
            'required' => true
        ],
        'ocorrencia_sem_papel' => [
            'tamanho' => 10,
            'default' => ' ',
            'tipo' => 'alfa',
            'required' => true
        ],
    ];

    /**
     * Registro0 constructor.
     * @param null $data
     */
    public function __construct($data = null)
    {
        parent::__construct($data);
    }
}