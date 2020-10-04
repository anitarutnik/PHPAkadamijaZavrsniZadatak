<?php

declare(strict_types=1);

namespace App\Model;

class User extends AbstractModel
{
    protected static $tableName = 'users';

    public function getPassword(): string
    {
        return $this->__get('pass');
    }
}
