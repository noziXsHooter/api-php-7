<?php

namespace Service;

use Repository\UsuariosRepository;

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
}