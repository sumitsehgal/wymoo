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
 <h2 style="font-size:20px;text-transform:none; color:#333333">Your case has been updated.</h2>
 <strong>Your case has been updated and requires action</strong><br /><br />
                Please login to the case data center using the below link and login information.<br> 
Password is case sensitive. <br>
                <br><br>
Login Name:&nbsp;&nbsp;&nbsp;<?php echo $result['username'] ;?><br>
Password:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $result['password_token'] ;?><br>
<br>
                Check status and notifications at <?php 
				$siteurl = 'https://'. Configure::read("sites_id.1.site");
				$url = $siteurl.'/client/login';

				echo $this->Html->link($url,$url);?> <?php /*?> or just copy and paste this URL <?php echo $this->Html->link($url,$url);?> on your browser's address bar and press the return or enter key<?php */?> <br>
                        <br  />
                <br />
                <small>Copyright &copy; <?php echo Configure::read('all_sites.'.$result['site_id']) ;?>, LLC. All Rights Reserved. All services are strictly confidential. </small>
