<?php
require_once __DIR__ . '/../core/Service.php';


class WalkerData extends Service
{
    public function getTopList(int $limit = 10, int $page = 1): array
    {
        $skip = $page - 1;
        $query = <<<SQL
            SELECT u.*
                 , ud.first_name
                 , (SELECT COUNT(*) FROM walks WHERE walker_id = u.id AND session_end IS NOT NULL) as `walk_done_count`
                 , (SELECT COUNT(*) FROM walks WHERE walker_id = u.id) as `walk_count`
                 , (SELECT COUNT(DISTINCT dog_id) FROM walks WHERE walker_id = u.id) as `dog_count`
            
            FROM users u
            LEFT JOIN user_data ud on u.id = ud.user_id
            WHERE u.role = 'walker'
              AND u.enabled = 1
            ORDER BY u.rating DESC
            LIMIT $limit OFFSET $skip;
        SQL;

        $statement = $this->db->prepare($query);

        return $this->fetchAll($statement);
    }

    public function getMostActiveList(int $limit = 10, int $page = 1): array
    {
        $skip = $page - 1;
        $query = <<<SQL
            SELECT u.*
                 , ud.first_name
                 , (SELECT COUNT(*) FROM walks WHERE walker_id = u.id) as `walk_count`
                 , (SELECT COUNT(DISTINCT dog_id) FROM walks WHERE walker_id = u.id) as `dog_count`
            
            FROM users u
            LEFT JOIN user_data ud on u.id = ud.user_id
            WHERE u.role = 'walker'
              AND u.enabled = 1
            ORDER BY walk_count DESC
            LIMIT $limit OFFSET $skip;
        SQL;

        $statement = $this->db->prepare($query);

        return $this->fetchAll($statement);
    }

    public function getScheduleList(int $limit = 10, int $page = 1): array
    {
        $skip = $page - 1;
        $query = <<<SQL
            SELECT w.*
                 , u.rating
                 , ud.first_name
            FROM walks w
            JOIN users u on w.walker_id = u.id
            LEFT JOIN user_data ud on u.id = ud.user_id
            WHERE u.role = 'walker'
              AND u.enabled = 1
              AND w.schedule_end >= (NOW() - INTERVAL 30 MINUTE)
            ORDER BY w.schedule_begin, w.session_begin
            LIMIT $limit OFFSET $skip;
        SQL;

        $statement = $this->db->prepare($query);

        return $this->fetchAll($statement);
    }
}