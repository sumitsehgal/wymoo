<?php //echo $javascript->link(array('jquery-ui.min.js','jquery.stylish-select.js','jquery.mousewheel.js','jquery.jscrollpane.min.js'),false); 
//echo $this->Html->css(array('jquery.jscrollpane'),'stylesheet', array('inline' => false ) ); 

$autoOpen = ($form->error($model.'.notification')) ? 'true' : 'false';
$width = ($result['Quote']['quote_title']!='' ) ? '1300px' : '950px';
$email_caseurl = $this->Html->url(array('plugin'=>'cases','controller'=>'cases','action'=>'caseemail',$result[$model]['id']));

$disabled = true;
if( $result[$model]['is_exported']==0 ){
	$disabled = false;
}

echo $javascript->codeBlock('$(document).ready(function () {$("#fancybox-outer",window.parent.document).mousewheel(function(event, delta) { event.stopPropagation();$("#fancybox-wrap",window.parent.document).trigger("mousewheel.fb", delta);});$("#fancybox-content" , window.parent.document).css("height", $("body").height() - 50 );$("#fancybox-frame" , window.parent.document).css("height", $("body").height() - 50);$("#fancybox-content" , window.parent.document).css("width", "990px");$("#fancybox-outer" , window.parent.document).css("width", "1000px");$("#fancybox-wrap" , window.parent.document).css("width", "1010px");$("#edit_case").click(function(e){window.parent.location.href = $(this).attr("href");  e.preventDefault();});$("#status_case").click(function(e){window.parent.location.href = $(this).attr("href");  e.preventDefault();});$("#notify_client").click(function(e){$( "div#notify_client_dialog").dialog("open");e.preventDefault();});$("div#notify_client_dialog" ).dialog({autoOpen: '. $autoOpen  .',width:450,modal:true});	$("div#notify_client_dialog" ).find("#save_notify").click(function(e){$("#CaseTableNotification").val( $("div#notify_client_dialog" ).find("#CaseTableNotification1").val());$("#CaseTableNotificationType").val("Admin");$("#CaseTableAdminCasenotesForm").submit();e.preventDefault();});$("#email_case").click(function(e){$("div#email_case_dialog" ).dialog("open");e.preventDefault();});$("div#email_case_dialog" ).dialog({autoOpen: false,width:400,modal:true});	$("div#no_email_case_dialog" ).dialog({autoOpen: false,modal:true				});	$("div#email_case_dialog" ).find("#send_email").click(function(e){if($("#email_address").val()=="" ){ $("#no_case").empty().html(" <br />Please enter email address to send email.");$( "div#no_email_case_dialog").dialog({title:"Send Email Case"});$( "div#no_email_case_dialog").dialog("open");return false;}if(!(emailregs . test($("#email_address").val())) ){$("#no_case").empty().html(" <br />Please enter valid email address to send email.");$( "div#no_email_case_dialog").dialog({title:"Send Email Case"});$( "div#no_email_case_dialog").dialog("open");return false;}window.location.href = "' . $email_caseurl. '" + "/" + $("#email_address").val();e.preventDefault();});$("a.ttt").mouseover(function() {$("div#preview_dialog_info").load($(this).attr("href") + "/1",function(){dlginfo.dialog("open");});	}).mousemove(function(event) {dlginfo.dialog("option", "position", {my: "left top",at: "right bottom",of: event,offset: "20 20"});}).mouseleave(function() {dlginfo.dialog("close");});var dlginfo = $("#preview_dialog_info").dialog({ autoOpen: false,  draggable: false,  resizable: false});});',array('allowCache'=>true,'safe'=>true,'inline'=>false));?>
<style type="text/css" id="page-css">
/* Styles specific to this particular page */.scroll-pane {
	width: 100%;
	height: 200px;
	overflow: auto;
	font:12px/20px Arial, Helvetica, sans-serif;
	color:#333;
}
</style>
<script type="text/javascript" >$(function(){
	var api = $('.scroll-pane').jScrollPane({showArrows:true,maintainPosition: false});
	$("#export_case").click(function(e){
		$("div#export_case_dialog" ).dialog("open");e.preventDefault();
	});
	$("#unlock_case_dialog").dialog({show:'slide',hide:'slide', width: 350,height: 150,autoOpen: false,resizable: true,draggable: false,modal: true,});
	$("#close_dialog").click(function(e){$("div#unlock_case_dialog").dialog("close");e.preventDefault();});
	$("#export_case1").click(function(e){$("div#unlock_case_dialog").dialog("open");e.preventDefault();});
	$("#export_case_lnk").click(function(e){
		$("#unlockbtndiv").show();
		$("div#export_case_dialog" ).dialog("close");<?php if($disabled==false){?>$("div#export_case_dialog" ).html('<div style="color: #535353;font-family: Arial,Helvetica,sans-serif;font-size: 12px;padding:5px;"><div id="msg" style="text-align:justify;">The case has been locked, you cannnot change anything.');<?php if($role=='Administrator'){ ?>$("div#msg" ).append('To unlock this case click on "<b>Unlock Case</b>" button.');<?php } ?>$("#notify_client_btn").remove();<?php if($role=='Administrator'){ ?>$("#export_case1").click(function(e){$("div#unlock_case_dialog").dialog("open");e.preventDefault();});<?php } }?>});$("div#export_case_dialog" ).dialog({autoOpen: false,width:400,modal:true});	$("#investigator_notes").click(function(e){<?php if($disabled){?>$("div#export_case_dialog" ).dialog("open");<?php } else { ?> $("#CaseTableNotificationType").val("Investigator");$("#CaseTableAdminCasenotesForm").submit();<?php } ?>e.preventDefault();});});</script>
