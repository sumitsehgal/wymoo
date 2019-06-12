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
<span class="sr-only"></span>
</button>
<figure><a href="#"><img src="<?php echo WEBSITE_URL; ?>img/green_close.png" height="14" width="14" alt="close"/></a></figure>
<strong><?php echo $message;?></strong>
</div>
</div>



<style>

.alert_box {
    position: relative;
    margin-top: 5px;
}
.alert_box .alert-danger {
    border: 1px solid #e9c59b;
    background-color: #ffecce;
    padding: 6px 4px 6px 4px;
    color: #ed302c;
    font-size: 12px;
}

.fade.in {
    opacity: 1;
}

.alert-danger {
  background-color: #f2dede;
  border-color: #ebccd1;
  color: #a94442;
}
.alert-danger hr {
  border-top-color: #e4b9c0;
}
.alert-danger .alert-link {
  color: #843534;
}

.alert_box .close {
    background-color: #948877;
    border-bottom-left-radius: 50%;
    border-bottom-right-radius: 50%;
    border-top-left-radius: 50%;
    border-top-right-radius: 50%;
    color: #FFECCE;
    font-size: 11px;
    margin-right: 5px;
    opacity: 0.8;
    padding-bottom: 4px;
    padding-left: 5px;
    padding-right: 5px;
    padding-top: 2px;
}
button.close {
    padding: 0;
    cursor: pointer;
    background: transparent;
    border: 0;
    -webkit-appearance: none;
}

.close {
    float: right;
    font-size: 21px;
    font-weight: bold;
    line-height: 1;
    color: #000000;
    text-shadow: 0 1px 0 #ffffff;
    opacity: 0.2;
    filter: alpha(opacity=20);
}

</style>


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