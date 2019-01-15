<?php
echo $javascript->codeBlock('
 var deltelink = "";
	$(document).ready(function () {
	$(".deleteuser").click(function(e){
		deltelink = $(this).attr("href");
		$("div#unlock_case_dialog" ).dialog("open");e.preventDefault();
	});
	$("#export_case_lnk").click(function(e){
		window.location.href = deltelink;
	});
	$("#close_dialog").click(function(e){$("div#unlock_case_dialog").dialog("close");e.preventDefault();});
	$("#unlock_case_dialog").dialog({show:"slide",hide:"slide", width: 350,height: 150,autoOpen: false,resizable: true,draggable: false,modal: true,});
	$("#process").click(function(e){$("#UserAdminViewForm").submit();e.preventDefault();});});',array('allowCache'=>true,'safe'=>true,'inline'=>false));
//pr($result);
?>
<script>var emailregs = /^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i;
</script>
<?php echo $this->Form->create($model, array('class'=>'form-inline','url'=>array('plugin'=>'users','controller'=>'users','action'=>'view')));

?>
<div class="case_search">
<div class="lbl">First Name</div>
<div class="inputover floatleft pr20">
<div class="inputlt"></div>
<div class="inputmid ">
<?php echo $form->text($model.'.fname',array('placeholder'=>'First Name','class'=>'wid120'));?>
</div>
<div class="inputrt"></div>
</div>
<div class="lbl">Last Name</div>
<div class="inputover floatleft pr20">
<div class="inputlt"></div>
<div class="inputmid">
<?php echo $form->text($model.'.lname',array('placeholder'=>"Last Name",'class'=>'wid120'));?>

</div>
<div class="inputrt"></div>
</div>
<div class="lbl">Email</div>
<div class="inputover floatleft pr20">
<div class="inputlt"></div>
<div class="inputmid select150">
<?php echo $form->text($model.'.email',array('placeholder'=>"Email Address",'class'=>'wid120'));?>
</div>
<div class="inputrt"></div>
</div>
<div class="floatleft">
<div class="btnlt"></div>
<div class="btnmid"><a href="#" id="process">Search</a></div>
<div class="btnrt"></div>
</div>
<div class="clr"></div>
</div><input type="submit" style="display:none;" />
<?php echo $this->Form->end();?>
<div class="divfull pt15">
<div class="gridbxover">
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="tblcaselist">
<tr>

<th>
<?php  echo $this->Paginator->sort('First name','fname',array('new_template'=>true));?>
</th>
<th>
<?php  echo $this->Paginator->sort('Last name','lname',array('new_template'=>true));?>
</th>
<th>
<?php  echo $this->Paginator->sort('Email','email',array('new_template'=>true));?>
</th>
<th>
<?php  echo $this->Paginator->sort('Login id','username',array('new_template'=>true));?>
</th>

<th>
Action
</th>

</tr>
<?php if(!empty($result)){
$class = 'even';


foreach($result as $record){
$class = ($class=='even')? 'odd' : 'even';
?>
<tr class="<?php echo $class;?>">

<td><?php echo $record[$model]['fname'];?> </td>
<td><?php echo $record[$model]['lname'];?></td>
<td> <?php 
echo $this->Html->link( $record[$model]['email'],'mailto:'.$record[$model]['email'],array('class'=>'newlink'));
?>	</td>
<td><?php echo $record[$model]['username'];?></td>

<td>
<div class="floatleft pr10">
<div class="btnlt"></div>
<div class="btnmid">
<?php 
echo $this->Html->link( 'Edit',array('plugin'=>'users','controller'=>'users','action'=> 'edit','admin'=>true,$record[$model]['id']));

?>	</div>
<div class="btnrt"></div>
</div> &nbsp;&nbsp;<div class="floatleft pr10">
<div class="btnlt"></div>
<div class="btnmid">
<?php 
echo $this->Html->link( 'Delete',array('plugin'=>'users','controller'=>'users','action'=> 'delete','admin'=>true,$record[$model]['id']),array('class'=>'deleteuser'));

?>

	</div>
<div class="btnrt"></div>
</div>
	
</td>
</tr>
<?php
}
}else{
?>
<tr class="odd">
<td colspan="5" align="center"><?php __('No record found.');?></td>
</tr>
<?php

}
?> 
</table>
</div>
</div>
<div id="unlock_case_dialog" title="Are you sure?"  ><br/>
  Are you sure you want to delete this user?
  <div class="floatright pt15" id="floatrightbtn" style="padding-top:20px;">
    <div class="btnlt"></div>
    <div class="btnmid"><?php echo $this->Html->link( 'Yes','javascript:void(0);',array('id'=>'export_case_lnk','style'=>'color:#FFFFFF'));?></div>
    <div class="btnrt" style="padding-right:2px;"></div>
    <div class="btnlt"></div>
    <div class="btnmid"><?php echo $this->Html->link( 'No',array(),array('id'=>'close_dialog','style'=>'color:#FFFFFF'));?></div>
    <div class="btnrt"></div>
  </div>
  </div>