var Changepassword=function(){
   var changepass=function(){
       var form = $('#changepassword');
        var rules = {
            oldpassword: {required: true},
            newpassword: {required: true},
            confirmpassword: {required: true,equalTo: "#newpassword"},
        };
        handleFormValidate(form, rules, function(form) {
            handleAjaxFormSubmit(form);
        }); 
   };
    return{
      Init:function(){
        changepass();  
      },
    };
}();