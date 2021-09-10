<?php
require_once __DIR__ . '/../core/Service.php';


class UserData extends Service
{

    // region CREATE

    public function insertUser(User $user): User
    {
        $userInsert = <<<SQL
            INSERT INTO users (email, role) VALUES(:email, :role)
        SQL;

        $statement = $this->db->prepare($userInsert);

        $email = $user->email;
        $statement->bindParam(':email', $email);

        $role = $user->role;
        $statement->bindParam(':role', $role);

        $statement->execute();

        return $this->getUserByEmail($user->email);
    }

    public function insertUserCredentials(UserCredentials $credentials): ?UserCredentials
    {
        $userInsert = <<<SQL
            INSERT INTO user_credentials (user_id, password, code) VALUES(:user_id, :password, :code)
        SQL;

        $statement = $this->db->prepare($userInsert);

        $user_id = $credentials->user_id;
        $statement->bindParam(':user_id', $user_id);

        $password = $credentials->password;
        $statement->bindParam(':password', $password);

        $code = $credentials->code;
        $statement->bindParam(':code', $code);

        $statement->execute();

        return $this->getCredentialsByCode($code);
    }

    // endregion

    // region READ

    public function getUserInfo(?User $user = null): ?UserInfo
    {
        $userId = $user->id;

        $userInfoSelect = <<<SQL
            SELECT * FROM user_data WHERE user_id = :user_id
        SQL;

        $statement = $this->db->prepare($userInfoSelect);
        $statement->bindParam(':user_id', $userId);

        return $this->fetchOne($statement, UserInfo::class);
    }

    public function getCredentialsByEmail(string $email): ?UserCredentials
    {
        $credentialSelect = <<<SQL
            SELECT uc.*
            FROM user_credentials uc
            JOIN users u ON uc.user_id = u.id
            WHERE u.email = :email
              AND uc.password IS NOT NULL
              AND u.enabled = 1
        SQL;

        $statement = $this->db->prepare($credentialSelect);
        $statement->bindParam(':email', $email);

        return $this->fetchOne($statement, UserCredentials::class);
    }

    public function getCredentialsByCode(string $code): ?UserCredentials
    {
        $credentialSelect = <<<SQL
            SELECT * FROM user_credentials WHERE code = :code;
        SQL;

        $statement = $this->db->prepare($credentialSelect);
        $statement->bindParam(':code', $code);

        return $this->fetchOne($statement, UserCredentials::class);
    }

    public function getUserByCredentials(string $email, string $password): ?User
    {
        $credentials = $this->getCredentialsByEmail($email);
        if (!password_verify($password, $credentials->password))
            return null;

        return $this->getUserById($credentials->user_id);
    }

    public function getUserByEmail(string $email): ?User
    {
        $userSelect = <<<SQL
            SELECT * FROM users WHERE email = :email;
        SQL;

        $statement = $this->db->prepare($userSelect);
        $statement->bindParam(':email', $email);

        return $this->fetchOne($statement, User::class);
    }

    public function getUserById(int $id): ?User
    {
        $userSelect = <<<SQL
            SELECT * FROM users WHERE id = :id;
        SQL;

        $statement = $this->db->prepare($userSelect);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);

        return $this->fetchOne($statement, User::class);
    }

    // endregion

    // region UPDATE

    public function updateProfile(array $request): bool
    {
        $user_id = $request['user_id'];
        $user = $this->getUserById($user_id);
        $userInfo = $this->getUserInfo($user) ?? new UserInfo(["user_id" => $user_id]);

        if (isset($request['email']))
            $user->email = $request['email'];

        foreach (['first_name', 'last_name', 'description'] as $field)
            if (isset($request[$field]))
                $userInfo->first_name = $request[$field];

        $userSuccess = $this->updateUser($user);
        $userInfoSuccess = $this->updateUserInfo($userInfo);

        return isset($userSuccess) && isset($userInfoSuccess);
    }

    public function updateUser(?User $user): ?User
    {
        $update = <<<SQL
            UPDATE `users` SET
                email = :email, role = :role, rating = :rating, enabled = :enabled
            WHERE id = :id 
            LIMIT 1
        SQL;

        $statement = $this->db->prepare($update);
        $statement->bindParam(':id', $user->id, PDO::PARAM_INT);
        $statement->bindParam(':email', $user->email);
        $statement->bindParam(':role', $user->role);
        $statement->bindParam(':rating', $user->rating);
        $statement->bindParam(':enabled', $user->enabled, PDO::PARAM_BOOL);

        $statement->execute();

        return $this->getUserById($user->id);
    }

    public function updateUserInfo(UserInfo $info): ?UserInfo
    {
        $updateInfo = <<<SQL
            UPDATE `user_data` SET
                first_name = :first_name, last_name = :last_name, description = :description
            WHERE user_id = :user_id
            LIMIT 1
        SQL;

        $statement = $this->db->prepare($updateInfo);
        $statement->bindParam(':user_id', $info->user_id, PDO::PARAM_INT);
        $statement->bindParam(':first_name', $info->first_name);
        $statement->bindParam(':last_name', $info->last_name);
        $statement->bindParam(':description', $info->description);

        $statement->execute();

        $user = $this->getUserById($info->user_id);
        return $this->getUserInfo($user);
    }

    public function updateUserCredentials(UserCredentials $data)
    {

    }

    // endregion

    // region DELETE

    public function deleteCredentialsForUser(User $user): bool
    {
        $deleteCredentials = <<<SQL
            DELETE FROM `user_credentials` WHERE user_id = :user_id
        SQL;

        $statement = $this->db->prepare($deleteCredentials);
        $statement->bindParam(':user_id', $user->id, PDO::PARAM_INT);

        return $statement->execute();
    }

    // endregion
}