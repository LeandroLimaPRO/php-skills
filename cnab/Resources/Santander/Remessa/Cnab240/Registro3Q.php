<?php
/*
 * CnabPHP - Geração de arquivos de remessa e retorno em PHP
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
namespace CnabPHP\Resources\Santander\Remessa\Cnab240;
use CnabPHP\Resources\Generico\Remessa\Cnab240\Generico3;
use Exception;

class Registro3Q extends Generico3
{
	protected $meta = array(
		'codigo_banco'=> [
			'tamanho'=>3,
			'default'=>'033',
			'tipo'=>'int',
			'required'=>true
        ],
		'codigo_lote'=> [
			'tamanho'=>4,
			'default'=>'1',
			'tipo'=>'int',
			'required'=>true
        ],
		'tipo_registro'=> [
			'tamanho'=>1,
			'default'=>'3',
			'tipo'=>'int',
			'required'=>true
        ],
		'numero_registro'=> [
			'tamanho'=>5,
			'default'=>'1',
			'tipo'=>'int',
			'required'=>true
        ],
		'segmento'=> [
			'tamanho'=>1,
			'default'=>'Q',
			'tipo'=>'alfa',
			'required'=>true
        ],
		'filler1'=> [
			'tamanho'=>1,
			'default'=>' ',
			'tipo'=>'alfa',
			'required'=>true
        ],
		'codigo_movimento'=> [
			'tamanho'=>2,
			'default'=>'01', // entrada de titulo
			'tipo'=>'int',
			'required'=>true
        ],

			// - ------------------ até aqui é igual para todo registro tipo 3

		'tipo_inscricao_pagador'=> [
			'tamanho'=>1,
			'default'=>'',
			'tipo'=>'int',
			'required'=>true
        ],
		'numero_inscricao_pagador'=> [
			'tamanho'=>15,
			'default'=>'',
			'tipo'=>'int',
			'required'=>true
        ],
		'nome_pagador'=> [
			'tamanho'=>40,
			'default'=>'',
			'tipo'=>'alfa',
			'required'=>true
        ],
		'endereco_pagador'=> [
			'tamanho'=>40,
			'default'=>'',
			'tipo'=>'alfa',
			'required'=>true
        ],
		'bairro_pagador'=> [
			'tamanho'=>15,
			'default'=>'',
			'tipo'=>'alfa',
			'required'=>true
        ],
		'cep_pagador'=> [
			'tamanho'=>5,
			'default'=>'',
			'tipo'=>'int',
			'required'=>true
        ],
		'sufixo_cep_pagador'=> [
			'tamanho'=>3,
			'default'=>' ',
			'tipo'=>'int',
			'required'=>true
        ],
		'cidade_pagador'=> [
			'tamanho'=>15,
			'default'=>'',
			'tipo'=>'alfa',
			'required'=>true
        ],
		'uf_pagador'=> [
			'tamanho'=>2,
			'default'=>'',
			'tipo'=>'alfa',
			'required'=>true
        ],
		'tipo_incricao_avalista'=> [
			'tamanho'=>1,
			'default'=>'0',
			'tipo'=>'int',
			'required'=>true
        ],
		'numero_incricao_avalista'=> [
			'tamanho'=>15,
			'default'=>'0',
			'tipo'=>'int',
			'required'=>true
        ],
		'nome_avalista'=> [
			'tamanho'=>40,
			'default'=>' ',
			'tipo'=>'alfa',
			'required'=>true
        ],
		'identificador_carne'=> [
			'tamanho'=>3,
			'default'=>'0',
			'tipo'=>'int',
			'required'=>true
        ],
		'sequencial_parcela'=> [
			'tamanho'=>3,
			'default'=>'0',
			'tipo'=>'int',
			'required'=>true
        ],
        'total_parcelas'=> [
            'tamanho'=>3,
            'default'=>'0',
            'tipo'=>'int',
            'required'=>true
        ],
        'numero_plano'=> [
            'tamanho'=>3,
            'default'=>'0',
            'tipo'=>'int',
            'required'=>true
        ],
		'filler2'=> [
			'tamanho'=>19,
			'default'=>' ',
			'tipo'=>'alfa',
			'required'=>true,
        ]
	);
}

?>
