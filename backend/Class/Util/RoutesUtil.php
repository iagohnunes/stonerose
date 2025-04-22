<?php

namespace Util;

class RoutesUtil
{

    public static function getRoutes()
    {
        $urls = self::getUrl();
        $request = [];

        $request['route'] = $urls[3];
        $request['id'] = $urls[4] ?? null;
        $request['method'] = $_SERVER['REQUEST_METHOD'] ?? null;
        $request['service'] = $urls[5] ?? null;

        return $request;
    }

    public static function getUrl()
    {
        $uri = str_replace('/' . DIR_PROJECT, '', $_SERVER['REQUEST_URI']);
        return explode('/', trim($uri, '/'));
    }
}
