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
     * Method getMySQL
     *
     * @return MySQL|object
     */
    public function getMySQL()
    {
        return $this->MySQL;
    }
}