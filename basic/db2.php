<?

$t = $db["db2test"];
$t->drop();

$o = array( "name" => "eliot" , "a" => array( 1 , 2 , 3 ) , "b" => array( "x" => "y" , "y" => "x" ) );
$t->save( $o );
$v = $t->findOne();

?>
eliot = <?= $v["name"] ?><br>
Array = <?= $v["a"] ?><br>
1 = <?= $v["a"][0] ?><br>
3 = <?= $v["a"][2] ?><br>
<?= $o["b"] ?> = <?= $v["b"] ?> <br>
<?= $o["b"]["x"] ?> = <?= $v["b"]["x"] ?> <br>
<?= $o["b"]["y"] ?> = <?= $v["b"]["y"] ?> <br>


<br><hr>
<a href="/req1.php?a=123">NEXT</a> 