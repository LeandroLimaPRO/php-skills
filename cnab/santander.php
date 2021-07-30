<?php
    class remessaSantander {
        var $header = [];
        var $boletos = [];
        var $linhas = 0;
        var $totais = 0;
        function __construct($dadosEmpresa) {

        }
        function setHeader($header =[]){
            $this->$header[] = $header;
        }
        function setBoleto($boleto = []) {
            /*validação */
            $this->boletos[] = $boleto;
            $this->setTotal($boleto);
        }
        function setTotal($boleto) {
            $this->totais += $boleto['valor'];
            return true;
        }
        function renderHeader($header) {
            $cod_registro = str_pad($header["cod_registro"],1,"0",STR_PAD_LEFT);
            $cod_remessa = str_pad($header["cod_remessa"],1,"0",STR_PAD_LEFT);
            $l_transmissao = str_pad("REMESSA",7,"0",STR_PAD_LEFT);    
            $cod_servico = str_pad($header["cod_servico"],2,"0",STR_PAD_RIGHT);
            $l_servico = str_pad("COBRANÇA",15," ",STR_PAD_LEFT);
            $cod_transmissao = str_pad($header["cod_transmissao"],20,"0",STR_PAD_LEFT);
            $nome_beneficiario = str_pad(substr($header["nome_beneficiario"],0,30),30," ",STR_PAD_LEFT);
            $cod_banco = str_pad($header["cod_banco"], 3, "0", STR_PAD_RIGHT);
            $nome_banco = str_pad(substr($header["nome_banco"],0,15), 15, " ", STR_PAD_RIGHT);
            $data_grav = str_pad($header["data_grav"], 6,"0",STR_PAD_RIGHT);
            $zeros = str_pad(0,16,STR_PAD_LEFT);
            $msg1 = str_pad($header["msg1"], 47," ",STR_PAD_LEFT);
            $msg2 = str_pad($header["msg2"], 47," ",STR_PAD_LEFT);
            $msg3 = str_pad($header["msg3"], 47," ",STR_PAD_LEFT);
            $msg4 = str_pad($header["msg4"], 47," ",STR_PAD_LEFT);
            $msg5 = str_pad($header["msg5"], 47," ",STR_PAD_LEFT);
            $brancos1 = str_pad(" ",34,STR_PAD_RIGHT);
            $brancos2 = str_pad(" ",6,STR_PAD_RIGHT);
            $n_ver = str_pad($header["n_ver"], 3, STR_PAD_LEFT);
            $n_sec = str_pad($header["n_sec"], 6, STR_PAD_RIGHT);
            return "{$cod_registro}{$cod_remessa}{$l_transmissao}{$cod_servico}{$l_servico}{$cod_transmissao}{$nome_beneficiario}{$cod_banco}{$nome_banco}{$data_grav}{$zeros}{$msg1}{$msg2}{$msg3}{$msg4}{$msg5}{$brancos1}{$brancos2}{$n_ver}{$n_sec}";
        }
        function renderBoleto($boleto) {
            $this->linhas++;
            
            $cod_registro = str_pad($boleto["cod_registro"],1,"0",STR_PAD_LEFT);
            $t_ins_benef = str_pad($boleto["tipo_inscricao_beneficiario"],2,"0",STR_PAD_RIGHT);
            $cpf_cnpj_benef = str_pad($boleto["cpf_cnpj_beneficiario"],14,"0",STR_PAD_RIGHT);
            $agencia_benef = str_pad($boleto["agencia_beneficiario"],4,"0",STR_PAD_LEFT);
            $conta_mov_benef = str_pad($boleto["conta_movimento_beneficiario"],8,"0",STR_PAD_LEFT);
            $conta_cobr_benef = str_pad($boleto["conta_cobranca_beneficiario"],8,"0",STR_PAD_LEFT);
            $num_control = str_pad($boleto["num_controle_participante"],25,"0",STR_PAD_LEFT);
            $nosso_numero = str_pad($boleto["nosso_numero"],8,"0",STR_PAD_LEFT);
            $data_seg_desconto = str_pad($boleto["data_segundo_desconto"],6,"0",STR_PAD_LEFT);
            $branco = str_pad(" ",1," ",STR_PAD_LEFT);
            $info_multa = str_pad($boleto["informacao_multa"],1,"0",STR_PAD_LEFT);
            $multa = str_pad($boleto["multa"],2,"0",STR_PAD_LEFT);
            $u_v_m_c = str_pad($boleto["unidade_valor_moeda_corrente"],2,"0",STR_PAD_RIGHT);
            $v_t_o_u = str_pad($boleto["valor_titulo_outra_unidade"],8,"0",STR_PAD_RIGHT);
            $brancos = str_pad(" ",4," ",STR_PAD_LEFT);
            $d_c_m = str_pad($boleto["data_cobranca_multa"],6,"0",STR_PAD_LEFT);
            $cod_carteira = str_pad($boleto["cod_carteira"],1,"0",STR_PAD_LEFT);
            $cod_ocorrencia = str_pad($boleto["cod_ocorrencia"],2,"0",STR_PAD_RIGHT);
            $seu_numero = str_pad($boleto["seu_numero"],10,"0",STR_PAD_LEFT);
            $d_v_t = str_pad($boleto["data_vencimento_titulo"],6,"0",STR_PAD_LEFT);
            $valor_titulo = str_pad($boleto["valor"],11,"0",STR_PAD_LEFT);
            $n_b_c = str_pad($boleto["numero_banco_cobrador"],3,"0",STR_PAD_LEFT);
            $c_a_c = str_pad($boleto["codigo_agencia_cobrador"],5,"0",STR_PAD_LEFT);
            $especie_documento = str_pad($boleto["especie_documento"],2,"0",STR_PAD_LEFT);
            $tipo_aceite = str_pad($boleto["tipo_aceite"],1,"0",STR_PAD_LEFT);
            $d_e_t = str_pad($boleto["data_emissao_titulo"],6,"0",STR_PAD_LEFT);
            $p_i_c = str_pad($boleto["primeira_instrucao_cobranca"],2,"0",STR_PAD_LEFT);
            $s_i_c = str_pad($boleto["segunda_instrucao_cobranca"],2,"0",STR_PAD_LEFT);
            $v_m_c_d_a = str_pad($boleto["valor_mora_cobrado_dia_atraso"],11,"0",STR_PAD_LEFT);
            $d_l_c_d = str_pad($boleto["data_limiste_concessao_desconto"],6,"0",STR_PAD_LEFT);
            $v_d_c = str_pad($boleto["valor_desconto_concedido"],11,"0",STR_PAD_LEFT);
            $v_iof = str_pad($boleto["valor_iof"],8,"0",STR_PAD_LEFT);
            $v_a_c = str_pad($boleto["valor_segundo_desconto"],13,"0",STR_PAD_LEFT);
            $t_pagador = str_pad($boleto["tipo_pagador"],2,"0",STR_PAD_RIGHT);
            $cpf_cnpj_pagador = str_pad($boleto["cpf_cnpj_pagador"],14,"0",STR_PAD_LEFT);
            $nome_pagador = str_pad(substr($boleto["nome_pagador"],0,40),40," ",STR_PAD_LEFT);
            $endereco_pagador = str_pad(substr($boleto["endereco_pagador"],0,40),40," ",STR_PAD_LEFT);
            $bairro_pagador = str_pad(substr($boleto["bairro_pagador"],0,12),12," ",STR_PAD_LEFT);
            $cep_pagador = str_pad($boleto["cep_pagador"],5,"0",STR_PAD_LEFT);
            $complemento_pagador = str_pad(substr($boleto["complemento_cep_pagador"],0,3),3," ",STR_PAD_LEFT);
            $municipio_pagador = str_pad(substr($boleto["municipio_pagador"],0,15),15," ",STR_PAD_LEFT);
            $uf_pagador = str_pad(substr($boleto["uf_pagador"],0,2),2," ",STR_PAD_LEFT);
            $brancos2 = str_pad(" ",30," ",STR_PAD_LEFT);
            $brancos3 = str_pad(" ",1," ",STR_PAD_LEFT);
            $indent_complemento = str_pad($boleto["identificador_complemento"],1,"0",STR_PAD_RIGHT);
            $complemento = str_pad($boleto["complemento"],2,"0",STR_PAD_RIGHT);
            $brancos4 = str_pad(" ",6," ",STR_PAD_LEFT);
            $n_d_p = str_pad($boleto["numero_dias_protesto"],2,"0",STR_PAD_RIGHT);
            $brancos5 = str_pad(" ",1," ",STR_PAD_LEFT);                                                                                               
            $sequencial = str_pad($this->linhas, 6, "0", STR_PAD_LEFT);
            return "{$cod_registro}{$t_ins_benef}{$cpf_cnpj_benef}{$agencia_benef}{$conta_mov_benef}{$conta_cobr_benef}{$num_control}{$nosso_numero}{$data_seg_desconto}{$branco}{$info_multa}{$multa}{$u_v_m_c}{$v_t_o_u}{$brancos}{$d_c_m}{$cod_carteira}{$cod_ocorrencia}{$seu_numero}{$d_v_t}{$valor_titulo}{$n_b_c}{$c_a_c}{$especie_documento}{$tipo_aceite}{$d_e_t}{$p_i_c}{$s_i_c}{$v_m_c_d_a}{$d_l_c_d}{$v_d_c}{$v_iof}{$v_a_c}{$t_pagador}{$cpf_cnpj_pagador}{$nome_pagador}{$endereco_pagador}{$bairro_pagador}{$cep_pagador}{$complemento_pagador}{$municipio_pagador}{$uf_pagador}{$brancos2}{$brancos3}{$indent_complemento}{$complemento}{$brancos4}{$n_d_p}{$brancos5}{$sequencial}";
        }
        function renderTrailer() {
            $this->linhas++;
            
            $registro = '9';
            $documentos = str_pad(count($this->boletos), 6, "0", STR_PAD_LEFT);
            $total = str_pad(number_format($this->totais, 2, '', ''), 13, "0", STR_PAD_LEFT);
            $zeros1 = str_pad(0, 374, "0", STR_PAD_LEFT);
            $sequencial = str_pad($this->linhas, 6, "0", STR_PAD_LEFT);

            return "{$registro}{$documentos}{$total}{$zeros1}{$sequencial}";
            

        }
        function render() {
            $file = $this->renderHeader($this->$header);
            foreach ($this->boletos as $boleto) {
                $file .= $this->renderBoleto($boleto);
            }
            $file .= $this->renderTrailer();

            return $file;
        }
    }