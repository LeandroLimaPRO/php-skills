<?php

namespace cnab\Remessa;
use Exception;
class Especie
{
    private $res = array();
    private $itau = array();
    private $caixa = array();
    private $bb = array();
    private $sicoob = array();
    private $santander = array();
    private $banco;
    
    public function __construct($banco = null){
        
        $this->caixa[1] = array('abr'=>"CH",'txt'=>'Cheque');
        $this->caixa[2] = array('abr'=>"DM",'txt'=>'Duplicata Mercantil');
        $this->caixa[3] = array('abr'=>"DMI",'txt'=>'Mercantil p/ Indicação');
        $this->caixa[4] = array('abr'=>"DS",'txt'=>'Duplicata de Serviço');  
        $this->caixa[5] = array('abr'=>"DSI",'txt'=>'Duplicata de Serviço p/ indicação');
        $this->caixa[6] = array('abr'=>"DR",'txt'=>'Duplicata Rural'); 
        $this->caixa[7] = array('abr'=>"LC",'txt'=>'Letra de Câmbio'); 
        $this->caixa[8] = array('abr'=>"NCC",'txt'=>'Nota de Crédito Comercial');
        $this->caixa[9] = array('abr'=>"NCE",'txt'=>'Nota de Crédito a Exportação');
        $this->caixa[10] = array('abr'=>"NCI",'txt'=>'Nota de Crédito a Exportação');
        $this->caixa[11] = array('abr'=>"NCR",'txt'=>'Nota de Crédito Rural');
        $this->caixa[12] = array('abr'=>"NP",'txt'=>'Nota Promissória');
        $this->caixa[13] = array('abr'=>"NPR",'txt'=>'Nota Promissória Rural');
        $this->caixa[14] = array('abr'=>"TM",'txt'=>'Triplicata Mercantil');
        $this->caixa[15] = array('abr'=>"TS",'txt'=>'Triplicata de Serviço');
        $this->caixa[16] = array('abr'=>"NS",'txt'=>'Nota de Seguro');
        $this->caixa[17] = array('abr'=>"RC",'txt'=>'Recibo');
        $this->caixa[18] = array('abr'=>"FAT",'txt'=>'Fatura');
        $this->caixa[19] = array('abr'=>"ND",'txt'=>'Nota de Débito');
        
        $this->bb[1] = array('abr'=>"CH",'txt'=>'Cheque');
        $this->bb[2] = array('abr'=>"DM",'txt'=>'Duplicata Mercantil');
        $this->bb[3] = array('abr'=>"DMI",'txt'=>'Mercantil p/ indicação');
        $this->bb[4] = array('abr'=>"DS",'txt'=>'Duplicata de Serviço');  
        $this->bb[5] = array('abr'=>"DSI",'txt'=>'Duplicata de Serviço p/ indicação');
        $this->bb[6] = array('abr'=>"DR",'txt'=>'Duplicata Rural'); 
        $this->bb[7] = array('abr'=>"LC",'txt'=>'Letra de Câmbio');
        $this->bb[8] = array('abr'=>"NCC",'txt'=>'Nota de Crédito Comercial');
        $this->bb[9] = array('abr'=>"NCE",'txt'=>'Nota de Crédito a Exportação');
        $this->bb[10] = array('abr'=>"NCI",'txt'=>'Nota de Crédito a Exportação');
        $this->bb[11] = array('abr'=>"NCR",'txt'=>'Nota de Crédito Rural');
        $this->bb[12] = array('abr'=>"NP",'txt'=>'Nota Promissória');
        $this->bb[13] = array('abr'=>"NPR",'txt'=>'Nota Promissória Rural');
        $this->bb[14] = array('abr'=>"TM",'txt'=>'Triplicata Mercantil');
        $this->bb[15] = array('abr'=>"TS",'txt'=>'Triplicata de Serviço');
        $this->bb[16] = array('abr'=>"NS",'txt'=>'Nota de Seguro');
        $this->bb[17] = array('abr'=>"RC",'txt'=>'Recibo');
        $this->bb[18] = array('abr'=>"FAT",'txt'=>'Fatura');
        $this->bb[19] = array('abr'=>"ND",'txt'=>'Nota de Débito');
        
        $this->itau[1] = array('abr'=>"DM",'txt'=>'Duplicata Mercantil');
        $this->itau[2] = array('abr'=>"NP",'txt'=>'Nota Promissória');
        $this->itau[3] = array('abr'=>"NS",'txt'=>'Nota de Seguro');
        $this->itau[4] = array('abr'=>"ME",'txt'=>'Mensalidade escolar');
        $this->itau[5] = array('abr'=>"RC",'txt'=>'Recibo');
        $this->itau[6] = array('abr'=>"CT",'txt'=>'Contrato');
        $this->itau[7] = array('abr'=>"CS",'txt'=>'Cosseguros');
        $this->itau[8] = array('abr'=>"DS",'txt'=>'Duplicata de Serviço'); 
        $this->itau[9] = array('abr'=>"LC",'txt'=>'Letra de Câmbio');
        $this->itau[13] = array('abr'=>"ND",'txt'=>'Nota de Débito');
        $this->itau[15] = array('abr'=>"DV",'txt'=>'Documento de divida');
        $this->itau[16] = array('abr'=>"EC",'txt'=>'Encargos condominiais');
        $this->itau[17] = array('abr'=>"CPS",'txt'=>'Conta de prestação de Serviço');
        $this->itau[18] = array('abr'=>"DBP",'txt'=>'Boleto de Proposta');
        $this->itau[99] = array('abr'=>"DIV",'txt'=>'Diversos');

        $this->sicoob[1] = array('abr'=>"DM",'txt'=>'Duplicata Mercantil');
        $this->sicoob[2] = array('abr'=>"NP",'txt'=>'Nota Promissória');
        $this->sicoob[3] = array('abr'=>"NS",'txt'=>'Nota de Seguro');
        $this->sicoob[5] = array('abr'=>"RC",'txt'=>'Recibo');
        $this->sicoob[6] = array('abr'=>"DR",'txt'=>'Duplicata Rural');
        $this->sicoob[8] = array('abr'=>"LC",'txt'=>'Letra de Câmbio');
        $this->sicoob[9] = array('abr'=>"WRT",'txt'=>'Warrant');
        $this->sicoob[10] = array('abr'=>"CH",'txt'=>'Cheque'); 
        $this->sicoob[12] = array('abr'=>"DS",'txt'=>'Duplicata de Serviço'); 
        $this->sicoob[13] = array('abr'=>"ND",'txt'=>'Nota de Débito');  
        $this->sicoob[14] = array('abr'=>"TM",'txt'=>'Triplicata Mercantil');
        $this->sicoob[15] = array('abr'=>"TS",'txt'=>'Triplicata de Serviço');
        $this->sicoob[18] = array('abr'=>"FAT",'txt'=>'Fatura');
        $this->sicoob[20] = array('abr'=>"AP",'txt'=>'ApÃ³lice de Seguros');
        $this->sicoob[21] = array('abr'=>"ME",'txt'=>'Mensalidade escolar');
        $this->sicoob[22] = array('abr'=>"ME",'txt'=>'Parcela de Consórcio');
        $this->sicoob[99] = array('abr'=>"DIV",'txt'=>'Outros');

        $this->santander[2] = array('abr'=>"DM",'txt'=>'Duplicata Mercantil');
        $this->santander[4] = array('abr'=>"DS",'txt'=>'Duplicata de Serviço');
        $this->santander[7] = array('abr'=>"LC",'txt'=>'Letra de Câmbio');
        $this->santander[12] = array('abr'=>"NP",'txt'=>'Nota Promissória');
        $this->santander[13] = array('abr'=>"NPR",'txt'=>'Nota Promissória Rural');
        $this->santander[17] = array('abr'=>"RC",'txt'=>'Recibo');
        $this->santander[20] = array('abr'=>"AP",'txt'=>'Apólice de Seguro');
        $this->santander[30] = array('abr'=>"LC",'txt'=>'Letra de Câmbio');
        $this->santander[32] = array('abr'=>"BDP",'txt'=>'Boleto de Proposta');
        $this->santander[97] = array('abr'=>"CH",'txt'=>'Cheque');
        $this->santander[98] = array('abr'=>"NP",'txt'=>'Nota Promissória Direta');

        $this->res['104'] = $this->caixa;
        $this->res['341'] = $this->itau;
        $this->res['001'] = $this->bb;
        $this->res['756'] = $this->sicoob;
        $this->res['033'] = $this->santander;
        
        $this->banco = $this->res[$banco];        
    } 
    public function getAbr($especie){
         return $this->banco[$especie]['abr'];
    }
    public function getBanco(){
          return $this->banco;
    }
    public function getCodigo($abr){
        foreach($this->banco as $key => $especie){
            if($especie['abr']==$abr){
                return $key;
                //break;
            }
        }
    }
    
}
/**
 * Class RemessaAbstract
 * @package cnab
 */
