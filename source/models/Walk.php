<?php
require_once __DIR__ . '/../core/AccessibleProperties.php';

class Walk
{
    use AccessibleProperties;

    public int $id;

    public int $walker_id;
    public int $owner_id;

    public DateTime $schedule_begin;
    public DateTime $schedule_end;

    public DateTime $session_begin;
    public DateTime $session_end;

    public string $diary;

    public float $walk_rating;
    public float $dog_rating;

    public function __construct($data)
    {
        $this->__parseData($data);
    }
}