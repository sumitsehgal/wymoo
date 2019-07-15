<h1 class="relative">Admin <span>Details </span>
<?php  $current_pass=""; if(!empty($user['password_token'])) $current_pass=$user['password_token']; ?>

<?php if($user['user_type_id'] == '4' || $user['user_type_id'] == '2'):?> 
  <div class="btnh1">
    <div class="btnlt"></div>
    <div class="btnmid">
      <a href="/client/admin/users/add" id="add_user">Add new users</a>
    </div>
    <div class="btnrt"></div>
  </div>
<?php endif; ?> 
</h1>
<?= $this->Form->create($user,[
        'url'=>'/client/admin/myaccount',
        'class' => 'form-horizontal',
          'id' => 'UserAdminMyaccountForm',
        'method' => 'post'
]) ?>
  <div style="display:none;">
    <input type="hidden" name="_method" value="PUT" />
    <input type="hidden" value="<?php echo $this->request->getParam('_csrfToken'); ?>" name="_csrfToken"  />
  </div>
  <input type="hidden" name="id" value="5369" id="UserId" />
  <div class="divfull">
    <div class="gradbox">
      <small style="color:#FF0000"> All fields are mandatory.</small>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td valign="top">
            <table width="100%" border="0" cellspacing="8" cellpadding="0">
              <tr>
                <td>User ID:</td>
                <td>
                  <div class="inputover floatleft pr20">
                    <div class="inputlt"></div>
                    <div class="inputmid">
                        <?php echo $this->Form->control('username', ['type' => 'text', 'class'=>'wid243', 'id'=>'UserUsername', 'label'=>false]); ?>
                          
                    </div>
                    <div class="inputrt"></div>
                  </div>
                </td>
              </tr>
            <?php if(isset($errors) && isset($errors['username'])): ?>
            <tr>
            <td>&nbsp;</td>
            <td><small  style="color:#FF0000;">
                  <?php foreach( $errors['username'] as $err ): ?>
                      <?php echo $err; ?> 
                  <?php endforeach; ?>
                </small>
            </td>
            </tr>
            <?php endif; ?>
              <tr>
                <td>First Name:</td>
                <td><div class="inputover floatleft pr20">
                  <div class="inputlt"></div>
                  <div class="inputmid">
                      <?php echo $this->Form->control('fname', ['type' => 'text', 'class'=>'wid243', 'id'=>'UserFname', 'label'=>false]); ?>
                  </div>
                  <div class="inputrt"></div>
                </div>
              </td>
            </tr>
           <?php if(isset($errors) && isset($errors['fname'])): ?>
            <tr>
            <td>&nbsp;</td>
            <td><small  style="color:#FF0000;">
                  <?php foreach( $errors['fname'] as $err ): ?>
                      <?php echo $err; ?> 
                  <?php endforeach; ?>
                </small>
            </td>
            </tr>
            <?php endif; ?>
            <tr>
              <td>Last Name:</td>
              <td>
                <div class="inputover floatleft pr20">
                  <div class="inputlt"></div>
                  <div class="inputmid">
                      <?php echo $this->Form->control('lname', ['type' => 'text', 'class'=>'wid243', 'id'=>'UserLname', 'label'=>false]); ?>
                  </div>
                  <div class="inputrt"></div>
                </div>
                <span class="pt5 floatleft"></span>
              </td>
            </tr>
            <?php if(isset($errors) && isset($errors['lname'])): ?>
            <tr>
            <td>&nbsp;</td>
            <td><small  style="color:#FF0000;">
                  <?php foreach( $errors['lname'] as $err ): ?>
                      <?php echo $err; ?> 
                  <?php endforeach; ?>
                </small>
            </td>
            </tr>
            <?php endif; ?>
            <tr>
              <td>Your Email:</td>
              <td>
                <div class="inputover floatleft pr20">
                  <div class="inputlt"></div>
                  <div class="inputmid">
                      <?php echo $this->Form->control('email', ['type' => 'email', 'class'=>'wid243', 'id'=>'UserEmail', 'label'=>false]); ?>
                  </div>
                  <div class="inputrt"></div>
                </div>
              </td>
            </tr>
            <?php if(isset($errors) && isset($errors['email'])): ?>
            <tr>
            <td>&nbsp;</td>
            <td><small  style="color:#FF0000;">
                  <?php foreach( $errors['email'] as $err ): ?>
                      <?php echo $err; ?> 
                  <?php endforeach; ?>
                </small>
            </td>
            </tr>
            <?php endif; ?>
          </table>
        </td>
        <td valign="top">
          <table width="100%" border="0" cellspacing="8" cellpadding="0">
            <tr>
              <td>Current Password:</td>
              <td><div class="inputover floatleft pr20">
                <div class="inputlt"></div>
                <div class="inputmid">
                    <?php echo $this->Form->control('passwd', ['type' => 'password', 'class'=>'wid243', 'id'=>'UserPassword', 'label'=>false, 'value'=>$current_pass]); ?>
                </div>
                <div class="inputrt"></div>
              </div>
            </td>
          </tr>
          <?php if(isset($errors) && isset($errors['passwd'])): ?>
           <tr>
            <td>&nbsp;</td>
            <td><small  style="color:#FF0000;">
                  <?php foreach( $errors['passwd'] as $err ): ?>
                      <?php echo $err; ?> 
                  <?php endforeach; ?>
                </small>
            </td>
            </tr>
          <?php endif; ?>
          <tr>
            <td>New Password:</td>
            <td><div class="inputover floatleft pr20">
              <div class="inputlt"></div>
              <div class="inputmid">
                  <?php echo $this->Form->control('newpassword', ['type' => 'password', 'class'=>'wid243', 'id'=>'UserNewpassword', 'label'=>false]); ?>
              </div>
              <div class="inputrt"></div>
            </div>
          </td>
        </tr>
        <?php if(isset($errors) && isset($errors['newpassword'])): ?>
            <tr>
            <td>&nbsp;</td>
            <td><small  style="color:#FF0000;">
                  <?php foreach( $errors['newpassword'] as $err ): ?>
                      <?php echo $err; ?> 
                  <?php endforeach; ?>
                </small>
          </td>
          </tr>
         <?php endif; ?>
        <tr>
          <td>Phone:</td>
          <td>
            <div class="inputover floatleft pr20">
              <div class="inputlt"></div>
              <div class="inputmid">
                  <?php echo $this->Form->control('phone', ['type' => 'text', 'class'=>'wid243', 'id'=>'UserPhone', 'label'=>false]); ?>
              </div>
              <div class="inputrt"></div>
            </div>
          </td>
        </tr>
         <?php if(isset($errors) && isset($errors['phone'])): ?>
            <tr>
            <td>&nbsp;</td>
            <td><small  style="color:#FF0000;">
                  <?php foreach( $errors['phone'] as $err ): ?>
                      <?php echo $err; ?> 
                  <?php endforeach; ?>
                </small>
            </td>
            </tr>
            <?php endif; ?>
        <tr>
          <td>&nbsp;</td>
          <td>
            <div class="floatleft pr10">
              <div class="btnlt"></div>
              <div class="btnmid">
                  <input type="submit" id="update" value="Update" />
              </div>
              <div class="btnrt"></div>
            </div>
          </td>
        </tr>
      </table>
    </td>
  </tr>
</table>
</div>
</div>

<input type="submit" style="display:none" />


<?= $this->Form->end() ?>
  </div>