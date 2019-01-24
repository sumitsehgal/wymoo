
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
                    <?php if($case['case_status_id']==1): ?>
                        <?= $this->Form->create($case) ?>
                            <div style="display:none;">
                                <input type="hidden" name="_method" value="POST">
                            </div>
                            <div class="information_end">
                                <span>(When you finish adding information and attachments) </span>
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
                                                        <td width="60%"><?php //to do service type ?></td>
                                                    </tr>

                                                    <tr>
                                                        <td width="40%">Assigned To:</td>
                    <td width="60%"><?php if(!empty($investor)): ?><?=$investor['fname'].' '.$investor['lname']?><<?php endif; ?></td>
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
                                                            <?=$case['case_status']?>
                                                            <span class="statusicon"><?=$this->Html->image($caseIcons[$case['case_status_id']], [
                                                                "alt" => $case['case_status'],
                                                                "value" => $case['case_status_id'],
                                                                "id" => $case['id'],
                                                                "class" => 'chage_stateus',
                                                                "style" => 'cursor:pointer'
                                                            ]); ?>   
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
                                            <td width="15%"><?=$note['user']['fname'].' '.$note['user']['lname']?></td>
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
      