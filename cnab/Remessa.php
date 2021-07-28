<?php

namespace cnab\Remessa;

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
        echo "\\cnab\\Resources\\{$banco}\\Remessa\\{$leiaute}\\Registro{$registro}";
        return "\\cnab\\Resources\\{$banco}\\Remessa\\{$leiaute}\\Registro{$registro}";
    }

    /**
     * @param $data
     */
    public function adicionarDetalhe($data)
    {
        //$class = '\CnabPHP\Resources\\' . self::$banco . '\remessa\\' . self::$layout . '\Registro1';
        $class = $this->register(self::$banco, self::$leiaute, 1);

        self::adicionarFilho(new $class($data));
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
            if ($metaData['required'] == true && (!isset($this->data[$prop]) || $this->data[$prop] == '')) {
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
    //public function __construct($banco, $leiaute, $dados)
    //{
    //    parent::__construct($banco, $leiaute, $dados);
    //}
}