<?php
/*
 * CnabPHP - Geração de arquivos de Remessa e retorno em PHP
 *
 * LICENSE: The MIT License (MIT)
 *
 * Copyright (C) 2013 Ciatec.net
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy of this
 * software and associated documentation files (the "Software"), to deal in the Software
 * without restriction, including without limitation the rights to use, copy, modify,
 * merge, publish, distribute, sublicense, and/or sell copies of the Software, and to
 * permit persons to whom the Software is furnished to do so, subject to the following
 * conditions:
 *
 * The above copyright notice and this permission notice shall be included in all copies
 * or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED,
 * INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A
 * PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT
 * HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION
 * OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE
 * SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 */
namespace CnabPHP\Resources\CaixaEconomicaFederal\Remessa\Cnab400;

use CnabPHP\Resources\Generico\Remessa\Cnab400\Generico2;

class Registro2 extends Generico2
{
    protected $meta = [
        'tipo_registro' => [
            'tamanho' => 1,
            'default' => '2',
            'tipo' => 'int',
            'required' => true
        ],
        'tipo_inscricao_empresa' => [
            'tamanho' => 2,
            'default' => '',
            'tipo' => 'int',
            'required' => true
        ],
        'numero_inscricao_empresa' => [
            'tamanho' => 14,
            'default' => '',
            'tipo' => 'int',
            'required' => true
        ],
        'agencia' => [
            'tamanho' => 4,
            'default' => '',
            'tipo' => 'int',
            'required' => true
        ],
        'codigo_beneficiario' => [
            'tamanho' => 6,
            'default' => '',
            'tipo' => 'int',
            'required' => true
        ],
        'filler0' => [
            'tamanho' => 4,
            'default' => ' ',
            'tipo' => 'alfa',
            'required' => true
        ],
        'filler1' => [
            'tamanho' => 25,
            'default' => ' ',
            'tipo' => 'alfa',
            'required' => true
        ],
        'nosso_numero' => [
            'tamanho' => 17,
            'default' => '',
            'tipo' => 'int',
            'required' => true
        ],
        'filler2' => [
            'tamanho' => 33,
            'default' => ' ',
            'tipo' => 'alfa',
            'required' => true
        ],
        'cod_carteira' => [
            'tamanho' => 2,
            'default' => '1',
            'tipo' => 'int',
            'required' => true
        ],
        'codigo_movimento' => [ // codigo da ocorrencia no manual da caixa
            'tamanho' => 2,
            'default' => '01', // entrada de titulo
            'tipo' => 'int',
            'required' => true
        ],
        'filler3' => [
            'tamanho' => 29,
            'default' => ' ',
            'tipo' => 'alfa',
            'required' => true
        ],
        'codigo_banco' => [
            'tamanho' => 3,
            'default' => '104',
            'tipo' => 'int',
            'required' => true
        ],
        'mensagem1' => [
            'tamanho' => 40,
            'default' => ' ',
            'tipo' => 'alfa',
            'required' => true
        ],
        'mensagem2' => [
            'tamanho' => 40,
            'default' => ' ',
            'tipo' => 'alfa',
            'required' => true
        ],
        'mensagem3' => [
            'tamanho' => 40,
            'default' => ' ',
            'tipo' => 'alfa',
            'required' => true
        ],
        'mensagem4' => [
            'tamanho' => 40,
            'default' => ' ',
            'tipo' => 'alfa',
            'required' => true
        ],
        'mensagem5' => [
            'tamanho' => 40,
            'default' => ' ',
            'tipo' => 'alfa',
            'required' => true
        ],
        'mensagem6' => [
            'tamanho' => 40,
            'default' => ' ',
            'tipo' => 'alfa',
            'required' => true
        ],
        'filler4' => [
            'tamanho' => 12,
            'default' => ' ',
            'tipo' => 'alfa',
            'required' => true
        ],
        'numero_registro' => [
            'tamanho' => 6,
            'default' => '0',
            'tipo' => 'int',
            'required' => true
        ]
    ];

    protected function gerar_nosso_numero($nosso_numero, $emissao_boleto, $cod_carteira)
    {
        $id_emissao_banco = '1';
        $id_emissao_beneficiario = '2';

        $carteira_com_registro = '01';
        $carteira_sem_registro = '02';

        $modalidades = [
            $id_emissao_banco => [
                $carteira_com_registro => '11',
                $carteira_sem_registro => '21'
            ],
            $id_emissao_beneficiario => [
                $carteira_com_registro => '14',
                $carteira_sem_registro => '24'
            ]
        ];

        $nosso_numero = str_pad($nosso_numero, 15, '0', STR_PAD_LEFT);

        $this->data['nosso_numero'] = $modalidades[$emissao_boleto][$cod_carteira] . $nosso_numero;
    }
    
    protected function set_cod_carteira($value)
    {
        $this->data['cod_carteira'] = $value;
        $this->gerar_nosso_numero($this->data['nosso_numero'], $this->data['emissao_boleto'], $value);
    }
}
