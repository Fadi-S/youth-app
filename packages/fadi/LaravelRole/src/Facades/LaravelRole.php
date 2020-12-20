<?php

namespace Fadi\LaravelRole\Facades;

use Illuminate\Support\Facades\Facade;

class LaravelRole extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'laravelrole';
    }
}
