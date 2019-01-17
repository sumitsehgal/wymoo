<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<div id="flash_message">
    <div><img width="1" height="10" alt="" src="/img/dot.png"></div>
    <div class="errormsg">
        <div class="floatleft padright_10px"><img width="13" height="14" alt="" src="/img/error_icon.gif"></div>
        <div class="floatleft"><?= $message ?></div>
        <div class="floatright"><img width="16" height="16" alt="" style="cursor:pointer" id="close_flash" src="/img/close_error.gif"></div>
        <div class="clr"></div>
        <div class="errtl"></div>
        <div class="errtr"></div>
        <div class="errbl"></div>
        <div class="errbr"></div>
    </div>
    <div><img width="1" height="10" alt="" src="/img/dot.png"></div>
</div>
    