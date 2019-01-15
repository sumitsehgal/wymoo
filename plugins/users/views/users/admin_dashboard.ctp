<?php  $AdminData = $session->read($sessiondata) ;
//pr($AdminData);die;
?>

<table class="table table-bordered table-striped">
  <thead>
    <tr  >
      <th style="background-color: #EEEEEE;" >
      <div class="row-fluid">
      
        <h1>Hello, <?php echo $AdminData['username'];?>!</h1>
        
        </div>
      </th>
    </tr>
    <tr >
      <td style="padding:20px;">
      <div class="row-fluid">
      <div class="span3">&nbsp;</div>
       <div class="span2">
       <?php
	    $add_user =  $this->Html->image('/dealers/img/add_dealer.jpg',array('alt'=>'Add Dealer'));
		$add_image = $this->Html->image('/images/img/add_image.jpg',array('alt'=>'Add Image'));
		$view_image = $this->Html->image('/images/img/view_image.jpg',array('alt'=>'View Images'));
		$list_user = $this->Html->image('/dealers/img/list_dealers.jpg',array('alt'=>'List Dealers'));
		$account_setting = $this->Html->image('/users/img/account_setting.jpg',array('alt'=>'Account Setting'));
		
			echo $this->Html->link($add_user,array('plugin'=>'dealers','controller'=>'users','action'=> 'add_dealer'),array('escape'=>false,'class'=>'thumbnail'));
			?>
       	
       </div>
        <div class="span2">
       	<?php 
		echo $this->Html->link( $list_user ,array('plugin'=>'dealers','controller'=>'users','action'=> 'dealers'),array('escape'=>false,'class'=>'thumbnail'));
	
   ?>
       </div>
        <div class="span2">
       	<?php 
		echo $this->Html->link( $account_setting ,array('plugin'=>'users','controller'=>'users','action'=> 'myaccount'),array('escape'=>false,'class'=>'thumbnail'));
	
   ?>
       </div>
        
          <div class="span3">&nbsp;</div>
    
     

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

