<?php
require_once __DIR__ . '/../core/AccessibleProperties.php';

class UserInfo
{
    use AccessibleProperties;

    public int $user_id;

    public string $first_name;
    public string $last_name;

    public string $description;

    public function __construct($data)
    {
        $this->__parseData($data);
    }
}