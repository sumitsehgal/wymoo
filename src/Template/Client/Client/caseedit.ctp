<?php 
$form = $this->Form;
?>
<div id="myTabContent" class="tab-content">
	<div id="edit" class="tab-pane fade active in">
		<div class="content_box">
			<?=$form->create($case)?>
			<?=$breadcrumb?>
			<input type="hidden" value="<?php echo $this->request->getParam('_csrfToken'); ?>" name="_csrfToken"  />
			<div class="secure"> <span> Secure Contact</span> </div>
			<div class="clearfix"></div>
			<p>Your investigation is in progress and your case data is no longer editable.  Please contact your investigator if you need to make updates.</p>
			<div class="row">
				<div class="col-sm-6">
					<div>
						<div class="form_content">
							<h2>Step 1: Your Data</h2>
							<?= $this->Html->image('tabpoint.png',['alt'=>'tagpoint','class'=>'tag_arrow'])?>
						</div>
						<div class="form_box">
							<div class="row">
								<div class="col-sm-4">
									<label>Your First Name:<span class="error_class">*</span></label>
								</div>
								<div class="col-sm-8">
									<?=$form->text('client_fname',['class'=>'form-control'])?>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-4">
									<label>Your Last Name:<span class="error_class">*</span></label>
								</div>
								<div class="col-sm-8">
									<?=$form->text('client_lname',['class'=>'form-control'])?>											
								</div>
							</div>
							<div class="row">
								<div class="col-sm-4">
									<label>Your Email:<span class="error_class">*</span></label>
								</div>
								<div class="col-sm-8">
									<?=$form->text('client_email',['class'=>'form-control'])?>
								</div>
							</div>
						</div>
					</div>
					<div>
						<div class="form_content">
							<h2>Step 2: About the subject</h2>
							<?= $this->Html->image('tabpoint.png',['alt'=>'tagpoint','class'=>'tag_arrow'])?>
						</div>
						<div class="form_box">
							<div class="row">
								<div class="col-sm-4">
									<label>Subject's Full Name:</label>
								</div>
								<div class="col-sm-8">
									<?=$form->text('subject_fullname',['class'=>'form-control'])?>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-4">
									<label>Subject's Alias::</label>
								</div>
								<div class="col-sm-8">
									<?=$form->text('subject_alias',['class'=>'form-control'])?>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-4">
									<label>Subject's Email:</label>
								</div>
								<div class="col-sm-8">
									<?=$form->email('subject_email',['class'=>'form-control'])?>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-4">
									<label>Subject's Phone:</label>
								</div>
								<div class="col-sm-8">
									<?=$form->text('subject_phone',['class'=>'form-control'])?>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-4">
									<label>Subject's Date of Birth:</label>
								</div>
								<div class="col-sm-8">
									<?=$form->text('subject_dob1',['class'=>'form-control datepicker',])?>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-4">
									<label>Subject's Address:</label>
								</div>
								<div class="col-sm-8">
									<?=$form->textarea('subject_address',['class'=>'form-control','rows'=>'4'])?>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-4">
									<label>Subject's Education:</label>
								</div>
								<div class="col-sm-8">
									<?=$form->textarea('subject_education',['class'=>'form-control','rows'=>'3'])?>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-4">
									<label>Subject's Employment:</label>
								</div>
								<div class="col-sm-8">
									<?=$form->textarea('subject_employment',['class'=>'form-control','rows'=>'3'])?>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-6">
					<div>
						<div class="form_content">
							<h2>Step 3: Some background</h2>
							<?= $this->Html->image('tabpoint.png',['alt'=>'tagpoint','class'=>'tag_arrow'])?>
						</div>
						<div class="form_box">
							<label>How do or did you communicate with the subject? </label>
							<ul class="checkbox_list">
								<li><?=$form->checkbox('subject_communication_email')?> Email</li>
								<li><?=$form->checkbox('subject_communication_messenger')?> Messenger</li>
								<li><?=$form->checkbox('subject_communication_phone')?> Phone</li>
								<li><?=$form->checkbox('subject_communication_webcam')?> Webcam</li>
								<li><?=$form->checkbox('subject_communication_inperson')?> In Person</li>
							</ul>
							<label>Please provide a brief summary of your case and how we can help. </label>
							<div class="text_area">
								<?=$form->textarea('subject_background',['rows'=>'4','class'=>'form-control'])?>
								<span id="subject_background_count">(1000 character maximum)</span> 
							</div>
						</div>
					</div>
					<div class="step4">
						<div class="form_content">
							<h2>Step 4: A Few Questions (if applicable)</h2>
							<?= $this->Html->image('tabpoint.png',['alt'=>'tagpoint','class'=>'tag_arrow'])?> 
						</div>
						<div class="form_box">
							<div class="row">
								<div class="col-sm-7">
									<label>Has the subject sent any ID or documents?</label>
								</div>
								<div class="col-sm-5">
									<?=$form->text('subject_id',['class'=>'form-control'])?>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-7">
									<label>How long have you known the subject?</label>
								</div>
								<div class="col-sm-5">
									<?=$form->text('subject_how_long',['class'=>'form-control'])?>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-7">
									<label>If you met the subject via the internet,
									please specify on which website.</label>
								</div>
								<div class="col-sm-5">
									<?=$form->text('subject_website_met',['class'=>'form-control'])?>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-7">
									<label>Have you sent anything to the subject's
									address? If so, was it received?</label>
								</div>
								<div class="col-sm-5">
									<?=$form->text('subject_sent_address',['class'=>'form-control'])?>
								</div>
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
                        $('#'+ 'CaseTable' + '<?php echo $folderid; ?>_photo_chzn .chzn-choices' ).prepend('<li class="search-choice" id="CaseTable<?php echo $folderid;?>_photo_chzn_c_0"><span style="cursor: pointer;">'+fileName+'</span><a href="javascript:void(0)" class="search-choice-close" rel="0" deletelink="'+responseJSON.file+'"  ></a></li>');
                    }
                }
                if (responseJSON.error){
                    $('.qq-upload-fail').hide();
                }
            }
        });          

