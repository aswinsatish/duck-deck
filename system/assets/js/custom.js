	document.addEventListener('keyup', function(e) {
		if (e.keyCode == 27) {
		   // $("body").removeClass("bSynapse-modal-open");
			
			$(".bSynapse-modal").fadeOut("slow"); 
			setTimeout(function(){
				$("body").removeClass("bSynapse-modal-open"); 
				}, 500);
		}  if (e.keyCode == 13) {
		   $('.button').click();
		}  
	});
	
	function getval(pid,id,gid)
		{   
			$('#bsynapse-tododetails').hide();
		  	$('.create-memo-tab').show();
			$('#bsynapse-memo').fadeIn("slow"); 
			$('body').addClass('bSynapse-modal-open');
			var classname = $('#classname').val(); 
			$.ajax({
			    type: "POST",
			    url: "index.php/Todo/addtodo",
				data: ({id:id,pid:pid,gid:gid}),
				success: function(res)
				{
					$('#bsynapsemodal-container').html(res); 
					$('#fn').val(classname);	

				}
            });$.ajaxSetup({cache : true}); 
			
		} 
		
	function gettags(name,id) {   
	    var r_id = "'"+id+"'"; 
		var aa='<div class="item" data-value="'+id+'">'+name+'</div>'; 
		$('#formtags .has-options').append(aa);		
	}
	function self_todo()
		{  
		var aa = $('.mandatory').val();		 
		if(aa=='') {
		 $('.mandatory').css('border-color', '#e41225'); 
		} else {
			$('#savebn').val('self_todo'); 
			$('#form1').submit();
		}
		}
		
		function assignusers()
		{   
	   var aa = $('.mandatory').val();		 
		if(aa=='') {
		 $('.mandatory').css('border-color', '#e41225'); 
		} else {
			 
		 
			$('#tab1').removeClass('active'); 
			$('#tab2').addClass('active'); 
			$('#step1').hide();
			$('#step2').show();}
		}
		function backtodo()
		{   
			$('#tab1').addClass('active'); 
			$('#tab2').removeClass('active'); 
			$('#step1').show();
			$('#step2').hide();
		}
		 
		function showdetails(id)
		{  
			$('#bsynapse-tododetails').fadeIn('slow');
			$('body').addClass('bSynapse-modal-open');
			$.ajax({
			    type: "POST",
			    url: "index.php/Todo/tododetails",
				data: ({id:id}),
				success: function(res)
				{
					$('#bsynapse-tododetails').html(res); 
				}
            });$.ajaxSetup({cache : true}); 
		} 
		
		
		function getgoal(id)
		{  
			$('#bsynapse-memo').fadeIn('slow');			
			$('body').addClass('bSynapse-modal-open');
			$.ajax({
			    type: "POST",
			    url: "index.php/Goal/addform",
				data: ({id:id}),
				success: function(res)
				{
					$('#bsynapsemodal-container').html(res); 
				}
            });$.ajaxSetup({cache : true}); 			 
		}
			function getuser(id)
		{  
			$('#bsynapse-memo').fadeIn('slow');			
			$('body').addClass('bSynapse-modal-open');
			$.ajax({
			    type: "POST",
			    url: "index.php/User/addform",
				data: ({id:id}),
				success: function(res)
				{
					$('#bsynapsemodal-container').html(res); 
				}
            });$.ajaxSetup({cache : true}); 			 
		}
		
		function showgoal(id)
		{  
			$('#bsynapse-tododetails').fadeIn('slow');	
			$('body').addClass('bSynapse-modal-open');	   
			$.ajax({
			    type: "POST",
			    url: "index.php/Goal/goaldetails",
				data: ({id:id}),
				success: function(res)
				{
					$('#bsynapse-tododetails').html(res); 
				}
            });$.ajaxSetup({cache : true}); 
			
		}
		function discussion()
		{   
			 var formData = new FormData($('#myform')[0]);  
            $.ajax({
                url: 'index.php/Todo/savediscus', // point to server-side PHP script 
                dataType: 'text',  // what to expect back from the PHP script, if anything
                cache: false,
                contentType: false,
                processData: false,
                data: formData,                         
                type: 'post',
                success: function(res){  
					$('#todo-chat-panel').html(res);  
					$('#discussion').val('');  					
                }
			}); $.ajaxSetup({cache : true});     
		}
		function markasdone()
		{ 
			 
    		var qcnt = $('#questioncnt').val(); 
			var acnt = $('#answercnt').val();
			var ccnt = $('#checklistcnt').val(); 
			var ucnt = $('#userchecklistcnt').val(); 
			
			if(ccnt==ucnt){
			if(qcnt==acnt){
			$('#checklist_error').html('');
			var retVal = confirm("Are you sure to close this request?");
		    if( retVal == true )  
		    { 
			var tid = $('#tid').val(); 
			var asscount = $('#asscount').val(); 
			var duestatus = $('#duestatus').val(); 

			$.ajax({
			    type: "POST",
			    url: "index.php/Todo/markasdone",
				data: ({id:tid,asscount:asscount,duestatus:duestatus}),
				success: function(res)
				{ 
					window.location = "index.php/Todo";
					 
				}
            });$.ajaxSetup({cache : true}); 
		    }

			} else {
				$('#checklist_error').html('');
				$('.popup_outer').css('display','block');
			}
			
			} else { 
				$('#checklist_error').html('<label>Please check the list items.</label>') ;
			}
			
		}
		$('.popup_btn_close').click(function(){ 
			$('.popup_outer').css('display','none');
		});
		function nextqtn(id)
		{
			var next = parseInt(id) + 1;	

			if (!$('input[name=answer'+id+']:checked').val()) { 
              		$('#error_msg').html('<label>Please choose the option!</label>') ; 	
			} else {
				$('#error_msg').html('') ; 	
				$('#qtn'+next).css('display','block'); 
				$('#qtn'+id).css('display','none'); 
			}
		}
		function backqtn(id)
		{ 
			var next = parseInt(id) - 1;
			$('#error_msg').html('') ; 
			$('#qtn'+next).css('display','block'); 
			$('#qtn'+id).css('display','none');  
		}
		function completed(id)
		{ 
			var qcnt = $('#questioncnt').val(); 
			var acnt = $('#answercnt').val();
			if(qcnt==acnt){
				markasdone();
			} else {
				$('#error_msg').html('<label>Please choose the option!</label>') ;
			}
			
		} 
		 
		
		 function getresource(id)
		{  
			$('#bsynapse-memo').fadeIn("slow");		   
			$.ajax({
			    type: "POST",
			    url: "index.php/Resources/addform",
				data: ({id:id}),
				success: function(res)
				{
					$('#bsynapsemodal-container').html(res); 
				}
            });$.ajaxSetup({cache : true}); 			
		}
		

		function saveresources()
		{  			 
			$('#form1').submit();
		}
		
		function signin()
		{   		 
			var username = $('#username').val(); 
			var pass = $('#password').val(); 
			$('#username').removeAttr('style'); 
			$('#password').removeAttr('style'); 
			if(username!='' && pass!=''){
			    $('#form1').submit();				
			} else {
				if(username==''){
				   $('#username').css('border-color', '#e41225'); 	
				}
				if(pass==''){
				   $('#password').css('border-color', '#e41225'); 	
				}
		    }
		}
	function display_sub(val)
	{ 

		
   var newval=val;
 
   $.ajax({
			    type: "POST",
			    url: "index.php/User/sublist",
				data: ({newval:newval}),
				success: function(res)
				{ 
					
					if(res!='')
					{
						$('#sub_list').html('');
						$('#sub_list').html(res);
					}
					
	}
});$.ajaxSetup({cache : true}); 
}
  function getlearn(pid,id,gid)
        {   
            $('#bsynapse-tododetails').hide();
            $('.create-memo-tab').show();
            $('#bsynapse-memo').fadeIn("slow");
            var classname = $('#classname').val(); 
            $.ajax({
                type: "POST",
                url: "index.php/Learn/addlearn",
                data: ({id:id,pid:pid,gid:gid}),
                success: function(res)
                {
                    $('#bsynapsemodal-container').html(res); 
                    $('#fn').val(classname);    

                }
            });$.ajaxSetup({cache : true}); 
            
        } 

          function save_learn()
        {  
 qtyp= $('#question_type').val();
           catgory=$('#category').val();
           qtn=$('#question').val();
           a1=$('#answer1').val();
           a2=$('#answer2').val();
           a3=$('#answer3').val();
if(qtyp!=''&& catgory!='' && qtn!='' && a1!='' && a2!='' && a3!='' && ($('#option').checked))

          {
            $('#form1').submit();
        }
        if(qtyp=='')
            $('.error1').show();
      if(catgory=='')
           $('.error2').show();
       if(qtn=='')
        $('.error3').show();
    if(a1=='' || a2=='' || a3=='')
        $('.error4').show();
   if(!($('#option').checked))

          $('.error5').show();
  }
 function user_change(tval)
    { 
    	
       var vals=tval;
        $.ajax({
			    type: "POST",
			    url: "index.php/User/suborglist",
				data: ({vals:vals}),
				success: function(res)
				{ 
					
	 $('#user_manage1').hide();
       if(vals=='Admin')
       {
       	$('#user_manage').hide();

       }
       else
       {
       $('#user_manage').show();
       $('#sel_list').html('');
        $('#sel_list').html(res);


       }
       if(vals=='User')
       {
       	 $('#user_manage1').show();
       }

    }
});$.ajaxSetup({cache : true}); 
    }
