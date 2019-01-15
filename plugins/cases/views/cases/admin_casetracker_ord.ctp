<?php 

//echo $javascript->link(array('jquery.stylish-select.js','fancybox/jquery.fancybox-1.3.4.pack.js','jquery.easing.1.3.js','jquery.mousewheel.min.js','jquery.jscrollpane.min.js'),false); 

//echo $this->Html->css(array('jquery.jscrollpane','fancybox/jquery.fancybox-1.3.4'),'stylesheet', array('inline' => false ) ); 

echo $javascript->codeBlock('function formatTitle(title, currentArray, currentIndex, currentOpts) {  return "<div id=\"tip7-title\"><span><a href=\"javascript:;\" onclick=\"$.fancybox.close();\">'. addslashes($this->Html->Image('fancybox/cross.png')).'</a></span>'.  addslashes( $this->Html->Image('fancybox/casenotes_head.png') ) .'</div>";}
 $(document).ready(function () {var fees = ' . json_encode(Configure::read('case_fees')) . ';var discount = ' . json_encode(Configure::read('discount')) . ';
$(".select").sSelect({ ddMaxHeight: "300px" });$("#due_date").datepicker({dateFormat:"D, MM dd", onSelect: function(dateText) {var date = $("#due_date").datepicker("getDate");d = date.getDate(); m = date.getMonth() + 1; y = date.getFullYear(); $("#due_date1").val(d+"-"+m+"-"+y); }});$("#CaseTableServiceLevel, #CaseTableDiscount").change(function(){var f = fees[$("#CaseTableServiceLevel").val()];var d = discount[$("#CaseTableDiscount").val()];f = typeof f =="undefined" ? 0 : f;d = typeof d =="undefined" ? 0 : d;var fee = (f - (f*d)/100);$("#fee").val(fee); });$(".lightbox").fancybox({"transitionIn"		: "elastic","transitionOut"		: "elastic",				"titlePosition" 		: "outside","width"				: "80%",				"height"			: "200%",				"titleFormat"		: formatTitle,				"onStart"		: function() {						$("#fancybox-outer").hide();					},				"onComplete"		: function() {						$("#fancybox-outer").show();					}								});		  $("#update_case").click(function(e){		 	$("#CaseTableAdminCasetrackerForm").submit();		  e.preventDefault();		 });	 });',array('allowCache'=>true,'safe'=>true,'inline'=>false));			$case_status = array(2=>'Case Saved',4=>'Case In Progress',5=>'Case Cancelled',6=>'Case Closed',7=>'Case On Hold');$disabled = true;if( $result[$model]['is_exported']==0 ){	$disabled = false;} ?> <style type="text/css" id="page-css">	/* Styles specific to this particular page */			.scroll-pane			{				width: 100%;				height: 200px;				overflow: auto;				font:12px/20px Arial, Helvetica, sans-serif;				color:#333;			}		</style><script type="text/javascript" >			$(function()			{				var api = $('.scroll-pane').jScrollPane(					{						showArrows:true,						maintainPosition: false}				);															});		</script><?php echo $this->Form->create($model, array('class'=>'form-inline','url'=>array('plugin'=>'cases','controller'=>'cases','action'=>'casetracker',$id)));echo $this->Form->hidden('id');?>
    <div class="divfull">
    	<div class="gradbox">
        	<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td valign="top"><table width="100%" border="0" cellspacing="8" cellpadding="0">
                  <tr>
                    <td>User ID:</td>
                    <td><div class="inputover floatleft pr20">
        	<div class="inputlt"></div>
            <div class="inputmid">
               <?php echo $form->text($model.'.client_login_id',array("class"=>"wid243",'disabled'=>$disabled));?>

           </div>
            <div class="inputrt"></div>
        </div></td>
                  </tr>
                <?php if( $form->error($model.'.client_login_id')){ ?>
                  <tr>
                    <td>&nbsp;</td>
                    <td><small  style="color:#FF0000;"> <?php echo $form->error($model.'.client_login_id');?> </small></td>
                  </tr>
                  <?php }?>
                  <tr>
                    <td>First Name:</td>
                    <td><div class="inputover floatleft pr20">
        	<div class="inputlt"></div>
            <div class="inputmid">
                           <?php echo $form->text($model.'.client_fname',array("class"=>"wid243",'disabled'=>$disabled));?>

          </div>
            <div class="inputrt"></div>
        </div></td>
                  </tr>
                  <tr>
                    <td>Last Name:</td>
                    <td><div class="inputover floatleft pr20">
        	<div class="inputlt"></div>
            <div class="inputmid">
             <?php echo $form->text($model.'.client_lname',array("class"=>"wid243",'disabled'=>$disabled));?>
            </div>
            <div class="inputrt"></div>
        </div></td>
                  </tr>
                  <tr>
                    <td>Password:</td>
                    <td><div class="inputover floatleft pr20">
        	<div class="inputlt"></div>
            <div class="inputmid">
            <?php echo $form->password($model.'.password_token',array("class"=>"wid243",'disabled'=>$disabled));?>
           </div>
            <div class="inputrt"></div>
        </div></td>
                  </tr>
                  <tr>
                    <td>Case#:</td>
                    <td><div class="inputover floatleft pr20">
        	<div class="inputlt"></div>
            <div class="inputmid wid243"><?php echo $result[$model]['id'];?></div>
            <div class="inputrt"></div>
        </div></td>
                  </tr>
                  <tr>
                    <td>Status:</td>
                    <td><div class="inputover floatleft pr20">
        	<div class="inputlt"></div>
            <div class="inputmid select244">
            <?php 
			
			echo $form->select($model.'.case_status_id',$case_status,null,array('empty'=>false,'class'=>'select','style'=>'display:none','disabled'=>$disabled));?>
           </div>
            <div class="inputrt"></div>
        </div></td>
                  </tr>
                  <tr>
                    <td>Assigned To:</td>
                    <td><div class="inputover floatleft pr20">
        	<div class="inputlt"></div>
           <div class="inputmid select244">
			<?php echo $form->select($model.'.assigned_to',$assigned_to,null,array('empty'=>array('0'=>'Please Select'),'class'=>'select','style'=>'display:none','disabled'=>$disabled));?>

          </div>
            <div class="inputrt"></div>
        </div></td>
                  </tr>
                </table></td>
                <td valign="top"><table width="100%" border="0" cellspacing="8" cellpadding="0">
                  <tr>
                    <td>Due Date:</td>
                    <td><div class="inputover floatleft pr20">
                      <div class="inputlt"></div>
                      <div class="inputmid">
                                   <?php
								    
								   echo $form->text($model.'.due_date1',array("class"=>"wid243",'id'=>'due_date','placeholder'=>'','maxlength'=>'10','disabled'=>$disabled));							   echo $form->hidden($model.'.due_date',array("class"=>"wid243",'id'=>'due_date1','placeholder'=>'','maxlength'=>'10'));
								   ?>

                     
                      </div>
                      <div class="inputrt"></div>
                    </div></td>
                  </tr>
                  <tr>
                    <td>Service Level:</td>
                    <td><div class="inputover floatleft pr20">
                      <div class="inputlt"></div>
                      <div class="inputmid select244">
                       <?php echo $form->select($model.'.service_level',Configure::read('service_level'),null,array('empty'=>false,'class'=>'select','style'=>'display:none','disabled'=>$disabled));?>
                        
                      </div>
                      <div class="inputrt"></div>
                    </div></td>
                  </tr>
                  <tr>
                    <td>Discount:</td>
                    <td><div class="inputover floatleft pr20">
                      <div class="inputlt"></div>
                      <div class="inputmid select244">
                                             <?php echo $form->select($model.'.discount',Configure::read('discount'),null,array('empty'=>false,'class'=>'select','style'=>'display:none','disabled'=>$disabled));?>

                        
                      </div>
                      <div class="inputrt"></div>
                    </div></td>
                  </tr>
                  <tr>
                    <td>Fee:</td>
                    <td><div class="inputover floatleft pr20">
                      <div class="inputlt"></div>
                      <div class="inputmid">
					$<?php echo $form->text($model.'.fee',array("class"=>"wid243",'readonly'=>'readonly','placeholder'=>'Fee','id'=>'fee','disabled'=>$disabled));?>

                      
                      </div>
                      <div class="inputrt"></div>
                    </div></td>
                  </tr>
                  <tr>
                    <td>Add Note </td>
                    <td>
                    <?php echo $form->textarea($model.'.notes',array("class"=>"wid255",'placeholder'=>'Add Note','disabled'=>$disabled));?>
                   </td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td>(100 characters available)</td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td>
                    <?php if($disabled==false){ ?>
                    <div class="floatleft pr10">
        	<div class="btnlt"></div>
            <div class="btnmid"><a href="#" id="update_case">Update</a></div>
            <div class="btnrt"></div>
        </div>
        <?php } ?>
        <div class="floatleft pr10">
        	<div class="btnlt"></div>
            <div class="btnmid">
            <?php 
			 echo $this->Html->link( 'Edit Case',array('plugin'=>'cases','controller'=>'cases','action'=> 'caseinfo','admin'=>true,$id));
			?>
          </div>
            <div class="btnrt"></div>
        </div>
        <div class="floatleft pr10">
        	<div class="btnlt"></div>
            <div class="btnmid"><?php 
			
			 $url = FULL_BASE_URL . $this->Html->url(array('plugin'=>'cases','controller'=>'cases','action'=> 'casenotes','admin'=>true,$id));
			 echo $this->Html->link( 'View Case',$url .'?iframe',array('class'=>'lightbox iframe','id'=>'lightbox'));
			 
			?></div>
            <div class="btnrt"></div>
        </div></td>
                  </tr>
                </table></td>
              </tr>
            </table>
        </div>
    </div>
    <div class="divfull pt15">
    	<div class="gridbxover">
        <table width="100%"  style="" border="0" cellspacing="0" cellpadding="0" class="tblcaselist">
              <tr>
                <th width="54%">Notes</th>
                <th width="15%"><span class="floatleft">Date</span></th>
                <th  width="15%">Created By</th>
                <th  width=""><span class="floatleft">Case Status</span></th>
              </tr>
        
        </table>
          <div class="scroll-pane" <?php if(count($result['CaseNote']) < 8){?> style="height:100%" <?php } ?>>
        	<table style="width:960px" border="0" cellspacing="0" cellpadding="0" class="tblcaselist">
        		<?php 
					$class = 'even';
					foreach($result['CaseNote'] as $CaseNote){
						$class = ($class=='even')? 'odd' : 'even';
				?>
				<tr class="<?php echo $class;?>">
                <td   style="width:502px;"><?php echo $CaseNote['case_notes'];?> </td>
                <td  width="15%"><?php echo date('D, M jS',$CaseNote['created']);?></td>
                <td  width="15%"><?php echo $CaseNote['created_by'];?></td>
                <td  width="" style="border-right:none;"><span class="floatleft"><?php echo  $CaseNote['case_status'];?></span> <span class="statusicon"><?php echo $this->Html->Image(Configure::read('case_icon.'.$CaseNote['case_status_id']));?></span></td>
              </tr>
				<?php
				}
				
				?>

        </table>
        </div>





        </div>
    </div>
    <?php echo $this->Form->end();
  

    