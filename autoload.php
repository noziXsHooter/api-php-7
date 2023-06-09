<?php
/**
 * AUTOLOAD DE CLASSES PARA O PACOTE 'app'
 * @param $classe
 */
function autoload($classe)
{
    $diretorioBase = DIR_APP . DS;
    $classe = $diretorioBase . 'app' . DS . str_replace('\\', DS, $classe) . '.php';

    /*  var_dump($classe); */
    if (file_exists($classe) && !is_dir($classe)) {
        include $classe;
    }
}

spl_autoload_register('autoload');
