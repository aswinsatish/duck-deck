var cform = {};
var Formchild = [];

$(document).ready(function() {
    $('#formcreate').val(Math.round((new Date()).getTime() / 1000));
     checkform();
});

 var mainurl = window.location.href;

 function checkform() {
     var formname = $('#formcateg').val();
     $.ajax({
         type: 'POST',
         url: mainurl + "/getcollection",
         data: ({
             formname: formname
         }),
         success: function(res) {
             $("#user_lst").html(res);
             checkheight();
         }
     });
 }

 $('#new-memo').click(function() {
     cform = {};
     Formchild = [];
     $("#dynamicform").html('');
     $("#fieldpropt").html('');
	 updateid();
     $(".create-memo h2").html('Create Collection');
	 $("#form-components").addClass("form-property");
     $("#createcollection").hide();
	 $("#savecollection").show();
     $("#updatecollection").hide();
     $("#bsynapse-memo").toggle('slow');
     $('body').addClass('bSynapse-modal-open');
     $('#bsynapse-memo').children().find('input,textarea').each(function() {
         $(this).val('');
         $("#collection_name_error").removeClass('show');
         $("#collection_description_error").removeClass('show');
     });
 });

  $('#savecollection').click(function() {
	 var name = $("#collection_name").val();
     var desc = $("#collection_description").val();
     var formname = $('#formcateg').val();
     if (name.trim() == '') {
         $("#collection_name_error").addClass('show');
     } else {
         $("#collection_name_error").removeClass('show');
     }
     if (desc.trim() == '') {
         $("#collection_description_error").addClass('show');
     } else {
         $("#collection_description_error").removeClass('show');
     }
     if (name != '' && desc != '') 
	 {
		
		 $("#form-components").removeClass("form-property");
		 $("#createcollection").show();
		 $("#savecollection").hide();
		 $("#updatecollection").hide();
	 }
  });
  
 function valiatecollection(param) {
     var name = $("#collection_name").val();
     var desc = $("#collection_description").val();
     var formname = $('#formcateg').val();
     if (name.trim() == '') {
         $("#collection_name_error").addClass('show');
     } else {
         $("#collection_name_error").removeClass('show');
     }
     if (desc.trim() == '') {
         $("#collection_description_error").addClass('show');
     } else {
         $("#collection_description_error").removeClass('show');
     }
     if (name != '' && desc != '') {
         if (confirm("Ready to create the form?") == true) {
 
             $.ajax({
                 type: 'POST',
                 url: mainurl + "/savecollection",
                 data: ({
                     name: name,
                     desc: desc,
                     param: param,
                     formname: formname
                 }),
                 success: function(req) {
                     $("#dynamicform").html('<img style="padding: 20% 45%;" src="assets/images/ajax_loader.gif">');
                     $.ajax({
                         type: 'POST',
                         url: mainurl + "/createjson",
                         data: ({
                             cform: cform,
                             formname: formname
                         }),
                         success: function(res) {
                             checkform();
                             location.reload();
                         }
                     });
                 }
             });
         }
     }
 }


 function uploadattachment(ths, cnt) {
     if ($(ths.id).val() != '') {
         $('#form_error_' + cnt).addClass('hide');
     }
     $('#saveform').prop('disabled', true);
     var file_data = $(ths).prop('files')[0];
     var form_data = new FormData();
     form_data.append('file', file_data);
     $.ajax({
         xhr: function() {
             var xhr = new window.XMLHttpRequest();
             xhr.upload.addEventListener("progress", function(evt) {
                 if (evt.lengthComputable) {
                     var percentComplete = evt.loaded / evt.total;
                     percentComplete = parseInt(percentComplete * 100);
                     $('#progress_' + cnt).removeClass('hide');
                     $('#progress-bar_' + cnt).css('width', percentComplete + "%");
                     $('#progress-bar_' + cnt).html(percentComplete + "%");
                     $('#progress-result_' + cnt).html('Uploading in progress...');
                     if (percentComplete === 100) {

                     }
                 }
             }, false);
             return xhr;
         },

         url: mainurl + "/uploadFile",
         dataType: 'text',
         cache: false,
         contentType: false,
         processData: false,
         data: form_data,
         type: 'post',
         success: function(req) {
             $('#progress-result_' + cnt).html('File uploaded successfully!');
             $('#saveform').prop('disabled', false);
         }
     });
 }

 $("#collectionsearch").keyup(function() {
     var search = $('#collectionsearch').val();
     $("#subcollection").html('<img style="padding: 20% 45%;" src="assets/images/ajax_loader.gif">');
     $.ajax({
         type: 'POST',
         url: mainurl + "/collectionsearch",
         data: ({
             search: search,
             method: 'index',
             refer: 'nav'
         }),
         success: function(req) {
             $('#subcollection').html(req);
         }
     });
 });

 $("#name_search").keyup(function() {
     var search = $('#name_search').val();
     $("#user_lst").html('<img style="padding: 20% 45%;" src="assets/images/ajax_loader.gif">');
     $.ajax({
         type: 'POST',
         url: mainurl + "/collectionsearch",
         data: ({
             search: search,
             method: 'index',
             refer: 'main'
         }),
         success: function(req) {
             $('#user_lst').html(req);
         }
     });
 });

 function editcollection(id) {
     //var formname=$('#formcateg').val();
     $('#formcateg').val(id);
     var formname = id;
     cform = {};
     Formchild = [];
     $("#dynamicform").html('');
     $.ajax({
         type: 'POST',
         url: mainurl + "/upatecollection",
         data: ({
             formname: formname
         }),
         success: function(res) {
             $("#bsynapse-memo").toggle('slow');
             $(".create-memo h2").html('Update Collection');
			 $("#form-components").removeClass("form-property");
             $("#createcollection").hide();
             $("#updatecollection").show();
			 $("#savecollection").hide();
              $('body').addClass('bSynapse-modal-open');
             $('#bsynapse-memo').children().find('input,textarea').each(function() {
                 $(this).val('');
                 $("#collection_name_error").removeClass('show');
                 $("#collection_description_error").removeClass('show');
             });
             $("#form1").html(res);
         }
     });
     $.ajax({
         type: 'POST',
         url: mainurl + "/getjson",
         dataType: "json",
         data: ({
             formname: formname
         }),
         success: function(req) {
             if (req != 0 && req != '0' && req != null && req != 'null') {
                 Formchild = req;
                 cform = Formchild;
                 renderForm(req, 'render');
             }
         }
     });
 }
 
