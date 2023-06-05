<?php

namespace Util;

use InvalidArgumentException;
use JsonException as JsonExceptionAlias;

class JsonUtil 
{    
    /**
     * Method tratarCorpoRequisicaoJson
     *
     * @return array|mixed
     */
    public static function tratarCorpoRequisicaoJson()
    {
        try {
            $postJson = json_decode(file_get_contents('php://input'), true);
        } catch (JsonExceptionAlias $exception) {
            throw new InvalidArgumentException(ConstantesGenericasUtil::MSG_ERR0_JSON_VAZIO);
        }

        if(is_array($postJson) && count($postJson) > 0)
        {
            return $postJson;
        }
    }
}