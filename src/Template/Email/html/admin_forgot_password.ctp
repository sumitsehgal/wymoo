
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
    	<h2 style="font-size:20px;text-decoration:none; color:#333333">Your Account Information.</h2>
                Login Name:&nbsp;&nbsp;&nbsp;<?php echo $result['username'] ;?><br>
Password:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $result['password_token'] ;?><br> <br>
Check status and notifications at <?php 
				
				$siteurl = 'https://'. Configure::read("sites_id.1.site");
				$url = $siteurl.'/client/admin/users/login';
?>
				<a href="<?php echo $url; ?>" targe="_blank"><?php echo $url; ?></a> <br  />
                <br  />
                <small> Copyright © <?php echo date('Y');?>. <?php echo Configure::read('title');?>, LLC. All Rights Reserved. All services are strictly confidential. </small>

