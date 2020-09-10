'use strict';

class Router {
    
    constructor(routes) {
        if (!routes) {
            throw 'error: routes param is mandatory';
        }
        this.routes = routes;
        this.rootElem = document.getElementById('app');
        this.init();
    }

    init() {
        var r = this.routes;
        (function(scope, r) { 
            window.addEventListener('hashchange', function (e) {
                scope.hasChanged(scope, r);
            });
        })(this, r);
        this.hasChanged(this, r);
    }

    hasChanged(scope, r){
        if (window.location.hash.length > 0) {
            for (var i = 0, length = r.length; i < length; i++) {
                var route = r[i];
                if(route.isActiveRoute(window.location.hash.substr(1))) {
                    scope.goToRoute(route.htmlName);
                }
            }
        } else {
            for (var i = 0, length = r.length; i < length; i++) {
                var route = r[i];
                if(route.default) {
                    scope.goToRoute(route.htmlName);
                }
            }
        }
    }

    goToRoute(htmlName) {
        fetch(htmlName).then( res => {
            return res.text();
        }).then(res => {
            this.rootElem.innerHTML = res;

            /** Load code hightlight */
            Prism.highlightAll();
        })
    }
};