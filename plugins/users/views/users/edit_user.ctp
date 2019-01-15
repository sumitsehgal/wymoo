        <table class="table table-bordered table-striped">
 		 <thead>
    		<tr >
      		<th  style="background-color: #EEEEEE;">
              <div class="row-fluid">
              
                <h1>Edit User
                <div class="pull-right">
                <?php
							 echo $this->Html->link("<i class=\"icon-arrow-left icon-white\"></i> Back To Users",array("action"=> "index"),array("class"=>"btn btn-primary","escape"=>false));
?>
              </div></h1>

                </div>
              </th>
    		</tr>
    <tr >
      <td>
      
<?php echo $this->Form->create($model,array("class"=>"form-horizontal"));
  echo $form->hidden('id');

?>
      <div class="row-fluid">
     
<div class="span12" >
			
		<?php 
		 $DetailFields = array();
		//pr($this->data);
		foreach($userDetailFields as $DetailField){
			echo $this->element('detailfield',array('DetailField'=>$DetailField));
	
			
			
		}?>
		<div class="control-group <?php echo ($form->error($model.".username"))? "error":"";?>">
           <?php echo $form->label($model.".username", "User Name: *",array("class"=>"control-label")); ?>
            <div class="controls">
            <?php echo $form->text($model.".username"); ?><span class="help-inline"><?php echo $form->error($model.".username",array("wrap"=>false)); ?></span>
            </div>
          </div>
          <div class="control-group <?php echo ($form->error($model.".email"))? "error":"";?>">
           <?php echo $form->label($model.".email", "Email Address: *",array("class"=>"control-label")); ?>
            <div class="controls">
            <?php echo $form->text($model.".email"); ?><span class="help-inline"><?php echo $form->error($model.".email",array("wrap"=>false)); ?></span>
            </div>
          </div>
          
            <div class="control-group <?php echo ($form->error($model.".password"))? "error":"";?>">
           <?php echo $form->label($model.".password", "Password: *",array("class"=>"control-label")); ?>
            <div class="controls">
            <?php echo $form->password($model.".password"); ?><span class="help-inline"><?php echo $form->error($model.".password",array("wrap"=>false)); ?></span>
            </div>
          </div>
          
            <div class="control-group <?php echo ($form->error($model.".temppassword"))? "error":"";?>">
           <?php echo $form->label($model.".temppassword", "Confirm Password: *",array("class"=>"control-label")); ?>
            <div class="controls">
            <?php echo $form->password($model.".temppassword"); ?><span class="help-inline"><?php echo $form->error($model.".temppassword",array("wrap"=>false)); ?></span>
            </div>
          </div>
               <div class="control-group <?php echo ($form->error($model.".active"))? "error":"";?>">
           
            <div class="controls">
             <div class="input-prepend">
           <span class="add-on"> <?php echo $form->input($model.".active",array("label"=>false)); ?></span><input type="text" size="16" name="prependedInput2" id="prependedInput2" value="<?php echo __d("users", "Active"); ?>" disabled="disabled" style="width:185px;" class="medium">
           </div>
            </div>
          </div>
          
          
           <div class="form-actions">
            <div class="input" >
			<?php echo $form->button(__d("users", "Save", true),array("class"=>"btn btn-primary")); ?>&nbsp;&nbsp;<?php 
			 echo $this->Html->link("<i class=\"icon-refresh\"></i> Reset",array("action"=> "add_dealer"),array("class"=>"btn primary","escape"=>false));
			?>
            </div>
          </div>
          



</div>
<?php echo $this->Form->end();?>

</div>
          
        
      </td>
    </tr>
  </thead>
 
</table>

           

 