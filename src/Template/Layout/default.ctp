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
    <?php
    echo $this->Html->css(array('bootstrap.css','jquery-ui'));
    echo $this->Html->script(array('jquery.min','bootstrap.min','all.in.one'));
    ?>
</head>
<body>
    <header>
      <div class="container">
        <div class="row">
          <div class="col-sm-6">
            <div class="logo"><a href="<?php echo WEBSITE_URL;?>"></a></div>
        </div>
        <div class="col-sm-6">
            <div class="heading_client">
              <h2> Client Access<span>CASE MANAGEMENT SYSTEM</span></h2>
              <?php 
              if( isset($sessiondata) && $session->check($sessiondata))
              {
                 $AdminData = $session->read($sessiondata); 
                 ?>
                 <ul>
                  <li><img src="<?php echo WEBSITE_URL;?>images/user_profile.png" alt="user"/></li>
                  <li>Hello,</li>
                  <li><?php  

                  echo $this->Html->link(ucwords($AdminData['fname']),array('plugin'=>'users','controller'=>'users','action'=> 'myaccount'),array('class'=>'newlink','escape'=>false));

                  ?>&nbsp; | </li>  
                  <li><?php  echo $this->Html->link('Logout',array('plugin'=>'users','controller'=>'users','action'=> 'logout'),array('class'=>'newlink','escape'=>false));  ?></li>
              </ul>

          <?php } ?>
          
          
      </div>
  </div>
</div>
</div>
<div class="bg_blue"></div>
<div class="gray_bg"></div>
</header>
<?= $this->Flash->render() ?>
<div class="container">
    <?= $this->fetch('content') ?>
</div>
<footer>
    <div class="container">
        <div class="footer_content">
            <div class="row">
                <div class="col-sm-9">
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
                            <li><a target="_blank" href="http://<?php echo WEBSITE_URL; ?>/help/">FAQ</a> </li>
                            <li><a target="_blank" href="http://<?php echo WEBSITE_URL; ?>/contact-us/">Contact Us</a></li>
                            <li><a target="_blank" href="http://<?php echo WEBSITE_URL; ?>/free-quote/">Free Quote</a> </li>
                            <li><a target="_blank" href="http://<?php echo WEBSITE_URL; ?>/site-map/">Site Map</a></li>
                        </ul>
                    </div>

                    <div class="help_box">
                        <h2>Media</h2>
                        <ul class="help">
                            <li><a target="_blank" href="http://<?php echo WEBSITE_URL; ?>/media/">Our Video</a> </li>
                            <li><a target="_blank" href="http://<?php echo WEBSITE_URL; ?>/press-room/">Press Room</a> </li>
                            <li><a target="_blank" href="http://<?php echo WEBSITE_URL; ?>/blog/">Our Blog</a> </li>
                        </ul>
                    </div>

                    <div class="help_box">
                        <h2>Privacy & Security</h2>
                        <ul class="help">
                            <li><a target="_blank" href="http://<?php echo WEBSITE_URL; ?>/privacy/">Privacy Policy</a> </li>
                        </ul>

                        <h2>Learn More</h2>
                        <ul class="help">
                            <li><a target="_blank" href="http://<?php echo WEBSITE_URL; ?>/investigator-advisory/">Investigator Advisory</a></li>
                        </ul>
                    </div>

                </div>
                <div class="col-sm-3">
                    <div class="social_connect">
                        <h2>Get Connected</h2>
                        <?php echo '<a target="_blank" href="http://www.facebook.com/WymooInternational">'.$this->Html->image('facebook.png').'</a>'; ?>
                        <?php echo '<a target="_blank" href="https://plus.google.com/+WymooInternational/">'.$this->Html->image('google_plus.png').'</a>'; ?>
                        <?php echo '<a target="_blank" href="http://twitter.com/Wymoo">'.$this->Html->image('twiiter.png').'</a>'; ?>
                        <?php echo '<a target="_blank" href="http://www.youtube.com/user/wymoo">'.$this->Html->image('you_tube.png').'</a>'; ?>
                        <?php echo '<a target="_blank" href="http://www.linkedin.com/company/wymoo-international">'.$this->Html->image('link_in.png').'</a>'; ?>
                    </div>
                </div>
            </div>
            <div class="copy_rite">
                <p>Copyright &copy; Wymoo International, LLC All Rights Reserved | A Global Partner of  <a href="http://www.philippinepi.com/" target="_blank" class="custom_anchor" >Philippine PI™</a> and <a href="http://www.russiapi.com/" target="_blank" class="custom_anchor">Russia PI™</a></p>
            </div>
        </div>
    </div>
</footer>
</body>
</html>