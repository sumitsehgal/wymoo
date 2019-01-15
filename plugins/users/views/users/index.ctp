<script>$(function(){	$("a.btn-danger").click(function(e){		if(confirm('Are you want to delete this user?')){		$(this).parents('tr.gallerytr').slideUp('slow').remove();$.ajax({url:$(this).attr('href')});		}	 		e.preventDefault();	});   });</script>        
<table class="table table-bordered table-striped">
<thead>
<tr  >
<th style="background-color: #EEEEEE;">
<div class="row-fluid">
<h1>Users<div class="pull-right">
<?php 
echo $this->Html->link('<i class="icon-plus icon-white"></i> Add New',array('action'=> 'add_user'),array('class'=>'btn btn-primary','escape'=>false));
?>
</div></h1></div>
</th>
</tr>
<tr >
<td>
<div class="row-fluid">
<div class="span4">
<?php  echo $this->element('paging_info'); ?>
</div>
<div class="span8"><div class=" pull-right"><?php echo $this->Form->create($model, array('class'=>'form-inline'));?>
<?php echo $form->text('username',array('placeholder'=>'User Name','class'=>'input-medium')); ?>&nbsp;&nbsp;<?php echo $form->text('email',array('placeholder'=>'Email Address','class'=>'input-medium')); ?>&nbsp;&nbsp;<?php echo $form->text('name',array('placeholder'=>'Enter Name','class'=>'input-medium')); ?>&nbsp;&nbsp;  <?php echo $this->Form->button("<i class='icon-search icon-white'></i> Search",array('class'=>'btn btn-primary','escape'=>false));?>
&nbsp;&nbsp;
<?php echo $this->Form->end();?></div>
</div>
<table width="100%"  class="table table-bordered table-striped" align="center" border="0" cellspacing="0" cellpadding="0">
<tr style="height:30px;">
<td width="20%" align="left" class="padleft_15px"><b><?php  echo $this->Paginator->sort('User Name','username',array('char'=>true));?></b> </td>
<td width="20%" align="left" class=""><b><?php  echo $this->Paginator->sort('Email Address','email',array('char'=>true));?></b></td>
<td width="20%" align="left" class=""><b><?php  echo $this->Paginator->sort('Name','name',array('char'=>true));?></b></td>
<td width="20%" align="left" class=""><b><?php  echo $this->Paginator->sort('Modified','modified',array('char'=>true));?></b></td>
<td align="center" class=""><b>Action</b></td>
</tr>
<?php 
if( !empty($result) ) {

$i =  1; 

foreach( $result as $records ) { 
?>
<tr style="height:30px;" class="gallerytr">

<td  align="left" class="padleft_15px"><?php echo $records[$model]['username']; ?></td>
<td  align="left"><?php echo $records[$model]['email']; ?></td>
<td  align="left"><?php echo $records[$model]['name'];  ?></td>
<td  align="left"><?php echo $records[$model]['modified'];  ?></td>

<td  align="center">
<?php echo $this->Html->link('<i class="icon-pencil icon-white"></i> Edit', array('action' => 'edit_user',$records[$model]['id']),array('class'=>'btn btn-primary','escape' => false))?>&nbsp;
<?php echo $this->Html->link('<i class="icon-trash icon-white"></i> Delete', array('action' => 'delete_user',$records[$model]['id']),array('class'=>'btn btn-danger','escape' => false))?>

</td>
</tr>
<?php
$i++;
} ?>
<tr><td align="right" colspan="5" class="border_right"><img src="<?php echo WEBSITE_ADMIN_IMG_URL;?>dot.gif" width="1" height="10" alt="" /> </td></tr></table>
<?php echo $this->element('pagination'); ?> 
<?php } 
else { ?>
<tr>
<td align="center" style="text-align:center;" colspan="5" class="border_right"> No Result Found </td>
</tr></table>
<?php } ?>

</td>
</tr>
</thead>

</table>