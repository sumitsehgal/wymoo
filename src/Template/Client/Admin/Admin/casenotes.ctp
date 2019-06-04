<?php 
$case = $result[$model];
$quote = (isset($result[$model]['quotes'])&&!empty($result[$model]['quotes']))?$result[$model]['quotes'][0]:array();
$notes = $result[$model]['case_notes'];
$notifications = $result[$model]['case_notifications'];
if(!empty($quote)):
  $serverS = str_replace('KHTML,', 'KHTML--', $quote['server_info']);
  $server = explode(',', $serverS);
endif;
$width = (!empty($quote)) ? '1300px' : '950px';
$autoOpen = ($this->Form->error($model.'.notification')) ? 'true' : 'false';
$email_caseurl = $this->Html->link(array('controller'=>'cases','action'=>'caseemail',$case['id']));

$disabled = true;
if( $case['is_exported']==0 ){
  $disabled = false;
}

?>
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
  $(document).ready(function () {$("#fancybox-outer",window.parent.document).mousewheel(function(event, delta) { event.stopPropagation();$("#fancybox-wrap",window.parent.document).trigger("mousewheel.fb", delta);});$("#fancybox-content" , window.parent.document).css("height", $("body").height() - 50 );$("#fancybox-frame" , window.parent.document).css("height", $("body").height() - 50);$("#fancybox-content" , window.parent.document).css("width", "990px");$("#fancybox-outer" , window.parent.document).css("width", "1000px");$("#fancybox-wrap" , window.parent.document).css("width", "1010px");$("#edit_case").click(function(e){window.parent.location.href = $(this).attr("href");  e.preventDefault();});$("#status_case").click(function(e){window.parent.location.href = $(this).attr("href");  e.preventDefault();});$("#notify_client").click(function(e){$( "div#notify_client_dialog").dialog("open");e.preventDefault();});$("div#notify_client_dialog" ).dialog({autoOpen: false,width:450,modal:true});  $("div#notify_client_dialog" ).find("#save_notify").click(function(e){$("#CaseTableNotification").val( $("div#notify_client_dialog" ).find("#CaseTableNotification1").val()); $("#notificationnote").val( $("div#notify_client_dialog" ).find("#CaseTableNotification1").val());    $("#CaseTableNotificationType").val("Admin");$("#CaseTableAdminCasenotesForm").submit();e.preventDefault();});$("#email_case").click(function(e){$("div#email_case_dialog" ).dialog("open");e.preventDefault();});$("div#email_case_dialog" ).dialog({autoOpen: false,width:400,modal:true});  $("div#no_email_case_dialog" ).dialog({autoOpen: false,modal:true       }); $("div#email_case_dialog" ).find("#send_email").click(function(e){if($("#email_address").val()=="" ){ $("#no_case").empty().html(" <br />Please enter email address to send email.");$( "div#no_email_case_dialog").dialog({title:"Send Email Case"});$( "div#no_email_case_dialog").dialog("open");return false;}if(!(emailregs . test($("#email_address").val())) ){$("#no_case").empty().html(" <br />Please enter valid email address to send email.");$( "div#no_email_case_dialog").dialog({title:"Send Email Case"});$( "div#no_email_case_dialog").dialog("open");return false;}window.location.href = "' . $email_caseurl. '" + "/" + $("#email_address").val();e.preventDefault();});$("a.ttt").mouseover(function() {$("div#preview_dialog_info").load($(this).attr("href") + "/1",function(){dlginfo.dialog("open");}); }).mousemove(function(event) {dlginfo.dialog("option", "position", {my: "left top",at: "right bottom",of: event,offset: "20 20"});}).mouseleave(function() {dlginfo.dialog("close");});var dlginfo = $("#preview_dialog_info").dialog({ autoOpen: false,  draggable: false,  resizable: false});});''
  $("#export_case").click(function(e){
    $("div#export_case_dialog" ).dialog("open");e.preventDefault();
  });
  $("#unlock_case_dialog").dialog({
    show:'slide',
    hide:'slide', 
    width: 350,
    height: 150,
    autoOpen: false,
    resizable: true,
    draggable: false,
    modal: true,
  });
  $("#close_dialog").click(function(e){
    $("div#unlock_case_dialog").dialog("close");
    e.preventDefault();
  });
  $("#export_case1").click(function(e){
    $("div#unlock_case_dialog").dialog("open");
    e.preventDefault();
  });
  $("#export_case_lnk").click(function(e){
    $("#unlockbtndiv").show();
    $("div#export_case_dialog" ).dialog("close");
    <?php if($disabled==false){ ?>
      $("div#export_case_dialog" ).html('<div style="color: #535353;font-family: Arial,Helvetica,sans-serif;font-size: 12px;padding:5px;"><div id="msg" style="text-align:justify;">The case has been locked, you cannnot change anything.');
      <?php if($role=='Administrator'){ ?>
        $("div#msg" ).append('To unlock this case click on "<b>Unlock Case</b>" button.');
      <?php } ?>
      $("#notify_client_btn").remove();
      <?php if($role=='Administrator'){ ?>
        $("#export_case1").click(function(e){
          $("div#unlock_case_dialog").dialog("open");
          e.preventDefault();
        });
        <?php 
      } 
    }?>
  });
  $("div#export_case_dialog" ).dialog({
    autoOpen: false,
    width:400,
    modal:true
  });  
  $("#investigator_notes").click(function(e){
    <?php if($disabled){?>
      $("div#export_case_dialog" ).dialog("open");
    <?php } else { ?> 
      $("#CaseTableNotificationType").val("Investigator");
      $("#CaseTableAdminCasenotesForm").submit();
    <?php } ?>
    e.preventDefault();
  });
});
</script>
<input type="hidden" id="caseid" value="<?php echo $case['id']; ?>" />