$('#'+ 'CaseTable' + '<?php echo $folderid; ?>_photo' ).chosen().change(function(){
	if('/client/ajax-delete' !='')
	{
		$('#'+ 'CaseTable' + '<?php echo $folderid; ?>_photo' +' option:not(:selected)').each(function(){
			deleteurl = $(this).attr('title').replace("/client/ajax_multi_upload/uploads/download","/client/ajax-delete");
			var self = this;
			$.ajax({url:deleteurl,success:function(){
				$(self).remove();
			}});
		});
		$('#'+ 'CaseTable' + '<?php echo $folderid; ?>_photo' ).trigger("liszt:updated");
} else{
alert('You have no privilege to delete');
$('#'+ 'CaseTable' + '<?php echo $folderid; ?>_photo').find("option").attr("selected", true);
return false;
}

} );



$('.chzn-choices .search-choice-close').live('click', function()
{
var link = $(this).attr('deletelink');
var anchor = $(this)
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


<select id="CaseTable<?php echo $folderid; ?>_photo" data-placeholder="Click on Add to attach files" style="width: 450px; display: none;" class="chzn-select chzn-done" multiple="multiple" >
	
</select>
<div id="CaseTable<?php echo $folderid; ?>_photo_chzn" class="chzn-container chzn-container-multi" style="width: 450px;">
<ul class="chzn-choices">
<?php if(!empty($attachments['photo'])):?>
	<?php foreach($attachments['photo'] as $key=>$file):?>

	<li class="search-choice" id="CaseTable<?php echo $folderid; ?>_photo_chzn_c_<?php echo $key; ?>"><span style="cursor: pointer;"><?php echo $file['filename']; ?></span><a href="javascript:void(0)" class="search-choice-close" rel="<?php echo $key; ?>" deletelink="<?php echo $file['file'];?>"></a></li>
<?php endforeach; ?>
<?php endif; ?>



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
<select id="CaseTable<?php echo $folderid; ?>_document" data-placeholder="Click on Add to attach files" style="width: 450px; display: none;" class="chzn-select chzn-done" multiple="multiple" name="data[CaseTable][20190108062506-849_document][]"></select>
<div id="CaseTable<?php echo $folderid; ?>_document_chzn" class="chzn-container chzn-container-multi" style="width: 450px;">
<ul class="chzn-choices">
<?php if(!empty($attachments['document'])):?>
	<?php foreach($attachments['document'] as $key=>$file):?>

	<li class="search-choice" id="CaseTable<?php echo $folderid; ?>_document_chzn_c_<?php echo $key; ?>"><span style="cursor: pointer;"><?php echo $file['filename']; ?></span><a href="javascript:void(0)" class="search-choice-close" rel="<?php echo $key; ?>" deletelink="<?php echo $file['file'];?>"></a></li>
<?php endforeach; ?>
<?php endif; ?>
<li class="search-field">
<input type="text" value="Click on Add to attach files" class="default" autocomplete="off" style="width: 178px;">
</li>
</ul>
<div class="chzn-drop" style="left: -9000px; width: 450px; top: 32px;">
<ul class="chzn-results">


</ul>
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
			</div>
			<div class="row">
				<div class=" col-sm-offset-6 col-sm-6">
					<div class="clearfix save_wrp"><strong>All services are strictly confidential and discreet.</strong> 
						<?=$form->submit('Save',['class'=>'btn btn-default pull-right'])?>
					</div>
				</div>
			</div>
			<?=$form->end()?>
		</div>
	</div>
</div>