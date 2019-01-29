<?php $form = $this->Form; ?>
<?=$form->create($user) ?>
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
        </div>
      </div>
      <div class="row">
        <div class="col-sm-3"><label>First Name:</label></div>
        <div class="col-sm-9">
          <?=$form->text('fname',['class'=>'form-control'])?>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-3"><label>Last Name:</label></div>
        <div class="col-sm-9">
          <?=$form->text('lname',['class'=>'form-control'])?>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-3"><label>Your Email:</label></div>
        <div class="col-sm-9">
          <?=$form->text('email',['class'=>'form-control'])?>
        </div>
      </div>
    </div>
    <div class="col-sm-6">
      <div class="password_section">
        <div class="row">
          <div class="col-sm-4"><label>Current Password:</label></div>
          <div class="col-sm-8">
            <?=$form->password('passwd',['class'=>'form-control','value'=>'xxxxxx'])?>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-4"><label>New Password:</label></div>
          <div class="col-sm-8">
            <?=$form->password('newpassword',['class'=>'form-control'])?>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-4"><label>Phone:</label></div>
          <div class="col-sm-8">
            <?=$form->text('phone',['class'=>'form-control'])?>
            <?=$form->submit('Update',['class'=>'btn btn-default pull-right'])?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?=$form->end()?>