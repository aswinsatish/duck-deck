
$(document).ready(function(){
    $("input[type='radio']").click(function(){
        var radioValue = $("input[name='utype']:checked").val();
        if(radioValue){
            //alert("Your are a - " + radioValue);
            $('#usertype').val(radioValue);
        }

    });

});

$("input[type='radio']").click(function(){
        var radioValue = $("input[name='utyp']:checked").val();
        if(radioValue){
            //alert("Your are a - " + radioValue);
            $('#usertyp').val(radioValue);
        }

    });
   $('#username').keyup(function() {
    $('#loginerror').html('').removeClass('validation failed');
    });

  $('#shareemail').keyup(function() {
    $('#shareemail_error').html('').removeClass('validation failed');
   });


	$(document).on('keyup','[data-action="clear"]',function(){
			$('.msgdesc').html('');
		});
		$(document).on('click','[data-action="switch"]',function(){
			var target=$(this).data("target");
			$('.editor-deck-panel').addClass('hide');
			$(target).removeClass('hide');
			if (history.pushState) {
				var newurl = window.location.protocol + "//" + window.location.host + window.location.pathname + '?view='+target.substr(1);
				window.history.pushState({path:newurl},'',newurl);
			}
		})

		$(document).on('click','#create',function(){

			var isValid= validateForm("#signup input");
 			if(isValid){


				savesignin();
			} 
		});
        $(document).on('click','#reset',function(){

        var isValid= validateForm("#recover input");
         if(isValid)
         {
                  saverecoverpassword();
         }
        });
    $('#confirmpassword').keydown(function (event)
    {

    var keypressed = event.keyCode || event.which;
    if (keypressed == 13)
    {
        var isValid= validateForm("#recover input");
        if(isValid){
            saverecoverpassword();
        }
    }
         });
		function validateForm(par){
			var isValid = true; 
			 $(par).each(function() {
				  if(this.required && this.value==''){
					$(this).next('p').remove();
					$(this).after('<p class="validation failed">'+$(this).attr('data-error')+'</p>');
					isValid = false;
				}else{
					$(this).next('p').remove();
					if($(this).attr('data-pattern')!=undefined && this.value!=''){  
							if(ispatternValid(this.value,$(this).attr('data-pattern')))
							{
								$(this).next('p').remove();
								
								
							}else{
								$(this).next('p').remove();
								$(this).after('<p class="validation failed">'+$(this).attr('data-patternError')+'</p>');
								isValid = false;
							}
					}
					if($(this).attr('data-minlength')!=undefined && this.value!=''){
							if($(this).attr('data-minlength') >= this.value.length){
								$(this).next('p').remove();
								$(this).after('<p class="validation failed">'+$(this).attr('data-minlength-Error')+'</p>');
								isValid = false;
 							}
					}
					if($(this).attr('data-password')!=undefined && this.value!=''){ 
						var password=$(this).val();
						var password_length=$(this).val().length;
						if (password_length <= 4) {
							$(this).next('p').remove();
							$(this).after('<p class="validation failed">'+$(this).attr('data-short-error')+'</p>');
							isValid = false;
						} else if (password_length > 4 && password_length <= 8) {
							$(this).next('p').remove();
							$(this).after('<p class="validation failed">'+$(this).attr('data-week-error')+'</p>');
							isValid = false;
						}
						else if (password_length >= 9) {
							if (password.match(/([0-9])/) && password.match(/([!,%,&,@,#,$,^,*,?,_,~])/) && password.match(/([a-zA-Z])/)) {
								$(this).next('p').remove();
								$(this).after('<p class="validation success">'+$(this).attr('data-success-message')+'</p>');
 							}
							else {
								$(this).next('p').remove();
								$(this).after('<p class="validation failed">'+$(this).attr('data-week-error')+'</p>');
								isValid = false;
  							}
						}
					}
					if($(this).attr('data-parent')!=undefined && this.value!='')
					{  
						var parent=$(this).attr('data-parent'); 
						var button=$(this).attr('data-button');
							if($(parent).val()!=this.value){
								$(this).next('p').remove();
								$(this).after('<p class="validation failed">'+$(this).attr('data-mismatch-Error')+'</p>');
								isValid = false;
								$(button).prop('disabled', false);
							}
							else{
								$(parent).next('p').remove();
								$(this).next('p').remove();
								$(this).after('<p class="validation success">'+$(this).attr('data-success-message')+'</p>');
								$(button).prop('disabled', true);
 							}
					}
				}
			 });
			 
			 return isValid;
		}
		$(document).on('blur','[data-validation="validate"]',function()
        {
	 		validateForm(this);
	 	});
 
		function ispatternValid(code,pattern) {
			var pattern = new RegExp(pattern);
			return pattern.test(code);
		};
 
		$(document).on('click','#recoverpassword',function(){
			
			var isValid= validateForm("#forgotaccount input");
			if(isValid)
			{
			 saverecoverpswd();
			}
	 	});

    $(document).on('click','#loggin',function(){
        var isValid= validateForm("#signin input");
        if(isValid)
        {
            saveloggin();
        }
    });


    $('#password').keydown(function (event)
    {

        var keypressed = event.keyCode || event.which;
        if (keypressed == 13)
        {
            var isValid= validateForm("#signin input");
            if(isValid){
                saveloggin();
            }
        }
    });
    $('#pswd').keydown(function (event)
    {

        var keypressed = event.keyCode || event.which;
        if (keypressed == 13)
        {
            var isValid= validateForm("#signup input");
            if(isValid){
                savesignin();
            }
        }
    });
    $('#fusername').keydown(function (event)
    {

        var keypressed = event.keyCode || event.which;
        if (keypressed == 13)
        {
            var isValid= validateForm("#forgotaccount input");
            if(isValid)
            {
                saverecoverpswd();
            }
        }
    });
	function saverecoverpassword()
    {
		

		var email = $('#emailid').val();
		var uid = $('#uid').val();
		newpassword=$('#newpassword').val();
		$.ajax({
			type: "POST",
			url: "/Login/resetpwd",
			data: ({newpassword:newpassword,email:email,uid:uid}),
			success: function(data)
			{
                $('#message').html('You have successfully updated your password').addClass('validation success');
                setTimeout(function(){
                    $("#message").html('');
                }, 8000);

			}
		});
        location.href = "/Login/index";
	  
	}


    function saveloggin()
    {

        var username = $('#username').val();
        var password = $('#password').val();
        var deckid = $('#deckid').val();
        if(username.trim()!='' && password.trim()!='')
        {
            $.ajax({
                type: "POST",
                url: "/Login/signin",
                data: ({username:username,password:password,deckid:deckid}),
                success: function(req)
                {
                    //alert(req);
                    var res=req.split("||");
                    if(res[0].trim()=='yes'){
                        location.href='/'+res[1]+'/'+res[2];
                    }
                    else{
                        $('#loginerror').html(res[1]).addClass('validation failed');
                    }
                }
            });
        }
    }

    function savesignin()
    {
        var email=$('#email').val();
        var pswd=$('#pswd').val();
        var type=$('#usertype').val();
        var deckid = $('#deckid').val();
        if(type=='')
        {
            utyp='entrepreneur';
        }
         else
        {
            utyp=type;
        }
        $.ajax({
            type: "POST",
            url: "/Login/create",
            data: ({email:email,pswd:pswd,utype:utyp,deckid:deckid}),
            success: function(req)
            {
                //alert(req);
                $("[data-target='#signup'][data-action='switch'] ").trigger('click');
                var res=req.split("||");
                if(res[0].trim()=='yes'){
                    location.href='/'+res[1]+'/'+res[2];
                }
                else{
                    $('#email').next('p').remove;
                    $('#email').after('<p class="validation failed">'+res[1]+'</p>');
                }
            }
        });
    }

    function saverecoverpswd()
    {
        var fusername = $('#fusername').val();
            $.ajax({
                type: "POST",
                url: "/Login/recover_password",
                data: ({fusername:fusername}),
                success: function(req)
                {
                    if(req==0)
                    {
                        $("[data-target='#forgotaccount'][data-action='switch'] ").trigger('click');
                        $('#fusername').after('<p class="validation failed">Please enter a valid email address</p>');


                    }
                    else
                    {
                        var res=req.split("||");
                        var email=res[1];
                        var uid=res[0];
                        $('#uid').val(uid);
                        $('#emailid').val(email);
                        $.ajax({
                            type: "POST",
                            url: "/Login/forgot_password",
                            data: ({fusername:fusername,uid:uid}),
                            success: function(req)
                            {
                                $('#mailmsg').html('Mail has been sent successfully').addClass('validation success');
                            }
                        });

                    }
                }
            });

    }
    function savedeck(id)
    {
        content_id=id;
        var update_content='';
        update_id=$('#org_id').val();
        update_content=$('#'+content_id).val();
        table_name='dk_organisation';
        field_name='id';
        savedeckdetails(update_id,content_id,update_content,table_name,field_name);

    }
    function savedeckdetails(org_id,content_id,update_content,table_name,field_name)
    {
        //console.log(org_id,content_id,update_content,table_name,field_name);
        $.ajax({
            type: "POST",
            url: "/Deck/updateorganization",
            data: ({org_id:update_id,content_id:content_id,update_content:update_content,table_name:table_name,field_name:field_name}),
            success: function (data)
            {
                var arrdata = data;
                dname.innerHTML=arrdata;
            }
        });
    }
    function savedeckurl(id)
    {
        content_id=id;
        var update_content='';
        update_id=$('#org_id').val();
        update_content=$('#'+content_id).val();
        table_name='dk_organisation';
        field_name='id';
        savedeckurldet(update_id,content_id,update_content,table_name,field_name);

    }
    function savedeckurldet(org_id,content_id,update_content,table_name,field_name)
    {
        //console.log(org_id,content_id,update_content,table_name,field_name);
        $.ajax({
            type: "POST",
            url: "/Deck/updateorganization",
            data: ({org_id:update_id,content_id:content_id,update_content:update_content,table_name:table_name,field_name:field_name}),
            success: function (data)
            {
                if(data=='')
                {
                    var arrdata = 'deck_name';
                }
                else
                {
                    var arrdata = data;
                }

                dename.innerHTML=arrdata;
            }
        });
    }

function checklogin(id)
{
    content_id=id;
    $('#error').show();

}
    function saveorganisation(id)
    {
        content_id=id;
        //alert(content_id);
        var update_content='';
        update_id=$('#deck_name').val();
        if(content_id=='deck_name')
        {
            update_content = $('#' + content_id).val();
            
            if (update_content=='')
            {
                $('#error1').show();

            }
            else
            {
                table_name = 'dk_organisation';
                field_name = 'id';
                $.ajax({
                    type: "POST",
                    url: "/Deck/createorganization",
                    data: ({
                        org_id: update_id,
                        content_id: content_id,
                        update_content: update_content,
                        table_name: table_name,
                        field_name: field_name
                    }),
                    success: function (data) {
                        // alert(data);
                        var arrdata = data.split("||");
                        var orgid = arrdata[0];
                        $('#org_id').val(orgid);
                        var encorgid = arrdata[1];
                        var dname = arrdata[2];
                        dename.innerHTML=dname;
                        // alert( encorgid);
                        //alert(orgid);
                        $('#encorid').val(encorgid);

                        $('#successmodal').show();
                        //alert('success');


                    }
                });
            }
        }
        else
        {
            $('#error').show();
        }
    }
    function saveorg()
    {
        $('#successmodal').hide();
        orgid = $('#encorid').val();
        //alert(orgid);
        ChangeUrl('Page1','/Deck/editdeck/' + orgid);
        location.reload();

    }
    function ChangeUrl(page, url)
    {
        if (typeof (history.pushState) != "undefined")
        {
            var obj = { Page: page, Url: url };
            history.pushState(obj, obj.Page, obj.Url);
        }
    }
    $('#formlogo').each( function() {
        var formData = new FormData($('#formlogo')[0]);

        var form = $(this);
        form.fileupload({
            url: form.attr('action'),
            type: 'POST',
            datatype: 'xml',
            add: function (event, data) {
                $("#files").append($("#fileUploadProgressTemplate").tmpl());
                // Message on unLoad.
                window.onbeforeunload = function() {
                    return 'You have unsaved changes.';
                };
                // Submit
                $.LoadingOverlay("show");
                data.submit();

            },

            progress: function(e, data){

                // This is what makes everything really cool, thanks to that callback
                // you can now update the progress bar based on the upload progress.
                var percent = Math.round((data.loaded / data.total) * 100);
                $("#pbarArea").html(percent + "%");
                $("#files").find(".progress-bar").width(percent + "%");
            },
            fail: function(e, data) {
                // Remove 'unsaved changes' message.
                window.onbeforeunload = null;
                $('.progress-bar').css('width', '100%').addClass('red');
            },
            done: function (event, data) {
                window.onbeforeunload = null;
                // Fill the name field with the file's name.

                $('#editlogo1').val(data.originalFiles[0].name);
                $.LoadingOverlay("hide");
                $('#logosave').show();

            },
        });
    });
    $("#imglogo-edit").change(function(){

        if( $('#imglogo-edit').val()!=""){

            $('#remove').show();
            $('#imglogo-edit').show('slow');
        }
        else{ $('#remove').hide();$('#imglogo-edit').hide('slow');}
        readurl(this);
    });
    function readurl(input) {
        var form = $("#formlogo");
        console.log("form "+form.attr('action'));


        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#image_logo').attr('src', e.target.result);
                $('#ilogo').attr('src', e.target.result);
                $('#imlogo').attr('src', e.target.result);

            }

            reader.readAsDataURL(input.files[0]);

        }
    }
    $('#formcover').each( function() {
        var formData = new FormData($('#formcover')[0]);
        var form = $(this);
        form.fileupload({
            url: form.attr('action'),
            type: 'POST',
            datatype: 'xml',
            add: function (event, data) {
                $("#files").append($("#fileUploadProgressTemplate").tmpl());
                window.onbeforeunload = function() {
                    return 'You have unsaved changes.';
                };
                $.LoadingOverlay("show");
                data.submit();

            },

            progress: function(e, data){


                var percent = Math.round((data.loaded / data.total) * 100);
                $("#pbarArea").html(percent + "%");
                $("#files").find(".progress-bar").width(percent + "%");
            },
            fail: function(e, data) {
                window.onbeforeunload = null;
                $('.progress-bar').css('width', '100%').addClass('red');
            },
            done: function (event, data) {
                window.onbeforeunload = null;
                $('#editfname1').val(data.originalFiles[0].name);
                $.LoadingOverlay("hide");
                $('#coversave').show();

            },
        });
    });

    function readurl1(input) {
        var form = $("#formcover");
        console.log("form "+form.attr('action'));
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#image_cover').attr('src', e.target.result);
                $('#img_cover').attr('src', e.target.result);

            }

            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#imgcover-edit").change(function(){

        if( $('#imgcover-edit').val()!=""){

            $('#remove').show();
            $('#imgcover-edit').show('slow');
        }
        else{ $('#remove').hide();$('#imgcover-edit').hide('slow');}
        readurl1(this);
    });
    function save_cover()
    {
        $.LoadingOverlay("show");
        org_id = $('#org_id').val();
        uniq_id1 = $('#hiddenuniq_id1').val();
        cover_name = $('#editfname1').val();

        $.ajax({
            type: "POST",
            url: "/Deck/updatecoverimg",
            data: ({org_id:org_id,cover_name:uniq_id1+'_'+cover_name}),
            success: function (data)
            {
                $.LoadingOverlay("hide");
                $('#coversave').hide();

            }
        });
    }
    function cancel_cover()
    {
        var encrid = $('#encrid').val();
        location.href='/Deck/editdeck/'+encrid;

    }
   function cancel_team()
   {
    var encrid = $('#encrid').val();
    location.href='/Deck/editdeck/'+encrid;

   }
    function save_logo()
    {
        $.LoadingOverlay("show");
        org_id = $('#org_id').val();
        uniq_id1 = $('#hiddenuniq_ids').val();
        cover_name = $('#editlogo1').val();
        $.ajax({
            type: "POST",
            url: "/Deck/updatelogoimg",
            data: ({org_id:org_id,logo_name:uniq_id1+'_'+cover_name}),
            success: function (data)
            {
                $.LoadingOverlay("hide");
                $('#logosave').hide();

            }
        });
    }
    function cancel_logo()
    {
        var encrid = $('#encrid').val();
        location.href='/Deck/editdeck/'+encrid;

    }
    function valuation_percent()
    {
        var $this = $( '#investment_sought');
        var input  = $this.val();
        var input = input.replace(/[\D\s\._\-]+/g, "");
        input = input ? parseInt( input, 10 ) : 0;

        $this.val( function() {
            return ( input === 0 ) ? "" : input.toLocaleString( "en-US" );
        } );

        var fund1= input;
        var txtFirstNumberValue = fund1;
        var txtSecondNumberValue =document.getElementById('equity').value;
        var txtThirdNumberValue =parseInt(txtSecondNumberValue)/100;
        var txtfourthNumberValue=parseInt(txtFirstNumberValue)/txtThirdNumberValue;
        var result = parseInt(txtfourthNumberValue)-parseInt(txtFirstNumberValue);
        if (!isNaN(result))
        {
            document.getElementById('valuation').value = result;
            org_id = $('#org_id').val();
            var $this = $( '#valuation' );
            var input  = $this.val();
            var input = input.replace(/[\D\s\._\-]+/g, "");
            input = input ? parseInt( input, 10 ) : 0;
            $this.val( function() {
                return ( input === 0 ) ? "" : input.toLocaleString( "en-US" );
            } );
            result1=$('#valuation').val();
            savefundsdetails(org_id,"valuation",result1,"dk_organisation","id");
        }
    }
    function saveprevfunds(id)
    {

        content_id=id;
        var update_content='';
        update_id=$('#org_id').val();
        update_content=$('#'+content_id).val();
        table_name='dk_previous_fund';
        field_name='org_id';
        saveprevfundsdetails(update_id,content_id,update_content,table_name,field_name);
    }
    function saveprevfundsdetails(org_id,content_id,update_content,table_name,field_name)
    {
        //console.log(org_id,content_id,update_content,table_name,field_name);
        $.ajax({
            type: "POST",
            url: "/Deck/updateorganization",
            data: ({org_id:org_id,content_id:content_id,update_content:update_content,table_name:table_name,field_name:field_name}),
            success: function (data)
            {

                var arrdata = data.split("||");
                if(arrdata[0]!='')
                {

                    var input = arrdata[0];
                    var input = input.replace(/\,/g, '');
                    if (input >= 1e3) {
                        var input = parseFloat(input);
                        var units = ["k", "M", "B", "T"];
                        var unit = Math.floor(((input).toFixed(0).length - 1) / 3) * 3
                        var num = (input / ('1e' + unit)).toFixed(2)
                        var unitname = units[Math.floor(unit / 3) - 1]
                        var currency = num + unitname;
                    }
                }
                else
                {
                    var currency = 'Fund';
                }
                if(arrdata[1]=='')
                {
                    var dated1 = 'Date';
                }
                else
                {
                    var dated1 = arrdata[1];
                }
                if(arrdata[2]=='')
                {
                    var currency1 = 'Fund';
                }
                else
                {
                    var input = arrdata[2];
                    var input = input.replace(/\,/g, '');
                    if (input >= 1e3) {
                        var input = parseFloat(input);
                        var units = ["k", "M", "B", "T"];
                        var unit = Math.floor(((input).toFixed(0).length - 1) / 3) * 3
                        var num = (input / ('1e' + unit)).toFixed(2)
                        var unitname = units[Math.floor(unit / 3) - 1]
                        var currency1 = num + unitname;
                    }
                }
                if(arrdata[3]=='')
                {
                    var dated2 = 'Date';
                }
                else
                {
                    var dated2 = arrdata[3];
                }
                day1.innerHTML=dated1;
                crcy.innerHTML=currency;
                day2.innerHTML=dated2;
                crcy1.innerHTML=currency1;
                day3.innerHTML=dated1;
                crcy3.innerHTML=currency;
                day4.innerHTML=dated2;
                crcy4.innerHTML=currency1;
                day5.innerHTML=dated1;
                crcy5.innerHTML=currency;
                day6.innerHTML=dated2;
                crcy6.innerHTML=currency1;
            }
        });
    }
    function savefunds(id)
    {

        content_id=id;
        var update_content='';
        update_id=$('#org_id').val();
        update_content=$('#'+content_id).val();
        table_name='dk_organisation';
        field_name='id';
        savefundsdetails(update_id,content_id,update_content,table_name,field_name);
    }

    function savefundsdetails(org_id,content_id,update_content,table_name,field_name)
    {
        //console.log(org_id,content_id,update_content,table_name,field_name);
        $.ajax({
            type: "POST",
            url: "/Deck/updateorganization",
            data: ({org_id:org_id,content_id:content_id,update_content:update_content,table_name:table_name,field_name:field_name}),
            success: function (data)
            {
                var arrdata = data.split("||");
                if(arrdata[0]!='') {
                    var input = arrdata[0];
                    var input = input.replace(/\,/g, '');
                    if (input >= 1e3) {
                        var input = parseFloat(input);
                        var units = ["k", "M", "B", "T"];
                        var unit = Math.floor(((input).toFixed(0).length - 1) / 3) * 3
                        var num = (input / ('1e' + unit)).toFixed(2)
                        var unitname = units[Math.floor(unit / 3) - 1]
                        var type = '$';
                        var fcurrency = num + unitname;
                    }
                }
                else
                {
                    var fcurrency = 'Value';
                    var type='$';
                }
                if(arrdata[1]=='')
                {
                    var pretype = 'Pre-Money';
                }
                else
                {
                    var pretype = arrdata[1];
                }
                if(arrdata[2]=='')
                {
                    var type='$';
                    var sought = 'Value';
                }
                else
                {

                    var input =  arrdata[2];
                    var input = input.replace(/\,/g,'');
                    if (input >= 1e3) {
                        var input = parseFloat(input);
                        var units = ["k", "M", "B", "T"];
                        var unit = Math.floor(((input).toFixed(0).length - 1) / 3) * 3
                        var num = (input / ('1e' + unit)).toFixed(2)
                        var unitname = units[Math.floor(unit / 3) - 1]
                        var type='$';
                        var sought = num + unitname;
                    }

                }
                if(arrdata[3]=='')
                {
                    var equty = '--% equity';
                }
                else
                {
                    var equty = arrdata[3];
                }
                if(arrdata[4]=='')
                {
                    var valtn = 'Value';
                    var type='$';
                }
                else {
                    var input = arrdata[4];
                    var input = input.replace(/\,/g, '');
                    if (input >= 1e3) {
                        var input = parseFloat(input);
                        var units = ["k", "M", "B", "T"];
                        var unit = Math.floor(((input).toFixed(0).length - 1) / 3) * 3
                        var num = (input / ('1e' + unit)).toFixed(2)
                        var unitname = units[Math.floor(unit / 3) - 1]
                        var type = '$';
                        var valtn = num + unitname;


                    }
                }
                if(arrdata[5]=='')
                {
                    var pmoney = 'Pre-Money';
                }
                else
                {
                    var pmoney = arrdata[5];
                }
                if(arrdata[6]=='')
                {
                    var rcurrency = 'Value';
                    var type='$';
                }
                else {
                    var input = arrdata[6];
                    var input = input.replace(/\,/g, '');
                    if (input >= 1e3) {
                        var input = parseFloat(input);
                        var units = ["k", "M", "B", "T"];
                        var unit = Math.floor(((input).toFixed(0).length - 1) / 3) * 3
                        var num = (input / ('1e' + unit)).toFixed(2)
                        var unitname = units[Math.floor(unit / 3) - 1]
                        var type = '$';
                        var rcurrency = num + unitname;
                    }
                }
                if(arrdata[7]=='')
                {
                    var eseq = 'Profitable';
                }
                else
                {
                    var eseq = arrdata[7];
                }
                invst.innerHTML=type+sought;
                eqty.innerHTML=equty;
                val.innerHTML=type+valtn;
                fcy.innerHTML=type+fcurrency;
                rcy.innerHTML=type+ rcurrency;
                invst1.innerHTML=type+sought;
                eqty1.innerHTML=equty;
                val1.innerHTML=type+valtn;
                fcy1.innerHTML=type+fcurrency;
                rcy1.innerHTML=type+ rcurrency;
                invst2.innerHTML=type+sought;
                eqty2.innerHTML=equty;
                val2.innerHTML=type+valtn;
                fcy2.innerHTML=type+fcurrency;
                rcy2.innerHTML=type+ rcurrency;


            }
        });
    }
    function prev_fund_format(){
        var $this = $( '#pre1_commited_money' );
        var input  = $this.val();
        var input = input.replace(/[\D\s\._\-]+/g, "");
        input = input ? parseInt( input, 10 ) : 0;
        $this.val( function() {
            return ( input === 0 ) ? "" : input.toLocaleString( "en-US" );
        } );
    }
    function est_revenue_format()
    {
        var $this = $( '#estimated_sequence' );
        var input  = $this.val();
        var input = input.replace(/[\D\s\._\-]+/g, "");
        input = input ? parseInt( input, 10 ) : 0;
        $this.val( function()
        {
            return ( input === 0 ) ? "" : input.toLocaleString( "en-US" );
        } );
    }
    function revenue_format()
    {
        var $this = $( '#revenue_currency' );
        var input  = $this.val();
        var input = input.replace(/[\D\s\._\-]+/g, "");
        input = input ? parseInt( input, 10 ) : 0;
        $this.val( function()
        {
            return ( input === 0 ) ? "" : input.toLocaleString( "en-US" );
        } );
    }
    function fundcurrency_format()
    {
        var $this = $( '#fund_currency' );
        var input  = $this.val();
        var input = input.replace(/[\D\s\._\-]+/g, "");
        input = input ? parseInt( input, 10 ) : 0;
        $this.val( function()
        {
            return ( input === 0 ) ? "" : input.toLocaleString( "en-US" );
        } );
    }
    function currency_format(){
        var $this = $( '#currency' );
        var input  = $this.val();
        var input = input.replace(/[\D\s\._\-]+/g, "");
        input = input ? parseInt( input, 10 ) : 0;
        $this.val( function() {
            return ( input === 0 ) ? "" : input.toLocaleString( "en-US" );
        } );
    }
    function currency1_format(){
        var $this = $( '#currency1' );
        var input  = $this.val();
        var input = input.replace(/[\D\s\._\-]+/g, "");
        input = input ? parseInt( input, 10 ) : 0;
        $this.val( function() {
            return ( input === 0 ) ? "" : input.toLocaleString( "en-US" );
        } );
    }
    function savecompany(id)
    {
        content_id=id;
        var update_content='';
        update_id=$('#org_id').val();
         update_content=$('#'+content_id).val();
         table_name='dk_organisation';
         field_name='id';
        savecompanydet(org_id,content_id,update_content,table_name,field_name);

    }
    function savecompanydet(org_id,content_id,update_content,table_name,field_name)
    {
        //console.log(org_id,content_id,update_content,table_name,field_name);
        $.ajax({
            type: "POST",
            url: "/Deck/updateorganization",
            data: ({org_id:update_id,content_id:content_id,update_content:update_content,table_name:table_name,field_name:field_name}),
            success: function (data)
            {
                var arrdata = data.split("||");
                if(arrdata[0]!='')
                {
                    var orgname = arrdata[0];
                }
                else
                {
                    var orgname = 'Company Name';
                }
                if(arrdata[1]=='')
                {
                    var orgdesc = 'Simple strapline that explains company purpose';
                }
                else
                {
                    var orgdesc = arrdata[1];
                }
                if(arrdata[2]=='')
                {
                    var oregnum = 'CN: 123456789';

                }
                else
                {
                    var oregnum = arrdata[2];
                }
                if(arrdata[3]=='')
                {
                    var orloc = 'City, Country';
                }
                else
                {
                    var orloc = arrdata[3];
                }
                if(arrdata[4]=='')
                {
                    var osector = 'Sector';
                }
                else
                {
                    var osector = arrdata[4];
                }
                if(arrdata[5]=='')
                {
                    var website = 'Website';
                }
                else
                {
                    var website = arrdata[5];
                }
                if(arrdata[6]=='')
                {
                    var date = 'Date';
                }
                else
                {
                    var date = arrdata[6];
                }
                if(arrdata[7]=='')
                {
                    var linkedin = 'Social link';
                }
                else
                {
                    var linkedin = arrdata[7];

                }
                if(arrdata[8]=='')
                {
                    var tweet = 'Social link';
                }
                else
                {
                    var tweet = arrdata[8];
                }
                if(arrdata[9]=='')
                {
                    var facebok = 'Social link';
                }
                else
                {
                    var facebok = arrdata[9];
                }
                cname.innerHTML=orgname;
                cdesc.innerHTML=orgdesc;
                regnumber.innerHTML=oregnum;
                loc.innerHTML=orloc;
                sec.innerHTML=osector;
                web.innerHTML=website;
                dated.innerHTML=date;
                fb.innerHTML=facebok;
                twitter.innerHTML=tweet;
                linked.innerHTML=linkedin;
            }
        });
    }

    function savewhat(id)
        {

            content_id=id;
            var update_content='';
            update_id=$('#org_id').val();
            update_content=$('#'+content_id).val();
            table_name='dk_organisation';
            field_name='id';
            savewhatdetails(update_id,content_id,update_content,table_name,field_name);
        }
    function savewhatdetails(update_id,content_id,update_content,table_name,field_name)
    {
        //console.log(org_id,content_id,update_content,table_name,field_name);
        $.ajax({
            type: "POST",
            url: "/Deck/updateorganization",
            data: ({org_id:update_id,content_id:content_id,update_content:update_content,table_name:table_name,field_name:field_name}),
            success: function (data)
            {
                var arrdata = data.split("||");
                if(arrdata[0]=='')
                {
                    var what = 'Content of the what, how and who areas goes here so that it fills the available space nicely.';
                }
                else
                {
                    var what = arrdata[0];
                }
                if(arrdata[1]=='')
                {
                    var compete = 'Content of the what, how and who areas goes here so that it fills the available space nicely.';
                }
                else
                {
                    var compete = arrdata[1];
                }
                if(arrdata[2]=='')
                {
                    var problem1 = 'Bullet point goes here, with space for up to two lines of text';
                }
                else
                {
                    var problem1 = arrdata[2];
                }
                if(arrdata[3]=='')
                {
                    var problem2 = 'Bullet point goes here, with space for up to two lines of text';
                }
                else
                {
                    var problem2 = arrdata[3];
                }
                if(arrdata[4]=='')
                {
                    var problem3 = 'Bullet point goes here, with space for up to two lines of text';
                }
                else
                {
                    var problem3 = arrdata[4];
                }
                whatwe.innerHTML=what;
                comp.innerHTML=compete;
                prob1.innerHTML=problem1;
                prob2.innerHTML=problem2;
                prob3.innerHTML=problem3;
            }
        });
    }
    function savehow(id)
    {

        content_id=id;
        var update_content='';
        update_id=$('#org_id').val();
        update_content=$('#'+content_id).val();
        table_name='dk_organisation';
        field_name='id';
        savehowdetails(update_id,content_id,update_content,table_name,field_name);
    }

    function savehowdetails(org_id,content_id,update_content,table_name,field_name)
    {
        //console.log(org_id,content_id,update_content,table_name,field_name);
        $.ajax({
            type: "POST",
            url: "/Deck/updateorganization",
            data: ({org_id:org_id,content_id:content_id,update_content:update_content,table_name:table_name,field_name:field_name}),
            success: function (data)
            {
                var arrdata = data.split("||");
                if(arrdata[0]=='')
                {
                    var busmodel = 'Content of the what, how and who areas goes here so that it fills the available space nicely.';
                }
                else
                {
                    var busmodel = arrdata[0];
                }
                if(arrdata[1]=='')
                {
                    var advantage = 'Content of the what, how and who areas goes here so that it fills the available space nicely.';
                }
                else
                {
                    var advantage = arrdata[1];
                }
                bmodel.innerHTML=busmodel;
                adv.innerHTML=advantage;


            }
        });
    }
    function saveachievements(id)
    {
        content_id=id;
        var update_content='';
        update_id=$('#org_id').val();
        update_content=$('#'+content_id).val();
        table_name='dk_org_achieve';
        field_name="org_id";
        saveachievedetails(update_id,content_id,update_content,table_name,field_name);
    }
    function saveachievedetails(org_id,content_id,update_content,table_name,field_name)
    {
        //console.log(org_id,content_id,update_content,table_name,field_name);
        $.ajax({
            type: "POST",
            url: "/Deck/updateorganization",
            data: ({org_id:org_id,content_id:content_id,update_content:update_content,table_name:table_name,field_name:field_name}),
            success: function (data)
            {

                var arrdata = data.split("||");
                if(arrdata[0]=='')
                {
                    var achive1 = 'What are your Notable Achievements ?#1';
                }
                else
                {
                    var achive1 = arrdata[0];
                }
                if(arrdata[1]=='')
                {
                    var achive2 = 'What are your Notable Achievements ?#2';
                }
                else
                {
                    var achive2 = arrdata[1];
                }
                if(arrdata[2]=='')
                {
                    var achive3 = 'What are your Notable Achievements ?#3';
                }
                else
                {
                    var achive3 = arrdata[2];
                }
                ac1.innerHTML=achive1;
                ac2.innerHTML=achive2;
                ac3.innerHTML=achive3;

            }
        });
    }
    $('#member_form').each( function() {
        var formData = new FormData($('#member_form')[0]);

        var form = $(this);
        form.fileupload({

            url: form.attr('action'),
            type: 'POST',
            datatype: 'xml',
            add: function (event, data) {
                $("#files").append($("#fileUploadProgressTemplate").tmpl());
                // Message on unLoad.
                window.onbeforeunload = function() {
                    return 'You have unsaved changes.';
                };

                // Submit
                data.submit();

            },
            done: function (event, data) {
                window.onbeforeunload = null;
                // Fill the name field with the file's name.
                $('#picname').val(data.originalFiles[0].name);
                $('#teamsave-block_t1').show();

            },
        });
    });

    $("#memberimageedit_t1").change(function(){

        if( $('#memberimageedit_t1').val()!=""){

            $('#remove').show();
            $('#memberimageedit_t1').show('slow');
        }
        else{ $('#remove').hide();$('#memberimageedit_t1').hide('slow');}
        readurlteam(this);
    });
    function readurlteam(input) {
        var form = $("#member_form");
        console.log("form "+form.attr('action'));
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#memberimage_t1').attr('src', e.target.result);

            }

            reader.readAsDataURL(input.files[0]);
        }
    }
    $('#member_form2').each( function() {
        var formData = new FormData($('#member_form')[0]);

        var form = $(this);
        form.fileupload({

            url: form.attr('action'),
            type: 'POST',
            datatype: 'xml',
            add: function (event, data) {
                $("#files").append($("#fileUploadProgressTemplate").tmpl());
                // Message on unLoad.
                window.onbeforeunload = function() {
                    return 'You have unsaved changes.';
                };

                // Submit
                data.submit();

            },
            done: function (event, data) {
                window.onbeforeunload = null;
                // Fill the name field with the file's name.
                $('#picname2').val(data.originalFiles[0].name);
                $('#teamsave-block_t2').show();

            },
        });
    });
