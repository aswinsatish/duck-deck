    $('.new-memo').click(function(){
       $(".memo-down").toggle();
    });
    $(".memo-down").mouseleave(function(){
    	$(this).hide();
    });

	$('.datetimepicker12').datetimepicker({
        inline: true,
        sideBySide: true
     //  altField:"#txtDateOther"
     });


   