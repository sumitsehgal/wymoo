<?php
if(isset($referer) && $referer=='/admin/login'){
echo $this->Session->flash();
echo $this->Session->flash('auth');
}else{
echo  $this->Session->flash();
$this->Session->flash('auth');
}
$autoOpen = ($form->error($model.'.client_email')) ? 'true' : 'false';
echo $javascript->codeBlock('$(document).ready(function () {$("#forgot_password").click(function(e){$( "div#forgot_password_dialog").dialog("open");e.preventDefault();});$("div#forgot_password_dialog" ).dialog({autoOpen: '.$autoOpen .',width:450,modal:true});	$("div#forgot_password_dialog" ).find("#submit_password").click(function(e){$("div#forgot_password_dialog" ).find("#UserForgotpasswordForm").submit();e.preventDefault();});});',array('allowCache'=>true,'safe'=>true,'inline'=>false));
?>
<div id="forgot_password_dialog" title="Forgot your password?" >
<?php
echo $this->Form->create($model, array(
'action' => 'forgotpassword',
'class' => 'form-horizontal'));
echo $this->Form->hidden('User.return_to', array('value' => $return_to));


?>

<div style="color: #535353;
font-family: Arial,Helvetica,sans-serif;
font-size: 12px;"><table width="100%" border="0" cellspacing="8" cellpadding="0">
<tr>
<td width="135">Email Address:</td>
<td><div class="inputover floatleft">
<div class="inputlt"></div>
<div class="inputmid"><?php echo $form->text($model.'.client_email',array('class'=>'wid243'));?></div>
<div class="inputrt"></div>

</div></td>
</tr>
<?php if( $form->error($model.'.client_email')){ ?>
<tr>
<td>&nbsp;</td>
<td><small  style="color:#FF0000;"> <?php echo $form->error($model.'.client_email');?> </small></td>
</tr>
<?php }?>

<tr>
<td>&nbsp;</td>
<td><div class="pt15">
<div class="btnlt"></div>
<div class="btnmid"><a href="javascript:void(0);" style="color:#FFFFFF;" id="submit_password">Submit</a></div>
<div class="btnrt"></div>
</div></td>
</tr>





</table>
</div>
<?php
echo $this->Form->end();
?>
</div>

<div class="divfull">
<div class="adminloginbox">
<?php
echo $this->Form->create($model, array(
'action' => 'login',
'class' => 'form-horizontal'));
echo $this->Form->hidden('User.return_to', array('value' => $return_to));
?>
<div class="loginhead"><?php __('Wymoo CMS');?> </div>
<div class="loginform">
<div class="divfull pt20">
<div class="log_input"><span><?php echo $this->Html->image('usericon.png');?></span>
<div><?php echo $form->text('username'); ?></div></div>
</div>
<?php echo $form->error('username',array('wrap'=>false)); ?>
<div class="divfull pt6">
<div class="log_input"><span><?php echo $this->Html->image('passwordicon.png');?></span>
<div><?php echo $form->password('passwd'); ?></div></div>
</div>
<?php echo $form->error('passwd',array('wrap'=>false)); ?>
<div class="loginbtn">
<?php echo $form->submit('goicon.png'); ?>
</div>
<div class="divfull pt10">
<?php 
echo $this->Html->link('Forgot your password?',array('plugin'=>'users','controller'=>'users','action'=> 'forgot_password'),array('id'=>'forgot_password','class'=>'newlink'));
?>	

</div>
  

</div>

<?php
echo $this->Form->end();
?>
</div>
<form name="emailLoginForm" style="margin: 0px" onsubmit=""
action="https://apps.rackspace.com/login.php" method="post">
<div class="adminloginbox">
<div class="loginhead"><?php __('Web mail');?></div>
<div class="loginform">
<div class="divfull pt20">
<div class="log_input"><span><?php echo $this->Html->image('usericon.png');?></span>
<div><input type="text" name="user_name" /></div></div>
</div>

<div class="divfull pt6">
<div class="log_input"><span><?php echo $this->Html->image('passwordicon.png');?></span>
<div><input type="password" name="password" /></div></div>
</div>
<div class="loginbtn"> <?php echo $form->submit('goicon.png'); ?></div>
<div class="divfull pt10">
<div class="floatleft"><input type="checkbox" /> &nbsp;Remember me</div>
<div class="floatright lightgray">Email Services by Rackspace</div>
</div>
</div>
</div>
<?php
echo $this->Form->end();
?></div>