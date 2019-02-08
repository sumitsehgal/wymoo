<?php $delete_caseurl = $this->Html->url(array('controller'=>'Admin','action'=>'casedelete')); ?>
<div id="middle">
    <h1>Case <span>Browser </span></h1>
    <?= $this->Flash->render() ?>
    <style type="text/css" id="page-css">/* Styles specific to this particular page */.scroll-pane{width: 970px;height: 350px;overflow: auto;font:12px/20px Arial, Helvetica, sans-serif;color:#333;}</style><script type="text/javascript" >$(function(){var api = $('.scroll-pane').jScrollPane({showArrows:true,maintainPosition: false});});</script><script>var emailregs = /^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i;$(function(){var caseid =0;$("img.chage_stateus").click(function(){caseid = $(this).attr("id");$("div#change_status_dialog" ).find("input#casestatus_"+$(this).attr("value")).attr("checked","checked");$("div#change_status_dialog" ).dialog("open");});$("div#change_status_dialog" ).dialog({autoOpen: false, width:250, modal:true, resizable:false });	$("div#change_status_dialog" ).find("#change_status").click(function(e){$("#CaseTableCaseStatus").val( $("div#change_status_dialog" ).find("input[type=radio]:checked").val());$("#CaseTableCaseId").val(caseid);$("#CaseTableAdminChangeCaseStatusForm").submit();e.preventDefault();});});</script><style>.ui-dialog .ui-dialog-content { padding:0px !important;}</style>
    <script type="text/javascript">
        $(document).ready(function () {
            $("#delete_case").click(function(e){
                if ($('input[type="checkbox"][id!="selectall"]:checked:first').length!=0) {
                    $( "div#submit_case_dialog").dialog("open");
                } else {
                    $("#no_case").empty().html(" <br />No case selected. Please select at least one case to delete case.");
                    $( "div#no_email_case_dialog").dialog({title:"Delete Case"});
                    $( "div#no_email_case_dialog").dialog("open");
                }
                e.preventDefault();
            });
        });
    </script>
    <form action="/client/admin/casebrowser" class="form-inline" id="CaseTableAdminCasebrowserForm" method="post" accept-charset="utf-8">
        <div style="display:none;">
            <input type="hidden" name="_method" value="POST">
        </div>
        <div class="case_search">
            <div class="lbl">Due</div><div class="inputover floatleft pr20">
                <div class="inputlt"></div>
                <div class="inputmid select150">
                    <select name="data[CaseTable][due]" class="select" style="display:none" id="CaseTableDue">
                        <option value="on-or-before">On or before</option>
                        <option value="after">After</option>
                        <option value="on">On</option>
                    </select>
                    <div class="newListSelected" tabindex="0">
                        <div class="selectedTxt">On or before</div>
                        <div class="SSContainerDivWrapper" style="visibility: visible; top: 25px; height: 69px; left: 0px; display: none;">
                            <ul class="newList" style="height: 69px;">
                                <li><a href="JavaScript:void(0);" class="hiLite">On or before</a></li>
                                <li><a href="JavaScript:void(0);">After</a></li>
                                <li><a href="JavaScript:void(0);">On</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="inputrt"></div>
            </div>
            <div class="inputover floatleft pr20">
                <div class="inputlt"></div>
                <div class="inputmid">
                    <input name="data[CaseTable][due_date]" type="text" placeholder="DD-MM-YYYY" class="wid120 hasDatepicker" id="CaseTableDueDate">
                </div>
                <div class="inputrt"></div>
            </div>
            <div class="lbl">Site</div>
            <div class="inputover floatleft pr20">
                <div class="inputlt"></div>
                <div class="inputmid select150">
                    <select name="data[CaseTable][site_id]" class="select" style="display:none" id="CaseTableSiteId">
                        <option value="">All Sites</option>
                        <option value="1">Wymoo</option>
                        <option value="2">Russia PI</option>
                        <option value="3">Philippine PI</option>
                    </select>
                    <div class="newListSelected" tabindex="0" style="position: static;">
                        <div class="selectedTxt">All Sites</div>
                        <div class="SSContainerDivWrapper" style="visibility: visible; top: 25px; height: 92px; left: 0px; display: none;">
                            <ul class="newList" style="height: 92px;">
                                <li><a href="JavaScript:void(0);" class="hiLite">All Sites</a></li>
                                <li><a href="JavaScript:void(0);">Wymoo</a></li>
                                <li><a href="JavaScript:void(0);">Russia PI</a></li>
                                <li><a href="JavaScript:void(0);">Philippine PI</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="inputrt"></div>
            </div>
            <div class="floatleft">
                <div class="btnlt"></div>
                <div class="btnmid">
                    <a href="#" id="process">Process</a>
                </div>
                <div class="btnrt"></div>
            </div>
            <div class="clr"></div>
        </div>
        <input type="submit" style="display:none;">
    </form>
    <form action="/client/admin/cases/cases/casedelete" id="CaseTableAdminCasedeleteForm" class="form-inline" method="post" accept-charset="utf-8">
        <div style="display:none;">
            <input type="hidden" name="_method" value="POST">
        </div>
        <div class="divfull pt15">
            <div class="gridbxover">
                <table width="100%" border="0" cellspacing="0" cellpadding="0" class="tblcaselist">
                    <tbody>
                        <tr>
                            <th width="3%">
                                <input type="checkbox" id="selectall">
                            </th>
                            <th width="12%">
                                <?php echo $this->Paginator->sort('client_fname', 'First Name'); ?>
                            </th>
                            <th width="12%">
                                <?php echo $this->Paginator->sort('client_lname', 'Last Name'); ?>
                            </th>
                            <th width="25%">
                                <?php echo $this->Paginator->sort('client_email', 'Login ID'); ?>
                            </th>
                            <th width="10%">
                                <?php echo $this->Paginator->sort('site_name', 'Site'); ?>
                            </th>
                            <th width="10%" style="padding:0px;padding-left:5px;">
                                <?php echo $this->Paginator->sort('due_date', 'Due Date'); ?>
                            </th>
                            <th width="12%">
                                <?php echo $this->Paginator->sort('submitted_date', 'Days Open'); ?>
                            </th>
                            <th width="12%" style="border-right:0px;">
                                <?php echo $this->Paginator->sort('case_status', 'Case Status'); ?>
                            </th>
                            <th style="border-left:0px;">&nbsp;</th>
                        </tr>
                    </tbody>
                </table>

                <div class="scroll-pane">
                    <table width="100%" style="width:970px;" border="0" cellspacing="0" cellpadding="0" class="tblcaselist">
                        <tbody>
                            <?php $count = 1; if(!empty($pages)): ?>
                            <?php foreach($pages as $page): ?>
                                <tr class="<?php echo $count % 2 == 0 ? 'even' : 'odd'; ?>">
                                    <td width="3%">
                                        <input type="checkbox" name="id" value="<?= $page['id'] ?>">
                                    </td>
                                    <td width="12%"><?= $page['client_fname'] ?> </td>
                                    <td width="12%"><?= $page['client_lname'] ?></td>
                                    <td width="25%">
                                        <?=$this->Html->image("dot.png",['height'=>'13','width'=>'10']); ?>&nbsp;&nbsp;<a href="/client/admin/casenotes/<?= $page['id'] ?>?iframe" class="newlink lightbox iframe" style=""><?= $page['client_email'] ?></a>	
                                    </td>
                                    <td width="10%"><?= $page['site_name'] ?></td>
                                    <td width="10%"><?php echo ($page['due_date']==0) ? 'Pending' : date('D, M j',$page['due_date']);?> </td>
                                    <td width="12%"><?php echo ($page['is_submited']==0) ? '' : floor((time()-(floor($page['submited_date']/86400)*86400))/86400);?><!-- TODO --></td>
                                    <td nowrap="nowrap"> <!-- TODO -->
                                        <span class="floatleft">
                                            <a href="/client/admin/casetracker/<?=$page['id'] ?>" class="newlink"><?= $page['case_status'] ?></a></span><span class="statusicon">
                                                <?php 

                                                echo $this->Html->image($caseIcons[$page['case_status_id']], [
                                                    "alt" => $page['case_status'],
                                                    "value" => $page['case_status_id'],
                                                    "id" => $page['id'],
                                                    "class" => 'chage_stateus',
                                                    "style" => 'cursor:pointer'
                                                ]); 
                                                ?>
                                            </span>
                                        </td>
                                    </tr>
                                    <?php $count++; endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="divfull pt15">
                <div class="floatleft pr10">
                    <div class="btnlt"></div>
                    <div class="btnmid">
                        <a href="/client/admin/casebrowser">Refresh</a>	
                    </div>
                    <div class="btnrt"></div>
                </div>
                <div class="floatleft pr10">
                    <div class="btnlt"></div>
                    <div class="btnmid">
                        <a href="#" id="edit_case">Edit Case</a>
                    </div>
                    <div class="btnrt"></div>
                </div>
                <div class="floatleft pr10">
                    <div class="btnlt"></div>
                    <div class="btnmid">
                        <a href="#" id="email_case">Email Case</a>
                    </div>
                    <div class="btnrt"></div>
                </div>
                <div class="floatleft pr10">
                    <div class="btnlt"></div>
                    <div class="btnmid">
                        <a href="#" id="delete_case">Delete</a>
                    </div>
                    <div class="btnrt"></div>
                </div>
            </div>
        </form>
        <form action="/client/admin/cases/cases/change_case_status" class="form-inline" id="CaseTableAdminChangeCaseStatusForm" method="post" accept-charset="utf-8">
            <div style="display:none;">
                <input type="hidden" name="_method" value="POST"></div>
                <input type="hidden" name="data[CaseTable][case_id]" id="CaseTableCaseId">
                <input type="hidden" name="data[CaseTable][case_status]" id="CaseTableCaseStatus">
            </div>
        </form> 
        <script type="text/javascript">
            function formatTitle(title, currentArray, currentIndex, currentOpts) {  
                return "<div id=\"tip7-title\"><span><a href=\"javascript:;\" onclick=\"$.fancybox.close();\"><?=addslashes($this->Html->Image('fancybox/cross.png'))?></a></span><?=addslashes( $this->Html->Image('fancybox/casenotes_head.png') )?></div>";
            }
            $(document).ready(function(){
                jQuery('#edit_case').click(function(e){
                    e.preventDefault();
                    if(jQuery('input[name="id"]:checked').val()){
                        var url = '/client/admin/caseedit/'+jQuery('input[name="id"]:checked:first').val();
                        window.location.href=url;
                    }
                });
                $(".lightbox").fancybox({
                    "transitionIn"      : "elastic",
                    "transitionOut"     : "elastic",                
                    "titlePosition"     : "outside",
                    "width"             : "80%",                
                    "height"            : "200%",               
                    "titleFormat"       : formatTitle,              
                    "onStart"           : function() {                      
                        $("#fancybox-outer").hide();                    
                    },              
                    "onComplete"        : function() {                      
                        $("#fancybox-outer").show();                    
                    }
                });
            });
        </script>
        <div id="submit_case_dialog" title="Delete Case" style="display:none;" >
            <div style="color: #535353;font-family: Arial,Helvetica,sans-serif;font-size: 12px;padding:5px;">
                <div style="text-align:justify;">
                    Are you sure you want to delete selected case?If you are sure, click "<b>Delete Case</b>". After this step, selected case information and attachments will no longer be viewable.
                </div>
                <div class="floatright pt15">
                    <div class="btnlt"></div>
                    <div class="btnmid">
                        <a href="javascript:void(0);" style="color:#FFFFFF" id="save_notify">Delete Case</a>
                    </div>
                    <div class="btnrt"></div>
                </div>
            </div>
        </div> 
        <div id="no_email_case_dialog" title="Email Case" style="display:none;"  >
            <div style="color: #535353;font-family: Arial,Helvetica,sans-serif;font-size: 12px;">
                <div id="no_case" style="text-align:justify;padding:5px;">
                    <br />No case selected.Please select one case to email case.
                </div>
            </div>
        </div>  
        <div id="email_case_dialog" title="Enter Email Address" style="display:none;" >
            <table width="100%" cellspacing="0" cellpadding="0" border="0">
                <tbody>
                    <tr>
                        <td colspan="2">&nbsp;</td>
                    </tr>
                    <tr>
                        <td>Email Address:</td>
                        <td>
                            <div class="inputover floatleft">
                                <div class="inputlt"></div>
                                <div class="inputmid">
                                    <input type="text" class="wid243" placeholder="Enter Email Address" value=""  id="email_address">
                                </div>
                                <div class="inputrt"></div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>
                            <div class="floatleft">
                                <div class="btnlt"></div>
                                <div class="btnmid">
                                    <a href="#"  style="color:#FFFFFF" id="send_email">Email Case</a>
                                </div>
                                <div class="btnrt"></div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <?php echo $this->Form->create('aaa', array('class'=>'form-inline','id'=>'CaseTableAdminChangeCaseStatusForm','url'=>array('controller'=>'cases','action'=>'change_case_status')));
        echo $this->Form->hidden('case_id');
        echo $this->Form->hidden('case_status');
        echo $this->Form->end();?>