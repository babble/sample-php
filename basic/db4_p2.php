<html>
<body>
<?
    $t = $db["foo"];
    $all = $t->find()->toArray();
    foreach($all as $moo) {
        echo "one: " . $moo["one"] . "<br/>\n";
        echo "two: " . $moo["two"] . "<br/>\n";
    }
?>
</body>
</html>