<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Model\Estate;

class EstatesController extends AbstractController
{

    /** estatesByCategory */
    public function indexAction()
    {


        $estatesId = 2;

        $estates = Estate::getMultiple('cat_id', $estatesId);

        return $this->view->render('estateById', [
            'estates' => $estates
        ]);
    }

    public function testAction()
    {


        $estatesId = $_GET['id'];

        $estates = Estate::getMultiple('cat_id', $estatesId);

        return $this->view->render('estatesByCategory', [
            'estates' => $estates
        ]);
    }


    public function estateAction()
    {
        return $this->view->render('estateById');
    }

    public function createAction()
    {
        header('Location: /estates/');
    }

    public function updateAction()
    {
    }

    public function deleteAction()
    {
    }
}
