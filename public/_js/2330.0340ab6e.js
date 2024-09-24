"use strict";(globalThis["webpackChunkcom_lagia_app"]=globalThis["webpackChunkcom_lagia_app"]||[]).push([[2330],{7848:(e,t,a)=>{a.d(t,{A:()=>o});var l=a(12150);const o=(0,l.nY)("GlobalEasyLightbox",{id:"GlobalEasyLightbox",state:()=>({visible:!1,index:0,imgs:[]}),getters:{getVisible:e=>e.visible,getIndex:e=>e.index,getImgs:e=>e.imgs},actions:{onShow(){this.visible=!0},showMultiple(e,t){this.imgs=e,this.index=t,this.onShow()},showImage(e=0){this.index=e,this.onShow()},onHide(){this.visible=!1}}})},88441:(e,t,a)=>{a.d(t,{X:()=>c});var l=a(12150),o=a(16306),r=a.n(o),n=(a(20989),a(53500)),i=a(94717);const c=(0,l.nY)("CulinaryProductListStore",{id:"CulinaryProductListStore",state:()=>({slug:"culinary-products",errors:{},data:{},paginate:[5,10,25,50,75,100],records:[],totalItem:0,page:1,orderField:"",orderDirection:"",isShowDataRecycle:!1,search:"",lastPage:0,currentPage:1,perPage:25,isAvailable:"",venueId:"",loading:!1,init:!1,additional:""}),getters:{getRecords:e=>e.records},actions:{async onFetch({currentPage:e,query:t}){if(this.loading)return!1;this.loading=!0;const a=await r()({url:"/trevolia-api/v1/entities/culinary-products",method:"get",params:{slug:this.slug,page:this.page,orderField:i.A.snake(this.orderField),orderDirection:i.A.snake(this.orderDirection),showSoftDelete:this.isShowDataRecycle,isAvailable:this.isAvailable,search:this.search,perPage:this.perPage,page:e,payload:[],loading:!1,...t}}).then((e=>e)).catch((e=>{}));if(this.loading=!1,!a?.data)return this.loading=!1;this.init=!0;try{a?.data?.data?.data.forEach((e=>{e?.image&&(e["image"]=JSON.parse(e["image"]))}))}catch(l){a?.data?.data?.data.forEach((e=>{e?.image&&(e["image"]=[e["image"]])}))}this.lastPage=a?.data?.data?.lastPage,this.currentPage=a?.data?.data?.currentPage,this.perPage=a?.data?.data?.perPage,this.totalItem=a?.data?.data?.total,this.data=a?.data?.data,this.records=a?.data?.data?.data,a?.data?.additional?.image&&(a.data.additional["image"]=JSON.parse(a.data.additional["image"])),this.additional=a?.data?.additional},onPaginate:(0,n.A)((async function({currentPage:e,query:t}){this.onFetch({currentPage:e,query:t})}),500),async onClearRegister(){}}})},96972:(e,t,a)=>{a.d(t,{A:()=>w});var l=a(99523);const o=e=>((0,l.pushScopeId)("data-v-32c7e77a"),e=e(),(0,l.popScopeId)(),e),r={class:"absolute-top-right bg-transparent"},n=o((()=>(0,l.createElementVNode)("div",{class:"absolute-full flex flex-center text-white"},"Cannot load image",-1))),i={class:"text-box full-width q-px-sm col-12 text-capitalize"};function c(e,t,a,o,c,s){const d=(0,l.resolveComponent)("isModalDescription"),u=(0,l.resolveComponent)("q-btn"),m=(0,l.resolveComponent)("q-img"),g=(0,l.resolveComponent)("q-item-label"),p=(0,l.resolveComponent)("q-item-section"),h=(0,l.resolveComponent)("q-item"),v=(0,l.resolveComponent)("q-rating"),x=(0,l.resolveComponent)("isQItemLabelSimpleValue"),f=(0,l.resolveComponent)("q-card-section"),y=(0,l.resolveComponent)("q-card");return(0,l.openBlock)(),(0,l.createElementBlock)(l.Fragment,null,[(0,l.createVNode)(d,{ref:"isModal"},null,512),(0,l.createVNode)(y,{flat:"",bordered:"",square:e.$q.screen.width<=1024,class:(0,l.normalizeClass)([e.$q.screen.width>768?"rounded-borders-2":""])},{default:(0,l.withCtx)((()=>[(0,l.createVNode)(f,{horizontal:e.$q.screen.width>768,class:"row q-pa-none"},{default:(0,l.withCtx)((()=>[a.item?.image&&a.item?.image.length>0?((0,l.openBlock)(),(0,l.createBlock)(m,{key:0,loading:"lazy",ratio:16/9,class:"col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12",src:a.item?.image[0],"error-src":e.$defaultErrorImage},{error:(0,l.withCtx)((()=>[n])),default:(0,l.withCtx)((()=>[(0,l.createElementVNode)("div",r,[(0,l.createVNode)(u,{size:"16px",rounded:"",dense:"",color:"white","text-color":"primary",icon:"fullscreen",onClick:t[0]||(t[0]=e=>o.showMultiple(a.item?.image,0))})])])),_:1},8,["src","error-src"])):((0,l.openBlock)(),(0,l.createBlock)(m,{key:1,loading:"lazy",ratio:16/9,class:"col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12",src:e.$defaultErrorImage},null,8,["src"])),(0,l.createVNode)(f,{class:"bg-grey-2 row col flex items-start"},{default:(0,l.withCtx)((()=>[(0,l.createElementVNode)("div",i,[(0,l.createVNode)(h,{dense:"",clickable:"",class:"q-pa-none",to:{name:"/culinary/store-detail",params:{slug:a.item?.id,slug_text:a.item?.name}}},{default:(0,l.withCtx)((()=>[(0,l.createVNode)(p,{class:"text-h6"},{default:(0,l.withCtx)((()=>[(0,l.createVNode)(g,null,{default:(0,l.withCtx)((()=>[(0,l.createTextVNode)((0,l.toDisplayString)(a.item?.name),1)])),_:1})])),_:1})])),_:1},8,["to"]),(0,l.createVNode)(h,{dense:""},{default:(0,l.withCtx)((()=>[(0,l.createVNode)(p,null,{default:(0,l.withCtx)((()=>[(0,l.createVNode)(g,{lines:"1"},{default:(0,l.withCtx)((()=>[(0,l.createTextVNode)("Rating")])),_:1})])),_:1}),(0,l.createVNode)(p,{side:""},{default:(0,l.withCtx)((()=>[(0,l.createVNode)(g,{lines:"1"},{default:(0,l.withCtx)((()=>[a.item?.ratingAvg?.avgRating?((0,l.openBlock)(),(0,l.createBlock)(v,{key:0,readonly:"",modelValue:a.item.ratingAvg.avgRating,"onUpdate:modelValue":t[1]||(t[1]=e=>a.item.ratingAvg.avgRating=e),size:"xs",max:5,color:"red"},null,8,["modelValue"])):((0,l.openBlock)(),(0,l.createBlock)(v,{key:1,readonly:"",modelValue:o.ratingZero,"onUpdate:modelValue":t[2]||(t[2]=e=>o.ratingZero=e),size:"xs",max:5,color:"red"},null,8,["modelValue"]))])),_:1})])),_:1})])),_:1}),(0,l.createVNode)(x,{label:"city",value:a.item?.city},null,8,["value"]),(0,l.createVNode)(x,{label:"country",value:a.item?.country},null,8,["value"]),(0,l.createVNode)(x,{onOnBubbleEvent:t[3]||(t[3]=t=>e.$refs.isModal.onOpen({dialog_value:!0,dialog_payload:{value:a.item?.policy,label:"policy"}})),clickable:!0,label:"policy",value:"Detail",textcolor:"text-primary"}),(0,l.createVNode)(x,{onOnBubbleEvent:t[4]||(t[4]=t=>e.$refs.isModal.onOpen({dialog_value:!0,dialog_payload:{value:a.item?.description,label:"description"}})),clickable:!0,label:"description",value:"Detail",textcolor:"text-primary"}),(0,l.createVNode)(x,{onOnBubbleEvent:t[5]||(t[5]=t=>e.$refs.isModal.onOpen({dialog_value:!0,dialog_payload:{value:a.item?.location,label:"location"}})),clickable:!0,label:"location",value:"Detail",textcolor:"text-primary"})])])),_:1})])),_:1},8,["horizontal"])])),_:1},8,["square","class"])],64)}var s=a(7848);const d={props:["item"],components:{},setup(){const e=(0,s.A)(),{showMultiple:t}=e,a=(0,l.ref)(null),o=(0,l.ref)(!1);return{showMultiple:t,expanded:(0,l.ref)(!1),ratingZero:0,dialog_payload:a,dialog_value:o}},methods:{badgeCondition(e){switch(e){case"public":return"pink";case"partner":return"positive";case"private":return"primary"}},getSplit(e){if(!e)return[];try{return e.split(",")}catch(t){return e}}}};var u=a(12807),m=a(23316),g=a(44189),p=a(330),h=a(56384),v=a(90124),x=a(25173),f=a(13796),y=a(61816),V=a(98582),b=a.n(V);const C=(0,u.A)(d,[["render",c],["__scopeId","data-v-32c7e77a"]]),w=C;b()(d,"components",{QCard:m.A,QCardSection:g.A,QImg:p.A,QBtn:h.A,QItem:v.A,QItemSection:x.A,QItemLabel:f.A,QRating:y.A})},22330:(e,t,a)=>{a.r(t),a.d(t,{default:()=>X});a(10239);var l=a(99523),o=a(96972),r=a(12150),n=(a(14907),a(54885),a(1573)),i=a(7848),c=a(88441),s=a(60455);const d=e=>((0,l.pushScopeId)("data-v-f7fe9c20"),e=e(),(0,l.popScopeId)(),e),u={class:"content-page-section row justify-center"},m={key:0,class:"col-12 q-mb-lg"},g={key:1,class:"col-12 text-center"},p={key:2,class:"col-12"},h={class:"col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12"},v={class:"absolute-top-right bg-transparent"},x=d((()=>(0,l.createElementVNode)("div",{class:"absolute-full flex flex-center text-white"}," Cannot load image ",-1))),f={class:"text-box full-width col-12 text-capitalize"},y={class:"package-price col-12 text-center row q-mt-md"},V={class:"col-12"},b=d((()=>(0,l.createElementVNode)("small",{class:"text-weight-light"}," Harga",-1))),C=d((()=>(0,l.createElementVNode)("small",{class:"col-12 text-center text-caption"},"( available )",-1))),w={class:"row col-12 justify-center q-mt-lg"},N={class:"col-12 flex flex-center q-mt-lg"},q=0,k=Object.assign({preFetch:(0,n.kE)((({store:e,currentRoute:t,previousRoute:a,redirect:l,ssrContext:o,urlPath:r,publicPath:n})=>(t?.query?.page||l({name:t.name,query:{...t.query,page:1}}),(0,c.X)(e).onFetch({currentPage:t?.query?.page,query:t?.query}))))},{__name:"culinary-product-list",setup(e){const t=(0,c.X)(),{onFetch:a,onPaginate:n}=t,{errors:d,data:k,paginate:_,records:A,totalItem:B,page:E,orderField:P,orderDirection:I,isShowDataRecycle:Q,search:S,lastPage:R,currentPage:D,perPage:z,loading:O,init:F,additional:M}=(0,r.bP)(t),$=(0,i.A)(),{showMultiple:L}=$,T=(0,s.rd)(),U=async e=>{const t=T.currentRoute.value;T.push({query:{...t.query,page:e.value}}),n({currentPage:e.value,query:t?.query})};(0,l.watch)((()=>D),U,{deep:!0});const j=(0,l.ref)(null),Z=(0,l.ref)(!1),G=(0,l.ref)(!1),J=(0,l.ref)(!1);function X(){j.value=null,Z.value=!1,G.value=!1,J.value=!1}return(0,s.JZ)(((e,t,a)=>(X(),a()))),(e,t)=>{const a=(0,l.resolveComponent)("isModalDescription"),r=(0,l.resolveComponent)("q-no-ssr"),n=(0,l.resolveComponent)("q-icon"),i=(0,l.resolveComponent)("q-avatar"),c=(0,l.resolveComponent)("q-item-section"),s=(0,l.resolveComponent)("q-separator"),d=(0,l.resolveComponent)("q-card-section"),k=(0,l.resolveComponent)("q-card"),_=(0,l.resolveComponent)("q-expansion-item"),B=(0,l.resolveComponent)("q-list"),E=(0,l.resolveComponent)("q-spinner"),P=(0,l.resolveComponent)("NoData"),I=(0,l.resolveComponent)("q-btn"),Q=(0,l.resolveComponent)("q-img"),S=(0,l.resolveComponent)("q-item-label"),z=(0,l.resolveComponent)("isQItemLabelSimpleValue"),F=(0,l.resolveComponent)("q-rating"),$=(0,l.resolveComponent)("q-pagination");return(0,l.openBlock)(),(0,l.createElementBlock)(l.Fragment,null,[(0,l.createVNode)(r,null,{default:(0,l.withCtx)((()=>[(0,l.createVNode)(a,{ref:"isModal"},null,512)])),_:1}),(0,l.createElementVNode)("div",u,[(0,l.createElementVNode)("div",{class:(0,l.normalizeClass)(["row justify-start col-xl-8 col-lg-10 col-md-12 col-sm-12 col-12",[e.$q.screen.width>425?"q-col-gutter-lg":"q-col-gutter-y-xl q-col-gutter-x-lg",e.$q.screen.width>768?"q-col-gutter-lg":""]])},[(0,l.unref)(M)?((0,l.openBlock)(),(0,l.createElementBlock)("div",m,[(0,l.createVNode)(B,{bordered:""},{default:(0,l.withCtx)((()=>[(0,l.createVNode)(_,{group:"somegroup","header-class":"bg-grey-1","default-opened":""},{header:(0,l.withCtx)((()=>[(0,l.createVNode)(c,{avatar:""},{default:(0,l.withCtx)((()=>[(0,l.createVNode)(i,{color:"primary","text-color":"white"},{default:(0,l.withCtx)((()=>[(0,l.createVNode)(n,{name:"storefront"})])),_:1})])),_:1}),(0,l.createVNode)(c,{class:"text-h6 text-dark"},{default:(0,l.withCtx)((()=>[(0,l.createTextVNode)(" PROFILE VENDOR ")])),_:1})])),default:(0,l.withCtx)((()=>[(0,l.createVNode)(s),(0,l.createVNode)(k,null,{default:(0,l.withCtx)((()=>[(0,l.createVNode)(d,null,{default:(0,l.withCtx)((()=>[(0,l.createVNode)((0,l.unref)(o.A),{item:(0,l.unref)(M)},null,8,["item"])])),_:1})])),_:1})])),_:1})])),_:1})])):(0,l.createCommentVNode)("",!0),(0,l.unref)(A).length<=0&&(0,l.unref)(O)?((0,l.openBlock)(),(0,l.createElementBlock)("div",g,[(0,l.createVNode)(E,{color:"primary",size:"3em"})])):(0,l.createCommentVNode)("",!0),(0,l.unref)(A).length<=0&&!(0,l.unref)(O)?((0,l.openBlock)(),(0,l.createElementBlock)("div",p,[(0,l.createVNode)(P)])):((0,l.openBlock)(!0),(0,l.createElementBlock)(l.Fragment,{key:3},(0,l.renderList)((0,l.unref)(A),((a,o)=>((0,l.openBlock)(),(0,l.createElementBlock)("div",h,[(0,l.createVNode)(k,{flat:"",bordered:"",class:"rounded-borders-2"},{default:(0,l.withCtx)((()=>[(0,l.createVNode)(d,{class:"row q-pa-none"},{default:(0,l.withCtx)((()=>[a?.image&&a?.image.length>0?((0,l.openBlock)(),(0,l.createBlock)(Q,{key:0,loading:"lazy",ratio:1,class:"col-12 q-border-bottom",src:a?.image[0]},{error:(0,l.withCtx)((()=>[x])),default:(0,l.withCtx)((()=>[(0,l.createElementVNode)("div",v,[(0,l.createVNode)(I,{size:"16px",rounded:"",dense:"",color:"white","text-color":"primary",icon:"fullscreen",onClick:e=>(0,l.unref)(L)(a?.image,0)},null,8,["onClick"])])])),_:2},1032,["src"])):((0,l.openBlock)(),(0,l.createBlock)(Q,{key:1,loading:"lazy",ratio:1,class:"col-12 q-border-bottom",src:e.$defaultUser},null,8,["src"])),(0,l.createVNode)(d,{class:"bg-grey-2 row col-12 flex items-start q-pa-none q-my-md"},{default:(0,l.withCtx)((()=>[(0,l.createElementVNode)("div",f,[(0,l.createVNode)(_,{class:"bg-white","default-opened":""},{header:(0,l.withCtx)((()=>[(0,l.createVNode)(c,{class:"text-h6 q-px-none"},{default:(0,l.withCtx)((()=>[(0,l.createVNode)(S,{lines:"1"},{default:(0,l.withCtx)((()=>[(0,l.createTextVNode)((0,l.toDisplayString)(a?.name),1)])),_:2},1024)])),_:2},1024)])),default:(0,l.withCtx)((()=>[(0,l.createVNode)(k,null,{default:(0,l.withCtx)((()=>[(0,l.createVNode)(z,{label:"uuid",value:a?.uuid},null,8,["value"]),(0,l.createVNode)(z,{label:"category",value:a?.category},null,8,["value"]),(0,l.createVNode)(z,{label:"lainnya",value:a?.others},null,8,["value"]),(0,l.createVNode)(z,{onOnBubbleEvent:t=>e.$refs.isModal.onOpen({dialog_value:!0,dialog_payload:{value:a?.description,label:"description"}}),clickable:!0,label:"description",value:"Detail",textcolor:"text-primary"},null,8,["onOnBubbleEvent"])])),_:2},1024)])),_:2},1024)])])),_:2},1024),(0,l.createVNode)(d,{class:"bg-form col-12 row flex flex-center text-white q-pt-lg"},{default:(0,l.withCtx)((()=>[a?.ratingAvg?.avgRating?((0,l.openBlock)(),(0,l.createBlock)(F,{key:0,readonly:"",modelValue:a.ratingAvg.avgRating,"onUpdate:modelValue":e=>a.ratingAvg.avgRating=e,size:"sm",max:5,color:"white"},null,8,["modelValue","onUpdate:modelValue"])):((0,l.openBlock)(),(0,l.createBlock)(F,{key:1,readonly:"",modelValue:q,"onUpdate:modelValue":t[0]||(t[0]=e=>q=e),size:"sm",max:5,color:"white"})),(0,l.createCommentVNode)("",!0),(0,l.createElementVNode)("div",y,[(0,l.createElementVNode)("h6",V,[(0,l.createTextVNode)((0,l.toDisplayString)(a?.culinaryPricesCount)+" ",1),b]),C]),(0,l.createElementVNode)("div",w,[(0,l.createVNode)(I,{outline:"",class:"text-weight-normal rounded-borders-2",color:"form","text-color":"white",label:"selengkapnya",to:{name:"/culinary/price-list",query:{product:a?.id}}},null,8,["to"])])])),_:2},1024)])),_:2},1024)])),_:2},1024)])))),256))],2),(0,l.createElementVNode)("div",N,[(0,l.createVNode)($,{disable:(0,l.unref)(O),class:"q-mt-lg",size:"lg",modelValue:(0,l.unref)(D),"onUpdate:modelValue":t[1]||(t[1]=e=>(0,l.isRef)(D)?D.value=e:null),max:(0,l.unref)(R),"max-pages":6,input:e.$q.screen.width<768,"direction-links":"",outline:"",color:"blue","active-design":"unelevated","active-color":"primary","active-text-color":"white"},null,8,["disable","modelValue","max","input"])])])],64)}}});var _=a(12807),A=a(88481),B=a(53999),E=a(88841),P=a(25173),I=a(3952),Q=a(50492),S=a(10386),R=a(23316),D=a(44189),z=a(58210),O=a(330),F=a(56384),M=a(13796),$=a(23954),L=a(61816),T=a(76031),U=a(54700),j=a(90124),Z=a(98582),G=a.n(Z);const J=(0,_.A)(k,[["__scopeId","data-v-f7fe9c20"]]),X=J;G()(k,"components",{QNoSsr:A.A,QList:B.A,QExpansionItem:E.A,QItemSection:P.A,QAvatar:I.A,QIcon:Q.A,QSeparator:S.A,QCard:R.A,QCardSection:D.A,QSpinner:z.A,QImg:O.A,QBtn:F.A,QItemLabel:M.A,QBadge:$.A,QRating:L.A,QBtnGroup:T.A,QPagination:U.A,QItem:j.A})}}]);