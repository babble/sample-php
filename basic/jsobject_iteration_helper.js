arr = [ 3,2,1 ];

obj = {
    key1: "val1",
    key2: "val2",
    key3: "val3"
};

function Clazz() {
    this.key1 = "val1";
    this.key2 = "val2";
}
Clazz.prototype = {
        protoKey1: "protoVal1",
        protoKey2: "protoVal2",
};

objWithProto = new Clazz();
