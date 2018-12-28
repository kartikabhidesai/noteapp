var Note=function(){
    var noteindex=function(){
       $('body').on('click','.deletenote',function(){
          var id = $(this).attr('data-id');
            var token = $(this).attr('data-token');
            setTimeout(function(){
                $('.yes-sure:visible').attr('data-id',id);
                $('.yes-sure:visible').attr('data-token',token);    
            },500);
       });
       
       $('body').on('click','.yes-sure',function(){
            var id = $(this).attr('data-id');
            var token = $(this).attr('data-token');
            var data = { id : id ,_token :token};
            var url = baseurl + 'delete-note';
            ajaxcall(url,data,function(output){
                handleAjaxResponse(output);
            });
        });
    };
    
    var addnote=function(){
        var form = $('#addnote');
        var rules = {
            noteTitle: {required: true},
            noteDescription: {required: true},
        };
        handleFormValidate(form, rules, function(form) {
            handleAjaxFormSubmit(form);
        });
    };
    
    var editnote=function(){
        var form = $('#editnote');
        var rules = {
            noteTitle: {required: true},
            noteDescription: {required: true},
        };
        handleFormValidate(form, rules, function(form) {
            handleAjaxFormSubmit(form);
        });
    };
    
    var viewnote=function(){
        
    };
    return{
      Init:function(){
        noteindex();  
      },
      Add:function(){
          addnote();
      },
      edit:function(){
          editnote();
      },
      view:function(){
          viewnote();
      },
    };
}();