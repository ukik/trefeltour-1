"use strict";(globalThis["webpackChunkcom_lagia_app"]=globalThis["webpackChunkcom_lagia_app"]||[]).push([[9608],{7848:(e,t,l)=>{l.d(t,{A:()=>o});var a=l(12150);const o=(0,a.nY)("GlobalEasyLightbox",{id:"GlobalEasyLightbox",state:()=>({visible:!1,index:0,imgs:[]}),getters:{getVisible:e=>e.visible,getIndex:e=>e.index,getImgs:e=>e.imgs},actions:{onShow(){this.visible=!0},showMultiple(e,t){this.imgs=e,this.index=t,this.onShow()},showImage(e=0){this.index=e,this.onShow()},onHide(){this.visible=!1}}})},42768:(e,t,l)=>{l.d(t,{A:()=>b});var a=l(99523);const o=e=>((0,a.pushScopeId)("data-v-418a2d12"),e=e(),(0,a.popScopeId)(),e),r={class:"absolute-top-right bg-transparent"},i=o((()=>(0,a.createElementVNode)("div",{class:"absolute-full flex flex-center text-white"},"Cannot load image",-1))),n={class:"text-box full-width q-px-sm col-12 text-capitalize"};function c(e,t,l,o,c,d){const s=(0,a.resolveComponent)("isModalDescription"),u=(0,a.resolveComponent)("q-btn"),p=(0,a.resolveComponent)("q-img"),m=(0,a.resolveComponent)("q-item-label"),h=(0,a.resolveComponent)("q-item-section"),x=(0,a.resolveComponent)("q-item"),v=(0,a.resolveComponent)("q-rating"),V=(0,a.resolveComponent)("isQItemLabelSimpleValue"),g=(0,a.resolveComponent)("q-card-section"),f=(0,a.resolveComponent)("q-card");return(0,a.openBlock)(),(0,a.createElementBlock)(a.Fragment,null,[(0,a.createVNode)(s,{ref:"isModal"},null,512),(0,a.createVNode)(f,{flat:"",bordered:"",square:e.$q.screen.width<=1024,class:(0,a.normalizeClass)([e.$q.screen.width>768?"rounded-borders-2":""])},{default:(0,a.withCtx)((()=>[(0,a.createVNode)(g,{horizontal:e.$q.screen.width>768,class:"row q-pa-none"},{default:(0,a.withCtx)((()=>[l.item?.image&&l.item?.image.length>0?((0,a.openBlock)(),(0,a.createBlock)(p,{key:0,loading:"lazy",ratio:16/9,class:"col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12",src:l.item?.image[0],"error-src":e.$defaultErrorImage},{error:(0,a.withCtx)((()=>[i])),default:(0,a.withCtx)((()=>[(0,a.createElementVNode)("div",r,[(0,a.createVNode)(u,{size:"16px",rounded:"",dense:"",color:"white","text-color":"primary",icon:"fullscreen",onClick:t[0]||(t[0]=e=>o.showMultiple(l.item?.image,0))})])])),_:1},8,["src","error-src"])):((0,a.openBlock)(),(0,a.createBlock)(p,{key:1,loading:"lazy",ratio:16/9,class:"col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12",src:e.$defaultErrorImage},null,8,["src"])),(0,a.createVNode)(g,{class:"bg-grey-2 row col flex items-start"},{default:(0,a.withCtx)((()=>[(0,a.createElementVNode)("div",n,[(0,a.renderSlot)(e.$slots,"name",{data:l.item},(()=>[(0,a.createVNode)(x,{dense:"",clickable:"",class:"q-pa-none",to:{name:"/talent/skill-list",query:{vendor:l.item?.id}}},{default:(0,a.withCtx)((()=>[(0,a.createVNode)(h,{class:"text-h6"},{default:(0,a.withCtx)((()=>[(0,a.createVNode)(m,null,{default:(0,a.withCtx)((()=>[(0,a.createTextVNode)((0,a.toDisplayString)(l.item?.name),1)])),_:1})])),_:1})])),_:1},8,["to"])]),!0),(0,a.createVNode)(x,{dense:""},{default:(0,a.withCtx)((()=>[(0,a.createVNode)(h,null,{default:(0,a.withCtx)((()=>[(0,a.createVNode)(m,{lines:"1"},{default:(0,a.withCtx)((()=>[(0,a.createTextVNode)("Rating")])),_:1})])),_:1}),(0,a.createVNode)(h,{side:""},{default:(0,a.withCtx)((()=>[(0,a.createVNode)(m,{lines:"1"},{default:(0,a.withCtx)((()=>[l.item?.ratingAvg?.avgRating?((0,a.openBlock)(),(0,a.createBlock)(v,{key:0,readonly:"",modelValue:l.item.ratingAvg.avgRating,"onUpdate:modelValue":t[1]||(t[1]=e=>l.item.ratingAvg.avgRating=e),size:"xs",max:5,color:"red"},null,8,["modelValue"])):((0,a.openBlock)(),(0,a.createBlock)(v,{key:1,readonly:"",modelValue:o.ratingZero,"onUpdate:modelValue":t[2]||(t[2]=e=>o.ratingZero=e),size:"xs",max:5,color:"red"},null,8,["modelValue"]))])),_:1})])),_:1})])),_:1}),(0,a.createVNode)(V,{label:"website",value:l.item?.website},null,8,["value"]),(0,a.createVNode)(V,{onOnBubbleEvent:t[3]||(t[3]=t=>e.$refs.isModal.onOpen({dialog_value:!0,dialog_payload:{value:l.item?.portofolio,label:"portofolio"}})),clickable:!0,label:"portofolio",value:"Detail",textcolor:"text-primary"}),(0,a.createVNode)(V,{onOnBubbleEvent:t[4]||(t[4]=t=>e.$refs.isModal.onOpen({dialog_value:!0,dialog_payload:{value:l.item?.policy,label:"policy"}})),clickable:!0,label:"policy",value:"Detail",textcolor:"text-primary"}),(0,a.createVNode)(V,{onOnBubbleEvent:t[5]||(t[5]=t=>e.$refs.isModal.onOpen({dialog_value:!0,dialog_payload:{value:l.item?.description,label:"description"}})),clickable:!0,label:"description",value:"Detail",textcolor:"text-primary"})])])),_:3})])),_:3},8,["horizontal"])])),_:3},8,["square","class"])],64)}var d=l(7848);const s={props:["item"],components:{},setup(){const e=(0,d.A)(),{showMultiple:t}=e,l=(0,a.ref)(null),o=(0,a.ref)(!1);return{showMultiple:t,expanded:(0,a.ref)(!1),ratingZero:0,dialog_payload:l,dialog_value:o}},methods:{badgeCondition(e){switch(e){case"public":return"pink";case"partner":return"positive";case"private":return"primary"}},getSplit(e){if(!e)return[];try{return e.split(",")}catch(t){return e}}}};var u=l(12807),p=l(23316),m=l(44189),h=l(330),x=l(56384),v=l(90124),V=l(25173),g=l(13796),f=l(61816),C=l(98582),N=l.n(C);const w=(0,u.A)(s,[["render",c],["__scopeId","data-v-418a2d12"]]),b=w;N()(s,"components",{QCard:p.A,QCardSection:m.A,QImg:h.A,QBtn:x.A,QItem:v.A,QItemSection:V.A,QItemLabel:g.A,QRating:f.A})},89632:(e,t,l)=>{l.d(t,{A:()=>L});var a=l(99523);const o=e=>((0,a.pushScopeId)("data-v-1278823e"),e=e(),(0,a.popScopeId)(),e),r={class:"text-capitalize"},i={class:"row items-start q-gutter-md"},n={class:"absolute-top-right bg-transparent"},c=o((()=>(0,a.createElementVNode)("div",{class:"absolute-full flex flex-center bg-negative text-white"}," Cannot load image ",-1))),d={class:"text-h6 q-mb-xs"},s={class:"row text-white"};function u(e,t,l,o,u,p){const m=(0,a.resolveComponent)("q-toolbar-title"),h=(0,a.resolveComponent)("q-btn"),x=(0,a.resolveComponent)("q-toolbar"),v=(0,a.resolveComponent)("q-separator"),V=(0,a.resolveComponent)("q-card-section"),g=(0,a.resolveComponent)("q-card"),f=(0,a.resolveComponent)("q-dialog"),C=(0,a.resolveComponent)("q-no-ssr"),N=(0,a.resolveComponent)("q-img"),w=(0,a.resolveComponent)("DestinationRating"),b=(0,a.resolveComponent)("q-item-label"),_=(0,a.resolveComponent)("q-item-section"),y=(0,a.resolveComponent)("isQItemLabelValue"),q=(0,a.resolveComponent)("isQItemLabelSimpleValueNoDense"),A=(0,a.resolveComponent)("q-list"),k=(0,a.resolveComponent)("q-expansion-item"),Q=(0,a.resolveComponent)("q-btn-group"),S=(0,a.resolveDirective)("close-popup");return(0,a.openBlock)(),(0,a.createElementBlock)(a.Fragment,null,[(0,a.createVNode)(C,null,{default:(0,a.withCtx)((()=>[(0,a.createVNode)(f,{modelValue:o.dialog_value,"onUpdate:modelValue":t[0]||(t[0]=e=>o.dialog_value=e)},{default:(0,a.withCtx)((()=>[(0,a.createVNode)(g,{style:{"min-width":"400px"}},{default:(0,a.withCtx)((()=>[(0,a.createVNode)(x,null,{default:(0,a.withCtx)((()=>[(0,a.createVNode)(m,null,{default:(0,a.withCtx)((()=>[(0,a.createElementVNode)("span",r,(0,a.toDisplayString)(o.dialog_payload?.label),1)])),_:1}),(0,a.withDirectives)((0,a.createVNode)(h,{flat:"",round:"",dense:"",icon:"close"},null,512),[[S]])])),_:1}),(0,a.createVNode)(v),(0,a.createVNode)(V,null,{default:(0,a.withCtx)((()=>[(0,a.createTextVNode)((0,a.toDisplayString)(o.dialog_payload?.value),1)])),_:1})])),_:1})])),_:1},8,["modelValue"])])),_:1}),(0,a.createElementVNode)("div",i,[(0,a.createVNode)(g,{class:"my-card",flat:"",bordered:""},{default:(0,a.withCtx)((()=>[l.item?.talentProfile?.image&&l.item?.talentProfile?.image.length>0?((0,a.openBlock)(),(0,a.createBlock)(N,{key:0,loading:"lazy",ratio:16/9,class:"col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12",src:l.item?.talentProfile?.image[0]},{error:(0,a.withCtx)((()=>[c])),default:(0,a.withCtx)((()=>[(0,a.createElementVNode)("div",n,[(0,a.createVNode)(h,{size:"16px",rounded:"",dense:"",color:"white","text-color":"primary",icon:"fullscreen",onClick:t[1]||(t[1]=e=>o.showMultiple(l.item?.talentProfile?.image,0))})])])),_:1},8,["src"])):((0,a.openBlock)(),(0,a.createBlock)(N,{key:1,loading:"lazy",ratio:16/9,class:"col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12",src:e.$defaultUser},null,8,["src"])),(0,a.createVNode)(V,null,{default:(0,a.withCtx)((()=>[(0,a.createVNode)(w,{rating:l.item?.talentProfile?.ratingAvg?.avgRating},null,8,["rating"]),(0,a.createElementVNode)("div",d,(0,a.toDisplayString)(l.item?.name),1),(0,a.createVNode)(b,{caption:""},{default:(0,a.withCtx)((()=>[(0,a.createTextVNode)((0,a.toDisplayString)(l.item?.createdAt),1)])),_:1}),(0,a.createElementVNode)("div",s,[(0,a.createVNode)(_,{class:"bg-primary q-mt-lg col-auto rounded-borders-1 q-pa-md"},{default:(0,a.withCtx)((()=>[(0,a.createVNode)(b,{class:"text-white text-capitalize"},{default:(0,a.withCtx)((()=>[(0,a.createTextVNode)("Harga "+(0,a.toDisplayString)(l.item?.typePrice),1)])),_:1}),(0,a.createVNode)(b,{class:"text-h4"},{default:(0,a.withCtx)((()=>[(0,a.createTextVNode)((0,a.toDisplayString)(e.$currency(e.$finalPrice(l.item))),1)])),_:1})])),_:1})])])),_:1}),(0,a.createVNode)(v),(0,a.createVNode)(V,{class:"q-pa-none"},{default:(0,a.withCtx)((()=>[(0,a.createVNode)(k,{"default-opened":""},{header:(0,a.withCtx)((()=>[(0,a.createVNode)(_,null,{default:(0,a.withCtx)((()=>[(0,a.createTextVNode)(" Detail Produk ")])),_:1})])),default:(0,a.withCtx)((()=>[(0,a.createVNode)(g,null,{default:(0,a.withCtx)((()=>[(0,a.createVNode)(V,{class:"custom q-pa-none"},{default:(0,a.withCtx)((()=>[(0,a.createVNode)(A,{class:"row flex items-start text-caption text-dark q-pl-md"},{default:(0,a.withCtx)((()=>[(0,a.createVNode)(y,{label:"Skill",value:l.item?.talentSkill?.name},null,8,["value"]),(0,a.createVNode)(y,{label:"Category",value:l.item?.talentSkill?.category},null,8,["value"]),(0,a.createVNode)(y,{label:"Lainnya",value:l.item?.talentSkill?.others},null,8,["value"]),(0,a.createVNode)(y,{label:"Sejak",value:e.$formatDate(l.item?.talentSkill?.yearExp)},null,8,["value"]),(0,a.createVNode)(q,{onOnBubbleEvent:t[2]||(t[2]=e=>{o.dialog_value=!0,o.dialog_payload={value:l.item?.talentSkill?.description,label:"description"}}),clickable:!0,label:"Deskripsi",value:"Detail",textcolor:"text-primary"}),(0,a.createVNode)(q,{onOnBubbleEvent:t[3]||(t[3]=e=>{o.dialog_value=!0,o.dialog_payload={value:l.item?.talentSkill?.policy,label:"policy"}}),clickable:!0,label:"Kebijakan",value:"Detail",textcolor:"text-primary"})])),_:1})])),_:1})])),_:1}),(0,a.createVNode)(v)])),_:1})])),_:1}),(0,a.createVNode)(V,{class:"custom q-pa-none"},{default:(0,a.withCtx)((()=>[(0,a.createVNode)(A,{class:"row flex items-start text-caption text-dark"},{default:(0,a.withCtx)((()=>[(0,a.createVNode)(y,{label:"generalPrice",value:e.$currency(l.item?.generalPrice)},null,8,["value"]),(0,a.createVNode)(y,{label:"discountPrice",value:e.$percent(l.item?.discountPrice)},null,8,["value"]),(0,a.createVNode)(y,{label:"cashbackPrice",value:e.$currency(l.item?.cashbackPrice)},null,8,["value"])])),_:1})])),_:1}),(0,a.createVNode)(V,{class:"q-pa-none"},{default:(0,a.withCtx)((()=>[(0,a.createVNode)(k,null,{header:(0,a.withCtx)((()=>[(0,a.createVNode)(_,null,{default:(0,a.withCtx)((()=>[(0,a.createTextVNode)(" Description ")])),_:1})])),default:(0,a.withCtx)((()=>[(0,a.createVNode)(v),(0,a.createVNode)(g,null,{default:(0,a.withCtx)((()=>[(0,a.createVNode)(V,null,{default:(0,a.withCtx)((()=>[(0,a.createTextVNode)((0,a.toDisplayString)(l.item?.description),1)])),_:1})])),_:1})])),_:1})])),_:1}),(0,a.createVNode)(v),(0,a.createVNode)(V,{class:"q-pa-none"},{default:(0,a.withCtx)((()=>[(0,a.renderSlot)(e.$slots,"buttongroup",{scoped:l.item},(()=>[(0,a.createVNode)(Q,{spread:"",unelevated:""},{default:(0,a.withCtx)((()=>[(0,a.createVNode)(h,{onClick:t[4]||(t[4]=t=>e.$emit("onBubbleEvent",{label:"detail",payload:l.item})),label:"Add To Cart",icon:"shopping_cart_checkout"})])),_:1})]),!0)])),_:3})])),_:3})])],64)}var p=l(7848);const m={props:["item"],components:{},setup(){const e=(0,p.A)(),{showMultiple:t}=e,l=(0,a.ref)(null),o=(0,a.ref)(!1);return{showMultiple:t,expanded:(0,a.ref)(!1),ratingZero:0,dialog_payload:l,dialog_value:o}},methods:{badgeCondition(e){switch(e){case"public":return"pink";case"partner":return"positive";case"private":return"primary"}}}};var h=l(12807),x=l(88481),v=l(82156),V=l(23316),g=l(36914),f=l(39150),C=l(56384),N=l(10386),w=l(44189),b=l(330),_=l(23954),y=l(66760),q=l(13796),A=l(25173),k=l(61816),Q=l(88841),S=l(53999),B=l(76031),E=l(62669),P=l(43605),I=l(90124),D=l(88672),$=l(98582),z=l.n($);const T=(0,h.A)(m,[["render",u],["__scopeId","data-v-1278823e"]]),L=T;z()(m,"components",{QNoSsr:x.A,QDialog:v.A,QCard:V.A,QToolbar:g.A,QToolbarTitle:f.A,QBtn:C.A,QSeparator:N.A,QCardSection:w.A,QImg:b.A,QBadge:_.A,QChip:y.A,QItemLabel:q.A,QItemSection:A.A,QRating:k.A,QExpansionItem:Q.A,QList:S.A,QBtnGroup:B.A,QCardActions:E.A,QSlideTransition:P.A,QItem:I.A}),z()(m,"directives",{ClosePopup:D.A})},76754:(e,t,l)=>{l.r(t),l.d(t,{default:()=>Ne});l(10239);var a=l(99523);const o=e=>((0,a.pushScopeId)("data-v-71c1b774"),e=e(),(0,a.popScopeId)(),e),r={class:"row items-start q-gutter-md"},i={class:"absolute-top-left bg-transparent"},n={class:"text-title text-uppercase q-mt-md"},c=o((()=>(0,a.createElementVNode)("div",{class:"absolute-full flex flex-center bg-negative text-white"}," Cannot load image ",-1))),d={class:"row text-white"};function s(e,t,l,o,s,u){const p=(0,a.resolveComponent)("q-btn"),m=(0,a.resolveComponent)("q-badge"),h=(0,a.resolveComponent)("q-img"),x=(0,a.resolveComponent)("DestinationRating"),v=(0,a.resolveComponent)("q-item-label"),V=(0,a.resolveComponent)("q-item-section"),g=(0,a.resolveComponent)("q-item"),f=(0,a.resolveComponent)("q-card-section"),C=(0,a.resolveComponent)("q-separator"),N=(0,a.resolveComponent)("isQItemLabelValue"),w=(0,a.resolveComponent)("q-list"),b=(0,a.resolveComponent)("q-card"),_=(0,a.resolveComponent)("q-expansion-item"),y=(0,a.resolveComponent)("q-btn-group"),q=(0,a.resolveComponent)("q-card-actions");return(0,a.openBlock)(),(0,a.createElementBlock)("div",r,[(0,a.createVNode)(b,{class:"my-card",flat:"",bordered:""},{default:(0,a.withCtx)((()=>[l.item?.talentProfile?.image&&l.item?.talentProfile?.image.length>0?((0,a.openBlock)(),(0,a.createBlock)(h,{key:0,loading:"lazy",ratio:16/9,class:"col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12",src:l.item?.talentProfile?.image[0]},{error:(0,a.withCtx)((()=>[c])),default:(0,a.withCtx)((()=>[(0,a.createElementVNode)("div",i,[(0,a.createVNode)(p,{size:"16px",rounded:"",dense:"",color:"white","text-color":"primary",icon:"fullscreen",onClick:t[0]||(t[0]=e=>o.showMultiple(l.item?.talentProfile?.image,0))})]),(0,a.createVNode)(m,{color:u.badgeCondition(l.item?.condition),class:"q-mr-lg rounded-borders-2",style:{"margin-top":"-17px"},floating:""},{default:(0,a.withCtx)((()=>[(0,a.createElementVNode)("span",n,(0,a.toDisplayString)(l.item?.condition),1)])),_:1},8,["color"])])),_:1},8,["src"])):((0,a.openBlock)(),(0,a.createBlock)(h,{key:1,loading:"lazy",ratio:16/9,class:"col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12",src:e.$defaultErrorImage},null,8,["src"])),(0,a.createVNode)(f,null,{default:(0,a.withCtx)((()=>[(0,a.createVNode)(x,{rating:l.item?.talentProfile?.ratingAvg?.avgRating},null,8,["rating"]),(0,a.createVNode)(g,{dense:"",clickable:"",class:"q-pa-none",to:{name:"/talent/price-detail",params:{slug:l.item?.id,slug_text:l.item?.name}}},{default:(0,a.withCtx)((()=>[(0,a.createVNode)(V,{class:"text-h6 q-mb-xs"},{default:(0,a.withCtx)((()=>[(0,a.createVNode)(v,null,{default:(0,a.withCtx)((()=>[(0,a.createTextVNode)((0,a.toDisplayString)(l.item?.name),1)])),_:1})])),_:1})])),_:1},8,["to"]),(0,a.createVNode)(v,{caption:""},{default:(0,a.withCtx)((()=>[(0,a.createTextVNode)((0,a.toDisplayString)(l.item?.createdAt),1)])),_:1}),(0,a.createElementVNode)("div",d,[(0,a.createVNode)(V,{class:"bg-primary q-mt-lg col-auto rounded-borders-1 q-pa-md"},{default:(0,a.withCtx)((()=>[(0,a.createVNode)(v,{class:"text-white text-capitalize"},{default:(0,a.withCtx)((()=>[(0,a.createTextVNode)("Harga "+(0,a.toDisplayString)(l.item?.typePrice),1)])),_:1}),(0,a.createVNode)(v,{class:"text-h4"},{default:(0,a.withCtx)((()=>[(0,a.createTextVNode)((0,a.toDisplayString)(e.$currency(e.$finalPrice(l.item))),1)])),_:1})])),_:1})])])),_:1}),(0,a.createVNode)(C),(0,a.createVNode)(f,{class:"custom q-pa-none"},{default:(0,a.withCtx)((()=>[(0,a.createVNode)(w,{class:"row flex items-start text-caption text-dark"},{default:(0,a.withCtx)((()=>[(0,a.createVNode)(N,{label:"generalPrice",value:e.$currency(l.item?.generalPrice)},null,8,["value"]),(0,a.createVNode)(N,{label:"discountPrice",value:e.$percent(l.item?.discountPrice)},null,8,["value"]),(0,a.createVNode)(N,{label:"cashbackPrice",value:e.$currency(l.item?.cashbackPrice)},null,8,["value"])])),_:1})])),_:1}),(0,a.createVNode)(f,{class:"q-pa-none"},{default:(0,a.withCtx)((()=>[(0,a.createVNode)(_,null,{header:(0,a.withCtx)((()=>[(0,a.createVNode)(V,null,{default:(0,a.withCtx)((()=>[(0,a.createTextVNode)(" Description ")])),_:1})])),default:(0,a.withCtx)((()=>[(0,a.createVNode)(C),(0,a.createVNode)(b,null,{default:(0,a.withCtx)((()=>[(0,a.createVNode)(f,null,{default:(0,a.withCtx)((()=>[(0,a.createTextVNode)((0,a.toDisplayString)(l.item?.description),1)])),_:1})])),_:1})])),_:1})])),_:1}),(0,a.createVNode)(C),(0,a.createVNode)(f,{class:"q-pa-none"},{default:(0,a.withCtx)((()=>[(0,a.createVNode)(y,{spread:"",unelevated:""},{default:(0,a.withCtx)((()=>[(0,a.createVNode)(p,{onClick:t[1]||(t[1]=t=>e.$emit("onBubbleEvent",{label:"detail",payload:l.item})),label:"detail",icon:"visibility"}),(0,a.createVNode)(C,{vertical:""}),(0,a.createVNode)(p,{onClick:t[2]||(t[2]=t=>e.$emit("onBubbleEvent",{label:"profile",payload:l.item})),label:"Profile",icon:"person"})])),_:1})])),_:1}),(0,a.createVNode)(C),(0,a.createVNode)(q,{align:"center"},{default:(0,a.withCtx)((()=>[(0,a.createVNode)(p,{outline:"",flat:"",icon:"shopping_cart_checkout",color:"primary",size:"md",label:"Add To Cart"})])),_:1})])),_:1})])}var u=l(7848);const p={props:["item"],components:{},setup(){const e=(0,u.A)(),{showMultiple:t}=e;return{showMultiple:t,expanded:(0,a.ref)(!1)}},methods:{badgeCondition(e){switch(e){case"public":return"pink";case"partner":return"positive";case"private":return"primary"}}}};var m=l(12807),h=l(23316),x=l(330),v=l(56384),V=l(23954),g=l(44189),f=l(66760),C=l(90124),N=l(25173),w=l(13796),b=l(61816),_=l(10386),y=l(53999),q=l(88841),A=l(76031),k=l(62669),Q=l(43605),S=l(98582),B=l.n(S);const E=(0,m.A)(p,[["render",s],["__scopeId","data-v-71c1b774"]]),P=E;B()(p,"components",{QCard:h.A,QImg:x.A,QBtn:v.A,QBadge:V.A,QCardSection:g.A,QChip:f.A,QItem:C.A,QItemSection:N.A,QItemLabel:w.A,QRating:b.A,QSeparator:_.A,QList:y.A,QExpansionItem:q.A,QBtnGroup:A.A,QCardActions:k.A,QSlideTransition:Q.A});var I=l(49573),D=l(89632),$=l(84451);function z(e,t,l,o,r,i){const n=(0,a.resolveComponent)("q-icon"),c=(0,a.resolveComponent)("q-avatar"),d=(0,a.resolveComponent)("q-item-section"),s=(0,a.resolveComponent)("q-separator"),u=(0,a.resolveComponent)("PriceReferenceStore"),p=(0,a.resolveComponent)("q-card-section"),m=(0,a.resolveComponent)("q-card"),h=(0,a.resolveComponent)("q-expansion-item"),x=(0,a.resolveComponent)("PriceReferenceProduct"),v=(0,a.resolveComponent)("q-list");return l.item?((0,a.openBlock)(),(0,a.createBlock)(v,{key:0,ref:"PriceReference",id:"PriceReference",bordered:""},{default:(0,a.withCtx)((()=>[(0,a.createVNode)(h,{group:"somegroup1","header-class":"bg-grey-1","default-opened":""},{header:(0,a.withCtx)((()=>[(0,a.createVNode)(d,{avatar:""},{default:(0,a.withCtx)((()=>[(0,a.createVNode)(c,{color:"primary","text-color":"white"},{default:(0,a.withCtx)((()=>[(0,a.createVNode)(n,{name:"storefront"})])),_:1})])),_:1}),(0,a.createVNode)(d,{class:"text-h6 text-dark"},{default:(0,a.withCtx)((()=>[(0,a.createTextVNode)(" PROFILE TALENT ")])),_:1})])),default:(0,a.withCtx)((()=>[(0,a.createVNode)(s),(0,a.createVNode)(m,null,{default:(0,a.withCtx)((()=>[(0,a.createVNode)(p,null,{default:(0,a.withCtx)((()=>[(0,a.createVNode)(u,{item:l.item?.talentProfile},null,8,["item"])])),_:1})])),_:1})])),_:1}),(0,a.createVNode)(s),(0,a.createVNode)(h,{group:"somegroup","header-class":"bg-grey-1","default-opened":""},{header:(0,a.withCtx)((()=>[(0,a.createVNode)(d,{avatar:""},{default:(0,a.withCtx)((()=>[(0,a.createVNode)(c,{color:"primary","text-color":"white"},{default:(0,a.withCtx)((()=>[(0,a.createVNode)(n,{name:"local_mall"})])),_:1})])),_:1}),(0,a.createVNode)(d,{class:"text-h6 text-dark"},{default:(0,a.withCtx)((()=>[(0,a.createTextVNode)(" DETAIL SKILL ")])),_:1})])),default:(0,a.withCtx)((()=>[(0,a.createVNode)(s),(0,a.createVNode)(m,null,{default:(0,a.withCtx)((()=>[(0,a.createVNode)(p,null,{default:(0,a.withCtx)((()=>[(0,a.createVNode)(x,{item:l.item},null,8,["item"])])),_:1})])),_:1})])),_:1})])),_:1},512)):(0,a.createCommentVNode)("",!0)}var T=l(42768);const L={class:"text-box full-width q-px-sm col-12 text-capitalize"};function R(e,t,l,o,r,i){const n=(0,a.resolveComponent)("isModalDescription"),c=(0,a.resolveComponent)("q-item-label"),d=(0,a.resolveComponent)("q-item-section"),s=(0,a.resolveComponent)("q-item"),u=(0,a.resolveComponent)("isQItemLabelSimpleValue"),p=(0,a.resolveComponent)("q-card-section"),m=(0,a.resolveComponent)("q-card");return(0,a.openBlock)(),(0,a.createElementBlock)(a.Fragment,null,[(0,a.createVNode)(n,{ref:"isModal"},null,512),(0,a.createVNode)(m,{flat:"",bordered:"",square:e.$q.screen.width<=1024,class:(0,a.normalizeClass)([e.$q.screen.width>768?"rounded-borders-2":""])},{default:(0,a.withCtx)((()=>[(0,a.createVNode)(p,{horizontal:e.$q.screen.width>768,class:"row q-pa-none"},{default:(0,a.withCtx)((()=>[(0,a.createVNode)(p,{class:"bg-grey-2 row col flex items-start"},{default:(0,a.withCtx)((()=>[(0,a.createElementVNode)("div",L,[(0,a.createVNode)(s,{dense:"",clickable:"",class:"q-pa-none",to:{name:"/talent/price-list",query:{product:l.item?.id}}},{default:(0,a.withCtx)((()=>[(0,a.createVNode)(d,{class:"text-h6"},{default:(0,a.withCtx)((()=>[(0,a.createVNode)(c,null,{default:(0,a.withCtx)((()=>[(0,a.createTextVNode)((0,a.toDisplayString)(l.item?.name),1)])),_:1})])),_:1})])),_:1},8,["to"]),(0,a.createVNode)(u,{onOnBubbleEvent:t[0]||(t[0]=t=>e.$refs.isModal.onOpen({dialog_value:!0,dialog_payload:{value:l.item?.description,label:"description"}})),clickable:!0,label:"description",value:"Detail",textcolor:"text-primary"}),(0,a.createVNode)(u,{onOnBubbleEvent:t[1]||(t[1]=t=>e.$refs.isModal.onOpen({dialog_value:!0,dialog_payload:{value:l.item?.policy,label:"policy"}})),clickable:!0,label:"policy",value:"Detail",textcolor:"text-primary"}),(0,a.createVNode)(u,{label:"category",value:l.item?.category},null,8,["value"]),(0,a.createVNode)(u,{label:"Lainnya",value:l.item?.others},null,8,["value"]),(0,a.createVNode)(u,{label:"sejak",value:e.$formatDate(l.item?.yearExp)},null,8,["value"])])])),_:1})])),_:1},8,["horizontal"])])),_:1},8,["square","class"])],64)}const M={props:["item"],components:{},setup(){const e=(0,u.A)(),{showMultiple:t}=e,l=(0,a.ref)(null),o=(0,a.ref)(!1);return{showMultiple:t,expanded:(0,a.ref)(!1),ratingZero:0,dialog_payload:l,dialog_value:o}},methods:{badgeCondition(e){switch(e){case"public":return"pink";case"partner":return"positive";case"private":return"primary"}},getSplit(e){if(!e)return[];try{return e.split(",")}catch(t){return e}}}},O=(0,m.A)(M,[["render",R],["__scopeId","data-v-4e5152fd"]]),F=O;B()(M,"components",{QCard:h.A,QCardSection:g.A,QItem:C.A,QItemSection:N.A,QItemLabel:w.A,QChip:f.A});const U={props:["item"],components:{PriceReferenceStore:T.A,PriceReferenceProduct:F}};var j=l(3952),Z=l(50492);const G=(0,m.A)(U,[["render",z],["__scopeId","data-v-bd9f7f14"]]),H=G;B()(U,"components",{QList:y.A,QExpansionItem:q.A,QItemSection:N.A,QAvatar:j.A,QIcon:Z.A,QSeparator:_.A,QCard:h.A,QCardSection:g.A});var K=l(12150),J=(l(14907),l(54885),l(1573)),Y=l(13473),W=l(60455),X=l(41825);const ee=e=>((0,a.pushScopeId)("data-v-2cf340d2"),e=e(),(0,a.popScopeId)(),e),te=ee((()=>(0,a.createElementVNode)("div",{class:"text-h6"},"Skill List",-1))),le=ee((()=>(0,a.createElementVNode)("div",{class:"text-h6"},"Price List",-1))),ae=ee((()=>(0,a.createElementVNode)("div",{class:"text-h6 text-capitalize"},"Detail Price",-1))),oe=ee((()=>(0,a.createElementVNode)("div",{class:"text-h6 text-capitalize"},"Profile Talent",-1))),re={class:"content-page-section row justify-center"},ie={key:0,class:"col-12 q-mb-lg"},ne={key:1,class:"col-12 text-center"},ce={key:2,class:"col-12"},de={class:"col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12"},se={class:"col-12 flex justify-center"},ue={mounted(){}},pe=Object.assign(ue,{preFetch:(0,J.kE)((({store:e,currentRoute:t,previousRoute:l,redirect:a,ssrContext:o,urlPath:r,publicPath:i})=>(t?.query?.page||a({name:t.name,query:{...t.query,page:1}}),(0,Y.S)(e).onFetch({currentPage:t?.query?.page,query:t?.query}))))},{__name:"talent-price-list",setup(e){const t=(0,Y.S)(),{onFetch:l,onPaginate:o}=t,{errors:r,data:i,paginate:n,records:c,totalItem:d,page:s,orderField:u,orderDirection:p,isShowDataRecycle:m,search:h,lastPage:x,currentPage:v,perPage:V,loading:g,init:f,additional:C}=(0,K.bP)(t),N=(0,W.rd)(),w=async e=>{const t=N.currentRoute.value;N.push({query:{...t.query,page:e.value}}),o({currentPage:e.value,query:t?.query})};(0,a.watch)((()=>v),w,{deep:!0});const b=(0,a.ref)(null),_=(0,a.ref)(!1),y=(0,a.ref)(!1),q=(0,a.ref)(!1),A=(0,a.ref)(!1);function k(e){b.value=e?.payload,"profile"==e?.label&&(y.value=!0),"detail"==e?.label&&(_.value=!0),"skill"==e?.label&&(A.value=!0)}function Q(){_.value=!1,y.value=!1,q.value=!1,A.value=!1}return(0,W.JZ)(((e,t,l)=>(Q(),l()))),(e,t)=>{const l=(0,a.resolveComponent)("q-space"),o=(0,a.resolveComponent)("q-btn"),r=(0,a.resolveComponent)("q-toolbar"),i=(0,a.resolveComponent)("q-card-section"),n=(0,a.resolveComponent)("q-separator"),d=(0,a.resolveComponent)("q-card"),s=(0,a.resolveComponent)("q-dialog"),u=(0,a.resolveComponent)("q-no-ssr"),p=(0,a.resolveComponent)("q-spinner"),m=(0,a.resolveComponent)("NoData"),h=(0,a.resolveComponent)("q-pagination"),V=(0,a.resolveDirective)("close-popup");return(0,a.openBlock)(),(0,a.createElementBlock)(a.Fragment,null,[(0,a.createVNode)(u,null,{default:(0,a.withCtx)((()=>[(0,a.createVNode)(s,{"full-width":"","full-height":"",maximized:e.$q.screen.width<=768,modelValue:A.value,"onUpdate:modelValue":t[0]||(t[0]=e=>A.value=e),"transition-show":"slide-up","transition-hide":"slide-down"},{default:(0,a.withCtx)((()=>[(0,a.createVNode)(d,null,{default:(0,a.withCtx)((()=>[(0,a.createVNode)(i,{class:"q-py-none"},{default:(0,a.withCtx)((()=>[(0,a.createVNode)(r,{style:{height:"50px"},class:"q-pa-none"},{default:(0,a.withCtx)((()=>[te,(0,a.createVNode)(l),(0,a.withDirectives)((0,a.createVNode)(o,{dense:"",flat:"",icon:"close"},null,512),[[V]])])),_:1})])),_:1}),(0,a.createVNode)(n),(0,a.createVNode)(i,{style:{height:"calc(99.5% - 50px - 60px)"},class:"scroll"},{default:(0,a.withCtx)((()=>[(0,a.createVNode)((0,a.unref)($.A),{item:b.value},null,8,["item"])])),_:1}),(0,a.createVNode)(n),(0,a.createVNode)(i,{style:{height:"60px"}})])),_:1})])),_:1},8,["maximized","modelValue"]),(0,a.createVNode)(s,{"full-width":"","full-height":"",maximized:e.$q.screen.width<=768,modelValue:q.value,"onUpdate:modelValue":t[1]||(t[1]=e=>q.value=e),"transition-show":"slide-up","transition-hide":"slide-down"},{default:(0,a.withCtx)((()=>[(0,a.createVNode)(d,null,{default:(0,a.withCtx)((()=>[(0,a.createVNode)(i,{class:"q-py-none"},{default:(0,a.withCtx)((()=>[(0,a.createVNode)(r,{style:{height:"50px"},class:"q-pa-none"},{default:(0,a.withCtx)((()=>[le,(0,a.createVNode)(l),(0,a.withDirectives)((0,a.createVNode)(o,{dense:"",flat:"",icon:"close"},null,512),[[V]])])),_:1})])),_:1}),(0,a.createVNode)(n),(0,a.createVNode)(i,{style:{height:"calc(99.5% - 50px - 60px)"},class:"scroll"},{default:(0,a.withCtx)((()=>[(0,a.createVNode)(X.A,{item:b.value},null,8,["item"])])),_:1}),(0,a.createVNode)(n),(0,a.createVNode)(i,{style:{height:"60px"}})])),_:1})])),_:1},8,["maximized","modelValue"]),(0,a.createVNode)(s,{"full-width":"","full-height":"",maximized:e.$q.screen.width<=768,modelValue:_.value,"onUpdate:modelValue":t[2]||(t[2]=e=>_.value=e),"transition-show":"slide-up","transition-hide":"slide-down"},{default:(0,a.withCtx)((()=>[(0,a.createVNode)(d,{style:(0,a.normalizeStyle)(e.$q.screen.width>768?"width: 750px !important":"")},{default:(0,a.withCtx)((()=>[(0,a.createVNode)(i,{class:"q-py-none"},{default:(0,a.withCtx)((()=>[(0,a.createVNode)(r,{style:{height:"50px"},class:"q-pa-none"},{default:(0,a.withCtx)((()=>[ae,(0,a.createVNode)(l),(0,a.withDirectives)((0,a.createVNode)(o,{dense:"",flat:"",icon:"close"},null,512),[[V]])])),_:1})])),_:1}),(0,a.createVNode)(n),(0,a.createVNode)(i,{style:{height:"calc(99.5% - 50px)"},class:"scroll"},{default:(0,a.withCtx)((()=>[(0,a.createVNode)((0,a.unref)(D.A),{item:b.value},null,8,["item"])])),_:1})])),_:1},8,["style"])])),_:1},8,["maximized","modelValue"]),(0,a.createVNode)(s,{"full-width":"","full-height":"",maximized:e.$q.screen.width<=768,modelValue:y.value,"onUpdate:modelValue":t[3]||(t[3]=e=>y.value=e),"transition-show":"slide-up","transition-hide":"slide-down"},{default:(0,a.withCtx)((()=>[(0,a.createVNode)(d,{style:(0,a.normalizeStyle)(e.$q.screen.width>768?"width: 750px !important":"")},{default:(0,a.withCtx)((()=>[(0,a.createVNode)(i,{class:"q-py-none"},{default:(0,a.withCtx)((()=>[(0,a.createVNode)(r,{style:{height:"50px"},class:"q-pa-none"},{default:(0,a.withCtx)((()=>[oe,(0,a.createVNode)(l),(0,a.withDirectives)((0,a.createVNode)(o,{dense:"",flat:"",icon:"close"},null,512),[[V]])])),_:1})])),_:1}),(0,a.createVNode)(n),(0,a.createVNode)(i,{style:{height:"calc(99.5% - 50px)"},class:"scroll"},{default:(0,a.withCtx)((()=>[(0,a.createVNode)((0,a.unref)(I.A),{item:b.value?.talentProfile},null,8,["item"])])),_:1})])),_:1},8,["style"])])),_:1},8,["maximized","modelValue"])])),_:1}),(0,a.createElementVNode)("div",re,[(0,a.createElementVNode)("div",{class:(0,a.normalizeClass)(["row justify-start col-xl-8 col-lg-10 col-md-12 col-sm-12 col-12",[e.$q.screen.width>425?"q-col-gutter-lg":"q-col-gutter-y-xl q-col-gutter-x-lg",e.$q.screen.width>768?"q-col-gutter-lg":""]])},[(0,a.unref)(C)?((0,a.openBlock)(),(0,a.createElementBlock)("div",ie,[(0,a.createVNode)((0,a.unref)(H),{item:(0,a.unref)(C)},null,8,["item"])])):(0,a.createCommentVNode)("",!0),(0,a.unref)(c).length<=0&&(0,a.unref)(g)?((0,a.openBlock)(),(0,a.createElementBlock)("div",ne,[(0,a.createVNode)(p,{color:"primary",size:"3em"})])):(0,a.createCommentVNode)("",!0),(0,a.unref)(c).length<=0&&!(0,a.unref)(g)?((0,a.openBlock)(),(0,a.createElementBlock)("div",ce,[(0,a.createVNode)(m)])):((0,a.openBlock)(!0),(0,a.createElementBlock)(a.Fragment,{key:3},(0,a.renderList)((0,a.unref)(c),((e,t)=>((0,a.openBlock)(),(0,a.createElementBlock)("div",de,[(0,a.createVNode)((0,a.unref)(P),{onOnBubbleEvent:k,item:e},null,8,["item"])])))),256)),(0,a.createElementVNode)("div",se,[(0,a.createVNode)(h,{disable:(0,a.unref)(g),class:"q-mt-lg",size:"lg",modelValue:(0,a.unref)(v),"onUpdate:modelValue":t[4]||(t[4]=e=>(0,a.isRef)(v)?v.value=e:null),max:(0,a.unref)(x),"max-pages":6,input:e.$q.screen.width<768,"direction-links":"",outline:"",color:"blue","active-design":"unelevated","active-color":"primary","active-text-color":"white"},null,8,["disable","modelValue","max","input"])])],2)])],64)}}});var me=l(88481),he=l(82156),xe=l(36914),ve=l(93676),Ve=l(58210),ge=l(54700),fe=l(88672);const Ce=(0,m.A)(pe,[["__scopeId","data-v-2cf340d2"]]),Ne=Ce;B()(pe,"components",{QNoSsr:me.A,QDialog:he.A,QCard:h.A,QCardSection:g.A,QToolbar:xe.A,QSpace:ve.A,QBtn:v.A,QSeparator:_.A,QBtnGroup:A.A,QSpinner:Ve.A,QPagination:ge.A,QItem:C.A}),B()(pe,"directives",{ClosePopup:fe.A})}}]);