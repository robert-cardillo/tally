<?
include('header.php');
?>
<div style="width: 100vw; height: 100vh; text-align: center; display: table-cell; vertical-align: middle">
    <form action="" method="post">
        <input type="number" style="width: 6ex;" name="pin"
               value="" <?= isset($login_error) ? ('style="border-color: red;"') : ('') ?>
               onfocus="this.type='password';this.focus()" onblur="this.type='number'">
    <input type="submit" name="login" value="Giriş">
    </form>
</div>
<?
include('footer.php');
?>