(window.webpackJsonp=window.webpackJsonp||[]).push([[9,5],{329:function(t,e,n){"use strict";n.r(e);n(8),n(6),n(5),n(4),n(7),n(29);var r=n(2),c=n(327),o=n(43),l=n(189),m={props:{name:String,color:String,link:String},data:function(){return{icons:l}},methods:{redirectTo:function(link){window.open(link,"_blank")}}},d=n(47),v=n(63),h=n.n(v),f=n(134),component=Object(d.a)(m,(function(){var t=this,e=t.$createElement,n=t._self._c||e;return n("div",{staticClass:"text-center mx-4 my-3"},[n("v-icon",{attrs:{"x-large":"",color:t.color},on:{click:function(e){return t.redirectTo(t.link)}}},[t._v("\n    "+t._s(t.icons.get(t.name).path)+"\n  ")])],1)}),[],!1,null,null,null),$=component.exports;function _(object,t){var e=Object.keys(object);if(Object.getOwnPropertySymbols){var n=Object.getOwnPropertySymbols(object);t&&(n=n.filter((function(t){return Object.getOwnPropertyDescriptor(object,t).enumerable}))),e.push.apply(e,n)}return e}function O(t){for(var i=1;i<arguments.length;i++){var source=null!=arguments[i]?arguments[i]:{};i%2?_(Object(source),!0).forEach((function(e){Object(r.a)(t,e,source[e])})):Object.getOwnPropertyDescriptors?Object.defineProperties(t,Object.getOwnPropertyDescriptors(source)):_(Object(source)).forEach((function(e){Object.defineProperty(t,e,Object.getOwnPropertyDescriptor(source,e))}))}return t}h()(component,{VIcon:f.a});var j={components:{ContactSocialMedia:$},validations:{name:{required:c.required,minLength:Object(c.minLength)(4)},surname:{required:c.required,minLength:Object(c.minLength)(4)},email:{required:c.required,minLength:Object(c.minLength)(4),email:c.email},description:{required:c.required,minLength:Object(c.minLength)(4)}},data:function(){return{name:null,surname:null,email:null,description:null,successMessage:!1}},computed:O(O({},Object(o.d)({locale:function(t){return t.locale},socialMedia:function(t){return t.layout.socialMedias}})),{},{nameErrors:function(){var t=[];return this.$v.name.$dirty?(!this.$v.name.minLength&&t.push(this.$t("contact.nameMinLength")),!this.$v.name.required&&t.push(this.$t("contact.nameRequired")),t):t},surnameErrors:function(){var t=[];return this.$v.surname.$dirty?(!this.$v.surname.minLength&&t.push(this.$t("contact.surnameMinLength")),!this.$v.surname.required&&t.push(this.$t("contact.surnameRequired")),t):t},descriptionErrors:function(){var t=[];return this.$v.description.$dirty?(!this.$v.description.minLength&&t.push(this.$t("contact.descriptionMinLength")),!this.$v.description.required&&t.push(this.$t("contact.descriptionRequired")),t):t},emailErrors:function(){var t=[];return this.$v.email.$dirty?(!this.$v.email.email&&t.push(this.$t("contact.emailMustBeValid")),!this.$v.email.required&&t.push(this.$t("contact.emailRequired")),t):t}}),watch:{locale:function(t,e){this.setPageTitle({title:this.$t("titles.contact")})}},created:function(){this.setPageTitle({title:this.$t("titles.contact")}),this.fetchSocialMedias()},methods:O(O(O({redirectToMail:function(){window.location.href="mailto:ibrahimturan002@gmail.com"}},Object(o.c)({setPageTitle:"layout/setPageTitle"})),Object(o.b)({fetchSocialMedias:"layout/fetchSocialMedias",sendContactForm:"layout/sendContactForm"})),{},{resetForm:function(){this.name=null,this.surname=null,this.email=null,this.description=null},sendForm:function(){var t=this;this.$v.$touch(),this.$v.$invalid||this.sendContactForm({name:this.name,surname:this.surname,email:this.email,description:this.description}).then((function(e,n){e&&(t.successMessage=!0,t.resetForm())}))}})},y=n(188),k=n(133),w=n(312),x=n(314),M=n(373),C=n(372),L=n(374),E=Object(d.a)(j,(function(){var t=this,e=t.$createElement,n=t._self._c||e;return n("v-row",{staticClass:"pa-2",attrs:{"no-gutters":"",justify:"start",align:"start"}},[n("v-col",{attrs:{cols:"12"}},[n("v-row",{attrs:{justify:"center",align:"center","no-gutters":""}},[n("v-col",{staticClass:"text-center",attrs:{cols:"12"}},[n("h1",[t._v(t._s(t.$t("contact.findMe")))])]),t._v(" "),t._l(t.socialMedia,(function(t){return n("v-col",{key:t.id,attrs:{cols:"auto"}},[n("ContactSocialMedia",{attrs:{name:t.name,color:t.color,link:t.link}})],1)}))],2)],1),t._v(" "),n("v-col",{attrs:{cols:"12"}},[n("v-row",{attrs:{justify:"center",align:"center","no-gutters":""}},[n("v-col",{staticClass:"text-center",attrs:{cols:"12"}},[n("h1",[t._v(t._s(t.$t("contact.contactMe")))])]),t._v(" "),n("v-col",{attrs:{cols:"12",sm:"12"}},[n("v-card",[n("v-row",{staticClass:"ma-0 pa-0",attrs:{justify:"center",align:"start"}},[n("v-col",{attrs:{cols:"12",sm:"6",xs:"12"}},[n("v-text-field",{attrs:{"error-messages":t.nameErrors,label:t.$t("contact.name"),filled:""},on:{change:function(e){return t.$v.name.$touch()},blur:function(e){return t.$v.name.$touch()}},model:{value:t.name,callback:function(e){t.name=e},expression:"name"}})],1),t._v(" "),n("v-col",{attrs:{cols:"12",sm:"6",xs:"12"}},[n("v-text-field",{attrs:{"error-messages":t.surnameErrors,label:t.$t("contact.surname"),filled:""},model:{value:t.surname,callback:function(e){t.surname=e},expression:"surname"}})],1),t._v(" "),n("v-col",{attrs:{cols:"12",xs:"12",sm:"12"}},[n("v-text-field",{attrs:{"error-messages":t.emailErrors,label:t.$t("contact.email"),filled:""},model:{value:t.email,callback:function(e){t.email=e},expression:"email"}})],1),t._v(" "),n("v-col",{staticClass:"pb-0",attrs:{cols:"12",xs:"12",sm:"12"}},[n("v-textarea",{attrs:{"error-messages":t.descriptionErrors,filled:"",label:t.$t("contact.description")},model:{value:t.description,callback:function(e){t.description=e},expression:"description"}})],1),t._v(" "),n("v-col",{attrs:{cols:"12",xs:"12",sm:"12",md:"12"}},[n("v-row",{staticClass:"ma-0 py-0",attrs:{justify:"end",align:"center"}},[n("v-col",{attrs:{cols:"auto"}},[n("v-btn",{attrs:{rounded:"",color:"error darken-1"},on:{click:function(e){return t.resetForm()}}},[t._v("\n                    "+t._s(t.$t("contact.reset"))+"\n                  ")])],1),t._v(" "),n("v-col",{attrs:{cols:"auto"},on:{click:function(e){return t.sendForm()}}},[n("v-btn",{attrs:{rounded:"",color:"success darken-2"}},[t._v("\n                    "+t._s(t.$t("contact.send"))+"\n                  ")])],1)],1)],1)],1)],1)],1)],1)],1),t._v(" "),n("v-snackbar",{attrs:{color:"success darken-2","multi-line":"",timeout:new Number(5e3),top:"",vertical:""},model:{value:t.successMessage,callback:function(e){t.successMessage=e},expression:"successMessage"}},[n("span",{staticClass:"font-weight-black"},[t._v(t._s(t.$t("contact.successMessage")))]),t._v(" "),n("v-btn",{attrs:{dark:"",text:""},on:{click:function(e){t.successMessage=!1}}},[t._v("\n      "+t._s(t.$t("contact.close"))+"\n    ")])],1)],1)}),[],!1,null,null,null);e.default=E.exports;h()(E,{VBtn:y.a,VCard:k.a,VCol:w.a,VRow:x.a,VSnackbar:M.a,VTextField:C.a,VTextarea:L.a})},377:function(t,e,n){"use strict";n.r(e);var r=n(329).default,c=n(47),component=Object(c.a)(r,void 0,void 0,!1,null,null,null);e.default=component.exports}}]);