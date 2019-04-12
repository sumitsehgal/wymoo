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
            <form action="/client/casebegin" class="form-inline" id="CaseTableCasebeginForm" method="post" accept-charset="utf-8" >
                <input type="hidden" value="<?php echo $this->request->getParam('_csrfToken'); ?>" name="_csrfToken"  />
                <div style="display:none;">
                    <input type="hidden" name="_method" value="POST">
                </div>
                <input type="hidden" name="folderid" value="<?php echo $folderid; ?>" id="CaseTableFolderid">


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

                       /* foreach($errors as $err){
                         foreach($err as $nest){ ?>
                            <small style="color:#FF0000;"> 
                                <div class="error-message">
                                 <?php   echo $nest; ?>
                             </div> 
                         </small>
                         <?php 
                     }         
                 }*/

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
                                    <input name="client_fname" type="text" class="form-control" id="CaseTableClientFname" value="<?php echo @$oldData['client_fname']; ?>" > 
                                    <?php if(isset($errors) && isset($errors['client_fname'])): ?>
                                    <small style="color:#FF0000;">
                                        <?php foreach( $errors['client_fname'] as $err ): ?>
                                             <div class="error-message"><?php echo $err; ?></div> 
                                        <?php endforeach; ?>
                                    </small>
                                    <?php endif; ?>
                                </div>
                            </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label>Your Last Name:<span class="error_class">*</span></label>
                                    </div>
                                    <div class="col-sm-8">
                                        <input name="client_lname" type="text" class="form-control" id="CaseTableClientLname" value="<?php echo @$oldData['client_lname']; ?>" > 
                                        <?php if(isset($errors) && isset($errors['client_lname'])): ?>
                                        <small style="color:#FF0000;">
                                            <?php foreach( $errors['client_lname'] as $err ): ?>
                                                <div class="error-message"><?php echo $err; ?></div> 
                                            <?php endforeach; ?>
                                        </small>
                                        <?php endif; ?>

                                    </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label>Your Email:<span class="error_class">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <input name="client_email" type="text" class="form-control" id="CaseTableClientEmail" value="<?php echo @$oldData['client_email']; ?>"> 
                                            <?php if(isset($errors) && isset($errors['client_email'])): ?>
                                            <small style="color:#FF0000;">
                                                <?php foreach( $errors['client_email'] as $err ): ?>
                                                    <div class="error-message"><?php echo $err; ?></div> 
                                                <?php endforeach; ?>
                                            </small>
                                            <?php endif; ?>
                                            </div>
                                        </div>
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
                                                    <input name="subject_fullname" type="text" class="form-control" id="CaseTableSubjectFullname" value="<?php echo @$oldData['subject_fullname']; ?>"> </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <label>Subject's Alias:</label>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <input name="subject_alias" type="text" class="form-control" id="CaseTableSubjectAlias" value="<?php echo @$oldData['subject_alias']; ?>"> </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <label>Subject's Email:</label>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <input name="subject_email" type="text" class="form-control" id="CaseTableSubjectEmail" value="<?php echo @$oldData['subject_email']; ?>" > 
                                                            <?php if(isset($errors) && isset($errors['subject_email'])): ?>
                                                            <small style="color:#FF0000;">
                                                                <?php foreach( $errors['subject_email'] as $err ): ?>
                                                                    <div class="error-message"><?php echo $err; ?></div> 
                                                                <?php endforeach; ?>
                                                            </small>
                                                            <?php endif; ?>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-4">
                                                                <label>Subject's Phone:</label>
                                                            </div>
                                                            <div class="col-sm-8">
                                                                <input name="subject_phone" type="text" class="form-control" id="CaseTableSubjectPhone"  value="<?php echo @$oldData['subject_phone']; ?>" > 
                                                                <?php if(isset($errors) && isset($errors['subject_phone'])): ?>
                                                                <small style="color:#FF0000;">
                                                                    <?php foreach( $errors['subject_phone'] as $err ): ?>
                                                                        <div class="error-message"><?php echo $err; ?></div> 
                                                                    <?php endforeach; ?>
                                                                </small>
                                                                <?php endif; ?>    
                                                            </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-4">
                                                                    <label>Subject's Date of Birth:</label>
                                                                </div>
                                                                <div class="col-sm-8">
                                                                    <input name="subject_dob" type="text" id="CaseTableSubjectDob" class="form-control" autocomplete="off" value="<?php echo @$oldData['subject_dob1']; ?>">
                                                                    <input type="hidden" name="subject_dob1" id="CaseTableSubjectDob1"  value="<?php echo @$oldData['subject_dob1']; ?>"> <small>*Leave blank and notify your investigator if unsure.</small> </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-4">
                                                                        <label>Subject's Address:</label>
                                                                    </div>
                                                                    <div class="col-sm-8">
                                                                        <textarea name="subject_address" class="form-control" rows="4" style="height:65px;" id="CaseTableSubjectAddress"><?php echo @$oldData['subject_address']; ?></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-4">
                                                                        <label>Subject's Education:</label>
                                                                    </div>
                                                                    <div class="col-sm-8">
                                                                        <textarea name="subject_education" class="form-control" rows="3" id="CaseTableSubjectEducation"><?php echo @$oldData['subject_education']; ?></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-4">
                                                                        <label>Subject's Employment::</label>
                                                                    </div>
                                                                    <div class="col-sm-8">
                                                                        <textarea name="subject_employment" class="form-control" rows="3" style="height:65px;" id="CaseTableSubjectEmployment"><?php echo @$oldData['subject_employment']; ?></textarea>
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
                                                                            <input type="checkbox" name="subject_communication_email" <?php  if(!empty($oldData)){ echo ($oldData['subject_communication_email'] == '')? 'checked' : ''; } ?> value="" id="CaseTableSubjectCommunicationEmail"> Email</li>
                                                                            <li>
                                                                                <input type="hidden" name="subject_communication_messenger" value="0"  id="CaseTableSubjectCommunicationMessenger_" value="0">
                        <input type="checkbox" name="subject_communication_messenger" <?php  if(!empty($oldData)){ echo ($oldData['subject_communication_messenger'] == '')? 'checked' : ''; } ?> value="" id="CaseTableSubjectCommunicationMessenger"> Messenger</li>
                                                                                <li>
                                                                                    <input type="hidden" name="subject_communication_phone" id="CaseTableSubjectCommunicationPhone_" value="0">
                                                                                    <input type="checkbox" name="subject_communication_phone" <?php  if(!empty($oldData)){ echo ($oldData['subject_communication_phone'] == '')? 'checked' : ''; } ?> value="" id="CaseTableSubjectCommunicationPhone"> Phone</li>
                                                                                    <li>
                                                                                        <input type="hidden" name="subject_communication_webcam" id="CaseTableSubjectCommunicationWebcam_" value="0">
                                                                                        <input type="checkbox" name="subject_communication_webcam" <?php  if(!empty($oldData)){ echo ($oldData['subject_communication_webcam'] == '')? 'checked' : ''; } ?>  value="" id="CaseTableSubjectCommunicationWebcam"> Webcam</li>
                                                                                        <li>
                                                                                            <input type="hidden" name="subject_communication_inperson" id="CaseTableSubjectCommunicationInperson_" value="0">
                                                                                            <input type="checkbox" name="subject_communication_inperson" <?php  if(!empty($oldData)){ echo ($oldData['subject_communication_inperson'] == '')? 'checked' : ''; } ?> value="" id="CaseTableSubjectCommunicationInperson"> In Person</li>
                                                                                        </ul>
                                                                                        <label>Please provide a brief summary of your case and how we can help. </label>
                                                                                        <div class="text_area">
                                                                                            <textarea name="subject_background" class="form-control" rows="4" id="CaseTableSubjectBackground"><?php echo @$oldData['subject_background']; ?></textarea> <span id="subject_background_count">(1000 character maximum)</span> </div>
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
                                                                                                        <input name="subject_id" value="<?php echo @$oldData['subject_id']; ?>" type="text" class="form-control" id="CaseTableSubjectId"> </div>
                                                                                                    </div>
                                                                                                    <div class="row">
                                                                                                        <div class="col-sm-7">
                                                                                                            <label>How long have you known the subject?</label>
                                                                                                        </div>
                                                                                                        <div class="col-sm-5">
                                                                                                            <input name="subject_how_long" value="<?php echo @$oldData['subject_how_long']; ?>" type="text" class="form-control" id="CaseTableSubjectHowLong"> </div>
                                                                                                        </div>
                                                                                                        <div class="row">
                                                                                                            <div class="col-sm-7">
                                                                                                                <label>If you met the subject via the internet, please specify on which website.</label>
                                                                                                            </div>
                                                                                                            <div class="col-sm-5">
                                                                                                                <input name="subject_website_met" value="<?php echo @$oldData['subject_website_met']; ?>" type="text" class="form-control" id="CaseTableSubjectWebsiteMet"> </div>
                                                                                                            </div>
                                                                                                            <div class="row">
                                                                                                                <div class="col-sm-7">
                                                                                                                    <label>Have you sent anything to the subject's address? If so, was it received?</label>
                                                                                                                </div>
                                                                                                                <div class="col-sm-5">
                                                                                                                    <input name="subject_sent_address" value="<?php echo @$oldData['subject_sent_address']; ?>" type="text" class="form-control" id="CaseTableSubjectSentAddress"> </div>
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
                                                                                                                                    <div id="fileupload-photo">   </div>