$('#close-modal').click(function() {
    $("#bsynapse-memo").fadeOut("slow");
    $('body').removeClass('bSynapse-modal-open');
});

$('#close-modal').click(function() {
    $("#bsynapse-memo").fadeOut("slow");
    $('body').removeClass('bSynapse-modal-open');
});

$('#collection_name').change(function() {
    var name = $("#collection_name").val();
    if (name.trim() == '') {
        $("#collection_name_error").addClass('show');
    } else {
        $("#collection_name_error").removeClass('show');
    }
});

$('#collection_description').change(function() {
    var desc = $("#collection_description").val();
    if (desc.trim() == '') {
        $("#collection_description_error").addClass('show');
    } else {
        $("#collection_description_error").removeClass('show');
    }
});

function makeform(typ) {
    var count = $('#formcreate').val();
    if (typ == 'text') {
        Formchild.push({
            'id': 'form_child_' + count,
            'type': typ,
            'masterid': count,
            'name': 'form_child_' + count,
            'placeholder': 'Placeholder',
            'label': 'label',
            'validation': 'Yes',
            'errormsg': 'Please enter the value'
        });

        cform = Formchild;
    }
    if (typ == 'textarea') {
        Formchild.push({
            'id': 'form_child_' + count,
            'type': typ,
            'masterid': count,
            'name': 'form_child_' + count,
            'placeholder': 'Placeholder',
            'label': 'label',
            'validation': 'Yes',
            'errormsg': 'Please enter the value'
        });

        cform = Formchild;
    }
    if (typ == 'dropdown') {
        Formchild.push({
            'id': 'form_child_' + count,
            'type': typ,
            'masterid': count,
            'name': 'form_child_' + count,
            'placeholder': 'Placeholder',
            'label': 'label',
            'validation': 'Yes',
            'option': ["Option"],
            'errormsg': 'Please select the option'
        });

        cform = Formchild;
    }
    if (typ == 'attachment') {
        Formchild.push({
            'id': 'form_child_' + count,
            'type': typ,
            'masterid': count,
            'name': 'form_child_' + count,
            'placeholder': 'Placeholder',
            'label': 'label',
            'validation': 'Yes',
            'errormsg': 'Please select the file'
        });

        cform = Formchild;
    }
    if (typ == 'switch') {
        Formchild.push({
            'id': 'form_child_' + count,
            'type': typ,
            'masterid': count,
            'name': 'form_child_' + count,
            'placeholder': 'Placeholder',
            'label': 'label',
            'option': ["Option"],
            'validation': 'Yes',
            'errormsg': 'Please select any one option'
        });

        cform = Formchild;
    }
    if (typ == 'checkbox') {
        Formchild.push({
            'id': 'form_child_' + count,
            'masterid': count,
            'type': typ,
            'name': 'form_child_' + count,
            'placeholder': 'Placeholder',
            'label': 'label',
            'option': ["Option"],
            'validation': 'Yes',
            'errormsg': 'Please select atleast one option'
        });

        cform = Formchild;
    }
    if (typ == 'button') {
        Formchild.push({
            'id': 'form_child_' + count,
            'masterid': count,
            'type': typ,
            'name': 'form_child_' + count,
            'placeholder': 'Submit'
        });

        cform = Formchild;
    }
    count++;
    $('#formcreate').val(count);
    renderForm(cform, 'create');
}

