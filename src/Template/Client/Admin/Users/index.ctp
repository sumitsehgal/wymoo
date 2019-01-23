
<h1>View <span>Users </span></h1>
<script>
    var emailregs = /^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i;
</script>
<?= $this->Form->create(null, [
    'url' => '/client/admin/users/',
    'class' => 'form-inline',
    'id' => 'UserAdminViewForm',
    'method' => 'post'
    ]) ?>
    <div style="display:none;">
        <input type="hidden" name="_method" value="POST" />
    </div>
    <div class="case_search">
        <div class="lbl">First Name</div>
        <div class="inputover floatleft pr20">
            <div class="inputlt"></div>
            <div class="inputmid ">
                <?= $this->Form->control('fname', [
                    'type' => 'text',
                    'class' => 'wid120',
                    'id' => 'UserFname',
                    'label' => false,
                    'placeholder' => 'First Name'
                ]) ?>
            </div>
            <div class="inputrt"></div>
        </div>
        <div class="lbl">Last Name</div>
        <div class="inputover floatleft pr20">
            <div class="inputlt"></div>
            <div class="inputmid">
                <?= $this->Form->control('lname', [
                    'type' => 'text',
                    'class' => 'wid120',
                    'id' => 'UserLname',
                    'label' => false,
                    'placeholder' => 'Last Name'
                ]) ?>
            </div>
            <div class="inputrt"></div>
        </div>
        <div class="lbl">Email</div>
        <div class="inputover floatleft pr20">
            <div class="inputlt"></div>
            <div class="inputmid select150">
                <?= $this->Form->control('email', [
                    'type' => 'text',
                    'class' => 'wid120',
                    'id' => 'UserEmail',
                    'label' => false,
                    'placeholder' => 'Email'
                ]) ?>
            </div>
            <div class="inputrt"></div>
        </div>
        <div class="floatleft">
            <div class="btnlt"></div>
            <div class="btnmid">
                    <input type="submit" id="process" value="Search" />
            </div>
            <div class="btnrt"></div>
        </div>
        <div class="clr"></div>
    </div>
    <input type="submit" style="display:none;" />
</form>
<div class="divfull pt15">
    <div class="gridbxover">
        <table width="100%" border="0" cellspacing="0" cellpadding="0" class="tblcaselist">
            <tr>

                <th>
                    <?php echo $this->Paginator->sort('fname', 'First Name'); ?>
                <th>
                    <?php echo $this->Paginator->sort('lname', 'Last Name'); ?>
                <th>
                    <?php echo $this->Paginator->sort('email', 'Email'); ?>
                <th>
                    <?php echo $this->Paginator->sort('username', 'Login id'); ?>
                <th>
                    Action
                </th>

            </tr>
            <?php  $count = 1; if(!empty($users)): ?>
            <?php foreach($users as $user): ?>
            <tr class="<?php echo $count % 2 == 0 ? 'even' : 'odd'; ?>">
                <td><?= $user->fname ?> </td>
                <td><?= $user->lname ?></td>
                <td> <span class="__cf_email__" data-cfemail="204d44415649536057594d4f4f0e434f4d"><?= $user->email ?></span> </td>
                <td><?= $user->username ?></td>

                <td>
                    <div class="floatleft pr10">
                        <div class="btnlt"></div>
                        <div class="btnmid">
                            <a href="/client/admin/users/edit/<?= $user->id ?>">Edit</a> </div>
                        <div class="btnrt"></div>
                    </div> &nbsp;&nbsp;
                    <div class="floatleft pr10">
                        <div class="btnlt"></div>
                        <div class="btnmid">
                            <?php
                                echo $this->Form->postLink('Delete', '/client/admin/users/delete/'.$user->id, [
                                    'class' => 'deleteuser',
                                    'confirm' => 'Are you sure you want to delete this user?'
                                ]);
                            ?>
                            <!-- <a href="/client/admin/users/delete/<?= $user->id ?>" class="deleteuser">Delete</a> -->
                        </div>
                        <div class="btnrt"></div>
                    </div>

                </td>
            </tr>
                <?php $count++; endforeach; ?>
            <?php endif; ?>
        </table>
            <?php echo $this->Paginator->numbers(); ?>
    </div>
</div>
<!-- <div id="unlock_case_dialog" title="Are you sure?">
    <br/> Are you sure you want to delete this user?
    <div class="floatright pt15" id="floatrightbtn" style="padding-top:20px;">
        <div class="btnlt"></div>
        <div class="btnmid"><a href="javascript:void(0);" id="export_case_lnk" style="color:#FFFFFF">Yes</a></div>
        <div class="btnrt" style="padding-right:2px;"></div>
        <div class="btnlt"></div>
        <div class="btnmid"><a href="/client/admin/users/users/view" id="close_dialog" style="color:#FFFFFF">No</a></div>
        <div class="btnrt"></div>
    </div>
</div> -->
</div>