<script>
$(function(){

        var uploader1 = new qq.FileUploader({
            element: document.getElementById('fileupload-photo'),
            action: '/client/ajax-upload/CaseTable__<?php echo $folderid?>_photo/4',
            debug: true,
            allowedExtensions: ["jpg","gif","png","jpeg"],
            template: '<div class="qq-uploader"><div class="qq-upload-drop-area well"><span>Drop files here to attach</span></div><div class="qq-upload-button"><span><strong>Photographs of subject</strong><a class="btn btn-default" href="#">Add</a></span></div><ul class="qq-upload-list"></ul></div>',
            onComplete: function(id, fileName, responseJSON){
                console.log(responseJSON);
                if (responseJSON.success){


                    if($('#'+ 'CaseTable' + '<?php echo $folderid; ?>_photo' +' option[value="' +fileName + '"]').length==0){
                        $('#'+ 'CaseTable' + '<?php echo $folderid; ?>_photo' ).append( '<option selected="selected" title="'+ '/client/ajax_multi_upload/uploads/download/' + responseJSON.file +'" value="' +fileName + '">'+fileName+'</option>' );
                        //$('#'+ 'CaseTable' + '<?php echo $folderid; ?>_photo' ).trigger("liszt:updated");
                        $('#'+ 'CaseTable' + '<?php echo $folderid; ?>_photo_chzn .chzn-choices' ).prepend('<li class="search-choice" id="CaseTable<?php echo $folderid;?>_photo_chzn_c_0"><span style="cursor: pointer;">'+fileName+'</span><a href="javascript:void(0)" class="search-choice-close" rel="0" deletelink="'+responseJSON.file+'"  ></a></li>');
                    }
                }
                if (responseJSON.error){
                    $('.qq-upload-fail').hide();
                }
            }
        });           

        $('#'+ 'CaseTable' + '<?php echo $folderid; ?>_photo' ).chosen().change(function(){
            //$('#'+ 'CaseTable' + '20190206100852-105_photo' +' option:not(:selected)').remove();
            if('/client/ajax-delete' !=''){
            $('#'+ 'CaseTable' + '<?php echo $folderid; ?>_photo' +' option:not(:selected)').each(function(){
                deleteurl = $(this).attr('title').replace("/client/ajax_multi_upload/uploads/download","/client/ajax-delete");
                var self = this;
                $.ajax({url:deleteurl,success:function(){
                    $(self).remove();
                }});

            });$('#'+ 'CaseTable' + '<?php echo $folderid; ?>_photo' ).trigger("liszt:updated");
            } else{
                alert('You have no privilege to delete');
                $('#'+ 'CaseTable' + '<?php echo $folderid; ?>_photo').find("option").attr("selected", true);
                return false;
            }

        } );



        $('.chzn-choices .search-choice-close').live('click', function()
        {
            var link = $(this).attr('deletelink');
            var anchor = $(this);
            var get = $(this).parent('.search-choice').find('span').text();
            var check=$(this).parent().attr('id');
            if(check.indexOf("photo") != -1)
              $('#CaseTable<?php echo $folderid; ?>_photo option[value='+get+']').remove();
            else
              $('#CaseTable<?php echo $folderid; ?>_document option[value='+get+']').remove();
            $.ajax({
                url: '/client/ajax-delete/'+link,
                beforeSend(request)
                {
                    var csrf = document.getElementsByName('_csrfToken')[0].value;
                    request.setRequestHeader("X-CSRF-Token", csrf);
                },
                success: function(response)
                {
                    anchor.parent().remove();
                }
            })
            return false;
        });



    });
