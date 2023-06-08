<?php

namespace Repository;

use DataBase\MySQL;
use InvalidArgumentException;
use Util\ConstantesGenericasUtil;

class TokensAutorizadosRepository
{
    private object $MySQL;
    public const TABELA = "tokens_autorizados";

    /**
     * Method TokensAutorizadosRepository __construct.
     *
     */
    public function __construct()
    {
        $this->MySQL = new MySQL();
    }
    
    /**
     * @param $token
     */
    public function validarToken($token)  
    {
        $token = str_replace([' ','Bearer'], '', $token);
        if(!$token)
        {
            throw new InvalidArgumentException(ConstantesGenericasUtil::MSG_ERRO_TOKEN_VAZIO);
        }

        $consultaToken = 'SELECT id FROM ' . self::TABELA . ' WHERE token = :token AND status = :status';
        $stmt = $this->getMySQL()->getDb()->prepare($consultaToken);
        $stmt->bindValue(':token', $token);
        $stmt->bindValue(':status', ConstantesGenericasUtil::SIM);
        $stmt->execute();

        if($stmt->rowCount() !== 1)
        {
            header('HTTP/1.1 401 Unauthorized');
            throw new InvalidArgumentException(ConstantesGenericasUtil::MSG_ERRO_TOKEN_NAO_AUTORIZADO);
        }
    }
    
    /**
     * Method getMySQL
     *
     * @return MySQL|object
     */
    public function getMySQL()
    {
        return $this->MySQL;
    }
}