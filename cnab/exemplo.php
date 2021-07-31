<?php




//$boletosArr = $Financeiro->boletos_listar([]);

$linhaboleto = [
    'Financeiro_Cobrancas_Tipos_idCobrancaTipo' => 1,
    'Financeiro_Boletos_nrBanco' => 353,
    'Financeiro_Boletos_nrAgencia' => 123,
    'Financeiro_Boletos_nrConta' => 3214568,
    'Financeiro_Boletos_nrDigitoConta'=> 5,
    'Financeiro_Boletos_nrCarteira'=>4,
    'Financeiro_Boletos_nmPessoaFilial' => 'CARDOSO TECNOLOGIA EIRELI',
    'Financeiro_Boletos_nrCnpjCliente' => '195.691.555/001-51',
    'Financeiro_Boletos_dsEnderecoCompletoFilial' => "RUA DOS BOLETOS, TRAVESSA ALGUMA COISA, QUADRA ALGUMA COISA",
    'Financeiro_Boletos_nmPessoaCliente' => 'ZÉ PAGADOR DE BOLETO',
    'Financeiro_Boletos_nrCnpjCliente' => '555.555.555/001-52',
    'Financeiro_Boletos_dsEnderecoCompletoCliente' => 'RUA DO CLIENTE QUE PAGA',
    'Financeiro_Boletos_nmCidadeCliente' => 'SEM NOME CITY',
    'Financeiro_Boletos_dsUFCliente' => 'FU',
    'Financeiro_Boletos_cdCEPCliente' => '65000-000',
    'Financeiro_Boletos_dtVencimento' => '112122', #DD/MM/YY OU DDMMYY
    'Financeiro_Boletos_nrNossoNumero' => 5555555566,
    'Financeiro_Boletos_nrDocumento' => '9998885550004445555',
    'Financeiro_Boletos_valor' => '50,10',
    'Financeiro_Boletos_vrTaxaMulta' => '10,50'
];

$boletosArr[] = $linhaboleto;
require 'santander.php';

$header =[
    'cod_transmissao' =>'1', // codigo cedido pelo banco
    'nome_beneficiario' => '2TY', // nome do beneficiario
    'data_grav' => '10/05/21', // data de gravação
    #'msg1' => 'este e um exemplo de mensagem para todos' // uma mensagem fornecida (opcional) vai de msg 1- 5
];
/*
foreach ($boletosArr as $boleto) {
    $boletos[] =[
        'cpf_cnpj_beneficiario' => $boleto['Financeiro_Boletos_nrCnpjFilial'],
        'numero_banco_cobrador' => $boleto['Financeiro_Boletos_nrBanco'],
        'agencia_beneficiario' => $boleto['Financeiro_Boletos_nrAgencia'],
        'conta_movimento_beneficiario' => $boleto['Financeiro_Boletos_nrConta'].$boleto['Financeiro_Boletos_nrDigitoConta'], #duvida nesse
        'conta_cobranca_beneficiario' => $boleto['Financeiro_Boletos_nrConta'].$boleto['Financeiro_Boletos_nrDigitoConta'], #duvida nessa
        'cod_carteira' => $boleto['Financeiro_Boletos_nrCarteira'],
        'num_controle_participante' => '12',
        'nosso_numero' => $boleto['Financeiro_Boletos_nrNossoNumero'],
        #'data_segundo_desconto' => '000000',
        'informacao_multa' => '0',
        'multa' => '10,00', #valor %
        'valor' => '200,00',# valor real
        'data_vencimento_titulo' => $boleto['Financeiro_Boletos_dtVencimento'],
        'cpf_cnpj_pagador' => $boleto['Financeiro_Boletos_nrCnpjCliente'],
        'nome_pagador' => $boleto['Financeiro_Boletos_nmPessoaCliente'],
        'cpf_cnpj_pagador' => $boleto['Financeiro_Boletos_nrCnpjCliente'],
        'endereco_pagador' => $boleto ['Financeiro_Boletos_dsEnderecoCompletoCliente'],
        'bairro_pagador' => "", #faltou
        'cep_pagador' => $boleto['Financeiro_Boletos_cdCEPCliente'],
        'municipio_pagador' =>  $boleto['Financeiro_Boletos_nmCidadeCliente'],
        'uf_pagador' => $boleto['Financeiro_Boletos_dsUFCliente']
    ];

}*/

$boleto =[
    'cpf_cnpj_beneficiario' => $linhaboleto['Financeiro_Boletos_nrCnpjFilial'],
    'numero_banco_cobrador' => $linhaboleto['Financeiro_Boletos_nrBanco'],
    'agencia_beneficiario' => $linhaboleto['Financeiro_Boletos_nrAgencia'],
    'conta_movimento_beneficiario' => $linhaboleto['Financeiro_Boletos_nrConta'].$boleto['Financeiro_Boletos_nrDigitoConta'], #duvida nesse
    'conta_cobranca_beneficiario' => $linhaboleto['Financeiro_Boletos_nrConta'].$boleto['Financeiro_Boletos_nrDigitoConta'], #duvida nessa
    'cod_carteira' => $linhaboleto['Financeiro_Boletos_nrCarteira'],
    'num_controle_participante' => '12',
    'nosso_numero' => $linhaboleto['Financeiro_Boletos_nrNossoNumero'],
    #'data_segundo_desconto' => '000000',
    'informacao_multa' => '0',
    'multa' => '10,00', #valor %
    'valor' => '200,00',# valor real
    'data_vencimento_titulo' => $linhaboleto['Financeiro_Boletos_dtVencimento'],
    'cpf_cnpj_pagador' => $linhaboleto['Financeiro_Boletos_nrCnpjCliente'],
    'nome_pagador' => $linhaboleto['Financeiro_Boletos_nmPessoaCliente'],
    'cpf_cnpj_pagador' => $linhaboleto['Financeiro_Boletos_nrCnpjCliente'],
    'endereco_pagador' => $linhaboleto ['Financeiro_Boletos_dsEnderecoCompletoCliente'],
    'bairro_pagador' => "", #faltou
    'cep_pagador' => $linhaboleto['Financeiro_Boletos_cdCEPCliente'],
    'municipio_pagador' =>  $linhaboleto['Financeiro_Boletos_nmCidadeCliente'],
    'uf_pagador' => $linhaboleto['Financeiro_Boletos_dsUFCliente']
];
//echo $header['cod_transmissao'];
var_dump($boleto);
$remessa = new RemessaSantander(array(
    'header' => $header,
    'boletos'=> [$boleto]));
