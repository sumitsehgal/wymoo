<?php
$class = 'message';
if (!empty($params['class'])) {
    $class .= ' ' . $params['class'];
}
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>

<div class="alert_box">    
<div class="alert alert-success fade in" role="alert">
<button class="close" data-dismiss="alert" type="button">
<span aria-hidden="true">x</span>
<span class="sr-only">Close</span>
</button>
<figure><a href="#"><img src="<?php echo WEBSITE_URL; ?>img/green_close.png" height="14" width="14" alt="close"/></a></figure>
<strong><?php echo $message;?></strong>
</div>
</div>


<!--
<div id="flash_message">
	<div>
        <img width="1" height="10" alt="" src="/img/dot.png">
    </div>
    <div class="successmsg">
        <div class="floatleft padright_10px"><img width="13" height="14" alt="" src="/img/success_icon.gif">
        </div>
        <div class="floatleft"><?= $message ?></div>
        <div class="floatright"><img width="16" height="16" alt="" style="cursor:pointer" id="close_flash" src="/img/close_success.gif"></div>
        <div class="clr"></div>
        <div class="suctl"></div>
        <div class="suctr"></div>
        <div class="sucbl"></div>
        <div class="sucbr"></div>
    </div>
    <div><img width="1" height="10" alt="" src="https://www.wymoo.com/client/img/dot.png"></div>
</div>-->