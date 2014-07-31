<?
//ini_set('error_reporting', 0);

session_start();

include('db.php');

/** filters **/
var_dump($_POST);

if(!isset($_POST['year']) || !isset($_POST['week'])){
    $stmt = $db->prepare($sql_current_yearweek);
    $stmt->execute();
    $stmt->bind_result($yearweek);
    $stmt->fetch();
    $stmt->close();
    $year = intval(substr($yearweek, 0, 4));
    $week = intval(substr($yearweek, 4));
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
        $stmt->bind_param('ssi', $_POST['year'], $_POST['week'], $interval);
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
}

/** session **/
if (!isset($_SESSION['user_id'])) {
    include('login.php');
} else {
    $user_id = $_SESSION['user_id'];
    include('tally.php');
}