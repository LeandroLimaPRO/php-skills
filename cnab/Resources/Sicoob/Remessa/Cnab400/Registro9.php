<?php
namespace CnabPHP\Resources\Sicoob\Remessa\Cnab400;

use CnabPHP\Resources\Generico\Remessa\Cnab400\Generico9;

class Registro9 extends Generico9
{
    protected $meta = array(
        'tipo_registro'=>array(
            'tamanho'=>1,
            'default'=>'9',
            'tipo'=>'int',
            'required'=>true),
        'filler1'=>array(            //32.3P
            'tamanho'=>193,
            'default'=>' ',
            'tipo'=>'alfa',
            'required'=>true),
        'mensagem_1'=>array(            //32.3P
            'tamanho'=>40,
            'default'=>' ',
            'tipo'=>'alfa',
            'required'=>true),
        'mensagem_2'=>array(            //32.3P
            'tamanho'=>40,
            'default'=>' ',
            'tipo'=>'alfa',
            'required'=>true),
        'mensagem_3'=>array(            //32.3P
            'tamanho'=>40,
            'default'=>' ',
            'tipo'=>'alfa',
            'required'=>true),
        'mensagem_4'=>array(            //32.3P
            'tamanho'=>40,
            'default'=>' ',
            'tipo'=>'alfa',
            'required'=>true),
        'mensagem_5'=>array(            //32.3P
            'tamanho'=>40,
            'default'=>' ',
            'tipo'=>'alfa',
            'required'=>true),
        'numero_registro'=>array(       // 4.3R
            'tamanho'=>6,
            'default'=>'0',
            'tipo'=>'int',
            'required'=>true),
    );

}

?>
