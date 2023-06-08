<?php

use Util\ConstantesGenericasUtil;
use Validator\RequestValidator;
use Util\RotasUtil;

include 'bootstrap.php';

try {
    $RequestValidator = new RequestValidator(RotasUtil::getRotas());
    $retorno = $RequestValidator->processRequest();
} catch (Exception $exception) {
    echo json_encode([
        ConstantesGenericasUtil::TIPO => ConstantesGenericasUtil::TIPO_ERRO,
        ConstantesGenericasUtil::RESPOSTA => utf8_encode($exception->getMessage())
    ]);
    exit;
}


/* var_dump(apache_get_modules()); */
