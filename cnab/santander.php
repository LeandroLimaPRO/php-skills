<?php
    class RemessaSantander {
        var $header = [];
        var $boletos = [];
        var $linhas = 0;
        var $totais = 0;
        function __construct($dadosEmpresa) {
            $header = $dadosEmpresa['header'];
            $boletos =$dadosEmpresa['boletos'];
            $this->setHeader($header);
            $this->setBoleto($boletos);
            //var_dump($this->header);
            //var_dump($this->boletos);
            echo "Valor total da remessa: $this->totais <br></br>";
        }
        function setHeader($header){
            $this->header = $header;
        }
        function setBoleto($boletos) {
            /*validação */
            $this->boletos = $boletos;
            $this->setTotal($boletos);
            /*
            foreach($boletos as $boleto){
                
                var_dump($boleto);
                
            }*/
        }
        function setTotal($boletos) {
            foreach ($boletos as $boleto){
                $this->totais += $boleto['valor'];
                return true;
            }
        }
        // pegar apenas os numeros na string
        function getNum($string){
           return preg_replace('/[^0-9]/', '', $string);
        }
        // verifica se o atributo existe, senão atribui " "
        function verString($string){
            //echo "[verificando string] <$string>";
            if (isset($string) == true){
                //echo "[verificando string] > verdadeiro!";
                return $string;
            }
            else{
                //echo "[verificando string] > Falso!";
                return " ";
            }
        }
        // verifica se o atributo existe, senão atribui "0"
        function verInt($string){
            if (isset($string) == true){
                return $string;
            }
            else{
                return "0";
            }
        }
        function tirarAcentos($string){
            return preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/"),explode(" ","a A e E i I o O u U n N"),$string);
        }
        //atribui TIPO de doc CPF - 01 E CNPJ 02
        function getTipoDoc($num_doc){
            switch (strlen($num_doc)){
                case 14://cnpj
                    return "02";
                    //break;
                case 11: //cpf
                    return "01";
                    //break;
                default:
                    return "01";
                    //break;
                }
               
        }
        function renderHeader($header) {
            $this->linhas++;
            $cod_registro = "0";
            $cod_remessa = "1";
            $l_transmissao = str_pad(
                                "REMESSA",
                                7,
                                " ",
                                STR_PAD_LEFT);    
            $cod_servico = "01";
            $l_servico = str_pad(
                                "COBRANÇA",
                                15,
                                " ",
                                STR_PAD_LEFT);
            $cod_transmissao = str_pad(
                                $header["cod_transmissao"],
                                20,
                                "0",
                                STR_PAD_LEFT);
            $nome_beneficiario = str_pad(
                $this->tirarAcentos(substr($header["nome_beneficiario"],
                0,
                30)),
                30,
                " ",
                STR_PAD_LEFT);
            $cod_banco = "033";
            $nome_banco = str_pad(
                "SANTANDER", 
                15, 
                " ", 
                STR_PAD_RIGHT);
            $data_grav = str_pad(
                $this->getNum(
                    $header["data_grav"]), 
                6,
                "0",
                STR_PAD_RIGHT);
            $zeros = str_pad(
                "0",
                16,
                "0",
                STR_PAD_LEFT);
            $msg1 = str_pad(
                $this->tirarAcentos(substr(
                    $this->verString(
                        $header["msg1"]),
                    0,
                    47)), 
                47,
                " ",
                STR_PAD_LEFT);
            $msg2 = str_pad($this->tirarAcentos(substr($this->verString($header["msg2"]),0,47)), 
                47," ",STR_PAD_LEFT);
            $msg3 = str_pad($this->tirarAcentos(substr($this->verString($header["msg3"]),0,47)), 
                47," ",STR_PAD_LEFT);
            $msg4 = str_pad($this->tirarAcentos(substr($this->verString($header["msg4"]),0,47)), 
                            47,
                            " ",
                            STR_PAD_LEFT);
            $msg5 = str_pad($this->tirarAcentos(substr($this->verString(
                                $header["msg5"]),
                                0,
                                47)), 
                            47,
                            " ",
                            STR_PAD_LEFT);
            $brancos1 = str_pad(" ",34,STR_PAD_RIGHT);
            $brancos2 = str_pad(" ",6,STR_PAD_RIGHT);
            $n_ver = str_pad($this->getNum($this->verInt($header["n_ver"])), 3, STR_PAD_RIGHT);
            $n_sec = str_pad($this->linhas, 6, "0", STR_PAD_LEFT);
            return "{$cod_registro}{$cod_remessa}{$l_transmissao}{$cod_servico}{$l_servico}{$cod_transmissao}{$nome_beneficiario}{$cod_banco}{$nome_banco}{$data_grav}{$zeros}{$msg1}{$msg2}{$msg3}{$msg4}{$msg5}{$brancos1}{$brancos2}{$n_ver}{$n_sec}";
        }
        function renderBoleto($boleto) {
            $this->linhas++;
            
            $cod_registro = "1";
            
            $num_documento = $this->getNum($boleto["cpf_cnpj_beneficiario"]);
            // atribui tipo de inscrição do beneficiario
            $t_ins_benef = str_pad($this->getTipoDoc($num_documento),
            2,"0",STR_PAD_LEFT);
            
            $cpf_cnpj_benef = str_pad($num_documento,
                14,"0",STR_PAD_RIGHT);

            //$t_ins_benef = str_pad($boleto["tipo_inscricao_beneficiario"],2,"0",STR_PAD_RIGHT);
            $agencia_benef = str_pad($this->getNum($boleto["agencia_beneficiario"]),
                4,"0",STR_PAD_LEFT);
            
            $conta_mov_benef = str_pad(
                $this->getNum($boleto["conta_movimento_beneficiario"]),
                8,"0",STR_PAD_LEFT);
            
            $conta_cobr_benef = str_pad(
                $this->getNum($boleto["conta_cobranca_beneficiario"]),
                8,"0",STR_PAD_LEFT);
            
            $num_control = str_pad(
                $this->getNum($boleto["num_controle_participante"]),
                25,"0",STR_PAD_LEFT);
            
            $nosso_numero = str_pad(
                $this->getNum($boleto["nosso_numero"]),
                8,"0",STR_PAD_RIGHT);
            
            $data_seg_desconto = str_pad(
                $this->getNum($boleto["data_segundo_desconto"]),
                6,"0",STR_PAD_LEFT);
            
            $branco = str_pad(" ",1," ",STR_PAD_LEFT);
            
            $info_multa = str_pad(
                $this->getNum($boleto["informacao_multa"]),
                1,"0",STR_PAD_LEFT);
            
            $multa = str_pad($this->getNum($boleto["multa"]),
                4,"0",STR_PAD_LEFT);
           
            $u_v_m_c = "00";
            
            $v_t_o_u = str_pad($this->verInt($this->getNum($boleto["valor_titulo_outra_unidade"])),
                13,"0",STR_PAD_RIGHT);
            
            $brancos = str_pad(" ",4," ",STR_PAD_LEFT);
            
            $d_c_m = str_pad($this->verInt($this->getNum($boleto["data_cobranca_multa"])),
                6,"0",STR_PAD_LEFT);
            
            $cod_carteira = str_pad($this->verInt($this->getNum($boleto["cod_carteira"])),
                1,"0",STR_PAD_LEFT);
           
            $cod_ocorrencia = str_pad($this->verInt($this->getNum($boleto["cod_ocorrencia"])),
                2,"0",STR_PAD_RIGHT);
            
            $seu_numero = str_pad($this->verInt($this->getNum($boleto["seu_numero"])),
                10,"0",STR_PAD_LEFT);
            
            $d_v_t = str_pad($this->verInt($this->getNum($boleto["data_vencimento_titulo"])),
                6,"0",STR_PAD_LEFT);
            
            $valor_titulo = str_pad($this->verInt($this->getNum($boleto["valor"])),
                13,"0",STR_PAD_BOTH);
            
            $n_b_c = str_pad($this->verInt($this->getNum($boleto["numero_banco_cobrador"])),
                3,"0",STR_PAD_LEFT);
            
            $c_a_c = str_pad($this->verInt($this->getNum($boleto["codigo_agencia_cobrador"])),
                5,"0",STR_PAD_LEFT);
            
            $especie_documento = str_pad($this->verInt($this->getNum($boleto["especie_documento"])),
                2,"0",STR_PAD_LEFT);
            
            $tipo_aceite = "N";
            
            $d_e_t = str_pad($this->verInt($this->getNum($boleto["data_emissao_titulo"])),
                6,"0",STR_PAD_LEFT);
            
            $p_i_c = str_pad($this->verInt($this->getNum($boleto["primeira_instrucao_cobranca"])),
                2,"0",STR_PAD_LEFT);

            $s_i_c = str_pad($this->verInt($this->getNum($boleto["segunda_instrucao_cobranca"])),
                2,"0",STR_PAD_LEFT);

            
            $v_m_c_d_a = str_pad($this->verInt($boleto["valor_mora_cobrado_dia_atraso"]),
                12,"0",STR_PAD_LEFT); // NÃO EDITEI
            
            $d_l_c_d = str_pad($this->verInt($this->getNum($boleto["data_limiste_concessao_desconto"])),
                6,"0",STR_PAD_LEFT);
            
            $v_d_c = str_pad($this->verInt($this->getNum($boleto["valor_desconto_concedido"])),
                12,"0",STR_PAD_BOTH);
            
            $v_iof = str_pad($this->verInt($boleto["valor_iof"]),
                13,"0",STR_PAD_BOTH); // NÃO EDITEI
            
            $v_a_c = str_pad($this->verInt($boleto["valor_segundo_desconto"]),
                14,"0",STR_PAD_BOTH); // NÃO EDITEI
            
            $num_documento_pagador = $this->getNum($boleto["cpf_cnpj_pagador"]);
            $t_pagador = str_pad($this->getTipoDoc($num_documento_pagador),2,"0",STR_PAD_RIGHT); //NÃO EDITEI
            $cpf_cnpj_pagador = str_pad($num_documento_pagador,14,"0",STR_PAD_LEFT); //NÃO EDITEI
            
            $nome_pagador = str_pad($this->tirarAcentos($this->verString(substr($boleto["nome_pagador"],0,40))),
                40," ",STR_PAD_LEFT);
            
            $endereco_pagador = str_pad($this->tirarAcentos($this->verString(substr($boleto["endereco_pagador"],0,40))),
                40," ",STR_PAD_LEFT);
            
            $bairro_pagador = str_pad($this->tirarAcentos($this->verString(substr($boleto["bairro_pagador"],0,12))),
                12," ",STR_PAD_LEFT);
            
            $cep_pagador = str_pad($this->getNum($boleto["cep_pagador"]),5,"0",STR_PAD_LEFT);
            $complemento_pagador = str_pad($this->getNum(substr($boleto["complemento_cep_pagador"],0,3)),
                3," ",STR_PAD_LEFT);
            
            $municipio_pagador = str_pad($this->tirarAcentos(substr($boleto["municipio_pagador"],0,15)),
                15," ",STR_PAD_LEFT);
            $uf_pagador = str_pad(
                                substr(
                                    $boleto["uf_pagador"],
                                    0,
                                    2),
                                2,
                                " ",
                                STR_PAD_LEFT);
            $brancos2 = str_pad(
                                " ",
                                30,
                                " ",
                                STR_PAD_LEFT);
            $brancos3 = str_pad(
                                " ",
                                1,
                                " ",
                                STR_PAD_LEFT);
            $indent_complemento = str_pad(
                                $boleto["identificador_complemento"],
                                1,
                                "0",
                                STR_PAD_RIGHT);
            $complemento = str_pad(
                                $boleto["complemento"],
                                2,
                                "0",
                                STR_PAD_RIGHT);
            $brancos4 = str_pad(
                                " ",
                                6,
                                " ",
                                STR_PAD_LEFT);

            $n_d_p = str_pad(
                                $this->getNum($boleto["numero_dias_protesto"]),
                                2,
                                "0",
                                STR_PAD_RIGHT);

            $brancos5 = str_pad(
                                " ",
                                1,
                                " ",
                                STR_PAD_LEFT); 

            $sequencial = str_pad(
                                    $this->linhas, 
                                    6, 
                                    "0", 
                                    STR_PAD_LEFT);
            return "{$cod_registro}{$t_ins_benef}{$cpf_cnpj_benef}{$agencia_benef}{$conta_mov_benef}{$conta_cobr_benef}{$num_control}{$nosso_numero}{$data_seg_desconto}{$branco}{$info_multa}{$multa}{$u_v_m_c}{$v_t_o_u}{$brancos}{$d_c_m}{$cod_carteira}{$cod_ocorrencia}{$seu_numero}{$d_v_t}{$valor_titulo}{$n_b_c}{$c_a_c}{$especie_documento}{$tipo_aceite}{$d_e_t}{$p_i_c}{$s_i_c}{$v_m_c_d_a}{$d_l_c_d}{$v_d_c}{$v_iof}{$v_a_c}{$t_pagador}{$cpf_cnpj_pagador}{$nome_pagador}{$endereco_pagador}{$bairro_pagador}{$cep_pagador}{$complemento_pagador}{$municipio_pagador}{$uf_pagador}{$brancos2}{$brancos3}{$indent_complemento}{$complemento}{$brancos4}{$n_d_p}{$brancos5}{$sequencial}";
        }
        function renderTrailer() {
            $this->linhas++;
            
            $registro = '9';
            $documentos = str_pad(count($this->boletos), 6, "0", STR_PAD_RIGHT);
            $total = str_pad($this->getNum($this->totais, 2), 13, "0", STR_PAD_BOTH);
            $zeros1 = str_pad(0, 374, "0", STR_PAD_LEFT);
            $sequencial = str_pad($this->linhas, 6, "0", STR_PAD_LEFT);

            return "{$registro}{$documentos}{$total}{$zeros1}{$sequencial}";
            

        }
        function render() {
            $file = $this->renderHeader($this->header);
            $tam = strlen($file);
            echo "<h2> Tamanho do header: $tam <h1> </br>";
            foreach ($this->boletos as $boleto) {
                //var_dump($boleto);
                //echo '$cpf_cnpj_beneficiario';
                $bol = $this->renderBoleto($boleto);
                $file .="\n";
                $file .= $bol;
                $tam = strlen($bol);
                echo "<h3> Tamanho do boleto: $tam <h2> </br>";
            }
            $file .="\n";
            $file .= $this->renderTrailer();
            $tam = strlen($this->renderTrailer());
            echo "<h4> Tamanho do Triller: $tam <h2> </br>";
            return $file;
        }
    }

function gerar_txt($file_name,$data){
        //criamos o arquivo 
        $arquivo = fopen($file_name,'a+'); 
        //verificamos se foi criado 
        if ($arquivo == false)
            echo 'Não foi possível criar o arquivo.';
    
        //escrevemos no arquivo 
        fwrite($arquivo, $data); //Fechamos o arquivo após escrever nele fclose($arquivo); 
        fclose($arquivo);
        return $file_name;
}