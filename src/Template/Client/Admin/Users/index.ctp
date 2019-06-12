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
                    <span class="floatleft"><?php echo $this->Paginator->sort('fname', 'First Name'); ?></span><span class="shorting"><a href="/client/admin/users?sort=fname&direction=asc" new_template="1"><img src="<?php echo WEBSITE_URL;?>images/shortup.png" alt=""></a><a href="/client/admin/users?sort=fname&direction=desc" new_template="1"><img src="<?php echo WEBSITE_URL;?>images/shortdown.png" class="two"></a></span>
                <th>
                    <span class="floatleft"><?php echo $this->Paginator->sort('lname', 'Last Name'); ?></span><span class="shorting"><a href="/client/admin/users?sort=lname&direction=asc" new_template="1"><img src="<?php echo WEBSITE_URL;?>images/shortup.png" alt=""></a><a href="/client/admin/users?sort=lname&direction=desc" new_template="1"><img src="<?php echo WEBSITE_URL;?>images/shortdown.png" alt=""></a></span>
                <th>
                    <span class="floatleft"><?php echo $this->Paginator->sort('email', 'Email'); ?></span><span class="shorting"><a href="/client/admin/users?sort=email&direction=asc" new_template="1"><img src="<?php echo WEBSITE_URL;?>images/shortup.png" alt=""></a><a href="/client/admin/users?sort=email&direction=desc" new_template="1"><img src="<?php echo WEBSITE_URL;?>images/shortdown.png" alt=""></a></span>
                <th>
                    <span class="floatleft"><?php echo $this->Paginator->sort('username', 'Login id'); ?></span><span class="shorting"><a href="/client/admin/users?sort=username&direction=asc" new_template="1"><img src="<?php echo WEBSITE_URL;?>images/shortup.png" alt=""></a><a href="/client/admin/users?sort=username&direction=desc" new_template="1"><img src="<?php echo WEBSITE_URL;?>images/shortdown.png" alt=""></a></span>
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
                                // echo $this->Form->postLink('Delete', '/client/admin/users/delete/'.$user->id, [
                                //     'class' => 'deleteuser',
                                //     'confirm' => 'Are you sure you want to delete this user?'
                                // ]);
                            ?>
                            <a href="javascript:void(0);" deleteid="<?= $user->id ?>" class="deleteuser">Delete</a>
                        </div>
                        <div class="btnrt"></div>
                    </div>

                </td>
            </tr>
                <?php $count++; endforeach; ?>
            <?php endif; ?>
        </table>
<style type="text/css">
    button:hover > a {
    text-decoration: none;
}

</style>
    <table class="pagination">
     <td>
        <?php echo (count($users) == 20 ) ? $this->Paginator->prev('<<' . __d('users', 'previous')) : '';?>
      <td>
        <?php echo (count($users) == 20 ) ? $this->Paginator->next(__d('users', 'next') . ' >>') : '';  ?>
      </td>
    </table>
            <!-- <?php echo $this->Paginator->numbers(); ?> -->
    </div>
</div>
<div id="unlock_case_dialog" title="Are you sure?" style="display: none">
    <br/> Are you sure you want to delete this user?
    <div class="floatright pt15" id="floatrightbtn" style="padding-top:20px;">
        <div class="btnlt"></div>
        <form style="display: none;" method="post" action="#" id="delete-form"><input type="hidden" name="_method" value="POST"></form>
        <div class="btnmid"><a href="javascript:void(0);" id="delete_case_lnk" style="color:#FFFFFF">Yes</a></div>
        <div class="btnrt" style="padding-right:2px;"></div>
        <div class="btnlt"></div>
        <div class="btnmid"><a href="/client/admin/users/users/view" id="close_dialog" style="color:#FFFFFF">No</a></div>
        <div class="btnrt"></div>
    </div>
</div>
</div>


<script type="text/javascript">
      jQuery(document).ready(function()
      { 

        $("#unlock_case_dialog").dialog({show:"slide",hide:"slide", width: 350,height: 150,autoOpen: false,resizable: true,draggable: false,modal: true,});

       var val = "<?php echo $_SERVER['REQUEST_URI']; ?>";
         $("[href='"+val+"']").find("img").hide();
      
       jQuery('.deleteuser').click(function(){

            var deleteId = jQuery(this).attr('deleteid');

            var url = '/client/admin/users/delete/'+deleteId;
            jQuery('#delete-form').attr('action', url);
            $('div#unlock_case_dialog').css('overflow','hidden');
            $( "div#unlock_case_dialog").dialog("open");
            //
        
        });

       $('#delete_case_lnk').click(function(){

            jQuery('#delete-form').submit();
            return false;
       });

       $('#unlock_case_dialog #close_dialog').live('click', function()
       {

        $( "div#unlock_case_dialog").dialog("close");
        return false;
       })
      });
</script>