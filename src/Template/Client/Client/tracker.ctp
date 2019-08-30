
<style type="text/css" id="page-css">
/* Styles specific to this particular page */

.scroll-pane {
    width: 100%;
    height: 200px;
    overflow: auto;
    font: 12px/20px Arial, Helvetica, sans-serif;
    color: #333;
}
</style>
<script type="text/javascript">
    $(function() {
        var api = $('.scroll-pane').jScrollPane({
            showArrows: true,
            maintainPosition: false
        });
    });
</script>
<div id="myTabContent" class="tab-content">
    <div id="tracker" class="tab-pane fade active in">
        <div class="content_box">
            <?=$breadcrumb ?>
        </div>
        <?= $this->Flash->render() ?>
        <div class="form_content">
            <h2>Client Info</h2>
        </div>

        <script type="text/javascript">
            $(function() {
                $("div#submit_case_dialog").dialog({
                    autoOpen: false,
                    width: 370,
                    height: 170,
                    modal: true
                });
                $("div#submit_case_dialog").find("#save_notify").click(function(e) {
                    $("#CaseTableCasetrackerForm").submit();
                    e.preventDefault();
                });
                $("#submit_case").click(function(e) {
                    $("div#submit_case_dialog").dialog("open");
                    e.preventDefault();
                });
            });
        </script>
        <div id="submit_case_dialog" title="Submit Case" ><div style="color: #535353;font-family: Arial,Helvetica,sans-serif;font-size: 12px;"><div style="text-align:justify">Please make sure you have reviewed your case and attachments. If you are sure you have included all information needed by your investigator, click "<b>Submit Case</b>". After this step, your case information will no longer be editable.</div><div class="floatright pt15"><div class="btnlt"></div><div class="btnmid"><a href="javascript:void(0);" style="color:#FFFFFF;float:right;"  class="btn btn-default" id="save_notify">Submit Case</a></div><div class="btnrt"></div></div></div></div>
        <?php if($case['case_status_id']==1): ?>
            <?= $this->Form->create($case, ['id'=>'CaseTableCasetrackerForm']) ?>
            <div style="display:none;">
                <input type="hidden" name="request" value="submit">
                <input type="hidden" name="case_status_id" value="3">
            </div>
            <div class="information_end">
                <span>(When you finish adding information and attachments) </span>
                <!-- <button type="submit" class="btn btn-default">Submit Case</button> -->
                <a class="btn btn-default" href="#" id="submit_case">Submit Case</a>
            </div>
            <div class="clearfix"></div>
            <?= $this->Form->end() ?>
        <?php endif; ?>
        <div class="table_tab">
            <div class="table-responsive">
                <table class="table tbl_border ">
                    <tbody>
                        <tr>
                            <td width="50%" valign="top">

                                <table class="table table-hover table_td">
                                    <tbody>
                                        <tr>
                                            <td width="40%">Client:</td>
                                            <td width="60%"><?=$case['client_fname'].' '.$case['client_lname']?></td>
                                        </tr>
                                        <tr class="bg_box">
                                            <td width="40%">Service Type:</td>
                                            <td width="60%">Investigation</td>
                                        </tr>

                                        <tr>
                                            <td width="40%">Assigned To:</td>
                                            <td width="60%"><?php if(!empty($investor)): ?><?=$investor['fname'].' '.$investor['lname']?><?php endif; ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>

                            <td valign="top">

                                <table class="table table-hover table_td">
                                    <tbody>
                                        <tr>
                                            <td width="40%">Due Date:</td>
                                            <td width="60%"><?php echo ($case['due_date']==0) ? 'Pending' : date('D, M j',$case['due_date']);?></td>
                                        </tr>
                                        <tr class="bg_box">
                                            <td width="40%">Case Status:</td>
                                            <td width="60%">
                                               <? if(!empty($case['case_status'])) { ?>
                                                <?=$case['case_status']?>
                                                <span class="statusicon"><?=$this->Html->image($caseIcons[$case['case_status_id']], [
                                                    "alt" => $case['case_status'],
                                                    "value" => $case['case_status_id'],
                                                    "id" => $case['id'],
                                                    "class" => 'chage_stateus',
                                                    "style" => 'cursor:pointer'
                                                ]); ?>
                                                <? } ?>   
                                            </td>
                                        </tr>

                                        <tr>
                                            <td width="40%">Site:</td>
                                            <td width="60%"><?= $case['site_name']?> </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>

                        </tr>

                    </tbody>
                </table>

            </div>

            <div class="content_box case_history">
                <h1>Case<span>HISTORY  </span></h1>
            </div>

            <div class="table-responsive">
                <table class="table table_history table-hover">
                    <tbody>
                        <tr class="bg_history">
                            <td>Notes</td>
                            <td>Date</td>
                            <td>Created By</td>
                            <td>Case Status</td>
                        </tr>
                        <?php if(!empty($case['case_notes'])): $class ='even'; foreach($case['case_notes'] as $key=>$note): $class=($class=="even")?'odd':'even'; ?>
                      
                            <tr class="<?=$class ?>">
                                <td style="width:502px;"><?=$note['case_notes']?></td>
                                 <td width="15%"><?=date('D, M j',$note['created'])?></td>
                                  <td width="15%">
                                    <?php
                              echo ($case['user_id'] != $note['creator_id']) ? 'Admin' : $note['creator_user']['fname'].' '.$note['creator_user']['lname'];  ?> 
                                </td>
                                <td width="" style="border-right:none;">
                                    <span class="floatleft"><?=$note['case_status']?></span> 
                                    <span class="statusicon"><?=$this->Html->image($caseIcons[$note['case_status_id']], [
                                        "alt" => $note['case_status'],
                                        "value" => $note['case_status_id'],
                                        "id" => $note['id'],
                                        "class" => 'chage_stateus',
                                        "style" => 'cursor:pointer'
                                    ]); ?>     
                                </td>
                            </tr>
                        <?php endforeach;endif; ?>
                    </tbody>
                </table>

            </div>

        </div>

    </div>
</div>
