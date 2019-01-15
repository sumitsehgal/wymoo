<?php
echo $this->Form->create($model, array(
    "class" => "form-horizontal"
));
echo $form->hidden('id');
?>
<script type="text/javascript">
function form_submit()
{
$("#UserMyaccountForm").submit();
}
</script>
<div class="content_box">
    <h1>My  <span>Details  </span></h1>
  </div>
<div class="my_details">
<strong>All fields are mandatory.</strong>
<div class="row">


<div class="col-sm-6">
<div class="row">
<div class="col-sm-3"><label>User ID:</label></div>
<div class="col-sm-9"><?php
echo $form->text($model . ".username", array(
    'class' => 'form-control'
));
if ($form->error($model . '.username')) {
?><small  style="color:#FF0000;"> <?php
    echo $form->error($model . '.username');
?> </small><?php
}
?></div>
</div>

<div class="row">
<div class="col-sm-3"><label>First Name:</label></div>
<div class="col-sm-9"><?php
echo $form->text($model . ".fname", array(
    'class' => 'form-control'
));
if ($form->error($model . '.fname')) {
?><small  style="color:#FF0000;"> <?php
    echo $form->error($model . '.fname');
?> </small><?php
}
?></div>
</div>

<div class="row">
<div class="col-sm-3"><label>Last Name:</label></div>
<div class="col-sm-9"><?php
echo $form->text($model . ".lname", array(
    'class' => 'form-control'
));
if ($form->error($model . '.lname')) {
?><small  style="color:#FF0000;"> <?php
    echo $form->error($model . '.lname');
?> </small><?php
}
?></div>
</div>

<div class="row">
<div class="col-sm-3"><label>Your Email:</label></div>
<div class="col-sm-9"><?php
echo $form->text($model . ".email", array(
    'class' => 'form-control'
));
if ($form->error($model . '.email')) {
?><small  style="color:#FF0000;"> <?php
    echo $form->error($model . '.email');
?> </small><?php
}
?></div>
</div>


</div>

<div class="col-sm-6">
<div class="password_section">
<div class="row">
<div class="col-sm-4"><label>Current Password:</label></div>
<div class="col-sm-8"><?php
echo $form->password($model . ".password", array(
    'class' => 'form-control'
));
if ($form->error($model . '.password')) {
?><small  style="color:#FF0000;"> <?php
    echo $form->error($model . '.password');
?> </small><?php
}
?></div>
</div>

<div class="row">
<div class="col-sm-4"><label>New Password:</label></div>
<div class="col-sm-8"><?php
echo $form->password($model . ".newpassword", array(
    'class' => 'form-control'
));
if ($form->error($model . '.newpassword')) {
?><small  style="color:#FF0000;"> <?php
    echo $form->error($model . '.newpassword');
?> </small><?php
}
?></div>
</div>

<div class="row">
<div class="col-sm-4"><label>Phone:</label></div>
<div class="col-sm-8"><?php
echo $form->text($model . ".phone", array(
    'class' => 'form-control'
));
if ($form->error($model . '.phone')) {
?><small  style="color:#FF0000;"> <?php
    echo $form->error($model . '.phone');
?> </small><?php
}
?>

<a class="btn btn-default" href="javascript:void(0)" onclick="form_submit();">Update</a>

</div>
</div>
   
</div>


</div>

</div>
</div>
