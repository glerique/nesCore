<?php

declare(strict_types=1);

namespace NesCore\Routing;

use NesCore\Http\Request;

interface RouterInterface
{
    public function dispatch(Request $request);
}
