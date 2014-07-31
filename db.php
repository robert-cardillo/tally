<?php
DEFINE('DB_HOST', 'localhost');
DEFINE('DB_USER', 'root');
DEFINE('DB_PASSWORD', '');
DEFINE('DB_DATABASE', 'tally');
DEFINE('DB_PORT', 3306);

$db = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

if ($db->connect_error) {
    die('Connect Error (' . $db->connect_errno . ') ' . $db->connect_error);
}

$db->query("SET NAMES 'utf8' COLLATE 'utf8_general_ci'");

/** days **/
$days = array();
$stmt = $db->prepare('SELECT id, name FROM days');
$stmt->execute();
$stmt->bind_result($id, $name);
while ($stmt->fetch()) {
    $days[$id] = $name;
}
$stmt->close();

/** items **/
$items = array();
$stmt = $db->prepare('SELECT id, name FROM items');
$stmt->execute();
$stmt->bind_result($id, $name);
while ($stmt->fetch()) {
    $items[$id] = $name;
}
$stmt->close();

/** sql **/
$sql_get_user_id =
'SELECT id
FROM users
WHERE pin = ?';

$sql_get_items =
'SELECT
  i.id item_id,
  d.id day_id,
  t.done
FROM tally t
LEFT JOIN users u ON (t.user_id = u.id)
LEFT JOIN items i ON (t.item_id = i.id)
LEFT JOIN days d ON (t. DAY = d.id)
WHERE
  u.id = ?
  AND t.year = ?
  AND t.week = ?
  AND i.period = ?
ORDER BY
  i.order, d.id';

$sql_generate_current_week =
"INSERT INTO tally (user_id, item_id, year, week, day, done)
SELECT
 u.id user_id,
 i.id item_id,
 YEAR(week_monday(CURDATE())) year,
 WEEKOFYEAR(week_monday(CURDATE())) week,
 IF(i.period='daily', d.id, NULL) day,
 0 done
FROM
 users u, items i, days d
WHERE
 (i.period = 'daily' OR (i.period = 'weekly' AND d.id = 0 ))
 AND u.id = ?
ORDER BY
 i.period, i.order, d.id";