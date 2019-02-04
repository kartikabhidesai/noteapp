var Imagedraw = function () {
    var imagedrawindex = function () {
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
       
        $('body').on('click','.viewimage',function(){
            var image = $(this).attr('data-image');
            var htmlimg='<center><img style="border:5px;border-style: groove;"  src="'+baseurl+'uploads/file/'+image+'" alt="Logo"></center>';
            $('.addhtml').html(htmlimg);
           alert($html);
        });
       $('body').on('click','.yes-sure',function(){
            var id = $(this).attr('data-id');
            var token = $(this).attr('data-token');
            var image = $(this).attr('data-image');
            var data = { id : id ,_token :token,image:image};
            var url = baseurl + 'deletedrawimage';
            ajaxcall(url,data,function(output){
                handleAjaxResponse(output);
            });
        });
    };
    var imagedrawadd = function () {

        window.p = Painterro({
            id: 'conatinerqwe',
            initText: 'Press <strong>Prn Scr</strong>, Ctrl+V to paste a screenshot',
            changeHandler: function (state) {
                console.log('Something drawed: ', state);
                // localStorage.setItem('painterroImage', this.imageSaver.asDataURL())
            },
            saveHandler: function (image, done) {
                var formData = new FormData();
                var filename=$('#noteTitle').val();
                formData.append('fileupload', image.asBlob(), image.suggestedFileName());
                formData.append('filetitle', filename);
                // you can also pass suggested filename 
                // formData.append('image', image.asBlob(), image.suggestedFileName());
                var xhr = new XMLHttpRequest();
                xhr.open('POST', baseurl +'savedrawimage', true);
                xhr.onload = xhr.onerror = function () {
                    done(true);
                };
                xhr.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
//                      console.log(this.responseText);
                      var output = this.responseText;
                      handleAjaxResponse(output);
                    }
                }
                xhr.send(formData);
            },
            language: 'ca',
            availableLineWidths: [1, 2, 4, 8, 16, 64],
            availableEraserWidths: [1, 2, 4, 8, 16, 64],
            availableFontSizes: [1, 2, 4, 8, 16, 64],
            // how_to_paste_actions: ['replace_all'],

            //toolbarPosition: 'top',
            // fixMobilePageReloader: false,
            // defaultTool: 'line',
            //hiddenTools: ['line']
        }).show();
        const ctx = window.p.ctx;

        console.log(ctx);
        ctx.beginPath();
        ctx.moveTo(0, 0);
        ctx.lineTo(300, 150);
        ctx.strokeStyle = "#FF0000";
        ctx.stroke();

    };
    
    var imagedrawedit = function(){
         window.p = Painterro({
            id: 'conatinerqwe',
            initText: 'Press <strong>Prn Scr</strong>, Ctrl+V to paste a screenshot',
            changeHandler: function (state) {
                console.log('Something drawed: ', state);
                // localStorage.setItem('painterroImage', this.imageSaver.asDataURL())
            },
            saveHandler: function (image, done) {
                var formData = new FormData();
                var filename=$('#noteTitle').val();
                formData.append('fileupload', image.asBlob(), image.suggestedFileName());
                formData.append('filetitle', filename);
                // you can also pass suggested filename 
                // formData.append('image', image.asBlob(), image.suggestedFileName());
                var xhr = new XMLHttpRequest();
                xhr.open('POST', baseurl +'savedrawimage', true);
                xhr.onload = xhr.onerror = function () {
                    done(true);
                };
                xhr.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
//                      console.log(this.responseText);
                      var output = this.responseText;
                      handleAjaxResponse(output);
                    }
                }
                xhr.send(formData);
            },
            language: 'ca',
            availableLineWidths: [1, 2, 4, 8, 16, 64],
            availableEraserWidths: [1, 2, 4, 8, 16, 64],
            availableFontSizes: [1, 2, 4, 8, 16, 64],
            // how_to_paste_actions: ['replace_all'],

            //toolbarPosition: 'top',
            // fixMobilePageReloader: false,
            // defaultTool: 'line',
            //hiddenTools: ['line']
        }).show();
        const ctx = window.p.ctx;

        console.log(ctx);
        ctx.beginPath();
        ctx.moveTo(0, 0);
        ctx.lineTo(300, 150);
        ctx.strokeStyle = "#FF0000";
        ctx.stroke();
    };
    return{
        Init: function () {
            imagedrawindex();
        },
        Add: function () {
            imagedrawadd();
        },
        Edit:function(){
            imagedrawedit();
        },
    };
}();