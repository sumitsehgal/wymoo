<style>
	* html, body{margin:0px;}
	a {text-decoration:none;}
	a:hover {text-decoration:underline;}
</style>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center" valign="top"><table width="98%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="top">&nbsp;</td>
    <td>&nbsp;</td>
    <td valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td valign="top" width="47%">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
     <tr>
    <td><?php echo $this->Html->Image($this->Html->url("/img/" , true) . 'client_info.jpg',array('width'=>151,'height'=>32,'full' => true));?></td>
  </tr>
     <tr>
    <td>
  
    
    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border:1px solid #9d9879; font-size:12px; font-family:Arial, Helvetica, sans-serif; color:#535353;">
             
           
             
             
             
             
              <tr>
                <td width="150" style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top">Case#:</td>
                <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top"><?php echo $result[$model]['id'] ;?></td>
                </tr>
              <tr>
                <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top">Login Name:</td>
                <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top"><?php echo $result['User']['username'] ;?> </td>
                </tr>
              <tr>
                <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top">First Name:</td>
                <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top"><?php echo $result['User']['fname'] ;?></td>
                </tr>
              <tr>
                <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top">Last Name:</td>
                <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top"><?php echo $result['User']['lname'] ;?></td>
                </tr>
                <tr>
                <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top">Site:</td>
                <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top"><?php echo $result[$model]['site_name'] ;?></td>
                </tr>
              <tr>
                <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top">Email:</td>
                <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top"><?php echo $result['User']['email'] ;?></td>
                </tr>
              <tr>
                <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top">Due Date:</td>
                <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top"><?php echo ($result[$model]['due_date']==0)? 'Pending' : date('F j, Y',$result[$model]['due_date']);?></td>
                </tr>
              <tr>
                <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top">Assigned To:</td>
                <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top"><?php echo $result[$model]['assigned_name'];?></td>
                </tr>
        </table></td>
  </tr>
     <tr>
       <td>&nbsp;</td>
     </tr>
     
     
      <?php if($result['Quote']['quote_title']!=''  && ! empty($result['Quote']['id'])){ ?>  
       <tr>
    <td><?php echo $this->Html->Image($this->Html->url("/img/" , true) . $result['Quote']['quote_title']. '.jpg',array('width'=>98,'height'=>32,'full' => true));?></td>
  </tr>  
   <tr>
    <td>
    
    
    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border:1px solid #9d9879; font-size:12px; font-family:Arial, Helvetica, sans-serif; color:#535353;">
    
   
		 
	  
	     

		
      
              <tr>
                <td width="150" style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top">First Name:</td>
                <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top"><?php echo $result['Quote']['first_name'];?> </td>
                </tr>
              <tr>
                <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top">Last Name:</td>
                <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top"> <?php echo $result['Quote']['last_name'];?>
			   </td>
                </tr>
                
              <tr>
                <td width="150" style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top">Phone:</td>
                <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top"><?php echo $result['Quote']['phone'];?> </td>
                </tr>
              <tr>
                <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top">City, State:</td>
                <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top"><?php echo $result['Quote']['city'];?>, <?php echo $result['Quote']['state'];?>
			   </td>
                </tr>
                
              <tr>
                <td width="150" style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top">Country:</td>
                <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top"><?php echo $result['Quote']['country'];?> </td>
                </tr>
              <tr>
                <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top">Site:</td>
                <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top"> <?php echo $result['Quote']['site'];?>
			   </td>
                </tr>
                
              <tr>
                <td width="150" style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top">Referral Type:</td>
                <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top"><?php echo $result['Quote']['referral'];?> </td>
                </tr>
              <tr>
                <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top">Fraud:</td>
                <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top"> <?php echo $result['Quote']['fraud'];?>
			   </td>
                </tr>
                
              <tr>
                <td width="150" style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top">Infidelity:</td>
                <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top"><?php echo $result['Quote']['infidelity'];?> </td>
                </tr>
              <tr>
                <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top">Finacial Loss:</td>
                <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top"> <?php echo $result['Quote']['loss'];?>
			   </td>
                </tr>
                
              <tr>
                <td width="150" style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top">Remote Addr:</td>
                <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top"><?php 
		  
		  $server_info = (json_decode($result['Quote']['server_info'],true));
		   echo  $server_info['REMOTE_ADDR'];
		  ?> </td>
                </tr>
              <tr>
                <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top">Http User Agent:</td>
                <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top"> <?php   echo  $server_info['HTTP_USER_AGENT'];?>
			   </td>
                </tr>
                
              <tr>
                <td width="150" style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top">Http Host:</td>
                <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top"><?php   echo  $server_info['HTTP_HOST'];?> </td>
                </tr>
              <tr>
                <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top">Location:</td>
                <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top"> <?php   echo  $server_info['LOCATION'];?>
			   </td>
                </tr>
             <tr>
                <td width="150" style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top">Description:</td>
                <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top" width="200"> <div style="width:200px; word-wrap:break-word;"><?php echo nl2br($result['Quote']['description']);?> </div></td>
                </tr>
                
        </table></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
	
	
    <?php } else {
		?>
		  <tr>
    <td><?php echo $this->Html->Image($this->Html->url("/img/" , true) . 'attachments.jpg',array('width'=>114,'height'=>32,'full' => true));?></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0" style="border:1px solid #9d9879; font-size:12px; font-family:Arial, Helvetica, sans-serif; color:#535353;">
              <tr>
                <td width="150" style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top">Pictures:</td>
                <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top"> <?php 
		  $photos =  $this->Upload->files($model, $result[$model]['id'].'_photo');		
		   foreach($photos as $photo ){
			   echo $photo['basename'] . '&nbsp;&nbsp;(' .$photo['filesize'] . ') <br />';
		   
		   }
		  ?></td>
                </tr>
              <tr>
                <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top">Documents:</td>
                <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top"><?php 
		   $documents =  $this->Upload->files($model, $result[$model]['id'].'_document');		
		   foreach($documents as $document ){
			   echo $document['basename'] . '&nbsp;&nbsp;(' .$document['filesize'] . ') <br />';
		   
		   }
				?> </td>
                </tr>
              
              
        </table></td>
  </tr>
		 
      
   
    <?php if(!empty($result['Communication'])){?>
     <tr>
    <td>&nbsp;</td>
  </tr>
    <tr>
    <td><?php echo $this->Html->Image($this->Html->url("/img/" , true) . 'communication.jpg',array('width'=>128,'height'=>32,'full' => true));?></td>
  </tr>
    
    
     
      <tr>
    <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="border:1px solid #9d9879; font-size:12px; font-family:Arial, Helvetica, sans-serif; color:#535353;">
    
     <?php 
					$class = 'even';
					foreach($result['Communication'] as $Communication){
						$class = ($class=='even')? 'odd' : 'even';
						$style = ($Communication['notification_type']=='Admin')? 'style="font-weight:bold"' : '';
						if($class=='even'){
				?>
				<tr class="<?php echo $class;?>" <?php echo $style;?>>
          <td  width="150" style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top"><?php echo $Communication['notification_type'] . '('. date('d-m-Y',$Communication['created']) ;?>):</td>
          <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top" width="200"><div style="width:200px; word-wrap:break-word;"><?php echo nl2br($Communication['comments'])  ;?></div> </td>
        </tr>
        <?php 
						}else{ ?>
						
							<tr class="<?php echo $class;?>" <?php echo $style;?>>
          <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top"><?php echo $Communication['notification_type'] . '('. date('d-m-Y',$Communication['created']) ;?>):</td>
          <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top" width="200"><div style="width:200px; word-wrap:break-word;"><?php echo nl2br($Communication['comments'])  ;?></div> </td>
        </tr>
						<?php
							
							}
		} ?>
           
	    </table></td>
  </tr>
      
      
		
         
          
          

     <?php } ?>
		<?php
		
		} ?>
    
 
