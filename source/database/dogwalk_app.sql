-- reset

SET FOREIGN_KEY_CHECKS = 0;

DROP TABLE IF EXISTS `users`;
DROP TABLE IF EXISTS `user_data`;
DROP TABLE IF EXISTS `user_credentials`;
DROP TABLE IF EXISTS `messages`;
DROP TABLE IF EXISTS `dogs`;
DROP TABLE IF EXISTS `walks`;

SET FOREIGN_KEY_CHECKS = 1;


-- users

CREATE TABLE `users`
(
    `id`      int(11) UNSIGNED                                    NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `email`   varchar(100)                                        NOT NULL UNIQUE,
    `role`    enum ('user', 'owner', 'walker', 'admin', 'system') NOT NULL DEFAULT 'user',
    `rating`  double(6, 4)                                        NULL,
    `enabled` smallint(1)                                         NOT NULL DEFAULT '0'
)
    ENGINE = InnoDB
    DEFAULT CHARSET = utf8;

CREATE TABLE `user_credentials`
(
    `user_id`  int(11) UNSIGNED NOT NULL,
    `password` varchar(60)      NULL,
    `code`     varchar(100)     NULL UNIQUE,

    CONSTRAINT `user_credential`
        FOREIGN KEY (user_id) REFERENCES users (id)
            ON DELETE CASCADE ON UPDATE CASCADE
)
    ENGINE = InnoDB
    DEFAULT CHARSET = utf8;

CREATE TABLE `user_data`
(
    `user_id`     int(11) UNSIGNED NOT NULL UNIQUE,
    `first_name`  varchar(20)      NOT NULL,
    `last_name`   varchar(25)      NULL,
    `description` text             NULL,

    CONSTRAINT `user_data`
        FOREIGN KEY (user_id) REFERENCES users (id)
            ON DELETE CASCADE ON UPDATE CASCADE
)
    ENGINE = InnoDB
    DEFAULT CHARSET = utf8;

INSERT INTO `users` (email, role)
VALUES ('xskybullx+system@gmail.com', 'system')
     , ('xskybullx+admin@gmail.com', 'admin')
     , ('xskybullx+user1@gmail.com', 'user')
     , ('xskybullx+user2@gmail.com', 'user')
     , ('xskybullx+user3@gmail.com', 'user')
     , ('xskybullx+owner1@gmail.com', 'owner')
     , ('xskybullx+owner2@gmail.com', 'owner')
     , ('xskybullx+owner3@gmail.com', 'owner')
     , ('xskybullx+walker1@gmail.com', 'walker')
     , ('xskybullx+walker2@gmail.com', 'walker')
     , ('xskybullx+walker3@gmail.com', 'walker')
;


UPDATE `users` SET `enabled` = 1 WHERE `id` IN(6,9);



INSERT INTO `user_data` (user_id, first_name)
VALUES (1, 'system')
     , (2, 'admin')
     , (3, 'user1')
     , (4, 'user2')
     , (5, 'user3')
     , (6, 'owner1')
     , (7, 'owner2')
     , (8, 'owner3')
     , (9, 'walker1')
     , (10, 'walker2')
     , (11, 'walker3')
;

-- my-dogs

CREATE TABLE `dogs`
(
    `id`          int(11) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `owner_id`    int(11) UNSIGNED NOT NULL,
    `name`        varchar(100)     NOT NULL,
    `description` text             NULL,
    `species`     varchar(100)     NULL,
    `gender`      varchar(10)      NULL,
    `age`         int(4) UNSIGNED  NULL,
    `rating`      double(6, 4)     NULL,
    `enabled`     smallint(1)      NOT NULL DEFAULT '1',

    CONSTRAINT `dog_user`
        FOREIGN KEY (owner_id) REFERENCES users (id)
            ON DELETE CASCADE
            ON UPDATE NO ACTION
)
    ENGINE = InnoDB
    DEFAULT CHARSET = utf8;

INSERT INTO `dogs` (owner_id, name)
VALUES (6, 'Doggo1')
     , (7, 'Doggo2')
     , (7, 'Doggo3')
     , (8, 'Doggo4')
     , (8, 'Doggo5')
     , (8, 'Doggo6')
;

-- my-walks

