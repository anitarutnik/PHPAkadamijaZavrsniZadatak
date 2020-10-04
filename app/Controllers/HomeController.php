<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Model\Category;

class HomeController extends AbstractController
{

    public function indexAction()
    {
        return $this->view->render('home', [
            'categories' => Category::getAll()
        ]);
    }
}