</table></td>
    <td width="3%"><?php echo $this->Html->Image($this->Html->url("/img/" , true) . 'dot.png',array('width'=>1,'height'=>1,'full' => true));?></td>    
    <td valign="top" width="47%">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
     <tr>
    <td><?php echo $this->Html->Image($this->Html->url("/img/" , true) . 'case_data.jpg',array('width'=>98,'height'=>32,'full' => true));?></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0" style="border:1px solid #9d9879; font-size:12px; font-family:Arial, Helvetica, sans-serif; color:#535353;">
    
   
		   
		
      
              <tr>
                <td width="150" style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top">Status:</td>
                <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top"><span class="floatleft pr10"><?php echo $result[$model]['case_status'];?> </span><span class="statusicon" style="padding:2px 0 0;"><?php echo $this->Html->Image($this->Html->url("/img/" , true). Configure::read('case_icon.'.$result[$model]['case_status_id']));?></span></td>
                </tr><tr>
                <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top">Contact Methods:</td>
                <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top"> <?php 
		  	$ContactMethods = array();
		  if ( $result[$model]['subject_communication_email'] == 1) {
			  $ContactMethods[] = 'Email';
		  }
		  if ( $result[$model]['subject_communication_messenger'] == 1) {
			  $ContactMethods[] = 'Messenger';
		  }
		  if ( $result[$model]['subject_communication_phone'] == 1) {
			  $ContactMethods[] = 'Phone';
		  }
		  if ( $result[$model]['subject_communication_webcam'] == 1) {
			  $ContactMethods[] = 'Webcam';
		  }
		  if ( $result[$model]['subject_communication_inperson'] == 1) {
			  $ContactMethods[] = 'In  Person';
		  }
		  echo $m = implode(', ', $ContactMethods);
		  
		  
			  ?> </td>
                </tr>
              
              <tr>
                <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top">Subject's Name:</td>
                <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top"><?php echo $result[$model]['subject_fullname'];?></td>
                </tr>
              <tr>
                <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top">Subject's Alias:</td>
                <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top"><?php echo $result[$model]['subject_alias'];?></td>
                </tr>
                <tr>
                <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top">Subject's Email:</td>
                <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top"><?php echo $result[$model]['subject_email'];?></td>
                </tr>
              <tr>
                <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top">Subject's DOB:</td>
                <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top"><?php 
		echo  $result[$model]['subject_dob'] = ($result[$model]['subject_dob']==0) ? '' : date('D, M j',$result[$model]['subject_dob']);	
		   ?></td>
                </tr>
              <tr>
                <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top">Subject's Phone:</td>
                <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top"><?php 
		echo  $result[$model]['subject_phone'] ;	
		   ?></td>
                </tr>
              <tr>
                <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top">Subject's Address:</td>
                <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top"><?php echo $result[$model]['subject_address'];?></td>
                </tr>
                  <tr>
                <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top">Subject's Employment:</td>
                <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top"><?php 
		echo  $result[$model]['subject_employment'] ;	
		   ?></td>
                </tr>
              <tr>
                <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top">Subject's Education:</td>
                <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top"><?php echo $result[$model]['subject_education'];?></td>
                </tr>
                  <tr>
                <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top">Subject's Background:</td>
                <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top" width="200"> <div style="width:200px; word-wrap:break-word;"><?php echo nl2br($result[$model]['subject_background']);?></div></td>
                </tr>
              <tr>
                <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top">Any ID or documents?</td>
                <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top"><?php echo $result[$model]['subject_id'];?></td>
                </tr>
                  <tr>
                <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top">How long have you known?</td>
                <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top"><?php 
		echo  $result[$model]['subject_how_long'] ;	
		   ?></td>
                </tr>
              <tr>
                <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top">Met on which website?</td>
                <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top"><?php echo $result[$model]['subject_website_met'];?></td>
                </tr>
                
                 <tr>
                <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top">Sent anything to address?</td>
                <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top"><?php 
		echo  $result[$model]['subject_sent_address'] ;	
		   ?></td>
                </tr>
                
        </table></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
    <?php if($result['Quote']['quote_title']!=''  && ! empty($result['Quote']['id'])) {
		?>
		  <tr>
    <td><?php echo $this->Html->Image($this->Html->url("/img/" , true) . 'attachments.jpg',array('width'=>114,'height'=>32,'full' => true));?></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0" style="border:1px solid #9d9879; font-size:12px; font-family:Arial, Helvetica, sans-serif; color:#535353;">
              <tr>
                <td width="150" style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top">Pictures:</td>
                <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top"> <?php 
		  $photos =  $this->Upload->files($model, $result[$model]['id'].'_photo');		
		   foreach($photos as $photo ){
			   echo $photo['basename'] . '&nbsp;&nbsp;(' .$photo['filesize'] . ') <br />';
		   
		   }
		  ?></td>
                </tr>
              <tr>
                <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top">Documents:</td>
                <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top"><?php 
		   $documents =  $this->Upload->files($model, $result[$model]['id'].'_document');		
		   foreach($documents as $document ){
			   echo $document['basename'] . '&nbsp;&nbsp;(' .$document['filesize'] . ') <br />';
		   
		   }
				?> </td>
                </tr>
              
              
        </table></td>
  </tr>
		 
      
   
    <?php if(!empty($result['Communication'])){?>
     <tr>
    <td>&nbsp;</td>
  </tr>
    <tr>
    <td><?php echo $this->Html->Image($this->Html->url("/img/" , true) . 'communication.jpg',array('width'=>128,'height'=>32,'full' => true));?></td>
  </tr>
    
    
     
      <tr>
    <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="border:1px solid #9d9879; font-size:12px; font-family:Arial, Helvetica, sans-serif; color:#535353;">
    
     <?php 
					$class = 'even';
					foreach($result['Communication'] as $Communication){
						$class = ($class=='even')? 'odd' : 'even';
						$style = ($Communication['notification_type']=='Admin')? 'style="font-weight:bold"' : '';
						if($class=='even'){
				?>
				<tr class="<?php echo $class;?>" <?php echo $style;?>>
          <td  width="150" style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top"><?php echo $Communication['notification_type'] . '('. date('d-m-Y',$Communication['created']) ;?>):</td>
          <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top" width="200"><div style="width:200px; word-wrap:break-word;"><?php echo nl2br($Communication['comments'])  ;?></div> </td>
        </tr>
        <?php 
						}else{ ?>
						
							<tr class="<?php echo $class;?>" <?php echo $style;?>>
          <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top"><?php echo $Communication['notification_type'] . '('. date('d-m-Y',$Communication['created']) ;?>):</td>
          <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top" width="200"><div style="width:200px; word-wrap:break-word;"><?php echo nl2br($Communication['comments'])  ;?></div> </td>
        </tr>
						<?php
							
							}
		} ?>
           
	    </table></td>
  </tr>
      
      
		
         
          
          

     <?php } ?>
		<?php
		
		} ?>
  
