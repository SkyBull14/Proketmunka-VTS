<?php
require_once __DIR__ . '/../core/AccessibleProperties.php';

class User
{
    use AccessibleProperties;

    public ?int $id = null;
    public string $email;

    public string $role = 'user';
    public ?float $rating = null;

    public ?UserInfo $info;

    public bool $enabled = true;

    public function __construct($data)
    {
        $this->__parseData($data);
    }

    public function __debugInfo()
    {
        return [
            'id' => $this->id,
            'email' => $this->email,
            'role' => $this->role,
            'rating' => $this->rating,
            'enabled' => $this->enabled,
        ];
    }

    private array $rolePermissions = [
        "user.login" => ["guest"],
        "user.register" => ["guest"],
        "user.logout" => ["owner", "walker", "admin"],
        "user.my-profile" => ["owner", "walker", "admin"],
        "user.messages" => ["owner", "walker", "admin"],
        "user.status" => ["admin"],

        "walker.topList" => ["guest", "owner", "walker", "admin"],
        "walker.mostActive" => ["guest", "owner", "walker", "admin"],
        "walker.status" => ["admin"],

        "my-walks.request" => ["owner", "admin"],
        "my-walks.start" => ["walker", "admin"],
        "my-walks.end" => ["walker", "admin"],
        "my-walks.diary" => ["walker", "admin"],
        "my-walks.comment" => ["owner", "walker", "admin"],
        "my-walks.rate" => ["owner", "admin"],
    ];

    public function can(string $permission): bool
    {
        $perm = $this->rolePermissions[$permission];
        return in_array($this->role, $perm);
    }
}