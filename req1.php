123 = <?= $_GET["a" ] ?><br>
"" = "<?= $_POST["a" ] ?>"<br>

<br><hr>
<form action="/req2.php" method="POST">
  <input type="hidden" name="a" value="123">
  <input type="submit" value="NEXT">
</form>
