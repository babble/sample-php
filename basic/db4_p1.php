<?
    $t = $db["foo"];
    $t->drop();
    
    $t->save(array("one" =>"foo", "two"=>"bar"));
    
    header("Location: db4_p2.php");
?>
