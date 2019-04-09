<?php
$autoOpen = (( $this->Form->error($model.'.client_email'))) ? 'true' : 'false';
?>
<script type="text/javascript">
	function form_submit_popup()
	{
		$("#UserForgotpasswordForm").submit();
	}
	$(document).ready(function () 
	{
		$("#forgot_password").click(function(e){$( "div#forgot_password_dialog").dialog("open");e.preventDefault();});$("div#forgot_password_dialog" ).dialog({autoOpen:<?php echo $autoOpen; ?>,width:'100%',modal:true});	$("div#forgot_password_dialog" ).find("#submit_password").click(function(e){$("div#forgot_password_dialog" ).find("#UserForgotpasswordForm").submit();e.preventDefault();});
	});
</script>
<div id="forgot_password_dialog" title="Forgot your password?" >
	<?php
		echo $this->Form->create($model, array('url' => array('controller'=>'users','action'=>'forgotpassword'),'class' => 'form-horizontal', 'id'=>'UserForgotpasswordForm'));
		echo $this->Form->hidden('return_to', array('value' => $return_to));
	?>
		<table width="100%" border="0" cellspacing="8" cellpadding="0">
			<tr>
				<td width="135">Email Address:</td>
				<td>
					<div class="inputover floatleft">
						<div class="inputlt"></div>
						<div class="inputmid"><?php echo $this->Form->text('client_email',array('class'=>'wid243'));?></div>
						<div class="inputrt"></div>
					</div>
				</td>
			</tr>
			<?php if( $this->Form->error('client_email'))
			{ 
			?>
			<tr>
				<td>&nbsp;</td>
				<td>
					<small  style="color:#FF0000;"> <?php echo $this->Form->error('client_email');?> </small>
				</td>
			</tr>
			<?php 
			}
			?>
			<tr>
				<td colspan="2">&nbsp;</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td>
					<div class="pt15">
						<div class="btnlt"></div>
						<div class="btnmid">
							<a href="javascript:void(0);" id="submit_password" style="color:white;" class="btn btn-default" onclick="form_submit_popup()">Submit</a>
						</div>
						<div class="btnrt">
						</div>
					</div>
				</td>
			</tr>
		</table>
		<?php echo $this->Form->end();?>
</div>
  <div class="content_box">
		<h1>Login<span>Required </span></h1>
		<?= $this->Flash->render() ?>
	
		<?php
		if(isset($referer) && $referer=='/login')
		{
			?>
			<div style="margin-left:26px;">
			<?php
			//echo $this->Session->flash();
			//echo $this->Session->flash('auth');
			?>
			</div>
			<?php
		}
		else
		{
			?>
			<div style="margin-left:26px;">
			<?php
			//echo $this->Session->flash();
			//$this->Session->flash('auth');
				?>
			</div>
			<?php
		}
		?>
      </div>
    <div class="login_outer">
		
       <div class="login_inner">
        <div class="login_dashed">
        <div class="login_heading">
        <h2>Secure Client Login</h2>
		
	
        </div>
   		<div class="login_form">
		<?php
		
		
		?>
		<?php
	
		echo $this->Form->create($model,
		array('url'   => array('controller' => 'users','action' => 'login') ,'class' => 'form-horizontal'));

		?>
		<?php echo $this->Form->text('username',array("class"=>'form-control')); ?>
        <img src="<?php echo WEBSITE_URL;?>images/usericon.png" class="user_icon" alt="user"/>
        <?php echo $this->Form->password('passwd',array("class"=>'form-control')); ?>
        <img src="<?php echo WEBSITE_URL;?>images/passwordicon.png" class="pass_icon" alt="pass"/>
		<?php echo $this->Form->submit('goicon.png',array("class"=>"go_button")); ?>
		<?php
		echo $this->Form->end();
		
		?>
        </div>	
          <strong>
       <?php echo $this->Html->link('Forgot your password?',array('controller'=>'users','action'=> 'forgot_password'),array('id'=>'forgot_password','class'=>'newlink'));?>
        <span>Are you starting a new case? <?php echo $this->Html->link('Click here.',array('controller'=>'Client','action'=> 'casebegin'),array('class'=>'newlink'));?></span>
        
        </strong>	
    </div>
    </div>
    </div>
  
    <div class="pt10"></div>