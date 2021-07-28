<?php
namespace cnab\Resources\Generico\Remessa\Cnab400;
use cnab\RegistroRemessaAbstract;
use cnab\RemessaAbstract;
use Exception;

/**
 * Class Generico9
 * @package cnab\Resources\Generico\Remessa\Cnab400
 */
class Generico9 extends RegistroRemessaAbstract
{
    protected function set_numero_registro($value)
    {
        $lote = RemessaAbstract::getLote(0);
        $this->data['numero_registro'] = $lote->get_counter();
    }

    protected function set_mensagem_1($value)
    {
        $mensagem = (isset(RemessaAbstract::$dados['mensagem'])) ? explode(PHP_EOL, RemessaAbstract::$dados['mensagem']) : array();
        $this->data['mensagem_1'] = count($mensagem) >= 1 ? $mensagem[0] : ' ';
    }

    protected function set_mensagem_2($value)
    {
        $mensagem = (isset(RemessaAbstract::$dados['mensagem'])) ? explode(PHP_EOL, RemessaAbstract::$dados['mensagem']) : array();
        $this->data['mensagem_2'] = count($mensagem) >= 2 ? $mensagem[1] : ' ';
    }

    protected function set_mensagem_3($value)
    {
        $mensagem = (isset(RemessaAbstract::$dados['mensagem'])) ? explode(PHP_EOL, RemessaAbstract::$dados['mensagem']) : array();
        $this->data['mensagem_3'] = count($mensagem) >= 3 ? $mensagem[2] : ' ';
    }

    protected function set_mensagem_4($value)
    {
        $mensagem = (isset(RemessaAbstract::$dados['mensagem'])) ? explode(PHP_EOL, RemessaAbstract::$dados['mensagem']) : array();
        $this->data['mensagem_4'] = count($mensagem) >= 4 ? $mensagem[3] : ' ';
    }

    protected function set_mensagem_5($value)
    {
        $mensagem = (isset(RemessaAbstract::$dados['mensagem'])) ? explode(PHP_EOL, RemessaAbstract::$dados['mensagem']) : array();
        $this->data['mensagem_5'] = count($mensagem) >= 5 ? $mensagem[4] : ' ';
    }

}

?>
