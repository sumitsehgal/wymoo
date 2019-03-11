<?php
$class = 'message';
if (!empty($params['class'])) {
    $class .= ' ' . $params['class'];
}
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}


if($message != "You are not authorized to access that location."):
?>

<div class="alert_box">    
<div class="alert alert-danger fade in" role="alert">
<button class="close" data-dismiss="alert" type="button">
<span aria-hidden="true">x</span>
<span class="sr-only"></span>
</button>
<figure><a href="#"><img src="<?php echo WEBSITE_URL; ?>img/close.png" height="16" width="16" alt="close"/></a></figure>
<strong><?php echo $message;?></strong>
</div>
</div>

<?php endif; ?>
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