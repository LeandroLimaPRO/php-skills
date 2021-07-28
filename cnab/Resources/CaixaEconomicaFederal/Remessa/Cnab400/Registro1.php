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

use CnabPHP\Resources\Generico\Remessa\Cnab400\Generico1;
use CnabPHP\RemessaAbstract;

class Registro1 extends Generico1
{
    protected $meta = [
        'tipo_registro' => [
            'tamanho' => 1,
            'default' => '1',
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
        'emissao_boleto' => [
            'tamanho' => 1,
            'default' => '2',
            'tipo' => 'int',
            'required' => true
        ],
        'postagem_boleto' => [
            'tamanho' => 1,
            'default' => '0',
            'tipo' => 'int',
            'required' => true
        ],
        'taxa_permanencia' => [
            'tamanho' => 2,
            'default' => '00',
            'tipo' => 'int',
            'required' => true
        ],
        'seu_numero' => [
            'tamanho' => 25,
            'default' => ' ',
            'tipo' => 'alfa',
            'required' => true,
        ],
        'nosso_numero' => [      //Para emissão pelo beneficiário:
            'tamanho' => 17,     //Obedecer o seguinte formato: CCNNNNNNNNNNNNNNN
            'default' => '',     // CC = 14 (Para Nosso Número da Cobrança Registrada)
            'tipo' => 'int',     // CC = 24 (Para Nosso Número da Cobrança Sem Registro)
            'required' => true
        ],
        'filler1' => [
            'tamanho' => 3,
            'default' => ' ',
            'tipo' => 'alfa',
            'required' => true
        ],
        'mensagem_bloqueto' => [
            'tamanho' => 30,
            'default' => ' ',
            'tipo' => 'alfa',
            'required' => true
        ],
        'cod_carteira' => [    //Código da Carteira:
            'tamanho' => 2,    //'01' = Cobrança Registrada
            'default' => '1',  //'02' = Cobrança Sem Registro
            'tipo' => 'int',
            'required' => true
        ],
        'codigo_movimento' => [ // codigo da ocorrencia no manual da caixa
            'tamanho' => 2,
            'default' => '01', // entrada de titulo
            'tipo' => 'int',
            'required' => true
        ],
        'numero_documento' => [
            'tamanho' => 10,
            'default' => ' ',
            'tipo' => 'alfa',
            'required' => true
        ],
        'data_vencimento' => [
            'tamanho' => 6,
            'default' => '',
            'tipo' => 'date',
            'required' => true
        ],
        'valor' => [
            'tamanho' => 11,
            'default' => '',
            'tipo' => 'decimal',
            'precision' => 2,
            'required' => true
        ],
        'codigo_banco' => [
            'tamanho' => 3,
            'default' => '104',
            'tipo' => 'int',
            'required' => true
        ],
        'agencia_cobradora' => [
            'tamanho' => 5,
            'default' => '0',
            'tipo' => 'int',
            'required' => true
        ],
        'especie_titulo' => [
            'tamanho' => 2,
            'default' => '1',
            'tipo' => 'int',
            'required' => true
        ],
        'aceite' => [            //25.3P
            'tamanho' => 1,
            'default' => 'A',
            'tipo' => 'alfa',
            'required' => true
        ],
        'data_emissao' => [            //26.3P
            'tamanho' => 6,
            'default' => '',
            'tipo' => 'date',
            'required' => true
        ],
        'cod_instrucao1' => [    // Código para Protesto / Devolução
            'tamanho' => 2,      // 01 = Protestar Dias Corridos
            'default' => '2',    // 02 = Devolver (Não Protestar)
            'tipo' => 'int',
            'required' => true
        ],
        'cod_instrucao2' => [
            'tamanho' => 2,
            'default' => '0',
            'tipo' => 'int',
            'required' => true
        ],
        'vlr_juros_mora' => [  //Juros de Mora por dia (Valor)
            'tamanho' => 11,
            'default' => '0',
            'tipo' => 'decimal',
            'precision' => 2,
            'required' => true
        ],
        'data_desconto' => [
            'tamanho' => 6,
            'default' => '0',
            'tipo' => 'date',
            'required' => true
        ],
        'vlr_desconto' => [            //32.3P
            'tamanho' => 11,
            'default' => '0',
            'tipo' => 'decimal',
            'precision' => 2,
            'required' => true
        ],
        'vlr_IOF' => [
            'tamanho' => 11,
            'default' => '0',
            'tipo' => 'decimal',
            'precision' => 2,
            'required' => true
        ],
        'vlr_abatimento' => [
            'tamanho' => 11,
            'default' => '0',
            'tipo' => 'decimal',
            'precision' => 2,
            'required' => true
        ],
        'tipo_inscricao' => [   // Tipo de inscrição da Pessoa ou Empresa
            'tamanho' => 2,     // 01 = CPF
            'default' => '',    // 02 = CNPJ
            'tipo' => 'int',
            'required' => true
        ],
        'numero_inscricao' => [
            'tamanho' => 14,
            'default' => '',
            'tipo' => 'int',
            'required' => true
        ],
        'nome_pagador' => [
            'tamanho' => 40,
            'default' => '',
            'tipo' => 'alfa',
            'required' => true
        ],
        'endereco_pagador' => [
            'tamanho' => 40,
            'default' => '',
            'tipo' => 'alfa',
            'required' => true
        ],
        'bairro_pagador' => [
            'tamanho' => 12,
            'default' => '',
            'tipo' => 'alfa',
            'required' => true
        ],
        'cep_pagador' => [
            'tamanho' => 8,
            'default' => '',
            'tipo' => 'int',
            'required' => true
        ],
        'cidade_pagador' => [
            'tamanho' => 15,
            'default' => '',
            'tipo' => 'alfa',
            'required' => true
        ],
        'uf_pagador' => [
            'tamanho' => 2,
            'default' => '',
            'tipo' => 'alfa',
            'required' => true
        ],
        'data_multa' => [
            'tamanho' => 6,
            'default' => '0',
            'tipo' => 'date',
            'required' => true
        ],
        'vlr_multa' => [
            'tamanho' => 8,
            'default' => '0',
            'tipo' => 'decimal',
            'precision' => 2,
            'required' => true
        ],
        'nome_avalista_mensagem' => [
            'tamanho' => 22,
            'default' => ' ',
            'tipo' => 'alfa',
            'required' => true
        ],
        'cod_instrucao3' => [  // Mensagem
            'tamanho' => 2,    // 00 = Não imprime mensagem no verso do bloqueto
            'default' => '0',  // 01 = Utiliza o Registro tipo 2 para envio das mensagens
            'tipo' => 'int',   // 02 = Imprime mensagem no verso do bloqueto
            'required' => true
        ],
        'prazo_protesto' => [
            'tamanho' => 2,
            'default' => '99',
            'tipo' => 'int',
            'required' => true
        ],
        'codigo_moeda' => [
            'tamanho' => 1,
            'default' => '1',
            'tipo' => 'int',
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

    protected function set_agencia_cobradora($value)
    {
        $this->data['agencia_cobradora'] = $value;
    }
    
    protected function set_cod_carteira($value)
    {
        $this->data['cod_carteira'] = $value;
        $this->gerar_nosso_numero($this->data['nosso_numero'], $this->data['emissao_boleto'], $value);
    }
}

?>
