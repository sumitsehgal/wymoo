<?php //$delete_caseurl = $this->Html->url(array('controller'=>'Admin','action'=>'casedelete')); ?>
<div id="middle">
    <h1>Case <span>Browser </span></h1>

    <style type="text/css">
      .alert-success.fade.in{ height: 25px !important; }
      .alert-success.fade.in .close{ margin-top: 5.3px !important; }
      .alert-success.fade.in figure{ margin-top: 5px !important; }
      .alert-success.fade.in strong{ margin-top: 8.10px !important; }
    </style>
    <?= $this->Flash->render() ?>
    <br/>
    <style type="text/css" id="page-css">/* Styles specific to this particular page */.scroll-pane{width: 970px;height: 350px;overflow: auto;font:12px/20px Arial, Helvetica, sans-serif;color:#333;}</style><script type="text/javascript" >$(function(){var api = $('.scroll-pane').jScrollPane({showArrows:true,maintainPosition: false});});</script><script>var emailregs = /^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i;$(function(){var caseid =0;$("img.chage_stateus").click(function(){caseid = $(this).attr("id");$("div#change_status_dialog" ).find("input#casestatus_"+$(this).attr("value")).attr("checked","checked");$("div#change_status_dialog" ).dialog("open");});$("div#change_status_dialog" ).dialog({autoOpen: false, width:250, modal:true, resizable:false });	$("div#change_status_dialog" ).find("#change_status").click(function(e){$("#CaseTableCaseStatus").val( $("div#change_status_dialog" ).find("input[type=radio]:checked").val());$("#CaseTableCaseId").val(caseid);$("#CaseTableAdminChangeCaseStatusForm").submit();e.preventDefault();});});</script><style>.ui-dialog .ui-dialog-content { padding:0px !important;}</style>
    <script type="text/javascript">
        $(document).ready(function () {
            jQuery('#process').click(function(e){
                $("#CaseTableAdminCasebrowserForm").submit(); e.preventDefault(); });
           jQuery('#selectall').click(function(){
             var selected = [];
                $('input[type=checkbox]').each(function()
                {   if($(this).attr('checked'))
                    { selected.push($(this).val());
                      $('input[type=checkbox]').attr('checked',true);
                    }
                    else
                      $('input[type=checkbox]').attr('checked', false);
                }); });
            $("#delete_case").click(function(e){
            
                var selected = [];
                $.each($("input[type='checkbox']:checked"),function()
                {   selected.push($(this).val());  }); 


                if ($('input[type="checkbox"][id!="selectall"]:checked:first').length!=0) {
                    // r=confirm('Do you want to delete this case?');
                    // if(r==true){
                    //     window.location.href="/client/admin/casedelete/"+selected;
                    // }
                    $( "div#submit_case_dialog").dialog({autoOpen: false,width:370,modal:true});
                    $( "div#submit_case_dialog").dialog("open");
                    $("div#submit_case_dialog #save_notify_delete").attr('href', "/client/admin/casedelete/"+selected);


                } else {
                    $("#no_case").empty().html(" <br />No case selected. Please select at least one case to delete case.");
                    $( "div#no_email_case_dialog").dialog({title:"Delete Case"});
                    $( "div#no_email_case_dialog").dialog("open");
                }
                e.preventDefault();
            });
        });

        $(function(){
            var caseid =0;
            $("img.chage_stateus,").click(function(){
                caseid = $(this).attr("id");
                $("div#change_status_dialog" ).find("input#casestatus_"+$(this).attr("value")).attr("checked","checked");
                $("div#change_status_dialog" ).dialog("open");
            });
            $("div#change_status_dialog" ).dialog({autoOpen: false, width:250, modal:true, resizable:false });
            $("div#change_status_dialog" ).find("#change_status").click(function(e){
                $("#CaseTableCaseStatus").val( $("div#change_status_dialog" ).find("input[type=radio]:checked").val());
                $("#CaseTableCaseId").val(caseid);
                $("#CaseTableAdminChangeCaseStatusForm").submit();
                e.preventDefault();
            });
        });




    </script>
<style>.ui-dialog .ui-dialog-content { padding:0px !important;}</style>


<div id="submit_case_dialog" title="Delete Case" style="display:none;" >
    <div style="color: #535353;font-family: Arial,Helvetica,sans-serif;font-size: 12px;padding:5px;">
        <div style="text-align:justify;">
            Are you sure you want to delete selected case? If you are sure, click "<b>Delete Case</b>". After this step, selected case information and attachments will no longer be viewable.
        </div>
        <div class="floatright pt15">
            <div class="btnlt">
            </div>
            <div class="btnmid">
                <a href="javascript:void(0);" style="color:#FFFFFF" id="save_notify_delete">Delete Case</a>
            </div>
            <div class="btnrt">
            </div>
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


<div id="change_status_dialog" title="Change Case Status" style="display:none;" >
	<div class="">
		<table width="100%" cellspacing="0" cellpadding="0" border="0" class="tblcaselist">
			<tr class="even">
				<td ><input  name="casestatus" id="casestatus_2"  type="radio" value="2" /></td>
				<td>Case Saved</td>
			</tr>
			<tr class="odd">
				<td ><input  name="casestatus" id="casestatus_4" type="radio" value="4" /></td>
				<td> Case In Progress</td>
			</tr>
			<tr class="even">
				<td ><input  name="casestatus" id="casestatus_5" type="radio" value="5" /></td>
				<td>Case Cancelled</td>
			</tr>
			<tr class="odd">
				<td ><input  name="casestatus" id="casestatus_6" type="radio" value="6" /></td>
				<td>Case Closed</td>
			</tr>
			<tr class="even">
				<td ><input  name="casestatus" id="casestatus_7" type="radio" value="7" /></td>
				<td>Case On Hold</td>
			</tr>
		</table>
	</div>
	<div class="floatright pt15">
		<div class="btnlt"></div>
		<div class="btnmid">
			<a href="javascript:void(0);"  style="color:#FFFFFF" id="change_status">Save</a>
		</div>
		<div class="btnrt"></div>
	</div>
</div>


    <form action="/client/admin/casebrowser" class="form-inline" id="CaseTableAdminCasebrowserForm" method="post" accept-charset="utf-8">
        <div style="display:none;">
            <input type="hidden" name="_method" value="POST">
        </div>
        <div class="case_search">
            <div class="lbl">Due</div><div class="inputover floatleft pr20">
                <div class="inputlt"></div>
                <div class="inputmid select150">
                    <select name="data[CaseTable][due]" class="selectdue" style="display:none" id="CaseTableDue">
                        <option value="On or before">On or before</option>
                        <option value="After">After</option>
                        <option value="On">On</option>
                    </select>
                    <div class="newListSelected" tabindex="0">
                        <div class="selectedTxt">On or before</div>
                        <div class="SSContainerDivWrapper" style="visibility: visible; top: 25px; height: 69px; left: 0px; display: none;">
                            <ul class="newList duelist" style="height: 69px;">
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
                    <input name="data[CaseTable][due_date]" type="text" placeholder="DD-MM-YYYY" class="wid120" id="CaseTableDueDate">
                </div>
                <div class="inputrt"></div>
            </div>
            <div class="lbl">Site</div>
            <div class="inputover floatleft pr20">
                <div class="inputlt"></div>
                <div class="inputmid select150">
                    <select name="data[CaseTable][site_id]" class="selectsite" style="display:none" id="CaseTableSiteId">
                        <option value="All Sites" >All Sites</option>
                        <option value="Wymoo">Wymoo</option>
                        <option value="Russia PI">Russia PI</option>
                        <option value="Philippine PI">Philippine PI</option>
                    </select>
                    <div class="newListSelected" tabindex="0" style="position: static;">
                        <div class="selectedTxt">All Sites</div>
                        <div class="SSContainerDivWrapper" style="visibility: visible; top: 25px; height: 92px; left: 0px; display: none;">
                            <ul class="newList sitelist" style="height: 92px;">
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
                                <span class="floatleft"><?php echo $this->Paginator->sort('client_fname', 'First Name'); ?></span><span class="shorting"><a href="/client/admin/casebrowser?sort=client_fname&direction=asc" new_template="1"><img src="<?php echo WEBSITE_URL;?>images/shortup.png" alt=""></a><a href="/client/admin/casebrowser?sort=client_fname&direction=desc" new_template="1"><img src="<?php echo WEBSITE_URL;?>images/shortdown.png" class="two"></a></span>
                            </th>
                            <th width="12%">
                                
                                 <span class="floatleft"><?php echo $this->Paginator->sort('client_lname', 'Last Name'); ?></span><span class="shorting"><a href="/client/admin/casebrowser?sort=client_lname&direction=asc" new_template="1"><img src="<?php echo WEBSITE_URL;?>images/shortup.png" alt=""></a><a href="/client/admin/casebrowser?sort=client_lname&direction=desc" new_template="1"><img src="<?php echo WEBSITE_URL;?>images/shortdown.png" alt=""></a></span>
                            </th>
                            <th width="25%">
                                
                                 <span class="floatleft"><?php echo $this->Paginator->sort('client_email', 'Login ID'); ?></span><span class="shorting"><a href="/client/admin/casebrowser?sort=client_email&direction=asc" new_template="1"><img src="<?php echo WEBSITE_URL;?>images/shortup.png" alt=""></a><a href="/client/admin/casebrowser?sort=client_email&direction=desc" new_template="1"><img src="<?php echo WEBSITE_URL;?>images/shortdown.png" alt=""></a></span>
                            </th>
                            <th width="10%">
                                
                                 <span class="floatleft"><?php echo $this->Paginator->sort('site_name', 'Site'); ?></span><span class="shorting"><a href="/client/admin/casebrowser?sort=site_name&direction=asc" new_template="1"><img src="<?php echo WEBSITE_URL;?>images/shortup.png" alt=""></a><a href="/client/admin/casebrowser?sort=site_name&direction=desc" new_template="1"><img src="<?php echo WEBSITE_URL;?>images/shortdown.png" alt=""></a></span>
                            </th>
                            <th width="10%" style="padding:0px;padding-left:5px;">
                                
                                 <span class="floatleft"><?php echo $this->Paginator->sort('due_date', 'Due Date'); ?></span><span class="shorting"><a href="/client/admin/casebrowser?sort=due_date&direction=asc" new_template="1"><img src="<?php echo WEBSITE_URL;?>images/shortup.png" alt=""></a><a href="/client/admin/casebrowser?sort=due_date&direction=desc" new_template="1"><img src="<?php echo WEBSITE_URL;?>images/shortdown.png" alt=""></a></span>
                            </th>
                            <th width="12%">
                                 <span class="floatleft"><?php echo $this->Paginator->sort('submitted_date', 'Days Open'); ?></span><span class="shorting"><a href="/client/admin/casebrowser?sort=submitted_date&direction=asc" new_template="1"><img src="<?php echo WEBSITE_URL;?>images/shortup.png" alt=""></a><a href="/client/admin/casebrowser?sort=submitted_date&direction=desc" new_template="1"><img src="<?php echo WEBSITE_URL;?>images/shortdown.png" alt=""></a></span>
                            </th>
                            <th width="12%" style="border-right:0px;">
                                 <span class="floatleft"><?php echo $this->Paginator->sort('case_status', 'Case Status'); ?></span><span class="shorting"><a href="/client/admin/casebrowser?sort=case_status&direction=asc" new_template="1"><img src="<?php echo WEBSITE_URL;?>images/shortup.png" alt=""></a><a href="/client/admin/casebrowser?sort=case_status&direction=desc" new_template="1"><img src="<?php echo WEBSITE_URL;?>images/shortdown.png" alt=""></a></span>
                            </th>
                            <th style="border-left:0px;">&nbsp;</th>
                        </tr>
                    </tbody>
                </table>

                <div class="scroll-pane">
                    <table width="100%" style="width:970px;" border="0" cellspacing="0" cellpadding="0" class="tblcaselist">
                        <tbody>
                            <?php $count = 1; if(!empty($pages)): ?>
                           <?php /* echo "<pre>"; print_r($pages); */ ?>

                            <?php foreach($pages as $page): ?>
                            <?php $style = ($page['is_read']==0) ? 'style="font-weight:bold"' : ''; ?>
                                <tr class="<?php echo $count % 2 == 0 ? 'even' : 'odd'; ?>" <?= $style ?>>
                                    <td width="3%">
                                        <input type="checkbox" name="id" value="<?= $page['id'] ?>">
                                    </td>
                                    <td width="12%"><?= $page['client_fname'] ?> </td>
                                    <td width="12%"><?= $page['client_lname'] ?></td>
                                    <td width="25%">
                                    <?php if($page['is_exported']==1){ echo $this->Html->image('lock-sm.png'); }else{ echo $this->Html->image("dot.png",['height'=>'13','width'=>'10']); } ?>&nbsp;&nbsp;
                                    <a href="/client/admin/casenotes/<?= $page['id'] ?>?iframe" class="newlink lightbox iframe isread" id="<?= $page['id'] ?>" style="">
                                    <?= $page['client_email'] ?>
                                    </a>	
                                    </td>
                                    <td width="10%"><?= $page['site_name'] ?></td>
                                    <td width="10%"><?php echo ($page['due_date']==0) ? 'Pending' : date('D, M j',$page['due_date']);?> </td>
                                    <td width="12%"><?php echo ($page['is_submited']==0) ? '' : floor((time()-(floor($page['submited_date']/86400)*86400))/86400);?><!-- TODO --></td>
                                    <td nowrap="nowrap"> <!-- TODO -->
                                        <span class="floatleft">
                                            <a href="/client/admin/casetracker/<?=$page['id'] ?>" value="<?=$page['case_status_id']?>" class="newlink"><?= $page['case_status']  ?></a></span><span class="statusicon">
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
               <?php if($user['user_type_id'] == '4' || $user['user_type_id'] == '2'):?> 
                <div class="floatleft pr10">
                    <div class="btnlt"></div>
                    <div class="btnmid">
                        <a href="#" id="delete_case">Delete</a>
                    </div>
                    <div class="btnrt"></div>
                </div>
               <?php endif; ?> 

            </div>
        </form>
        <form action="/client/admin/change_case_status" class="form-inline" id="CaseTableAdminChangeCaseStatusForm" method="post" accept-charset="utf-8">
            <div style="display:none;">
                <input type="hidden" name="_method" value="POST"></div>
                <input type="hidden" name="case_id" id="CaseTableCaseId">
                <input type="hidden" name="case_status" id="CaseTableCaseStatus">
            </div>
        </form> 
        
        <script type="text/javascript">
            function formatTitle(title, currentArray, currentIndex, currentOpts) {  
                return "<div id=\"tip7-title\"><span><a href=\"javascript:;\" onclick=\"$.fancybox.close();\"><?=addslashes($this->Html->Image('fancybox/cross.png'))?></a></span><?=addslashes( $this->Html->Image('fancybox/casenotes_head.png') )?></div>";
            }
            $(document).ready(function(){
               
        $('.duelist li a').click(function(){
              var txt=$(this).text();
              var par=$(this).parents();
              $('.selectdue option[value="' + txt + '"]').attr("selected", "selected");
        });  
        $('.sitelist li a').click(function(){
              var txt=$(this).text();
              $('.selectsite option[value="' + txt + '"]').attr("selected", "selected");
        });             
 
                jQuery(document).ready(function(){
                   var val = "<?php echo $_SERVER['REQUEST_URI']; ?>";
                   $("[href='"+val+"']").find("img").hide();
                });
                jQuery('.isread').click(function(){
                  var  id = $(this).attr('id');
                    $.ajax(
                    {  
                        type : 'POST',
                        url  : 'admin/checkread',
                        data : {id:id},  
                        success: function(success) 
                        {
                            if(success == 'notread')
                            { 
                              $('#'+id).closest("tr").removeAttr("style");
                            }
                        }
                    }); 
                });
                
                jQuery('#edit_case').click(function(e){
                    e.preventDefault();
                    if(jQuery('input[name="id"]:checked').val()){
                        var url = '/client/admin/caseedit/'+jQuery('input[name="id"]:checked:first').val();
                        window.location.href=url;
                    }else
                    {  $("#no_case").empty().html(" <br />No case  selected.  Please select one case to edit case.");
                       $( "div#no_email_case_dialog").dialog({title:"Edit Case"});
                       $( "div#no_email_case_dialog").dialog("open");
                    }
                });
                jQuery('#email_case').click(function(e){
                
                  if(jQuery('input[name="id"]:checked').val() == undefined)
                  {
                       $("#no_case").empty().html(" <br />No case selected. Please select one case to email case.");
                       $( "div#no_email_case_dialog").dialog({title:"Email Case"});
                       $( "div#no_email_case_dialog").dialog("open");
                       return false;
                  }else
                  {
                    $('#email_case_dialog').dialog('open');
                    return false;
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