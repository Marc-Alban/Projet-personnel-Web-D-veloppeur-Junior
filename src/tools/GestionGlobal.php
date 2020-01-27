<?php
declare (strict_types = 1);

namespace App\Tools;

class GestionGlobal
{
    public function setParamSession($name, $instance): array
    {
        $_SESSION["$name"] = $instance;
        return $_SESSION;
    }

    public function getSession()
    {
        return $_SESSION;
    }

}