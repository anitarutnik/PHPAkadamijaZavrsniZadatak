<?php

declare(strict_types=1);

namespace App\Core;

class Application
{
    protected $router;

    public function __construct(RouterIntreface $router)
    {
        $this->router = $router;
    }

    public function run()
    {
        return $this->router->match($_SERVER['REQUEST_URI'] ?? '/');
    }
}
