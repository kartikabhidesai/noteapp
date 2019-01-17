var Spreadsheet=function(){
    
    var spreadindex=function(){
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
            var url = baseurl + 'deletesheet';
            ajaxcall(url,data,function(output){
                handleAjaxResponse(output);
            });
        });
    };
    var addsheet=function(){
       
    $('#my').jexcel({
    //    csv:'https://bossanova.uk/components/bossanova-ui/demo/demo1.csv',
        colHeaders:  [ 'A', 'B', 'C', 'D', 'E' ],
        csvHeaders:true,
        colWidths: [150, 150, 150,150,150],
    });


        $('#addsheet').on('click', function () {
         
            var title=$("#noteTitle").val();
            var data=$('#my').jexcel('getData');
            var jsondata=JSON.stringify(data);
            if(title ==""){
               $("#noteTitle").css("border","1px solid red");
            }else{
               $("#noteTitle").css("border","1px solid #dfe3e9");
                var data = $('#my').jexcel('getData');
                var token=$("#_token").val();
                var jsondata=JSON.stringify(data);
                  $.ajax({
                          // dataType : 'json',
                          type: "POST",
                            headers: {
                              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                              },
                          url: baseurl+"ajaxcall",
                          data: {'title':title,'jsondata': jsondata,'_token':token},
                          success: function(dataw) {
                            var  output = JSON.parse(dataw);
                            showToster(output.status, output.message, '');
                            window.location.href = output.redirect;
                          }
                      });
            }
  
});

    };
    
    var editsheet=function(){
        $('#my').jexcel({ data:data, colWidths: [100, 100, 100,100,100] });
        
        $('#addsheet').on('click', function () {
         
            var title=$("#noteTitle").val();
            var data=$('#my').jexcel('getData');
            var jsondata=JSON.stringify(data);
            if(title ==""){
               $("#noteTitle").css("border","1px solid red");
            }else{
               $("#noteTitle").css("border","1px solid #dfe3e9");
                var data = $('#my').jexcel('getData');
                var id=$("#id").val();
                var token=$("#_token").val();
                var jsondata=JSON.stringify(data);
                  $.ajax({
                          // dataType : 'json',
                          type: "POST",
                            headers: {
                              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                              },
                          url: baseurl+"ajaxcalledit",
                          data: {'id':id,'title':title,'jsondata': jsondata,'_token':token},
                          success: function(dataw) {
                            var  output = JSON.parse(dataw);
                            showToster(output.status, output.message, '');
                            window.location.href = output.redirect;
                          }
                      });
            }
  
});
    };
    return{
      Init:function(){
        spreadindex();  
      },
      Add:function(){
        addsheet();  
      },
      Edit:function(){
          editsheet();
      },
    };
}();