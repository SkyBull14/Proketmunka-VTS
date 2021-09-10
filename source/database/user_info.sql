SELECT * FROM users;
SELECT * FROM user_credentials;

SELECT
m.*

FROM messages m
JOIN users r on r.id = m.recipient_id
LEFT JOIN users s on s.id = m.sender_id