-- Top List
SELECT u.*
     , (SELECT COUNT(*) FROM walks WHERE walker_id = u.id)               as `walk_count`
     , (SELECT COUNT(DISTINCT dog_id) FROM walks WHERE walker_id = u.id) as `dog_count`

FROM users u
WHERE u.role = 'walker'
  AND u.enabled = 1
ORDER BY u.rating DESC
LIMIT 10 OFFSET 0
;

-- Most Active List
-- Top List
SELECT u.*
     , (SELECT COUNT(*) FROM walks WHERE walker_id = u.id)               as `walk_count`
     , (SELECT COUNT(DISTINCT dog_id) FROM walks WHERE walker_id = u.id) as `dog_count`

FROM users u
WHERE u.role = 'walker'
  AND u.enabled = 1
ORDER BY walk_count DESC
;


-- Shedule List
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
;