function addchildoption(parentcnt, typ) {
    var count = $('#formcreate').val();
    var id = "'form_child_'";
    count++;
    $('#formcreate').val(count);
    for (var i = 0; i < cform.length; i++) {
        if (cform[i].masterid == parentcnt) {
            cform[i].option.push('Option');
            var radio = extra = checkbox = dropdown = '';
            for (var k = 0; k < cform[i].option.length; k++) {
                if (typ == 'dropdown') {
                    var placeholder = "'dropdown'";
                    var labelid = "'option_'";

                    dropdown += '<option id="option_' + cform[i].masterid + '_' + k + '" value="' + cform[i].option[k] + '">' + cform[i].option[k] + '</option>';

                    extra += '<div><input id="change_placeholder_' + cform[i].masterid + '_' + k + '"  name="change_placeholder_' + cform[i].masterid + '" onchange="changeoption(this,' + cform[i].masterid + ',' + k + ')" onkeyup="changeoptatts(this,' + id + ',' + placeholder + ',' + cform[i].masterid + ',' + labelid + ',' + k + ')"  class="form-control" placeholder="Change option" type="text" value="' + cform[i].option[k] + '" style="width:94%;"><a href="javascript:void(0)"  onclick="deletechild(' + cform[i].masterid + ',this,' + k + ',' + placeholder + ')" class="text-danger pull-right m-t" title="Remove Field" style="font-size: 15px;"><i class="fa fa-trash "></i></a></div>';

                    $("#form_child_" + parentcnt).html('');
                    $("#form_child_" + parentcnt).html(dropdown);
                    $("#change_dropli_" + parentcnt).html('');
                    $("#change_dropli_" + parentcnt).html(extra);
                }
                if (typ == 'switch') {
                    var placeholder = "'switch'";

                    radio += '<div class="radio radio-info" id="rmoption_' + cform[i].masterid + '_' + k + '"><input id="' + cform[i].name + '_' + k + '" name="' + cform[i].name + '" value="' + cform[i].option[k] + '"  type="radio" ><label for="form_child_' + cform[i].masterid + '_' + k + '">' + cform[i].option[k] + '</label></div> ';

                    extra += '<div><input id="change_placeholder_' + cform[i].masterid + '_' + k + '"  name="change_placeholder_' + cform[i].masterid + '" onchange="changeoption(this,' + cform[i].masterid + ',' + k + ')" onkeyup="changeoptatts(this,' + id + ',' + placeholder + ',' + cform[i].masterid + ',' + id + ',' + k + ')"  class="form-control" placeholder="Change option" type="text" value="' + cform[i].option[k] + '" style="width:94%;"><a href="javascript:void(0)"  onclick="deletechild(' + cform[i].masterid + ',this,' + k + ',' + placeholder + ')" class="text-danger pull-right m-t" title="Remove Field" style="font-size: 15px;"><i class="fa fa-trash "></i></a></div>';

                    $("#appendparent_" + parentcnt).html('');
                    $("#appendparent_" + parentcnt).html(radio);
                    $("#change_dropli_" + parentcnt).html('');
                    $("#change_dropli_" + parentcnt).html(extra);

                }
                if (typ == 'checkbox') {
                    var placeholder = "'checkbox'";

                    checkbox += '<div class="checkbox checkbox-info m-b" id="rmoption_' + cform[i].masterid + '_' + k + '"><input  id="' + cform[i].name + '_' + k + '" name="' + cform[i].name + '" value="' + cform[i].option[k] + '"  type="checkbox" ><label for="form_child_' + cform[i].masterid + '_' + k + '">' + cform[i].option[k] + '</label></div> ';

                    extra += '<div><input id="change_placeholder_' + cform[i].masterid + '_' + k + '"  name="change_placeholder_' + cform[i].masterid + '" onchange="changeoption(this,' + cform[i].masterid + ',' + k + ')" onkeyup="changeoptatts(this,' + id + ',' + placeholder + ',' + cform[i].masterid + ',' + id + ',' + k + ')"  class="form-control" placeholder="Change option" type="text" value="' + cform[i].option[k] + '" style="width:94%;"><a href="javascript:void(0)"  onclick="deletechild(' + cform[i].masterid + ',this,' + k + ',' + placeholder + ')" class="text-danger pull-right m-t" title="Remove Field" style="font-size: 15px;"><i class="fa fa-trash "></i></a></div>';

                    $("#appendparent_" + parentcnt).html('');
                    $("#appendparent_" + parentcnt).html(checkbox);
                    $("#change_dropli_" + parentcnt).html('');
                    $("#change_dropli_" + parentcnt).html(extra);

                }
            }

            break;
        }
    }
    masterJson();
}

function deletechild(param, ths, j, typ) {
    var cnt = $("#change_dropli_" + param + "> div > input").length;
    var placeholder = "'switch'";
    var id = "'form_child_'";
    if (confirm("Do you want to remove this option?") == true) {
        if (cnt > 1) {
            $(ths).parent().remove();
            $('#rmoption_' + param + '_' + j).remove();

            for (var i = 0; i < cform.length; i++) {
                if (cform[i].masterid == param) {
                    cform[i].option.splice(j, 1);
                    var radio = extra = checkbox = dropdown = '';
                    for (var k = 0; k < cform[i].option.length; k++) {
                        if (typ == 'dropdown') {
                            var placeholder = "'dropdown'";
                            var labelid = "'option_'";

                            dropdown += '<option id="option_' + cform[i].masterid + '_' + k + '" value="' + cform[i].option[k] + '">' + cform[i].option[k] + '</option>';

                            extra += '<div><input id="change_placeholder_' + cform[i].masterid + '_' + k + '"  name="change_placeholder_' + cform[i].masterid + '" onchange="changeoption(this,' + cform[i].masterid + ',' + k + ')" onkeyup="changeoptatts(this,' + id + ',' + placeholder + ',' + cform[i].masterid + ',' + id + ',' + k + ')"  class="form-control" placeholder="Change option" type="text" value="' + cform[i].option[k] + '" style="width:94%;"><a href="javascript:void(0)"  onclick="deletechild(' + cform[i].masterid + ',this,' + k + ',' + placeholder + ')" class="text-danger pull-right m-t" title="Remove Field" style="font-size: 15px;"><i class="fa fa-trash "></i></a></div>';

                            $("#form_child_" + param).html('');
                            $("#form_child_" + param).html(dropdown);
                            $("#change_dropli_" + param).html('');
                            $("#change_dropli_" + param).html(extra);
                        }
                        if (typ == 'switch') {
                            var placeholder = "'switch'";
                            var labelid = "'form_child_'";

                            radio += '<div class="radio radio-info" id="rmoption_' + cform[i].masterid + '_' + k + '"><input id="' + cform[i].name + '_' + k + '" name="' + cform[i].name + '" value="' + cform[i].option[k] + '"  type="radio" ><label for="form_child_' + cform[i].masterid + '_' + k + '">' + cform[i].option[k] + '</label></div> ';

                            extra += '<div><input id="change_placeholder_' + cform[i].masterid + '_' + k + '"  name="change_placeholder_' + cform[i].masterid + '" onchange="changeoption(this,' + cform[i].masterid + ',' + k + ')" onkeyup="changeoptatts(this,' + id + ',' + placeholder + ',' + cform[i].masterid + ',' + id + ',' + k + ')"  class="form-control" placeholder="Change option" type="text" value="' + cform[i].option[k] + '" style="width:94%;"><a href="javascript:void(0)"  onclick="deletechild(' + cform[i].masterid + ',this,' + k + ',' + placeholder + ')" class="text-danger pull-right m-t" title="Remove Field" style="font-size: 15px;"><i class="fa fa-trash "></i></a></div>';

                            $("#appendparent_" + param).html('');
                            $("#appendparent_" + param).html(radio);
                            $("#change_dropli_" + param).html('');
                            $("#change_dropli_" + param).html(extra);

                        }
                        if (typ == 'checkbox') {
                            var placeholder = "'checkbox'";
                            var labelid = "'form_child_'";

                            checkbox += '<div class="checkbox checkbox-info m-b" id="rmoption_' + cform[i].masterid + '_' + k + '"><input  id="' + cform[i].name + '_' + k + '" name="' + cform[i].name + '" value="' + cform[i].option[k] + '"  type="checkbox" ><label for="form_child_' + cform[i].masterid + '_' + k + '">' + cform[i].option[k] + '</label></div> ';

                            extra += '<div><input id="change_placeholder_' + cform[i].masterid + '_' + k + '"  name="change_placeholder_' + cform[i].masterid + '" onchange="changeoption(this,' + cform[i].masterid + ',' + k + ')" onkeyup="changeoptatts(this,' + id + ',' + placeholder + ',' + cform[i].masterid + ',' + id + ',' + k + ')"  class="form-control" placeholder="Change option" type="text" value="' + cform[i].option[k] + '" style="width:94%;"><a href="javascript:void(0)"  onclick="deletechild(' + cform[i].masterid + ',this,' + k + ',' + placeholder + ')" class="text-danger pull-right m-t" title="Remove Field" style="font-size: 15px;"><i class="fa fa-trash "></i></a></div>';

                            $("#appendparent_" + param).html('');
                            $("#appendparent_" + param).html(checkbox);
                            $("#change_dropli_" + param).html('');
                            $("#change_dropli_" + param).html(extra);

                        }
                    }

                    break;
                }
            }

        } else {
            alert("Minimum one option is required!");
        }
    }
    masterJson();
}