<?php 	echo $this->Form->create($model, array('class'=>'form-inline','url'=>array('plugin'=>'cases','controller'=>'cases','action'=>'casenotes',$id)));echo $this->Form->hidden($model.'.notification_type',array('value'=>'Investigator'));echo $form->textarea($model.'.notification',array('style'=>'display:none'));?>
<script>var emailregs = /^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i;
</script>
<div id="notify_client_dialog" title="Notify Client"  style="display:none;">
  <div class="floatleft pd20">
    <div class="pl20"><?php echo $form->textarea($model.'.notification1',array('class'=>'wid345 floatleft', 'rows'=>16));?><br />
      <small  style="color:#FF0000;"><?php echo $form->error($model.'.notification');?> </small></div>
    <div class="floatright pt15">
      <div class="btnlt"></div>
      <div class="btnmid"><a href="javascript:void(0);"  style="color:#FFFFFF" id="save_notify">Send</a></div>
      <div class="btnrt"></div>
    </div>
  </div>
</div>
<?php //pr($result);?>
<div class="divfull pt15">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td valign="top" width="47%">
        <div>
          <div class="bxheadlt"></div>
          <div class="bxheadmid">Client: <?php echo $result['User']['fname'] . ' ' .  $result['User']['lname'];?> </div>
          <div class="bxheadrt"></div>
          <div class="clr"></div>
        </div>
        <div class="gridbxover1">
          <table width="100%" border="0" cellspacing="0" cellpadding="0" class="tblcaselist">
            <tr class="odd">
              <td width="150">Case#:</td>
              <td><?php echo $result[$model]['id'] ;?></td>
            </tr>
            <tr class="even">
              <td>Login Name:</td>
              <td><?php echo $result['User']['username'] ;?> </td>
            </tr>
            <tr class="odd">
              <td>First Name:</td>
              <td><?php echo $result['User']['fname'] ;?></td>
            </tr>
            <tr class="even">
              <td>Last Name:</td>
              <td><?php echo $result['User']['lname'] ;?></td>
            </tr>
            <tr class="odd">
              <td>Site:</td>
              <td><?php echo $result[$model]['site_name'] ;?></td>
            </tr>
            <tr class="even">
              <td>Email</td>
              <td><?php echo $result['User']['email'] ;?> </td>
            </tr>
            <tr class="odd">
              <td>Due Date:</td>
              <td><?php echo ($result[$model]['due_date']==0)? 'Pending' : date('l, F d, Y',$result[$model]['due_date']);?> </td>
            </tr>
            <tr class="even">
              <td>Assigned To:</td>
              <td><?php echo $result[$model]['assigned_name'];?></td>
            </tr>
          </table>
        </div>
        <?php if($result['Quote']['quote_title']!=''){ ?>
        <div class="pt15">
          <div class="bxheadlt"></div>
          <div class="bxheadmid"><?php echo ($result['Quote']['quote_title']=='contactus')? 'contact us':$result['Quote']['quote_title'];?></div>
          <div class="bxheadrt"></div>
          <div class="clr"></div>
        </div>
        <div class="gridbxover1">
          <table width="100%" border="0" cellspacing="0" cellpadding="0" class="tblcaselist">
            <tr class="odd">
              <td width="150">First Name:</td>
              <td><?php echo $result['Quote']['first_name'];?></td>
            </tr>
            <tr class="even">
              <td>Last Name:</td>
              <td><?php echo $result['Quote']['last_name'];?> </td>
            </tr>
            <tr class="odd">
              <td>Phone:</td>
              <td><?php echo $result['Quote']['phone'];?></td>
            </tr>
            <tr class="even">
              <td>City, State:</td>
              <td><?php echo $result['Quote']['city'];?><?php echo ( $result['Quote']['state'] !='')? ', ' . $result['Quote']['state'] : '';?></td>
            </tr>
            <tr class="odd">
              <td>Country:</td>
              <td><?php echo $result['Quote']['country'];?></td>
            </tr>
            <tr class="even">
              <td>Site:</td>
              <td><?php echo $result['Quote']['site'];?> </td>
            </tr>
            <tr class="odd">
              <td>Referral Type:<br />
              </td>
              <td><?php echo $result['Quote']['referral'];?></td>
            </tr>
            <tr class="even">
              <td>Fraud:</td>
              <td><?php echo $result['Quote']['fraud'];?></td>
            </tr>
            <tr class="odd">
              <td>Infidelity:</td>
              <td><?php echo $result['Quote']['infidelity'];?></td>
            </tr>
            <tr class="even">
              <td>Finacial Loss:</td>
              <td><?php echo $result['Quote']['loss'];?></td>
            </tr>
            <tr class="odd">
              <td>Remote Addr:</td>
              <td>
                <?php $server_info = (json_decode($result['Quote']['server_info'],true));echo  $server_info['REMOTE_ADDR'];?>
              </td>
            </tr>
            <tr class="even">
              <td>Http User Agent:</td>
              <td>
                <?php   echo  $server_info['HTTP_USER_AGENT'];?>
              </td>
            </tr>
            <tr class="odd">
              <td>Http Host:</td>
              <td>
                <?php   echo  $server_info['HTTP_HOST'];?>
              </td>
            </tr>
            <tr class="even">
              <td>Location:</td>
              <td>
                <?php   echo  $server_info['LOCATION'];?>
              </td>
            </tr>
            <tr class="odd">
              <td>Description:</td>
              <td style="padding-right:0px;">
                <div class="scroll-pane" style="height:300px;">
                  <div style="width:100%"> <?php echo $result['Quote']['description'];?></div>
                </div>
              </td>
            </tr>
          </table>
        </div>
        <?php }else{ ?>
        <div class="pt15">
          <div class="bxheadlt"></div>
          <div class="bxheadmid">Attachments</div>
          <div class="bxheadrt"></div>
          <div class="clr"></div>
        </div>
        <div class="gridbxover1">
          <table width="100%" border="0" cellspacing="0" cellpadding="0" class="tblcaselist">
            <tr class="odd">
              <td width="150">Pictures:</td>
              <td style="padding-right:0px;">
                <div class="scroll-pane" style="height:72px;width:305px;">
                  <div style="width:100%"><?php echo $this->Upload->view($model, $result[$model]['id'].'_photo');		?></div>
                </div>
              </td>
            </tr>
            <tr class="even">
              <td>Documents:</td>
              <td style="padding-right:0px;">
                <div class="scroll-pane" style="height:73px;width:305px;">
                  <div style="width:100%"><?php echo $this->Upload->view($model, $result[$model]['id'].'_document');		?></div>
                </div>
              </td>
            </tr>
          </table>
        </div>
        <div class="pt15">
          <div class="bxheadlt"></div>
          <div class="bxheadmid">Communication</div>
          <div class="bxheadrt"></div>
          <div class="clr"></div>
        </div>
        <div class="gridbxover1">
          <div class="scroll-pane" style="height:130px;width:490px;" >
            <table width="100%" style="width:490px;" border="0" cellspacing="0" cellpadding="0" class="tblcaselist">
              <?php 
$class = 'even';
foreach($result['Communication'] as $Communication){
$class = ($class=='even')? 'odd' : 'even';
$style = '';
if($Communication['notification_type']=='Admin'){
$style =  'style="font-weight:bold"';
$Communication['notification_type']= 'Investigator';
}
?>
              <tr class="<?php echo $class;?>" <?php echo $style;?>>
                <td width="150"><?php echo $Communication['notification_type'] . ' ('. date('d-m-Y',$Communication['created']) ;?>):</td>
                <td>
                  <div style="width: 288px; word-wrap: break-word;"><?php echo nl2br($Communication['comments'])  ;?></div>
                </td>
              </tr>
              <?php } ?>
            </table>
          </div>
        </div>
        <?php


} ?>
      </td>
      <td width="3%"><?php echo $this->Html->Image('dot.png',array('width'=>1,'height'=>1));?></td>
      <td valign="top" width="47%">
        <div>
          <div class="bxheadlt"></div>
          <div class="bxheadmid">Case Data</div>
          <div class="bxheadrt"></div>
          <div class="clr"></div>
        </div>
        <div class="gridbxover1">
          <table width="100%" border="0" cellspacing="0" cellpadding="0" class="tblcaselist">
            <tr class="odd">
              <td width="150">Status:</td>
              <td><span class="floatleft pr10"><?php echo $result[$model]['case_status'];?> </span><span class="statusicon" style="padding:2px 0 0;"><?php echo $this->Html->Image(Configure::read('case_icon.'.$result[$model]['case_status_id']));?></span></td>
            </tr>
            <tr class="even">
              <td>Contact Methods:</td>
              <td >
                <?php 
