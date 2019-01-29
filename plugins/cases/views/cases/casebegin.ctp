<?php
//pr($result);
$disabled = false;
?>
<script type="text/javascript">
$(function() {

	$("#CaseTableSubjectDob").datepicker({dateFormat:"dd-MM-yy",defaultDate:new Date(1910,00,01),changeMonth:true,yearRange: "1910:c",changeYear:true,onClose: function() {
    $(this).data("datepicker").inline = false;
	var date = $("#CaseTableSubjectDob").datepicker("getDate");
	if(date){
	d = date.getDate();
	m = date.getMonth() + 1; 
	y = date.getFullYear();
	$("#CaseTableSubjectDob1").val(d+"-"+m+"-"+y);
	}
}, onChangeMonthYear:function(year, month,inst){
	//$("#" + inst.id).datepicker( "setDate",  "/1/" + month + year );
		var d = inst.selectedDay;
    $(this).datepicker("setDate", new Date(year, month - 1, d));

		
	},onSelect: function(dateText) {var date = $("#CaseTableSubjectDob").datepicker("getDate");d = date.getDate(); m = date.getMonth() + 1; y = date.getFullYear();$("#CaseTableSubjectDob1").val(d+"-"+m+"-"+y); $(this).data("datepicker").inline = true;    }});
	$("#save_case").click(function(e){$("#CaseTableCasebeginForm").submit();e.preventDefault();});		$("#CaseTableSubjectBackground").keyup(function(){$("#CaseTableSubjectBackground").val($("#CaseTableSubjectBackground").val().substring(0,1000)).focus();
	var psconsole = $("#CaseTableSubjectBackground");psconsole.scrollTop(psconsole[0].scrollHeight - psconsole.height());
	var charcount = parseInt(parseInt(1000) - parseInt($("#CaseTableSubjectBackground").val().length));
	$("#subject_background_count").html("(You have <font style=\'color:red;\'>"+charcount+"</font> characters remaining.)");});});
</script>
<?php
echo $this->Form->create($model, array(
    'class' => 'form-inline',
    'url' => array(
        'plugin' => 'cases',
        'controller' => 'cases',
        'action' => 'casebegin'
    )
));

echo $form->hidden($model . '.folderid');
?>

 <div class="content_box">
    <h1>Case Data1<span>Center </span></h1>
    <div class="secure"> <span> Secure Contact</span> </div>
    <div class="clearfix"></div>
    <p>Please enter your case data below. Not all fields are required, but the more data you can provide, the more our investigators can verify and investigate. </p>
	<?php
		if($this->action=='casebegin')
		{
			?>
			<div >
			<?php
			echo $this->Session->flash();
			echo $this->Session->flash('auth');
			?>
			</div>
			<?php
		}
		
		?>
    <div class="row">
      <div class="col-sm-6">
        <div>
          <div class="form_content">
            <h2>Step 1: Your Data</h2>
            <img src="images/tabpoint.png" alt="tagpoint" class="tag_arrow"/> </div>
          <div class="form_box">
            <div class="row">
              <div class="col-sm-4">
                <label>Your First Name:<span class="error_class">*</span></label>
              </div>
              <div class="col-sm-8">
                <?php
echo $form->text($model . '.client_fname', array(
    'class' => 'form-control'
));
?>
<?php
if ($form->error($model . '.client_fname')) 
{
?><small  style="color:#FF0000;"> <?php
    echo $form->error($model . '.client_fname');
?> </small><?php
}
?>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-4">
                <label>Your Last Name:<span class="error_class">*</span></label>
              </div>
              <div class="col-sm-8">
               <?php
echo $form->text($model . '.client_lname', array(
    'class' => 'form-control'
));
if ($form->error($model . '.client_lname')) {
?><small  style="color:#FF0000;"> <?php
    echo $form->error($model . '.client_lname');
?> </small><?php
}
?>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-4">
                <label>Your Email:<span class="error_class">*</span></label>
              </div>
              <div class="col-sm-8">
               <?php
