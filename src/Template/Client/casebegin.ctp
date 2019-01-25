<div class="container">
    <script type="text/javascript">
        $(function() {
             $("#CaseTableSubjectDob").datepicker({
                dateFormat: "dd-MM-yy",
                defaultDate: new Date(1910, 00, 01),
                changeMonth: true,
                yearRange: "1910:c",
                changeYear: true,
                onClose: function() {
                    $(this).data("datepicker").inline = false;
                    var date = $("#CaseTableSubjectDob").datepicker("getDate");
                    if (date) {
                        d = date.getDate();
                        m = date.getMonth() + 1;
                        y = date.getFullYear();
                        $("#CaseTableSubjectDob1").val(d + "-" + m + "-" + y);
                    }
                },
                onChangeMonthYear: function(year, month, inst) { //$("#" + inst.id).datepicker( "setDate", "/1/" + month + year ); 
                var d = inst.selectedDay; $(this).datepicker("setDate", new Date(year, month - 1, d)); },onSelect: function(dateText) {var date = $("#CaseTableSubjectDob").datepicker("getDate");d = date.getDate(); m = date.getMonth() + 1; y = date.getFullYear();$("#CaseTableSubjectDob1").val(d+"-"+m+"-"+y); $(this).data("datepicker").inline = true; }}); $("#save_case").click(function(e){$("#CaseTableCasebeginForm").submit();e.preventDefault();}); $("#CaseTableSubjectBackground").keyup(function(){$("#CaseTableSubjectBackground").val($("#CaseTableSubjectBackground").val().substring(0,1000)).focus(); var psconsole = $("#CaseTableSubjectBackground");psconsole.scrollTop(psconsole[0].scrollHeight - psconsole.height()); var charcount = parseInt(parseInt(1000) - parseInt($("#CaseTableSubjectBackground").val().length)); $("#subject_background_count").html("(You have <font style=\'color:red;\'>"+charcount+"</font> characters remaining.)");});});
    </script>
    <form action="/client/casebegin" class="form-inline" id="CaseTableCasebeginForm" method="post" accept-charset="utf-8" enctype="multipart/form-data">
        <input type="hidden" value="<?php echo $this->request->getParam('_csrfToken'); ?>" name="_csrfToken"  />
        <div style="display:none;">
            <input type="hidden" name="_method" value="POST">
        </div>
        <input type="hidden" name="folderid" value="" id="CaseTableFolderid">
        

        <div class="content_box">
            <h1>Case Data<span>Center </span></h1>
            <div class="secure"> <span> Secure Contact</span> </div>
            <div class="clearfix"></div>
            <p>Please enter your case data below. Not all fields are required, but the more data you can provide, the more our investigators can verify and investigate. </p>
            <div>
            <?php if(isset($errors) && !empty($errors)): ?>
            <div class="alert_box">
                <div class="alert alert-danger fade in" role="alert">
                    <button class="close" data-dismiss="alert" type="button">
                        <span aria-hidden="true">x</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <figure>
                        <a href="#"><img src="https://www.wymoo.com/client/img/close.png" height="14" width="14" alt="close"></a>
                    </figure>
                        <strong>Please see the below error messages. Complete the form and submit again.</strong>
                </div>
            </div>
           
                    
               <?php
           
              foreach($errors as $err){
                         foreach($err as $nest){ ?>
                            <small style="color:#FF0000;"> 
                            <div class="error-message">
                             <?php   echo $nest; ?>
                            </div> 
                            </small>
                         <?php 
                         }         
                        }
                        
                            ?>   
                    

         <?php endif; ?>
            
             </div>
            <div class="row">
                <div class="col-sm-6">
                    <div>
                        <div class="form_content">
                            <h2>Step 1: Your Data</h2> <img src="<?php echo WEBSITE_URL;?>images/tabpoint.png" alt="tagpoint" class="tag_arrow"> </div>
                        <div class="form_box">
                            <div class="row">
                                <div class="col-sm-4">
                                    <label>Your First Name:<span class="error_class">*</span></label>
                                </div>
                                <div class="col-sm-8">
                                    <input name="client_fname" type="text" class="form-control" id="CaseTableClientFname"> </div>
                            </div>
                            <small style="color:#FF0000;"> <div class="error-message"><?php  ?></div> </small>
                            <div class="row">
                                <div class="col-sm-4">
                                    <label>Your Last Name:<span class="error_class">*</span></label>
                                </div>
                                <div class="col-sm-8">
                                    <input name="client_lname" type="text" class="form-control" id="CaseTableClientLname"> </div>
                            </div>
                            <small style="color:#FF0000;"> <div class="error-message"></div> </small>
                            <div class="row">
                                <div class="col-sm-4">
                                    <label>Your Email:<span class="error_class">*</span></label>
                                </div>
                                <div class="col-sm-8">
                                    <input name="client_email" type="text" class="form-control" id="CaseTableClientEmail"> </div>
                            </div>
                            <small style="color:#FF0000;"> <div class="error-message"><?php  ?></div> </small>
                        </div>
                    </div>
                    <div>
           
                        <div class="form_content">
                            <h2>Step 2: About the subject</h2> <img src="<?php echo WEBSITE_URL;?>images/tabpoint.png" alt="tagpoint" class="tag_arrow"> </div>
                        <div class="form_box">
                            <div class="row">
                                <div class="col-sm-4">
                                    <label>Subject's Full Name:</label>
                                </div>
                                <div class="col-sm-8">
                                    <input name="subject_fullname" type="text" class="form-control" id="CaseTableSubjectFullname"> </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <label>Subject's Alias:</label>
                                </div>
                                <div class="col-sm-8">
                                    <input name="subject_alias" type="text" class="form-control" id="CaseTableSubjectAlias"> </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <label>Subject's Email:</label>
                                </div>
                                <div class="col-sm-8">
                                    <input name="subject_email" type="text" class="form-control" id="CaseTableSubjectEmail"> </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <label>Subject's Phone:</label>
                                </div>
                                <div class="col-sm-8">
                                    <input name="subject_phone" type="text" class="form-control" id="CaseTableSubjectPhone"> </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <label>Subject's Date of Birth:</label>
                                </div>
                                <div class="col-sm-8">
                                    <input name="subject_dob1" type="text" id="CaseTableSubjectDob" class="form-control hasDatepicker">
                                    <input type="hidden" name="subject_dob" id="CaseTableSubjectDob1"> <small>*Leave blank and notify your investigator if unsure.</small> </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <label>Subject's Address:</label>
                                </div>
                                <div class="col-sm-8">
                                    <textarea name="subject_address" class="form-control" rows="4" style="height:65px;" id="CaseTableSubjectAddress"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <label>Subject's Education:</label>
                                </div>
                                <div class="col-sm-8">
                                    <textarea name="subject_education" class="form-control" rows="3" id="CaseTableSubjectEducation"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <label>Subject's Employment::</label>
                                </div>
                                <div class="col-sm-8">
                                    <textarea name="subject_employment" class="form-control" rows="3" style="height:65px;" id="CaseTableSubjectEmployment"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div>
                        <div class="form_content">
                            <h2>Step 3: Some background</h2> <img src="<?php echo WEBSITE_URL;?>images/tabpoint.png" alt="tagpoint" class="tag_arrow"> </div>
                        <div class="form_box">
                            <label>How do or did you communicate with the subject? </label>
                            <ul class="checkbox_list">
                                <li>
                                    <input type="hidden" name="subject_communication_email" id="CaseTableSubjectCommunicationEmail_" value="0">
                                    <input type="checkbox" name="subject_communication_email" value="1" id="CaseTableSubjectCommunicationEmail"> Email</li>
                                <li>
                                    <input type="hidden" name="subject_communication_messenger" id="CaseTableSubjectCommunicationMessenger_" value="0">
                                    <input type="checkbox" name="subject_communication_messenger" value="1" id="CaseTableSubjectCommunicationMessenger"> Messenger</li>
                                <li>
                                    <input type="hidden" name="subject_communication_phone" id="CaseTableSubjectCommunicationPhone_" value="0">
                                    <input type="checkbox" name="subject_communication_phone" value="1" id="CaseTableSubjectCommunicationPhone"> Phone</li>
                                <li>
                                    <input type="hidden" name="subject_communication_webcam" id="CaseTableSubjectCommunicationWebcam_" value="0">
                                    <input type="checkbox" name="subject_communication_webcam" value="1" id="CaseTableSubjectCommunicationWebcam"> Webcam</li>
                                <li>
                                    <input type="hidden" name="subject_communication_inperson" id="CaseTableSubjectCommunicationInperson_" value="0">
                                    <input type="checkbox" name="subject_communication_inperson" value="1" id="CaseTableSubjectCommunicationInperson"> In Person</li>
                            </ul>
                            <label>Please provide a brief summary of your case and how we can help. </label>
                            <div class="text_area">
                                <textarea name="subject_background" class="form-control" rows="4" id="CaseTableSubjectBackground"></textarea> <span id="subject_background_count">(1000 character maximum)</span> </div>
                        </div>
                    </div>
                    <div class="step4">
                        <div class="form_content">
                            <h2>Step 4: A Few Questions (if applicable)</h2> <img src="<?php echo WEBSITE_URL;?>images/tabpoint.png" alt="tagpoint" class="tag_arrow"> </div>
                        <div class="form_box">
                            <div class="row">
                                <div class="col-sm-7">
                                    <label>Has the subject sent any ID or documents?</label>
                                </div>
                                <div class="col-sm-5">
                                    <input name="subject_id" type="text" class="form-control" id="CaseTableSubjectId"> </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-7">
                                    <label>How long have you known the subject?</label>
                                </div>
                                <div class="col-sm-5">
                                    <input name="subject_how_long" type="text" class="form-control" id="CaseTableSubjectHowLong"> </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-7">
                                    <label>If you met the subject via the internet, please specify on which website.</label>
                                </div>
                                <div class="col-sm-5">
                                    <input name="subject_website_met" type="text" class="form-control" id="CaseTableSubjectWebsiteMet"> </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-7">
                                    <label>Have you sent anything to the subject's address? If so, was it received?</label>
                                </div>
                                <div class="col-sm-5">
                                    <input name="subject_sent_address" type="text" class="form-control" id="CaseTableSubjectSentAddress"> </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="form_content">
                            <h2>Step 5: Optional Documentation</h2> <img src="<?php echo WEBSITE_URL;?>images/tabpoint.png" alt="tagpoint" class="tag_arrow"> </div>
                        <div class="form_box photo_add">
                            <table width="100%" border="0" cellspacing="8" cellpadding="0">
                                <tbody>
                                    <tr>
                                        <td>
                                            <div id="AjaxMultiUpload20190108062506-849_photo">
                                                <div class="qq-uploader">
                                                    <div class="qq-upload-drop-area well" style="display: none;"><span>Drop files here to attach</span></div>
                                                    <div class="qq-upload-button" style="position: relative; overflow: hidden; direction: ltr;"><span><strong>Photographs of subject</strong><a class="btn btn-default" href="#">Add</a></span>
                                                        <input multiple="multiple" type="file" name="file" style="position: absolute; right: 0px; top: 0px; font-family: Arial; font-size: 118px; margin: 0px; padding: 0px; cursor: pointer; opacity: 0;">
                                                    </div>
                                                    <ul class="qq-upload-list"></ul>
                                                </div>
                                            </div>
                                            <script>
                                                $(function() {
                                                            var uploader1 = new qq.FileUploader({
                                                                element: document.getElementById('AjaxMultiUpload20190108062506-849_photo'),
                                                                action: '/client/ajax-upload/CaseTable___20190108062506-849_photo/4',
                                                                debug: true,
                                                                allowedExtensions: ["jpg", "gif", "png", "jpeg"],
                                                                template: '<div class="qq-uploader"><div class="qq-upload-drop-area well"><span>Drop files here to attach</span></div><div class="qq-upload-button"><span><strong>Photographs of subject</strong><a class="btn btn-default" href="#">Add</a></span></div><ul class="qq-upload-list"></ul></div>',
                                                                onComplete: function(id, fileName, responseJSON) {
                                                                    if (responseJSON.success) {
                                                                        if ($('#' + 'CaseTable' + '20190108062506-849_photo' + ' option[value="' + fileName + '"]').length == 0) {
                                                                            $('#' + 'CaseTable' + '20190108062506-849_photo').append('<option selected="selected" title="' + '//uploads/download/' + responseJSON.file + '" value="' + fileName + '">' + fileName + '</option>');
                                                                            $('#' + 'CaseTable' + '20190108062506-849_photo').trigger("liszt:updated");
                                                                        }
                                                                    }
                                                                    if (responseJSON.error) {
                                                                        $('.qq-upload-fail').hide();
                                                                    }
                                                                }
                                                            });
                                                            $('#' + 'CaseTable' + '20190108062506-849_photo').chosen().change(function() { //$('#'+ 'CaseTable' + '20190108062506-849_photo' +' option:not(:selected)').remove(); 
                                                            	if('/client/ajax-delete' !=''){ $('#'+ 'CaseTable' + '20190108062506-849_photo' +' option:not(:selected)').each(function(){ deleteurl = $(this).attr('title').replace("//uploads/download","/client/ajax-delete"); var self = this; $.ajax({url:deleteurl,success:function(){ $(self).remove(); }}); });$('#'+ 'CaseTable' + '20190108062506-849_photo' ).trigger("liszt:updated"); } else{ alert('You have no privilege to delete'); $('#'+ 'CaseTable' + '20190108062506-849_photo').find("option").attr("selected", true); return false; } } ); });
                                            </script>
                                            <select id="CaseTable20190108062506-849_photo" data-placeholder="Click on Add to attach files" style="width: 450px; display: none;" class="chzn-select chzn-done" multiple="multiple" name="data[CaseTable][20190108062506-849_photo][]"></select>
                                            <div id="CaseTable20190108062506_849_photo_chzn" class="chzn-container chzn-container-multi" style="width: 450px;">
                                                <ul class="chzn-choices">
                                                    <li class="search-field">
                                                        <input type="text" value="Click on Add to attach files" class="default" autocomplete="off" style="width: 178px;">
                                                    </li>
                                                </ul>
                                                <div class="chzn-drop" style="left: -9000px; width: 450px; top: 32px;">
                                                    <ul class="chzn-results"></ul>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding-top: 10px;">
                                            <link rel="stylesheet" type="text/css" href="<?php echo WEBSITE_URL;?>/css/chosen.css">
                                            <link rel="stylesheet" type="text/css" href="<?php echo WEBSITE_URL;?>/css/fileuploader.css">
                                            <script src="<?php echo WEBSITE_URL;?>/js/fileuploader.js" type="text/javascript"></script>
                                            <script src="<?php echo WEBSITE_URL;?>/js/chosen.jquery.js" type="text/javascript"></script>
                                            <div id="AjaxMultiUpload20190108062506-849_document">
                                                <div class="qq-uploader">
                                                    <div class="qq-upload-drop-area well" style="display: none;"><span>Drop files here to attach</span></div>
                                                    <div class="qq-upload-button" style="position: relative; overflow: hidden; direction: ltr;"><span><strong>Additional documentation (ID, passport, visa, records, etc.)&nbsp;</strong><a class="btn btn-default" href="#">Add</a></span>
                                                        <input multiple="multiple" type="file" name="file" style="position: absolute; right: 0px; top: 0px; font-family: Arial; font-size: 118px; margin: 0px; padding: 0px; cursor: pointer; opacity: 0;">
                                                    </div>
                                                    <ul class="qq-upload-list"></ul>
                                                </div>
                                            </div>
                                            <script src="<?php echo WEBSITE_URL;?>/js/fileuploader.js" type="text/javascript"></script>
                                            <script>
                                                var WEBSITE_URL = 'https://www.wymoo.com/client/';
                                                var dlg = $("#preview_dialog").dialog({
                                                    autoOpen: false,
                                                    draggable: false,
                                                    resizable: false
                                                });
                                                $(function() { // $("div#preview_dialog" ).dialog({autoOpen: false}); 
                                                var uploader2 = new qq.FileUploader({ element: document.getElementById('AjaxMultiUpload20190108062506-849_document'), action: '/client/ajax-upload/CaseTable___20190108062506-849_document/4', debug: true, allowedExtensions: ["jpg","gif","png","jpeg","pdf","doc","docx","xls","xlsx"], template: '<div class="qq-uploader"><div class="qq-upload-drop-area well"><span>Drop files here to attach</span></div><div class="qq-upload-button"><span><strong>Additional documentation (ID, passport, visa, records, etc.)&nbsp;</strong><a class="btn btn-default" href="#">Add</a></span></div><ul class="qq-upload-list"></ul></div>', onComplete: function(id, fileName, responseJSON){ if (responseJSON.success){ if($('#'+ 'CaseTable' + '20190108062506-849_document' +' option[value="' +fileName + '"]').length==0){ $('#'+ 'CaseTable' + '20190108062506-849_document' ).append( '<option selected="selected" title="'+ '//uploads/download/' + responseJSON.file +'" value="' +fileName + '">'+fileName+'</option>' ); $('#'+ 'CaseTable' + '20190108062506-849_document' ).trigger("liszt:updated"); } } if (responseJSON.error){ $('.qq-upload-fail').hide(); } } }); $('#'+ 'CaseTable' + '20190108062506-849_document' ).chosen({disabled:true}).change(function(){ if('/client/ajax-delete' !=''){ $('#'+ 'CaseTable' + '20190108062506-849_document' +' option:not(:selected)').each(function(){ deleteurl = $(this).attr('title').replace("//uploads/download","/client/ajax-delete"); var self = this; $.ajax({url:deleteurl,success:function(){ $(self).remove(); }}); });$('#'+ 'CaseTable' + '20190108062506-849_document' ).trigger("liszt:updated"); } else{ $('#'+ 'CaseTable' + '20190108062506-849_document').find("option").attr("selected", true); alert('You have no privilege to delete'); return false; } 
                                                //remove();
                                                 }); 
                                            });
                                            </script>
                                            <select id="CaseTable20190108062506-849_document" data-placeholder="Click on Add to attach files" style="width: 450px; display: none;" class="chzn-select chzn-done" multiple="multiple" name="data[CaseTable][20190108062506-849_document][]"></select>
                                            <div id="CaseTable20190108062506_849_document_chzn" class="chzn-container chzn-container-multi" style="width: 450px;">
                                                <ul class="chzn-choices">
                                                    <li class="search-field">
                                                        <input type="text" value="Click on Add to attach files" class="default" autocomplete="off" style="width: 178px;">
                                                    </li>
                                                </ul>
                                                <div class="chzn-drop" style="left: -9000px; width: 450px; top: 32px;">
                                                    <ul class="chzn-results"></ul>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class=" col-sm-offset-6 col-sm-6">
                    <div class="clearfix save_wrp"><strong>All services are strictly confidential and discreet.</strong> <a href="javascript:void(0)" class="btn btn-default pull-right " onclick="submit_form()">Save</a></div>
                </div>
            </div>
        </div>
    </form>
    <script type="text/javascript">
        function submit_form() {
            $("#CaseTableCasebeginForm").submit();
        }
    </script>
    <style type="text/css">
        .chzn-container {
            width: 100%!important;
        }
    </style>
    </div>