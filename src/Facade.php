<?php
namespace Nayjest\LaravelDoctrineDBAL;

use Illuminate\Support\Facades\Facade as BaseFacade;

class Facade extends BaseFacade
{
    protected static function getFacadeAccessor()
    {
        return ServiceProvider::FACADE_ACCESSOR;
    }
}
