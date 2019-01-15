<?php if(!empty($AdminData)){ ?>
                    	<div class="left_user">
                        	<div class="left_user_img"><a href="#"><?php echo $this->Html->Image('front/user.png');?></a></div>
                        </div><!--user img -->
                        
                        <a href="#" class="blue_btn">Taylor Sullivan</a>
                        <?php }else{ ?>
						<div class="left_user">
                        	<div class="samll_user_img"><a href="#"><?php echo $this->Html->Image('front/user_img.png');?></a></div>
                        	<div class="user_text">USer Login <br /><span>Area</span></div>
                            <div class="clear"></div>
                            <div class="login_shad"> </div>
                            <input type="text" name="login" class="login_in" value="Email" />
                            <input type="password" name="password" class="login_in" value="password" />
                            <a href="#" class="login_btn"><?php echo $this->Html->Image('front/login.png');?></a>
                            <div class="clear"></div>
                        </div>
						
						<?php }?>