function Add_user()
		{  

			$('#form1').submit();
		}
	/*	  function search_date()
       { 
       
        var dt=$('#txtdate').val();
   
     /* var dt_url=document.URL;
      var dt_arr=dt_url.split('/');
      var len=dt_arr.length;
      var sel=dt_arr[len-1];*/
    
      /*  var mydate=dt.slice(0,10);
   //  if(sel=='Todo'){
        $.ajax({
               type: "POST",
                url: "index.php/Todo/search_date/",
                data: ({mydate:mydate}), 
                success: function(req)
                {   
                     $('#nav_todo').html('');   
                   $('#nav_todo').html(req);   
                    $('#nav_goal').html('');   
                   $('#nav_goal').html(req);   
                }
     });$.ajaxSetup({cache : true});  
  //  }
  /* else  if(sel=='Goal')
    {
        $.ajax({
               type: "POST",
                url: "index.php/Goal/search_gdate/",
                data: ({mydate:mydate}), 
                success: function(req)
                {  
                     $('#nav_goal').html('');   
                   $('#nav_goal').html(req);   
                    
                }
     });  
  }
    }*/

		/* ------------------------TODO----------------------- */
	$("#ass_organization").click(function() {  
			$('#assign-functional1').hide();		
			$('#assign-organization1').show();
		});
		$("#ass_functional").click(function() { 
			$('#assign-organization1').hide();		
			$('#assign-functional1').show();
		});	 
		/* ------------------------TODO----------------------- */

		 

		function showuserdetails(id)
		{  
			
			$('#bsynapse-tododetails').fadeIn('slow');
			$('body').addClass('bSynapse-modal-open');
			$.ajax({
			    type: "POST",
			    url: "index.php/User/userdetails",
				data: ({id:id}),
				success: function(res)
				{
					$('#bsynapse-tododetails').html(res); 
				}
            });$.ajaxSetup({cache : true}); 
		} 
		$(document).ready(function() 
		{ 
		  
 	      $('#pswd1').hide();
	      $('#pswd2').hide();
	     
        });
	      function Update_user()
		{    
		    var password1 = document.getElementById("password1").value;
	        var password2 = document.getElementById("password2").value;
	        var errcode = "0";
            if(password1 != '' || password2 != '' )
			{
			if(password1 !=  password2  )
			{
				errcode = 1;
				document.getElementById("errpassword1").style.display='block';
		    	document.getElementById("errpassword1").innerHTML='Please enter same passwords';
			}
			if(password1 =='' )
			{
				errcode = 1;
				document.getElementById("errpassword1").style.display='block';
		    	document.getElementById("errpassword1").innerHTML='Please enter password';
			}
			if(password2 =='' )
			{
				errcode = 1;
				document.getElementById("errpassword2").style.display='block';
		    	document.getElementById("errpassword2").innerHTML='Please retype your password';
			}
			
		    }
			
			if(errcode == 0)
			{
			$('#editform').submit();
		    }
			
		}
		function changePassword()
		{
 	      $('#pswd1').toggle();
	      $('#pswd2').toggle();
        }
		
	   function addmore(id)
		 {  
			var v= $('#count_'+id).val(); 
			$('#count_'+id).val(parseInt(v)+1);
			var cnt= $('#count_'+id).val();  
			 $.ajax({
				type: "POST",
				url: "index.php/Todo/addmore",
				data : ({id:id,cnt:cnt}),		 
				success: function(data) 
				{  
					if(data!='')
					{  
						 
							$('#loop'+v+'_'+id).after(data);
						 
					}
				}
			});$.ajaxSetup({cache : true});  
		 }
		 
		  function addmoreopt(id)
		 {  
			var v= $('#optcnt'+id).val(); 
			$('#optcnt'+id).val(parseInt(v)+1);
			var cnt= $('#optcnt'+id).val();   
			var html = '';
			html = '<div class="bSynapse-form" id="ansremove'+id+'_'+cnt+'"><input type="radio" id="ans'+id+'_'+cnt+'" name="ans'+id+'" style="margin-right:10px !important;" value="opt'+id+'_'+cnt+'"><input type="text" id="opt'+id+'_'+cnt+'" name="opt'+id+'_'+cnt+'" class="w-90"> <a onclick="javascript:removeopt('+id+','+cnt+')" href="javascript:void(0)" class="remove_field m-l-sm"><i class="fa fa-times-circle cusIco"></i></a></div>';
      		$('#answer_loop'+id).append(html);	
			 
		 }
		 function addmorequs()
		 {  
			var v= $('#quecnt').val(); 
			$('#quecnt').val(parseInt(v)+1);
			var cnt= $('#quecnt').val();  
			var html = '';
			html = '<div class="qtn_loop'+cnt+' row-bottom"><div class="bSynapse-form" style="padding-bottom: 0px;"><label>Question '+cnt+'</label> <a onclick="javascript:removeqn('+cnt+')" href="javascript:void(0)" class="remove_field m-l-sm"><i class="fa fa-times-circle cusIco"></i></a></div><div class="bSynapse-form"><input type="text" id="question_'+cnt+'" name="question[]" placeholder="Question"></div><div class="bSynapse-form" style="padding-bottom: 0px;"><label>Options</label> <a class="label btn-sm m-b-xs label-success " style="padding:5px;" onclick="javascript:addmoreopt('+cnt+')" href="javascript:void(0)">+</a>	<input type="hidden" id="optcnt'+cnt+'" name="optcnt'+cnt+'" value="1"/></div><div id="answer_loop'+cnt+'"><div class="bSynapse-form" id="ansremove'+cnt+'_1"><input type="radio" id="ans'+cnt+'_1" name="ans'+cnt+'" style="margin-right:10px !important;" value="opt'+cnt+'_1"><input type="text" id="opt'+cnt+'_1" name="opt'+cnt+'_1" class="w-90"> </div>	</div></div>';
      		$('#question_loop').append(html);	 
			 
		 }
		 function removeopt(id,cnt){ 
		    $('#ansremove'+id+'_'+cnt).hide();	 
		 }
		 function removeqn(id){  
			$('.qtn_loop'+id).hide();	 
		 }
		 function checklist(id,tid){ 		     
			  $.ajax({
				type: "POST",
				url: "index.php/Todo/checklist_done",
				data : ({id:id,tid:tid}),		 
				success: function(data) 
				{ 
				$('#userchecklistcnt').val($.trim(data));
				}
			  });$.ajaxSetup({cache : true}); 
		 }
		 function getanswer(qid,aid,tid,typeid){  		     
			  $.ajax({
				type: "POST",
				url: "index.php/Todo/getanswer",
				data : ({qid:qid,aid:aid,tid:tid,typeid:typeid}),		 
				success: function(data) 
				{ 
				$('#answercnt').val($.trim(data));
				}
			  });$.ajaxSetup({cache : true}); 
		 }
		 function viewchecklist(uid,tid){  		
			$.ajax({
				type: "POST",
				url: "index.php/Todo/viewchecklist",
				data : ({uid:uid,tid:tid}),		 
				success: function(data) 
				{ 
				console.log(data);
				if(data!=0){
				$('#viewchecklist').html(data);	
				$('#viewchecklist').fadeIn("slow");	
				}}
			  });$.ajaxSetup({cache : true});   
		 }
		 function closechecklist(){  		
			 	
				$('#viewchecklist').fadeOut("slow");	
				 
		 }
		 function editProfile(id)
		{  
		
			$('#bsynapse-memo').fadeIn('slow');
			$('body').addClass('bSynapse-modal-open');
			$.ajax({
			    type: "POST",
			    url: "index.php/Update/updateform",
				data: ({id:id}),
				success: function(res)
				{ 
					$('#bsynapsemodal-container').html(res); 
				}
            });$.ajaxSetup({cache : true}); 			 
		}
		
		/* =====================assessment====================== */
		 function getlearn1(pid,id,gid)
        {   
            $('#bsynapse-tododetails').hide();
            $('.create-memo-tab').show();
            $('#bsynapse-memo').fadeIn("slow");
            var classname = $('#classname').val(); 
            $.ajax({
                type: "POST",
                url: "index.php/Learn/addassessment",
                data: ({id:id,pid:pid,gid:gid}),
                success: function(res)
                {
                    $('#bsynapsemodal-container').html(res); 
                    $('#fn').val(classname);    

                }
            });$.ajaxSetup({cache : true}); 
            
        } 
		function selectall(id){
			if(id==0){
				if ($('.qtn_all').prop('checked') == 1){  
					$('.qtn_category').attr("disabled","disabled");	
					$('.Noofqtn_cat').attr("disabled","disabled");
					$('.Noofqtn_cat').val('');	
				} else {  
					$('.qtn_category').removeAttr("disabled");	
					$('.Noofqtn_cat').removeAttr("disabled");	 					
				}
			}
			if(id!=0){  
			var cat_flag = 0;
			$("input[type=checkbox]:checked").each(function() {
					cat_flag=1; 
				});
			
				if (cat_flag == 1){  
					$('.qtn_all').attr("disabled","disabled");
					$('.Noofqtn_all').attr("disabled","disabled");	
					$('.Noofqtn_all').val('');	
				} else {   
					$('.qtn_all').removeAttr("disabled");
					$('.Noofqtn_all').removeAttr("disabled");	 					
				}
			}
		}
		function nature_attempt(fn){
			if(fn=='multiple'){
				$('#attempt').removeAttr("disabled");	
			} else {
				$('#attempt').attr("disabled","disabled");
			}
		}
		function set_timing(fn){
			if(fn=='test'){
				$('#timing_test').removeAttr("disabled");
				$('#timing_qtn').attr("disabled","disabled");	
			} else {
				$('#timing_test').attr("disabled","disabled");
				$('#timing_qtn').removeAttr("disabled");
			}
		}
		function sharelink(fn){
			if(fn=='yes'){ 
				$('#share_link').removeAttr("disabled"); 
				$('#linkenabled').removeAttr("disabled"); 
			} else {
				$('#share_link').attr("disabled","disabled"); 
				$('#linkenabled').attr("disabled","disabled"); 
			}
		}
		function save_assessment(){
			var vals = ""; 
			var qval = "";
			var qtncnt = "";
			var flg =0;
			var totqtncnt =0;
			var aa = $('.mandatory').val();
			var title = $('#title').val();	
			var desc = $('#description').val();	
			var score = $('#passing_score').val(); 
			var val_format =  "[1-9][0-9]?$|^100";
			var idformat = "^" + val_format + "$";
			
		
			if (title ==''){
			  $('#title').css('border-color', '#e41225'); 	
			} else {
			  $('#title').removeAttr("style");		
			}
			if (desc ==''){
			  $('#description').css('border-color', '#e41225'); 	
			} else {
			  $('#description').removeAttr("style");			
			}
			if (score ==''){  
			  $('#passing_score').css('border-color', '#e41225'); 	
			} else if(score.match(idformat)){ 
				 $('#passing_score').css('border-color', '#e41225'); 
			} else { 
			  $('#passing_score').removeAttr("style");			
			} 
			var obj = document.getElementsByName("qtn_settings[]"); 
			for(var x=0;x<obj.length;x++){
				if(obj[x].checked==true){
						vals = obj[x].value;
						qval += vals+","; 
				 var cnts = $('#Noofqtn'+vals).val();
			if (cnts == "") { 
			$('#txt_error1').html('Please enter question count');
			$('#txt_error1').show();
			flg=1;
			  }
			  else {
			$('#txt_error1').html('');
			$('#txt_error1').hide();
			  }
				}
			}			
             if (qval == "") { flg=1;
			$('#txt_error1').html('Please check atleast one');
			$('#txt_error1').show();
			  } 
			var attempts=$('input[name="attempts"]:checked').val();  
			if(attempts=="Multiple"){				
			var attempt = $('#attempt').val(); 
			if (attempt ==''){
				flg=1;
			    $('#attempt').css('border-color', '#e41225'); 	
			} else if(attempt.match(idformat)){ 
			    flg=1;
				$('#attempt').css('border-color', '#e41225'); 
			} else {
			   $('#attempt').removeAttr("style");			
			}	
			} else {
				$('#attempt').removeAttr("style");	
				$('#attempt').val('');		
			}
			
			var timing=$('input[name="timing"]:checked').val();  
			if(timing=='Yes'){
				var timing_test = $('#timing_test').val(); 
				if (timing_test ==''){
					flg=1;
					$('#timing_test').css('border-color', '#e41225'); 	
			   } else {
				   $('#timing_test').removeAttr("style");	
			   }			   
				$('#timing_qtn').val(''); 
				$('#timing_qtn').removeAttr("style");
			} else if(timing=='No'){
				var timing_qtn = $('#timing_qtn').val(); 
				if (timing_qtn ==''){
					flg=1;
					$('#timing_qtn').css('border-color', '#e41225'); 	
			   } else {
				   $('#timing_qtn').removeAttr("style");	
			   }
				$('#timing_test').val('');
				$('#timing_test').removeAttr("style");
			}
			
			
			var share=$('input[name="share"]:checked').val();  
			if(share=='yes'){
				var share_link = $('#share_link').val();  
				if (share_link ==''){
					flg=1;
					$('#share_link').css('border-color', '#e41225'); 
			   } else {
				   $('#share_link').removeAttr("style");	
			   }			   
			} else {
				$('#share_link').removeAttr("style");	
				$('#share_link').val('');
			}
			
			
			if ((title !='') && (desc !='') && (score !='') && flg!=1) { 
				$('#form1').submit();
			}
		}
		function qtncnts(qid){  
		    var  selcnt = $('#Noofqtn'+qid).val();console.log(selcnt);
			var  totcnt = $('#tot'+qid).val();  console.log(totcnt);
			 if(selcnt !=''){
			if(selcnt>parseInt(totcnt)){
				$('#Noofqtn'+qid).css('border-color', '#e41225'); 
				$('#txt_error1').html('Selected question count is greater than Total question count'); 
			    $('#txt_error1').show();
				$('#Noofqtn'+qid).val('');
			} else {
				$('#txt_error1').html('');
				$('#txt_error1').hide();
				$('#Noofqtn'+qid).removeAttr("style");
			}
			}  
			}
		function get_assdetails(id){          
			var hidedetails = $('#hidedetails_'+id).clone();	
			$('#get_assdetails').html(hidedetails); 
		} 
        function take_test(id,uid,mnt,sec,total){
			$.ajax({
			    type: "POST",
			    url: "index.php/Learn/take_test",
				data: ({id:id,uid:uid,mnt:mnt,sec:sec,total:total}),
				success: function(res)
				{   
					 $('#testdetails').html(res); 
					 $('.popup_outer').css('display','block');	

				}
            });$.ajaxSetup({cache : true}); 
		}		
		function nextquestion(id)
		{ 
			var next = parseInt(id) + 1;	

			if (!$('input[name=answer'+id+']:checked').val()) { 
              		$('#error_msg').html('<label>Please choose the option!</label>') ; 	
			} else {
				 
				
				var answer = $('input[name=answer'+id+']:checked').val();
				var qtnid = $('#qtnid'+id).val();
				var question = $('#question'+id).val();
				var options = $('#options'+id).val();
				var ans = $('#ans'+id).val();
				var assid = $('#assID').val();
				var contest = $('#contest').val();
				 
				var test =  'id:'+qtnid+',question:'+question+',options:'+options+',correct:'+ans+',answer:'+answer;
				if(contest!=''){ 
					test = contest+'||'+test;
				}  
				$('#contest').val(test);
			 	$.ajax({
			    type: "POST",
			    url: "index.php/Learn/savequestions",
				data: ({qtnid:qtnid,answer:answer,assid:assid}),
				success: function(res)
				{	console.log(res);

				}
                });   $.ajaxSetup({cache : true}); 
				  
				 $('#error_msg').html('') ; 	
				 $('#qtn'+next).css('display','block'); 
				 $('#qtn'+id).css('display','none'); 
			}
		} 
		function testcompleted(id)
		{ 
			
			if (!$('input[name=answer'+id+']:checked').val()) { 
              		$('#error_msg').html('<label>Please choose the option!</label>') ; 	
			} else {
				
				var answer = $('input[name=answer'+id+']:checked').val();
				var qtnid = $('#qtnid'+id).val();
				var question = $('#question'+id).val();
				var options = $('#options'+id).val();
				var ans = $('#ans'+id).val();
				var assid = $('#assID').val();
				var contest = $('#contest').val();
				var title = $('#title').val();
				var testdesc = $('#testdesc').val();
				var score = $('#score').val();
				var qtncount = $('#qtncount').val();
				var minutes = $('#minutes').val();
				var seconds = $('#seconds').val();
				 
				var test =  'id:'+qtnid+',question:'+question+',options:'+options+',correct:'+ans+',answer:'+answer;
				if(contest!=''){ 
					test = contest+'||'+test;
				}  
				$('#contest').val(test);
				
			 	$.ajax({
			    type: "POST",
			    url: "index.php/Learn/testcompleted",
				data: ({qtnid:qtnid,answer:answer,assid:assid,test:test,title:title,testdesc:testdesc,score:score,qtncount:qtncount,minutes:minutes,seconds:seconds}),
				success: function(res)
				{	
				   $('.popup_outer').css('display','none');
				}
                });   $.ajaxSetup({cache : true}); 
				  
				
			 }
			
		} 
		/* =====================assessment====================== */		