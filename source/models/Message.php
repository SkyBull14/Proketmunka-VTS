<?php
require_once __DIR__ . '/../core/AccessibleProperties.php';

class Message
{
    use AccessibleProperties;

    public int $id;
    public string $type = 'message'; // message, request

    public int $sender_id;
    public int $recipient_id;
    public ?int $dog_id = null;
    public ?int $walk_id = null;

    public ?DateTime $sent = null;
    public ?DateTime $read = null;

    public string $subject;
    public string $body;

    public function __construct($data = [])
    {
        if ($data) $this->__parseData($data);
        if (!$this->sent) $this->sent = new DateTime();
    }
}