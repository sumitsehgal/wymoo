<h1 class="relative">Edit <span> User </span>
         <div class="btnh1"><div class="btnlt"></div>
            <div class="btnmid"><a href="/client/admin/users/" id="view_users">View users</a></div>
            <div class="btnrt"></div>
        </div>
</h1>

<?= $this->Form->create($user, [
    'url' => '/client/admin/users/edit/'.$user->id,
    'class' => 'form-horizontal',
    'id' => 'UserAdminAddForm',
    'method' => 'post'
]) ?>
    <div style="display:none;">
        <input type="hidden" name="_method" value="PUT" />
    </div>
    
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
                                        <?= $this->Form->control('username', [
                                                'type' => 'text',
                                                'class' => 'wid243',
                                                'id' => 'UserUsername',
                                                'label' => false
                                            ]) ?>
                                        </div>
                                        <div class="inputrt"></div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>First Name:</td>
                                <td>
                                    <div class="inputover floatleft pr20">
                                        <div class="inputlt"></div>
                                        <div class="inputmid">
                                        <?= $this->Form->control('fname', [
                                                'type' => 'text',
                                                'class' => 'wid243',
                                                'id' => 'UserFname',
                                                'label' => false
                                            ]) ?>
                                        </div>
                                        <div class="inputrt"></div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Last Name:</td>
                                <td>
                                    <div class="inputover floatleft pr20">
                                        <div class="inputlt"></div>
                                        <div class="inputmid">
                                        <?= $this->Form->control('lname', [
                                                'type' => 'text',
                                                'class' => 'wid243',
                                                'id' => 'UserLname',
                                                'label' => false
                                            ]) ?>
                                        </div>
                                        <div class="inputrt"></div>
                                    </div><span class="pt5 floatleft"></span></td>
                            </tr>
                            <tr>
                                <td>Email:</td>
                                <td>
                                    <div class="inputover floatleft pr20">
                                        <div class="inputlt"></div>
                                        <div class="inputmid">
                                        <?= $this->Form->control('email', [
                                                'type' => 'email',
                                                'class' => 'wid243',
                                                'id' => 'UserEmail',
                                                'label' => false
                                            ]) ?>
                                        </div>
                                        <div class="inputrt"></div>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>
                    <td valign="top">
                        <table width="100%" border="0" cellspacing="8" cellpadding="0">
                            <tr>
                                <td>Password:</td>
                                <td>
                                    <div class="inputover floatleft pr20">
                                        <div class="inputlt"></div>
                                        <div class="inputmid">
                                        <?= $this->Form->control('newpassword', [
                                                'type' => 'password',
                                                'class' => 'wid243',
                                                'id' => 'UserNewpassword',
                                                'label' => false
                                            ]) ?>
                                        </div>
                                        <div class="inputrt"></div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Confirm Password:</td>
                                <td>
                                    <div class="inputover floatleft pr20">
                                        <div class="inputlt"></div>
                                        <div class="inputmid">
                                        <?= $this->Form->control('temppassword', [
                                                'type' => 'password',
                                                'class' => 'wid243',
                                                'id' => 'UserTemppassword',
                                                'label' => false
                                            ]) ?>
                                        </div>
                                        <div class="inputrt"></div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>User Type:</td>
                                <td>
                                    <div class="inputover floatleft pr20">
                                        <div class="inputlt"></div>
                                        <div class="inputmid select244">
                                        <?= 
                                            $this->Form->select(
                                                'user_type_id',
                                                [4 => 'Full Access', 3 => 'Limited Access']
                                            );
                                        ?>
                                        </div>
                                        <div class="inputrt"></div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td>
                                    <div class="floatleft pr10">
                                        <div class="btnlt"></div>
                                        <div class="btnmid">
                                        <input type="submit" id="update" value="Update User" />
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

</form>