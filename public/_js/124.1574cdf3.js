"use strict";(globalThis["webpackChunkcom_lagia_app"]=globalThis["webpackChunkcom_lagia_app"]||[]).push([[124],{7848:(e,t,o)=>{o.d(t,{A:()=>a});var l=o(12150);const a=(0,l.nY)("GlobalEasyLightbox",{id:"GlobalEasyLightbox",state:()=>({visible:!1,index:0,imgs:[]}),getters:{getVisible:e=>e.visible,getIndex:e=>e.index,getImgs:e=>e.imgs},actions:{onShow(){this.visible=!0},showMultiple(e,t){this.imgs=e,this.index=t,this.onShow()},showImage(e=0){this.index=e,this.onShow()},onHide(){this.visible=!1}}})},20124:(e,t,o)=>{o.r(t),o.d(t,{default:()=>M});var l=o(99523),a=o(12150),r=(o(14907),o(54885),o(56559)),i=o(7848);const c=e=>((0,l.pushScopeId)("data-v-3bb3af38"),e=e(),(0,l.popScopeId)(),e),n={id:"footer",class:"site-footer row justify-center"},s={class:"col-xl-3 col-lg-3 col-md-3 col-sm-6 col-12"},d={class:"footer-logo q-mb-lg"},m=c((()=>(0,l.createElementVNode)("img",{style:{height:"40px"},src:"/assets/lagia/white-logo.png"},null,-1))),u={class:"col-xl-3 col-lg-3 col-md-3 col-sm-6 col-12"},h=["src","error-src"],p={class:"col-xl-3 col-lg-3 col-md-3 col-sm-6 col-12"},g={class:"col-xl-3 col-lg-3 col-md-3 col-sm-6 col-12"},f={class:"row q-col-gutter-sm"},x={key:0,class:"col-4"},w=c((()=>(0,l.createElementVNode)("div",{class:"col-12 q-my-md"},[(0,l.createElementVNode)("div",{style:{"border-top":"1px solid rgba(255, 255, 255, 0.2)"}})],-1))),V={class:"col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12"},N=c((()=>(0,l.createElementVNode)("div",{class:"text-white"},"Email wajib diisi",-1))),_={class:"col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12"},b={key:0,class:"col-12 bottom-footer text-center text-white text-uppercase q-mt-lg"},k=0,C={__name:"LayoutFooter",setup(e){const t=(0,r.P)(),{footer_transport:o,footer_about:c,footer_contact:C,footer_gallery:v,footer_info:y,page_widget_call:q,page_widget_counter:B,page_widget_offer:E,page_widget_promo:A,page_widget_tron:S,loading:T,getInfoPrivasi:I,getInfoSyarat:D,shuffleArray:L,init:Q}=(0,a.bP)(t),$=(0,i.A)(),{showMultiple:z}=$,R=(0,l.ref)(null);function F(){window.open(C.value?.map,"_blank")}return(e,t)=>{const a=(0,l.resolveComponent)("q-item-label"),r=(0,l.resolveComponent)("q-icon"),i=(0,l.resolveComponent)("router-link"),y=(0,l.resolveComponent)("q-item-section"),q=(0,l.resolveComponent)("q-rating"),B=(0,l.resolveComponent)("q-item"),E=(0,l.resolveComponent)("q-list"),A=(0,l.resolveComponent)("q-img"),S=(0,l.resolveComponent)("q-btn"),Q=(0,l.resolveComponent)("q-input"),$=(0,l.resolveComponent)("q-card-actions"),U=(0,l.resolveComponent)("q-separator"),M=(0,l.resolveDirective)("ripple");return(0,l.openBlock)(),(0,l.createElementBlock)("div",n,[(0,l.createElementVNode)("div",{class:(0,l.normalizeClass)(["row justify-start col-xl-8 col-lg-10 col-md-12 col-sm-12 col-12",[e.$q.screen.width>425?"q-col-gutter-lg":"q-col-gutter-y-xl q-col-gutter-x-lg",e.$q.screen.width>768?"q-col-gutter-lg":""]])},[(0,l.createElementVNode)("div",s,[(0,l.createElementVNode)("div",d,[(0,l.createVNode)(a,null,{default:(0,l.withCtx)((()=>[m])),_:1})]),(0,l.createVNode)(a,{class:"text-white q-mb-sm",lines:"6",innerHTML:(0,l.unref)(c)?.description},null,8,["innerHTML"]),(0,l.createVNode)(i,{class:"text-white",to:"/lagia/about"},{default:(0,l.withCtx)((()=>[(0,l.createTextVNode)("selengkapnya "),(0,l.createVNode)(r,{name:"keyboard_arrow_right"})])),_:1})]),(0,l.createElementVNode)("div",u,[(0,l.createVNode)(E,{class:"text-white footer-primary"},{default:(0,l.withCtx)((()=>[(0,l.createVNode)(a,{class:"text-white q-px-none widget-title",header:""},{default:(0,l.withCtx)((()=>[(0,l.createTextVNode)("RECENT RENTAL")])),_:1}),((0,l.openBlock)(!0),(0,l.createElementBlock)(l.Fragment,null,(0,l.renderList)((0,l.unref)(o),((o,r)=>(0,l.withDirectives)(((0,l.openBlock)(),(0,l.createBlock)(B,{class:"text-white",clickable:"",to:{name:"/transport/price-list",query:{product:o?.id}}},{default:(0,l.withCtx)((()=>[(0,l.createVNode)(y,{top:"",thumbnail:""},{default:(0,l.withCtx)((()=>[(0,l.createElementVNode)("img",{class:"rounded-borders-1",style:{height:"75px",width:"75px"},src:o?.image[0],"error-src":e.$defaultErrorImage},null,8,h)])),_:2},1024),(0,l.createVNode)(y,{top:""},{default:(0,l.withCtx)((()=>[(0,l.createVNode)(a,{class:"text-uppercase",lines:"2"},{default:(0,l.withCtx)((()=>[(0,l.createTextVNode)((0,l.toDisplayString)(o?.brand)+" - "+(0,l.toDisplayString)(o?.model)+" - "+(0,l.toDisplayString)(o?.category),1)])),_:2},1024),(0,l.createVNode)(a,{class:"text-white q-mt-md",caption:""},{default:(0,l.withCtx)((()=>[o?.ratingAvg?.avgRating?((0,l.openBlock)(),(0,l.createBlock)(q,{key:0,readonly:"",modelValue:o.ratingAvg.avgRating,"onUpdate:modelValue":e=>o.ratingAvg.avgRating=e,size:"xs",max:5,color:"white"},null,8,["modelValue","onUpdate:modelValue"])):((0,l.openBlock)(),(0,l.createBlock)(q,{key:1,readonly:"",modelValue:k,"onUpdate:modelValue":t[0]||(t[0]=e=>k=e),size:"xs",max:5,color:"white"}))])),_:2},1024)])),_:2},1024)])),_:2},1032,["to"])),[[M]]))),256))])),_:1})]),(0,l.createElementVNode)("div",p,[(0,l.createVNode)(E,{class:"text-white footer-primary"},{default:(0,l.withCtx)((()=>[(0,l.createVNode)(a,{class:"text-white q-px-none widget-title",header:""},{default:(0,l.withCtx)((()=>[(0,l.createTextVNode)("CONTACT US")])),_:1}),(0,l.createVNode)(a,{class:"q-mb-md"},{default:(0,l.withCtx)((()=>[(0,l.createTextVNode)("Feel free to contact and reach us !!")])),_:1}),(0,l.withDirectives)(((0,l.openBlock)(),(0,l.createBlock)(B,{href:`tel:${(0,l.unref)(C)?.grid1Value}`,class:"q-px-xs",clickable:""},{default:(0,l.withCtx)((()=>[(0,l.createVNode)(y,{side:""},{default:(0,l.withCtx)((()=>[(0,l.createVNode)(r,{color:"white",name:"phone"})])),_:1}),(0,l.createVNode)(y,null,{default:(0,l.withCtx)((()=>[(0,l.createTextVNode)((0,l.toDisplayString)((0,l.unref)(C)?.grid1Value),1)])),_:1})])),_:1},8,["href"])),[[M]]),(0,l.withDirectives)(((0,l.openBlock)(),(0,l.createBlock)(B,{href:`mailto:${(0,l.unref)(C)?.grid2Value}`,class:"q-px-xs",clickable:""},{default:(0,l.withCtx)((()=>[(0,l.createVNode)(y,{side:""},{default:(0,l.withCtx)((()=>[(0,l.createVNode)(r,{color:"white",name:"email"})])),_:1}),(0,l.createVNode)(y,null,{default:(0,l.withCtx)((()=>[(0,l.createTextVNode)((0,l.toDisplayString)((0,l.unref)(C)?.grid2Value),1)])),_:1})])),_:1},8,["href"])),[[M]]),(0,l.withDirectives)(((0,l.openBlock)(),(0,l.createBlock)(B,{onClick:F,class:"q-px-xs",clickable:""},{default:(0,l.withCtx)((()=>[(0,l.createVNode)(y,{side:""},{default:(0,l.withCtx)((()=>[(0,l.createVNode)(r,{color:"white",name:"location_on"})])),_:1}),(0,l.createVNode)(y,null,{default:(0,l.withCtx)((()=>[(0,l.createVNode)(a,{lines:"2"},{default:(0,l.withCtx)((()=>[(0,l.createTextVNode)((0,l.toDisplayString)((0,l.unref)(C)?.grid3Value),1)])),_:1})])),_:1})])),_:1})),[[M]])])),_:1})]),(0,l.createElementVNode)("div",g,[(0,l.createVNode)(E,{class:"text-white footer-primary"},{default:(0,l.withCtx)((()=>[(0,l.createVNode)(a,{class:"text-white q-px-none widget-title",style:{"margin-bottom":"4px"},header:""},{default:(0,l.withCtx)((()=>[(0,l.createTextVNode)("GALLERY")])),_:1})])),_:1}),(0,l.createElementVNode)("div",f,[((0,l.openBlock)(!0),(0,l.createElementBlock)(l.Fragment,null,(0,l.renderList)((0,l.unref)(L),((e,t)=>((0,l.openBlock)(),(0,l.createElementBlock)(l.Fragment,null,[t<6?((0,l.openBlock)(),(0,l.createElementBlock)("div",x,[(0,l.createVNode)(A,{onClick:e=>(0,l.unref)(z)((0,l.unref)(v)?.image,t),ratio:"1",class:"rounded-borders-1",src:e},null,8,["onClick","src"])])):(0,l.createCommentVNode)("",!0)],64)))),256))])]),w,(0,l.createElementVNode)("div",V,[(0,l.createVNode)(E,{class:"text-white footer-primary"},{default:(0,l.withCtx)((()=>[(0,l.createVNode)(Q,{class:"q-mb-lg","bg-color":"white",loading:(0,l.unref)(T),outlined:"","bottom-slots":"",modelValue:R.value,"onUpdate:modelValue":t[2]||(t[2]=e=>R.value=e),placeholder:"Enter your email",clearable:""},{prepend:(0,l.withCtx)((()=>[(0,l.createVNode)(r,{name:"mail"})])),after:(0,l.withCtx)((()=>[(0,l.createVNode)(S,{rounded:"",outline:"",loading:(0,l.unref)(T),onClick:t[1]||(t[1]=()=>{}),class:"full-height",color:"white",icon:"send",label:e.$q.screen.width>425?"Subscribe":""},null,8,["loading","label"])])),hint:(0,l.withCtx)((()=>[N])),_:1},8,["loading","modelValue"])])),_:1})]),(0,l.createElementVNode)("div",_,[(0,l.createVNode)($,{class:"q-pa-none",align:e.$q.screen.width>768?"right":"center"},{default:(0,l.withCtx)((()=>[(0,l.createVNode)(S,{type:"_blank",href:(0,l.unref)(C)?.instagram,icon:"fa-brands fa-instagram",round:"",outline:"",color:"white",size:"14px",dense:!1,class:"q-mr-sm"},null,8,["href"]),(0,l.createVNode)(S,{type:"_blank",href:(0,l.unref)(C)?.whatsapp,icon:"fa-brands fa-whatsapp",round:"",outline:"",color:"white",size:"14px",dense:!1,class:"q-mr-sm"},null,8,["href"]),(0,l.createVNode)(S,{type:"_blank",href:(0,l.unref)(C)?.facebook,icon:"fa-brands fa-facebook-f",round:"",outline:"",color:"white",size:"14px",dense:!1,class:"q-mr-sm"},null,8,["href"]),(0,l.createVNode)(S,{type:"_blank",href:(0,l.unref)(C)?.twitter,icon:"fa-brands fa-x-twitter",round:"",outline:"",color:"white",size:"14px",dense:!1,class:"q-mr-sm"},null,8,["href"]),(0,l.createVNode)(S,{type:"_blank",href:(0,l.unref)(C)?.tiktok,icon:"fa-brands fa-tiktok",round:"",outline:"",color:"white",size:"14px",dense:!1},null,8,["href"])])),_:1},8,["align"]),(0,l.createVNode)($,{class:"q-pa-none q-mt-sm text-white",align:e.$q.screen.width>768?"right":"center"},{default:(0,l.withCtx)((()=>[(0,l.unref)(I)?.slug?((0,l.openBlock)(),(0,l.createBlock)(i,{key:0,to:{name:"/info/privacy-policy",params:{slug:(0,l.unref)(I)?.slug,id:(0,l.unref)(I)?.id}}},{default:(0,l.withCtx)((()=>[(0,l.createTextVNode)((0,l.toDisplayString)((0,l.unref)(I)?.title),1)])),_:1},8,["to"])):(0,l.createCommentVNode)("",!0),(0,l.createVNode)(U,{class:"q-mx-sm q-my-xs",vertical:"",color:"white"}),(0,l.unref)(D)?.slug?((0,l.openBlock)(),(0,l.createBlock)(i,{key:1,to:{name:"/info/terms-condition",params:{slug:(0,l.unref)(D)?.slug,id:(0,l.unref)(D)?.id}}},{default:(0,l.withCtx)((()=>[(0,l.createTextVNode)((0,l.toDisplayString)((0,l.unref)(D)?.title),1)])),_:1},8,["to"])):(0,l.createCommentVNode)("",!0),(0,l.createVNode)(U,{class:"q-mx-sm q-my-xs",vertical:"",color:"white"}),(0,l.createVNode)(i,{to:"/lagia/faq"},{default:(0,l.withCtx)((()=>[(0,l.createTextVNode)("FAQ")])),_:1})])),_:1},8,["align"])])],2),e.$q.screen.width<=768?((0,l.openBlock)(),(0,l.createElementBlock)("div",b," Copyright © "+(0,l.toDisplayString)(e.$year)+" Lagia. All rights reserved. ",1)):(0,l.createCommentVNode)("",!0)])}}};var v=o(12807),y=o(88481),q=o(13796),B=o(56384),E=o(50492),A=o(53999),S=o(90124),T=o(25173),I=o(61816),D=o(330),L=o(39270),Q=o(62669),$=o(10386),z=o(39626),R=o(98582),F=o.n(R);const U=(0,v.A)(C,[["__scopeId","data-v-3bb3af38"]]),M=U;F()(C,"components",{QNoSsr:y.A,QItemLabel:q.A,QBtn:B.A,QIcon:E.A,QList:A.A,QItem:S.A,QItemSection:T.A,QRating:I.A,QImg:D.A,QInput:L.A,QCardActions:Q.A,QSeparator:$.A}),F()(C,"directives",{Ripple:z.A})}}]);