function removediv(param) {
    if (confirm("Do you want to remove this field?") == true) {
        for (var i = 0; i < cform.length; i++) {
            if (cform[i].id == 'form_child_' + param) {
                cform.splice(i, 1);
                break;
            }
        }
        renderForm(cform, 'create');
        $("#changeprop_" + param).remove();
        $("#remove_" + param).remove();
    }
}

function changediv(param) {  
    $(".prop-field-only").hide("slow");
    $("#changeprop_" + param).toggle("slow");
    $('#remove_' + param).addClass("edit-filed-box");
    $('#remove_' + param).siblings().removeClass("edit-filed-box");
}

function checkClick(ths, cnt) {

    if ($(ths).prop("checked") == true) {
        $('#error_li_' + cnt).removeClass("hide");
        $('#form_error_' + cnt).removeClass("hide");
    } else {
        for (var i = 0; i < cform.length; i++) {
            if (cform[i].id == 'form_child_' + cnt) {
                cform[i].validation = 'No';
                cform[i].errormsg = '';
                break;
            }
        }

        $('#error_li_' + cnt).addClass("hide");
        $('#form_error_' + cnt).addClass("hide");
    }
}

function changeoption(ths, cnt, index) {
    var indexval = $("#" + ths.id).index();
    var changevalue = $("#" + ths.id).val();
    for (var i = 0; i < cform.length; i++) {
        if (cform[i].masterid == cnt) {
            if (cform[i].option[index] == undefined) {
                cform[i].option.push(changevalue);
            } else {
                cform[i].option[index] = changevalue;
            }
            break;
        }
    }
}

function changeoptatts(ths, fid, typ, cnt, labelid, j) {
    var changevalue = $("#" + ths.id).val();
    if (typ == 'dropdown') {
        if (changevalue != '') {
            $("#" + labelid + cnt + '_' + j).html(changevalue);
            $("#" + labelid + cnt + '_' + j).val(changevalue);
        } else {
            $("#" + labelid + cnt + '_' + j).html("Option");
        }
    }
    if (typ == 'switch' || typ == 'checkbox') {
        if (changevalue != '') {
            $("label[for=" + labelid + cnt + '_' + j + "]").html(changevalue);
            $("#" + labelid + cnt + '_' + j).val(changevalue);
        } else {
            $("#" + labelid + cnt + '_' + j).html("Option");
        }
    }
}

function changeattribute(ths, fid, typ, cnt, labelid) {
    var changevalue = $("#" + ths.id).val();
    if (typ == 'placeholder') {
        for (var i = 0; i < cform.length; i++) {
            if (cform[i].id == 'form_child_' + cnt) {
                cform[i].placeholder = changevalue;
                break;
            }
        }

        if (changevalue != '') {
            $("#" + fid + cnt).attr("placeholder", changevalue);
        } else {
            $("#" + fid + cnt).attr("placeholder", "placeholder");
        }

    }

    if (typ == 'label') {

        for (var i = 0; i < cform.length; i++) {
            if (cform[i].id == 'form_child_' + cnt) {
                cform[i].label = changevalue;
                break;
            }
        }
        if (changevalue != '') {
            $("#" + labelid + cnt).html(changevalue);
        } else {
            $("#" + labelid + cnt).html("Text");
        }
    }

    if (typ == 'texterror') {
        for (var i = 0; i < cform.length; i++) {
            if (cform[i].id == 'form_child_' + cnt) {
                cform[i].validation = 'Yes';
                cform[i].errormsg = changevalue;
                break;
            }
        }
        if (changevalue != '') {
            $("#form_error_" + cnt).html('<strong>Error!</strong> ' + changevalue);
        } else {
            $("#form_error_" + cnt).html('<strong>Error!</strong> ');
        }
    }
    if (typ == 'button') {
        for (var i = 0; i < cform.length; i++) {
            if (cform[i].id == 'form_child_' + cnt) {
                cform[i].placeholder = changevalue;
                break;
            }
        }

        if (changevalue != '') {
            $("#" + labelid + cnt).html(changevalue);
        } else {
            $("#" + labelid + cnt).html("Submit");
        }
    }
}


