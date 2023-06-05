<?php

namespace Repository;

use DataBase\MySQL;

class TokenAutorizationRepository
{
    private object $MySQL;
    public const TABELA = "tokens_autorizados";

    public function __construct()
    {
        $this->MySQL = new MySQL();
    }

    public function validarToken($token)  {

    }

    public function getMySQL()
    {
        return $this->MySQL;
    }
}