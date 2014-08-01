<?
if (getenv('OPENSHIFT_GEAR_NAME')) {
    define('DB_HOST', getenv('OPENSHIFT_MYSQL_DB_HOST'));
    define('DB_PORT', getenv('OPENSHIFT_MYSQL_DB_PORT'));
    define('DB_USER', getenv('OPENSHIFT_MYSQL_DB_USERNAME'));
    define('DB_PASS', getenv('OPENSHIFT_MYSQL_DB_PASSWORD'));
    define('DB_NAME', getenv('OPENSHIFT_GEAR_NAME'));
} else {
    define('DB_HOST', 'localhost');
    define('DB_PORT', 3306);
    define('DB_USER', 'root');
    define('DB_PASS', '');
    define('DB_NAME', 'tally');
}

$db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if ($db->connect_error) {
    die('Connect Error (' . $db->connect_errno . ') ' . $db->connect_error);
}

$db->query("SET NAMES 'utf8' COLLATE 'utf8_general_ci'");

$db->query("SET timezone = '+03:00'");

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

$sql_current_yearweek =
"SELECT YEARWEEK(CURDATE(), 1)
FROM DUAL";

$sql_prevnext_yearweek =
"SELECT YEARWEEK(ADDDATE(STR_TO_DATE(CONCAT_WS('-', ?, ?, '1'), '%x-%v-%w'), INTERVAL ? DAY), 1)
FROM DUAL";

$sql_generate_current_week =
"INSERT INTO tally (user_id, item_id, year, week, day, done)
SELECT
 u.id user_id,
 i.id item_id,
 YEAR(ADDDATE(CURDATE(), INTERVAL -WEEKDAY(CURDATE()) DAY)) year,
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