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
use CnabPHP\RegistroRemessaAbstract;
use CnabPHP\RemessaAbstract;
use Exception;

class Registro3P extends Generico3
{
	protected $meta = [
		'codigo_banco'=> [
			'tamanho'=>3,
			'default'=>'033',
			'tipo'=>'int',
			'required'=>true
        ],
		'codigo_lote'=> [           // 2.3P
			'tamanho'=>4,
			'default'=>'1',
			'tipo'=>'int',
			'required'=>true
        ],
		'tipo_registro' => [         // 3.3P
			'tamanho'=>1,
			'default'=>'3',
			'tipo'=>'int',
			'required'=>true
        ],
		'numero_registro'=> [       // 4.3P
			'tamanho'=>5,
			'default'=>'1',
			'tipo'=>'int',
			'required'=>true
        ],
		'segmento'=> [            // 5.3P
			'tamanho'=>1,
			'default'=>'P',
			'tipo'=>'alfa',
			'required'=>true
        ],
		'filler1'=> [               // 6.3P
			'tamanho'=>1,
			'default'=>' ',
			'tipo'=>'alfa',
			'required'=>true
        ],
		'codigo_movimento'=> [      // 7.3P
			'tamanho'=>2,
			'default'=>'01', // entrada de titulo
			'tipo'=>'int',
			'required'=>true
        ],

		// - ------------------ até aqui é igual para todo registro tipo 3

		'agencia'=>[               // 8.3P
			'tamanho'=>4,
			'default'=>'',
			'tipo'=>'int',
			'required'=>true
        ],
		'agencia_dv'=> [            // 9.3P
			'tamanho'=>1,
			'default'=>'0',
			'tipo'=>'int',
			'required'=>true
        ],
		'conta'=> [
			'tamanho'=>9,
			'default'=>'',
			'tipo'=>'int',
			'required'=>true
        ],
		'conta_dv'=> [
			'tamanho'=>1,
			'default'=>'',
			'tipo'=>'int',
			'required'=>true
        ],
		'conta_cobranca'=> [
			'tamanho'=>9,
			'default'=>'',
			'tipo'=>'int',
			'required'=>true
        ],
		'conta_cobranca_dv'=>[
			'tamanho'=>1,
			'default'=>'',
			'tipo'=>'int',
			'required'=>true
        ],
        'filler2'=>[
            'tamanho'=>2,
            'default'=>' ',
            'tipo'=>'alfa',
            'required'=>true
        ],
		'nosso_numero'=> [
			'tamanho'=>13,
			'default'=>'',
			'tipo'=>'int',
			'required'=>true
        ],
		'codigo_carteira'=> [
			'tamanho'=>1,
			'default'=>'1', // Cobrança simples (Sem registro e Eletrônica com Registro)
			'tipo'=>'int',
			'required'=>true
        ],
		'forma_cadastramento' => [
			'tamanho'=>1,
			'default'=>'1',  // combrança com registro
			'tipo'=>'int',
			'required'=>true
        ],
		'tipo_documento'=> [
			'tamanho'=>1,
			'default'=>'2',
			'tipo'=>'int',
			'required'=>true
        ],
        'filler3'=> [
            'tamanho'=>1,
            'default'=>' ',
            'tipo'=>'alfa',
            'required'=>true
        ],
        'filler4'=> [
            'tamanho'=>1,
            'default'=>' ',
            'tipo'=>'alfa',
            'required'=>true
        ],
        'seu_numero'=> [
            'tamanho'=>15,
            'default'=>' ',      // este espaço foi colocado para passa a validação para os seters do Generico
            'tipo'=>'alfa',
            'required'=>true
        ],
        'data_vencimento'=> [
            'tamanho'=>8,
            'default'=>'',
            'tipo'=>'date',
            'required'=>true
        ],
        'valor'=> [
            'tamanho'=>13,
            'default'=>'',
            'tipo'=>'decimal',
            'precision'=>2,
            'required'=>true
        ],
        'agencia_cobradora'=> [
            'tamanho'=>4,
            'default'=>'',
            'tipo'=>'int',
            'required'=>true
        ],
        'agencia_cobradora_dv'=> [
            'tamanho'=>1,
            'default'=>'0',
            'tipo'=>'int',
            'required'=>true
        ],
        'filler5'=> [
            'tamanho'=>1,
            'default'=>' ',
            'tipo'=>'alfa',
            'required'=>true
        ],
        'especie_titulo'=> [
            'tamanho'=>2,
            'default'=>'2',
            'tipo'=>'int',
            'required'=>true
        ],
        'aceite'=> [
            'tamanho'=>1,
            'default'=>'N',
            'tipo'=>'alfa',
            'required'=>true
        ],
        'data_emissao'=> [
            'tamanho'=>8,
            'default'=>'',
            'tipo'=>'date',
            'required'=>true
        ],
        'codigo_juros'=> [
            'tamanho'=>1,
            'default'=>'1', // 1 = Valor por dia
            'tipo'=>'int',
            'required'=>true
        ],
        'data_juros'=> [
            'tamanho'=>8,
            'default'=>'0',
            'tipo'=>'date',
            'required'=>true
        ],
        'vlr_juros'=> [
            'tamanho'=>13,
            'default'=>'0',
            'tipo'=>'decimal',
            'precision'=>2,
            'required'=>true
        ],
        'codigo_desconto'=> [
            'tamanho'=>1,
            'default'=>'0',
            'tipo'=>'int',
            'required'=>true
        ],
        'data_desconto'=> [
            'tamanho'=>8,
            'default'=>'0',
            'tipo'=>'date',
            'required'=>true
        ],
        'vlr_desconto'=> [
            'tamanho'=>13,
            'default'=>'0',
            'tipo'=>'decimal',
            'precision'=>2,
            'required'=>true
        ],
        'vlr_IOF'=> [
            'tamanho'=>13,
            'default'=>'0',
            'tipo'=>'decimal',
            'precision'=>2,
            'required'=>true
        ],
        'vlr_abatimento'=> [
            'tamanho'=>13,
            'default'=>'0',
            'tipo'=>'decimal',
            'precision'=>2,
            'required'=>true
        ],
        'seu_numero2'=> [
            'tamanho'=>25,
            'default'=>' ',
            'tipo'=>'alfa',
            'required'=>true
        ],
        'protestar'=> [
            'tamanho'=>1,
            'default'=>'0', // 0 = NÃO PROTESTAR
            'tipo'=>'int',
            'required'=>true
        ],
        'prazo_protesto'=> [
            'tamanho'=>2,
            'default'=>'0',
            'tipo'=>'int',
            'required'=>true
        ],
        'baixar'=> [
            'tamanho'=>1,
            'default'=>'2', // 2 = NAO BAIXAR / NAO DEVOLVER
            'tipo'=>'int',
            'required'=>true
        ],
        'filler6'=> [
            'tamanho'=>1,
            'default'=>'0',
            'tipo'=>'int',
            'required'=>true
        ],
        'prazo_baixar'=> [
            'tamanho'=>2,
            'default'=>'00',
            'tipo'=>'int',
            'required'=>true
        ],
        'codigo_moeda'=> [
            'tamanho'=>2,
            'default'=>'0',
            'tipo'=>'int',
            'required'=>true
        ],
        'filler7'=> [
            'tamanho'=>11,
            'default'=>' ',
            'tipo'=>'alfa',
            'required'=>true
        ],
	];

