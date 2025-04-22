<?php

namespace Util;

use Util\GenericConstantsUtil;

class JsonUtil
{
    public static function bodyRequest()
    {
        try {
            $post = json_decode(file_get_contents('php://input'), true);
        } catch (\Exception $e) {
            throw new \InvalidArgumentException(GenericConstantsUtil::ERROR_MSG_EMPTY_JSON);
        }

        if (is_array($post) && count($post) > 0) {
            return $post;
        }
    }
}
