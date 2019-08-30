<?= $this->Flash->render() ?>
<div id="myTabContent" class="tab-content">

    <div id="Notifications" class="tab-pane fade active in">
        <div class="content_box">
            <h1>Case<span>Notification  </span></h1>
            <script type="text/javascript">
                $(function() {
                    $("#send_notification").click(function(e) {
                        $("#CaseTableNotificationsForm").submit();
                        e.preventDefault();
                    });
                });
            </script>
        </div>

        <div class="table-responsive border_color" style="height:100%"> <table
        class="table table-hover table_td"> <tbody> <?php
        if(!empty($notifications)):  ?> <?php   foreach($notifications as
        $noti):  ?> <tr class="odd"> <td width="40%"><?php echo
        ($noti->notification_type == 'Admin')? "Investigator" :
        $noti->notification_type ?> (<?php echo date('d-m-Y', $noti->created);
        ?>):</td> <td width="60%"><?php echo $noti->comments; ?></td> </tr>
        <?php endforeach;  ?> <?php endif; ?> </tbody> </table> </div>

        <div class="notification_case">

            <form action="/client/client/notifications" class="form-inline" id="CaseTableNotificationsForm" method="post" accept-charset="utf-8">
            <input type="hidden" value="<?php echo $this->request->getParam('_csrfToken'); ?>" name="_csrfToken"  />
                <div style="display:none;">
                    <input type="hidden" name="_method" value="POST">
                </div>
                <textarea name="notification" class="form-control" rows="4" id="CaseTableNotification" <?php if(!empty($valid)) echo $valid; ?>></textarea>
                <a class="btn btn-default" href="javascript:void(0)" id="send_notification" <?php if(!empty($valid)) echo $valid; ?>>Send</a>
                <div style="color:#FF0000;clear:both;margin-left:13px;">
                    <small> <div class="clr"></div>&nbsp;&nbsp; </small>
                </div>
                <div class="clearfix"></div>
            </form>
        </div>
    </div>

    <style type="text/css">
        .chzn-container {
            width: 100%!important;
            z-index: 0!important;
        }
        
        .qq-upload-button {
            z-index: 1!important;
        }
    </style>
</div>