$ContactMethods = array();
if ( $result[$model]['subject_communication_email'] == 1) {
$ContactMethods[] = 'Email';
}
if ( $result[$model]['subject_communication_messenger'] == 1) {
$ContactMethods[] = 'Messenger';
}
if ( $result[$model]['subject_communication_phone'] == 1) {
$ContactMethods[] = 'Phone';
}
if ( $result[$model]['subject_communication_webcam'] == 1) {
$ContactMethods[] = 'Webcam';
}
if ( $result[$model]['subject_communication_inperson'] == 1) {
$ContactMethods[] = 'In  Person';
}
echo $m = implode(', ', $ContactMethods);


?>
              </td>
            </tr>
            <tr class="odd">
              <td>Subject's Name:</td>
              <td><?php echo $result[$model]['subject_fullname'];?></td>
            </tr>
            <tr class="even">
              <td>Subject's Alias:</td>
              <td><?php echo $result[$model]['subject_alias'];?></td>
            </tr>
            <tr class="odd">
              <td>Subject's Email:<br />
              </td>
              <td><?php echo $result[$model]['subject_email'];?></td>
            </tr>
            <tr class="even">
              <td>Subject's DOB:</td>
              <td><?php echo  $result[$model]['subject_dob'] = ($result[$model]['subject_dob']==0) ? 'Not Provided' : date('d-M-Y',$result[$model]['subject_dob']);	?></td>
            </tr>
            <tr class="odd">
              <td>Subject's Phone:</td>
              <td><?php echo  $result[$model]['subject_phone'] ;	?></td>
            </tr>
            <tr class="even">
              <td>Address:</td>
              <td><?php echo $result[$model]['subject_address'];?> </td>
            </tr>
            <tr class="odd">
              <td>Employment:</td>
              <td><?php echo $result[$model]['subject_employment'];?> </td>
            </tr>
            <tr class="even">
              <td>Education:</td>
              <td><?php echo $result[$model]['subject_education'];?></td>
            </tr>
            <tr class="odd">
              <td>Background:</td>
              <td style="padding-right:0px; margin-right:0px;">
                <div class="scroll-pane" style="height:150px;">
                  <div style="width:100%"><?php echo $result[$model]['subject_background'];?></div>
                </div>
              </td>
            </tr>
            <tr class="even">
              <td>Any ID or documents?</td>
              <td><?php echo $result[$model]['subject_id'];?> </td>
            </tr>
            <tr class="odd">
              <td>How long have you known?</td>
              <td><?php echo $result[$model]['subject_how_long'];?></td>
            </tr>
            <tr class="even">
              <td>Met on which website?</td>
              <td><?php echo $result[$model]['subject_website_met'];?></td>
            </tr>
            <tr class="odd">
              <td>Sent anything to address?</td>
              <td><?php echo $result[$model]['subject_sent_address'];?></td>
            </tr>
          </table>
        </div>
        <?php if($result['Quote']['quote_title']!=''){ ?>
        <div class="pt15">
          <div class="bxheadlt"></div>
          <div class="bxheadmid">Attachments</div>
          <div class="bxheadrt"></div>
          <div class="clr"></div>
        </div>
        <div class="gridbxover1">
          <table width="100%" border="0" cellspacing="0" cellpadding="0" class="tblcaselist">
            <tr class="odd">
              <td width="150">Pictures:</td>
              <td style="padding-right:0px; margin-right:0px;">
                <div class="scroll-pane" style="height:73px;">
                  <div style="width:100%"><?php echo $this->Upload->view($model, $result[$model]['id'].'_photo');		?></div>
                </div>
              </td>
            </tr>
            <tr class="even">
              <td>Documents:</td>
              <td style="padding-right:0px; margin-right:0px;">
                <div class="scroll-pane" style="height:72px;">
                  <div style="width:100%"><?php echo $this->Upload->view($model, $result[$model]['id'].'_document');		?></div>
                </div>
              </td>
            </tr>
          </table>
        </div>
        <div class="pt15">
          <div class="bxheadlt"></div>
          <div class="bxheadmid">Communication</div>
          <div class="bxheadrt"></div>
          <div class="clr"></div>
        </div>
        <div class="gridbxover1">
          <div class="scroll-pane" style="height:150px;">
            <div style="width:100%">
              <table width="100%" border="0" cellspacing="0" cellpadding="0" class="tblcaselist">
                <?php $class = 'even';
foreach($result['Communication'] as $Communication){
$class = ($class=='even')? 'odd' : 'even';
$style = '';
if($Communication['notification_type']=='Admin'){
$style =  'style="font-weight:bold"';
$Communication['notification_type']= 'Investigator';
}
?>
                <tr class="<?php echo $class;?>" <?php echo $style;?>>
                  <td width="150"><?php echo $Communication['notification_type'] . ' ('. date('d-m-Y',$Communication['created']) ;?>):</td>
                  <td >
                    <div style="word-wrap:break-word;margin-right: 15px; width:290px"><?php echo nl2br($Communication['comments'])  ;?></div>
                  </td>
                </tr>
                <?php } ?>
              </table>
            </div>
          </div>
        </div>
        <?php } ?>
      </td>
    </tr>
  </table>
