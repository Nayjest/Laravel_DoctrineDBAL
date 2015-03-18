<?php

namespace Nayjest\LaravelDoctrineDBAL;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider
{
    const FACADE_ACCESSOR = 'doctrine_dbal_connection';

    public function register()
    {
        /** @var \Illuminate\Database\DatabaseManager $db */
        $db = $this->app->make('db');
        $this->app->singleton(self::FACADE_ACCESSOR, function () use ($db) {
            $connection = $db->connection()->getDoctrineConnection();
            $connection->getConfiguration()->setSQLLogger(
                new SqlLogger($db->connection())
            );
            return $connection;
        });
    }
}