CREATE TABLE `walks`
(
    `id`             int(11) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `owner_id`       int(11) UNSIGNED NULL,
    `walker_id`      int(11) UNSIGNED NOT NULL,
    `dog_id`         int(11) UNSIGNED NULL,

    `schedule_begin` datetime         not null,
    `schedule_end`   datetime         null,

    `session_begin`  datetime         null,
    `session_end`    datetime         null,

    `walk_rating`    double(6, 4)     NULL,
    `dog_rating`     double(6, 4)     NULL,

    `diary`          TEXT,

    CONSTRAINT `walk_owner`
        FOREIGN KEY (owner_id) REFERENCES users (id)
            ON DELETE SET NULL
            ON UPDATE NO ACTION,

    CONSTRAINT `walk_walker`
        FOREIGN KEY (walker_id) REFERENCES users (id)
            ON DELETE RESTRICT
            ON UPDATE NO ACTION,

    CONSTRAINT `walk_dog`
        FOREIGN KEY (dog_id) REFERENCES dogs (id)
            ON DELETE RESTRICT
            ON UPDATE NO ACTION
)
    ENGINE = InnoDB
    DEFAULT CHARSET = utf8;

INSERT INTO `walks` (owner_id, walker_id, dog_id, schedule_begin, schedule_end, session_begin, session_end)
VALUES (6, 9, 1, '2021-09-01 14:00:00', '2021-09-01 15:30:00', '2021-09-01 14:04:30', '2021-09-01 15:38:10');

INSERT INTO `walks` (owner_id, walker_id, dog_id, schedule_begin, schedule_end)
VALUES (6, 9, 1, '2021-09-13 14:00:00', '2021-09-13 15:30:00');

INSERT INTO `walks` (owner_id, walker_id, dog_id, schedule_begin, schedule_end)
VALUES (6, 9, 1, '2021-09-14 14:00:00', '2021-09-14 15:30:00');

INSERT INTO `walks` (owner_id, walker_id, dog_id, schedule_begin, schedule_end)
VALUES (6, 9, 1, '2021-09-15 14:00:00', '2021-09-15 15:30:00');

INSERT INTO `walks` (owner_id, walker_id, dog_id, schedule_begin, schedule_end)
VALUES (6, 9, 1, '2021-09-16 14:00:00', '2021-09-16 15:30:00');

INSERT INTO `walks` (owner_id, walker_id, dog_id, schedule_begin, schedule_end)
VALUES (6, 9, 1, '2021-09-17 14:00:00', '2021-09-17 15:30:00');


INSERT INTO `walks` (owner_id, walker_id, dog_id, schedule_begin, schedule_end)
VALUES (6, 9, 1, '2021-09-20 14:00:00', '2021-09-20 15:30:00');

INSERT INTO `walks` (owner_id, walker_id, dog_id, schedule_begin, schedule_end)
VALUES (6, 9, 1, '2021-09-21 14:00:00', '2021-09-21 15:30:00');

INSERT INTO `walks` (owner_id, walker_id, dog_id, schedule_begin, schedule_end)
VALUES (6, 9, 1, '2021-09-22 14:00:00', '2021-09-22 15:30:00');

INSERT INTO `walks` (owner_id, walker_id, dog_id, schedule_begin, schedule_end)
VALUES (6, 9, 1, '2021-09-23 14:00:00', '2021-09-23 15:30:00');

INSERT INTO `walks` (owner_id, walker_id, dog_id, schedule_begin, schedule_end)
VALUES (6, 9, 1, '2021-09-24 14:00:00', '2021-09-24 15:30:00');

-- Messages

CREATE TABLE `messages`
(
    `id`           int(11) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `sender_id`    int(11) UNSIGNED NULL,
    `recipient_id` int(11) UNSIGNED NOT NULL,
    `type`         varchar(30)      NOT NULL,
    `dog_id`       int(11) UNSIGNED NULL,
    `walk_id`      int(11) UNSIGNED NULL,

    `sent`         datetime         not null,
    `read`         datetime         null,

    `subject`      varchar(200),
    `body`         TEXT,

    CONSTRAINT `message_sender`
        FOREIGN KEY (sender_id) REFERENCES users (id)
            ON DELETE SET NULL
            ON UPDATE NO ACTION,

    CONSTRAINT `message_recipient`
        FOREIGN KEY (recipient_id) REFERENCES users (id)
            ON DELETE CASCADE
            ON UPDATE NO ACTION,

    CONSTRAINT `message_dog`
        FOREIGN KEY (dog_id) REFERENCES dogs (id)
            ON DELETE NO ACTION
            ON UPDATE NO ACTION,

    CONSTRAINT `message_walk`
        FOREIGN KEY (walk_id) REFERENCES walks (id)
            ON DELETE NO ACTION
            ON UPDATE NO ACTION
)
    ENGINE = InnoDB
    DEFAULT CHARSET = utf8;