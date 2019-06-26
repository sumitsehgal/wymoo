<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
	
	<meta name="robots" content="noindex" />

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

	<style>body{ background: none !important}</style>
</head>
<body style="width:990px;">
	<div id="casenotes" style="width:990px;">
		<?= $this->fetch('content') ?>
	</div>
</body>
</html>