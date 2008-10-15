core.core.routes();

var routes = Routes.create(local.$);

// This is necessary to run basic's _init.js. It doesn't matter that foo is nonexistent.
local.basic.foo;