<div class="divfull pt15">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td valign="top" width="47%">
        <div>
          <div class="bxheadlt"></div>
          <div class="bxheadmid">Client: <?php echo $case['client_fname'].' '.$case['client_lname']; ?> </div>
          <div class="bxheadrt"></div>
          <div class="clr"></div>
        </div>
        <div class="gridbxover1">
          <table width="100%" border="0" cellspacing="0" cellpadding="0" class="tblcaselist">
            <tr class="odd">
              <td width="150">Case#:</td>
              <td><?php echo $case['id']; ?></td>
            </tr>
            <tr class="even">
              <td>Login Name:</td>
              <td><?php echo $case['client_login_id']; ?></td>
            </tr>
            <tr class="odd">
              <td>First Name:</td>
              <td><?php echo $case['client_fname']; ?></td>
            </tr>
            <tr class="even">
              <td>Last Name:</td>
              <td><?php echo $case['client_lname']; ?></td>
            </tr>
            <tr class="odd">
              <td>Site:</td>
              <td><?php echo $case['site_name']; ?></td>
            </tr>
            <tr class="even">
              <td>Email</td>
              <td><?php echo $case['client_email']; ?></td>
            </tr>
            <tr class="odd">
              <td>Due Date:</td>
              <td><?php if($case['due_date']=="Pending") echo "Pending"; else echo date('Y-m-d',$case['due_date']); ?> </td>
            </tr>
            <tr class="even">
              <td>Assigned To:</td>
              <td><?php if(!empty($investor)): ?><?=$investor['fname'].' '.$investor['lname']?><?php endif; ?></td>
            </tr>
          </table>
        </div>
        <?php if(!empty($quote)): ?>
          <div class="pt15">
            <div class="bxheadlt"></div>
            <div class="bxheadmid"><?= (strtolower($quote['quote_title'])=='contactus')? 'contact us':$quote['quote_title'] ?></div>
            <div class="bxheadrt"></div>
            <div class="clr"></div>
          </div>
          <div class="gridbxover1">
            <table width="100%" border="0" cellspacing="0" cellpadding="0" class="tblcaselist">
              <tr class="odd">
                <td width="150">First Name:</td>
                <td><?= $quote['first_name'] ?></td>
              </tr>
              <tr class="even">
                <td>Last Name:</td>
                <td><?= $quote['last_name'] ?></td>
              </tr>
              <tr class="odd">
                <td>Phone:</td>
                <td><?= $quote['phone'] ?></td>
              </tr>
              <tr class="even">
                <td>City, State:</td>
                <td><?= $quote['city'] ?><?= ($quote['state'])?','.$quote['state']:'' ?></td>
              </tr>
              <tr class="odd">
                <td>Country:</td>
                <td><?= $quote['country'] ?></td>
              </tr>
              <tr class="even">
                <td>Site:</td>
                <td><?= $quote['site'] ?></td>
              </tr>
              <tr class="odd">
                <td>Referral Type:<br />
                </td>
                <td><?= $quote['referral'] ?></td>
              </tr>
              <tr class="even">
                <td>Fraud:</td>
                <td><?= $quote['fraud'] ?></td>
              </tr>
              <tr class="odd">
                <td>Infidelity:</td>
                <td><?= $quote['infidelity'] ?></td>
              </tr>
              <tr class="even">
                <td>Finacial Loss:</td>
                <td><?= $quote['loss'] ?></td>
              </tr>
              <?php if(count($server)): $cls = 'even'; foreach($server as $key=>$info): $data = explode('=', $info); $cls = ($cls=='odd')?'even':'odd'; ?>
                <tr class="<?= $cls ?>">
                  <td><?= @$data[0] ?>:</td>
                  <td><?= @str_replace('KHTML--', 'KHTML,', $data[1]) ?></td>
                </tr>
              <?php endforeach; endif; ?>
              <tr class="odd">
                <td>Description:</td>
                <td style="padding-right:0px;">
                  <div class="scroll-pane" style="height:300px;">
                    <div style="width:100%"><?= $quote['description'] ?></div>
                  </div>
                </td>
              </tr>
            </table>
          </div>
          <?php else: ?>
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
                    <div style="width:100%"><?php if(!empty($attachments['photo'])):?>
                    <?php foreach($attachments['photo'] as $key=>$file):?>
                         <li class="search-choice"><span style="cursor: pointer;"><?php echo $file['filename']; ?></span></li>
                      <?php endforeach; ?>
                    <?php endif; ?></div>
                    </div>
                  </td>
                </tr>
                <tr class="even">
                  <td>Documents:</td>
                  <td style="padding-right:0px; margin-right:0px;">
                    <div class="scroll-pane" style="height:72px;">
                      <div style="width:100%"><?php if(!empty($attachments['document'])):?>
                         <?php foreach($attachments['document'] as $key=>$file):?>
                         <li class="search-choice"><span style="cursor: pointer;"><?php echo $file['filename']; ?></span></li>
                         <?php endforeach; ?>
                         <?php endif; ?></div>
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
                    foreach($notifications as $Communication):
                      $class = ($class=='even')? 'odd' : 'even';
                      $style = '';
                      if($Communication['notification_type']=='Admin'):
                        $style =  'style="font-weight:bold"';
                        $Communication['notification_type']= 'Investigator';
                      endif;
                      ?>
                      <tr class="<?=$class;?>" <?php echo $style;?>>
                        <td width="150"><?=$Communication['notification_type'] . ' ('. date('d-m-Y',$Communication['created']) ;?>):</td>
                        <td >
                          <div style="word-wrap:break-word;margin-right: 15px; width:290px"><?= nl2br($Communication['comments'])  ;?></div>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  </table>
                </div>
              </div>
            </div>
          <?php endif; ?>
        </td>
        <td width="3%"><?=$this->Html->image("dot.png",['height'=>'1','width'=>'1']); ?></td>
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
                <td>
                  <span class="floatleft pr10"><?= $case['case_status']?> </span>
                  <span class="statusicon" style="padding:2px 0 0;">
                    <?=$this->Html->image($caseIcons[$case['case_status_id']], [
                      "alt" => $case['case_status'],
                      "value" => $case['case_status_id'],
                      "id" => $case['id'],
                      "class" => 'chage_stateus',
                      "style" => 'cursor:pointer'
                    ]); ?>                  
                  </span>
                </td>
              </tr>
              <tr class="even">
                <td>Contact Methods:</td>
                <td >
                  <?php 
                  $ContactMethods = array();
                  if ( $case['subject_communication_email'] == 1) {
                    $ContactMethods[] = 'Email';
                  }
                  if ( $case['subject_communication_messenger'] == 1) {
                    $ContactMethods[] = 'Messenger';
                  }
                  if ( $case['subject_communication_phone'] == 1) {
                    $ContactMethods[] = 'Phone';
                  }
                  if ( $case['subject_communication_webcam'] == 1) {
                    $ContactMethods[] = 'Webcam';
                  }
                  if ( $case['subject_communication_inperson'] == 1) {
                    $ContactMethods[] = 'In  Person';
                  }
                  echo $m = implode(', ', $ContactMethods);
                  ?>
                </td>
              </tr>
              <tr class="odd">
                <td>Subject's Name:</td>
                <td><?= $case['subject_fullname'] ?></td>
              </tr>
              <tr class="even">
                <td>Subject's Alias:</td>
                <td><?= $case['subject_alias'] ?></td>
              </tr>
              <tr class="odd">
                <td>Subject's Email:<br />
                </td>
                <td><?= $case['subject_email'] ?></td>
              </tr>
              <tr class="even">
                <td>Subject's DOB:</td>
                <td><?=($case['subject_dob']==0) ? 'Not Provided' : date('d-M-Y',$case['subject_dob']) ?></td>
              </tr>
              <tr class="odd">
                <td>Subject's Phone:</td>
                <td><?= $case['subject_phone'] ?></td>
              </tr>
              <tr class="even">
                <td>Address:</td>
                <td><?= $case['subject_address'] ?></td>
              </tr>
              <tr class="odd">
                <td>Employment:</td>
                <td><?= $case['subject_employment'] ?></td>
              </tr>
              <tr class="even">
                <td>Education:</td>
                <td><?= $case['subject_education'] ?></td>
              </tr>
              <tr class="odd">
                <td>Background:</td>
                <td style="padding-right:0px; margin-right:0px;">
                  <div class="scroll-pane">
                    <div style="width:100%"><?= $case['subject_background'] ?></div>
                  </div>
                </td>
              </tr>
              <tr class="even">
                <td>Any ID or documents?</td>
                <td><?= $case['subject_id'] ?></td>
              </tr>
              <tr class="odd">
                <td>How long have you known?</td>
                <td><?= $case['subject_how_long'] ?></td>
              </tr>
              <tr class="even">
                <td>Met on which website?</td>
                <td><?= $case['subject_website_met'] ?></td>
              </tr>
              <tr class="odd">
                <td>Sent anything to address?</td>
                <td><?= $case['subject_sent_address'] ?></td>
              </tr>
            </table>
          </div>
          <?php if(!empty($quote)): ?>
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
                      <div style="width:100%"><?php //TO DO Pictures    ?></div>
                    </div>
                  </td>
                </tr>
                <tr class="even">
                  <td>Documents:</td>
                  <td style="padding-right:0px; margin-right:0px;">
                    <div class="scroll-pane" style="height:72px;">
                      <div style="width:100%"><?php //TO DO Documents    ?></div>
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
                    foreach($notifications as $Communication):
                      $class = ($class=='even')? 'odd' : 'even';
                      $style = '';
                      if($Communication['notification_type']=='Admin'):
                        $style =  'style="font-weight:bold"';
                        $Communication['notification_type']= 'Investigator';
                      endif;
                      ?>
                      <tr class="<?=$class;?>" <?php echo $style;?>>
                        <td width="150"><?=$Communication['notification_type'] . ' ('. date('d-m-Y',$Communication['created']) ;?>):</td>
                        <td >
                          <div style="word-wrap:break-word;margin-right: 15px; width:290px"><?= nl2br($Communication['comments'])  ;?></div>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  </table>
                </div>
              </div>
            </div>
          <?php endif; ?>
        </td>
      </tr>
    </table>
  </div>
  <div class="divfull pt15">
    <div class="floatright" id="floatright_btns">
      <?php if(!$disabled): ?>
        <div class="floatleft pr10" id="notify_client_btn">
          <div class="btnlt"></div>
          <div class="btnmid"><?php echo $this->Html->link( 'Notify Client',array('controller'=>'cases','action'=> 'notify_client','admin'=>true,$id),array('id'=>'notify_client'));?></div>
          <div class="btnrt"></div>
        </div>
      <?php endif; ?>
      <div class="floatleft pr10">
        <div class="btnlt"></div>
        <div class="btnmid"><?php echo $this->Html->link( 'Email Case',array('controller'=>'cases','action'=> 'caseemail','admin'=>true,$id),array('id'=>'email_case'));?></div>
        <div class="btnrt"></div>
      </div>
      <div class="floatleft pr10">
        <div class="btnlt"></div>
        <div class="btnmid"> <?php echo $this->Html->link( 'Edit Case',array('controller'=>'Admin','action'=> 'caseedit','admin'=>true,$id),array('id'=>'edit_case'));?></div>
        <div class="btnrt"></div>
      </div>
      <div class="floatleft pr10">
        <div class="btnlt"></div>
        <div class="btnmid"><?php echo $this->Html->link( 'Case Status',array('controller'=>'admin','action'=> 'casetracker',/*'admin'=>true,*/$id),array('id'=>'status_case'));?></div>
        <div class="btnrt"></div>
      </div>
      <div class="floatleft pr10">
        <div class="btnlt"></div>
        <div class="btnmid">
          <?php         echo $this->Html->link( 'Export Case','/client/admin/casenotes2/'.$id,array('id'=>'export_case','style'=>'color:#FFFFFF'));?>
        </div>
        <div class="btnrt"></div>
      </div>
                    <div class="floatleft pr10"<?php if(!$disabled){ ?> style="display:none" <?php } ?> id="unlockbtndiv">
        <div class="btnlt"></div>
        <div class="btnmid">
          <?php 
          if($role=='Administrator'){
                    echo $this->Html->link( $this->Html->image('unlock.png',array('style'=>'vertical-align: text-bottom;')).'&nbsp;&nbsp;Unlock Case',array('plugin'=>'cases','controller'=>'cases','action'=> 'unlocked','admin'=>true,$id),array('escape'=>false,'id'=>'export_case1','style'=>'color:#FFFFFF'));
          } else {
                    echo $this->Html->link( $this->Html->image('unlock.png',array('style'=>'vertical-align: text-bottom;')).'&nbsp;&nbsp;Unlock Case','javascript:void(0);',array('escape'=>false,'id'=>'export_case1','style'=>'color:#FFFFFF'));
          }
          ?>                  
        </div>
        <div class="btnrt"></div>
      </div>
    </div>
  </div>
  <?=$this->Form->create('casenotes',['class'=>'form-inline','id'=>'CaseTableAdminCasenotesForm']);?>
  <input type="hidden" id="CaseTableNotification" value="" name="Cases[notification]" />
