<?php
require_once __DIR__ . '/../core/AccessibleProperties.php';

/**
 * @property int $user_id
 * @property string $password
 * @property string $code
 */
class UserCredentials
{
    use AccessibleProperties;

    protected int $user_id;
    protected ?string $password;
    protected ?string $code;

    public function __construct($data = [])
    {
        if ($data) $this->__parseData($data);

        $this->code = md5(time());
    }

    public function __set(string $name, $value)
    {
        $method = "set" . str_replace(' ', '', ucwords(str_replace('_', ' ', $name)));
        $this->$method($value);
    }

    public function setUserId(int $id)
    {
        $this->user_id = $id;
    }

    public function setPassword(string $pass)
    {
        $this->password = self::hashPassword($pass);
    }

    public static function hashPassword(string $pass)
    {
        return password_hash($pass, PASSWORD_BCRYPT);
    }
}