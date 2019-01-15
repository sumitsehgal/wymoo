<?php 
$disabled = true;
if( $result[$model]['is_exported']==0 ){
$disabled = false;
}
$case_data_center = $this->Session->read('case_data_center');
$CaseNotification = $this->requestAction('/cases/cases/newnotification');
?>
<style>

</style>



 <div class="tab_case">
  <div class="bs-example bs-example-tabs">
<ul id="myTab" class="nav nav-tabs" style="margin-top: -34px;">
<li >
  <?php echo $this->Html->link('Case Tracker',array('plugin'=>'cases','controller' => 'cases', 'action' => 'casetracker'), array('class' => '', 'escape' => false));?>
</li>
<?php
 if($CaseNotification > 0 )
{
?>
<li style="position:relative" class="active">
<?php
	echo $this->Html->image('email.png',array("style"=>"position: absolute;right: -5px;top: -12px;z-index: 6;"));
	echo $this->Html->link('Notifications', array('plugin'=>'cases','controller' => 'cases', 'action' => 'notifications'), array('class' => '', 'escape' => false));
?>
</li>
<?php
}
else
{
?>
<li class="active">
	<?php echo $this->Html->link('Notifications', array('plugin'=>'cases','controller' => 'cases', 'action' => 'notifications'), array('class' => '', 'escape' => false));?>
</li>
<?php
}
?>

<li class=" ">
  <?php echo $this->Html->link('Edit Case Data', array('plugin'=>'cases','controller' => 'cases', 'action' => 'caseinfo'), array('class' => '', 'escape' => false));?>
</li>

</ul>
<div id="myTabContent" class="tab-content">
<div id="Notifications" class="tab-pane fade active in">
  <div class="content_box">
    <h1>Case<span>Notification  </span></h1>
	  <?php
		if($this->action=='notifications')
		{
			echo $this->Session->flash();
		 	echo $this->Session->flash('auth');
		}
	?>
	<script type="text/javascript">
$(function(){$("#send_notification").click(function(e){$("#CaseTableNotificationsForm").submit();e.preventDefault();});});</script>
<?php if(!empty($result['Communication']))
{ ?>
<style type="text/css" id="page-css">
/* Styles specific to this particular page */.scroll-pane {
	width:100%;
	height:200px;
	overflow:auto;
	font:12px/20px Arial, Helvetica, sans-serif;
	color:#333;
}
</style>
<script type="text/javascript" >$(function(){var api = $('.scroll-pane').jScrollPane({showArrows:true,maintainPosition: false});});</script>
<div class="table-responsive border_color" <?php if(count($result['Communication']) < 8){?> style="height:100%"<?php }?>>
<table class="table table-hover table_td">
<tbody>
<?php 
		$class = 'even';
foreach($result['Communication'] as $Communication){
$class = ($class=='even')? 'odd' : 'even';
$style = ($Communication['notification_type']=='Admin')? 'style="font-weight:bold"' : '';
?>
<tr class="<?php echo $class;?>" <?php echo $style;?>>
<td width="40%"><?php echo ($Communication['notification_type']=='Admin')? 'Investigator' :$Communication['notification_type'] ;echo  ' ('. date('d-m-Y',$Communication['created']) ;?>):</td>
<td width="60%"><?php echo nl2br($Communication['comments'])  ;?></td>
</tr>
<?php } ?>
</tbody>
</table>
</div>
<?php } ?>
  </div>
  <div class="notification_case">

  <?php echo $this->Form->create($model, array('class'=>'form-inline','url'=>array('plugin'=>'cases','controller'=>'cases','action'=>'notifications')));?>
 
	<?php echo $form->textarea($model.'.notification',array('class'=>'form-control', 'rows'=>4,'disabled'=>$disabled));
	?>
	<?php if($disabled==false)
	{?> 
   <a class="btn btn-default" href="javascript:void(0)" id="send_notification">Send</a>
	 <?php } ?>
		<div style="color:#FF0000;clear:both;margin-left:13px;">
	  <small> <div class="clr"></div>&nbsp;&nbsp;<?php echo $form->error($model.'.notification');?> </small>
</div>	  
	 <div class="clearfix"></div>
	 <?php $this->Form->end(); ?>
  </div>
  <?php 

   if($disabled==false &&  $result[$model]['is_submited']==1)
   {?>
  <div class="photo_add">
   <div class="row">
  <div class="col-sm-3">
	<?php
	if($disabled)
	{
		echo ' <div class="clr"></div>'.  $this->Upload->view($model, $result[$model]['id'].'_photo',false);	
	}
	else
	{
	?>
	<span>
	<strong>Photographs of subject</strong>
	</span>
	<?php
		echo $this->Upload->edit($model, $result[$model]['id'].'_photo', '<a class="btn btn-default" id="test" href="#" style="z-index:4000;">Add</a>',array('jpg','gif','png','jpeg'),4,false,'190px');
	}
	?>
	</div>
	 <div class="col-sm-5">
	 <?php
	 if($disabled){ echo ' <div class="clr"></div>'. $this->Upload->view($model, $result[$model]['id'].'_document',false);	}else{ 
	 ?>
	<span>
	<strong>Additional documentation (ID, passport, visa, records, etc.)</strong>
	</span>
	<?php 
	
		echo $this->Upload->edit($model, $result[$model]['id'].'_document', '<a class="btn btn-default" href="#">Add</a>',array('jpg','gif','png','jpeg','pdf','doc','docx','xls','xlsx'),4,false,'380px');
		}
	?> 
	</div>
	
	</div>
	
	</div>
	<?php
	}
	?>
</div>
</div>
</div>
  
</div>
<style type="text/css">
.chzn-container{width:100%!important;z-index:0!important;}
.qq-upload-button{z-index:1!important;}
</style>