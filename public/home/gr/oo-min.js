(function(j){function d(h,o){for(var k in h){h.hasOwnProperty(k)&&o.call(h,k,h[k],h)}if(!{toString:0}.propertyIsEnumerable("toString")){for(var m="toString toLocaleString valueOf constructor isPrototypeOf hasOwnProperty propertyIsEnumerable".split(" "),n=0,l=m.length;n<l;n++){k=m[n],h.hasOwnProperty(k)&&o.call(h,k,h[k],h)}}}function f(h,k){d(k,function(l,m){h[l]=k[l]})}function e(h){return"[object Function]"==Object.prototype.toString.call(h)}function b(h,n){for(var k=h.length,l=Array(k),m=0;m<k;m++){l[m]=i.namespace(h[m])}k=new g;l.push(k);return n.apply(k,l)}function a(h,p,k){for(var n=h.length,o=Array(n),m=0;m<n;m++){o[m]=i.namespace(h[m])}h=new g;o.push(h);k=k.apply(h,o);var l;e(k)?(o=p.lastIndexOf("."),-1!==o?(h=p.substring(o+1),p=p.substring(0,o),l=i.namespace(p),l[h]=k):c[p]=k):(l=i.namespace(p),f(l,k));return l}var c={},i={create:function(h){function k(){}if(Object.create){return Object.create(h)}k.prototype=h;return new k},each:d,merge:f,_CANT_BE_BOTH_ABSTRACT_AND_FINAL_ERR:Error("Class can't be both abstract and final."),_CANT_INSTANTIATE_ABSTRACT_CLASS_ERR:Error("Can't instantiate abstract class."),_CANT_EXTEND_FINAL_CLASS_ERR:Error("Can't extend final class."),$class:function(h,p){p=p||{};var k=p.$abstract||p["abstract"],n=p.$final||p["final"],o=p.$extends||p["extends"];if(k&&n){throw i._CANT_BE_BOTH_ABSTRACT_AND_FINAL_ERR}var m;if(o){if(o.$final){throw i._CANT_EXTEND_FINAL_CLASS_ERR}m=k?function(){throw i._CANT_INSTANTIATE_ABSTRACT_CLASS_ERR}:h.hasOwnProperty("constructor")?p.chain?function(){o.apply(this,arguments);h.constructor.apply(this,arguments)}:h.constructor:function(){o.apply(this,arguments)};m.prototype=i.create(o.prototype);m.prototype.constructor=m;m.prototype.$super=o.prototype;m.$super=o;d(o,function(r,q){r&&"prototype"!==r&&"$"!==r.charAt(0)&&(m[r]=q)})}else{m=k?function(){throw _CANT_INSTANTIATE_ABSTRACT_CLASS_ERR}:h.hasOwnProperty("constructor")?h.constructor:function(){}}k&&(m.$abstract=!0);n&&(m.$final=!0);var l=m.prototype;d(h,function(r,q){"constructor"!==r&&(l[r]=q)});(k=p["static"]||p.$static||p.statics)&&f(m,k);return m},$import:function(h,p){for(var k=c,n=h.split("."),o=0,m=n.length;o<m-1;o++){var l=n[o];k.hasOwnProperty(l)||(k[l]={});k=k[l]}return k[n[n.length-1]]=p},namespace:function(h,p){for(var k=c,n=h.split("."),o=0,m=n.length;o<m;o++){var l=n[o];k.hasOwnProperty(l)||(k[l]={});k=k[l]}p&&(n=p.call(this,k,this))&&f(k,n);return k},proxy:function(h,l){var k=Array.prototype.slice.call(arguments,2);return function(){var m=Array.prototype.slice.call(arguments,0),m=k.concat(m);return h.apply(l,m)}}},g=function(){if(!(this instanceof arguments.callee)){var h=Array.prototype.slice.call(arguments,0),l=h[0],k=h[1],h=h[2];if(e(l)){return b([],l)}if("[object String]"==Object.prototype.toString.call(l)){if(e(k)){return a([],l,k)}}else{if("[object Array]"==Object.prototype.toString.call(l)){if(e(k)){return b(l,k)}if("[object String]"==Object.prototype.toString.call(k)&&e(h)){return a(l,k,h)}}}}};g.prototype=i;g.prototype.constructor=g;f(g,i);return this.OO=g})(this);