<?
include('header.php');
?>
<div style="width: 100vw; height: 100vh; text-align: center; display: table-cell; vertical-align: middle">
    <form action="" method="post">
        <input type="password" size="5" name="pin" value=""<?=isset($login_error)?(' style="border-color: red;"'):('')?>>
        <input type="submit" name="login" value="Giriş">
    </form>
</div>
<?
include('footer.php');
?>