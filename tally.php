<?php
include('header.php');

var_dump($_POST);

$user_id = $_SESSION['user_id'];
$year = 2014;
$week = 31;
$daily = 'daily';
$weekly = 'weekly';

$stmt = $db->prepare($sql_get_items);
$stmt->bind_param('iiis', $user_id, $year, $week, $daily);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($item_id, $day_id, $done);
?>
<form action="" method="post">
    <input type="hidden" name="year" value="<?php echo $year; ?>">
    <input type="hidden" name="week" value="<?php echo $week; ?>">
    <table width="100%" cellpadding="0" cellspacing="0" border="0">
        <tr>
            <td align="left"><input type="submit" name="cikis" value="&#10006;"></td>
            <td align="center"><input type="submit" name="onceki" value="&#9664;"></td>
            <td align="center">2014, 31. Hafta</td>
            <td align="center"><input type="submit" name="sonraki" value="&#9654;"></td>
            <td align="right"><input type="submit" name="kaydet" value="&#10004;"></td>
        </tr>
    </table>
    <br/>
    <table width="100%" border="1">
        <thead>
        <tr align="center">
            <th>Günlük</th>
            <?php for ($i = 0; $i < 7; $i++) { ?>
                <th><?php echo $days[$i]; ?></th>
            <?php } ?>
        </tr>
        </thead>
        <tbody>
        <?php for ($i = 0; $i < $stmt->num_rows / 7; $i++) { ?>
        <tr align="center">
            <?php $stmt->fetch(); ?>
            <td align="left"><?php echo $items[$item_id]; ?></td>
            <td>
                <input type="checkbox" name="<?php echo $item_id . '_' . $day_id; ?>"<?php echo ($done > 0) ? ' checked' : ''; ?>>
            </td>
            <?php for ($j = 1; $j < 7; $j++) { ?>
            <?php $stmt->fetch(); ?>
            <td>
                <input type="checkbox" name="<?php echo $item_id . '_' . $day_id; ?>"<?php echo ($done > 0) ? ' checked' : ''; ?>>
            </td>
            <?php } ?>
        </tr>
        <?php } ?>
        </tbody>
    </table>
    <br/>
    <?php
    $stmt->close();

    $stmt = $db->prepare($sql_get_items);
    $stmt->bind_param('iiis', $user_id, $year, $week, $weekly);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($item_id, $day_id, $done);
    ?>
    <table width="100%" border="1">
        <thead>
        <tr align="center">
            <th>Haftalık</th>
            <th>Tamamlandı</th>
        </tr>
        </thead>
        <tbody>
        <?php for ($i = 0; $i < $stmt->num_rows; $i++) { ?>
        <tr align="center">
            <?php $stmt->fetch(); ?>
            <td align="left"><?php echo $items[$item_id]; ?></td>
            <td>
                <input type="checkbox" name="<?php echo $item_id . '_' . $day_id; ?>"<?php echo ($done > 0) ? ' checked' : ''; ?>>
            </td>
        </tr>
        <?php } ?>
        </tbody>
    </table>
</form>
<?php
$stmt->close();

include('footer.php');
?>