var tc;
window.onload=function(){
 var o=document.getElementById('wwwxkercom');hscroll(o);
 window.setInterval(function(){window.clearTimeout(tc);o.firstChild.style.marginLeft='0px';scrollup(o,20,0);},4000);
}
function scrollup(o,d,c){
 if(d==c){
  var t=o.firstChild.cloneNode(true);
  o.removeChild(o.firstChild);o.appendChild(t);
  t.style.marginTop=o.firstChild.style.marginTop='0px';
  hscroll(o);
 }
 else{
  ch=false;var s=3,c=c+s,l=(c>=d?c-d:0);
  o.firstChild.style.marginTop=-c+l+'px';
  window.setTimeout(function(){scrollup(o,d,c-l)},50);
 }
}
function hscroll(o){
 var w1=o.firstChild.offsetWidth,w2=o.offsetWidth;
 if(w1<=w2)return;
 tc=window.setTimeout(function(){hs(o,w1-w2,0,w1-w2)},3500);
}
function hs(o,d,c,p){
 c++;var t=(c>0?-c:c);o.firstChild.style.marginLeft=t+'px';
 if(c==d){if(d==0){tc=window.setTimeout(function(){hs(o,p,0,p)},2500);}else tc=window.setTimeout(function(){hs(o,0,-p,p)},3500);}
 else tc=window.setTimeout(function(){hs(o,d,c,p)},5);
}