<?
    $_10gen["local"]["basic"]->jsobject_iteration_helper();

    test_both($_10gen["arr"], array(3,2,1) );
    test_both($_10gen["obj"], array("key1"=>"val1", "key2"=>"val2", "key3"=>"val3") );
    
    test_both($_10gen["objWithProto"], array("key1"=>"val1", "key2"=>"val2", "protoKey1"=>"protoVal1", "protoKey2"=>"protoVal2") );
    
    $arr[0]=5;
    test_foreach($arr, array(5,2,1) );
    
    $arr[]=6;
    test_foreach($arr, array(5,2,1,6) );
    
    $obj[] = "moo";
    test_foreach($obj, array("key1"=>"val1", "key2"=>"val2", "key3"=>"val3", 0=>"moo") );
    
    $obj[0] = "baa";
    test_foreach($obj, array("key1"=>"val1", "key2"=>"val2", "key3"=>"val3", 0=>"baa") );
    
    
    
    function test_foreach($actual, $expected) {
        foreach($actual as $a_value) {
            echo "(".$a_value.") = (".current($expected).")<br/>\n";
            next($expected);
        }
        while(current($expected)) {
            echo "(?????) = ".current($expected).")<br/>\n";
            next($expected);
        }
    }
    function test_foreach_with_key($actual, $expected) {
        foreach($actual as $a_key=>$a_value) {
            echo "(".$a_key."=>".$a_value.") = (".key($expected)."=>".current($expected).")<br/>\n";
            next($expected);
        }
        while(current($expected)) {
            echo "(?????) = (".key($expected)."=>".current($expected).")<br/>\n";
            next($expected);
        }
    }
    function test_both($actual, $expected) {
        test_foreach($actual, $expected);
        reset($expected);
        test_foreach_with_key($actual, $expected);
    }
?>