$("#memberimageedit_t2").change(function(){

    if( $('#memberimageedit_t2').val()!=""){

        $('#remove').show();
        $('#memberimageedit_t2').show('slow');
    }
    else{ $('#remove').hide();$('#memberimageedit_t2').hide('slow');}
    readurlteam2(this);
});
function readurlteam2(input) {
    var form = $("#member_form2");
    console.log("form "+form.attr('action'));
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#memberimage_t2').attr('src', e.target.result);

        }

        reader.readAsDataURL(input.files[0]);
    }
}
    $('#member_form3').each( function() {
        var formData = new FormData($('#member_form')[0]);

        var form = $(this);
        form.fileupload({

            url: form.attr('action'),
            type: 'POST',
            datatype: 'xml',
            add: function (event, data) {
                $("#files").append($("#fileUploadProgressTemplate").tmpl());
                // Message on unLoad.
                window.onbeforeunload = function() {
                    return 'You have unsaved changes.';
                };

                // Submit
                data.submit();

            },
            done: function (event, data) {
                window.onbeforeunload = null;
                // Fill the name field with the file's name.
                $('#picname3').val(data.originalFiles[0].name);
                $('#teamsave-block_t3').show();

            },
        });
    });
   $("#memberimageedit_t3").change(function(){

    if( $('#memberimageedit_t3').val()!=""){

        $('#remove').show();
        $('#memberimageedit_t3').show('slow');
    }
    else{ $('#remove').hide();$('#memberimageedit_t3').hide('slow');}
    readurlteam3(this);
});
      function readurlteam3(input) {
    var form = $("#member_form3");
    console.log("form "+form.attr('action'));
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#memberimage_t3').attr('src', e.target.result);

        }

        reader.readAsDataURL(input.files[0]);
    }
    }
