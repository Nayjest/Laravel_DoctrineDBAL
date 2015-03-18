<?php

namespace Nayjest\LaravelDoctrineDBAL;

use Doctrine\DBAL\Configuration;
use Doctrine\DBAL\DriverManager;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use Illuminate\Foundation\AliasLoader;

class ServiceProvider extends BaseServiceProvider
{
    const FACADE_ACCESSOR  = 'doctrine_dbal_connection';

    public function register()
    {
        $this->app->singleton(self::FACADE_ACCESSOR, function(){
            $pdo = DB::connection()->getPdo();
            $config = new Configuration();
            $config->setSQLLogger(new SqlLogger);
            $connection = DriverManager::getConnection(compact('pdo'), $config);
            return $connection;
        });
        $this->app->booting(function(){
            AliasLoader::getInstance()->alias(
                'DBAL', 'Nayjest\LaravelDoctrineDBAL');
        });

    }
}