function renderForm(req, method) {
    $("#dynamicform").html('');
    $("#checklength").val(req.length);
    if (cform.length != 0) {
        for (var i = 0; i < req.length; i++) {
            var errornotation = checks = '';
            if (req[i].validation === "Yes") {
                checks = 'checked';
                errornotation = '';
            }
            if (req[i].validation === "No") {
                checks = '';
                errornotation = '';
            }

            var form = {
                changer: '<div  class="edit-close-icon-right" id="edit_delete_' + req[i].masterid + '"><a class="editt-icon m-r-xs" onclick="changediv(' + req[i].masterid + ')" href="javascript:void(0);"><img src="./assets/icons/icon-9.png" alt="close-icon"></a><a class="closed-icon" href="javascript:removediv(' + req[i].masterid + ')"><img src="./assets/icons/icon-13.png" alt="close-icon"></a></div>',

                formerror: '<div id="form_error_' + req[i].masterid + '" class="alert alert-danger m-b-none m-t-sm hide"><strong> Error! </strong>' + req[i].errormsg + '</div>',

                formrequired: '<div class="checkbox checkbox-info gender-itm"><input id="text_require_' + req[i].masterid + '" name="text_require_' + req[i].masterid + '" onclick="checkClick(this,' + req[i].masterid + ');" class="styled" type="checkbox" ' + checks + '><label for="text_require_' + req[i].masterid + '">Required </label></div>',

                texterror: "'texterror'",
                labelid: "'formlabel_'",
                id: "'form_child_'",
                label: "'label'"

            };


            if (req[i].type == 'text') {
                var placeholder = "'placeholder'";
                var properties = '<div id="changeprop_' + req[i].masterid + '"  class="field-propt clearfix theme-selector prop-field-only"><p class="field-head">Field properties</p><div class="edit-frm-elm clearfix"><p class="edit-filed-catg"><span class="icon"><img src="./assets/icons/icon-1.png" alt="close-icon"></span> Text Box</p><div class="clearfix custom-check-box-bg mt-bt-15">' + form.formrequired + '</div><div class="form-group"><label class="elmnt-head">Label</label><input value="' + req[i].label + '" class="form-control" id="change_name_' + req[i].masterid + '" name="change_name_' + req[i].masterid + '" onkeyup="changeattribute(this,' + form.id + ',' + form.label + ',' + req[i].masterid + ',' + form.labelid + ')" placeholder="Change label" type="text" ></div><div class="form-group"><label class="elmnt-head">Placeholder</label><input value="' + req[i].placeholder + '" class="form-control" id="change_placeholder_' + req[i].masterid + '" name="change_placeholder_' + req[i].masterid + '" placeholder="Change Placeholder" onkeyup="changeattribute(this,' + form.id + ',' + placeholder + ',' + req[i].masterid + ',' + form.labelid + ')"  type="text" ></div><div id="error_li_' + req[i].masterid + '" class=" form-group"><label class="elmnt-head">Error Message</label><input value="' + req[i].errormsg + '" class="form-control" onkeyup="changeattribute(this,' + form.id + ',' + form.texterror + ',' + req[i].masterid + ',' + form.labelid + ')" id="change_texterror_' + req[i].masterid + '" name="change_texterror_' + req[i].masterid + '" placeholder="Change error message" type="text" ></div></div></div>';

                $('#fieldpropt').append(properties);

                $('#dynamicform').append('<div data-attribute="' + req[i].validation + '" data-label="' + req[i].label + '" id="remove_' + req[i].masterid + '" class="bSynapse-form clearfix"><div class="clearfix"><p id="formlabel_' + req[i].masterid + '" class="elmnt-head">' + req[i].label + errornotation + '</p>' + form.changer + '</div><input id="form_child_' + req[i].masterid + '" name="form_child_' + req[i].masterid + '" placeholder="' + req[i].placeholder + '" type="text">' + form.formerror + '</div>');

            }
            if (req[i].type == 'textarea') {

                var placeholder = "'placeholder'";
                var properties = '<div id="changeprop_' + req[i].masterid + '"  class="field-propt clearfix theme-selector prop-field-only"><p class="field-head">Field properties</p><div class="edit-frm-elm clearfix"><p class="edit-filed-catg"><span class="icon"><img src="./assets/icons/icon-2.png" alt="close-icon"></span> Text Area</p><div class="clearfix custom-check-box-bg mt-bt-15">' + form.formrequired + '</div><div class="form-group"><label class="elmnt-head">Label</label><input value="' + req[i].label + '" class="form-control" id="change_name_' + req[i].masterid + '" name="change_name_' + req[i].masterid + '" onkeyup="changeattribute(this,' + form.id + ',' + form.label + ',' + req[i].masterid + ',' + form.labelid + ')" placeholder="Change label" type="text" ></div><div class="form-group"><label class="elmnt-head">Placeholder</label><input value="' + req[i].placeholder + '" class="form-control" id="change_placeholder_' + req[i].masterid + '" name="change_placeholder_' + req[i].masterid + '" placeholder="Change Placeholder" onkeyup="changeattribute(this,' + form.id + ',' + placeholder + ',' + req[i].masterid + ',' + form.labelid + ')"  type="text" ></div><div id="error_li_' + req[i].masterid + '" class=" form-group"><label class="elmnt-head">Error Message</label><input value="' + req[i].errormsg + '" class="form-control" onkeyup="changeattribute(this,' + form.id + ',' + form.texterror + ',' + req[i].masterid + ',' + form.labelid + ')" id="change_texterror_' + req[i].masterid + '" name="change_texterror_' + req[i].masterid + '" placeholder="Change error message" type="text" ></div></div></div>';

                $('#fieldpropt').append(properties);

                $('#dynamicform').append('<div data-attribute="' + req[i].validation + '" data-label="' + req[i].label + '" id="remove_' + req[i].masterid + '" class="bSynapse-form clearfix"><div class="clearfix"><p id="formlabel_' + req[i].masterid + '" class="elmnt-head">' + req[i].label + errornotation + '</p>' + form.changer + '</div><textarea id="form_child_' + req[i].masterid + '" name="form_child_' + req[i].masterid + '" placeholder="' + req[i].placeholder + '" ></textarea>' + form.formerror + '</div>');

            }
            if (req[i].type == 'dropdown') {
                var placeholder = "'dropdown'";
                var opid = "'option_'";
                var option = extra = '';
                if (req[i].option) {
                    for (var j = 0; j < req[i].option.length; j++) {
                        option += '<option id="option_' + req[i].masterid + '_' + j + '" value="' + req[i].option[j] + '">' + req[i].option[j] + '</option>';
                        extra += '<div><input value="' + req[i].option[j] + '" id="change_placeholder_' + req[i].masterid + '_' + j + '" name="change_placeholder_' + req[i].masterid + '" onchange="changeoption(this,' + req[i].masterid + ',' + j + ')" onkeyup="changeoptatts(this,' + form.id + ',' + placeholder + ',' + req[i].masterid + ',' + opid + ',' + j + ')"  class="form-control m-t-xs" placeholder="Change option" type="text"  style="width:94%;"><a href="javascript:void(0)"  onclick="deletechild(' + req[i].masterid + ',this,' + j + ',' + placeholder + ')" class="text-danger pull-right m-t" title="Remove Field" style="font-size: 15px;"><i class="fa fa-trash "></i></a></div>';

                    }
                }

                var properties = '<div id="changeprop_' + req[i].masterid + '" class="field-propt clearfix theme-selector prop-field-only"><p class="field-head">Field properties</p><div class="edit-frm-elm clearfix"><p class="edit-filed-catg"><span class="icon"><img src="./assets/icons/icon-6.png" alt="close-icon"></span> Dropdown</p><div class="clearfix custom-check-box-bg mt-bt-15">' + form.formrequired + '</div><div class="form-group"><label class="elmnt-head">Label</label><input value="' + req[i].label + '" class="form-control" onkeyup="changeattribute(this,' + form.id + ',' + form.label + ',' + req[i].masterid + ',' + form.labelid + ')" id="change_name_' + req[i].masterid + '" name="change_name_' + req[i].masterid + '" placeholder="Change label" type="text" ></div><div class="form-group"><label class="elmnt-head">Options</label><div class="add-forms clearfix" ><a class="add-icon" onclick="addchildoption(' + req[i].masterid + ',' + placeholder + ')" href="javascript:void(0)"><img src="./assets/icons/icon-12.png" alt="add-icon"></a><div id="change_dropli_' + req[i].masterid + '">' + extra + '</div> </div><div id="error_li_' + req[i].masterid + '" class=" form-group"><label class="elmnt-head">Error Message</label><input value="' + req[i].errormsg + '" class="form-control" onkeyup="changeattribute(this,' + form.id + ',' + form.texterror + ',' + req[i].masterid + ',' + form.labelid + ')" id="change_texterror_' + req[i].masterid + '" name="change_texterror_' + req[i].masterid + '" placeholder="Change error message" type="text" ></div></div></div></div>';

                $('#fieldpropt').append(properties);

                $('#dynamicform').append('<div data-attribute="' + req[i].validation + '" data-label="' + req[i].label + '" id="remove_' + req[i].masterid + '" class="bSynapse-form clearfix"><div class="clearfix"><p id="formlabel_' + req[i].masterid + '" class="elmnt-head">' + req[i].label + errornotation + '</p>' + form.changer + '</div><select class=" form-control form-control-size " id="form_child_' + req[i].masterid + '" name="form_child_' + req[i].masterid + '" style=" border: 1px solid #e3e4e8;" >' + option + '</select>' + form.formerror + '</div>');


            }
            if (req[i].type == 'attachment') {

                var placeholder = "'attachment'";

                var properties = '<div id="changeprop_' + req[i].masterid + '"  class="field-propt clearfix theme-selector prop-field-only"><p class="field-head">Field properties</p><div class="edit-frm-elm clearfix"><p class="edit-filed-catg"><span class="icon"><img src="./assets/icons/icon-1.png" alt="close-icon"></span> Text Box</p><div class="clearfix custom-check-box-bg mt-bt-15">' + form.formrequired + '</div><div class="form-group"><label class="elmnt-head">Label</label><input value="' + req[i].label + '" class="form-control" id="change_name_' + req[i].masterid + '" name="change_name_' + req[i].masterid + '" onkeyup="changeattribute(this,' + form.id + ',' + form.label + ',' + req[i].masterid + ',' + form.labelid + ')" placeholder="Change label" type="text" ></div><div id="error_li_' + req[i].masterid + '" class=" form-group"><label class="elmnt-head">Error Message</label><input value="' + req[i].errormsg + '" class="form-control" onkeyup="changeattribute(this,' + form.id + ',' + form.texterror + ',' + req[i].masterid + ',' + form.labelid + ')" id="change_texterror_' + req[i].masterid + '" name="change_texterror_' + req[i].masterid + '" placeholder="Change error message" type="text" ></div></div></div>';

                $('#fieldpropt').append(properties);

                $('#dynamicform').append('<div data-attribute="' + req[i].validation + '" data-label="' + req[i].label + '" id="remove_' + req[i].masterid + '" class="bSynapse-form clearfix"><div class="clearfix"><p id="formlabel_' + req[i].masterid + '" class="elmnt-head">' + req[i].label + errornotation + '</p>' + form.changer + '</div><input type="file" name="form_child_' + req[i].masterid + '" id="form_child_' + req[i].masterid + '" class="filestyle m-b-xs" data-input="false" onchange="uploadattachment(this,' + req[i].masterid + ')"><div class="progress m-b-none hide" id="progress_' + req[i].masterid + '"> <div id="progress-bar_' + req[i].masterid + '" class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:0%;"></div></div><div id="progress-result_' + req[i].masterid + '"></div>' + form.formerror + '</div>');

                $.getScript("assets/js/bootstrap-filestyle.js");

            }
            if (req[i].type == 'switch') {
                var radio = extra = '';
                var placeholder = "'switch'";

                for (var j = 0; j < req[i].option.length; j++) {
                    radio += '<div class="radio radio-info" id="rmoption_' + req[i].masterid + '_' + j + '"><input id="' + req[i].name + '_' + j + '" name="' + req[i].name + '" value="' + req[i].option[j] + '"  type="radio" ><label for="form_child_' + req[i].masterid + '_' + j + '">' + req[i].option[j] + '</label></div> ';

                    extra += '<div><input value="' + req[i].option[j] + '" id="change_placeholder_' + req[i].masterid + '_' + j + '"  name="change_placeholder_' + req[i].masterid + '" onchange="changeoption(this,' + req[i].masterid + ',' + j + ')" onkeyup="changeoptatts(this,' + form.id + ',' + placeholder + ',' + req[i].masterid + ',' + form.id + ',' + j + ')"  class="form-control m-t-xs" placeholder="Change option" type="text"  style="width:94%;"><a href="javascript:void(0)"  onclick="deletechild(' + req[i].masterid + ',this,' + j + ',' + placeholder + ')" class="text-danger pull-right m-t" title="Remove Field" style="font-size: 15px;"><i class="fa fa-trash "></i></a></div>';
                }

                var properties = '<div id="changeprop_' + req[i].masterid + '" class="field-propt clearfix theme-selector prop-field-only"><p class="field-head">Field properties</p><div class="edit-frm-elm clearfix"><p class="edit-filed-catg"><span class="icon"><img src="./assets/icons/icon-4.png" alt="close-icon"></span> Radio Button</p><div class="clearfix custom-check-box-bg mt-bt-15">' + form.formrequired + '</div><div class="form-group"><label class="elmnt-head">Label</label><input value="' + req[i].label + '" class="form-control" onkeyup="changeattribute(this,' + form.id + ',' + form.label + ',' + req[i].masterid + ',' + form.labelid + ')" id="change_name_' + req[i].masterid + '" name="change_name_' + req[i].masterid + '" placeholder="Change label" type="text" ></div><div class="form-group"><label class="elmnt-head">Options</label><div class="add-forms clearfix" ><a class="add-icon" onclick="addchildoption(' + req[i].masterid + ',' + placeholder + ')" href="javascript:void(0)"><img src="./assets/icons/icon-12.png" alt="add-icon"></a><div id="change_dropli_' + req[i].masterid + '">' + extra + '</div> </div><div id="error_li_' + req[i].masterid + '" class=" form-group"><label class="elmnt-head">Error Message</label><input value="' + req[i].errormsg + '" class="form-control" onkeyup="changeattribute(this,' + form.id + ',' + form.texterror + ',' + req[i].masterid + ',' + form.labelid + ')" id="change_texterror_' + req[i].masterid + '" name="change_texterror_' + req[i].masterid + '" placeholder="Change error message" type="text" ></div></div></div></div>';

                $('#fieldpropt').append(properties);

                $('#dynamicform').append('<div data-attribute="' + req[i].validation + '" data-label="' + req[i].label + '" id="remove_' + req[i].masterid + '" class="bSynapse-form clearfix"><div class="clearfix"><p id="formlabel_' + req[i].masterid + '" class="elmnt-head">' + req[i].label + errornotation + '</p>' + form.changer + '</div><div id="appendparent_' + req[i].masterid + '">' + radio + '</div>' + form.formerror + '</div>');

            }
            if (req[i].type == 'checkbox') {
                var checkbox = extra = '';
                var placeholder = "'checkbox'";
                for (var j = 0; j < req[i].option.length; j++) {
                    checkbox += '<div class="checkbox checkbox-info m-b" id="rmoption_' + req[i].masterid + '_' + j + '"><input  id="' + req[i].name + '_' + j + '" name="' + req[i].name + '" value="' + req[i].option[j] + '"  type="checkbox" ><label for="form_child_' + req[i].masterid + '_' + j + '">' + req[i].option[j] + '</label></div> ';

                    extra += '<div><input value="' + req[i].option[j] + '" id="change_placeholder_' + req[i].masterid + '_' + j + '"  name="change_placeholder_' + req[i].masterid + '" onchange="changeoption(this,' + req[i].masterid + ',' + j + ')" onkeyup="changeoptatts(this,' + form.id + ',' + placeholder + ',' + req[i].masterid + ',' + form.id + ',' + j + ')"  class="m-t-xs form-control" placeholder="Change option" type="text"  style="width:94%;"><a href="javascript:void(0)"  onclick="deletechild(' + req[i].masterid + ',this,' + j + ',' + placeholder + ')" class="text-danger pull-right m-t" title="Remove Field" style="font-size: 15px;"><i class="fa fa-trash "></i></a></div>';
                }

                var properties = '<div id="changeprop_' + req[i].masterid + '" class="field-propt clearfix theme-selector prop-field-only"><p class="field-head">Field properties</p><div class="edit-frm-elm clearfix"><p class="edit-filed-catg"><span class="icon"><img src="./assets/icons/icon-3.png" alt="close-icon"></span> Checkbox</p><div class="clearfix custom-check-box-bg mt-bt-15">' + form.formrequired + '</div><div class="form-group"><label class="elmnt-head">Label</label><input value="' + req[i].label + '" class="form-control" onkeyup="changeattribute(this,' + form.id + ',' + form.label + ',' + req[i].masterid + ',' + form.labelid + ')" id="change_name_' + req[i].masterid + '" name="change_name_' + req[i].masterid + '" placeholder="Change label" type="text" ></div><div class="form-group"><label class="elmnt-head">Options</label><div class="add-forms clearfix" ><a class="add-icon" onclick="addchildoption(' + req[i].masterid + ',' + placeholder + ')" href="javascript:void(0)"><img src="./assets/icons/icon-12.png" alt="add-icon"></a><div id="change_dropli_' + req[i].masterid + '">' + extra + '</div> </div><div id="error_li_' + req[i].masterid + '" class=" form-group"><label class="elmnt-head">Error Message</label><input value="' + req[i].errormsg + '" class="form-control" onkeyup="changeattribute(this,' + form.id + ',' + form.texterror + ',' + req[i].masterid + ',' + form.labelid + ')" id="change_texterror_' + req[i].masterid + '" name="change_texterror_' + req[i].masterid + '" placeholder="Change error message" type="text" ></div></div></div></div>';

                $('#fieldpropt').append(properties);

                $('#dynamicform').append('<div data-attribute="' + req[i].validation + '" data-label="' + req[i].label + '" id="remove_' + req[i].masterid + '" class="bSynapse-form clearfix"><div class="clearfix"><p id="formlabel_' + req[i].masterid + '" class="elmnt-head">' + req[i].label + errornotation + '</p>' + form.changer + '</div><div id="appendparent_' + req[i].masterid + '">' + checkbox + '</div> ' + form.formerror + '</div>');

            }
            if (req[i].type == 'button') {
                var button = "'button'";
                var buttonid = "'button_'";
                var properties = '<div id="changeprop_' + req[i].masterid + '"  class="field-propt clearfix theme-selector prop-field-only"><p class="field-head">Field properties</p><div class="edit-frm-elm clearfix"><p class="edit-filed-catg"><span class="icon"><img src="./assets/icons/icon-5.png" alt="close-icon"></span> Button</p><div class="clearfix custom-check-box-bg mt-bt-15"></div><div class="form-group"><label class="elmnt-head">Button Name</label><input value="' + req[i].placeholder + '" class="form-control" id="change_name_' + req[i].masterid + '" name="change_name_' + req[i].masterid + '" onkeyup="changeattribute(this,' + form.id + ',' + button + ',' + req[i].masterid + ',' + buttonid + ')" placeholder="Change button name" type="text" ></div></div></div>';

                $('#fieldpropt').append(properties);

                $('#dynamicform').append('<div  id="remove_' + req[i].masterid + '" class="bSynapse-form clearfix"><div class="clearfix"><p id="formlabel_' + req[i].masterid + '" class="elmnt-head"></p>' + form.changer + '</div><button id="button_' + req[i].masterid + '" type="button" class="btn btn-prew">' + req[i].placeholder + '</button></div>');

            }
			if(i==req.length-1)
			{ 
				changediv(req[i].masterid);
			}
			
        }
    }
    if (method == 'render') {
        $('.form-changer').hide();
        $('.bSynapse-form').removeClass("move");
    } else {
        $('.form-changer').show();
        $('.bSynapse-form').addClass("move");
        $("#dynamicform").sortable({
            update: function(event, ui) {
                masterJson();
                $('.move').removeAttr("style");
            }
        });
        $("#dynamicform").sortable({
            axis: "y"
        });
        $("#dynamicform").disableSelection();
    }
    masterJson();
}