$rem = $remessa->render();
echo "<h5> $rem </h5>";
$path_file = gerar_txt('test.rem', $rem);
echo "<a href = $path_file>$path_file</a>";
    /*
require 'Remessa.php';
use cnab\Remessa\Remessa as Rem;

use function cnab\Remessa\gerar_txt;
use function cnab\Remessa\pad_txt;

//gera arquivo de .rem
$nome_empresa = '2TY';
$tr = 210023501;
// é usado a classe remessa para gerar novo objeto de remessa
$novo_arquivo = new Rem('033','Cnab240',array(
    'nome_empresa' =>$nome_empresa, // seu nome de empresa
    'tipo_inscricao'  => 2, // 1 para cpf, 2 cnpj 
    'numero_inscricao' => '12.121.2/00-1', // seu cpf ou cnpj completo
    'agencia'       => '1234', // agencia sem o digito verificador 
    'agencia_dv'    => 1, // somente o digito verificador da agencia 
    'conta'         => 12345, // número da conta
    'conta_dac'     => 1, // digito da conta
    'codigo_beneficiario'     => '123456', // codigo fornecido pelo banco
    'numero_sequencial_arquivo'     => 1, // sequencial do arquivo um numero novo para cada arquivo gerado
    'codigo_transmissao' => $tr
));
//echo $novo_arquivo;
// adiciona lote

$lote  = $novo_arquivo->adicionarLote(array('tipo_servico'=> 1)); // tipo_servico  = 1 para cobrança registrada, 2 para sem registro
// adiciona detalhe

$lote->adicionarDetalhe(array(
    'tipo_remessa' => 2,
    'tipo_inscricao_empresa' => 0,
    'codigo_ocorrencia' => 1, //1 = Entrada de título, para outras opçoes ver nota explicativa C004 manual Cnab_SIGCB na pasta docs
    'nosso_numero'      => 0201, // numero sequencial de boleto
    'seu_numero'        => 1,// se nao informado usarei o nosso numero
    'conta'         => 12345, // número da conta 
    //campos necessarios somente para itau cnab400, não precisa comentar se for outro layout 
    'carteira_banco'    => 109, // codigo da carteira ex: 109,RG esse vai o nome da carteira no banco
    'cod_carteira'      => 'I', // I para a maioria ddas carteiras do itau
     //campos necessarios somente para itau, não precisa comentar se for outro layout   
    'especie_titulo'    => 'DM', // informar dm e sera convertido para codigo em qualquer laytou conferir em especie.php
    'valor'             => 100.00, // Valor do boleto como float valido em php
    'emissao_boleto'        => 2, // tipo de emissao do boleto informar 2 para emissao pelo beneficiario e 1 para emissao pelo banco
    'protestar'        => 2, // 1 = Protestar com (Prazo) dias, 2 = Devolver após (Prazo) dias
    'nome_pagador'      => 'Leandro', // O Pagador é o cliente, preste atenção nos campos abaixo
    'tipo_inscricao'    => 1, //campo fixo, escreva '1' se for pessoa fisica, 2 se for pessoa juridica,
    'numero_inscricao'  => '123.122.123-56',//cpf ou ncpj do pagador
    'endereco_pagador'  => 'Rua dos developers,123 sl 103',
    'bairro_pagador'     => 'Bairro da insonia',
    'cep_pagador'        => '12345-123', // com hífem
    'cidade_pagador'     => 'São Luís',
    'uf_pagador'         => 'Ma',
    'data_vencimento'    => '2021-07-28', // informar a data neste formato
    'data_emissao'       => '2021-07-28', // informar a data neste formato
    'vlr_juros'          => 0.15, // Valor do juros de 1 dia'
    'data_desconto'      => '2021-07-28', // informar a data neste formato
    'vlr_desconto'       => '0', // Valor do desconto
    'prazo'              => 5, // prazo de dias para o cliente pagar após o vencimento
    'mensagem'           => 'JUROS de R$0,15 ao dia'.PHP_EOL.'Não receber apos 30 dias',
    'email_pagador'         => 'desenvolvimento@2TY.com', // data da multa
    'data_multa'         => '2021-07-28', // informar a data neste formato, // data da multa
    'conta_cobranca' => 011102,
    'conta_cobranca_dv' => 12,
    'agencia_cobradora' => 12, 
    'valor_multa'        => 30.00 // valor da multa
    #'codigo_transmissao' => $tr,
    //'tipo_inscricao_empresa' => 1
));        

//gera arquivo

$data = $novo_arquivo->getArquivo();
$file_name = 'test.txt';
unlink($file_name);
$dir_file = pad_txt($file_name  , $data);
echo '<h2>'$dir_file'</h2>';
echo '<a href= '$dir_file'> link do arquivo </a>';
*/
?>