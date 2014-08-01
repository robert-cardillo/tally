<?
include('header.php');

$daily = 'daily';
$weekly = 'weekly';

$stmt = $db->prepare($sql_get_items);
$stmt->bind_param('iiis', $user_id, $year, $week, $daily);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($item_id, $day_id, $done);
?>
<form action="" method="post">
<input type="hidden" name="year" value="<?= $year ?>">
<input type="hidden" name="week" value="<?= $week ?>">
<table width="100%" border="1">
    <tr>
        <td align="left"><input type="submit" name="cikis" value="&#10006;"></td>
        <td align="center"><input type="submit" name="onceki" value="&#9664;"></td>
        <td align="center"><?= "$year, $week. Hafta" ?></td>
        <td align="center"><input type="submit" name="sonraki" value="&#9654;"></td>
        <td align="right"><input type="submit" name="kaydet" value="&#10004;"></td>
    </tr>
</table>
<br/>
<table width="100%" border="1">
    <thead>
    <tr align="center">
        <th>Günlük</th>
        <? for ($i = 0; $i < 7; $i++) { ?>
            <th><?= $days[$i] ?></th>
        <? } ?>
    </tr>
    </thead>
    <tbody>
    <? for ($i = 0; $i < $stmt->num_rows / 7; $i++) { ?>
    <tr align="center">
        <? for ($j = 0; $j < 7; $j++) { ?>
            <? $stmt->fetch(); ?>
            <? if ($j == 0) { ?>
            <td align="left"><?= $items[$item_id] ?></td>
            <? } ?>
            <td>
                <input type="checkbox" name="items[<?= $item_id . '_' . $day_id ?>]"<?= ($done > 0) ? ' checked' : '' ?>>
            </td>
        <? } ?>
    </tr>
    <? } ?>
    </tbody>
</table>
<br/>
<?
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
    <? for ($i = 0; $i < $stmt->num_rows; $i++) { ?>
    <tr align="center">
        <? $stmt->fetch(); ?>
        <td align="left"><?= $items[$item_id] ?></td>
        <td>
            <input type="checkbox" name="items[<?= $item_id . '_' ?>]"<?= ($done > 0) ? ' checked' : '' ?>>
        </td>
    </tr>
    <? } ?>
    </tbody>
</table>
</form>
<?
$stmt->close();

include('footer.php');
?>