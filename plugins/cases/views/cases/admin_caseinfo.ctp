<?php
 //pr($result);
echo $javascript->codeBlock('	$(function() {		 		 $("#CaseTableSubjectDob").datepicker({dateFormat:"dd-MM-yy",changeMonth:true,yearRange: "1910:c",changeYear:true,onClose: function() {
    $(this).data("datepicker").inline = false;
	var date = $("#CaseTableSubjectDob").datepicker("getDate");
	d = date.getDate();
	m = date.getMonth() + 1; 
	y = date.getFullYear();
	$("#CaseTableSubjectDob1").val(d+"-"+m+"-"+y);
}, onChangeMonthYear:function(year, month,inst){
	//$("#" + inst.id).datepicker( "setDate",  "/1/" + month + year );
		var d = inst.selectedDay;
    $(this).datepicker("setDate", new Date(year, month - 1, d));

		
	}, onSelect: function(dateText) { 	$(this).data("datepicker").inline = true;			var date = $("#CaseTableSubjectDob").datepicker("getDate");				 d = date.getDate();				 m = date.getMonth() + 1;				 y = date.getFullYear();				$("#CaseTableSubjectDob1").val(d+"-"+m+"-"+y);		 }});		  $("#save_case").click(function(e){			$("#CaseTableNotify").val("");			$("#CaseTableAdminCaseinfoForm").submit();			e.preventDefault();		});		$("#notify").click(function(e){			$("#CaseTableNotify").val("1");			$("#CaseTableAdminCaseinfoForm").submit();			e.preventDefault();		});		$("#CaseTableSubjectBackground").keyup(function(){			$("#CaseTableSubjectBackground").val($("#CaseTableSubjectBackground").val().substring(0,1000)).focus();			var psconsole = $("#CaseTableSubjectBackground");						psconsole.scrollTop(				psconsole[0].scrollHeight - psconsole.height()			);					var charcount = parseInt(parseInt(1000) - parseInt($("#CaseTableSubjectBackground").val().length));						$("#subject_background_count").html("(You have <font style=\'color:red;\'>"+charcount+"</font> characters remaining.)");		});				 });	 ',array('allowCache'=>true,'safe'=>true,'inline'=>false));echo $this->Html->css(array('jquery.ui.datepicker'),'stylesheet', array('inline' => false ) ); $disabled = true;if( $result[$model]['is_exported']==0 ){	$disabled = false;}?><?php

 echo $this->Form->create($model, array('class'=>'form-inline','url'=>array('plugin'=>'cases','controller'=>'cases','action'=>'caseinfo',$id)));
 echo $form->hidden('id');
 echo $form->hidden('notify');
