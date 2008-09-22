<?

$t = $db["db3test"];
$t->drop();

$o = array( "name" => "eliot" , "email" => "eliot@eliot.com" );
$t->save( $o );

$o = array( "name" => "bob" , "email" => "bob@bob.com" );
$t->save( $o );


$all = $t->find()->toArray();
?>

<table border="1">
<? foreach( $all as $p ) { ?>a
  <tr>
     <td><?= $p["name"] ?></td>
     <td><?= $p["email"] ?></td>
     <td><?= $p["_id"] ?></td>
                           
  </tr>
<? } ?>	  

<br><hr>
<a href="req1.php?a=123">NEXT</a> 