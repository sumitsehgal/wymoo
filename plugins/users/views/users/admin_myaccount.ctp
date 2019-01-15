<?php echo $this->Form->create($model,array("class"=>"form-horizontal"));
$add_user =   $this->Html->url(array('plugin'=>'users','controller'=>'users','action'=>'add','admin'=>true));

echo $form->hidden('id');
echo $javascript->codeBlock('$(document).ready(function () {$("#update").click(function(e){$("#UserAdminMyaccountForm").submit();e.preventDefault();});$("#add_user").click(function(e){window.location.href="'.$add_user.'";			 e.preventDefault();});});',array('allowCache'=>true,'safe'=>true,'inline'=>false));
// pr($this);
?>
<div class="divfull">
<div class="gradbox">
<small style="color:#FF0000"> All fields are mandatory.</small>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td valign="top"><table width="100%" border="0" cellspacing="8" cellpadding="0">
<tr>
<td>User ID:</td>
<td><div class="inputover floatleft pr20">
<div class="inputlt"></div>
<div class="inputmid"><?php echo $form->text($model.".username",array('class'=>'wid243')); ?></div>
<div class="inputrt"></div>
</div></td>
</tr>
<?php if( $form->error($model.'.username')){ ?>
<tr>
<td>&nbsp;</td>
<td><small  style="color:#FF0000;"> <?php echo $form->error($model.'.username');?> </small></td>
</tr>
<?php }?>
<tr>
<td>First Name:</td>
<td><div class="inputover floatleft pr20">
<div class="inputlt"></div>
<div class="inputmid"><?php echo $form->text($model.".fname",array('class'=>'wid243')); ?></div>
<div class="inputrt"></div>
</div></td>
</tr>
<?php if( $form->error($model.'.fname')){ ?>
<tr>
<td>&nbsp;</td>
<td><small  style="color:#FF0000;"> <?php echo $form->error($model.'.fname');?> </small></td>
</tr>
<?php }?>
<tr>
<td>Last Name:</td>
<td><div class="inputover floatleft pr20">
<div class="inputlt"></div>
<div class="inputmid"><?php echo $form->text($model.".lname",array('class'=>'wid243')); ?></div>
<div class="inputrt"></div>
</div><span class="pt5 floatleft"><?php //echo $this->Html->Image('question.png');?></span></td>
</tr>
<?php if( $form->error($model.'.lname')){ ?>
<tr>
<td>&nbsp;</td>
<td><small  style="color:#FF0000;"> <?php echo $form->error($model.'.lname');?> </small></td>
</tr>
<?php }?>
<tr>
<td>Your Email:</td>
<td><div class="inputover floatleft pr20">
<div class="inputlt"></div>
<div class="inputmid"><?php echo $form->text($model.".email",array('class'=>'wid243')); ?></div>
<div class="inputrt"></div>
</div></td>
</tr>
<?php if( $form->error($model.'.email')){ ?>
<tr>
<td>&nbsp;</td>
<td><small  style="color:#FF0000;"> <?php echo $form->error($model.'.email');?> </small></td>
</tr>
<?php }?>
</table></td>
<td valign="top"><table width="100%" border="0" cellspacing="8" cellpadding="0">
<tr>
<td>Current Password:</td>
<td><div class="inputover floatleft pr20">
<div class="inputlt"></div>
<div class="inputmid">
<?php echo $form->password($model.".password",array('class'=>'wid243')); ?>
</div>
<div class="inputrt"></div>
</div></td>
</tr>
<?php if( $form->error($model.'.password')){ ?>
<tr>
<td>&nbsp;</td>
<td><small  style="color:#FF0000;"> <?php echo $form->error($model.'.password');?> </small></td>
</tr>
<?php }?>
<tr>
<td>New Password:</td>
<td><div class="inputover floatleft pr20">
<div class="inputlt"></div>
<div class="inputmid">
<?php echo $form->password($model.".newpassword",array('class'=>'wid243')); ?>
</div>
<div class="inputrt"></div>
</div></td>
</tr>
<?php if( $form->error($model.'.newpassword')){ ?>
<tr>
<td>&nbsp;</td>
<td><small  style="color:#FF0000;"> <?php echo $form->error($model.'.newpassword');?> </small></td>
</tr>
<?php }?>
<tr>
<td>Phone:</td>
<td><div class="inputover floatleft pr20">
<div class="inputlt"></div>
<div class="inputmid">
<?php echo $form->text($model.".phone",array('class'=>'wid243')); ?>

</div>
<div class="inputrt"></div>
</div></td>
</tr>
<?php if( $form->error($model.'.phone')){ ?>
<tr>
<td>&nbsp;</td>
<td><small  style="color:#FF0000;"> <?php echo $form->error($model.'.phone');?> </small></td>
</tr>
<?php }?>
<tr>
<td>&nbsp;</td>
<td><div class="floatleft pr10">
<div class="btnlt"></div>
<div class="btnmid"><a href="#" id="update">Update</a></div>
<div class="btnrt"></div>
</div></td>
</tr>
</table></td>
</tr>
</table>
</div>
</div>

<input type="submit" style="display:none" />


<?php echo $this->Form->end();     