?> <div class="case_search">
    	<div class="lbl">Created:</div>
        <div class="floatleft pt5 pr20">
        	<?php echo date('M j, Y',$result[$model]['created']);?> 
        </div>
        <div class="lbl">Status:</div>
        <div class="floatleft pt5 pr20">
        	<span class="floatleft pr10"><?php echo $result[$model]['case_status'];?> </span><span class="statusicon" style="padding:2px 0 0;"><?php echo $this->Html->Image(Configure::read('case_icon.'.$result[$model]['case_status_id']));?></span>
        </div>
        <div class="lbl">Client:</div>
         <div class="floatleft pt5 pr20">
         <?php echo $result[$model]['client_fname'] . ' '. $result[$model]['client_lname'];?> (<?php echo $result[$model]['client_email'];?> )
        </div>
         <div class="lbl">Due Date:</div>
         <div class="floatleft pt5 pr20">
        	<?php echo ($result[$model]['due_date']==0)? 'Pending' : date('F j, Y',$result[$model]['due_date']);?> 
        </div>
        <div class="clr"></div>
    </div>
    <div class="divfull pt15">
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
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
                  <tr>
                    <td width="130">Your First Name:</td>
                    <td><div class="inputover floatleft">
        	<div class="inputlt"></div>
            <div class="inputmid"><?php echo $form->text($model.'.client_fname',array('class'=>'wid243','disabled'=>$disabled));?></div>
            <div class="inputrt"></div>
           
        </div></td>
                  </tr>
                  <?php if( $form->error($model.'.client_fname')){ ?>
                  <tr>
                    <td>&nbsp;</td>
                    <td><small  style="color:#FF0000;"> <?php echo $form->error($model.'.client_fname');?> </small></td>
                  </tr>
                  <?php }?>
                  <tr>
                    <td>Your Last Name:</td>
                    <td><div class="inputover floatleft">
        	<div class="inputlt"></div>
            <div class="inputmid"><?php echo $form->text($model.'.client_lname',array('class'=>'wid243','disabled'=>$disabled));?></div>
            <div class="inputrt"></div>
        </div></td>
                  </tr>
                   <?php if( $form->error($model.'.client_lname')){ ?>
                  <tr>
                    <td>&nbsp;</td>
                    <td><small  style="color:#FF0000;"> <?php echo $form->error($model.'.client_lname');?> </small></td>
                  </tr>
                  <?php }?>
                  <tr>
                    <td>Your Email:</td>
                    <td><div class="inputover floatleft">
        	<div class="inputlt"></div>
            <div class="inputmid"><?php echo $form->text($model.'.client_email',array('class'=>'wid243','disabled'=>$disabled));?></div>
            <div class="inputrt"></div>
        </div></td>
                  </tr>
                   <?php if( $form->error($model.'.client_email')){ ?>
                  <tr>
                    <td>&nbsp;</td>
                    <td><small  style="color:#FF0000;"> <?php echo $form->error($model.'.client_email');?> </small></td>
                  </tr>
                  <?php }?>
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
                  <tr>
                    <td width="135">Subject's Full Name:</td>
                    <td><div class="inputover floatleft">
        	<div class="inputlt"></div>
            <div class="inputmid"><?php echo $form->text($model.'.subject_fullname',array('class'=>'wid243','disabled'=>$disabled));?></div>
            <div class="inputrt"></div>
        </div></td>
                  </tr>
                   <?php if( $form->error($model.'.subject_fullname')){ ?>
                  <tr>
                    <td>&nbsp;</td>
                    <td><small  style="color:#FF0000;"> <?php echo $form->error($model.'.subject_fullname');?> </small></td>
                  </tr>
                  <?php }?>
                  <tr>
                    <td>Subject's Alias:</td>
                    <td><div class="inputover floatleft">
        	<div class="inputlt"></div>
            <div class="inputmid"><?php echo $form->text($model.'.subject_alias',array('class'=>'wid243','disabled'=>$disabled));?></div>
            <div class="inputrt"></div>
        </div></td>
                  </tr>
                  <tr>
                    <td>Subject's Email:</td>
                    <td><div class="inputover floatleft">
        	<div class="inputlt"></div>
            <div class="inputmid"><?php echo $form->text($model.'.subject_email',array('class'=>'wid243','disabled'=>$disabled));?></div>
            <div class="inputrt"></div>
        </div></td>
                  </tr>
                   <?php if( $form->error($model.'.subject_email')){ ?>
                  <tr>
                    <td>&nbsp;</td>
                    <td><small  style="color:#FF0000;"> <?php echo $form->error($model.'.subject_email');?> </small></td>
                  </tr>
                  <?php }?>
                  <tr>
                    <td>Subject's Phone:</td>
                    <td><div class="inputover floatleft">
        	<div class="inputlt"></div>
            <div class="inputmid"><?php echo $form->text($model.'.subject_phone',array('class'=>'wid243','disabled'=>$disabled));?></div>
            <div class="inputrt"></div>
        </div></td>
                  </tr>
                  <tr>
                    <td>Subject's Date of Birth:</td>
                    <td><div class="inputover floatleft">
                      <div class="inputlt"></div>
                      <div class="inputmid">
                       <?php 
					   echo $form->text($model.'.subject_dob1',array('id'=>'CaseTableSubjectDob','class'=>'wid243','disabled'=>$disabled));
					   echo $form->hidden($model.'.subject_dob',array('id'=>'CaseTableSubjectDob1','class'=>'wid243'));
					   

					   
					   ?>
                      </div>
                      <div class="inputrt"></div>
                    </div></td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td><small>*Leave blank and notify your investigator  if unsure. </small></td>
                  </tr>
                  <tr>
                    <td>Subject's Address:</td>
                    <td><?php echo $form->textarea($model.'.subject_address',array('class'=>'wid255','rows'=>3,'disabled'=>$disabled,'style'=>'height:70px;'));?></td>
                  </tr>
                   <?php if ( $form->error($model.'.subject_address')) { ?>
                  <tr>
                    <td>&nbsp;</td>
                    <td><small  style="color:#FF0000;"> <?php echo $form->error($model.'.subject_address');?> </small></td>
                  </tr>
                  <?php }?>
                  <tr>
                    <td>Subject's Education:</td>
                    <td><?php echo $form->textarea($model.'.subject_education',array('class'=>'wid255','rows'=>3,'disabled'=>$disabled));?></td>
                  </tr>
                     <?php if ( $form->error($model.'.subject_education')) { ?>
                  <tr>
                    <td>&nbsp;</td>
                    <td><small  style="color:#FF0000;"> <?php echo $form->error($model.'.subject_education');?> </small></td>
                  </tr>
                  <?php }  ?>
                  <tr>
                    <td>Subject's Employment:</td>
                    <td><?php echo $form->textarea($model.'.subject_employment',array('class'=>'wid255','rows'=>3,'disabled'=>$disabled,'style'=>'height:70px;'));?></td>
                  </tr>
                     <?php if ( $form->error($model.'.subject_employment')) { ?>
                  <tr>
                    <td>&nbsp;</td>
                    <td><small  style="color:#FF0000;"> <?php echo $form->error($model.'.subject_employment');?> </small></td>
                  </tr>
                  <?php } ?>
              </table>
        </div>
    </td>
    <td width="3%"><?php echo $this->Html->Image('dot.png',array('width'=>1,'height'=>1));?></td>    
    <td valign="top" width="47%">
    <div>
    	<div class="bxheadlt"></div>
        <div class="bxheadmid"><span></span>Step 3: Some background</div>
        <div class="bxheadrt"></div>
        <div class="clr"></div>
    </div>
    <div class="gradbox">
    	<div>How do or did you communicate with the subject? </div>
        <div class="pb5 pt5"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td>
                <?php echo $form->checkbox($model.'.subject_communication_email',array('disabled'=>$disabled));?>
               </td>
                <td>Email</td>
                <td><?php echo $form->checkbox($model.'.subject_communication_messenger',array('disabled'=>$disabled));?></td>
                <td>Messenger</td>
                <td><?php echo $form->checkbox($model.'.subject_communication_phone',array('disabled'=>$disabled));?></td>
                <td>Phone</td>
                <td><?php echo $form->checkbox($model.'.subject_communication_webcam',array('disabled'=>$disabled));?></td>
                <td>Webcam</td>
                <td><?php echo $form->checkbox($model.'.subject_communication_inperson',array('disabled'=>$disabled));?></td>
                <td>In  Person</td>
              </tr>
            </table>
        </div>
        <div>Please provide a brief summary of your case and how we can help. </div>
        <div>
        <?php echo $form->textarea($model.'.subject_background',array('class'=>'wid420','rows'=>4,'disabled'=>$disabled));?>
       
        </div>
        <div>
        
          <?php if ( $form->error($model.'.subject_background')) { 
		   
		   ?> <small  style="color:#FF0000;"  id="subject_background_count">
          <?php  echo $form->error($model.'.subject_background'); } else { ?>
           <small  id="subject_background_count">
       (1000 character maximum)
        <?php }?></small>
        </div>
    </div>
	<div class="pt15">
    	<div class="bxheadlt"></div>
        <div class="bxheadmid"><span></span>Step 4: A Few Questions (if applicable) </div>
        <div class="bxheadrt"></div>
        <div class="clr"></div>
    </div>
    <div class="gradbox">
        	<table width="100%" border="0" cellspacing="8" cellpadding="0">
                  <tr>
                    <td width="230">Has the subject sent any ID or documents?</td>
                    <td><div class="inputover floatleft">
        	<div class="inputlt"></div>
            <div class="inputmid"><?php echo $form->text($model.'.subject_id',array('class'=>'wid168','disabled'=>$disabled));?></div>
            <div class="inputrt"></div>
        </div></td>
                  </tr>
                  <tr>
                    <td>How long have you known the subject?</td>
                    <td><div class="inputover floatleft">
        	<div class="inputlt"></div>
            <div class="inputmid"><?php echo $form->text($model.'.subject_how_long',array('class'=>'wid168','disabled'=>$disabled));?></div>
            <div class="inputrt"></div>
        </div></td>
                  </tr>
                  <tr>
                    <td>If you met the subject via the internet,<br />
                    please specify on which website.</td>
                    <td><div class="inputover floatleft">
        	<div class="inputlt"></div>
            <div class="inputmid"><?php echo $form->text($model.'.subject_website_met',array('class'=>'wid168','disabled'=>$disabled));?></div>
            <div class="inputrt"></div>
        </div></td>
                  </tr>
                  <tr>
                    <td>Have you sent anything to the subject's<br />
                    address? If so, was it received?</td>
                    <td><div class="inputover floatleft">
        	<div class="inputlt"></div>
            <div class="inputmid"><?php echo $form->text($model.'.subject_sent_address',array('class'=>'wid168','disabled'=>$disabled));?></div>
            <div class="inputrt"></div>
        </div></td>
                  </tr>
              </table>
        </div>
    <div class="pt15">
    	<div class="bxheadlt"></div>
        <div class="bxheadmid"><span></span>Step 5: Optional Documentation</div>
        <div class="bxheadrt"></div>
        <div class="clr"></div>
    </div>
    <div class="gradbox">
        	<table width="100%" border="0"  cellspacing="8" cellpadding="0">
                  <tr>
                    <td >
					<?php
					if($disabled){
						  echo '<div class="floatleft" style="padding: 5px;">Photographs of subject &nbsp;</div> <div class="clr"></div>'. $this->Upload->view($model, $result[$model]['id'].'_photo',false);	
					 }else{
					 echo $this->Upload->edit($model, $this->data[$model]['id'].'_photo',$this->Html->image('add01.png'),array('jpg','gif','png','jpeg'),4);
					 }
		
		?> </td>
                 
                  </tr>
                 
                  <tr>
                    <td style="padding-top: 10px;"> 
					<?php  
					if($disabled){
						  echo '<div class="floatleft" style="padding: 5px;">Additional documentation (ID, passport, visa, records, etc.)&nbsp;</div> <div class="clr"></div>'. $this->Upload->view($model, $result[$model]['id'].'_document',false);	
					 }else{
						 echo $this->Upload->edit($model, $this->data[$model]['id'].'_document',$this->Html->image('add02.png'),array('jpg','gif','png','jpeg','pdf','doc','docx','xls','xlsx'),4);
					 }
		
		?></td>
                   
                  </tr>
              </table>
        </div>
    <?php if($disabled==false){ ?>
    <div class="pt15">
    	<div class="bxheadlt"></div>
        <div class="bxheadmid"><span></span>Communication</div>
        <div class="bxheadrt"></div>
        <div class="clr"></div>
    </div>
    <div class="gradbox">
        	<table width="100%" border="0" cellspacing="8" cellpadding="0">
                  <tr>
                    <td>
                     <?php echo $form->textarea($model.'.notification',array('class'=>'wid333','disabled'=>$disabled));?>
                   </td>
                    <td><div class="floatleft">
        	<div class="btnlt"></div>
            <div class="btnmid"><a href="#" id="notify">Notify</a></div>
            <div class="btnrt"></div>
        </div></td>
                  </tr>
                     <?php if ( $form->error($model.'.notification')) { ?>
                  <tr>
                    
                    <td><small  style="color:#FF0000;"> <?php echo $form->error($model.'.notification');?> </small></td><td>&nbsp;</td>
                  </tr>
                  <?php } ?>
              </table>
        </div>
        <div class="divfull pt15 floatright">
    	
      <div class="floatright pr20">
        	<div class="btnlt"></div>
            <div class="btnmid">
             <?php 
			 echo $this->Html->link( 'Cancel',array('plugin'=>'cases','controller'=>'cases','action'=> 'casebrowser'));
			?>
           </div>
            <div class="btnrt"></div>
        </div>
       
        <div class="floatright pr10">
        	<div class="btnlt"></div>
            <div class="btnmid"><a href="#" id="save_case">Save</a></div>
            <div class="btnrt"></div>
        </div>
        
    </div>
        <input type="submit" style="display:none;" />

    <?php } ?>
    </td>
  </tr>
</table>

    </div>
    <?php echo $this->Form->end();
