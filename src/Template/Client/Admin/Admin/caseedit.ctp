<style type="text/css">
    .qq-upload-button span {
        display: inline-block;
        margin: 0px 0px 10px;
    }
    .qq-upload-button span a{
    color: #fff;
    background: url(/images/btnmid.png) repeat-x center top;
    border-color: #000;
    display: inline-block;
    margin-bottom: 0;
    font-weight: bold;
    text-align: center;
    vertical-align: middle;
    cursor: pointer;
    border: 1px solid transparent;
    white-space: nowrap;
    padding: 5px 12px;
    font-size: 12px;
    line-height: 1.42857143;
    border-radius: 4px;
    user-select: none;
    border-bottom: none;
    border-top: none;
    margin: 0px 10px;
    }
    .qq-upload-button span strong {
    font-weight: normal;
    }
    .empty-img{
        display: flex;
    }
   .alert_box figure img{  margin-top: 2px; }
   .alert_box .alert-danger{padding: 9px 4px 9px 4px !important;}
   .alert-success.fade.in{ height: 25px !important; }
   .alert-success.fade.in .close{ margin-top: 5.3px !important; }
   .alert-success.fade.in figure{ margin-top: 5px !important; }
   .alert-success.fade.in strong{ margin-top: 8.10px !important; }
</style>
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
                var d = inst.selectedDay; $(this).datepicker("setDate", new Date(year, month - 1, d)); },onSelect: function(dateText) {var date = $("#CaseTableSubjectDob").datepicker("getDate");d = date.getDate(); m = date.getMonth() + 1; y = date.getFullYear();$("#CaseTableSubjectDob1").val(d+"-"+m+"-"+y); $(this).data("datepicker").inline = true; }});
     });
</script>

<?php $form = $this->Form; ?>
    <h1 class="relative">
    Case 
    <span>Information </span> 
   
    <div class="secureicon">Secure Contact</div>
</h1>
<div class="empty-img"><img width="1" height="10" alt="" src="https://www.wymoo.com/client/img/dot.png"></div>
 <?= $this->Flash->render() ?> 
 <div class="empty-img"><img width="1" height="10" alt="" src="https://www.wymoo.com/client/img/dot.png"></div>
<?=$form->create($case)?>
<input type="hidden" value="<?php echo $this->getRequest()->getCookie('csrfToken'); ?>" name="_csrfToken"  />
<div class="case_search">
    <div class="lbl">Created:</div>
    <div class="floatleft pt5 pr20">
        <?=date('D, M j',$case['created_date'])?>
    </div>
    <div class="lbl">Status:</div>
    <div class="floatleft pt5 pr20">
        <span class="floatleft pr10"><?=$case['case_status']?> </span>
        <span class="statusicon" style="padding:2px 0 0;">
            <?=$this->Html->image($caseIcons[$case['case_status_id']], [ "alt" => $case['case_status'], "value" => $case['case_status_id'],"id" => $case['id'],"class" => 'chage_stateus',"style" => 'cursor:pointer']) ?>
        </span>
    </div>
    <div class="lbl">Client:</div>
    <div class="floatleft pt5 pr20">
        <?=$case['client_fname'].' '.$case['client_lname']?> (<?=$case['client_email']?> )
    </div>
    <div class="lbl">Due Date:</div>
    <div class="floatleft pt5 pr20">
        <?=($case['due_date']==0) ? 'Pending' : date('D, M j',$case['due_date'])?> 
    </div>
    <div class="clr"></div>
