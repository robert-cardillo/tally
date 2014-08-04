<?
/** force https on production **/
if (getenv('OPENSHIFT_GEAR_NAME')) {
    if ($_SERVER["HTTPS"] != "on") {
        header("Location: https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]);
        exit();
    }
}

session_start();

include('db.php');

/** filters **/
if (!isset($_POST['year']) || !isset($_POST['week'])) {
    $stmt = $db->prepare($sql_current_yearweek);
    $stmt->execute();
    $stmt->bind_result($yearweek);
    $stmt->fetch();
    $stmt->close();
    $year = intval(substr($yearweek, 0, 4));
    $week = intval(substr($yearweek, 4));
} else {
    $year = $_POST['year'];
    $week = $_POST['week'];
}

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
}

/** actions **/
switch (true) {
    case isset($_POST['login']):
        $stmt = $db->prepare($sql_get_user_id);
        $stmt->bind_param('i', $_POST['pin']);
        $stmt->execute();
        $stmt->bind_result($user_id);

        if ($stmt->fetch()) {
            $_SESSION['user_id'] = $user_id;
        } else {
            $login_error = true;
        }

        $stmt->close();
        break;

    case isset($_POST['onceki']):
    case isset($_POST['sonraki']):
        $interval = (isset($_POST['onceki'])) ? -7 : 7;
        $stmt = $db->prepare($sql_prevnext_yearweek);
        $stmt->bind_param('ssi', $year, $week, $interval);
        $stmt->execute();
        $stmt->bind_result($yearweek);
        $stmt->fetch();
        $stmt->close();
        $year = intval(substr($yearweek, 0, 4));
        $week = intval(substr($yearweek, 4));
        break;

    case isset($_POST['cikis']):
        unset($_SESSION);
        session_destroy();
        break;

    case isset($_POST['kaydet']):
        $stmt = $db->prepare($sql_clear_items);
        $stmt->bind_param('iii', $user_id, $year, $week);
        $stmt->execute();
        $stmt->close();

        $implode = implode(',', array_keys($_POST['items']));

        $stmt = $db->prepare($sql_mark_items);
        $stmt->bind_param('iiis', $user_id, $year, $week, $implode);
        $stmt->execute();
        $stmt->close();
        break;

    case isset($_POST['olustur']):
        $stmt = $db->prepare($sql_generate_current_week);
        $stmt->bind_param('iii', $year, $week, $user_id);
        $stmt->execute();
        echo $stmt->error;
        $stmt->close();
        break;
}

/** routing **/
if (!isset($_SESSION['user_id'])) {
    include('login.php');
} else {
    include('tally.php');
}