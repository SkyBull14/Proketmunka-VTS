<?php

abstract class Service
{
    protected App $app;
    protected PDO $db;

    public function __construct(App $app, PDO $db)
    {
        $this->app = $app;
        $this->db = $db;
    }

    protected function fetchOne(PDOStatement $query, string $className = '')
    {
        $success = $query->execute();
        if (!$success)
            throw new Exception('Failed to execute query: ' . $query->queryString);

        $result = $query->fetch(PDO::FETCH_ASSOC);
        if (!$result)
            return null;

        if ($className)
            return new $className($result);

        return (object) $result;
    }

    protected function fetchAll(PDOStatement $query, string $className = 'stdClass')
    {
        $success = $query->execute();
        if (!$success)
            throw new Exception('Failed to execute query: ' . $query->queryString);

        $result = $query->fetchAll(PDO::FETCH_CLASS, 'stdClass');

        return $result ?: [];
    }
}