</div>
<div class="divfull pt15">
  <div class="floatright" id="floatright_btns">
    <?php if($disabled==false){ ?>
    <div class="floatleft pr10" id="notify_client_btn">
      <div class="btnlt"></div>
      <div class="btnmid"><?php echo $this->Html->link( 'Notify Client',array('plugin'=>'cases','controller'=>'cases','action'=> 'notify_client','admin'=>true,$id),array('id'=>'notify_client'));?></div>
      <div class="btnrt"></div>
    </div>
    <?php }?>
    <div class="floatleft pr10">
      <div class="btnlt"></div>
      <div class="btnmid"><?php echo $this->Html->link( 'Email Case',array('plugin'=>'cases','controller'=>'cases','action'=> 'caseemail','admin'=>true,$id),array('id'=>'email_case'));?></div>
      <div class="btnrt"></div>
    </div>
    <div class="floatleft pr10">
      <div class="btnlt"></div>
      <div class="btnmid"> <?php echo $this->Html->link( 'Edit Case',array('plugin'=>'cases','controller'=>'cases','action'=> 'caseinfo','admin'=>true,$id),array('id'=>'edit_case'));?></div>
      <div class="btnrt"></div>
    </div>
    <div class="floatleft pr10">
      <div class="btnlt"></div>
      <div class="btnmid"><?php echo $this->Html->link( 'Case Status',array('plugin'=>'cases','controller'=>'cases','action'=> 'casetracker','admin'=>true,$id),array('id'=>'status_case'));?></div>
      <div class="btnrt"></div>
    </div>
    <div class="floatleft pr10">
      <div class="btnlt"></div>
      <div class="btnmid">
        <?php 				echo $this->Html->link( 'Export Case',array('plugin'=>'cases','controller'=>'cases','action'=> 'caseexport','admin'=>true,$id),array('id'=>'export_case','style'=>'color:#FFFFFF'));?>
      </div>
      <div class="btnrt"></div>
    </div>
    
    <div class="floatleft pr10"<?php if(!$disabled){
		 ?> style="display:none" <?php } ?> id="unlockbtndiv">
      <div class="btnlt"></div>
      <div class="btnmid"><?php 
	  if($role=='Administrator'){
	  echo $this->Html->link( $this->Html->image('unlock.png',array('style'=>'vertical-align: text-bottom;')).'&nbsp;&nbsp;Unlock Case',array('plugin'=>'cases','controller'=>'cases','action'=> 'unlocked','admin'=>true,$id),array('escape'=>false,'id'=>'export_case1','style'=>'color:#FFFFFF'));
	  } else {
	  echo $this->Html->link( $this->Html->image('unlock.png',array('style'=>'vertical-align: text-bottom;')).'&nbsp;&nbsp;Unlock Case','javascript:void(0);',array('escape'=>false,'id'=>'export_case1','style'=>'color:#FFFFFF'));
		 }
	  ?></div>
      <div class="btnrt"></div>
    </div>
   
  </div>
