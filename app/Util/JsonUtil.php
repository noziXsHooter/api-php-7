<?php

namespace Util;

use InvalidArgumentException;
use JsonException as JsonExceptionAlias;

class JsonUtil 
{    

    public function processarArrayParaRetornar($retorno)
    {
        $dados = [];
        $dados[ConstantesGenericasUtil::TIPO] = ConstantesGenericasUtil::TIPO_ERRO;

        if((is_array($retorno) && count($retorno) > 0) || strlen($retorno) > 10){
            
            $dados[ConstantesGenericasUtil::TIPO] = ConstantesGenericasUtil::TIPO_SUCESSO;
            $dados[ConstantesGenericasUtil::RESPOSTA] = $retorno;

            return $this->retornarJson($dados);
        }

    }

    public function retornarJson($json)
    {
        header('Content-Type: application/json');
        header('Cache-Control: no-cache, no-store, must-revalidate');
        header('Access-Control-Allow-Origin: GET, POST, PUT, DELETE');
        echo json_encode($json);
        exit;
    }

    /**
     * Method tratarCorpoRequisicaoJson
     *
     * @return array|mixed
     */
    public static function tratarCorpoRequisicaoJson()
    {
        try {
            $postJson = json_decode(file_get_contents('php://input'), true);
        } catch (JsonExceptionAlias $exception) {
            throw new InvalidArgumentException(ConstantesGenericasUtil::MSG_ERR0_JSON_VAZIO);
        }

        if(is_array($postJson) && count($postJson) > 0)
        {
            return $postJson;
        }
    }
}