	public function __construct($data = null)
	{
		if (empty($this->data)) {
		    parent::__construct($data);
        }

		$this->inserirDetalhe($data);
	}

	public function inserirDetalhe($data)
	{
        //TIPO BAIXA SÓ RERTORNA SEGMENTO P
	    if ($data['tipo_remessa'] === '2') {
	        return;
        }

	    //SEGMENTOS OBRIGATÓRIOS (P, Q)
		$class = 'CnabPHP\Resources\\'.RemessaAbstract::$banco.'\Remessa\\'.RemessaAbstract::$leiaute.'\Registro3Q';
		$this->children[] = new $class($data);

		//SEGMENTOS OPCIONAIS (R, S)
		if( isset($data['codigo_desconto2']) || isset($data['codigo_multa']) || isset($data['mensagem'])) {
			$class = 'CnabPHP\Resources\\'.RemessaAbstract::$banco.'\Remessa\\'.RemessaAbstract::$leiaute.'\Registro3R';
			$this->children[] = new $class($data);
		}

		if (!isset($data['tipo_impressao'])) {
		    return;
        }

        if($data['tipo_impressao'] == 1) {
            $class = 'CnabPHP\Resources\\'.RemessaAbstract::$banco.'\Remessa\\'.RemessaAbstract::$leiaute.'\Registro3S1';
            $this->children[] = new $class($data);

        } else if ($data['tipo_impressao'] == 2) {
            $class = 'CnabPHP\Resources\\'.RemessaAbstract::$banco.'\Remessa\\'.RemessaAbstract::$leiaute.'\Registro3S2';
            $this->children[] = new $class($data);
        }
	}

    /**
     * @param $value
     */
    protected function set_nosso_numero($value)
    {
        $dv = $this->modulo11($value);
        $this->data['nosso_numero'] = $value . $dv;
    }

    /**
     * @param $value
     */
    protected function set_codigo_juros($value)
	{
		if ($value == 2) {
			$this->meta['vlr_juros']['precision'] = 5;
            $this->meta['vlr_juros']['tamanho'] = 10;
		}

        $this->data['codigo_juros'] = $value;
	}

    /**
     * @param $num
     * @param int $base
     * @return int
     */
    public function modulo11($num, $base = 9)
    {
        $soma = 0;
        $fator = 2;

        /* Separacao dos numeros */
        for ($i = strlen($num); $i > 0; $i--) {
            // pega cada numero isoladamente
            $numeros[$i] = substr($num, $i - 1, 1);
            // Efetua multiplicacao do numero pelo falor
            $parcial[$i] = $numeros[$i] * $fator;
            // Soma dos digitos
            $soma += $parcial[$i];
            if ($fator == $base) {
                // restaura fator de multiplicacao para 2
                $fator = 2;
            }
            $fator++;
        }

        /* Calculo do modulo 11 */
        $resto = $soma % 11;
        if ($resto == 10) {
            $dv = 1;
        } else if ($resto == 0 || $resto == 1 ) {
            $dv = 0;
        } else {
            $dv = 11 - $resto;
        }

        return $dv;
    }
}

?>
