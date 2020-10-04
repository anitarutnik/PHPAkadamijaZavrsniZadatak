<?php

declare(strict_type=1);

namespace App\Core;

class Router implements RouterIntreface
{

    public function match(string $pathInfo)
    {

        $pathInfo = trim($pathInfo, '/');
        $parts = $pathInfo ? explode('/', $pathInfo) : [];

        if (count($parts) > 2) {
            throw new \Exception('Not valid URL');
        }

        $controller = ucfirst(strtolower($parts[0] ?? 'home')) . 'Controller';
        $method = strtolower($parts[1] ?? 'index') . 'Action';

        $className = "\\App\\Controllers\\{$controller}";

        if (!method_exists($className, $method)) {
            throw new \Exception('Method does not exist');
        }


        $object = new $className();
        return $object->$method() ?? '';
    }
}
