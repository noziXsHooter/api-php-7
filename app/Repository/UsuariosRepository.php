<?php

namespace Repository;

use DataBase\MySQL;
use InvalidArgumentException;
use Util\ConstantesGenericasUtil;

class UsuariosRepository
{
    private object $MySQL;
    public const TABELA = "usuarios";

    /**
     * Method TokensAutorizadosRepository __construct.
     *
     */
    public function __construct()
    {
        $this->MySQL = new MySQL();
    }

    /**
     * Method insertUser.
     *@param string $login
     *@param string $senha
     * @return int
     */
    public function insertUser($login, $senha)
    {
       $consultaInsert = 'INSERT INTO ' . self::TABELA . ' (login, senha) VALUES (:login, :senha)';
       $this->MySQL->getDb()->beginTransaction();
       $stmt = $this->MySQL->getDb()->prepare($consultaInsert);
       $stmt->bindValue(':login', $login);
       $stmt->bindValue(':senha', $senha);
       $stmt->execute();

/*        if ($stmt->errorCode() !== "00000") {
            $this->MySQL->getDb()->rollback();
        } */
       return $stmt->rowCount();
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