</div>
<div class="divfull pt15">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tbody>
            <tr>
                <td valign="top" width="47%">
                    <div>
                        <div class="bxheadlt"></div>
                        <div class="bxheadmid"><span></span>Step 1: Your Data</div>
                        <div class="bxheadrt"></div>
                        <div class="clr"></div>
                    </div>
                    <div class="gradbox">
                        <table width="100%" border="0" cellspacing="8" cellpadding="0">
                            <tbody>
                                <tr>
                                    <td width="130">Your First Name:</td>
                                    <td>
                                        <div class="inputover floatleft">
                                            <div class="inputlt"></div>
                                            <div class="inputmid">
                                                <?=$form->text('client_fname',['class'=>'wid243'])?>
                                            </div>
                                            <div class="inputrt"></div>
                                        </div>
                                        <?php if(isset($errors) && isset($errors['client_fname'])): ?>
                                        <small style="color:#FF0000;">
                                         <?php foreach( $errors['client_fname'] as $err ): ?>
                                             <div class="error-message"><?php echo $err; ?></div> 
                                         <?php endforeach; ?>
                                       </small>
                                       <?php endif; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="130">Your Last Name:</td>
                                    <td>
                                        <div class="inputover floatleft">
                                            <div class="inputlt"></div>
                                            <div class="inputmid">
                                                <?=$form->text('client_lname',['class'=>'wid243'])?>
                                            </div>
                                            <div class="inputrt"></div>
                                        </div>
                                         <?php if(isset($errors) && isset($errors['client_lname'])): ?>
                                        <small style="color:#FF0000;">
                                            <?php foreach( $errors['client_lname'] as $err ): ?>
                                                <div class="error-message"><?php echo $err; ?></div> 
                                            <?php endforeach; ?>
                                        </small>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="130">Your Email:</td>
                                    <td>
                                        <div class="inputover floatleft">
                                            <div class="inputlt"></div>
                                            <div class="inputmid">
                                                <?=$form->text('client_email',['class'=>'wid243'])?>
                                            </div>
                                            <div class="inputrt"></div>
                                        </div>
                                           <?php if(isset($errors) && isset($errors['client_email'])): ?>
                                            <small style="color:#FF0000;">
                                                <?php foreach( $errors['client_email'] as $err ): ?>
                                                    <div class="error-message"><?php echo $err; ?></div> 
                                                <?php endforeach; ?>
                                            </small>
                                            <?php endif; ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="pt15">
                        <div class="bxheadlt"></div>
                        <div class="bxheadmid"><span></span>Step 2: About the subject</div>
                        <div class="bxheadrt"></div>
                        <div class="clr"></div>
                    </div>
                    <div class="gradbox">
                        <table width="100%" border="0" cellspacing="8" cellpadding="0">
                            <tbody>
                                <tr>
                                    <td width="135">Subject's Full Name:</td>
                                    <td>
                                        <div class="inputover floatleft">
                                            <div class="inputlt"></div>
                                            <div class="inputmid">
                                                <?=$form->text('subject_fullname',['class'=>'wid243'])?>
                                            </div>
                                            <div class="inputrt"></div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Subject's Alias:</td>
                                    <td>
                                        <div class="inputover floatleft">
                                            <div class="inputlt"></div>
                                            <div class="inputmid">
                                                <?=$form->text('subject_alias',['class'=>'wid243'])?>
                                            </div>
                                            <div class="inputrt"></div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Subject's Email:</td>
                                    <td>
                                        <div class="inputover floatleft">
                                            <div class="inputlt"></div>
                                            <div class="inputmid">
                                                <?=$form->text('subject_email',['class'=>'wid243'])?>
                                            </div>
                                            <div class="inputrt">

                                            </div>
                                        </div>
                                          <?php if(isset($errors) && isset($errors['subject_email'])): ?>
                                             <small style="color:#FF0000;">
                                             <?php foreach( $errors['subject_email'] as $err ): ?>
                                              <div class="error-message"><?php echo $err; ?></div> 
                                             <?php endforeach; ?>
                                            </small>
                                          <?php endif; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Subject's Phone:</td>
                                    <td>
                                        <div class="inputover floatleft">
                                            <div class="inputlt"></div>
                                            <div class="inputmid">
                                                <?=$form->text('subject_phone',['class'=>'wid243'])?>
                                            </div>
                                            <div class="inputrt"></div>
                                        </div>
                                         <?php if(isset($errors) && isset($errors['subject_phone'])): ?>
                                              <small style="color:#FF0000;">
                                              <?php foreach( $errors['subject_phone'] as $err ): ?>
                                              <div class="error-message"><?php echo $err; ?></div> 
                                              <?php endforeach; ?>
                                              </small>
                                         <?php endif; ?>  
                                    </td>
                                </tr>
                                <tr>
                                    <td>Subject's Date of Birth:</td>
                                    <td>
                                        <div class="inputover floatleft">
                                            <div class="inputlt"></div>
                                            <div class="inputmid">
                                                <?=$form->text('subject_dob',['class'=>'form-control datepicker','id'=>'CaseTableSubjectDob'])?>
                                    <input type="hidden" name="subject_dob1" id="CaseTableSubjectDob1" value="<?php echo $case->subject_dob1; ?>" >
                                            </div>
                                            <div class="inputrt"></div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>
                                        <small>*Leave blank and notify your investigator  if unsure. </small>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Subject's Address:</td>
                                    <td>
                                        <?=$form->textarea('subject_address',['class'=>'wid255','row'=>'3'])?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Subject's Education:</td>
                                    <td>
                                        <?=$form->textarea('subject_education',['class'=>'wid255','row'=>'3'])?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Subject's Employment:</td>
                                    <td>
                                        <?=$form->textarea('subject_employment',['class'=>'wid255','row'=>'3'])?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </td>
                <td width="3%"><img src="/img/dot.png" width="1" height="1" alt=""></td>
                <td valign="top" width="47%">
                    <div>
                        <div class="bxheadlt"></div>
                        <div class="bxheadmid"><span></span>Step 3: Some background</div>
                        <div class="bxheadrt"></div>
                        <div class="clr"></div>
                    </div>
                    <div class="gradbox">
                        <div>How do or did you communicate with the subject? </div>
                        <div class="pb5 pt5">
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tbody>
                                    <tr>
                                        <td><?=$form->checkbox('subject_communication_email')?></td>
                                        <td>Email</td>
                                        <td><?=$form->checkbox('subject_communication_messenger')?></td>
                                        <td>Messenger</td>
                                        <td><?=$form->checkbox('subject_communication_phone')?></td>
                                        <td>Phone</td>
                                        <td><?=$form->checkbox('subject_communication_webcam')?></td>
                                        <td>Webcam</td>
                                        <td><?=$form->checkbox('subject_communication_inperson')?></td>
                                        <td>In  Person</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div>Please provide a brief summary of your case and how we can help. </div>
                        <div>
                            <?=$form->textarea('subject_background',['rows'=>'4','class'=>'wid420'])?>      
                        </div>
                        <small id="subject_background_count">(1000 character maximum)</small>
                    </div>
                    <div class="pt15">
                        <div class="bxheadlt"></div>
                        <div class="bxheadmid"><span></span>Step 4: A Few Questions (if applicable) </div>
                        <div class="bxheadrt"></div>
                        <div class="clr"></div>
                    </div>
                    <div class="gradbox">
                        <table width="100%" border="0" cellspacing="8" cellpadding="0">
                            <tbody>
                                <tr>
                                    <td width="230">Has the subject sent any ID or documents?</td>
                                    <td>
                                        <div class="inputover floatleft">
                                            <div class="inputlt"></div>
                                            <div class="inputmid">
                                                <?=$form->text('subject_id',['class'=>'wid168'])?>
                                            </div>
                                            <div class="inputrt"></div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>How long have you known the subject?</td>
                                    <td>
                                        <div class="inputover floatleft">
                                            <div class="inputlt"></div>
                                            <div class="inputmid">
                                                <?=$form->text('subject_how_long',['class'=>'wid168'])?>
                                            </div>
                                            <div class="inputrt"></div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>If you met the subject via the internet,<br>
                                    please specify on which website.</td>
                                    <td>
                                        <div class="inputover floatleft">
                                            <div class="inputlt"></div>
                                            <div class="inputmid">
                                                <?=$form->text('subject_website_met',['class'=>'wid168'])?>
                                            </div>
                                            <div class="inputrt">

                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Have you sent anything to the subject's<br>
                                    address? If so, was it received?</td>
                                    <td>
                                        <div class="inputover floatleft">
                                            <div class="inputlt"></div>
                                            <div class="inputmid">
                                                <?=$form->text('subject_sent_address',['class'=>'wid168'])?>
                                            </div>
                                            <div class="inputrt"></div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="pt15">
                        <div class="bxheadlt"></div>
                        <div class="bxheadmid"><span></span>Step 5: Optional Documentation</div>
                        <div class="bxheadrt"></div>
                        <div class="clr"></div>
                    </div>
                    <div class="gradbox">
                    
                    <div class="form_box photo_add">
                            <?php if('' == ""):?>
                                <table width="100%" border="0" cellspacing="8" cellpadding="0">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div id="fileupload-photo">   </div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/js-cookie/2.2.0/js.cookie.js"></script>
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
                        $('#'+ 'CaseTable' + '<?php echo $folderid; ?>_photo_chzn .chzn-choices' ).prepend('<li class="search-choice" id="CaseTable<?php echo $folderid;?>_photo_chzn_c_0"><a href="/client/download2/'+responseJSON.file+'">'+fileName+'</a><a href="javascript:void(0)" class="search-choice-close" rel="0" deletelink="'+responseJSON.file+'"  ></a></li>');
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


});
</script>


