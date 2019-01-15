<?php  $AdminData = $session->read($sessiondata) ;?>

<table class="table table-bordered table-striped" align="center">
  <thead>
    <tr  >
      <th style="background-color: #EEEEEE;" >
      <div class="row-fluid">
      
        <h1>Hello, <?php echo $AdminData['username'];?>!</h1>
        
        </div>
      </th>
    </tr>
    <tr >
      <td align="center" style="padding:20px;">
       <div class="row-fluid">
        <div class="span1">&nbsp;</div>
       <div class="span2">
       <?php
	    $add_user =  $this->Html->image('/users/img/add_user.jpg',array('alt'=>'Add User'));
		$add_image = $this->Html->image('/images/img/add_image.jpg',array('alt'=>'Add Image'));
		$view_image = $this->Html->image('/images/img/view_image.jpg',array('alt'=>'View Images'));
		$list_user = $this->Html->image('/users/img/list_user.jpg',array('alt'=>'List User'));
		$account_setting = $this->Html->image('/users/img/account_setting.jpg',array('alt'=>'Account Setting'));
		
				echo $this->Html->link( $add_image ,array('plugin'=>'images','controller'=>'images','action'=> 'add_images'),array('escape'=>false,'class'=>'thumbnail'));
			?>
       	
       </div>
        <div class="span2">
       	<?php 
		echo $this->Html->link( $view_image ,array('plugin'=>'images','controller'=>'images','action'=> 'index'),array('escape'=>false,'class'=>'thumbnail'));
	
   ?>
       </div>
        <div class="span2">
       	<?php 
		echo $this->Html->link( $add_user ,array('plugin'=>'users','controller'=>'users','action'=> 'add_user'),array('escape'=>false,'class'=>'thumbnail'));
	
   ?>
       </div>
        <div class="span2">
       	<?php 
				echo $this->Html->link( $list_user ,array('plugin'=>'users','controller'=>'users','action'=> 'index'),array('escape'=>false,'class'=>'thumbnail'));

		
   ?>
       </div>
        <div class="span2">
       	<?php 
						echo $this->Html->link( $account_setting ,array('plugin'=>'users','controller'=>'users','action'=> 'myaccount'),array('escape'=>false,'class'=>'thumbnail'));

	
   ?>
       </div>
         <div class="span1">&nbsp;</div>
     
        </div>
      </td>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>&nbsp;</td>
    </tr>
  </tbody>
</table>