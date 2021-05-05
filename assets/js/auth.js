//modal for forgot password and register
Vue.component('modal', {
  template: '#rg-fp-modal',
})

Vue.component('message', {
  template: '#success-alert',
    props:['message'],
})
var v = new Vue({
    el:"#login",
    data:{
        userLogin:{username:'', password:''},
        message:'',
        formValidation:{},
        registerForm:false,        
         userRegister:{firstname:'', lastname:'',username:'',email:'',password:'',confirm_password:''},
        successMSG:'',
        rValidate:{},
        loginstate:false,
        registerstate:false
    },    
    methods:{
        login(){
          v.loginstate=true
            var userlogin = v.toFormData(v.userLogin);
            axios.post(url+'home/login', userlogin).then(function(response){
                if(response.data.error){
                    v.message = response.data.message;
                    v.loginstate=false
                }else{
                     window.location.href = response.data.message.success;
                }
            }) //for login user
        },        
         closeRegisterForm(){
            v.registerForm = false
            v.formValidation = {},
            v.rValidate=''
            v.userRegister = {
                firstname:'', 
                lastname:'',
                username:'',
                email:'',
                password:'',
                confirm_password:''} // 
         },
         register(){
           v.registerstate=true
            var regForm = v.toFormData(v.userRegister);
            axios.post(url+'home/register', regForm).then(function(response){
                if(response.data.success){
                    v.successMSG = response.data.message.success;
                    v.rValidate = '';
                    v.userRegister = {firstname:'', lastname:'',username:'',email:'',password:'',confirm_password:''}
                    v.registerForm = false
                     v.clearMSG()
                }else
                v.registerstate=false                   
                    v.rValidate = response.data.message;                
            }) // register user
        },
         clearMSG(){
            setTimeout(function(){
			 v.successMSG=''
			 },3000); //disappear alert message 
        },
        
          toFormData: function(obj){
			var form_data = new FormData();
			for(var key in obj){
				form_data.append(key, obj[key]);
			}
			return form_data;
		},
    }
})