</table>
  </td>
  </tr>
  <tr>
    <td valign="top">&nbsp;</td>
    <td>&nbsp;</td>
    <td valign="top">&nbsp;</td>
  </tr>
  
   <?php if(!empty($result['InvestigatorNote'])){?>
   
    <tr>
    <td colspan="3" valign="top"><?php echo $this->Html->Image($this->Html->url("/img/" , true) . 'investigator_notes.jpg',array('width'=>155,'height'=>32,'full' => true));?></td>
  </tr>
  <tr>
    <td colspan="3" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="border:1px solid #9d9879; font-size:12px; font-family:Arial, Helvetica, sans-serif; color:#535353;">
    
     <?php 
					$class = 'even';
					foreach($result['InvestigatorNote'] as $InvestigatorNote){
						$class = ($class=='even')? 'odd' : 'even';
				if($class=='even'){		
				?>
				<tr class="<?php echo $class;?>" >
	  
	      <td  width="200" style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top"><?php echo $InvestigatorNote['created_by'];?>: (<?php echo  date('d-m-Y',$InvestigatorNote['created']);?>):</td>
	      <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top"><div style="width:600px; word-wrap:break-word;"><?php echo nl2br($InvestigatorNote['comments'])  ;?></div> </td>
	      </tr>
	   <?php 
				}else{?> 
					<tr class="<?php echo $class;?>" >
	  
	      <td  style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top"><?php echo $InvestigatorNote['created_by'];?>: (<?php echo  date('d-m-Y',$InvestigatorNote['created']);?>):</td>
	      <td style="border-left:1px solid #ffffff; border-right:1px solid #dadada; border-bottom:1px solid #e8e8e8; border-top:1px solid #fbfbfb; padding:3px 10px; line-height:18px; vertical-align:top"><div style="width:600px; word-wrap:break-word;"><?php echo nl2br($InvestigatorNote['comments'])  ;?> </div></td>
	      </tr>
				<?php }
	   
	   } ?>
      
    
    </table></td>
    </tr>
   
  
	 
      
   
         
          
          
          
          
          
          
       
        
        
      
   
     <?php } ?>
 
  <tr>
    <td colspan="3" valign="top">&nbsp;</td>
  </tr>
    </table></td>
  </tr>
</table>