abstract class RemessaAbstract
{
    /**
     * @var array
     */
    public static $BANCOS = [
        '104' => 'CaixaEconomicaFederal',
        '237' => 'Bradesco',
        '341' => 'Itau',
        '756' => 'Sicoob',
        '033' => 'Santander'
    ];
    /**
     * @var string
     */
    public static $banco;
    /**
     * @var string
     */
    public static $leiaute;
    /**
     * @var string
     */
    public static $cabecalho;
    /**
     * @var string
     */
    public static $dados;
    /**
     * @var int
     */
    public static $loteContador = 0; // contador de lotes
    /**
     * @var array
     */
    private static $filhos = []; // armazena os registros filhos da classe remessa
    /**
     * @var array
     */
    public static $retorno = []; // durante a geração do txt de retorno se tornara um array com as linhas do arquvio

    /**
     * RemessaAbstract constructor.
     * @param string $banco
     * @param string $leiaute
     * @param array $dados
     */
    public function __construct($banco, $leiaute, $dados)
    {
        self::$banco = self::$BANCOS[$banco];
        self::$leiaute = $leiaute;
        self::$dados = $dados;

        $class = $this->register(self::$banco, self::$leiaute, 0);
        self::$cabecalho = new $class($dados);
        self::$filhos[] = self::$cabecalho;
    }

    /**
     * @param $banco
     * @param $leiaute
     * @param $registro
     * @return string
     */
    protected function register($banco, $leiaute, $registro)
    {
        return "\\cnab\\Remessa\\Registro{$registro}";
    }

    /**
     * @param $data
     */
    public function adicionarDetalhe($data)
    {
        //$class = '\CnabPHP\Resources\\' . self::$banco . '\remessa\\' . self::$layout . '\Registro1';
        $class = $this->register(self::$banco, self::$leiaute, 1);
        
        self::adicionarFilho(new $class($data));
        echo "Detalhe adicionado";
        //self::$counter++;
    }

    /**
     * @param $data
     */
    public function adicionarDetalheMensagem($data)
    {
        //$class = '\CnabPHP\Resources\\' . self::$banco . '\remessa\\' . self::$layout . '\Registro1';
        $class = $this->register(self::$banco, self::$leiaute, 2);

        self::adicionarFilho(new $class($data));
    }