echo $form->text($model . '.client_email', array(
    'class' => 'form-control'
));
if ($form->error($model . '.client_email')) {
?><small  style="color:#FF0000;"> <?php
    echo $form->error($model . '.client_email');
?> </small><?php
} elseif ($form->error('User' . '.email')) {
?><small  style="color:#FF0000;"> <?php
    echo $form->error('User' . '.email');
?> </small><?php
}
?>
              </div>
            </div>
          </div>
        </div>
        <div>
          <div class="form_content">
            <h2>Step 2: About the subject</h2>
            <img src="images/tabpoint.png" alt="tagpoint" class="tag_arrow"/> </div>
          <div class="form_box">
            <div class="row">
              <div class="col-sm-4">
                <label>Subject's Full Name:</label>
              </div>
              <div class="col-sm-8">
                <?php
echo $form->text($model . '.subject_fullname', array(
    'class' => 'form-control'
));
if ($form->error($model . '.subject_fullname')) {
?><small  style="color:#FF0000;"> <?php
    echo $form->error($model . '.subject_fullname');
?> </small><?php
}
?>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-4">
                <label>Subject's Alias:</label>
              </div>
              <div class="col-sm-8">
               <?php
echo $form->text($model . '.subject_alias', array(
    'class' => 'form-control'
));
?>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-4">
                <label>Subject's Email:</label>
              </div>
              <div class="col-sm-8">
               <?php
echo $form->text($model . '.subject_email', array(
    'class' => 'form-control'
));
if ($form->error($model . '.subject_email')) {
?><small  style="color:#FF0000;"> <?php
    echo $form->error($model . '.subject_email');
?> </small><?php
}
?>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-4">
                <label>Subject's Phone:</label>
              </div>
              <div class="col-sm-8">
                <?php
echo $form->text($model . '.subject_phone', array(
    'class' => 'form-control'
));
if ($form->error($model . '.subject_phone')) {
?><small  style="color:#FF0000;"> <?php
    echo $form->error($model . '.subject_phone');
?> </small><?php
}
?>
              </div>
            </div>
           
            <div class="row">
              <div class="col-sm-4">
                <label>Subject's Date of Birth:</label>
              </div>
              <div class="col-sm-8">
               <?php
echo $form->text($model . '.subject_dob1', array(
    'id' => 'CaseTableSubjectDob',
    'class' => 'form-control',
    'disabled' => $disabled
));
echo $form->hidden($model . '.subject_dob', array(
    'id' => 'CaseTableSubjectDob1',
    'class' => 'form-control'
));
?>
                <small>*Leave blank and notify your investigator if unsure.</small> </div>
            </div>
            <div class="row">
              <div class="col-sm-4">
                <label>Subject's Address:</label>
              </div>
              <div class="col-sm-8">
			  <?php
			  echo $form->textarea($model . '.subject_address', array(
    'class' => 'form-control',
    'rows' => 4,
    'style' => 'height:65px;'
));
if ($form->error($model . '.subject_address')) {
?><small  style="color:#FF0000;"> <?php
    echo $form->error($model . '.subject_address');
?> </small><?php
}
			  ?>
               
              </div>
            </div>
            <div class="row">
              <div class="col-sm-4">
                <label>Subject's Education:</label>
              </div>
              <div class="col-sm-8">
               <?php
echo $form->textarea($model . '.subject_education', array(
    'class' => 'form-control',
    'rows' => 3
));
if ($form->error($model . '.subject_education')) {
?><small  style="color:#FF0000;"> <?php
    echo $form->error($model . '.subject_education');
?> </small><?php
}
?>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-4">
                <label>Subject's Employment::</label>
              </div>
              <div class="col-sm-8">
              <?php
echo $form->textarea($model . '.subject_employment', array(
    'class' => 'form-control',
    'rows' => 3,
    'style' => 'height:65px;'
));if ($form->error($model . '.subject_employment')) {
?><small  style="color:#FF0000;"> <?php
    echo $form->error($model . '.subject_employment');
?> </small><?php
}
?>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6">
        <div>
          <div class="form_content">
            <h2>Step 3: Some background</h2>
            <img src="images/tabpoint.png" alt="tagpoint" class="tag_arrow"/> </div>
          <div class="form_box">
            <label>How do or did you communicate with the subject? </label>
            <ul class="checkbox_list">
              <li>
               <?php
