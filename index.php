<?
//ini_set('error_reporting', 0);

session_start();

include('db.php');

/** login **/
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
        break;

    case isset($_POST['sonraki']):
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
    include('tally.php');
}