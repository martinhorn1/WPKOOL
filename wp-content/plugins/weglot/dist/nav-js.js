!function(e){var t={};function n(i){if(t[i])return t[i].exports;var r=t[i]={i:i,l:!1,exports:{}};return e[i].call(r.exports,r,r.exports,n),r.l=!0,r.exports}n.m=e,n.c=t,n.d=function(e,t,i){n.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:i})},n.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},n.t=function(e,t){if(1&t&&(e=n(e)),8&t)return e;if(4&t&&"object"==typeof e&&e&&e.__esModule)return e;var i=Object.create(null);if(n.r(i),Object.defineProperty(i,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var r in e)n.d(i,r,function(t){return e[t]}.bind(null,r));return i},n.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return n.d(t,"a",t),t},n.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},n.p="/dist/",n(n.s=4)}({4:function(e,t){jQuery(document).ready(function(e){e("#update-nav-menu").bind("click",function(t){t.target&&t.target.className&&-1!=t.target.className.indexOf("item-edit")&&e("input[value='#weglot_switcher'][type=text]").parents(".menu-item-settings").each(function(){const t=e(this).attr("id").substring(19);e(this).children("p:not( .field-move )").remove(),e(this).append(e("<input>").attr({type:"hidden",id:"edit-menu-item-title-"+t,name:"menu-item-title["+t+"]",value:weglot_data.title})),e(this).append(e("<input>").attr({type:"hidden",id:"edit-menu-item-url-"+t,name:"menu-item-url["+t+"]",value:"#weglot_switcher"})),e(this).append(e("<input>").attr({type:"hidden",id:"edit-menu-item-pll-detect-"+t,name:"menu-item-pll-detect["+t+"]",value:1})),e.each(weglot_data.list_options,(n,i)=>{const r=e("<p>").attr("class","description"),u=e("<label>").attr("for",`edit-menu-item-${i.key}-${t}`).text(` ${i.title}`);e(this).prepend(r),r.append(u);const o=e("<input>").attr({type:"checkbox",id:`edit-menu-item-${i.key}-${t}`,name:`menu-item-${i.key}[${t}]`,value:1});1===weglot_data.options[i.key]&&o.prop("checked",!0),u.prepend(o)})})})})}});