</script>


        <select id="CaseTable<?php echo $folderid; ?>_photo" data-placeholder="Click on Add to attach files" style="width: 450px; display: none;" class="chzn-select chzn-done" multiple="multiple" name="data[CaseTable][<?php echo $folderid; ?>_photo][]">
                <?php if(!empty($oldData['data']['CaseTable'][$folderid.'_photo'])){ 
                $files1=$oldData['data']['CaseTable'][$folderid.'_photo']; } ?>
                <?php if(!empty($files1)) { ?>
                <?php foreach ($files1 as  $file1) : ?>
                 <option selected="selected" title="'+ '/client/ajax_multi_upload/uploads/download/' + responseJSON.file +'" value="<?=$file1;?>"><?=$file1;?></option>
                <?php endforeach; ?>    
                <?php } ?>  
        </select>
           <div id="CaseTable<?php echo $folderid; ?>_photo_chzn" class="chzn-container chzn-container-multi" style="width: 450px;">
            <ul class="chzn-choices">
             
                <?php if(!empty($oldData['data']['CaseTable'][$folderid.'_photo'])){ 
                $files=$oldData['data']['CaseTable'][$folderid.'_photo'];
                krsort($files); } ?>
                <?php if(!empty($files)) { ?>
                <?php foreach ($files as  $file) : ?>
                 <li class="search-choice" id="CaseTable<?php echo $folderid;?>_photo_chzn_c_0"><span style="cursor: pointer;"><?=$file?></span><a href="javascript:void(0)" class="search-choice-close" rel="0" deletelink="'+responseJSON.file+'"  ></a></li>
                <?php endforeach; ?>    
                <?php } ?>      

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
       <div id="fileupload-document">
            
        </div>
        <script src="<?php echo WEBSITE_URL;?>/js/fileuploader.js" type="text/javascript"></script>
        <script>
					var dlg = $("#preview_dialog").dialog({
					  autoOpen: false,
					  draggable: false,
					  resizable: false
					});
				
				$(function(){
					   // $("div#preview_dialog" ).dialog({autoOpen: false});	    
					var uploader2 = new qq.FileUploader({
						element: document.getElementById('fileupload-document'),
						action: '/client/ajax-upload/CaseTable__<?php echo $folderid?>_document/4',
						debug: true,
						allowedExtensions: ["jpg","gif","png","jpeg","pdf","doc","docx","xls","xlsx"],
						template: '<div class="qq-uploader"><div class="qq-upload-drop-area well"><span>Drop files here to attach</span></div><div class="qq-upload-button"><span><strong>Additional documentation (ID, passport, visa, records, etc.)&nbsp;</strong><a class="btn btn-default" href="#">Add</a></span></div><ul class="qq-upload-list"></ul></div>',
						onComplete: function(id, fileName, responseJSON){

							if (responseJSON.success){

								if($('#'+ 'CaseTable' + '<?php echo $folderid; ?>_document' + 'option[value="' +fileName + '"]').length==0){
									$('#'+ 'CaseTable' + '<?php echo $folderid; ?>_document' ).append( '<option selected="selected" title="'+ '/client/ajax_multi_upload/uploads/download/' + responseJSON.file +'" value="' +fileName + '">'+fileName+'</option>' );
                                    //$('#'+ 'CaseTable' + '<?php echo $folderid; ?>_document' ).trigger("liszt:updated");
                                    $('#'+ 'CaseTable' + '<?php echo $folderid; ?>_document_chzn .chzn-choices' ).prepend('<li class="search-choice" id="CaseTable<?php echo $folderid;?>_document_chzn_c_0"><span style="cursor: pointer;">'+fileName+'</span><a href="javascript:void(0)" class="search-choice-close" rel="0" deletelink="'+responseJSON.file+'"></a></li>');
								}
							}
							if (responseJSON.error){
								$('.qq-upload-fail').hide();
                            }
                            
                        }
                        
                    }); 
                              
					$('#'+ 'CaseTable' + '<?php echo $folderid; ?>_document' ).chosen({disabled:true}).change(function(){
						if('/client/ajax-delete' !=''){
							$('#'+ 'CaseTable' + '<?php echo $folderid; ?>_document' +' option:not(:selected)').each(function(){
							deleteurl = $(this).attr('title').replace("/client/ajax_multi_upload/uploads/download","/client/ajax-delete");
							var self = this;
							$.ajax({url:deleteurl,success:function(){
								$(self).remove();
							}});
							
						});$('#'+ 'CaseTable' + '<?php echo $folderid; ?>_document' ).trigger("liszt:updated");
						} else{
							$('#'+ 'CaseTable' + '<?php echo $folderid; ?>_document').find("option").attr("selected", true);
							alert('You have no privilege to delete'); return false;
						}
                        //remove();
                        
                    } );
                    
                });
                
        </script>
        <select id="CaseTable<?php echo $folderid; ?>_document" data-placeholder="Click on Add to attach files" style="width: 450px; display: none;" class="chzn-select chzn-done" multiple="multiple" name="data[CaseTable][<?php echo $folderid; ?>_document][]">
            <?php if(!empty($oldData['data']['CaseTable'][$folderid.'_document'])){ 
                $docs1=$oldData['data']['CaseTable'][$folderid.'_document']; } ?>
                <?php if(!empty($docs1)) { ?>
                <?php foreach ($docs1 as  $doc1) : ?>
                <option selected="selected" title="'+ '/client/ajax_multi_upload/uploads/download/' + responseJSON.file +'" value="<?=$doc1;?>"><?=$doc1;?></option>
                <?php endforeach; ?>    
                <?php } ?> 
        </select>
        <div id="CaseTable<?php echo $folderid; ?>_document_chzn" class="chzn-container chzn-container-multi" style="width: 450px;">
            <ul class="chzn-choices">
                <?php if(!empty($oldData['data']['CaseTable'][$folderid.'_document'])){ 
                $docs=$oldData['data']['CaseTable'][$folderid.'_document'];
                krsort($docs); } ?>
                <?php if(!empty($docs)) { ?>
                <?php foreach ($docs as  $doc) : ?>
                <li class="search-choice" id="CaseTable<?php echo $folderid;?>_document_chzn_c_0"><span style="cursor: pointer;"><?=$doc?></span><a href="javascript:void(0)" class="search-choice-close" rel="0" deletelink="'+responseJSON.file+'"></a></li>  

                <?php endforeach; ?>    
                <?php } ?>      
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
    $(document).ready(function () {
        $(".datepicker").datepicker({
            dateFormat:"D, MM dd", 
            onSelect: function(dateText) {
                var date = $(".datepicker").datepicker("getDate");
                d = date.getDate(); 
                m = date.getMonth() + 1; 
                y = date.getFullYear(); 
                $('#due_date').val(d+"-"+m+"-"+y); 
            }
        });
    })
</script>
<style type="text/css">
.chzn-container {
    width: 100%!important;
}
</style>
</div>