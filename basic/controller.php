<?

echo $_10gen["request"]->getURI() . "<br>";

$val = $db["things"]->findOne( array( "name" => "basic" ) );

if ( $val ){
  $val["num"] = $val["num"] + 1;
}
else {
  $val = array( "name" => "basic" , "num" => 1 );
}
    
$db["things"]->save( $val );

echo "name: <b>" . $val["name"] . "</b><br>";
echo "count: <b>" . $val["num"] . "</b><br>";

?>

<br><hr>
<a href="require1.php">NEXT</a>
