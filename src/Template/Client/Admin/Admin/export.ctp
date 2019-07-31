<?php
header("Cache-Control: ");// leave blank to avoid IE errors
header("Pragma: ");// leave blank to avoid IE errors
header("Content-type: application/octet-stream");		
header("content-disposition: attachment;filename=Notes-" . str_replace(" ",'-',$result['User']['lname']) . ".doc");/**/

$photoes = glob ($directory.$id."_photo/*");
$documents = glob ($directory.$id."_document/*");


$base_url ='http://' . $_SERVER['SERVER_NAME'].'/';
?>
<?php 
$case = $result[$model];
$quote = (isset($result[$model]['quotes'])&&!empty($result[$model]['quotes']))?$result[$model]['quotes'][0]:array();
$notes = $result[$model]['case_notes'];
$notifications = $result[$model]['case_notifications'];
$server = [];
if(!empty($quote)):
  $serverS = str_replace('KHTML,', 'KHTML--', $quote['server_info']);
  $server = explode(',', $serverS);
endif;
$width = (!empty($quote)) ? '1300px' : '950px';
//$autoOpen = ($form->error($model.'.notification')) ? 'true' : 'false';
$email_caseurl = $this->Html->link(array('controller'=>'cases','action'=>'caseemail',$case['id']));

$disabled = true;
if( $case['is_exported']==0 ){
  $disabled = false;
}
$this->Form->create($result,['class'=>'form-inline','id'=>'CaseTableAdminCasenotesForm']);
?>

