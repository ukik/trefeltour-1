"use strict";(globalThis["webpackChunkcom_lagia_app"]=globalThis["webpackChunkcom_lagia_app"]||[]).push([[7776],{57776:(e,t,n)=>{n.d(t,{FN:()=>g,Vx:()=>S,dK:()=>y,q7:()=>_});var a=n(99523);
/**
 * Vue 3 Carousel 0.3.3
 * (c) 2024
 * @license MIT
 */const i={itemsToShow:1,itemsToScroll:1,modelValue:0,transition:300,autoplay:0,snapAlign:"center",wrapAround:!1,throttle:16,pauseAutoplayOnHover:!1,mouseDrag:!0,touchDrag:!0,dir:"ltr",breakpoints:void 0,i18n:{ariaNextSlide:"Navigate to next slide",ariaPreviousSlide:"Navigate to previous slide",ariaNavigateToSlide:"Navigate to slide {slideNumber}",ariaGallery:"Gallery",itemXofY:"Item {currentSlide} of {slidesCount}",iconArrowUp:"Arrow pointing upwards",iconArrowDown:"Arrow pointing downwards",iconArrowRight:"Arrow pointing to the right",iconArrowLeft:"Arrow pointing to the left"}},o={itemsToShow:{default:i.itemsToShow,type:Number},itemsToScroll:{default:i.itemsToScroll,type:Number},wrapAround:{default:i.wrapAround,type:Boolean},throttle:{default:i.throttle,type:Number},snapAlign:{default:i.snapAlign,validator(e){return["start","end","center","center-even","center-odd"].includes(e)}},transition:{default:i.transition,type:Number},breakpoints:{default:i.breakpoints,type:Object},autoplay:{default:i.autoplay,type:Number},pauseAutoplayOnHover:{default:i.pauseAutoplayOnHover,type:Boolean},modelValue:{default:void 0,type:Number},mouseDrag:{default:i.mouseDrag,type:Boolean},touchDrag:{default:i.touchDrag,type:Boolean},dir:{default:i.dir,validator(e){return["rtl","ltr"].includes(e)}},i18n:{default:i.i18n,type:Object},settings:{default(){return{}},type:Object}};function l({config:e,slidesCount:t}){const{snapAlign:n,wrapAround:a,itemsToShow:i=1}=e;if(a)return Math.max(t-1,0);let o;switch(n){case"start":o=t-i;break;case"end":o=t-1;break;case"center":case"center-odd":o=t-Math.ceil((i-.5)/2);break;case"center-even":o=t-Math.ceil(i/2);break;default:o=0;break}return Math.max(o,0)}function r({config:e,slidesCount:t}){const{wrapAround:n,snapAlign:a,itemsToShow:i=1}=e;let o=0;if(n||i>t)return o;switch(a){case"start":o=0;break;case"end":o=i-1;break;case"center":case"center-odd":o=Math.floor((i-1)/2);break;case"center-even":o=Math.floor((i-2)/2);break;default:o=0;break}return o}function u({val:e,max:t,min:n}){return t<n?e:Math.min(Math.max(e,n),t)}function s({config:e,currentSlide:t,slidesCount:n}){const{snapAlign:a,wrapAround:i,itemsToShow:o=1}=e;let l=t;switch(a){case"center":case"center-odd":l-=(o-1)/2;break;case"center-even":l-=(o-2)/2;break;case"end":l-=o-1;break}return i?l:u({val:l,max:n-o,min:0})}function c(e){return e?e.reduce(((e,t)=>{var n;return t.type===a.Fragment?[...e,...c(t.children)]:"CarouselSlide"===(null===(n=t.type)||void 0===n?void 0:n.name)?[...e,t]:e}),[]):[]}function d({val:e,max:t,min:n=0}){return e>t?d({val:e-(t+1),max:t,min:n}):e<n?d({val:e+(t+1),max:t,min:n}):e}function v(e,t){let n;return t?function(...a){const i=this;n||(e.apply(i,a),n=!0,setTimeout((()=>n=!1),t))}:e}function p(e,t){let n;return function(...a){n&&clearTimeout(n),n=setTimeout((()=>{e(...a),n=null}),t)}}function m(e="",t={}){return Object.entries(t).reduce(((e,[t,n])=>e.replace(`{${t}}`,String(n))),e)}var f,h=(0,a.defineComponent)({name:"ARIA",setup(){const e=(0,a.inject)("config",(0,a.reactive)(Object.assign({},i))),t=(0,a.inject)("currentSlide",(0,a.ref)(0)),n=(0,a.inject)("slidesCount",(0,a.ref)(0));return()=>(0,a.h)("div",{class:["carousel__liveregion","carousel__sr-only"],"aria-live":"polite","aria-atomic":"true"},m(e.i18n["itemXofY"],{currentSlide:t.value+1,slidesCount:n.value}))}}),g=(0,a.defineComponent)({name:"Carousel",props:o,setup(e,{slots:t,emit:n,expose:m}){var f;const g=(0,a.ref)(null),b=(0,a.ref)([]),w=(0,a.ref)(0),x=(0,a.ref)(0),S=(0,a.reactive)(Object.assign({},i));let y,_=Object.assign({},i);const j=(0,a.ref)(null!==(f=e.modelValue)&&void 0!==f?f:0),C=(0,a.ref)(0),T=(0,a.ref)(0),k=(0,a.ref)(0),A=(0,a.ref)(0);let O,N;function M(){y=Object.assign({},e.breakpoints),_=Object.assign(Object.assign(Object.assign({},_),e),{i18n:Object.assign(Object.assign({},_.i18n),e.i18n),breakpoints:void 0}),D(_)}function L(){if(!y||!Object.keys(y).length)return;const e=Object.keys(y).map((e=>Number(e))).sort(((e,t)=>+t-+e));let t=Object.assign({},_);e.some((e=>{const n=window.matchMedia(`(min-width: ${e}px)`).matches;return n&&(t=Object.assign(Object.assign({},t),y[e])),n})),D(t)}function D(e){Object.entries(e).forEach((([e,t])=>S[e]=t))}(0,a.provide)("config",S),(0,a.provide)("slidesCount",x),(0,a.provide)("currentSlide",j),(0,a.provide)("maxSlide",k),(0,a.provide)("minSlide",A),(0,a.provide)("slideWidth",w);const E=p((()=>{L(),V(),I()}),16);function I(){if(!g.value)return;const e=g.value.getBoundingClientRect();w.value=e.width/S.itemsToShow}function V(){x.value<=0||(T.value=Math.ceil((x.value-1)/2),k.value=l({config:S,slidesCount:x.value}),A.value=r({config:S,slidesCount:x.value}),S.wrapAround||(j.value=u({val:j.value,max:k.value,min:A.value})))}(0,a.onMounted)((()=>{(0,a.nextTick)((()=>I())),setTimeout((()=>I()),1e3),L(),F(),window.addEventListener("resize",E,{passive:!0}),n("init")})),(0,a.onUnmounted)((()=>{N&&clearTimeout(N),O&&clearInterval(O),window.removeEventListener("resize",E,{passive:!0})}));let R=!1;const B={x:0,y:0},X={x:0,y:0},$=(0,a.reactive)({x:0,y:0}),U=(0,a.ref)(!1),z=(0,a.ref)(!1),Y=()=>{U.value=!0},P=()=>{U.value=!1};function H(e){["INPUT","TEXTAREA","SELECT"].includes(e.target.tagName)||(R="touchstart"===e.type,R||e.preventDefault(),!R&&0!==e.button||K.value||(B.x=R?e.touches[0].clientX:e.clientX,B.y=R?e.touches[0].clientY:e.clientY,document.addEventListener(R?"touchmove":"mousemove",G,!0),document.addEventListener(R?"touchend":"mouseup",W,!0)))}const G=v((e=>{z.value=!0,X.x=R?e.touches[0].clientX:e.clientX,X.y=R?e.touches[0].clientY:e.clientY;const t=X.x-B.x,n=X.y-B.y;$.y=n,$.x=t}),S.throttle);function W(){const e="rtl"===S.dir?-1:1,t=.4*Math.sign($.x),n=Math.round($.x/w.value+t)*e;if(n&&!R){const e=t=>{window.removeEventListener("click",e,!0)};window.addEventListener("click",e,!0)}J(j.value-n),$.x=0,$.y=0,z.value=!1,document.removeEventListener(R?"touchmove":"mousemove",G,!0),document.removeEventListener(R?"touchend":"mouseup",W,!0)}function F(){!S.autoplay||S.autoplay<=0||(O=setInterval((()=>{S.pauseAutoplayOnHover&&U.value||Q()}),S.autoplay))}function q(){O&&(clearInterval(O),O=null),F()}const K=(0,a.ref)(!1);function J(e){const t=S.wrapAround?e:u({val:e,max:k.value,min:A.value});j.value===t||K.value||(n("slide-start",{slidingToIndex:e,currentSlideIndex:j.value,prevSlideIndex:C.value,slidesCount:x.value}),K.value=!0,C.value=j.value,j.value=t,N=setTimeout((()=>{if(S.wrapAround){const a=d({val:t,max:k.value,min:0});a!==j.value&&(j.value=a,n("loop",{currentSlideIndex:j.value,slidingToIndex:e}))}n("update:modelValue",j.value),n("slide-end",{currentSlideIndex:j.value,prevSlideIndex:C.value,slidesCount:x.value}),K.value=!1,q()}),S.transition))}function Q(){J(j.value+S.itemsToScroll)}function Z(){J(j.value-S.itemsToScroll)}const ee={slideTo:J,next:Q,prev:Z};(0,a.provide)("nav",ee),(0,a.provide)("isSliding",K);const te=(0,a.computed)((()=>s({config:S,currentSlide:j.value,slidesCount:x.value})));(0,a.provide)("slidesToScroll",te);const ne=(0,a.computed)((()=>{const e="rtl"===S.dir?-1:1,t=te.value*w.value*e;return{transform:`translateX(${$.x-t}px)`,transition:`${K.value?S.transition:0}ms`,margin:S.wrapAround?`0 -${x.value*w.value}px`:"",width:"100%"}}));function ae(){M(),L(),V(),I(),q()}Object.keys(o).forEach((t=>{["modelValue"].includes(t)||(0,a.watch)((()=>e[t]),ae)})),(0,a.watch)((()=>e["modelValue"]),(e=>{e!==j.value&&J(Number(e))})),(0,a.watch)(x,V),n("before-init"),M();const ie={config:S,slidesCount:x,slideWidth:w,next:Q,prev:Z,slideTo:J,currentSlide:j,maxSlide:k,minSlide:A,middleSlide:T};m({updateBreakpointsConfigs:L,updateSlidesData:V,updateSlideWidth:I,initDefaultConfigs:M,restartCarousel:ae,slideTo:J,next:Q,prev:Z,nav:ee,data:ie});const oe=t.default||t.slides,le=t.addons,re=(0,a.reactive)(ie);return()=>{const e=c(null===oe||void 0===oe?void 0:oe(re)),t=(null===le||void 0===le?void 0:le(re))||[];e.forEach(((e,t)=>e.props.index=t));let n=e;if(S.wrapAround){const t=e.map(((t,n)=>(0,a.cloneVNode)(t,{index:-e.length+n,isClone:!0,key:`clone-before-${n}`}))),i=e.map(((t,n)=>(0,a.cloneVNode)(t,{index:e.length+n,isClone:!0,key:`clone-after-${n}`})));n=[...t,...e,...i]}b.value=e,x.value=Math.max(e.length,1);const i=(0,a.h)("ol",{class:"carousel__track",style:ne.value,onMousedownCapture:S.mouseDrag?H:null,onTouchstartPassiveCapture:S.touchDrag?H:null},n),o=(0,a.h)("div",{class:"carousel__viewport"},i);return(0,a.h)("section",{ref:g,class:{carousel:!0,"is-sliding":K.value,"is-dragging":z.value,"is-hover":U.value,"carousel--rtl":"rtl"===S.dir},dir:S.dir,"aria-label":S.i18n["ariaGallery"],tabindex:"0",onMouseenter:Y,onMouseleave:P},[o,t,(0,a.h)(h)])}}});(function(e){e["arrowUp"]="arrowUp",e["arrowDown"]="arrowDown",e["arrowRight"]="arrowRight",e["arrowLeft"]="arrowLeft"})(f||(f={}));const b={arrowUp:"M7.41 15.41L12 10.83l4.59 4.58L18 14l-6-6-6 6z",arrowDown:"M7.41 8.59L12 13.17l4.59-4.58L18 10l-6 6-6-6 1.41-1.41z",arrowRight:"M8.59 16.59L13.17 12 8.59 7.41 10 6l6 6-6 6-1.41-1.41z",arrowLeft:"M15.41 16.59L10.83 12l4.58-4.59L14 6l-6 6 6 6 1.41-1.41z"};function w(e){return e in f}const x=e=>{const t=(0,a.inject)("config",(0,a.reactive)(Object.assign({},i))),n=String(e.name),o=`icon${n.charAt(0).toUpperCase()+n.slice(1)}`;if(!n||"string"!==typeof n||!w(n))return;const l=b[n],r=(0,a.h)("path",{d:l}),u=t.i18n[o]||e.title||n,s=(0,a.h)("title",u);return(0,a.h)("svg",{class:"carousel__icon",viewBox:"0 0 24 24",role:"img","aria-label":u},[s,r])};x.props={name:String,title:String};const S=(e,{slots:t,attrs:n})=>{const{next:o,prev:l}=t||{},r=(0,a.inject)("config",(0,a.reactive)(Object.assign({},i))),u=(0,a.inject)("maxSlide",(0,a.ref)(1)),s=(0,a.inject)("minSlide",(0,a.ref)(1)),c=(0,a.inject)("currentSlide",(0,a.ref)(1)),d=(0,a.inject)("nav",{}),{dir:v,wrapAround:p,i18n:m}=r,f="rtl"===v,h=(0,a.h)("button",{type:"button",class:["carousel__prev",!p&&c.value<=s.value&&"carousel__prev--disabled",null===n||void 0===n?void 0:n.class],"aria-label":m["ariaPreviousSlide"],onClick:d.prev},(null===l||void 0===l?void 0:l())||(0,a.h)(x,{name:f?"arrowRight":"arrowLeft"})),g=(0,a.h)("button",{type:"button",class:["carousel__next",!p&&c.value>=u.value&&"carousel__next--disabled",null===n||void 0===n?void 0:n.class],"aria-label":m["ariaNextSlide"],onClick:d.next},(null===o||void 0===o?void 0:o())||(0,a.h)(x,{name:f?"arrowLeft":"arrowRight"}));return[h,g]},y=()=>{const e=(0,a.inject)("config",(0,a.reactive)(Object.assign({},i))),t=(0,a.inject)("maxSlide",(0,a.ref)(1)),n=(0,a.inject)("minSlide",(0,a.ref)(1)),o=(0,a.inject)("currentSlide",(0,a.ref)(1)),l=(0,a.inject)("nav",{}),r=e=>d({val:o.value,max:t.value,min:0})===e,u=[];for(let i=n.value;i<t.value+1;i++){const t=(0,a.h)("button",{type:"button",class:{"carousel__pagination-button":!0,"carousel__pagination-button--active":r(i)},"aria-label":m(e.i18n["ariaNavigateToSlide"],{slideNumber:i+1}),onClick:()=>l.slideTo(i)}),n=(0,a.h)("li",{class:"carousel__pagination-item",key:i},t);u.push(n)}return(0,a.h)("ol",{class:"carousel__pagination"},u)};var _=(0,a.defineComponent)({name:"CarouselSlide",props:{index:{type:Number,default:1},isClone:{type:Boolean,default:!1}},setup(e,{slots:t}){const n=(0,a.inject)("config",(0,a.reactive)(Object.assign({},i))),o=(0,a.inject)("currentSlide",(0,a.ref)(0)),l=(0,a.inject)("slidesToScroll",(0,a.ref)(0)),r=(0,a.inject)("isSliding",(0,a.ref)(!1)),u=(0,a.computed)((()=>e.index===o.value)),s=(0,a.computed)((()=>e.index===o.value-1)),c=(0,a.computed)((()=>e.index===o.value+1)),d=(0,a.computed)((()=>{const t=Math.floor(l.value),a=Math.ceil(l.value+n.itemsToShow-1);return e.index>=t&&e.index<=a}));return()=>{var i;return(0,a.h)("li",{style:{width:100/n.itemsToShow+"%"},class:{carousel__slide:!0,"carousel__slide--clone":e.isClone,"carousel__slide--visible":d.value,"carousel__slide--active":u.value,"carousel__slide--prev":s.value,"carousel__slide--next":c.value,"carousel__slide--sliding":r.value},"aria-hidden":!d.value},null===(i=t.default)||void 0===i?void 0:i.call(t,{isActive:u.value,isClone:e.isClone,isPrev:s.value,isNext:c.value,isSliding:r.value,isVisible:d.value}))}}})}}]);