    /**
     * @param $leiaute
     */
    public function trocarLeiaute($leiaute)
    {
        self::$leiaute = $leiaute;
    }

    /**
     * @param RegistroRemessaAbstract $child
     */
    static private function adicionarFilho(RegistroRemessaAbstract $child)
    {
        self::$filhos[] = $child;
    }

    /**
     * @param array $data
     * @return RemessaAbstract
     */
    public function adicionarLote(array $data)
    {
        self::$loteContador++;

        if (strpos(self::$leiaute, '240')) {
            //$class = '\CnabPHP\Resources\\' . self::$banco . '\remessa\\' . self::$layout . '\Registro1';
            $class = $this->register(self::$banco, self::$leiaute, 1);
            $loteData = $data ? $data : RemessaAbstract::$dados;
            $lote = new $class($loteData);
            self::adicionarFilho($lote);
            echo "Lote adicionado";
        } else {

            $lote = $this;
        }

        return $lote;
    }

    /**
     * @param $index
     * @return mixed
     */
    public static function getLote($index)
    {
        if (isset(self::$filhos[$index])) {
            return self::$filhos[$index];
        } else if (isset(self::$filhos[$index - 1])) {
            return self::$filhos[$index - 1];
        }
        return null;
    }

    /**
     * @return string
     */
    public function getArquivo()
    {
        foreach (self::$filhos as $child) {
            $child->getArquivo();
        }
        //$class = '\CnabPHP\Resources\\' . self::$banco . '\remessa\\' . self::$layout . '\Registro9';
        $class = $this->register(self::$banco, self::$leiaute, 9);
        /** @var RegistroRemessaAbstract $header */
        $header = new $class(['1' => 1]);
        $header->getArquivo();
        return implode("\r\n", self::$retorno) . "\r\n";
    }
}

/**
 * Class RegistroRemessaAbstract
 * @package cnab
 */
abstract class RegistroRemessaAbstract
{
    /**
     * @var array
     */
    protected $data;
    /**
     * @var mixed
     */
    protected $meta;
    /**
     * @var mixed
     */
    protected $children;

    /**
     * RegistroRemessaAbstract constructor.
     * @param null $data
     */
    public function __construct($data = NULL)
    {
        if ($data) {
            foreach ($this->meta as $key => $value) {
                /** @noinspection PhpVariableVariableInspection */
                $this->$key = (isset($data[$key])) ? $data[$key] : $this->meta[$key]['default'];
            }
        }
    }


    /**
     * @param $key
     * @param $value
     */
    public function __set($key, $value)
    {
        if (method_exists($this, 'set_' . $key)) {
            call_user_func([$this, 'set_' . $key], $value);
        } else {
            $metaData = (isset($this->meta[$key])) ? $this->meta[$key] : null;
            if (($value == "" || $value === NULL) && isset($metaData[$key]) && $metaData[$key]['default'] != "") {
                $this->data[$key] = $metaData[$key]['default'];
            } else {
                $this->data[$key] = $value;
            }
        }
    }

    /**
     * @param $prop
     * @return mixed|null|string
     */
    public function __get($prop)
    {
        if (method_exists($this, 'get_' . $prop)) {
            return call_user_func([$this, 'get_' . $prop]);
        } else {
            return $this->___get($prop);
        }
    }

    /**
     * @param $prop
     * @return null|string
     * @throws Exception
     */
    public function ___get($prop)
    {
        // retorna o valor da propriedade
        if (isset($this->meta[$prop])) {
            $metaData = (isset($this->meta[$prop])) ? $this->meta[$prop] : null;
            $this->data[$prop] = !isset($this->data[$prop]) || $this->data[$prop] == '' ? $metaData['default'] : $this->data[$prop];
            if ($metaData['required']==true && (!isset($this->data[$prop]) || $this->data[$prop] == '')) {
                echo 'Campo faltante ou com valor nulo: ' . $prop;
            }
            switch ($metaData['tipo']) {
                case 'decimal':
                    $retorno = ($this->data[$prop]) ? number_format($this->data[$prop], $metaData['precision'], '', '') : '';
                    return str_pad($retorno, $metaData['tamanho'] + $metaData['precision'], '0', STR_PAD_LEFT);
                    break;
                case 'int':
                    $retorno = (isset($this->data[$prop])) ? abs($this->data[$prop]) : '';
                    return str_pad($retorno, $metaData['tamanho'], '0', STR_PAD_LEFT);
                    break;
                case 'alfa':
                    $retorno = ($this->data[$prop] || $this->data[$prop] === '0' || $this->data[$prop] === 0) ? $this->prepareText($this->data[$prop]) : '';
                    return str_pad(mb_substr($retorno, 0, $metaData['tamanho'], "UTF-8"), $metaData['tamanho'], ' ', STR_PAD_RIGHT);
                    break;
                case 'alfa2':
                    $retorno = ($this->data[$prop]) ? $this->data[$prop] : '';
                    return str_pad(mb_substr($retorno, 0, $metaData['tamanho'], "UTF-8"), $metaData['tamanho'], ' ', STR_PAD_RIGHT);
                    break;
                case $metaData['tipo'] == 'date' && $metaData['tamanho'] == 6:
                    $retorno = ($this->data[$prop]) ? date("dmy", strtotime($this->data[$prop])) : '';
                    return str_pad($retorno, $metaData['tamanho'], '0', STR_PAD_LEFT);
                    break;
                case $metaData['tipo'] == 'date' && $metaData['tamanho'] == 8:
                    $retorno = ($this->data[$prop]) ? date("dmY", strtotime($this->data[$prop])) : '';
                    return str_pad($retorno, $metaData['tamanho'], '0', STR_PAD_LEFT);
                    break;
                default:
                    return null;
                    break;
            }
        }
    }

