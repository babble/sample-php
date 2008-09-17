core.core.routes();

var routes = Routes.create();

routes.add("/", "controller", {extra: {name: ""}});
routes.add(/^\/(\w+)$/, "controller", {extra: {name: "$1"}});
