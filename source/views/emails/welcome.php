<?php /** @var App $app */ ?>
<?php /** @var User $user */ ?>
<?php /** @var Message $message */ ?>

<html lang="hu">
<head>
    <meta charset="UTF-8" />
    <title><?=$message->subject;?></title>
</head>
<body style="font-family: Arial, sans-serif; font-size: 12px;">

<h1>Helló!</h1>

<p>Köszöntünk a Skybull Kutyasétáltató oldalon!</p>
<p>A regisztrációd majdnem teljes, már csak aktiválni kell a fiókodat:</p>

<?php /** @var string $code */ ?>
<?php $verifyPage = "{$app->data->siteUrl}/page/email-verify"; ?>
<?php $verifyLink = "{$verifyPage}?code={$code}"; ?>

<a href="<?= $verifyLink; ?>" target="_blank"
   style="text-decoration: none; background: cornflowerblue; padding: 15px; margin: 15px 0; display: inline-block;">
    AKTIVÁLÁS
</a>

<p>vagy nyisd meg a <a href="<?= $verifyPage; ?>"><?= $verifyPage; ?></a> linket, és add meg a következö kódot:
<pre><?= $code; ?></pre>
</p>

<p>Üdvözlettel,<br>
    Skybull Kutyasétáltató Team</p>

</body>
</html>