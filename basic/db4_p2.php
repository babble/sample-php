<html>
<body>
<?
    $t = $db["foo"];
//    $t->drop();
//    $t->save(array("one" =>"foo", "two"=>"bar"));
    $all = $t->find()->toArray();
    foreach($all as $moo) {
        echo "one: " . $moo["one"] . "<br/>\n";
        echo "two: " . $moo["two"] . "<br/>\n";
    }
?>
</body>
</html>