<input type="hidden" name="Cases[notification_type]" id="CaseTableNotificationType" value="Investigator" />
<input type="hidden" name="Cases[case_status]"  value="<?php echo $case['case_status']; ?>" />
<input type="hidden" name="Cases[case_status_id]"  value="<?php echo $case['case_status_id']; ?>" />

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
                    <?php $class = 'even'; foreach($notes as $InvestigatorNote): $class = ($class=='even')? 'odd' : 'even'; ?>
                    <tr class="<?php echo $class;?>" >
                      <td width="150"><?=$userList[$InvestigatorNote['user_id']];?>: (<?=date('d-m-Y',$InvestigatorNote['created']);?>):</td>
                      <td><?=nl2br($InvestigatorNote['case_notes'])  ;?> </td>
                    </tr>
                  <?php endforeach; ?>
                </table>
              </div>
            </div>
          </div>
        </div>
        <div class="floatleft pd20">
          <div class="pl20"><?= $this->Form->textarea($model.'.notes',array('class'=>'wid345 floatleft', 'rows'=>6,'disabled'=>$disabled));?><br />
            <small  style="color:#FF0000;"><?php echo $this->Form->error($model.'.notes');?> </small></div>
            <div class="clr"></div>
            <div class="floatright pt15">
              <div class="btnlt"></div>
              <div class="btnmid" ><a href="#"  <?php if($disabled==false){ ?>id="investigator_notes"  <?php } ?>>Save</a></div>
              <div class="btnrt"></div>
            </div>
          </div>
          <div class="clr"></div>
        </div>
        <?php $this->Form->end(); ?>
      </td>
    </tr>
  </table>
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
           <input type="text" class="wid243" placeholder="Enter Email Address" value="" id="email_address">
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
       <div class="btnmid"><a href="javascript:void(0);" style="color:#FFFFFF" id="send_email">Email Case</a></div>
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
      <div class="btnmid"><?php echo $this->Html->link( 'Yes',array('controller'=>'cases','action'=> 'unlocked','admin'=>true,$id),array('id'=>'export_case_lnk','style'=>'color:#FFFFFF'));?></div>
      <div class="btnrt" style="padding-right:2px;"></div>
      <div class="btnlt"></div>
      <div class="btnmid"><?php echo $this->Html->link( 'No',array(),array('id'=>'close_dialog','style'=>'color:#FFFFFF'));?></div>
      <div class="btnrt"></div>
    </div>
  <?php } else {
    echo 'You do not have access to unlock this case.'; 
  } ?>
