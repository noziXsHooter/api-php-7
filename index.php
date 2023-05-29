<?php

use Validator\RequestValidator;
use Util\RotasUtil;

include 'bootstrap.php';

try {
    $RequestValidator = new RequestValidator(RotasUtil::getRotas());
    $retorno = $RequestValidator->processRequest();
} catch (Exception $exception) {
    echo $exception->getMessage();
}



/* var_dump(apache_get_modules()); */
