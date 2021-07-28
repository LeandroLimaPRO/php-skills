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
use CnabPHP\Resources\Generico\Remessa\Cnab240\Generico5;
use Exception;

class Registro5 extends Generico5
{
	protected $meta = [
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
			'default'=>'5',
			'tipo'=>'int',
			'required'=>true
        ],
		'filler1'=> [
			'tamanho'=>9,
			'default'=>' ',
			'tipo'=>'alfa',
			'required'=>true
        ],
		'qtd_registros'=> [
			'tamanho'=>6,
			'default'=>' ',
			'tipo'=>'int',
			'required'=>true
        ],
		'filler2'=> [
			'tamanho'=>217,
			'default'=>' ',
			'tipo'=>'alfa',
			'required'=>true
        ],
	];
}
?>
