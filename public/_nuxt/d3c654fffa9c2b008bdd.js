(window.webpackJsonp=window.webpackJsonp||[]).push([[7,10],{366:function(t,e,r){"use strict";r.r(e);r(9),r(7),r(5),r(4),r(8),r(29),r(41);var n=r(13),o=r(1),l=r(42);r(155);function c(object,t){var e=Object.keys(object);if(Object.getOwnPropertySymbols){var r=Object.getOwnPropertySymbols(object);t&&(r=r.filter((function(t){return Object.getOwnPropertyDescriptor(object,t).enumerable}))),e.push.apply(e,r)}return e}function d(t){for(var i=1;i<arguments.length;i++){var source=null!=arguments[i]?arguments[i]:{};i%2?c(Object(source),!0).forEach((function(e){Object(o.a)(t,e,source[e])})):Object.getOwnPropertyDescriptors?Object.defineProperties(t,Object.getOwnPropertyDescriptors(source)):c(Object(source)).forEach((function(e){Object.defineProperty(t,e,Object.getOwnPropertyDescriptor(source,e))}))}return t}var f={data:function(){return{orderTypes:[{id:0,text:this.$t("blog.latest"),orderBy:"desc",column:"created_at",value:"latest"},{id:3,text:this.$t("blog.mostLiked"),orderBy:"desc",column:"like",value:"mostLiked"},{id:2,text:this.$t("blog.mostViewed"),orderBy:"desc",column:"viewCount",value:"mostViewed"},{id:1,text:this.$t("blog.oldest"),orderBy:"asc",column:"created_at",value:"oldest"}],languages:[{id:0,text:this.$t("blog.turkish"),value:"tr"},{id:1,text:this.$t("blog.english"),value:"en"},{id:2,text:this.$t("blog.all"),value:"all"}]}},computed:d(d({},Object(l.d)({filters:function(t){return t.blog.filters}})),{},{language:{set:function(t){this.setLangFilter(t)},get:function(){return this.filters.language}},orderBy:{set:function(t){this.setOrderFilter(t)},get:function(){return this.filters.orderBy}},search:{set:function(t){this.setSearchFilter(t)},get:function(){return this.filters.search}}}),methods:d(d({},Object(l.c)({setLangFilter:"blog/SET_LANG_FILTER",setOrderFilter:"blog/SET_ORDER_FILTER",setSearchFilter:"blog/SET_SEARCH_FILTER"})),Object(l.b)({fetchPosts:"blog/fetchPosts"}))},v=r(49),h=r(66),m=r.n(h),y=r(344),_=r(434),w=r(435),O=r(436),x=r(437),P=r(345),j=r(442),E=r(371),component=Object(v.a)(f,(function(){var t=this,e=t.$createElement,r=t._self._c||e;return r("div",{attrs:{id:"blog-filter"}},[r("v-expansion-panels",[r("v-expansion-panel",[r("v-expansion-panel-header",{staticClass:"headline py-0",attrs:{"expand-icon":"mdi-menu-down"}},[t._v("\n        "+t._s(t.$t("blog.filter"))+"\n      ")]),t._v(" "),r("v-expansion-panel-content",{staticClass:"pa-0 ma-0"},[r("v-row",{attrs:{justify:"center"}},[r("v-col",{staticClass:"d-flex",attrs:{cols:"12",sm:"3"}},[r("v-select",{attrs:{items:t.languages,"item-value":t.languages.value,"item-text":t.languages.text,filled:"",label:t.$t("blog.language"),"hide-details":"","prepend-icon":"mdi-translate","single-line":"",dense:"","return-object":""},on:{input:function(e){return t.fetchPosts()}},model:{value:t.language,callback:function(e){t.language=e},expression:"language"}})],1),t._v(" "),r("v-col",{staticClass:"d-flex",attrs:{cols:"12",sm:"3"}},[r("v-select",{attrs:{items:t.orderTypes,"item-value":t.orderTypes.name,"item-text":t.orderTypes.value,filled:"",label:t.$t("blog.orderBy"),"hide-details":"","prepend-icon":"mdi-swap-vertical","single-line":"",dense:"","return-object":""},on:{input:function(e){return t.fetchPosts()}},model:{value:t.orderBy,callback:function(e){t.orderBy=e},expression:"orderBy"}})],1),t._v(" "),r("v-col",{attrs:{cols:"24",sm:"6",md:"6"}},[r("v-text-field",{attrs:{label:t.$t("blog.search"),filled:"","hide-details":"","prepend-icon":"mdi-magnify","single-line":"",dense:""},on:{keyup:function(e){return!e.type.indexOf("key")&&t._k(e.keyCode,"enter",13,e.key,"Enter")?null:t.fetchPosts()}},model:{value:t.search,callback:function(e){t.search=e},expression:"search"}})],1)],1)],1)],1)],1)],1)}),[],!1,null,null,null),C=component.exports;m()(component,{VCol:y.a,VExpansionPanel:_.a,VExpansionPanelContent:w.a,VExpansionPanelHeader:O.a,VExpansionPanels:x.a,VRow:P.a,VSelect:j.a,VTextField:E.a});var T={props:{post:Object},data:function(){return{show:!1,url:"http://www.ibrahimturan.me"}},methods:{openPost:function(t){this.$nuxt.$router.push("/blog/post/".concat(this.post.id))}}},k=r(143),V=r(50),D=r(147),$=r(199),S=r(438),L=Object(v.a)(T,(function(){var t=this,e=t.$createElement,r=t._self._c||e;return r("div",{attrs:{id:"blog-slide-group"}},[r("v-card",{staticClass:"mx-auto"},[t.post.image?r("v-img",{attrs:{src:t.url+t.post.image,height:"200px"}}):t._e(),t._v(" "),r("v-card-title",{staticStyle:{cursor:"pointer"},on:{click:function(e){return t.openPost(1)}}},[t._v("\n      "+t._s(t.post.title)+"\n    ")]),t._v(" "),r("v-card-text",{staticClass:"pb-0"},[r("v-row",[r("v-col",{attrs:{cols:"12"}},[t._v("\n          "+t._s(t.post.description)+"\n        ")]),t._v(" "),r("v-col",{staticClass:"font-weight-bold overline pr-1",attrs:{cols:"auto"}},[r("v-icon",[t._v("mdi-thumb-up-outline")]),t._v("\n          "+t._s(t.post.thumbsUps)+"\n        ")],1),t._v(" "),r("v-col",{staticClass:"font-weight-bold overline pr-1",attrs:{cols:"auto"}},[r("v-icon",[t._v("mdi-heart-outline")]),t._v("\n          "+t._s(t.post.hearts)+"\n        ")],1),t._v(" "),r("v-col",{staticClass:"font-weight-bold overline pr-1",attrs:{cols:"auto"}},[r("v-icon",[t._v("mdi-eye-outline")]),t._v("\n          "+t._s(t.post.viewCount)+"\n        ")],1),t._v(" "),r("v-spacer"),t._v(" "),r("v-col",{staticClass:"font-weight-bold overline",attrs:{cols:"auto"}},[t._v("\n          "+t._s(t.$nuxt.$moment(t.post.created_at).format("DD MM YYYY"))+"\n        ")])],1)],1)],1)],1)}),[],!1,null,null,null),M=L.exports;function R(object,t){var e=Object.keys(object);if(Object.getOwnPropertySymbols){var r=Object.getOwnPropertySymbols(object);t&&(r=r.filter((function(t){return Object.getOwnPropertyDescriptor(object,t).enumerable}))),e.push.apply(e,r)}return e}function B(t){for(var i=1;i<arguments.length;i++){var source=null!=arguments[i]?arguments[i]:{};i%2?R(Object(source),!0).forEach((function(e){Object(o.a)(t,e,source[e])})):Object.getOwnPropertyDescriptors?Object.defineProperties(t,Object.getOwnPropertyDescriptors(source)):R(Object(source)).forEach((function(e){Object.defineProperty(t,e,Object.getOwnPropertyDescriptor(source,e))}))}return t}m()(L,{VCard:k.a,VCardText:V.c,VCardTitle:V.d,VCol:y.a,VIcon:D.a,VImg:$.a,VRow:P.a,VSpacer:S.a});var F={components:{BlogPostItem:M,BlogFilter:C},data:function(){return{bottom:!1,pageLoading:!0,loading:!1}},computed:B({},Object(l.d)({locale:function(t){return t.locale},metaData:function(t){return t.layout.metaData},posts:function(t){return t.blog.posts},postMeta:function(t){return t.blog.postMeta}})),watch:{locale:function(t,e){this.setPageTitle({title:this.$t("titles.blog")})},bottom:function(t){var e=this;return Object(n.a)(regeneratorRuntime.mark((function r(){return regeneratorRuntime.wrap((function(r){for(;;)switch(r.prev=r.next){case 0:if(!(t&&e.postMeta.current_page<e.postMeta.last_page)||e.loading){r.next=8;break}return r.prev=1,e.loading=!0,r.next=5,e.fetchPosts({nextPage:!0});case 5:return r.prev=5,e.loading=!1,r.finish(5);case 8:case"end":return r.stop()}}),r,null,[[1,,5,8]])})))()}},created:function(){var t=this;return Object(n.a)(regeneratorRuntime.mark((function e(){return regeneratorRuntime.wrap((function(e){for(;;)switch(e.prev=e.next){case 0:if(t.pageLoading=!0,t.setPageTitle({title:t.$t("titles.blog")}),t.setPageTitleImage("/img/8.jpg"),e.prev=3,t.fetchMetaData){e.next=7;break}return e.next=7,t.fetchMetaData({path:"blog",lang:t.locale});case 7:return e.prev=7,t.pageLoading=!1,e.finish(7);case 10:if(0!==t.posts.length){e.next=15;break}return t.loading=!0,e.next=14,t.fetchPosts({nextPage:!1});case 14:t.loading=!1;case 15:window.addEventListener("scroll",(function(){t.bottom=t.bottomVisible()}));case 16:case"end":return e.stop()}}),e,null,[[3,,7,10]])})))()},methods:B(B(B({},Object(l.c)({setPageTitle:"layout/setPageTitle",setPosts:"blog/SET_POSTS",setPostMeta:"blog/SET_POST_META",setPageTitleImage:"layout/SET_PAGE_TITLE_IMAGE"})),Object(l.b)({fetchMetaData:"layout/fetchMetaData",fetchPosts:"blog/fetchPosts",addPosts:"blog/addPosts"})),{},{bottomVisible:function(){return document.documentElement.scrollTop+window.innerHeight===document.documentElement.offsetHeight}}),head:function(){return{title:this.metaData.title,meta:[{hid:this.metaData.hid,name:this.metaData.name,content:this.metaData.description}]}}},I=r(142),A=Object(v.a)(F,(function(){var t=this.$createElement,e=this._self._c||t;return this.pageLoading?e("div",{staticClass:"fill-height"},[e("v-row",{staticClass:"fill-height",attrs:{justify:"center",align:"center","no-gutters":""}},[e("v-col",{attrs:{cols:"12"}},[e("div",{staticClass:"text-center"},[e("v-progress-circular",{attrs:{size:70,width:7,color:"primary",indeterminate:""}})],1)])],1)],1):e("div",{attrs:{id:"blog"}},[e("v-row",{staticClass:"ma-0 pa-1",attrs:{justify:"start",align:"start",wrap:""}},[e("v-col",{attrs:{cols:"12"}},[e("blog-filter")],1)],1),this._v(" "),e("v-row",{staticClass:"ma-0 pa-1",attrs:{justify:"start",align:"start",wrap:""}},this._l(this.posts,(function(t){return e("v-col",{key:t.id,attrs:{md:"6",lg:"6",xl:"4"}},[e("blog-post-item",{attrs:{post:t}})],1)})),1),this._v(" "),e("v-row",{staticClass:"ma-0 pa-1",attrs:{justify:"start",align:"start",wrap:""}},[this.loading?e("v-col",{attrs:{cols:"12"}},[e("div",{staticClass:"text-center"},[e("v-progress-circular",{attrs:{size:70,width:7,color:"primary",indeterminate:""}})],1)]):this._e()],1)],1)}),[],!1,null,null,null);e.default=A.exports;m()(A,{VCol:y.a,VProgressCircular:I.a,VRow:P.a})},444:function(t,e,r){"use strict";r.r(e);var n=r(366).default,o=r(49),component=Object(o.a)(n,void 0,void 0,!1,null,null,null);e.default=component.exports}}]);