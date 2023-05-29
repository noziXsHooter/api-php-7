<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ERROR);

define(HOST, 'localhost');
define(USER, 'root');
define(PASS, '');
define(DB, 'teste');
define(PORT, 3306);

define(DS, DIRECTORY_SEPARATOR);
define(DIR_APP, __DIR__);
define(DIR_PROJETO, 'api-php-7'); 


if (file_exists('autoload.php')) {
    include 'autoload.php';
} else {
    echo 'Erro ao incluir o bootstrap';
    exit;
}
