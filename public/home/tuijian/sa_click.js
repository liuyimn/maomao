var sa;if(!sa){sa={}}if(!sa.click){sa.click={}}(function(){var w=/\.suning\.com/,v=document.location.hostname,l="//",c=j("sa_click"),s=m(true),b="|",d=location.href,p=o(r(d));function j(k){try{var D=document.scripts;var C="";for(var B=0;B<D.length;B++){C=D[B]?D[B].src:"";if(C.indexOf(k)>-1){return C}}return""}catch(A){}}function i(k,A){t(k,null,null,A)}function t(ak,J,I,D){try{if(D){d=D,p=o(r(d))}var V=ak.title?o(ak.title):"";if(V==""){var ai=ak.attributes.title;if(ai!=undefined&&ai!=null){V=ai.value?o(ai.value):""}}if(I!=undefined&&I!=null&&I!=""){var H=ak.attributes[I];if(H!=undefined&&H!=null){V=H.value?o(H.value):""}}var aj=ak.name?o(ak.name):"name undefined";if(aj=="name undefined"){var G=ak.attributes.name;if(G!=undefined&&G!=null){aj=G.value?o(G.value):"name undefined"}}if(J!=undefined&&J!=null&&J!=""){var ab=ak.attributes[J];if(ab!=undefined&&ab!=null){aj=ab.value?o(ab.value):J+" undefined"}}var X=ak.id?o(ak.id):"id undefined",ag=new Array(),U=(g(ak,ag),ag)?o(ag.join("").replace(/\s|\|/ig,"")):"text undefined",al=(al=document.getElementById("resourceType"))?al.value:"",ad=X+b+aj+b+U,k=(k=document.getElementById("errorCode"))?k.value:"",aa=l+s+"/ajaxClick.gif",M=x(),C="_snck";n(C,M,"/","","");var ah=e();var N=typeof sn=="object"?sn.cityId:"can not get cityId",A=M+b+ah+b+ad+b+p,Z=ak.href?ak.href:"",O=(Z?y(Z):"-"),P=document.getElementById("URLPattern"),ac=(P?P.value:"");var W="";var Y=q("logonStatus");if(Y!=undefined&&Y!=null){W=Y}var B="";var L=q("_snma");if(L!=undefined&&L!=null&&L.indexOf("|")>=0){try{B=L.split("|")[1]}catch(ae){}}var S="";var R=q("idsLoginUserIdLastTime");if(R!=undefined&&R!=null){S=R}var af="";var T=q("custno");if(T!=undefined&&T!=null){af=T}var E="";var K=q("_snmb");if(K!=undefined&&K!=null&&K.indexOf("|")>=0){try{E=K.split("|")[0]}catch(ae){}}var Q=document.getElementById("ssa-abtest");if(Q){Q=Q.value}var F=aa+"?_snmk="+A+"&_snme="+k+"&_type="+al+"&_cId="+N+"&_sid="+O+"&urlPattern="+ac+"&vid="+B+"&lu="+S+"&sid="+E+"&mid="+af+"&ls="+W+"&title="+V+"&ab="+Q;z(F)}catch(ae){}}function e(){if(!sa.pvId){sa.pvId=x()}return sa.pvId}function x(){try{var A=new Date(),k=Math.round(100000*Math.random()),C=A.getTime().toString().concat(k);return C}catch(B){}}function q(A){var k=document.cookie.split("; ");for(var B=0;B<k.length;B++){var C=k[B].split("=");if(C[0]==A){return unescape(C[1])}}}function z(k){var B="log_"+(new Date()).getTime();var A=window[B]=new Image();A.onload=(A.onerror=function(){window[B]=null});A.src=k+"&iId="+B;A=null}function m(k){if(k){return"click.suning.cn/sa"}else{if(c&&c.indexOf("pre")>-1){return"clickpre.suning.cn/sa"}return"clicksit.suning.cn/sa"}}function f(){return document.domain}function n(A,k,G,F,E){try{var D=A+"="+escape(k);if(F!=""){var C=new Date();C.setTime(C.getTime()+F);D+=";expires="+C.toGMTString()}if(G!=""){D+=";path="+G}var B=f();if(B.indexOf(".suning.com")!=-1){D+=";domain=.suning.com"}else{if(B.indexOf(".cnsuning.com")!=-1){D+=";domain=.cnsuning.com"}else{D+=";domain="+E}}document.cookie=D}catch(E){}}function y(A){var k="-";if(!a(A)){k=h(A,"tid","&")}return k}function r(k){try{if(k.length>301){k=k.substring(0,300)}while(k.indexOf(b)!=-1){k=k.replace(b,"--")}return k}catch(A){}}function g(C,A){try{if(C.nodeType==3){A.push(C.nodeValue)}else{if(C.nodeType==1){for(var k=C.firstChild;k!=null;k=k.nextSibling){g(k,A)}}}}catch(B){}}function o(k){return k!=null?encodeURIComponent(k):""}function h(B,A,E){try{var D="-",k;if(!a(B)&&!a(A)&&!a(E)){k=B.indexOf(A);if(k>-1){var C=B.indexOf(E,k);if(C<0){C=B.length}D=B.substring(k+A.length+1,C)}}return D}catch(C){}}function a(k){return(undefined==k||""==k||"-"==k)}var u=sa.click;u.sendDatasIndex=t;u.sendClickData=i})();