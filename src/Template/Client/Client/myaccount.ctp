<?php $form = $this->Form; ?>
<?=$form->create($user) ?>
<?php  $current_pass=""; if(!empty($user['password_token'])) $current_pass=$user['password_token']; ?>
<style type="text/css">
  .my_details .form-control{
    margin: 0px 0px 8px 0px;
  }

.error-message {
    color: #FF0000;
    margin: 0;
    position: relative;
    top: -5px;
}
</style>
<div class="content_box">
  <h1>My  <span>Details  </span></h1>
</div>
<div class="my_details">
  <strong>All fields are mandatory.</strong>
  <div class="row">
    <div class="col-sm-6">
      <div class="row">
        <div class="col-sm-3"><label>User ID:</label></div>
        <div class="col-sm-9">
          <?=$form->text('username',['class'=>'form-control'])?>
         
           <?php if(isset($errors) && isset($errors['username'])): ?>
          <small class="error-message">
              <?php foreach( $errors['username'] as $err ): ?>
                   <small><?php echo $err; ?></small> 
              <?php endforeach; ?>
          </small>
          <?php endif; ?>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-3"><label>First Name:</label></div>
        <div class="col-sm-9">
          <?=$form->text('fname',['class'=>'form-control'])?>
          <?php if(isset($errors) && isset($errors['fname'])): ?>
          <small class="error-message">
              <?php foreach( $errors['fname'] as $err ): ?>
                   <small><?php echo $err; ?></small> 
              <?php endforeach; ?>
          </small>
          <?php endif; ?>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-3"><label>Last Name:</label></div>
        <div class="col-sm-9">
          <?=$form->text('lname',['class'=>'form-control'])?>
          <?php if(isset($errors) && isset($errors['lname'])): ?>
          <small class="error-message">
              <?php foreach( $errors['lname'] as $err ): ?>
                   <small><?php echo $err; ?></small> 
              <?php endforeach; ?>
          </small>
          <?php endif; ?>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-3"><label>Your Email:</label></div>
        <div class="col-sm-9">
          <?=$form->text('email',['class'=>'form-control'])?>
          <?php if(isset($errors) && isset($errors['email'])): ?>
          <small class="error-message">
              <?php foreach( $errors['email'] as $err ): ?>
                   <small><?php echo $err; ?></small> 
              <?php endforeach; ?>
          </small>
          <?php endif; ?>
        </div>
      </div>
    </div>
    <div class="col-sm-6">
      <div class="password_section">
        <div class="row">
          <div class="col-sm-4"><label>Current Password:</label></div>
          <div class="col-sm-8">
            <?=$form->password('passwd',['class'=>'form-control','value'=>$current_pass])?>
            <?php if(isset($errors) && isset($errors['passwd'])): ?>
            <small class="error-message">
              <?php foreach( $errors['passwd'] as $err ): ?>
                   <small><?php echo $err; ?></small> 
              <?php endforeach; ?>
            </small>
            <?php endif; ?>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-4"><label>New Password:</label></div>
          <div class="col-sm-8">
            <?=$form->password('newpassword',['class'=>'form-control'])?>
            <?php if(isset($errors) && isset($errors['newpassword'])): ?>
            <small class="error-message">
              <?php foreach( $errors['newpassword'] as $err ): ?>
                   <small><?php echo $err; ?></small> 
              <?php endforeach; ?>
            </small>
            <?php endif; ?>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-4"><label>Phone:</label></div>
          <div class="col-sm-8">
            <?=$form->text('phone',['class'=>'form-control'])?>
             <?php if(isset($errors) && isset($errors['phone'])): ?>
            <small class="error-message">
              <?php foreach( $errors['phone'] as $err ): ?>
                   <small><?php echo $err; ?></small> 
              <?php endforeach; ?>
            </small>
            <?php endif; ?>
            <?=$form->submit('Update',['class'=>'btn btn-default pull-right'])?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?=$form->end()?>