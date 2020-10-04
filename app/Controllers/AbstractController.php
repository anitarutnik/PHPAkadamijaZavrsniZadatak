<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\View;

abstract class AbstractController
{
    protected $view;

    public function __construct()
    {
        $this->view = new View();
    }

    protected function isPost()
    {
        return $_SERVER['REQUEST_METHOD'] === 'POST';
    }

    protected function isGet()
    {
        return $_SERVER['REQUEST_METHOD'] === 'GET';
    }
}
