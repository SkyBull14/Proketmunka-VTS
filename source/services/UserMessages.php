<?php
require_once __DIR__ . '/../core/Service.php';


class UserMessages extends Service
{
    // region CREATE

    public function sendMessage(array $request)
    {
        $sender = $this->app->user;
        $recipient = $this->app->userData->getUserById($request['recipient_id']);

        if (!$recipient)
            return [
                "error" => "Üzenetet nem lehet elküldeni címzett nélkül!"
            ];

        $subject = $request['subject'] ?? '';
        if (!$subject)
            return [
                "error" => "Üzenetet nem lehet tárgy nélkül küldeni!"
            ];

        $body = $request['message'] ?? '';
        if (!$body)
            return [
                "error" => "Üzenetet nem lehet tartalom nélkül küldeni!"
            ];

        $message = new Message();
        $message->subject = $subject;
        $message->body = htmlspecialchars($body);
        $message->sender_id = $sender->id;
        $message->recipient_id = $recipient->id;

        $success = $this->send($message);
        if (!$success)
            return [
                "error" => "Hiba történt az üzenet küldése során!"
            ];

        return [
            "message" => "Üzenet elküldve!"
        ];
    }

    public const SYSTEM_TYPES = [
        "system_welcome" => "Üdvözlünk az oldalon!"
    ];

    public function sendSystemMessage(User $recipient, string $messageType, array $params = []): bool
    {
        $recipient->info = $this->app->userData->getUserInfo($recipient);
        $subject = self::SYSTEM_TYPES["system_$messageType"];

        $message = new Message();
        $message->sender_id = 1; // System
        $message->recipient_id = $recipient->id;
        $message->subject = $subject;

        $message->body = $this->app->parseView("emails/$messageType", array_merge($params, [
            "message" => $message,
            "user" => $recipient,
        ]));

        return $this->send($message);
    }

    protected function send(Message $message): bool
    {
        $messageInsert = <<<SQL
            INSERT INTO `messages` (sender_id, recipient_id, type, dog_id, walk_id, subject, body, sent)
            VALUES (:sender_id, :recipient_id, :type, :dog_id, :walk_id, :subject, :body, :sent)
        SQL;

        $statement = $this->db->prepare($messageInsert);
        $statement->bindParam(':sender_id', $message->sender_id, PDO::PARAM_INT);
        $statement->bindParam(':recipient_id', $message->recipient_id, PDO::PARAM_INT);
        $statement->bindParam(':type', $message->type);
        $statement->bindParam(':dog_id', $message->dog_id);
        $statement->bindParam(':walk_id', $message->walk_id);
        $statement->bindParam(':subject', $message->subject);

        $messageBody = htmlspecialchars($message->body);
        $statement->bindParam(':body', $messageBody);

        $utc = new DateTimeZone('UTC');
        $sentDatetime = $message->sent->setTimezone($utc)->format('Y-m-d H:i:s');
        $statement->bindParam(':sent', $sentDatetime);

        $dbSuccess = $statement->execute();
        error_log("Message saved to the Database: $dbSuccess");

        $recipient = $this->app->userData->getUserById($message->recipient_id);

        $opts = [
            "From: Skybull Kutyasétáltatás <dogwalker-app@skybull.dev>",
            "Reply-To: dogwalker-app@skybull.dev",
            "MIME-Version: 1.0",
            "Content-Type: text/html; charset=UTF-8",
        ];

        $mailSuccess = mail($recipient->email, $message->subject, $message->body, implode("\r\n", $opts));
        error_log("Message sent through Email: $mailSuccess");

        return $dbSuccess && $mailSuccess;
    }

    // endregion

    // region READ

    /**
     * @return Message[]
     * @throws Exception on Database Error
     */
    public function getMessagesByUser(User $user): array
    {
        $messagesSelect = <<<SQL
            SELECT * FROM messages WHERE recipient_id = :recipient_id;
        SQL;

        $statement = $this->db->prepare($messagesSelect);
        $statement->bindParam(':recipient_id', $user->id);

        return $this->fetchAll($statement, Message::class);
    }

    // region
}