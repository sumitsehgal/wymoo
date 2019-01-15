<style type="text/css" id="page-css">			
	/* Styles specific to this particular page */.scroll-pane{width: 100%;height: 200px;overflow: auto;font:12px/20px Arial, Helvetica, sans-serif;color:#333;}
</style>
<script type="text/javascript" >
$(function()
{
	var api = $('.scroll-pane').jScrollPane({showArrows:true,maintainPosition: false});
});
</script> 
<?php
$case_data_center = $this->Session->read('case_data_center');
$CaseNotification = $this->requestAction('/cases/cases/newnotification');
?>
 <div class="tab_case">
  <div class="bs-example bs-example-tabs">
<ul id="myTab" class="nav nav-tabs" style="margin-top: -34px;">
<li class="active">
  <?php echo $this->Html->link('Case Tracker',array('plugin'=>'cases','controller' => 'cases', 'action' => 'casetracker'), array('class' => '', 'escape' => false));?>
</li>
<?php
 if($CaseNotification > 0 )
{
?>
<li style="position:relative">
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
<li>
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
<div id="tracker" class="tab-pane fade active in">
 <div class="content_box">
    <h1>Case<span>Tracker  </span></h1>
  </div>
  
<?php
if($this->action=='casetracker')
{
	echo $this->Session->flash();
	echo $this->Session->flash('auth');
}
if ($case_data_center == 'success') 
{ 
 $this->Session->delete('case_data_center');
?>
<div class="case_info">
	<div class="left_info"><img src="images/info_img.png" alt="img" class="info_ques"/>
		<img src="images/info_arrow.png" alt="left_arrow" class="left_arrow"/>
	</div>
	<div class="info_right"><h2>Your case has been saved.</h2>
	<p>An email was sent to <?php
    echo $result[$model]['client_email'];
?> with instruction on how to view your case.</p>
	<p>Your user id has been set to <span><a href="#" class="red"><?php
    echo $result[$model]['client_login_id'];
?></a></span> and your password is <span> <?php
    echo $result['User']['password_token'];
?>.</span></p>
	<strong>Please finalize and submit your case within 24 hours</strong>
	</div>
	<div class="clearfix"></div>
</div>
<?php
}

?>


<div class="form_content">
<h2>Client Info</h2>
</div>

<?php
if ($result[$model]['is_submited'] == 0) 
{
   ?>
   <script type="text/javascript">
   $(function()
   {	
		$("div#submit_case_dialog" ).dialog({autoOpen: false,width:370,height:170,modal:true});							 $("div#submit_case_dialog" ).find("#save_notify").click(function(e)
		{				  	
			$("#CaseTableCasetrackerForm").submit();
			e.preventDefault();			  
		});	 
		$("#submit_case").click(function(e)
		{		 
			$( "div#submit_case_dialog").dialog("open");	 	
			e.preventDefault();	 
		});	
   });

	</script>   
   
   <div id="submit_case_dialog" title="Submit Case" ><div style="color: #535353;font-family: Arial,Helvetica,sans-serif;font-size: 12px;"><div style="text-align:justify">Please make sure you have reviewed your case and attachments. If you are sure you have included all information needed by your investigator, click "<b>Submit Case</b>". After this step, your case information will no longer be editable.</div><div class="floatright pt15"><div class="btnlt"></div><div class="btnmid"><a href="javascript:void(0);" style="color:#FFFFFF;float:right;"  class="btn btn-default" id="save_notify">Submit Case</a></div><div class="btnrt"></div></div></div></div>
   <?php
    echo $this->Form->create($model, array(
        'class' => 'form-inline',
        'url' => array(
            'plugin' => 'cases',
            'controller' => 'cases',
            'action' => 'submitcase'
        )
    ));
?><div class="information_end">
  <span>(When you finish adding information and attachments) </span>
  <a class="btn btn-default" href="#" id="submit_case">Submit Case</a>
  </div>
  <div class="clearfix"></div>
  <?php
    echo $this->Form->end();
?><?php
}
else
{

?>
<div class="information_end">
  <span></span>
 
  </div>
  <div class="clearfix"></div>
<?php
}
?>


<div class="table_tab">
<div class="table-responsive">
<table class="table tbl_border ">
<tbody>
<tr>
<td width="50%" valign="top">

<table class="table table-hover table_td">
<tbody>
<tr>
<td width="40%">Client:</td>
<td width="60%"><?php
echo $result[$model]['client_fname'];
?> <?php
echo $result[$model]['client_lname'];
?></td>
</tr>
<tr class="bg_box">
<td width="40%">Service Type:</td>
<td width="60%"><?php
echo Configure::read('service_type.' . $result[$model]['service_type']);
?></td>
</tr>

<tr>
<td width="40%">Assigned To:</td>
<td width="60%"><?php
echo $result[$model]['assigned_name'];
?></td>
</tr>
</tbody>
</table>
</td>


<td  valign="top">

<table class="table table-hover table_td">
<tbody>
<tr>
<td width="40%">Due Date:</td>
<td width="60%"><?php
echo ($result[$model]['due_date'] == 0) ? 'Pending' : date('F j, Y', $result[$model]['due_date']);
?></td>
</tr>
<tr class="bg_box">
<td width="40%">Case Status:</td>
<td width="60%"><?php
echo $result[$model]['case_status'];
?> <span class="statusicon"><?php
echo $this->Html->Image(Configure::read('case_icon.' . $result[$model]['case_status_id']));
?></span></td>
</tr>

<tr>
<td width="40%">Site:</td>
<td width="60%"><?php
echo $result[$model]['site_name'];
?> </td>
</tr>
</tbody>
</table>
</td>

</tr>

</tbody>
</table>


</div>

<div class="content_box case_history">
    <h1>Case<span>HISTORY  </span></h1>
  </div>

<div class="table-responsive">
<table class="table table_history table-hover">
<tbody>
<tr class="bg_history">
<td>Notes</td>
<td>Date</td>
<td>Created By</td>
<td>Case Status</td>
</tr>
<?php
$class = 'even';
if($result['CaseNote'])
{
	foreach ($result['CaseNote'] as $CaseNote) 
	{
		$class = ($class == 'even') ? 'odd' : 'even';
	?><tr class="<?php
		echo $class;
	?>"><td   style="width:502px;"><?php
		echo $CaseNote['case_notes'];
	?> </td><td  width="15%"><?php
		echo date('D, M jS', $CaseNote['created']);
	?></td><td  width="15%"><?php
		echo ($CaseNote['creator_id'] != $CaseNote['user_id']) ? 'Admin' : $CaseNote['created_by'];
	?></td><td  width="" style="border-right:none"><span class="floatleft"><?php
		echo $CaseNote['case_status'];
	?></span> <span class="statusicon"><?php
		echo $this->Html->Image(Configure::read('case_icon.' . $CaseNote['case_status_id']));
	?></span></td></tr><?php
	}
}
?>
</tbody>
</table>

</div>


</div>

</div>
</div>
</div>
  
</div>