    /**
     * @param $prop
     * @return mixed
     */
    public function getUnformated($prop)
    {
        if (isset($this->data[$prop])) {
            return $this->data[$prop];
        }
        return null;
    }

    /**
     * @param $text
     * @param null $remove
     * @return mixed|string
     */
    private function prepareText($text, $remove = null)
    {
        $result = strtoupper($this->removeAccents(trim(html_entity_decode($text))));
        if ($remove)
            $result = str_replace(str_split($remove), '', $result);
        return $result;
    }

    /**
     * @param $string
     * @return mixed
     */
    private function removeAccents($string)
    {
        return preg_replace(
            [
                '/\xc3[\x80-\x85]/', '/\xc3\x87/', '/\xc3[\x88-\x8b]/', '/\xc3[\x8c-\x8f]/', '/\xc3([\x92-\x96]|\x98)/',
                '/\xc3[\x99-\x9c]/', '/\xc3[\xa0-\xa5]/', '/\xc3\xa7/', '/\xc3[\xa8-\xab]/', '/\xc3[\xac-\xaf]/',
                '/\xc3([\xb2-\xb6]|\xb8)/', '/\xc3[\xb9-\xbc]/',
            ],
            str_split('ACEIOUaceiou', 1),
            $this->isUtf8($string) ? $string : utf8_encode($string)
        );
    }

    /**
     * @param $string
     * @return bool
     */
    private function isUtf8($string)
    {
        return (bool)preg_match('%^(?:
            [\x09\x0A\x0D\x20-\x7E]
            | [\xC2-\xDF][\x80-\xBF]
            | \xE0[\xA0-\xBF][\x80-\xBF]
            | [\xE1-\xEC\xEE\xEF][\x80-\xBF]{2}
            | \xED[\x80-\x9F][\x80-\xBF]
            | \xF0[\x90-\xBF][\x80-\xBF]{2}
            | [\xF1-\xF3][\x80-\xBF]{3}
            | \xF4[\x80-\x8F][\x80-\xBF]{2}
            )*$%xs',
            $string
        );
    }

    /**
     *
     */
    public function getArquivo()
    {
        $retorno = '';
        foreach ($this->meta as $key => $value) {
            /** @noinspection PhpVariableVariableInspection */
            //print "{$key} :  {$this->$key} <br>";
            $retorno .= $this->$key;
        }

        RemessaAbstract::$retorno[] = $retorno;
        if ($this->children) {
            foreach ($this->children as $child) {
                $child->getArquivo();
            }
        }
    }
}


/**
 * Class Remessa
 * @package cnab
 */
class Remessa extends RemessaAbstract
{
    /**
     * Remessa constructor.
     * @param $banco
     * @param $leiaute
     * @param $dados
     */
    public function __construct($banco, $leiaute, $dados)
    {
        parent::__construct($banco, $leiaute, $dados);
    }
}


class Generico0 extends RegistroRemessaAbstract
{
    protected $counter;

    protected function set_situacao_arquivo($value)
    {
        $this->data['situacao_arquivo'] = ($value == 'T') ? "REMESSA-TESTE" : "REMESSA-PRODUCAO";
    }

    protected function set_data_geracao($value)
    {
        $this->data['data_geracao'] = date('Y-m-d');
    }

    protected function set_hora_geracao($value)
    {
        $this->data['hora_geracao'] = date('His');
    }

    protected function set_tipo_inscricao($value)
    {
        if ($value == 1 || $value == 2) {
            $this->data['tipo_inscricao'] = $value;
        } else {
            echo "O tipo de incrição deve ser 1  para CPF e 2 para CNPJ, o valor informado foi:" . $value;
        }
    }

    protected function set_numero_inscricao($value)
    {
        $this->data['numero_inscricao'] = str_ireplace(array('.', '/', '-'), array(''), $value);
    }
    
    protected function set_numero_inscricao_empresa($value)
    {
        $this->data['numero_inscricao_empresa'] = str_ireplace(array('.', '/', '-'), array(''), $value);
    }
    public function get_numero_registro()
    {
        return null;
    }

}

class Generico1 extends RegistroRemessaAbstract
{
    protected $counter = 0;

    protected function set_codigo_lote($value)
    {
        $this->data['codigo_lote'] = RemessaAbstract::$loteContador;
    }

    public function set_tipo_servico($value)
    {
        if ($value == 'S') {
            $this->data['tipo_servico'] = 1;
        } elseif ($value == 'N') {
            $this->data['tipo_servico'] = 2;
        } elseif ((int)$value <= 2) {
            $this->data['tipo_servico'] = $value;
        } else {
            echo "O tipo de servico deve ser 1 ou S para Registrada ou 2 ou N para Sem Registro, o valor informado foi:" . $value;
        }
    }

    protected function set_tipo_inscricao($value)
    {
        $value = $value ? $value : RemessaAbstract::$dados['tipo_inscricao'];
        if ($value == 1 || $value == 2) {
            $this->data['tipo_inscricao'] = $value;
        } else {
            echo "O tipo de incri��o deve ser 1  para CPF e 2 para CNPJ, o valor informado foi:" . $value;
        }
    }

