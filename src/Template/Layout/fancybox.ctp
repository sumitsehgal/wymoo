<?php
/**
*
* PHP versions 4 and 5
*
* CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
* Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
*
* Licensed under The MIT License
* Redistributions of files must retain the above copyright notice.
*
* @copyright     Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
* @link          http://cakephp.org CakePHP(tm) Project
* @package       cake
* @subpackage    cake.cake.libs.view.templates.layouts
* @since         CakePHP(tm) v 0.10.0.1076
* @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
*/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
	<?php


	echo $this->Html->css('all.in.one');
	
	?>

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <?=$this->Html->script('all.in.one.js');?>
  <style>
  .ui-dialog.ui-corner-all.ui-widget.ui-widget-content.ui-front.ui-draggable.ui-resizable {
    width: 400px !important;}
	button.ui-button.ui-corner-all.ui-widget.ui-button-icon-only.ui-dialog-titlebar-close{
		font-size:0px;
	
	}
    .ui-button-icon-only .ui-icon {
    position: absolute;
    top: 0% !important;
    left: 0% !important;
	color:#080808 !important;
	}
</style>
  <script>
		$( function() {
			$( "#email_case_dialog" ).dialog({
				autoOpen: false,
			});
		} );

		$(document).ready(function(){

				$('#email_case').click(function()
				{
					$('#email_case_dialog').dialog('open');
					return false;
				});

				$('#send_email').click(function()
				{
					var email = $('#email_address').val();
					var caseNo = $('#caseid').val();
					$.ajax({
						url: '/client/admin/casesend/'+caseNo,
						type: 'get',
						data: {email: email},
						success: function(response)
						{
							if(response == "success")
							{
								alert("Email Successfully Sent.");
								$('#email_case_dialog').dialog('close');
							}
						}
					});
				});

		});
  </script>

	<style>body{ background: none !important}</style>
	<script>
		$(function(){
			$("img#close_flash").click(function(){
				var options = {};
				$("div#flash_message").hide("clip");	
			});	
		});
	</script>
</head>
<body style="width:990px;">
	<div id="casenotes" style="width:990px;">
		<?= $this->fetch('content') ?>
	</div>
</body>
</html>