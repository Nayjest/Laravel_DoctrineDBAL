<?php
namespace Nayjest\LaravelDoctrineDBAL;

use Doctrine\DBAL\Logging\SQLLogger as SQLLoggerInterface;
use Illuminate\Database\Connection;

class SqlLogger implements SQLLoggerInterface
{
    protected $current;

    /** @var Connection */
    protected $connection;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    public function startQuery($sql, array $params = null, array $types = null)
    {
        $start = microtime(true);
        $this->current = compact('sql', 'params', 'types', 'start');
    }

    public function stopQuery()
    {
        $cur = $this->current;
        $this->connection->logQuery(
            $cur['sql'],
            $cur['params'],
            microtime(true) - $cur['start']
        );
    }
}