echo $form->checkbox($model . '.subject_communication_email');
?>
                Email</li>
              <li>
               <?php
echo $form->checkbox($model . '.subject_communication_messenger');
?>
                Messenger</li>
              <li>
               <?php
echo $form->checkbox($model . '.subject_communication_phone');
?>
                Phone</li>
              <li>
               <?php
echo $form->checkbox($model . '.subject_communication_webcam');
?>
                Webcam</li>
              <li>
               <?php
echo $form->checkbox($model . '.subject_communication_inperson');
?>
                In Person</li>
            </ul>
            <label>Please provide a brief summary of your case and how we can help. </label>
            <div class="text_area">
             <?php
echo $form->textarea($model . '.subject_background', array(
    'class' => 'form-control',
    'rows' => 4
));
if ($form->error($model . '.subject_background')) {
?> <small  style="color:#FF0000;"  id="subject_background_count"><?php
    echo $form->error($model . '.subject_background');
}
?>
              <span id="subject_background_count">(1000 character maximum)</span> </div>
          </div>
        </div>
        <div class="step4">
          <div class="form_content">
            <h2>Step 4: A Few Questions (if applicable)</h2>
            <img src="images/tabpoint.png" alt="tagpoint" class="tag_arrow"/> </div>
          <div class="form_box">
            <div class="row">
              <div class="col-sm-7">
                <label>Has the subject sent any ID or documents?</label>
              </div>
              <div class="col-sm-5">
               <?php
echo $form->text($model . '.subject_id', array(
    'class' => 'form-control'
));
?>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-7">
                <label>How long have you known the subject?</label>
              </div>
              <div class="col-sm-5">
               <?php
echo $form->text($model . '.subject_how_long', array(
    'class' => 'form-control'
));
?>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-7">
                <label>If you met the subject via the internet,
                  please specify on which website.</label>
              </div>
              <div class="col-sm-5">
               <?php
echo $form->text($model . '.subject_website_met', array(
    'class' => 'form-control'
));
?>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-7">
                <label>Have you sent anything to the subject's
                  address? If so, was it received?</label>
              </div>
              <div class="col-sm-5">
              <?php
echo $form->text($model . '.subject_sent_address', array(
    'class' => 'form-control'
));
?>
              </div>
            </div>
          </div>
        </div>
        <div>
          <div class="form_content">
            <h2>Step 5: Optional Documentation</h2>
            <img src="images/tabpoint.png" alt="tagpoint" class="tag_arrow"/> </div>
          <div class="form_box photo_add">
            <table width="100%" border="0"  cellspacing="8" cellpadding="0"><tr><td ><?php
echo $this->Upload->edit($model, $this->data[$model]['folderid'] . '_photo', '<span><strong>Photographs of subject</strong><a class="btn btn-default" href="#">Add</a></span>', array(
    'jpg',
    'gif',
    'png',
    'jpeg'
), 4);
?> </td></tr><tr><td style="padding-top: 10px;"><?php
echo $this->Upload->edit($model, $this->data[$model]['folderid'] . '_document','<span><strong>Additional documentation (ID, passport, visa, records, etc.)&nbsp;</strong><a class="btn btn-default" href="#">Add</a></span>', array(
    'jpg',
    'gif',
    'png',
    'jpeg',
    'pdf',
    'doc',
    'docx',
    'xls',
    'xlsx'
), 4);
?></td></tr></table>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class=" col-sm-offset-6 col-sm-6">
        <div class="clearfix save_wrp"><strong>All services are strictly confidential and discreet.</strong> 
		<a href="javascript:void(0)" class="btn btn-default pull-right " onclick="submit_form()">Save</a></div>
      </div>
    </div>
  </div>
<?php
echo $this->Form->end();
?>
<script type="text/javascript">
function submit_form()
{
$("#CaseTableCasebeginForm").submit();
}
</script>
<style type="text/css">
.chzn-container{width:100%!important;}
</style>