function checkheight() {
    var height = $('#show-less').height();
    if (height > 75) {
        $('#show-less').addClass('show-less', {
            duration: 500
        });
        $('#showmore').show();
    } else {
        $('#showmore').hide();
    }
}

function showmore() {
    $('#show-less').removeClass('show-less', {
        duration: 500
    });
    $('#showless').removeClass('hide');
    $('#showmore').hide();
}

function showless() {
    $('#show-less').addClass('show-less', {
        duration: 500
    });
    $('#showmore').show();
    $('#showless').addClass('hide');
}
$('.btn-default').draggable({
    revert: true,
    helper: "clone",
    containment: $('#dynamicform')

});

$('#dynamicform').droppable({
    accept: '.btn-default',
    over: function() {
        $('.btn-default').draggable();
    },
    drop: function(event, ui) {
        makeform(ui.draggable.context.attributes["0"].value);
    }
});

function masterJson() {
    cform = {};
    Formchild = [];
    var count = $('#formcreate').val();
    var master = $('#dynamicform').children();
    var cnt = $('#dynamicform').children().length;
    if (cnt > 0) {
        for (var i = 0; i < cnt; i++) {
            var errormsg = master[i].lastChild.lastChild.nodeValue;
            var typ = master[i].children[1].type;
            var master_id = master[i].id;
            var res = master_id.split("_");
            var count = res[1];
            var id = 'form_child_' + count;
            var name = id;
            var label = master[i].children["0"].textContent;
            var validation = master[i].attributes["0"].value;
			
            if (typ == undefined) {
                typ = master[i].children[1].childNodes["0"].firstElementChild.type;
            }
            if (typ == 'text' || typ == 'textarea') {
                var placeholder = master[i].children[1].placeholder;
            }

            if (typ == 'text') {
                Formchild.push({
                    'id': id,
                    'type': typ,
                    'masterid': count,
                    'name': id,
                    'placeholder': placeholder,
                    'label': label,
                    'validation': validation,
                    'errormsg': errormsg
                });

                cform = Formchild;
            }
            if (typ == 'textarea') {
                Formchild.push({
                    'id': id,
                    'type': typ,
                    'masterid': count,
                    'name': id,
                    'placeholder': placeholder,
                    'label': label,
                    'validation': validation,
                    'errormsg': errormsg
                });

                cform = Formchild;
            }
            if (typ == 'select-one') {
                Formchild.push({
                    'id': id,
                    'type': 'dropdown',
                    'masterid': count,
                    'name': id,
                    'placeholder': 'Placeholder',
                    'label': label,
                    'validation': validation,
                    'option': [],
                    'errormsg': errormsg
                });

                cform = Formchild;
            }
            if (typ == 'file') {
                Formchild.push({
                    'id': id,
                    'type': 'attachment',
                    'masterid': count,
                    'name': id,
                    'placeholder': 'Placeholder',
                    'label': label,
                    'validation': validation,
                    'errormsg': errormsg
                });

                cform = Formchild;
            }
            if (typ == 'radio') {
                Formchild.push({
                    'id': id,
                    'type': 'switch',
                    'masterid': count,
                    'name': id,
                    'placeholder': 'Placeholder',
                    'label': label,
                    'option': [],
                    'validation': validation,
                    'errormsg': errormsg
                });

                cform = Formchild;
            }
            if (typ == 'checkbox') {
                Formchild.push({
                    'id': id,
                    'masterid': count,
                    'type': typ,
                    'name': id,
                    'placeholder': 'Placeholder',
                    'label': label,
                    'option': [],
                    'validation': validation,
                    'errormsg': errormsg
                });

                cform = Formchild;
            }
            if (typ == 'button') {
                Formchild.push({
                    'id': id,
                    'masterid': count,
                    'type': typ,
                    'name': id,
                    'placeholder': master[i].textContent
                });

                cform = Formchild;
            }

            if (typ == 'select-one') {
                for (var j = 0; j < master[i].children[1].children.length; j++) {
                    cform[i].option.push(master[i].children[1].children[j].value);
                }
            }
            if (typ == 'checkbox' || typ == 'radio') {
                for (var k = 0; k < master[i].children[1].children.length; k++) {
                    cform[i].option.push(master[i].children[1].children[k].textContent);
                }
            }
        }
    }

}