    protected function set_numero_inscricao($value)
    {
        $this->data['numero_inscricao'] = $value == '' ? str_ireplace(array('.', '/', '-'), array(''), RemessaAbstract::$dados['numero_inscricao']) : str_ireplace(array('.', '/', '-'), array(''), $value);
    }

    protected function set_numero_inscricao_empresa($value)
    {
        $this->data['numero_inscricao_empresa'] = str_ireplace(array('.', '/', '-'), array(''), $value);
    }

    protected function set_codigo_beneficiario($value)
    {
        $this->data['codigo_beneficiario'] = $value == '' ? RemessaAbstract::$dados['codigo_beneficiario'] : $value;
    }

    protected function set_agencia($value)
    {
        $this->data['agencia'] = $value == '' ? RemessaAbstract::$dados['agencia'] : $value;
    }

    protected function set_agencia_dv($value)
    {
        $this->data['agencia_dv'] = $value == '' ? RemessaAbstract::$dados['agencia_dv'] : $value;
    }

    protected function set_codigo_convenio($value)
    {
        $this->data['codigo_convenio'] = RemessaAbstract::$dados['codigo_beneficiario'];
    }

    protected function set_nome_empresa($value)
    {
        $this->data['nome_empresa'] = $value == '' ? RemessaAbstract::$dados['nome_empresa'] : $value;
    }

    protected function set_numero_remessa($value)
    {
        $this->data['numero_remessa'] = $value == '' ? RemessaAbstract::$dados['numero_sequencial_arquivo'] : $value;
    }

    protected function set_data_gravacao($value)
    {
        $this->data['data_gravacao'] = date('Y-m-d');
    }

    public function get_counter()
    {
        $this->counter++;
        return $this->counter;
    }

    /**
     * @param $data
     */
    public function adicionarDetalhe($data)
    {
        $class = 'cnab\\Remessa\\Registro3P';
        $this->children[] = new $class($data);
    }

    public function getArquivo()
    {
        $retorno = '';
        $dataReg5 = array();
        $dataReg5['qtd_titulos_simples'] = '0';
        $dataReg5['qtd_titulos_caucionada'] = '0';
        $dataReg5['qtd_titulos_descontada'] = '0';
        $dataReg5['vrl_titulos_simples'] = '0.00';
        $dataReg5['vlr_titulos_caucionada'] = '0.00';
        $dataReg5['vlr_titulos_descontada'] = '0.00';

        foreach ($this->meta as $key => $value) {
            $retorno .= $this->$key;
        }
        RemessaAbstract::$retorno[] = $retorno;
        if ($this->children) {
            // percorre todos objetos filhos
            foreach ($this->children as $child) {
                if ($child->codigo_carteira == 1) {
                    $dataReg5['qtd_titulos_simples']++;
                    $dataReg5['vrl_titulos_simples'] += $child->getUnformated('valor');
                }
                if ($child->codigo_carteira == 3) {
                    $dataReg5['qtd_titulos_caucionada']++;
                    $dataReg5['vlr_titulos_caucionada'] += $child->getUnformated('valor');

                }
                if ($child->codigo_carteira == 4) {
                    $dataReg5['qtd_titulos_descontada']++;
                    $dataReg5['vlr_titulos_descontada'] += $child->getUnformated('valor');
                }
                $child->getArquivo();
            }
            $class = '\\cnab\\Remessa\\Registro5';
            $registro5 = new $class($dataReg5);
            $registro5->getArquivo();
        }
    }
}