</div>
<div class="divfull pt15">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td valign="top" >
        <div>
          <div class="bxheadlt"></div>
          <div class="bxheadmid">Investigator Notes </div>
          <div class="bxheadrt"></div>
          <div class="clr"></div>
        </div>
        <div class="gridbxover1">
          <div class="wid550 floatleft">
            <div class="scroll-pane" >
              <div style="width:100%">
                <table width="100%" style="width:550px" border="0" cellspacing="0" cellpadding="0" class="tblcaselist">
                  <?php $class = 'even';foreach($result['InvestigatorNote'] as $InvestigatorNote){
$class = ($class=='even')? 'odd' : 'even';

?>
                  <tr class="<?php echo $class;?>" >
                    <td width="150"><?php echo $InvestigatorNote['created_by'];?>: (<?php echo  date('d-m-Y',$InvestigatorNote['created']);?>):</td>
                    <td><?php echo nl2br($InvestigatorNote['comments'])  ;?> </td>
                  </tr>
                  <?php } ?>
                </table>
              </div>
            </div>
          </div>
          <div class="floatleft pd20">
            <div class="pl20"><?php echo $form->textarea($model.'.notes',array('class'=>'wid345 floatleft', 'rows'=>6,'disabled'=>$disabled));?><br />
              <small  style="color:#FF0000;"><?php echo $form->error($model.'.notes');?> </small></div>
            <div class="clr"></div>
            <div class="floatright pt15">
              <div class="btnlt"></div>
              <div class="btnmid" ><a href="#"  <?php if($disabled==false){ ?>id="investigator_notes"  <?php } ?>>Save</a></div>
              <div class="btnrt"></div>
            </div>
          </div>
          <div class="clr"></div>
        </div>
      </td>
    </tr>
  </table>
