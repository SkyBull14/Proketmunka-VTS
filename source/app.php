<?php
require __DIR__ . '/db_config.php';
require __DIR__ . '/app_config.php';
require __DIR__ . '/core/App.php';

// region Helpers

function debug(string $label, $var)
{
    $var = var_export($var, true);
    echo "<pre>$label: $var</pre>" . PHP_EOL;
}

// endregion

// region App

return new App([
    // Authentikáció
    "user/register" => [UserAuth::class, "register"],
    "user/activate" => [UserAuth::class, "activate"],
    "user/login" => [UserAuth::class, "login"],
    "user/logout" => [UserAuth::class, "logout"],
    "reset/request" => [UserAuth::class, "resetRequest"],
    "reset/check" => [UserAuth::class, "resetCheck"],
    "reset/password" => [UserAuth::class, "resetPassword"],

    // Profil adatok
    "user/profile/save" => [UserData::class, "updateProfile"],

    // Kutyák
    "dogs/add" => [DogData::class, "add"],
    "dogs/remove" => [DogData::class, "remove"],
    "dogs/update" => [DogData::class, "update"],

    // Üzenetek
    "user/message/send" => [UserMessages::class, "sendMessage"],

    // Sétáltatás Kérések
    "request/send" => [UserMessages::class, "sendRequest"],
    "request/accept" => [UserMessages::class, "acceptRequest"],

    // Séta adatok
    "walks/create" => [WalkerData::class, "create"],
    "walks/remove" => [WalkerData::class, "remove"],
    "walks/update" => [WalkerData::class, "update"],
    "walks/begin" => [WalkerData::class, "begin"],
    "walks/end" => [WalkerData::class, "end"],
    "walks/rate" => [WalkerData::class, "rate"],
]);

// endregion