class Generico3 extends RegistroRemessaAbstract
{
	protected function set_codigo_lote($value)
	{
		//ArquivoAbstract::$loteCounter++;
		$this->data['codigo_lote'] = RemessaAbstract::$loteContador;
	}
	protected function set_numero_registro($value)
	{
		$lote  = RemessaAbstract::getLote(RemessaAbstract::$loteContador);
		$this->data['numero_registro'] = $lote->get_counter();
	}
	protected function set_tipo_inscricao($value)
	{
		$this->data['tipo_inscricao'] = $value;
	}
	protected function set_numero_inscricao($value)
	{
		$this->data['numero_inscricao'] = str_ireplace(array('.','/','-'),array(''),$value);
	}
    protected function set_numero_inscricao_pagador($value)
    {
        $this->data['numero_inscricao_pagador'] = str_ireplace(array('.','/','-'),array(''),$value);
    }
	protected function set_codigo_beneficiario($value)
	{
		$this->data['codigo_beneficiario'] = RemessaAbstract::$dados['codigo_beneficiario'];
	}
	protected function set_agencia($value)
	{
		$this->data['agencia'] = $value == '' ? RemessaAbstract::$dados['agencia'] : $value;
	}
	protected function set_agencia_dv($value)
	{
	    $default = isset(RemessaAbstract::$dados['agencia_dv']) ? RemessaAbstract::$dados['agencia_dv'] : '';
		$this->data['agencia_dv'] = $value == '' ? $default : $value;
	}
	protected function set_codigo_convenio($value)
	{
		$this->data['codigo_convenio'] = $value == '' ? RemessaAbstract::$dados['codigo_convenio'] : $value;
	}
	protected function set_com_registro($value)
	{
		$lote  = RemessaAbstract::getLote(RemessaAbstract::$loteContador);
		$this->data['com_registro'] = $lote->tipo_servico;
	}
	protected function set_emissao_boleto($value)
	{
		$this->data['emissao_boleto'] = $value;
		if($this->data['nosso_numero']==0)
		{
			$this->data['carteira'] = '00'; 
		}
		elseif($this->data['com_registro']==1 && $value==1)
		{
			$this->data['carteira'] = 11;
		}
		elseif($this->data['com_registro']==1 && $value==2)
		{
			$this->data['carteira'] = 14;
		}
		elseif($this->data['com_registro']==2 && $value==1)
		{
			$this->data['carteira'] = 21;
		}
		else
		{
			echo "Registros com emissao pelo beneficiario e sem registro nao sao enviados";
		}   
	}
	protected function set_seu_numero($value)
	{
		if($this->data['nosso_numero']==0 && $value=='')
		{
			echo 'O campo "seu_numero" e obrigatorio, na sua falta usareio o nosso numero, porem esse tambem no foi inserido!!!';
		}
		else
		{
			$this->data['seu_numero'] = $value != ' ' ? $value : $this->data['nosso_numero'];    
		}
	}
	protected function set_seu_numero2($value)
	{
		$this->data['seu_numero2'] = $value != ' ' ? $value : $this->data['nosso_numero'];    
	}
	protected function set_especie_titulo($value)
	{
		if(is_int($value))
		{
			$this->data['especie_titulo'] = $value; 
		}
		else
		{
			$especie = new Especie($this->data['codigo_banco']);
			$this->data['especie_titulo'] = $especie->getCodigo($value);
		}
	}
	protected function set_cep_sufixo($value)
	{
		$cep = $this->data['cep_pagador'];
		$cep_array =  explode('-',$cep);
		$this->data['cep_pagador'] = $cep_array[0];
		$this->data['cep_sufixo'] = $cep_array[1];
	}
	protected function set_mensagem_3($value)
	{
		$mensagem = (isset($this->entryData['mensagem']))?explode(PHP_EOL,$this->entryData['mensagem']):array();
		$this->data['mensagem_3'] = count($mensagem)>=1?$mensagem[0]:' ';
	}
	protected function set_mensagem_4($value)
	{
		$mensagem = (isset($this->entryData['mensagem']))?explode(PHP_EOL,$this->entryData['mensagem']):array();
		$this->data['mensagem_4'] = count($mensagem)>=2?$mensagem[1]:' ';
	}
	protected function set_mensagem_5($value)
	{
		$mensagem = (isset($this->entryData['mensagem']))?explode(PHP_EOL,$this->entryData['mensagem']):array();
		$this->data['mensagem_5'] = count($mensagem)>=3?$mensagem[2]:' ';
	}
	protected function set_mensagem_6($value)
	{
		$mensagem = (isset($this->entryData['mensagem']))?explode(PHP_EOL,$this->entryData['mensagem']):array();
		$this->data['mensagem_6'] = count($mensagem)>=4?$mensagem[3]:' ';
	}
	protected function set_mensagem_7($value)
	{
		$mensagem = (isset($this->entryData['mensagem']))?explode(PHP_EOL,$this->entryData['mensagem']):array();
		$this->data['mensagem_7'] = count($mensagem)>=5?$mensagem[4]:' ';
	}
    protected function set_mensagem_8($value)
    {
        $mensagem = (isset($this->entryData['mensagem']))?explode(PHP_EOL,$this->entryData['mensagem']):array();
        $this->data['mensagem_8'] = count($mensagem)>=6?$mensagem[5]:' ';
    }    
	protected function set_informacao_pagador($value)
	{
		$mensagem = (isset($this->entryData['informacao_pagador']))?$this->entryData['informacao_pagador']:'';
		$this->data['informacao_pagador'] = $mensagem;
	}    
	protected function set_prazo_protesto($value)
	{
		if($this->data['protestar']==1 && $value = '')
		{
			echo 'O campo "protestar" deve ser 3 para nao protesto e caso querira protetar deve ser informado um prazo maior que 1';
		}
		else
		{
			$this->data['prazo_protesto'] = $value;
		}
	}    
}

class Generico5 extends RegistroRemessaAbstract
{
	protected function set_codigo_lote($value)
	{
		//ArquivoAbstract::$loteCounter++; 
		$this->data['codigo_lote'] = RemessaAbstract::$loteContador;
	}
	protected function set_qtd_registros($value)
	{
		$lote  = RemessaAbstract::getLote(RemessaAbstract::$loteContador);
		$this->data['qtd_registros'] = $lote->get_counter()+1;
	}
}

class Generico9 extends RegistroRemessaAbstract
{
	protected function set_qtd_lotes($value)
	{
		//ArquivoAbstract::$loteCounter++; 
		$this->data['qtd_lotes'] = RemessaAbstract::$loteContador;
	}
	protected function set_qtd_registros($value)
	{
		$lote  = RemessaAbstract::getLote(RemessaAbstract::$loteContador);
		$this->data['qtd_registros'] = $lote->get_counter()+2;
	}
}