</div>
<?php $this->Form->end();?>
<div id="no_email_case_dialog" title="Email Case" >
  <div style="color: #535353;font-family: Arial,Helvetica,sans-serif;font-size: 12px;">
    <div id="no_case" style="text-align:justify"><br />
      No case selected.Please select one case to email case.</div>
  </div>
</div>
<div id="email_case_dialog" title="Enter Email Address">
  <table width="100%" cellspacing="0" cellpadding="0" border="0">
    <tbody>
      <tr>
        <td colspan="2">&nbsp;</td>
      </tr>
      <tr>
        <td>Email Address:</td>
        <td>
          <div class="inputover floatleft">
            <div class="inputlt"></div>
            <div class="inputmid">
              <input type="text" class="wid243" placeholder="Enter Email Address" value=""  id="email_address">
            </div>
            <div class="inputrt"></div>
          </div>
        </td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>
          <div class="floatleft">
            <div class="btnlt"></div>
            <div class="btnmid"><a href="#"  style="color:#FFFFFF" id="send_email">Email Case</a></div>
            <div class="btnrt"></div>
          </div>
        </td>
      </tr>
    </tbody>
  </table>
</div>
<div id="preview_dialog_info" title="Preview" ></div>
<div id="unlock_case_dialog" title="Unlock Case" ><br/>
<?php if($role=='Administrator'){ ?>
  Are you sure you want to unlock the case?
  <div class="floatright pt15" id="floatrightbtn" style="padding-top:20px;">
    <div class="btnlt"></div>
    <div class="btnmid"><?php echo $this->Html->link( 'Yes',array('plugin'=>'cases','controller'=>'cases','action'=> 'unlocked','admin'=>true,$id),array('id'=>'export_case_lnk','style'=>'color:#FFFFFF'));?></div>
    <div class="btnrt" style="padding-right:2px;"></div>
    <div class="btnlt"></div>
    <div class="btnmid"><?php echo $this->Html->link( 'No',array(),array('id'=>'close_dialog','style'=>'color:#FFFFFF'));?></div>
    <div class="btnrt"></div>
  </div>
  <?php } else {echo 'You do not have access to unlock this case.'; }?>
</div>
<div id="export_case_dialog" title="Case Locked" >
  <div style="color: #535353;font-family: Arial,Helvetica,sans-serif;font-size: 12px;padding:5px;">
    <div style="text-align:justify;">
      <?php if($disabled) { echo 'The case has been locked, you cannnot change anything.'; if($role=='Administrator'){ echo 'To unlock this case click on "<b>Unlock Case</b>" button.'; } } else {echo 'This case will be locked and notes page will no longer be editable.';}?>
      <br>
      <br>
    </div>
    <div class="floatright pt15" id="floatrightbtn">
      <?php if($disabled) {
} else { ?>
      <div class="btnlt"></div>
      <div class="btnmid"><?php echo $this->Html->link( 'Export Case',array('plugin'=>'cases','controller'=>'cases','action'=> 'caseexport','admin'=>true,$id),array('id'=>'export_case_lnk','style'=>'color:#FFFFFF'));?></div>
      <div class="btnrt"></div>
      <?php }?>
    </div>
  </div>
</div>
