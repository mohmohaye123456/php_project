<?php

namespace Helpers;

class HTTP
{
    static $base = "http://php-project.lh";

    static function redirect($path, $query = "")

    {
        $url = static::$base . $path;
        if($query) $url .= "?$query";

        header("location: $url");
        exit();
    }
}