// REGISTROS
class Registro0 extends Generico0
{
	protected $meta = [
		'codigo_banco' => [
			'tamanho' => 3,
			'default' => '33',
			'tipo' => 'int',
			'required' => true
        ],
		'codigo_lote' => [
			'tamanho' => 4,
			'default' => '0000',
			'tipo' => 'int',
			'required' => true
        ],
		'tipo_registro' => [
			'tamanho' => 1,
			'default' => '0',
			'tipo' => 'int',
			'required' => true
        ],
		'filler1' => [
			'tamanho' => 8,
			'default' => ' ',
			'tipo' => 'alfa',
			'required' => true
        ],
        
		'tipo_inscricao_empresa' => [
			'tamanho' => 1,
			'default' => '1',
			'tipo' => 'int',
			'required' => true
        ],
        
		'numero_inscricao_empresa' => [
			'tamanho' => 15,
			'default' => '01231542354802',
			'tipo' => 'int',
			'required' => true
        ],
		'codigo_transmissao' => [
			'tamanho' => 15,
			'default' => '000000000000001',
			'tipo' => 'int',
			'required' => true
        ],
        'filler2' => [
			'tamanho' => 25,
			'default' => ' ',
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
            'default' => 'Banco Santander',
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
			'tamanho'=>1,
			'default'=>'1',
			'tipo'=>'int',
			'required'=>true
        ],
		'data_geracao'=> [
			'tamanho'=>8,
			'default'=>'',// Gerada automaticamente
			'tipo'=>'date',
			'required'=>true
        ],
		'filler4'=> [
			'tamanho'=>6,
			'default'=>' ',
			'tipo'=>'alfa',
			'required'=>true
        ],
		'numero_sequencial_arquivo'=> [
			'tamanho'=>6,
			'default'=>'',
			'tipo'=>'int',
			'required'=>true
        ],
		'versao_layout'=> [
			'tamanho'=>3,
			'default'=>'040',
			'tipo'=>'int',
			'required'=>true
        ],
        'filler5'=> [
            'tamanho'=>74,
            'default'=>' ',
            'tipo'=>'alfa',
            'required'=>true
        ],
    ];
}

/**
 * Class Registro1
 * @package CnabPHP\Resources\CaixaEconomicaFederal\Remessa\Cnab240SIGCB
 */
class Registro1 extends Generico1
{
    protected $meta = [
        'codigo_banco' => [
            'tamanho' => 3,
            'default' => '033',
            'tipo' => 'int',
            'required' => true
        ],
        'codigo_lote' => [
            'tamanho' => 4,
            'default' => 1,
            'tipo' => 'int',
            'required' => true
        ],
        'tipo_registro' => [
            'tamanho' => 1,
            'default' => '1',
            'tipo' => 'int',
            'required' => true
        ],
        'operacao' => [
            'tamanho' => 1,
            'default' => 'R',
            'tipo' => 'alfa',
            'required' => true
        ],
        'tipo_servico' => [
            'tamanho' => 2,
            'default' => '01',
            'tipo' => 'int',
            'required' => true
        ],
        'filler1' => [
            'tamanho' => 2,
            'default' => ' ',
            'tipo' => 'alfa',
            'required' => true
        ],
        'versao_layout' => [
            'tamanho' => 3,
            'default' => '030',
            'tipo' => 'int',
            'required' => true
        ],
        'filler2' => [
            'tamanho' => 1,
            'default' => ' ',
            'tipo' => 'alfa',
            'required' => true
        ],
        'tipo_inscricao_empresa' => [
            'tamanho' => 1,
            'default' => '1',
            'tipo' => 'int',
            'required' => true
        ],
        'numero_inscricao_empresa' => [
            'tamanho' => 15,
            'default' => '01231542354802',
            'tipo' => 'int',
            'required' => true
        ],
        'filler3' => [
            'tamanho' => 20,
            'default' => ' ',
            'tipo' => 'alfa',
            'required' => true
        ],
        'codigo_transmissao' => [
            'tamanho' => 15,
            'default' => '000000000000001',
            'tipo' => 'int',
            'required' => true
        ],
        'filler4' => [
            'tamanho' => 5,
            'default' => ' ',
            'tipo' => 'alfa',
            'required' => true
        ],
        'nome_empresa' => [
            'tamanho' => 30,
            'default' => '',
            'tipo' => 'alfa',
            'required' => true
        ],
        'mensagem_fixa1' => [// mensagems 1 e 2 : somente use para mensagens que serao impressas de forma identica em todos os boletos do lote
            'tamanho' => 40,
            'default' => ' ',
            'tipo' => 'alfa',
            'required' => true
        ],
        'mensagem_fixa2' => [// mensagems 1 e 2 : somente use para mensagens que serao impressas de forma identica em todos os boletos do lote
            'tamanho' => 40,
            'default' => ' ',
            'tipo' => 'alfa',
            'required' => true
        ],
        'numero_remessa' => [
            'tamanho' => 8,
            'default' => '',
            'tipo' => 'int',
            'required' => true
        ],
        'data_gravacao' => [
            'tamanho' => 8,
            'default' => '',// nao informar a data na instanciação - gerada dinamicamente
            'tipo' => 'date',
            'required' => true
        ],
        'filler5' => [
            'tamanho' => 41,
            'default' => ' ',
            'tipo' => 'alfa',
            'required' => true
        ]
    ];
}

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
			'default'=>'000000000',
			'tipo'=>'int',
			'required'=>true
        ],
		'conta_dv'=> [
			'tamanho'=>1,
			'default'=>'0',
			'tipo'=>'int',
			'required'=>true
        ],
		'conta_cobranca'=> [
			'tamanho'=>9,
			'default'=>'000000000',
			'tipo'=>'int',
			'required'=>true
        ],
		'conta_cobranca_dv'=>[
			'tamanho'=>1,
			'default'=>'1',
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
	    if ($data['tipo_remessa'] == '2') {
	        return;
        }

	    //SEGMENTOS OBRIGATÓRIOS (P, Q)
		$class = '\\cnab\\Remessa\\Registro3Q';
		$this->children[] = new $class($data);

		//SEGMENTOS OPCIONAIS (R, S)
		if( isset($data['codigo_desconto2']) || isset($data['codigo_multa']) || isset($data['mensagem'])) {
			$class = '\\cnab\\Remessa\\Registro3R';
			$this->children[] = new $class($data);
		}

		if (!isset($data['tipo_impressao'])) {
		    return;
        }

        if($data['tipo_impressao'] == 1) {
            $class = '\\cnab\\Remessa\\Registro3S1';
            $this->children[] = new $class($data);

        } else if ($data['tipo_impressao'] == 2) {
            $class = '\\cnab\\Remessa\\Registro3S2';
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


class Registro3R extends Generico3
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
			'default'=>'R',
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

		'codigo_desconto2'=> [
			'tamanho'=>1,
			'default'=>'0',
			'tipo'=>'int',
			'required'=>true
        ],
		'data_desconto2'=> [
			'tamanho'=>8,
			'default'=>'0',
			'tipo'=>'date',
			'required'=>true
        ],
		'vlr_desconto2'=> [
			'tamanho'=>13,
			'default'=>'0',
			'tipo'=>'decimal',
			'precision'=>2,
			'required'=>true
        ],
        'filler2'=> [
            'tamanho'=>24,
            'default'=>' ',
            'tipo'=>'alfa',
            'required'=>true
        ],
		'codigo_multa'=> [
			'tamanho'=>1,
			'default'=>'1', // 1 = Valor fixo
			'tipo'=>'int',
			'required'=>true
        ],
		'data_multa'=> [
			'tamanho'=>8,
			'default'=>'0',
			'tipo'=>'date',
			'required'=>true
        ],
		'vlr_multa'=> [
			'tamanho'=>13,
			'default'=>'0',
			'tipo'=>'decimal',
			'precision'=>2,
			'required'=>true
        ],
        'filler3'=> [
            'tamanho'=>10,
            'default'=>' ',
            'tipo'=>'alfa',
            'required'=>true
        ],
		'mensagem_3'=> [
			'tamanho'=>40,
			'default'=>' ',
			'tipo'=>'alfa',
			'required'=>true
        ],
		'mensagem_4'=> [
			'tamanho'=>40,
			'default'=>' ',
			'tipo'=>'alfa',
			'required'=>true
        ],
		'filler4'=> [
			'tamanho'=>61,
			'default'=>' ',
			'tipo'=>'alfa',
			'required'=>true
        ],
	];
}