<input type="hidden" id="caseid" value="<?php echo $case['id']; ?>" />





 <table width="98%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td valign="top">&nbsp;</td>
        </tr>
        <tr>
          <td valign="top" >
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td><img src="<?php echo $base_url.'img/client_info.jpg'; ?>" width="151" /> </td>
              </tr>
              <tr>
                <td>
                  <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border:1px solid #9d9879; font-size:13px; font-family:Arial, Helvetica, sans-serif; color:#000;">
                    <tr>
                      <td width="200" style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px;  vertical-align:top; background-color:#C6D9F1">Case#:</td>
                      <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px;  vertical-align:top"><?php echo $case['id']; ?></td>
                    </tr>
                    <tr>
                      <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top; background-color:#C6D9F1">Login Name:</td>
                      <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top"><?php echo $case['client_login_id']; ?></td>
                    </tr>
                    <tr>
                      <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top; background-color:#C6D9F1">First Name:</td>
                      <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top"><?php echo $case['client_fname']; ?></td>
                    </tr>
                    <tr>
                      <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top; background-color:#C6D9F1">Last Name:</td>
                      <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top"><?php echo $case['client_lname']; ?></td>
                    </tr>
                    <tr>
                      <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top; background-color:#C6D9F1">Site:</td>
                      <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top"><?php echo $case['site_name']; ?></td>
                    </tr>
                    <tr>
                      <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top; background-color:#C6D9F1">Email:</td>
                      <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top"><?php echo $case['client_email']; ?></td>
                    </tr>
                    <tr>
                      <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top; background-color:#C6D9F1">Due Date:</td>
                      <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top"><?php if($case['due_date']=="Pending" || empty($case['due_date'])) echo "Pending"; else echo date('l, F d, Y',$case['due_date']); ?></td>
                    </tr>
                    <tr>
                      <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top; background-color:#C6D9F1">Assigned To:</td>
                      <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top"><?php if(!empty($investor)): ?><?=$investor['fname'].' '.$investor['lname']?><?php endif; ?></td>
                    </tr>
                    
                      <tr>
                      <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top; background-color:#C6D9F1">Service Level:</td>
                      <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top"><?php echo $case['service_level']; ?></td>
                    </tr>
                    <tr>
                      <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top; background-color:#C6D9F1">Discount:</td>
                      <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top">     
                        <?php if(!empty($discount)){ echo $discount; }else{  echo '0';  }  ?></td>
                    </tr>
                      <tr>
                      <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top; background-color:#C6D9F1">Fee:</td>
                      <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top"><?php if(!empty($case['fee'])){ echo '$'.$case['fee'];}else { echo '0'; } ?></td>
                    </tr>
                   
                  </table>
                </td>
              </tr>
              
            </table>
          </td>
        </tr>
        <tr>
          <td valign="top">&nbsp;</td>
        </tr>
        <tr>
          <td valign="top">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td> <img src="<?php echo $base_url.'img/case_data.jpg'; ?>" width="98" height="32" /> </td>
              </tr>
              <tr>
                <td>
                  <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border:1px solid #9d9879; font-size:13px; font-family:Arial, Helvetica, sans-serif; color:#000;">
                    <tr>
                      <td width="200" style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top; background-color:#C6D9F1">Status:</td>
                      <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top"><span class="floatleft pr10"><?= $case['case_status']?> </span><span class="statusicon" style="padding:2px 0 0;"><?=$this->Html->image($caseIcons[$case['case_status_id']], [
                      "alt" => $case['case_status'],
                      "value" => $case['case_status_id'],
                      "id" => $case['id'],
                      "class" => 'chage_stateus',
                      "style" => 'cursor:pointer',
                      "fullBase" => true,
                    ]); ?> </span></td>
                    </tr>
                    <tr>
                      <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top; background-color:#C6D9F1">Contact Methods:</td>
                      <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top">
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
                    <tr>
                      <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top; background-color:#C6D9F1">Subject's Name:</td>
                      <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top"><?= $case['subject_fullname'] ?></td>
                    </tr>
                    <tr>
                      <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top; background-color:#C6D9F1">Subject's Alias:</td>
                      <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top"><?= $case['subject_alias'] ?></td>
                    </tr>
                    <tr>
                      <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top; background-color:#C6D9F1">Subject's Email:</td>
                      <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top"><?= $case['subject_email'] ?></td>
                    </tr>
                    <tr>
                      <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top; background-color:#C6D9F1">Subject's DOB:</td>
                      <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top">
                      <?=($case['subject_dob']==0) ? 'Not Provided' : date('d-M-Y',$case['subject_dob']) ?>
                      </td>
                    </tr>
                    <tr>
                      <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top; background-color:#C6D9F1">Subject's Phone:</td>
                      <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top">
                      <?= $case['subject_phone'] ?>
                     </td>
                    </tr>
                    <tr>
                      <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top; background-color:#C6D9F1">Subject's Address:</td>
                      <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top">
                        <?= $case['subject_address'] ?>
                      </td>
                    </tr>
                    <tr>
                      <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top; background-color:#C6D9F1">Subject's Employment:</td>
                      <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top">
                      <?= $case['subject_employment'] ?>
                      </td>
                    </tr>
                    <tr>
                      <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top; background-color:#C6D9F1">Subject's Education:</td>
                      <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top">
                        <?= $case['subject_education'] ?>
                      </td>
                    </tr>
                    <tr>
                      <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top; background-color:#C6D9F1">Subject's Background:</td>
                      <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top">
                        <div style="width:400px; word-wrap:break-word;"></div>
                       <?= $case['subject_background'] ?> 
                      </td>
                    </tr>
                    <tr>
                      <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top; background-color:#C6D9F1">Any ID or documents?</td>
                      <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top">
                       <?= $case['subject_id'] ?> 
                      </td>
                    </tr>
                    <tr>
                      <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top; background-color:#C6D9F1">How long have you known?</td>
                      <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top">
                        <?= $case['subject_how_long'] ?>
                      </td>
                    </tr>
                    <tr>
                      <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top; background-color:#C6D9F1">Met on which website?</td>
                      <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top">
                        <?= $case['subject_website_met'] ?>
                      </td>
                    </tr>
                    <tr>
                      <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top; background-color:#C6D9F1">Sent anything to address?</td>
                      <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top">
                        <?= $case['subject_sent_address'] ?>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
              <tr>
                <td>&nbsp;</td>
              </tr>

              <?php if(!empty($quote)): ?>
                            <tr>
                <td> <img src="<?php echo $base_url.'img/quote.jpg'; ?>" width="98"  />  </td>
              </tr>
              <tr>
                <td>
                  <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border:1px solid #9d9879; font-size:13px; font-family:Arial, Helvetica, sans-serif; color:#000;">
                    <tr>
                      <td width="200" style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top; background-color:#C6D9F1">First Name:</td>
                      <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top"><?php echo @$quote['first_name']; ?> </td>
                    </tr>
                    <tr>
                      <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top; background-color:#C6D9F1">Last Name:</td>
                      <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top"> <?php echo @$quote['last_name']; ?></td>
                    </tr>
                    <tr>
                      <td width="200" style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top; background-color:#C6D9F1">Phone:</td>
                      <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top"><?php echo @$quote['phone']; ?> </td>
                    </tr>
                    <tr>
                      <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top; background-color:#C6D9F1">City, State:</td>
                      <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top"><?php echo @$quote['city']; ?> </td>
                    </tr>
                    <tr>
                      <td width="200" style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top; background-color:#C6D9F1">Country:</td>
                      <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top"><?php echo @$quote['country']; ?> </td>
                    </tr>
                    <tr>
                      <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top; background-color:#C6D9F1">Site:</td>
                      <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top"> <?php echo @$quote['site']; ?> </td>
                    </tr>
                    <tr>
                      <td width="200" style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top; background-color:#C6D9F1">Referral Type:</td>
                      <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top"><?php echo @$quote['referral']; ?> </td>
                    </tr>
                    <tr>
                      <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top; background-color:#C6D9F1">Fraud:</td>
                      <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top"> Not <?php echo @$quote['fraud']; ?> </td>
                    </tr>
                    <tr>
                      <td width="200" style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top; background-color:#C6D9F1">Infidelity:</td>
                      <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top"><?php echo @$quote['infidelity']; ?> </td>
                    </tr>
                    <tr>
                      <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top; background-color:#C6D9F1">Finacial Loss:</td>
                      <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top"> <?php echo @$quote['loss']; ?> </td>
                    </tr>
                    <?php if(count($server)): $cls = 'even'; foreach($server as $key=>$info): $data = explode('=', $info); $cls = ($cls=='odd')?'even':'odd'; ?>
                        <tr class="<?= $cls ?>">
                            <td  width="200" style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top; background-color:#C6D9F1"><?= @$data[0] ?>:</td>
                            <td  style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top"><?= @str_replace('KHTML--', 'KHTML,', $data[1]) ?></td>
                        </tr>
                    <?php endforeach; endif; ?>

                    
                    <tr>
                      <td width="200" style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top; background-color:#C6D9F1">Description:</td>
                      <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top">
                        <div style="width:400px; word-wrap:break-word;"><?php echo @$quote['description'];  ?> </div>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
              <tr>
                <td>&nbsp;</td>
              </tr>
                        <?php endif; ?>           
            
    
              <tr>
                <td>
                <img src="<?php echo $base_url.'img/attachments.jpg'; ?>" width="114" /> </td>
              </tr>
              <tr>
                <td>
                  <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border:1px solid #9d9879; font-size:13px; font-family:Arial, Helvetica, sans-serif; color:#000;">
                    <tr>
                      <td width="200" style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top; background-color:#C6D9F1">Pictures:</td>
                      <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top">
                                          
                                          <?php if(count($photoes)): ?>
                                          <ul>
                          <?php foreach($photoes as $pic): ?>
                          <li>
                            <?php $filearr = explode('/', $pic); ?>
                          <?php echo end($filearr); ?>
                          </li>
                        <?php endforeach; ?>
                            </ul>
                                            <?php endif; ?>
                                          
                                              </td>
                    </tr>
                    <tr>
                      <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top; background-color:#C6D9F1">Documents:</td>
                      <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top">
                      <?php if(count($documents)): ?>
                                          <ul>
                          <?php foreach($documents as $pic): ?>
                          <li>
                            <?php $filearr = explode('/', $pic); ?>
                          <?php echo end($filearr); ?>
                          </li>
                        <?php endforeach; ?>
                            </ul>
                                            <?php endif; ?>
                                     </td>
                    </tr>
                  </table>
                </td>
              </tr>
             
           
          <?php if(!empty($result['Communication'])){?>
              <tr>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td><img src="<?php echo $base_url.'img/communication.jpg'; ?>" width="151" /></td>
              </tr>
              <tr>
                <td valign="top">
                  <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border:1px solid #9d9879; font-size:13px; font-family:Arial, Helvetica, sans-serif; color:#000;">
                    <?php 
          $class = 'even';
          foreach($result['Communication'] as $Communication){
            $class = ($class=='even')? 'odd' : 'even';
            $style = ($Communication['notification_type']=='Admin')? 'style="font-weight:bold"' : '';
            if($Communication['notification_type']=='Admin'){
              $Communication['notification_type'] = 'Investigator';
            
            }
            if($class=='even'){
        ?>
                    <tr class="<?php //echo $class;?>" <?php echo $style;?>>
                      <td  width="200" style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top; background-color:#C6D9F1"><?php echo $Communication['notification_type'] . '('. date('d-m-Y',$Communication['created']) ;?>):</td>
                      <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top" >
                        <div style="width:200px; word-wrap:break-word;"><?php echo nl2br($Communication['comments'])  ;?></div>
                      </td>
                    </tr>
                    <?php 
            }else{ ?>
                    <tr class="<?php //echo $class;?>" <?php echo $style;?>>
                      <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top; background-color:#C6D9F1"><?php echo $Communication['notification_type'] . '('. date('d-m-Y',$Communication['created']) ;?>):</td>
                      <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top" >
                        <div style="width:200px; word-wrap:break-word;"><?php echo nl2br($Communication['comments'])  ;?></div>
                      </td>
                    </tr>
                    <?php
              
              }
    } ?>
                  </table>
                </td>
              </tr>
              <?php } ?>
    
            </table>
          </td>
        </tr>
       
        <tr>
          <td valign="top">&nbsp;</td>
        </tr>
        <?php if(!empty($result['InvestigatorNote'])){?>
        <tr>
          <td valign="top"><img src="<?php echo $base_url.'img/investigator_notes.jpg'; ?>" width="151" /></td>
        </tr>
        <tr>
          <td  valign="top">
            <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border:1px solid #9d9879; font-size:13px; font-family:Arial, Helvetica, sans-serif; color:#000;">
              <?php 
          $class = 'even';
          foreach($result['InvestigatorNote'] as $InvestigatorNote){
            $class = ($class=='even')? 'odd' : 'even';
        if($class=='even'){   
        ?>
              <tr class="<?php echo $class;?>" >
                <td  width="200" style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top; background-color:#C6D9F1"><?php echo $InvestigatorNote['created_by'];?>: (<?php echo  date('d-m-Y',$InvestigatorNote['created']);?>):</td>
                <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top">
                  <div style="width:400px; word-wrap:break-word;"><?php echo nl2br($InvestigatorNote['comments'])  ;?></div>
                </td>
              </tr>
              <?php 
        }else{?>
              <tr class="<?php echo $class;?>" >
                <td  width="200" style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top; background-color:#C6D9F1"><?php echo $InvestigatorNote['created_by'];?>: (<?php echo  date('d-m-Y',$InvestigatorNote['created']);?>):</td>
                <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top">
                  <div style="width:400px; word-wrap:break-word;"><?php echo nl2br($InvestigatorNote['comments'])  ;?> </div>
                </td>
              </tr>
              <?php }
     
     } ?>
            </table>
          </td>
        </tr>
        <?php } ?>
         
        <tr>
          <td valign="top">&nbsp;</td>
        </tr>
      </table>
    </td>
  </tr>
</table>        
           



            <!-- </table>
          </td>
        </tr>
       
        <tr>
          <td valign="top">&nbsp;</td>
        </tr>
                 
        <tr>
          <td valign="top">&nbsp;</td>
        </tr>
      </table> -->