<select id="CaseTable<?php echo $folderid; ?>_photo" data-placeholder="Click on Add to attach files" style="width: 450px; display: none;" class="chzn-select chzn-done" multiple="multiple" >
    
</select>
<div id="CaseTable<?php echo $folderid; ?>_photo_chzn" class="chzn-container chzn-container-multi" style="width: 450px;">
<ul class="chzn-choices">
<?php if(!empty($attachments['photo'])):?>
    <?php foreach($attachments['photo'] as $key=>$file):?>
    <li class="search-choice" id="CaseTable<?php echo $folderid; ?>_photo_chzn_c_<?php echo $key; ?>">
       <a href="/client/download2/<?=$file['file'];?>"><?php  echo $file['filename']; ?></a><a href="javascript:void(0)" class="search-choice-close" rel="<?php echo $key; ?>" deletelink="<?php echo $file['file'];?>"></a></li>
<?php endforeach; ?>
<?php endif; ?>

<script type="text/javascript">
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
</script>


<li class="search-field">
<input type="text" value="<?php echo (empty($attachments['photo'])) ? 'Click on Add to attach files': '' ?>" class="default" autocomplete="off" style="width: 178px;">
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
                                    $('#'+ 'CaseTable' + '<?php echo $folderid; ?>_document_chzn .chzn-choices' ).prepend('<li class="search-choice" id="CaseTable<?php echo $folderid;?>_document_chzn_c_0"><a href="/client/download2/'+responseJSON.file+'">'+fileName+'</a><a href="javascript:void(0)" class="search-choice-close" rel="0" deletelink="'+responseJSON.file+'"></a></li>');
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

    <li class="search-choice" id="CaseTable<?php echo $folderid; ?>_document_chzn_c_<?php echo $key; ?>"><a href="/client/download2/<?=$file['file'];?>"><?php  echo $file['filename']; ?></a><a href="javascript:void(0)" class="search-choice-close" rel="<?php echo $key; ?>" deletelink="<?php echo $file['file'];?>"></a></li>