$('#invest_form').each( function() {
    var formData = new FormData($('#invest_form')[0]);

    var form = $(this);
    form.fileupload({

        url: form.attr('action'),
        type: 'POST',
        datatype: 'xml',
        add: function (event, data) {
            $("#files").append($("#fileUploadProgressTemplate").tmpl());
            // Message on unLoad.
            window.onbeforeunload = function() {
                return 'You have unsaved changes.';
            };

            // Submit
            data.submit();

        },
        done: function (event, data) {
            window.onbeforeunload = null;
            // Fill the name field with the file's name.
            $('#picname_inv1').val(data.originalFiles[0].name);
            $('#investsave-block').show();

        },
    });
   });
$("#investorimageedit_I1").change(function(){

    if( $('#investorimageedit_I1').val()!=""){

        $('#remove').show();
        $('#investorimageedit_I1').show('slow');
    }
    else{ $('#remove').hide();$('#investorimageedit_I1').hide('slow');}
    readurlteam4(this);
});
function readurlteam4(input) {
    var form = $("#invest_form");
    console.log("form "+form.attr('action'));
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#investorimage_I1').attr('src', e.target.result);

        }

        reader.readAsDataURL(input.files[0]);
    }
}
$('#invest_form2').each( function() {
    var formData = new FormData($('#invest_form2')[0]);

    var form = $(this);
    form.fileupload({

        url: form.attr('action'),
        type: 'POST',
        datatype: 'xml',
        add: function (event, data) {
            $("#files").append($("#fileUploadProgressTemplate").tmpl());
            // Message on unLoad.
            window.onbeforeunload = function() {
                return 'You have unsaved changes.';
            };

            // Submit
            data.submit();

        },
        done: function (event, data) {
            window.onbeforeunload = null;
            // Fill the name field with the file's name.
            $('#picname_inv2').val(data.originalFiles[0].name);
            $('#investsave-block_I2').show();

        },
    });
});
$("#investorimageedit_I2").change(function(){

    if( $('#investorimageedit_I2').val()!=""){

        $('#remove').show();
        $('#investorimageedit_I2').show('slow');
    }
    else{ $('#remove').hide();$('#investorimageedit_I2').hide('slow');}
    readurlteam5(this);
});
function readurlteam5(input) {
    var form = $("#invest_form2");
    console.log("form "+form.attr('action'));
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#investorimage_I2').attr('src', e.target.result);

        }

        reader.readAsDataURL(input.files[0]);
    }
}
    function save_team1(tid)
    {
        $.LoadingOverlay("show");
        org_id = $('#org_id').val();
        member_image = $('#picname').val();
        tid=tid;
        uniq_id1 = $('#hidenunid').val();
        $.ajax({
            type: "POST",
            url: "/Deck/updateteamimage",
            data: ({org_id:org_id,tid:tid,picname:uniq_id1+'_'+member_image}),
            success: function (data)
            {
                 //alert(data);
                $.LoadingOverlay("hide");
                $('#teamsave-block_t1').hide();
                var arrdata = data.split("||");
                var image1 = arrdata[0];
                var picpath='http://s3.amazonaws.com/dynamicdeck/photos/'+image1;
                var tid = arrdata[1];
                $('#img1').attr('src', picpath);

            }
        });
    }
    function save_team2(tid)
    {
        $.LoadingOverlay("show");
        org_id = $('#org_id').val();
        member_image = $('#picname2').val();
        uniq_id1 = $('#hidenunid2').val();
        tid=tid;
        $.ajax({
            type: "POST",
            url: "/Deck/updateteamimage",
            data: ({org_id:org_id,tid:tid,picname:uniq_id1+'_'+member_image}),
            success: function (data)
            {

                $.LoadingOverlay("hide");
                $('#teamsave-block_t2').hide();
                var arrdata = data.split("||");
                var image2 = arrdata[0];
                var picpath='http://s3.amazonaws.com/dynamicdeck/photos/'+image2;
                var tid = arrdata[1];
                $('#img2').attr('src', picpath);


            }
        });
    }
    function save_team3(tid)
    {
        $.LoadingOverlay("show");
        org_id = $('#org_id').val();
        member_image = $('#picname3').val();
        uniq_id1 = $('#hidenunid3').val();
        tid=tid;
        $.ajax({
            type: "POST",
            url: "/Deck/updateteamimage",
            data: ({org_id:org_id,tid:tid,picname:uniq_id1+'_'+member_image}),
            success: function (data)
            {

                $.LoadingOverlay("hide");
                $('#teamsave-block_t3').hide();
                var arrdata = data.split("||");
                var image3 = arrdata[0];
                var picpath='http://s3.amazonaws.com/dynamicdeck/photos/'+image3;
                var tid = arrdata[1];
                $('#img3').attr('src', picpath);

            }
        });
    }

    function saveteam_member(id)
    {
        content_id=id;
        list=content_id.split('_');
        var tid=list[1];
        var update_content='';
        update_id=$('#org_id').val();
        if(list[0]=='membername')
        {

            table_name='dk_team_members';
            field_name="org_id";
            update_content=$('#'+content_id).val();
            content_id='member_name-'+tid;

        }
        else if(list[0]=='role')
        {

            table_name='dk_team_members';
            field_name="org_id";
            update_content=$('#'+content_id).val();
            content_id='role-'+tid;
        }
        else
        {
            table_name='dk_team_members';
            field_name="org_id";
            update_content=$('#'+content_id).val();
            content_id='achievement-'+tid;

        }
        saveteamdetails(update_id,content_id,update_content,table_name,field_name);
    }
    function saveteamdetails(org_id,content_id,update_content,table_name,field_name)
    {
        console.log(org_id,content_id,update_content,table_name,field_name);
        $.ajax({
            type: "POST",
            url: "/Deck/updateorganization",
            data: ({org_id:org_id,content_id:content_id,update_content:update_content,table_name:table_name,field_name:field_name}),
            success: function (data)
            {

                var arrdata = data.split("||");
                var tid = arrdata[3];

                if(arrdata[0]=='')
                {
                    var mname1 = 'Enter Team Member Name';
                }
                else
                {
                    var mname1 = arrdata[0];
                }
                if(arrdata[1]=='')
                {
                    var mrole1 = 'Team Member Role';
                }
                else
                {
                    var mrole1 = arrdata[1];
                }
                if(arrdata[2]=='')
                {
                    var machive1 = 'Prior role or experience';
                }
                else
                {
                    var machive1 = arrdata[2];
                }
                if(arrdata[4]=='')
                {
                    var pic = 'pic';
                    var picpath='http://deck.labsls.com/revampdeck/assets/images/deck.png';
                }
                else
                {
                    var pic = arrdata[4];
                    var picpath='http://s3.amazonaws.com/dynamicdeck/photos/'+pic;
                }

                if(tid=='t1')
                {
                    name1.innerHTML=mname1;
                    role1.innerHTML=mrole1;
                    achive1.innerHTML=machive1;
                    $('#img1').attr('src', picpath);
                }
                else if(tid=='t2')
                {
                    name2.innerHTML=mname1;
                    role2.innerHTML=mrole1;
                    achive2.innerHTML=machive1;
                    $('#img2').attr('src', picpath);
                }
                else if(tid=='t3')
                {
                    name3.innerHTML=mname1;
                    role3.innerHTML=mrole1;
                    achive3.innerHTML=machive1;
                    $('#img3').attr('src', picpath);
                }
                else if(tid=='I1')
                {
                    investname1.innerHTML=mname1;
                    investrole1.innerHTML=mrole1;
                    investachive1.innerHTML=machive1;
                    $('#invsetimg1').attr('src', picpath);
                }
                else if(tid=='I2')
                {
                    investname2.innerHTML=mname1;
                    investrole2.innerHTML=mrole1;
                    investachive2.innerHTML=machive1;
                    $('#invsetimg2').attr('src', picpath);
                }
            }
        });
    }
    function cancel_success()
    {
        $('#successmodal').hide();
        $('#org_name').val('');
        location.reload();
    }
    function cancel_modal()
    {
        $('#error').hide();
        location.reload();
    }
    function cancel_login()
    {
        $('#error').hide();
        location.reload();
    }


    function share_deckdetails()
    {


        shareurl=$('#surl').val();
        deck_pwd=$('#deckpassword').val();
        deck_id=$('#org_id').val();
        share_access();
        permsn=$('#access').val();
            $.ajax({
                type: "POST",
                url: "/Deck/sharedeckdet/",
                data: ({shareurl:shareurl,deck_pwd:deck_pwd,deck_id:deck_id,permsn:permsn}),
            success: function (data)
           {

                $('#sharemessage').html('You have successfully saved the deck').addClass('validation success');
                setTimeout(function(){
                }, 3000);


         }
        });

    }
    function save_invest1(tid)
    {
        $.LoadingOverlay("show");
        org_id = $('#org_id').val();
        investor_image = $('#picname_inv1').val();
        tid=tid;
        uniq_id1 = $('#hidenunid1').val();
        $.ajax({
            type: "POST",
            url: "/Deck/updateinvestimage",
        data: ({org_id:org_id,tid:tid,picname:uniq_id1+'_'+investor_image}),
        success: function (data)
    {
        $.LoadingOverlay("hide");
        $('#investsave-block').hide();
        var arrdata = data.split("||");
        var image_1 = arrdata[0];
        var picpath='http://s3.amazonaws.com/dynamicdeck/photos/'+image_1;
        var tid = arrdata[1];
        $('#invsetimg1').attr('src', picpath);



    }
    });
    }
    function save_invest2(tid)
    {
        $.LoadingOverlay("show");
        org_id = $('#org_id').val();
        investor_image = $('#picname_inv2').val();
        uniq_id1 = $('#hidunid2').val();
        tid=tid;
        $.ajax({
            type: "POST",
            url: "/Deck/updateinvestimage",
            data: ({org_id:org_id,tid:tid,picname:uniq_id1+'_'+investor_image}),
            success: function (data)
            {
                $.LoadingOverlay("hide");
                $('#investsave-block_I2').hide();
                var arrdata = data.split("||");
                var image_2 = arrdata[0];
                var picpath='http://s3.amazonaws.com/dynamicdeck/photos/'+image_2;
                var tid = arrdata[1];
                $('#invsetimg2').attr('src', picpath);
            }
        });
    }

    function cancel_invest()
    {
        var encrid = $('#encrid').val();
        location.href="/Deck/editdeck/"+encrid;

    }


    $('#docform2').each( function()
    {
        var formData = new FormData($('#docform2')[0]);
        var form = $(this);
        form.fileupload({
            url: form.attr('action'),
            type: 'POST',
            datatype: 'xml',
            add: function (event, data) {
                $("#files").append($("#fileUploadProgressTemplate").tmpl());
                // Message on unLoad.
                window.onbeforeunload = function() {
                    return 'You have unsaved changes.';
                };
                $('#dc2').text('Uploading');
                // Submit
                data.submit();

            },
            progress: function(e, data){
                var percent = Math.round((data.loaded / data.total) * 100);
                $("#attachArea2").html(percent + "%").css("width", percent + "%");
                $("#files").find(".progress-bar").width(percent + "%");
            },
            fail: function(e, data) {
                // Remove 'unsaved changes' message.
                window.onbeforeunload = null;
                $('.progress-bar').css('width', '100%').addClass('red');
            },
            done: function (event, data) {
                window.onbeforeunload = null;
                // Fill the name field with the file's name.
                $('#docname2').val(data.originalFiles[0].name);
                $('#doctype2').val(data.originalFiles[0].type);
                $('#docsize2').val(data.originalFiles[0].size);
                $('#dc2').text('Uploaded');

            },
        });
    });
    $('#docform').each( function()
    {

        var formData = new FormData($('#docform')[0]);
        var form = $(this);
        form.fileupload({
            url: form.attr('action'),
            type: 'POST',
            datatype: 'xml',
            add: function (event, data) {
                $("#files").append($("#fileUploadProgressTemplate").tmpl());
                // Message on unLoad.
                window.onbeforeunload = function() {
                    return 'You have unsaved changes.';
                };
                $('#dc1').text('Uploading');
                // Submit
                data.submit();

            },
            progress: function (e, data) {
                var percent = Math.round((data.loaded / data.total) * 100);
                $("#attachArea").html(percent + "%").css("width", percent + "%");
                $("#files").find(".progress-bar").width(percent + "%");
            },
            fail: function (e, data) {
                window.onbeforeunload = null;
                $('.progress-bar').css('width', '100%').addClass('red');
            },
            done: function (event, data) {
                window.onbeforeunload = null;
                // Fill the name field with the file's name.
                $('#docname').val(data.originalFiles[0].name);
                $('#doctype').val(data.originalFiles[0].type);
                $('#docsize').val(data.originalFiles[0].size);
                $('#dc1').text('Uploaded');

            },
        });
    });
    $('#docform3').each( function()
    {
        var formData = new FormData($('#docform3')[0]);
        var form = $(this);
        form.fileupload({
            url: form.attr('action'),
            type: 'POST',
            datatype: 'xml',
            add: function (event, data) {
                $("#files").append($("#fileUploadProgressTemplate").tmpl());
                // Message on unLoad.
                window.onbeforeunload = function() {
                    return 'You have unsaved changes.';
                };
                $('#dc3').text('Uploading');
                data.submit();

            },
            done: function (event, data) {
                window.onbeforeunload = null;
                // Fill the name field with the file's name.
                $('#docname3').val(data.originalFiles[0].name);
                $('#doctype3').val(data.originalFiles[0].type);
                $('#docsize3').val(data.originalFiles[0].filesize);
                $('#dc3').text('Uploaded');

            },
        });
    });
    function save_attach()
    {
        title =$('#attachtitle').val();
        pid =$('#pid1').val();
        attachdesc=$('#attachdesc').val();
        org_id = $('#org_id').val();
        uniq_id1 = $('#hiddenuniqid1').val();
        d_name = $('#docname').val();
        doc_size = $('#docsize').val();
        doc_type = $('#doctype').val();
        if(title!=''&&attachdesc!=''&&d_name!='')
        {
            saveattachments(org_id,uniq_id1,d_name,doc_size,doc_type,title,attachdesc,pid)
        }
        else
        {

        }
     }
    function save_attach2()
    {
        title =$('#attachtitle2').val();
        pid =$('#pid2').val();
        attachdesc=$('#attachdesc2').val();
        org_id = $('#org_id').val();
        uniq_id1 = $('#hiddenuniqid2').val();
        d_name = $('#docname2').val();
        doc_size = $('#docsize2').val();
        doc_type = $('#doctype2').val();
        if(title!=''&&attachdesc!=''&&d_name!='')
        {
            saveattachments(org_id,uniq_id1,d_name,doc_size,doc_type,title,attachdesc,pid)
        }
        else
        {

        }
    }
    function save_attach3()
    {
        title =$('#attachtitle3').val();
        pid =$('#pid3').val();
        attachdesc=$('#attachdesc3').val();
        org_id = $('#org_id').val();
        uniq_id1 = $('#hiddenuniqid3').val();
        d_name = $('#docname3').val();
        doc_size = $('#docsize3').val();
        doc_type = $('#doctype3').val();
        if(title!=''&&attachdesc!=''&&d_name!='')
        {
            saveattachments(org_id,uniq_id1,d_name,doc_size,doc_type,title,attachdesc,pid)
        }
        else
        {

        }
    }
    function saveattachments(org_id,uniq_id1,d_name,doc_size,doc_type,title,attachdesc,pid)
    {
        $.LoadingOverlay("show");
        $.ajax({
            type: "POST",
            url: "/Deck/updateattachment",
            data: ({org_id:org_id,doc_name:uniq_id1+'_'+d_name,doc_size:doc_size,doc_type:doc_type,filename:d_name,title:title,attachdesc:attachdesc,pid:pid}),
            success: function (data)
            {
                $.LoadingOverlay("hide");
                var arrdata = data.split("||");
                var typ = arrdata[0];
                var name = arrdata[1];
                var filename = arrdata[2];
                var size = arrdata[3];
                var title = arrdata[4];
                var desc = arrdata[5];
                var fmt = arrdata[6];
                var date = arrdata[7];
                var prm = arrdata[8];
                if(prm=='p1')
                {


                    siz1.innerHTML=size;
                    tit1.innerHTML=title;
                    desc1.innerHTML=desc;
                    formt1.innerHTML=fmt;
                    dte1.innerHTML=date;


                }else if(prm=='p2')
                {


                    siz2.innerHTML=size;
                    tit2.innerHTML=title;
                    desc2.innerHTML=desc;
                    formt2.innerHTML=fmt;
                    dte2.innerHTML=date;

                }else if(prm=='p3')
                {

                    
                    siz3.innerHTML=size;
                    tit3.innerHTML=title;
                    desc3.innerHTML=desc;
                    formt3.innerHTML=fmt;
                    dte3.innerHTML=date;

                }



            }
        });
    }
    function deletedoc(id,deckid,pid)
    {
        $.LoadingOverlay("show");
        aid=id;
        org_id = deckid;
        pmid=pid;
        editattachments(org_id,aid,pid)
        $.ajax({
            type: "POST",
            url: "/Deck/deleteattachment",
            data: ({org_id:org_id,aid:aid,pmid:pmid}),
            success: function (data)
            {
                $.LoadingOverlay("hide");
            }
        });

    }
    function edit_attach(id,deckid,prmid)
    {
            aid=id;
            org_id = deckid;
            pid=prmid;
            title =$('#attachtitle').val();
           attachdesc=$('#attachdesc').val();
           uniq_id1 = $('#hiddenuniqid1').val();
           d_name = $('#docname').val();
           doc_size = $('#docsize').val();
           doc_type = $('#doctype').val();
           editattachments(org_id,uniq_id1,d_name,doc_size,doc_type,title,attachdesc,aid,pid)

    }
    function edit_attach2(id,deckid,prmid)
    {
        aid=id;
        org_id = deckid;
        pid=prmid;
        title =$('#attachtitle2').val();
        attachdesc=$('#attachdesc2').val();
        uniq_id1 = $('#hiddenuniqid2').val();
        d_name = $('#docname2').val();
        doc_size = $('#docsize2').val();
        doc_type = $('#doctype2').val();
        editattachments(org_id,uniq_id1,d_name,doc_size,doc_type,title,attachdesc,aid,pid)

    }
    function edit_attach3(id,deckid,prmid)
    {
        aid=id;
        org_id = deckid;
        pid=prmid;
        title =$('#attachtitle3').val();
        attachdesc=$('#attachdesc3').val();
        uniq_id1 = $('#hiddenuniqid3').val();
        d_name = $('#docname3').val();
        doc_size = $('#docsize3').val();
        doc_type = $('#doctype3').val();
        editattachments(org_id,uniq_id1,d_name,doc_size,doc_type,title,attachdesc,aid,pid)

    }
    function editattachments(org_id,uniq_id1,d_name,doc_size,doc_type,title,attachdesc,aid,pid)
    {

        $.LoadingOverlay("show");
        $.ajax({
            type: "POST",
            url: "/Deck/editattachment",
            data: ({org_id:org_id,doc_name:uniq_id1+'_'+d_name,doc_size:doc_size,doc_type:doc_type,filename:d_name,title:title,attachdesc:attachdesc,aid:aid,pid:pid}),
            success: function (data)
            {
                $.LoadingOverlay("hide");


            }
        });
    }
    $(function() {
        $( "#date" ).datepicker({ autoclose: true});

    });
    $(function() {
        $( "#date1" ).datepicker({ autoclose: true});

    });
    $(function() {
        $( "#date2" ).datepicker({ autoclose: true});

    });
    function copyToClipboard(id)
    {
        var copyText = document.getElementById(id);
        copyText.select();
        document.execCommand("Copy");
    }
    function removefromClipboard(id)
    {
        document.getElementById(id).value = "";
    }
    function share_access()
    {
        var cname=$("#shareoff").attr('class');
        if(cname=='share-switch active')
        {
            $('#access').val('yes');
        }
        else
        {
            $('#access').val('no');
        }
    }
    function doc_download(docid,deckid,name,type,format,filename,pmid)
    {

        var deck_id =deckid;
        var doc_id = docid;
        var name =  name;
        var category = type;
        var media_type = format;
        var file_name=  filename;
        var dwnid=pmid;
        if(dwnid=='d1')
        {
            var doc_path= "/Deck/doc_dwnld/"+file_name+"/"+name;
            $('#dc_dwnld1').attr('href',doc_path);
        }
        else if(dwnid=='d2')
        {
            var doc_path= "/Deck/doc_dwnld/"+file_name+"/"+name;
            $('#dc_dwnld2').attr('href',doc_path);
        }
        else if(dwnid=='d3')
        {
            var doc_path= "/Deck/doc_dwnld/"+file_name+"/"+name;
            $('#dc_dwnld3').attr('href',doc_path);
        }
        else var doc_path='';
        if(doc_id!='')
        {
            $.ajax ({
                type: "POST",
                url : "/Deck/media_download/",
                data : ({doc_id:doc_id,category:category,name:name,media_type:media_type,deck_id:deck_id,file_name:file_name}),
                success : function(result)
                {

                }

            });
        }
    }
    $(document).on('click','#slogin',function(){
            savesharelogin();
    });

    function savesharelogin()
    {
       sharedeckid=$('#deckid').val();
       deckpswd=$('#deckpassword').val();
        $.ajax ({
            type: "POST",
            url : "/Deck/sharesign/",
            data : ({sharedeckid:sharedeckid,deckpswd:deckpswd}),
            success : function(req)
            {
              //alert(req);
                     if(req==0)
                     {
                         $('#loginerror').html('Please enter the correct credentials').addClass('validation failed');
                     }
                     else if(req==1)
                     {
                         $('#loginerror').html('Please enter the Password').addClass('validation failed');
                     }
                     else
                     {
                         var res=req.split("||");
                         location.href='/'+res[2]+'/'+res[0]+'/'+res[1];

                     }


            }

        });
    }
    $('#deckpassword').keyup(function() {
        $('#loginerror').html('').removeClass('validation failed');
    });
    function editprofile()
    {
            var firstname = $('#first_name').val();
            var picname=$('#picname').val();
            //alert(picname);
            var picid=$('#picid').val();
            var lastname = $('#last_name').val();
            var emailid = $('#email').val();
            var brief_bio = $('#brief_bio').val();
            var utype = $("#usertyp").val();
            $.ajax ({
                    type: "POST",
                    url : "/Deck/edituserprofile/",
                    data : ({firstname:firstname,picname:picname,picid:picid,lastname:lastname,emailid:emailid,brief_bio:brief_bio,utype:utype}),
                    success : function(result)
                    {
                        $('#success').html('Profile Updated Successfully!!').addClass('validation success');

                    }
                });
    }

 
     $("#editpic").change(function ()
              {
               if (this.files && this.files[0]) {
               var reader = new FileReader();

                reader.onload = function (e) {
                $('#imgpic').attr('src', e.target.result);
                //$('#upload').hide();

            };

            reader.readAsDataURL(this.files[0]);
        }
        });
		 
    $('#editform').each( function()
    {
        var formData = new FormData($('#editform')[0]);
        var form = $(this);
        form.fileupload({
            url: form.attr('action'),
            type: 'POST',
            datatype: 'xml',
            add: function (event, data) {
                $("#files").append($("#fileUploadProgressTemplate").tmpl());
                // Message on unLoad.
                window.onbeforeunload = function() {
                    return 'You have unsaved changes.';
                };

                // Submit
                data.submit();

            },


            done: function (event, data) {
                window.onbeforeunload = null;
                // Fill the name field with the file's name.
                $('#picname').val(data.originalFiles[0].name);


            },
        });
    });

    $("#post").click(function()
    {
        var deckid = $("#org_id").val();
        var company_name = $("#org_name").val();
        var msg = $("#msg").val();
        var update_date = $("#update_date").val();
        $.ajax ({
            type: "POST",
            url : "/Deck/deckupdates/",
            data : ({deckid:deckid,company_name:company_name,msg:msg,update_date:update_date}),
            success : function(data)
            {
                var arrdata = data.split("||");
                $('#comment').append(arrdata[0]);
                $("#msg").val('');
                update.innerHTML=arrdata[1];
                update1.innerHTML=arrdata[1];
                update2.innerHTML=arrdata[1];
                update3.innerHTML=arrdata[1];
                update4.innerHTML=arrdata[1];
                update5.innerHTML=arrdata[1];
            }

        });

    });
     function showmodaltrack()
    {
        $('#tracklogin').show();

    }
    function button_interested(id,deckid)
   {
       var uid = id;
       var deck_id = deckid;
       if(uid!='')
       {
           $.ajax ({
               type: "POST",
               url : "/Deck/interested/",
               data : ({uid:uid,deck_id:deck_id}),
               success : function(result)
               {
               }

           });
       }
   }
    function print_page()
    {
        var deckid = $("#org_id").val();
        var printuser = $("#uid").val();
        $.ajax({
            type: "POST",
            url: "/Deck/saveprint_details/",
            data: ({deckid: deckid, printuser: printuser}),
            success: function (data) {

            }

        });
         window.print();
        location.reload();
    }
	
    function deckview(id)
    {
        location.href='/Deck/editdeck/'+id;
    }
    $('#msg').keyup(updateCount);
    $('#msg').keydown(updateCount);

    function updateCount()
    {

        var cs = $(this).val().length;
        $('#chatcount').text(280-cs);

    }