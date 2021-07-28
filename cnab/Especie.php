<?php
namespace cnab;
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
