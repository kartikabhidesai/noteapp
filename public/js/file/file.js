var File=function(){
    var fileindex=function(){
         $('body').on('click','.deletenote',function(){
          var id = $(this).attr('data-id');
            var token = $(this).attr('data-token');
             var image = $(this).attr('data-image');
            setTimeout(function(){
                $('.yes-sure:visible').attr('data-id',id);
                $('.yes-sure:visible').attr('data-image',image);
                $('.yes-sure:visible').attr('data-token',token);    
            },500);
       });
       
       $('body').on('click','.yes-sure',function(){
            var id = $(this).attr('data-id');
            var token = $(this).attr('data-token');
            var image = $(this).attr('data-image');
            var data = { id : id ,_token :token,image:image};
            var url = baseurl + 'delete-file';
            ajaxcall(url,data,function(output){
                handleAjaxResponse(output);
            });
        });
    };
    
    var fileadd=function(){
       var form = $('#add-file');
        var rules = {
//            filetitle: {required: true},
//            fileupload: {required: true},
        };
        handleFormValidate(form, rules, function(form) {
            handleAjaxFormSubmit(form);
        }); 

    };
    var editadd=function(){
       var form = $('#edit-file');
        var rules = {
//            filetitle: {required: true},
//            fileupload: {required: true},
        };
        handleFormValidate(form, rules, function(form) {
            handleAjaxFormSubmit(form);
        }); 

    };
    return{
      Init:function(){
        fileindex();  
      },
      Add:function(){
        fileadd();  
      },
      Edit:function(){
          editadd();
      },
    };
}();