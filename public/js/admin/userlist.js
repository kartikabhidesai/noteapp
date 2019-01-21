var Userlist = function() {

    var list = function() {

        $('.delete').click(function() {
            var dataid = $(this).attr('data-id');
            var token = $(this).attr('data-token');
            
            $('.yes-sure').attr('data-id', dataid);
            $('.yes-sure').attr('data-token', token);
        });
        
         $('.yes-sure').click(function() {
            var id = $(this).attr('data-id');
            var token = $(this).attr('data-token');
            
            $.ajax({
                type: "POST",
                
                url: baseurl + "ajaxAction",
                data: {'action': 'deleteuser','_token':token ,'id': id},
                success: function(data) {
                    handleAjaxResponse(data);
//                    var data = JSON.parse(data);
                }
            });
        });
        
        
         $('.deactive').click(function() {
            var dataid = $(this).attr('data-id');
            var dataurl = $(this).attr('data-url');
            var token = $(this).attr('data-token');
           
            $('.yes-sure-deactive').attr('data-id', dataid);
            $('.yes-sure-deactive').attr('data-url', dataurl);
            $('.yes-sure-deactive').attr('data-token',token);  
        });
        
       
        
        
        $('.yes-sure-deactive').click(function() {
            var id = $(this).attr('data-id');
            var token = $(this).attr('data-token');
            
            $.ajax({
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('input[name="_token"]').val(),
                },
                url: baseurl + "ajaxAction",
                data: {'action': 'deactiveUser','id': id,'_token' :token},
                success: function(data) {
                    handleAjaxResponse(data);
                }
            });
        });
        
         $('.active').click(function() {
            var dataid = $(this).attr('data-id');
            var dataurl = $(this).attr('data-url');
            var token = $(this).attr('data-token');
            $('.yes-sure-active').attr('data-id', dataid);
            $('.yes-sure-active').attr('data-token', token);
        });
        
        $('.yes-sure-active').click(function() {
            var id = $(this).attr('data-id');
             var token = $(this).attr('data-token');
            $.ajax({
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('input[name="_token"]').val(),
                },
                url: baseurl + "ajaxAction",
                data: {'action': 'activeUser','_token':token ,'id': id},
                success: function(data) {
                    handleAjaxResponse(data);
//                    var data = JSON.parse(data);
                }
            });
        });
        
       
    };
    
    var update=function(){
       var form = $('#edituserdetails');
        var rules = {
            first_name: {required: true},
            email: {required: true, email: true},
            role_type:{required: true},
        };
        handleFormValidate(form, rules, function(form) {
            handleAjaxFormSubmit(form);
        });  
    };
    
    var   changepass=function(){
        var form = $('#changepassword');
        var rules = {
            newpassword: {required: true},
            confirmPassword: {required: true,equalTo: "#newpassword"},
        };
        handleFormValidate(form, rules, function(form) {
            handleAjaxFormSubmit(form);
        });
    };
    return{
        Init: function() {
            list();
        },
        Edit:function(){
          update();  
        },
        Changepassword:function(){
            changepass();
        },
    };
}();