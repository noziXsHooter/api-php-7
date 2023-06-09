<?php

namespace Service;

use InvalidArgumentException;
use Repository\UsuariosRepository;
use Util\ConstantesGenericasUtil;

class UsuariosService {

    const TABELA = 'usuarios';
    const RECURSOS_GET = ['listar'];

    private array $dados;

    /**
     * @var object|UsuariosRepository
     */
    private object $UsuariosRepository; 
    
    /**
     * Usuarios service constructor
     * @param array $dados
     */
    public function __construct($dados = [])
    {
        $this->dados = $dados;
        $this->UsuariosRepository = new UsuariosRepository();
    }

    public function validarGet()
    {

        $retorno = null;
        $recurso = $this->dados['recurso'];

        if(in_array($recurso, self::RECURSOS_GET, true)) {
            $retorno = $this->dados['id'] > 0 ? $this->getOneByKey() : $this->$recurso();
        }else {
            throw new InvalidArgumentException(ConstantesGenericasUtil::MSG_ERRO_RECURSO_INEXISTENTE);
        }

        if($retorno === null)
        {
            throw new InvalidArgumentException(ConstantesGenericasUtil::MSG_ERRO_GENERICO);
        }

        return $retorno;
    }

    public function getOneByKey()
    {
        return $this->UsuariosRepository->getMySQL()->getOneByKey(self::TABELA, $this->dados['id']);
    }

    public function listar()
    {
        return $this->UsuariosRepository->getMySQL()->getAll(self::TABELA);
    }
}