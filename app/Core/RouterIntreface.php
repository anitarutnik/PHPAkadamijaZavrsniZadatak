<?php

declare(strict_types=1);

namespace app\Core;

interface RouterIntreface
{
    public function match(string $pathInfo);
}
