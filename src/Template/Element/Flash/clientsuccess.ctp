
<div class="case_info">
    <div class="left_info"><img src="/images/info_img.png" alt="img" class="info_ques">
    <img src="/images/info_arrow.png" alt="left_arrow" class="left_arrow">
    </div>
<div class="info_right">
<h2>Your case has been saved.</h2>
<p>An email was sent to <a href="mailto:<?php echo $params['email']; ?>" class="__cf_email__" ><?php echo $params['email']; ?></a> with instruction on how to view your case.</p>
<p>Your user id has been set to <span><a href="mailto:<?php echo $params['email']; ?>" class="red"><span class="__cf_email__" ><?php echo $params['email']; ?></span></a>
    </span> and your password is <span> <?php echo $params['passwd']?>.</span></p>
    <strong>Please finalize and submit your case within 24 hours</strong>
</div>
<div class="clearfix"></div>
</div>