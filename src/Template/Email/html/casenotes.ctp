<?php 
$model = $result['model'];
$id = $result['id'];
$caseIcons = $result['caseIcons'];
$case = $result[$model];
$quote = (isset($result[$model]['quotes'])&&!empty($result[$model]['quotes']))?$result[$model]['quotes'][0]:array();
$notes = $result[$model]['case_notes'];
$notifications = $result[$model]['case_notifications'];
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
<div class="divfull pt15">
  <table width="50%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td valign="top" width="47%">
        <div>
          <div class="bxheadlt"></div>
          <div class="bxheadmid" style="background:#bfb9b9;float: left;line-height: 32px;
     font-size: 12px;
    font-weight: 700;
    color: #464330;
    position: relative;
    text-transform: uppercase;
    padding: 0 10px;border-top: 1px solid #ffffff;;">Client: <?php echo $case['client_fname'].' '.$case['client_lname']; ?> </div>
          <div class="bxheadrt"></div>
          <div class="clr"></div>
        </div>
        <div class="gridbxover1">
          <table width="100%"  cellspacing="0" cellpadding="0" class="tblcaselist">
          <tr class="odd">
              <td width="150" style="padding-left:5px;background-color:#c6d9f1;border-bottom: 1px solid #e8e8e8;border-top: 4px solid #ffffff;">Case#:</td>
              <td style="padding-left:5px;"><?php echo $case['id']; ?></td>
            </tr>
            <tr class="even">
              <td style="padding-left:5px;background-color:#c6d9f1;border-bottom: 1px solid #e8e8e8;">Login Name:</td>
              <td style="padding-left:5px;"><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="b3f1dcdcd1d6d2c1d1d9f3d2dcdf9dd0dcde"><?php echo $case['client_login_id']; ?></a> </td>
            </tr>
            <tr class="odd">
              <td style="padding-left:5px;background-color:#c6d9f1;border-bottom: 1px solid #e8e8e8;">First Name:</td>
              <td style="padding-left:5px;"><?php echo $case['client_fname']; ?></td>
            </tr>
            <tr class="even">
              <td style="padding-left:5px;background-color:#c6d9f1;border-bottom: 1px solid #e8e8e8;">Last Name:</td>
              <td style="padding-left:5px;"><?php echo $case['client_lname']; ?></td>
            </tr>
            <tr class="odd">
              <td style="padding-left:5px;background-color:#c6d9f1;border-bottom: 1px solid #e8e8e8;">Site:</td>
              <td style="padding-left:5px;"><?php echo $case['site_name']; ?></td>
            </tr>
            <tr class="even">
              <td style="padding-left:5px;background-color:#c6d9f1;border-bottom: 1px solid #e8e8e8;">Email</td>
              <td style="padding-left:5px;"><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="a8eac7c7cacdc9dacac2e8c9c7c486cbc7c5"><?php echo $case['client_email']; ?></a> </td>
            </tr>
            <tr class="odd">
              <td style="padding-left:5px;background-color:#c6d9f1;border-bottom: 1px solid #e8e8e8;">Due Date:</td>
              <td style="padding-left:5px;"><?php if($case['due_date']=="Pending") echo "Pending"; else echo date('Y-m-d',$case['due_date']); ?> </td>
            </tr>
            <tr class="even">
              <td style="padding-left:5px;background-color:#c6d9f1;border-bottom: 1px solid #e8e8e8;">Assigned To:</td>
              <td style="padding-left:5px;"></td>
            </tr>
          </table>
        </div>
        <?php if(!empty($quote)): ?>
        <div class="pt15">
            <div class="bxheadlt"></div>
            <div class="bxheadmid" style="background:#bfb9b9;float: left;line-height: 32px;
     font-size: 12px;
    font-weight: 700;
    color: #464330;
    position: relative;
    text-transform: uppercase;
    padding: 0 10px; border-top: 5px solid #ffffff;;"><?= (strtolower($quote['quote_title'])=='contactus')? 'Contact us':$quote['quote_title'] ?></div>
            <div class="bxheadrt"></div>
            <div class="clr"></div>
        
        </div> 
        <div class="gridbxover1">
            <table width="100%" border="0" cellspacing="0" cellpadding="0" class="tblcaselist">
            <tr class="odd">
                <td  style="padding-left:5px;background-color:#c6d9f1;border-bottom: 1px solid #e8e8e8;border-top: 4px solid #ffffff;" width="150">First Name:</td>
                <td style="padding-left:5px;"><?= $quote['first_name'] ?></td>
              </tr>
              <tr class="even">
                <td style="padding-left:5px;background-color:#c6d9f1;border-bottom: 1px solid #e8e8e8;">Last Name:</td>
                <td style="padding-left:5px;"><?= $quote['last_name'] ?></td>
              </tr>
              <tr class="odd">
                <td style="padding-left:5px;background-color:#c6d9f1;border-bottom: 1px solid #e8e8e8;">Phone:</td>
                <td style="padding-left:5px;"><?= $quote['phone'] ?></td>
              </tr>
              <tr class="even">
                <td style="padding-left:5px;background-color:#c6d9f1;border-bottom: 1px solid #e8e8e8;">City, State:</td>
                <td style="padding-left:5px;"><?= $quote['city'] ?><?= ($quote['state'])?','.$quote['state']:'' ?></td>
              </tr>
              <tr class="odd">
                <td style="padding-left:5px;background-color:#c6d9f1;border-bottom: 1px solid #e8e8e8;">Country:</td>
                <td style="padding-left:5px;"><?= $quote['country'] ?></td>
              </tr>
              <tr class="even">
                <td style="padding-left:5px;background-color:#c6d9f1;border-bottom: 1px solid #e8e8e8;">Site:</td>
                <td style="padding-left:5px;"><?= $quote['site'] ?></td>
              </tr>
              <tr class="odd">
                <td style="padding-left:5px;background-color:#c6d9f1;border-bottom: 1px solid #e8e8e8;">Referral Type:<br />
                </td>
                <td style="padding-left:5px;"><?= $quote['referral'] ?></td>
              </tr>
              <tr class="even">
                <td style="padding-left:5px;background-color:#c6d9f1;border-bottom: 1px solid #e8e8e8;">Fraud:</td>
                <td style="padding-left:5px;"><?= $quote['fraud'] ?></td>
              </tr>
              <tr class="odd">
                <td style="padding-left:5px;background-color:#c6d9f1;border-bottom: 1px solid #e8e8e8;">Infidelity:</td>
                <td style="padding-left:5px;"><?= $quote['infidelity'] ?></td>
              </tr>
              <tr class="even">
                <td style="padding-left:5px;background-color:#c6d9f1;border-bottom: 1px solid #e8e8e8;">Finacial Loss:</td>
                <td style="padding-left:5px;"><?= $quote['loss'] ?></td>
              </tr>
              <?php if(count($server)): $cls = 'even'; foreach($server as $key=>$info): $data = explode('=', $info); $cls = ($cls=='odd')?'even':'odd'; ?>
                <tr class="<?= $cls ?>">
                  <td style="padding-left:5px;background-color:#c6d9f1;border-bottom: 1px solid #e8e8e8;"><?= @$data[0] ?>:</td>
                  <td style="padding-left:5px;"><?= @str_replace('KHTML--', 'KHTML,', $data[1]) ?></td>
                </tr>
              <?php endforeach; endif; ?>
              <tr class="odd">
                <td style="padding-left:5px;background-color:#c6d9f1;border-bottom: 1px solid #e8e8e8;">Description:</td>
                <td style="padding-left:5px;">
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
          <?php endif; ?>
          <div>
            <div class="bxheadlt"></div>
            <div class="bxheadmid" style="background:#bfb9b9;float: left;line-height: 32px;
     font-size: 12px;
    font-weight: 700;
    color: #464330;
    position: relative;
    text-transform: uppercase;
    padding: 0 10px; border-top: 5px solid #ffffff;;">Case Data</div>
            <div class="bxheadrt"></div>
            <div class="clr"></div>
          </div>
          <div class="gridbxover1">
            <table width="100%" border="0" cellspacing="0" cellpadding="0" class="tblcaselist">
            <tr class="odd">
                <td style="padding-left:5px;background-color:#c6d9f1;border-bottom: 1px solid #e8e8e8;border-top: 4px solid #ffffff;" width="150">Status:</td>
                <td style="padding-left:5px;">
                  <span class="floatleft pr10"><?= $case['case_status']?> </span>
                  <span class="statusicon" style="padding:2px 0 0;">



                    
                  <img src="<?php echo WEBSITE_URL.'img/'.$caseIcons[$case['case_status_id']];  ?>" alt="<?php echo $case['case_status']; ?>"
                            class="chage_stateus" style="cursor:pointer" id="<?php echo $case['id']; ?>" value="<?php echo $case['case_status_id']; ?>" />
                                      
                  </span>
                </td>
              </tr>
              <tr class="even">
                <td style="padding-left:5px;background-color:#c6d9f1;border-bottom: 1px solid #e8e8e8; ">Contact Methods:</td>
                <td style="padding-left:5px;">
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
                <td style="padding-left:5px;background-color:#c6d9f1;border-bottom: 1px solid #e8e8e8;">Subject's Name:</td>
                <td style="padding-left:5px;"><?= $case['subject_fullname'] ?></td>
              </tr>
              <tr class="even">
                <td style="padding-left:5px;background-color:#c6d9f1;border-bottom: 1px solid #e8e8e8;">Subject's Alias:</td>
                <td style="padding-left:5px;"><?= $case['subject_alias'] ?></td>
              </tr>
              <tr class="odd">
                <td style="padding-left:5px;background-color:#c6d9f1;border-bottom: 1px solid #e8e8e8;">Subject's Email:<br />
                </td>
                <td style="padding-left:5px;"><?= $case['subject_email'] ?></td>
              </tr>
              <tr class="even">
                <td style="padding-left:5px;background-color:#c6d9f1;border-bottom: 1px solid #e8e8e8;">Subject's DOB:</td>
                <td style="padding-left:5px;"><?=($case['subject_dob']==0) ? 'Not Provided' : date('d-M-Y',$case['subject_dob']) ?></td>
              </tr>
              <tr class="odd">
                <td style="padding-left:5px;background-color:#c6d9f1;border-bottom: 1px solid #e8e8e8;">Subject's Phone:</td>
                <td style="padding-left:5px;"><?= $case['subject_phone'] ?></td>
              </tr>
              <tr class="even">
                <td style="padding-left:5px;background-color:#c6d9f1;border-bottom: 1px solid #e8e8e8;">Address:</td>
                <td style="padding-left:5px;"><?= $case['subject_address'] ?></td>
              </tr>
              <tr class="odd">
                <td style="padding-left:5px;background-color:#c6d9f1;border-bottom: 1px solid #e8e8e8;">Employment:</td>
                <td style="padding-left:5px;"><?= $case['subject_employment'] ?></td>
              </tr>
              <tr class="even">
                <td style="padding-left:5px;background-color:#c6d9f1;border-bottom: 1px solid #e8e8e8;">Education:</td>
                <td style="padding-left:5px;"><?= $case['subject_education'] ?></td>
              </tr>
              <tr class="odd">
                <td style="padding-left:5px;background-color:#c6d9f1;border-bottom: 1px solid #e8e8e8;">Background:</td>
                <td style="padding-left:5px;">
                  <div class="scroll-pane">
                    <div style="width:100%"><?= $case['subject_background'] ?></div>
                  </div>
                </td>
              </tr>
              <tr class="even">
                <td style="padding-left:5px;background-color:#c6d9f1;border-bottom: 1px solid #e8e8e8;">Any ID or documents?</td>
                <td style="padding-left:5px;"><?= $case['subject_id'] ?></td>
              </tr>
              <tr class="odd">
                <td style="padding-left:5px;background-color:#c6d9f1;border-bottom: 1px solid #e8e8e8;">How long have you known?</td>
                <td style="padding-left:5px;"><?= $case['subject_how_long'] ?></td>
              </tr>
              <tr class="even">
                <td style="padding-left:5px;background-color:#c6d9f1;border-bottom: 1px solid #e8e8e8;">Met on which website?</td>
                <td style="padding-left:5px;"><?= $case['subject_website_met'] ?></td>
              </tr>
              <tr class="odd">
                <td style="padding-left:5px;background-color:#c6d9f1;border-bottom: 1px solid #e8e8e8;">Sent anything to address?</td>
                <td style="padding-left:5px;"><?= $case['subject_sent_address'] ?></td>
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
      
      <div class="floatleft pr10"<?php if(!$disabled)?> style="display:none" id="unlockbtndiv">
        <div class="btnlt"></div>
        <div class="btnmid">
          <?php 
          if($role=='Administrator'){
                    //echo $this->Html->link( $this->Html->image('unlock.png',array('style'=>'vertical-align: text-bottom;')).'&nbsp;&nbsp;Unlock Case',array('plugin'=>'cases','controller'=>'cases','action'=> 'unlocked','admin'=>true,$id),array('escape'=>false,'id'=>'export_case1','style'=>'color:#FFFFFF'));
          } else {
                    //echo $this->Html->link( $this->Html->image('unlock.png',array('style'=>'vertical-align: text-bottom;')).'&nbsp;&nbsp;Unlock Case','javascript:void(0);',array('escape'=>false,'id'=>'export_case1','style'=>'color:#FFFFFF'));
          }
          ?>                  
        </div>
        <div class="btnrt"></div>
      </div>
    </div>
  </div>
  <div class="divfull pt15">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td valign="top" >
          <div>
          <br/><br/><br/><br/><br/><br/><br/>
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
                    <?php $class = 'even'; foreach($notifications as $InvestigatorNote): $class = ($class=='even')? 'odd' : 'even'; if($Communication['notification_type']=='Investigator'): ?>
                    <tr class="<?php echo $class;?>" >
                      <td width="150"><?php echo $InvestigatorNote['created_by'];?>: (<?php echo  date('d-m-Y',$InvestigatorNote['created']);?>):</td>
                      <td><?php echo nl2br($InvestigatorNote['comments'])  ;?> </td>
                    </tr>
                  <?php endif; endforeach; ?>
                </table>
              </div>
            </div>
          </div>
        </div>
        <div class="floatleft pd20">
          <br/>
            <small  style="color:#FF0000;"><?php echo $this->Form->error($model.'.notes');?> </small></div>
            <div class="clr"></div>
            <div class="floatright pt15">
              <div class="btnlt"></div>
              
              <div class="btnrt"></div>
            </div>
          </div>
          <div class="clr"></div>
        </div>
      </td>
    </tr>
  </table>
</div>
<?php $this->Form->end(); ?>