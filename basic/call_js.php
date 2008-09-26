<?
    $local["basic"]->call_js_helper();
    
    //reload the page to make sure the reloading the page doesn't mess with the Request scope
    if( ! $_GET["reloaded"]) {
        header("Location: call_js.php?reloaded=true");
        return;
    }
?>

<html>
<body>

helloFromJS=<?= $_10gen["globalJS"] ?></br>
helloFromJS=<?= $globalJS ?></br>
helloFromJS=<? global $globalJS; echo $globalJS ?></br>


</body>
</html>