class Registro3S1 extends Generico3
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
            'default'=>'S',
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

		'tipo_impressao' => [
			'tamanho'=>1,
			'default'=>'1',
			'tipo'=>'int',
			'required'=>true
        ],
		'numero_linha'=> [
			'tamanho'=>2,
			'default'=>' ',
			'tipo'=>'alfa',
			'required'=>true
        ],
		'tipo_mensagem'=> [
			'tamanho'=>1,
			'default'=>'4',
			'tipo'=>'alfa',
			'required'=>true
        ],
        'mensagem_100'=> [
            'tamanho'=>100,
            'default'=>' ',
            'tipo'=>'alfa',
            'required'=>true
        ],
		'filler2'=> [
			'tamanho'=>119,
			'default'=>' ',
			'tipo'=>'alfa',
			'required'=>true,
        ]
	];
}

class Registro3S2 extends Generico3
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
            'default'=>'S',
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

		'tipo_impressao'=> [
			'tamanho'=>1,
			'default'=>'2',
			'tipo'=>'int',
			'required'=>true
        ],
		'mensagem_5'=> [
			'tamanho'=>40,
			'default'=>' ',
			'tipo'=>'alfa',
			'required'=>true
        ],
        'mensagem_6'=> [
            'tamanho'=>40,
            'default'=>' ',
            'tipo'=>'alfa',
            'required'=>true
        ],
        'mensagem_7'=> [
            'tamanho'=>40,
            'default'=>' ',
            'tipo'=>'alfa',
            'required'=>true
        ],
        'mensagem_8'=> [
            'tamanho'=>40,
            'default'=>' ',
            'tipo'=>'alfa',
            'required'=>true
        ],
        'mensagem_9'=> [
            'tamanho'=>40,
            'default'=>' ',
            'tipo'=>'alfa',
            'required'=>true
        ],
		'filler2'=> [
			'tamanho'=>22,
			'default'=>' ',
			'tipo'=>'alfa',
			'required'=>true
        ],
	];

    protected function set_mensagem_3($value)
    {
        $this->data['mensagem_3'] = $value;
    }

    protected function set_mensagem_4($value)
    {
        $this->data['mensagem_4'] = $value;
    }

    protected function set_mensagem_5($value)
    {
        $this->data['mensagem_5'] = $value;
    }

    protected function set_mensagem_6($value)
    {
        $this->data['mensagem_6'] = $value;
    }

    protected function set_mensagem_7($value)
    {
        $this->data['mensagem_7'] = $value;
    }

    protected function set_mensagem_8($value)
    {
        $this->data['mensagem_8'] = $value;
    }

    protected function set_mensagem_9($value)
    {
        $this->data['mensagem_9'] = $value;
    }
}

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

class Registro9 extends Generico9
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
			'default'=>'9999',
			'tipo'=>'int',
			'required'=>true
        ],
		'tipo_registro'=> [
			'tamanho'=>1,
			'default'=>'9',
			'tipo'=>'int',
			'required'=>true
        ],
		'filler1'=> [
			'tamanho'=>9,
			'default'=>' ',
			'tipo'=>'alfa',
			'required'=>true
        ],
		'qtd_lotes'=> [
			'tamanho'=>6,
			'default'=>'1',
			'tipo'=>'int',
			'required'=>true
        ],
		'qtd_registros'=> [
			'tamanho'=>6,
			'default'=>'0',
			'tipo'=>'int',
			'required'=>true
        ],
		'filler2'=> [
			'tamanho'=>211,
			'default'=>' ',
			'tipo'=>'alfa',
			'required'=>true
        ]
    ];
}
?>