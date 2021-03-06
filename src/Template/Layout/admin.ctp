
<?php
/**
* CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
* Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
*
* Licensed under The MIT License
* For full copyright and license information, please see the LICENSE.txt
* Redistributions of files must retain the above copyright notice.
*
* @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
* @link          https://cakephp.org CakePHP(tm) Project
* @since         0.10.0
* @license       https://opensource.org/licenses/mit-license.php MIT License
*/

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
       Wymoo® International - Background Checks &amp; Private Investigators
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->fetch('meta') ?>
    <meta name="robots" content="noindex" />
    <?php
    echo $this->Html->css(['all.in.one']);
    echo $this->Html->script(['jquery.min','bootstrap.min','all.in.one','jquery_new_01','browser']);

    ?>
    <!-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> -->
    <script type="text/javascript">
    $(function() {
        $( "#datepiCaseTableDueDatecker" ).datepicker();
    })
    </script>

 <script type="text/javascript">
//<![CDATA[
$(document).ready(function () {$("#forgot_password").click(function(e){e.preventDefault();$('#ui-dialog-title-forgot_password_dialog').replaceWith('Forget your  Password?'); $( "div#forgot_password_dialog").dialog("open");});$("div#forgot_password_dialog" ).dialog({autoOpen: false,width:450,modal:true});	$("div#forgot_password_dialog" ).find("#submit_password").click(function(e){$("div#forgot_password_dialog" ).find("#UserForgotpasswordForm").submit();e.preventDefault();});});
//]]>
</script><script>$(function(){$("img#close_flash").click(function(){var options = {};$("div#flash_message").hide("clip");});});</script><style media="screen" type="text/css">  html,body{height:100%;}#wrapper{position:relative;}#footer{height: 110px;position:relative;}.clearfooter{height:110px;clear:both;}</style><!--[if lt IE 7]><style media="screen" type="text/css">#container{height:100%;}</style><![endif]-->
</head>
<body>
    <div id="wrapper">
            <div id="header">
                <div class="logo">
                    <a href="https://www.wymoo.com/client/"><span>Wymoo International</span></a>
                </div>
                <div class="admintxt">Administrator<span>CASE MANAGEMENT SYSTEM</span></div>
                <?php if(isset($Auth) && !empty($Auth->user())): ?>
                <div class="logoutsec floatright">  
                    <span><img src="/img/user.png" width="30" height="25" alt=""></span>
                    <span class="pt10">Hello, <a href="/client/admin/myaccount" class="newlink"><?= $Auth->user('fname') ?></a>&nbsp;|&nbsp;<a href="/client/admin/users/logout" class="newlink">Logout</a>	  </span>
                </div>
                <?php endif; ?>
                <div class="divfull pt30">
                    <ul class="nav" style="height:28px;">
                        <li></li>
                        <?php if(isset($Auth) && !empty($Auth->user())): ?>
                        <li>
                            <a href="/client/admin/casebrowser" class="<?php echo ($this->getRequest()->getParam('action') == 'casebrowser' || $this->getRequest()->getParam('action') == "caseedit" || $this->getRequest()->getParam('action') == "casetracker" )   ? 'active' : ''; ?>"><span><strong>Case Browser</strong></span></a>
                        </li>
                        <li>
                            <a href="/client/admin/myaccount" class="<?php echo ($this->getRequest()->getParam('action') == 'myaccount'  ||  $this->getRequest()->getParam('controller') == "Users")     ? 'active' : ''; ?>"><span><strong>Admin Details</strong></span></a>
                        </li>
                        <?php endif; ?>
                    </ul>
                </div>
                

                <div class="clear"></div>

            </div>
        <div id="middle">
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
            <br/>
        </div>
    </div>
    <footer class="clear">
        <div class="container">
            <div class="footer_content">
                <div class="address_bar">
                    <h2>Global Headquarters</h2>
                    <p>
                        Wymoo International, LLC<br/>
                        Investigation Headquarters<br/>
                        4320 Deerwood Lake Pkwy<br/>
                        Suite #514 <br/>
                        Jacksonville, FL 32216<br/>
                        United States of America<br/>
                        (US)  561-244-9464 
                    </p>
                </div>
                <div class="help_box help_list">
                    <h2>Help</h2>
                    <ul class="help">
                        <li><a target="_blank" href="http://<?php echo WEBSITE_URL; ?>help/">FAQ</a> </li>
                        <li><a target="_blank" href="http://<?php echo WEBSITE_URL; ?>contact-us/">Contact Us</a></li>
                        <li><a target="_blank" href="http://<?php echo WEBSITE_URL; ?>free-quote/">Free Quote</a> </li>
                        <li><a target="_blank" href="http://<?php echo WEBSITE_URL; ?>site-map/">Site Map</a></li>
                    </ul>
                </div>

                <div class="help_box">
                    <h2>Media</h2>
                    <ul class="help">
                        <li><a target="_blank" href="http://<?php echo WEBSITE_URL; ?>media/">Our Video</a> </li>
                        <li><a target="_blank" href="http://<?php echo WEBSITE_URL; ?>press-room/">Press Room</a> </li>
                        <li><a target="_blank" href="http://<?php echo WEBSITE_URL; ?>blog/">Our Blog</a> </li>
                    </ul>
                </div>

                <div class="help_box" style="width: 190px;">
                    <h2>Privacy & Security</h2>
                    <ul class="help">
                        <li><a target="_blank" href="http://<?php echo WEBSITE_URL; ?>privacy/">Privacy Policy</a> </li>
                    </ul>

                    <h2>Learn More</h2>
                    <ul class="help">
                        <li><a target="_blank" href="http://<?php echo WEBSITE_URL; ?>investigator-advisory/">Investigator Advisory</a></li>
                    </ul>
                </div>

                <div class="social_connect">
                    <h2>Get Connected</h2>
                    <?php echo '<a target="_blank" href="http://www.facebook.com/WymooInternational">'.$this->Html->image('facebook.png').'</a>'; ?>
                    <?php echo '<a target="_blank" href="http://twitter.com/Wymoo">'.$this->Html->image('twiiter.png').'</a>'; ?>
                    <?php echo '<a target="_blank" href="http://www.youtube.com/user/wymoo">'.$this->Html->image('you_tube.png').'</a>'; ?>
                    <?php echo '<a target="_blank" href="http://www.linkedin.com/company/wymoo-international">'.$this->Html->image('link_in.png').'</a>'; ?>
                </div>
                <div class="copy_rite clear"  >
                    <p>Copyright &copy; Wymoo International, LLC All Rights Reserved | A Global Partner of <a href="http://www.philippinepi.com/" target="_blank" class="custom_anchor" >Philippine PI™</a> and <a href="http://www.russiapi.com/" target="_blank" class="custom_anchor">Russia PI™</a></p>
                </div>
            </div>
        </div>
    </footer>

    <div id="email_case_dialog" title="Enter Email Address">
			<table width="100%" cellspacing="0" cellpadding="0" border="0">
			<tbody>
			<tr>
				<td colspan="2">&nbsp;</td>
			</tr>
			<tr>
				<td>Email Address:</td>
				<td>
				<div class="inputover floatleft">
					<div class="inputlt"></div>
					<div class="inputmid">
					<input type="text" class="wid243" placeholder="Enter Email Address" value="" id="email_address">
					</div>
					<div class="inputrt"></div>
				</div>
				</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td>
				<div class="floatleft">
					<div class="btnlt"></div>
					<div class="btnmid"><a href="javascript:void(0);" style="color:#FFFFFF" id="send_email">Email Case</a></div>
					<div class="btnrt"></div>
				</div>
				</td>
			</tr>
			</tbody>
		</table>
	</div>

    
    <script>
    
         $( function() {
			$( "#email_case_dialog" ).dialog({
				autoOpen: false,
                width:400

			});
		} );

		$(document).ready(function(){

	 			$('#send_email').click( function()
				{
					var email = $('#email_address').val();
                    $('input[type=checkbox]:checked').each(function()
                    {
                        var caseNo = $(this).val();
                        $.ajax({
                            url: '/client/admin/casesend/'+caseNo,
                            type: 'get',
                            data: {email: email},
                            beforeSend: function(){
                                
                            },
                            success: function(response)
                            {
                                if(response == "success")
                                {
                                    $('#email_case_dialog').dialog('close');
                                    location.reload();
                                }
                            }
                        });


                    });
                    return false;

				});

		});
    
    
    </script>
    
</body>
</html>