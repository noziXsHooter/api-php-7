<?php

namespace Validator;

use Repository\TokensAutorizadosRepository;
use Util\ConstantesGenericasUtil;
use Util\JsonUtil;

class RequestValidator
{
    private $request;
    private array $dadosRequest = [];
    private object $TokensAutorizadosRepository;
    
    const GET = 'GET';
    const DELETE = 'DELETE';
    
    public function __construct($request)
    {
       $this->request = $request;
       $this->TokensAutorizadosRepository = new TokensAutorizadosRepository();
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

        $this->TokensAutorizadosRepository->validarToken(getallheaders()['Authorization']);
        $metodo = $this->request['metodo'];
/*         echo '<pre>';
        var_dump($this->request); */

        return $this->$metodo();

    }

    private function get() {
        $retorno = utf8_encode(ConstantesGenericasUtil::MSG_ERRO_TIPO_ROTA);
        if(in_array($this->request['rota'], ConstantesGenericasUtil::TIPO_GET, false)) {
           echo "existe";
        }else{
            echo "nao existe";
        }
    }
}

