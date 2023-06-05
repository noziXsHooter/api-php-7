<?php

namespace Validator;

use Util\ConstantesGenericasUtil;
use Util\JsonUtil;

class RequestValidator
{
    private string $request;
    private array $dadosRequest = [];
    private object $TokenAutorizationRepository;
    
    const GET = 'GET';
    const DELETE = 'DELETE';
    
    public function __construct($request)
    {
       $this->request = $request;
    }

    public function processRequest()
    {
        $retorno = utf8_encode(ConstantesGenericasUtil::MSG_ERRO_TIPO_ROTA);
        if(in_array($this->request['metodo'], ConstantesGenericasUtil::TIPO_REQUEST, true)) {
            $retorno = $this->direcionarRequest();
        }

        return $retorno;
    }
    private function direcionarRequest()
    {
        if($this->request['metodo'] !== self::GET && $this->request['metodo'] !== self::DELETE)
        {
            $this->dadosRequest = JsonUtil::tratarCorpoRequisicaoJson();
        }
    }
}

