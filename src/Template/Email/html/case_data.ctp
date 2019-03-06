<?php use Cake\Core\Configure; ?>

<style>
* html, body {
	margin:0px;
	font-size:12px;
	font-family:Arial, Helvetica, sans-serif;
}
a {
	outline:none;
	color:#00F;
	text-decoration:underline;
}
a:hover {color:#00F;text-decoration:underline}
</style>
 <h2 style="font-size:20px;text-transform:none; color:#333333">Thank you for submitting your information to <?php echo Configure::read('all_sites.'.$result['site_id']); ?>.</h2>
 <strong><?php echo Configure::read('all_sites.'.$result['site_id']) ; if($result['site_id']==3){ echo '&trade;';} else { echo '&reg;';}?>  is now ready to investigate.  Please submit your case within 24 hours.</strong><br />
                Save this email for easy access to your account. (Password is case sensitive)<br>
                <br>
                 <strong>Your account information.</strong><br>
Login Name:&nbsp;&nbsp;&nbsp;<?php echo $result['username'] ;?><br>
Password:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $result['password_token'] ;?><br>
<br>
<b>Important:</b> 1) Update your information, 2) Submit your case, and 3) Check status at <?php 
				$siteurl = 'https://'. Configure::read("sites_id.".$result['site_id'].".site");
				$url = $siteurl.'/users/login';

				echo $this->Html->link($url,$url);?> <?php /*?> or just copy and paste this URL <?php echo $this->Html->link($url,$url);?> on your browser's address bar and press the return or enter key<?php */?> <br>
                        <br  />
                
                <strong>Need additional help?</strong> Email your investigator directly for assistance.<br>
                <br />
                <?php echo Configure::read('all_sites.'.$result['site_id']) ;?>, LLC. All Rights Reserved. All services are strictly confidential. </small>
