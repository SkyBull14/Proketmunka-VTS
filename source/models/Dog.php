<?php
require_once __DIR__ . '/../core/AccessibleProperties.php';

class Dog
{
    use AccessibleProperties;

    public int $id;
    public int $owner_id;
    public string $name;
    public string $description;
    public string $species;
    public string $gender;
    public int $age;

    public function __construct($data)
    {
        $this->__parseData($data);
    }
}