</div>
<div id="export_case_dialog" title="Case Locked" >
  <div style="color: #535353;font-family: Arial,Helvetica,sans-serif;font-size: 12px;padding:5px;">
    <div style="text-align:justify;">
      <?php if($disabled) { echo 'The case has been locked, you cannnot change anything.'; 
      if($role=='Administrator'){ 
        echo 'To unlock this case click on "<b>Unlock Case</b>" button.'; 
      } 
    } else {
      echo 'This case will be locked and notes page will no longer be editable.';
    } ?>
    <br>
    <br>
  </div>
  <div class="floatright pt15" id="floatrightbtn">
    <?php if($disabled) {
    } else { ?>
      <div class="btnlt"></div>
      <div class="btnmid"><?php echo $this->Html->link( 'Export Case','/client/admin/export/'.$id,array('id'=>'export_case_lnk','style'=>'color:#FFFFFF'));?></div>
      <div class="btnrt"></div>
    <?php }?>
  </div>
</div>
</div>

<div id="notify_client_dialog" title="Notify Client"  style="display:none;">
  <div class="floatleft pd20">
    <div class="pl20">
    <textarea class="wid345 floatleft"  rows="16" id="CaseTableNotification1"></textarea>

    <?php //echo $form->textarea($model.'.notification1',array('class'=>'wid345 floatleft', 'rows'=>16));?><br />
      <small  style="color:#FF0000;"><?php //echo $form->error($model.'.notification');?> </small></div>
    <div class="floatright pt15">
      <div class="btnlt"></div>
      <div class="btnmid"><a href="javascript:void(0);"  style="color:#FFFFFF" id="save_notify">Send</a></div>
      <div class="btnrt"></div>
    </div>
  </div>
</div>