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
<div class="alert alert-danger fade in" role="alert">
<button class="close" data-dismiss="alert" type="button">
<span aria-hidden="true">x</span>
<span class="sr-only">Close</span>
</button>
<figure><a href="#"><img src="<?php echo WEBSITE_URL; ?>img/close.png" height="14" width="14" alt="close"/></a></figure>
<strong><?php echo $message;?></strong>
</div>
</div>
