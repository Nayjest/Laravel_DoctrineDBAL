<?php

namespace Nayjest\LaravelDoctrineDBAL;

use Illuminate\Support\Facades\DB;
use Doctrine\DBAL\Logging\SQLLogger as SQLLoggerInterface;

class SqlLogger implements SQLLoggerInterface
{
    private $current;

    public function startQuery($sql, array $params = null, array $types = null)
    {
        $start = microtime(true);
        $this->current = compact('sql','params','types','start');
    }

    public function stopQuery()
    {
        $cur = $this->current;
        DB::logQuery(
            $cur['sql'],
            $cur['params'],
            microtime(true) - $cur['start']
        );
    }
}