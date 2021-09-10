<?php
require_once __DIR__ . '/../core/Service.php';


class UserAuth extends Service
{
    public function register(array $request): array
    {
        $user = new User($request);
        $user->enabled = false;

        $userExist = $this->app->userData->getUserByEmail($request['email']);
        if ($userExist)
            return [
                "error" => "Ez a felhasználó már létezik, nem lehet újra regisztrálni!"
            ];

        $user = $this->app->userData->insertUser($user);

        if (!$user->id)
            return [
                "error" => "Felhasználó létrehozása sikertelen!"
            ];

        if ($request['password'] !== $request["passwordVerification"])
            return [
                "error" => "A jelszavak nem eggyeznek!"
            ];

        $userCredentials = new UserCredentials();
        $userCredentials->password = $request['password'];
        $userCredentials->user_id = $user->id;

        $credentials = $this->app->userData->insertUserCredentials($userCredentials);
        $notification = $this->app->userMessages->sendSystemMessage($user, 'welcome', [
            "code" => $credentials->code,
        ]);

        if (!$notification)
            return [
                "error" => "Nem sikerült üzenetet küldeni, kérjük vegye fel a kapcsolatot a rendszergazdákkal!"
            ];

        return [
            "message" => "Felhasználó sikeresen regisztrálva!",
        ];
    }

    public function activate(array $request): array
    {
        $code = $request['code'];
        $credentials = $this->app->userData->getCredentialsByCode($code);
        $user = $this->app->userData->getUserById($credentials->user_id);

        $user->enabled = true;
        $this->app->userData->updateUser($user);

        $_SESSION['logged-in-user'] = $user->id;

        return [
            "message" => "Felhasználó sikeresen aktiválva!",
        ];
    }

    public function login(array $request)
    {
        $email = $request['email'];
        $password = $request['password'];

        $user = $this->app->userData->getUserByCredentials($email, $password);
        if (!$user)
            return [
                "error" => "Felhasználónév vagy Jelszó nem eggyezik vagy a felhasználó korlátozva van!"
            ];

        $_SESSION['logged-in-user'] = $user->id;

        header("Location: /page/my-my-profile");
        exit();
    }

    public function logout()
    {
        unset($_SESSION['logged-in-user']);

        header("Location: /");
        exit();
    }

    public function resetRequest(array $request)
    {
        $user = $this->app->userData->getUserByEmail($request['email']);
        $newCredentials = new UserCredentials();
        $newCredentials->user_id = $user->id;

        $credentials = $this->app->userData->insertUserCredentials($newCredentials);
        // TODO Email küldés

        return [
            "message" => "Jelszó aktiválás",
        ];
    }

    public function resetCheck(array $request)
    {
        $code = $request['code'];
        $credentials = $this->app->userData->getCredentialsByCode($code);

        if (!$credentials)
            return [
                "error" => "A kód nem létezik!"
            ];

        return [
            "message" => "A kód a User#{$credentials->user_id}-hoz tartozik!"
        ];
    }

    public function resetPassword(array $request)
    {
        $code = $request['code'];
        $credentials = $this->app->userData->getCredentialsByCode($code);

        if (!$credentials)
            return [
                "error" => "A kód nem létezik!"
            ];

        $user = $this->app->userData->getUserById($credentials->user_id);
        $this->app->userData->deleteCredentialsForUser($user);

        if ($request['password'] !== $request["passwordVerification"])
            return [
                "error" => "A jelszavak nem eggyeznek!"
            ];

        $userCredentials = new UserCredentials();
        $userCredentials->password = $request['password'];
        $userCredentials->user_id = $user->id;

        $credentials = $this->app->userData->insertUserCredentials($userCredentials);
        // TODO Email küldés

        return [
            "message" => "Felhasználó jelszava frissítve!",
        ];
    }
}