<?php endforeach; ?>
<?php endif; ?>
<li class="search-field">
<input type="text" value="<?php echo (empty($attachments['document'])) ? 'Click on Add to attach files': '' ?>" class="default" autocomplete="off" style="width: 178px;">
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
            <?php else: ?>

                <p>Photographs of subject</p>
                <ul>
                <?php if(!empty($attachments['photo'])):?>
                    <?php foreach($attachments['photo'] as $key=>$file):?>
                        <li class="search-choice"><span style="cursor: pointer;"><?php echo $file['filename']; ?></span></li>
                    <?php endforeach; ?>
                <?php endif; ?>
                </ul>
                <br/>
                <p>Additional documentation (ID, passport, visa, records, etc.) </p>
                <ul>
                <?php if(!empty($attachments['document'])):?>
                    <?php foreach($attachments['document'] as $key=>$file):?>
                    <li class="search-choice"><span style="cursor: pointer;"><?php echo $file['filename']; ?></span></li>
                <?php endforeach; ?>
                <?php endif; ?>
                </ul>
            <?php endif; ?>



</div>
</div>

                    </div>
                    <div class="pt15">
                        <div class="bxheadlt"></div>
                        <div class="bxheadmid"><span></span>Communication</div>
                        <div class="bxheadrt"></div>
                        <div class="clr"></div>
                    </div>

                    <div class="gradbox">
                        <table width="100%" border="0" cellspacing="8" cellpadding="0">
                            <tbody>
                                <tr>
                                    <td><?=$form->textarea('notification',['class'=>'wid333','rows'=>'2','id'=>'notification'])?></td>
                                    <td>
                                        <div class="floatleft">
                                            <div class="btnlt"></div>
                                            <div class="btnmid"><a href="javascript:void(0)" id="notify" case_id="<?=$id;?>" ><?=$form->submit('Notify',['class'=>'btn btn-default pull-right','name'=>'notify'])?></a></div>
                                            <div class="btnrt"></div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <?php if(empty($errors))$id_name="errornotification";else$id_name="";  ?>
                         <small style="color:#FF0000; display: none;" id="<?=$id_name;?>" > <div class="error-message">&nbsp;&nbsp;&nbsp;Please enter value for notification.</div> </small>                
                    </div>
                    <div class="divfull pt15 floatright">                       
                        <div class="floatright pr20">
                            <div class="btnlt"></div>
                            <div class="btnmid">
                                <a href="/client/admin/casebrowser">Cancel</a>
                            </div>
                            <div class="btnrt"></div>
                        </div>
                        
                        <div class="floatright pr10">
                            <div class="btnlt"></div>
                            <div class="btnmid"><a href="#" id="save_case"><?=$form->submit('Save',['class'=>'btn btn-default pull-right'])?></a></div>
                            <div class="btnrt"></div>
                        </div>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>
<?=$form->end()?>

<script type="text/javascript">
           jQuery(document).ready(function()
           {   if($(".alert-danger").html() != null)
                $("#errornotification").show();
                $("#notification").val('');
           });   
</script>