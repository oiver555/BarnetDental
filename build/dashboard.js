(()=>{var e={411:()=>{document.addEventListener("DOMContentLoaded",(()=>{const e=document.querySelector(".acf-fields"),t=e.children;let n,o,a,r,l,c,s,d,u,i,p,y;const g=()=>{c=document.querySelector(`#acf-${u}`).value,a=document.querySelector(`#acf-${i}`).value,r=document.querySelector(`#acf-${p}`).value,l=document.querySelector(`#acf-${y}`).value},h=()=>{for(let t=0;t<e.children.length;t++){const v=e.children[t];"Name"===v.textContent.replace(/\s\s\s*/g,"")?console.log("Name"):"Zip"===v.textContent.replace(/\s\s\s*/g,"")?(i=v.dataset.key,v.querySelector("input").addEventListener("change",(e=>{a=e.target.value})),v.querySelector("input").addEventListener("blur",(e=>{g(),a&&"None"!==r&&r&&l&&c?f():console.log("All Data not Filled yet")}))):v.textContent.replace(/\s\s\s*/g,"").includes("Street Address")?(u=v.dataset.key,v.querySelector("input").addEventListener("change",(e=>{c=e.target.value})),v.querySelector("input").addEventListener("blur",(e=>{g(),a&&"None"!==r&&l&&c?f():(h(),console.log("All Data not Filled yet",a,r,l,c))}))):"City"===v.textContent.replace(/\s\s\s*/g,"")?(y=v.dataset.key,v.querySelector("input").addEventListener("change",(e=>{l=e.target.value})),v.querySelector("input").addEventListener("blur",(e=>{g(),a&&"None"!==r&&l&&c?f():console.log("All Data not Filled yet")}))):v.textContent.replace(/\s\s\s*/g,"").includes("State")?(p=v.dataset.key,v.querySelector("select").addEventListener("change",(e=>{r=e.target.value})),v.querySelector("select").addEventListener("blur",(e=>{g(),a&&"None"!==r&&l&&c?f():console.log("All Data not Filled yet")}))):"lattitude"===v.textContent.replace(/\s\s\s*/g,"")?(n=v.querySelector("input").value?v.querySelector("input").value:void 0,v.querySelector("input").disabled=!0,s=v.dataset.key):"longitude"===v.textContent.replace(/\s\s\s*/g,"")&&(o=v.querySelector("input").value?v.querySelector("input").value:void 0,v.querySelector("input").disabled=!0,d=v.dataset.key)}};h();const f=()=>{for(let e=0;e<t.length;e++){const u=t[e],i=u.getAttribute("data-name");"lattitude"===i?u.querySelectorAll("input").forEach((e=>{e.addEventListener("click",(()=>{fetchUpdatedData()}));const t=`https://nominatim.openstreetmap.org/search?q=${encodeURIComponent(`${c} ${l}  ${r} ${a}`)}&format=json`;console.log(t),t.includes("undefined")||fetch(t).then((e=>e.json())).then((e=>{e.length>0&&(n=e[0].lat,v(n),console.log(s),document.querySelector(`#acf-${s}`).value=n)}))})):"longitude"===i&&u.querySelectorAll("input").forEach((e=>{const t=`https://nominatim.openstreetmap.org/search?q=${encodeURIComponent(`${c} ${l}  ${r} ${a}`)}&format=json`;t.includes("undefined")||fetch(t).then((e=>e.json())).then((e=>{e.length>0&&(o=e[0].lon,S(o),document.querySelector(`#acf-${d}`).value=o)}))}))}};function v(e){fetch(`/wp-json/wp/v2/location/${postData.id}?_fields=acf`,{method:"POST",headers:{"Content-Type":"application/json","X-WP-Nonce":postData.nonce},body:JSON.stringify({acf:{lattitude:e}})}).then((e=>e.json())).then((e=>{console.log(e)})).catch((e=>{console.error("Error fetching updated data:",e)}))}function S(e){fetch(`/wp-json/wp/v2/location/${postData.id}?_fields=acf`,{method:"POST",headers:{"Content-Type":"application/json","X-WP-Nonce":postData.nonce},body:JSON.stringify({acf:{longitude:e}})}).then((e=>e.json())).then((e=>{console.log(e)})).catch((e=>{console.error("Error fetching updated data:",e)}))}void 0===n&&void 0===o&&postData.street&&postData.city&&postData.state&&postData.zip&&f()}))}},t={};function n(o){var a=t[o];if(void 0!==a)return a.exports;var r=t[o]={exports:{}};return e[o](r,r.exports,n),r.exports}n.n=e=>{var t=e&&e.__esModule?()=>e.default:()=>e;return n.d(t,{a:t}),t},n.d=(e,t)=>{for(var o in t)n.o(t,o)&&!n.o(e,o)&&Object.defineProperty(e,o,{enumerable:!0,get:t[o]})},n.o=(e,t)=>Object.prototype.hasOwnProperty.call(e,t),(()=>{"use strict";n(411)})()})();