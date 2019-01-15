<?php
//echo $javascript->link(array('jquery.stylish-select.js','fancybox/jquery.fancybox-1.3.4.pack.js','jquery.mousewheel.js','jquery.jscrollpane.min.js'),false); 
 

//echo $this->Html->css(array('jquery.jscrollpane','fancybox/jquery.fancybox-1.3.4'),'stylesheet', array('inline' => false ) ); 
$edit_caseurl = $this->Html->url(array('plugin'=>'cases','controller'=>'cases','action'=>'caseinfo'));
$view_caseurl = $this->Html->url(array('plugin'=>'cases','controller'=>'cases','action'=>'casenotes'));
$email_caseurl = $this->Html->url(array('plugin'=>'cases','controller'=>'cases','action'=>'caseemail'));
$delete_caseurl = $this->Html->url(array('plugin'=>'cases','controller'=>'cases','action'=>'casedelete'));
echo $javascript->codeBlock(' 

function formatTitle(title, currentArray, currentIndex, currentOpts) {
	
    return "<div id=\"tip7-title\"><span><a href=\"javascript:;\" onclick=\"$.fancybox.close();\">'. addslashes($this->Html->Image('fancybox/cross.png')).'</a></span>'.  addslashes( $this->Html->Image('fancybox/casenotes_head.png') ) .'</div>";
}



$(document).ready(function () {
	$(".select").sSelect({ ddMaxHeight: "300px" });
	$("#CaseTableDueDate").datepicker({dateFormat:"dd-mm-yy"});
	$("#process").click(function(e){
		$("#CaseTableAdminCasebrowserForm").submit();
		e.preventDefault();
	});
	$("#refresh").click(function(e){
		window.location.reload(true);
		e.preventDefault();
	});
	$("#edit_case").click(function(e){
		if ($("input[type=\"checkbox\"][id!=\"selectall\"]:checked:first").length!=0) {
			$("input[type=\"checkbox\"][id!=\"selectall\"]:checked:first").parents("tr").css("font-weight","normal");
			window.location.href = "' . $edit_caseurl. '/" + $("input[type=\"checkbox\"][id!=\"selectall\"]:checked:first").val() ;
		} else {
			$("#no_case").empty().html(" <br />No case selected. Please select one case to edit case.");
			 $( "div#no_email_case_dialog").dialog({title:"Edit Case"});
			 $( "div#no_email_case_dialog").dialog("open");
		 	//alert("No cases selected.  Cannot edit case");
		}
		
		e.preventDefault();
	});
	$("#view_case").click(function(e){
		if ($("input[type=\"checkbox\"][id!=\"selectall\"]:checked:first").length!=0) {
			window.location.href = "' . $view_caseurl. '/" + $("input[type=\"checkbox\"][id!=\"selectall\"]:checked:first").val() ;
		} else {
			$("#no_case").empty().html(" <br />No case selected. Please select one case to view case.");
			
			  $( "div#no_email_case_dialog").dialog({title:"View Case"});
			 $( "div#no_email_case_dialog").dialog("open");
			// alert("No cases selected.  Cannot view case");
		}
		
		e.preventDefault();
	});
	$("#email_case").click(function(e){
		if ($("input[type=\"checkbox\"][id!=\"selectall\"]:checked:first").length!=0) {
			
			$("div#email_case_dialog" ).dialog("open");
		} else {
			$("#no_case").empty().html(" <br />No case selected. Please select one case to email case.");
			 $( "div#no_email_case_dialog").dialog({title:"Email Case"});
			
			 $( "div#no_email_case_dialog").dialog("open");
		}
		
		e.preventDefault();
	});
	
	$("#selectall").click(function(e){
		$("input[type=\"checkbox\"][id!=\"selectall\"]").attr("checked",$(this).attr("checked"));
	
	});
	
	$(".lightbox").fancybox({
				"transitionIn"		: "elastic",
				"transitionOut"		: "elastic",
				"titlePosition" 		: "outside",
				"width"				: "80%",
				"height"			: "200%",
				"titleFormat"		: formatTitle,
				"onStart"		: function() {
						$("#fancybox-outer").hide();
					},
				"onComplete"		: function() {
						$("#fancybox-outer").show();
					}	
					
		});
		
		$("div#email_case_dialog" ).dialog({
				autoOpen: false,
				width:400,
				modal:true
							
			});	
			$("div#email_case_dialog" ).find("#send_email").click(function(e){
				if($("#email_address").val()=="" ){
				 	//alert("Please enter email address."); 
					$("#no_case").empty().html(" <br />Please enter email address to send email.");
					 $( "div#no_email_case_dialog").dialog({title:"Send Email Case"});
					
					 $( "div#no_email_case_dialog").dialog("open");
					
					return false;
				}
				if(!(emailregs . test($("#email_address").val())) ){
					//alert("Please enter valid email address.");
					$("#no_case").empty().html(" <br />Please enter valid email address to send email.");
					 $( "div#no_email_case_dialog").dialog({title:"Send Email Case"});
					 $( "div#no_email_case_dialog").dialog("open");
					 return false;
				}
				window.location.href = "' . $email_caseurl. '/" + $("input[type=\"checkbox\"][id!=\"selectall\"]:checked:first").val() + "/" + $("#email_address").val();
				e.preventDefault();
			});
	
			
		
});',array('allowCache'=>true,'safe'=>true,'inline'=>false));
	 //pr($result);
?>
<style type="text/css" id="page-css">
			/* Styles specific to this particular page */
			.scroll-pane
			{
				width: 970px;
				height: 380px;
				overflow: auto;
				font:12px/20px Arial, Helvetica, sans-serif;
				color:#333;
			}
		</style>
<script type="text/javascript" >
			$(function()
			{
				var api = $('.scroll-pane').jScrollPane(
					{
						showArrows:true,
						maintainPosition: false
					}
				);
				
				
			});
		</script>
<script>
	var emailregs = /^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i;
$(function(){
	var caseid =0;
 $("img.chage_stateus").click(function(){
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

<div id="change_status_dialog" title="Change Case Status" style="display:none;" >
 
    <div class="">
      <table width="100%" cellspacing="0" cellpadding="0" border="0" class="tblcaselist">
     
        <tr class="even"><td >
          <input  name="casestatus" id="casestatus_2"  type="radio" value="2" />
          </td>
          <td>Case Saved</td>
        </tr>
       
        <tr class="odd"><td >
          <input  name="casestatus" id="casestatus_4" type="radio" value="4" />
          </td>
          <td> Case In Progress</td>
        </tr>
        <tr class="even"><td >
          <input  name="casestatus" id="casestatus_5" type="radio" value="5" />
          </td>
          <td>Case Cancelled</td>
        </tr>
        <tr class="odd"><td >
          <input  name="casestatus" id="casestatus_6" type="radio" value="6" />
          </td>
          <td>Case Closed</td>
        </tr>
        <tr class="even"><td >
          <input  name="casestatus" id="casestatus_7" type="radio" value="7" />
          </td>
          <td>Case On Hold</td>
        </tr>
      </table>
    </div>
    <div class="floatright pt15">
      <div class="btnlt"></div>
      <div class="btnmid"><a href="javascript:void(0);"  style="color:#FFFFFF" id="change_status">Save</a></div>
      <div class="btnrt"></div>
    </div>
 
</div>

<?php echo $this->Form->create($model, array('class'=>'form-inline','url'=>array('plugin'=>'cases','controller'=>'cases','action'=>'casebrowser')));

?>

    <div class="case_search">
    	<div class="lbl">Due</div>
        <div class="inputover floatleft pr20">
        	<div class="inputlt"></div>
            <div             
class="inputmid select150">
             <?php echo $form->select($model.'.due',Configure::read('due'),null,array('empty'=>false,'class'=>'select','style'=>'display:none'));?>
         </div>
            <div class="inputrt"></div>
        </div>
        <div class="inputover floatleft pr20">
        	<div class="inputlt"></div>
            <div class="inputmid">
            <?php echo $form->text($model.'.due_date',array('placeholder'=>"DD-MM-YYYY",'class'=>'wid120'));?>
           
           </div>
            <div class="inputrt"></div>
        </div>
        <div class="lbl">Site</div>
        <div class="inputover floatleft pr20">
        	<div class="inputlt"></div>
            <div class="inputmid select150">
             <?php echo $form->select($model.'.site_id',Configure::read('all_sites'),null,array('empty'=>'All Sites','class'=>'select','style'=>'display:none'));?>
           </div>
            <div class="inputrt"></div>
        </div>
        <div class="floatleft">
        	<div class="btnlt"></div>
            <div class="btnmid"><a href="#" id="process">Process</a></div>
            <div class="btnrt"></div>
        </div>
        <div class="clr"></div>
    </div><input type="submit" style="display:none;" />
     <?php echo $this->Form->end();?>
     
 <?php echo $this->Form->create($model, array('id'=>'CaseTableAdminCasedeleteForm','class'=>'form-inline','url'=>array('plugin'=>'cases','controller'=>'cases','action'=>'casedelete')));

?>    
    <div class="divfull pt15">
    	<div class="gridbxover">
        	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="tblcaselist">
              <tr>
                <th width="3%"><input type="checkbox" id="selectall" /></th>
                <th width="12%">
                 <?php  echo $this->Paginator->sort('First name','client_fname',array('new_template'=>true));?>
               </th>
                <th  width="12%">
                  <?php  echo $this->Paginator->sort('Last name','client_lname',array('new_template'=>true));?>
               </th>
                <th  width="25%">
                 <?php  echo $this->Paginator->sort('Login ID','client_login_id',array('new_template'=>true));?>
               </th>
                <th width="10%">
                 <?php  echo $this->Paginator->sort('Site','site_name',array('new_template'=>true));?>
               </th>
                <th width="10%" style="padding:0px;padding-left:5px;">
                 <?php  echo $this->Paginator->sort('Due Date','due_date',array('new_template'=>true));?>
               </th>
                <th width="12%">
                 <?php  echo $this->Paginator->sort('Days Open','submited_date',array('new_template'=>true));?>
               </th>
                <th width="12%"  style="border-right:0px;">
                 <?php  echo $this->Paginator->sort('Case Status','case_status',array('new_template'=>true));?>
               </th>
               <th style="border-left:0px;">&nbsp;</th>
             </tr>
             </table>
             <div class="scroll-pane" <?php if(count($result) < 13){?> style="height:100% !important" <?php }?>>
				
				<table width="100%" style="width:970px;" border="0" cellspacing="0" cellpadding="0" class="tblcaselist">
            <?php if(!empty($result)){
					$class = 'even';
					$i = 0;
					foreach($result as $record){
						
						$class = ($class=='even')? 'odd' : 'even';
						$style = ($record[$model]['is_read']==0) ? 'style="font-weight:bold"' : '';
						//if($i==1) continue;$i++;
						
				?>
				<tr  class="<?php echo $class;?>" <?php echo $style;?>>
                <td  width="3%"><input type="checkbox" name="data[<?php echo $model;?>][id][]" value="<?php echo $record[$model]['id'];?>" /></td>
                <td  width="12%"><?php echo $record[$model]['client_fname'];?> </td>
                <td  width="12%"><?php echo $record[$model]['client_lname'];?></td>
                <td  width="25%"> <?php 
			  $url = FULL_BASE_URL . $this->Html->url(array('plugin'=>'cases','controller'=>'cases','action'=> 'casenotes','admin'=>true,$record[$model]['id']));
			 echo $this->Html->link( $record[$model]['client_login_id'],$url .'?iframe',array('class'=>'newlink lightbox iframe','onclick'=>'$(this).parents("tr").css("font-weight","normal");','style'=>''));
			?>	</td>
                <td  width="10%"><?php echo $record[$model]['site_name'];?></td>
                <td  width="10%"><?php echo ($record[$model]['due_date']==0) ? 'Pending' : date('D, M j',$record[$model]['due_date']);?></td>
                <td  width="12%"><?php 
				// echo (floor($record[$model]['submited_date']/86400)*86400);
				echo ($record[$model]['is_submited']==0) ? '' : floor((time()-(floor($record[$model]['submited_date']/86400)*86400))/86400);?></td>
                <td    nowrap="nowrap"><span class="floatleft"><?php 
			 echo $this->Html->link( $record[$model]['case_status'],array('plugin'=>'cases','controller'=>'cases','action'=> 'casetracker','admin'=>true,$record[$model]['id']),array('class'=>'newlink'));
			
			?></span><span class="statusicon"><?php //echo $this->Html->Image(Configure::read('case_icon.'.$record[$model]['case_status_id']));?>
              
                
              <?php echo $this->Html->Image(Configure::read('case_icon.'.$record[$model]['case_status_id']),array('id'=>$record[$model]['id'],'value'=>$record[$model]['case_status_id'],'class'=>'chage_stateus','style'=>'cursor:pointer'));?></span> </td>
              </tr>
            
				<?php
				
					}
				}else{
					?>
					<tr class="odd">
               	 <td colspan="8" align="center"><?php __('No record found.');?></td>
             
              </tr>
					<?php
				
				}
			?> 
              
             
        </table>
				
				
				
			</div>
                  

        </div>
    </div>
    <div class="divfull pt15">
    	<div class="floatleft pr10">
        	<div class="btnlt"></div>
            <div class="btnmid">
            <?php 
			 echo $this->Html->link( 'Refresh',array('plugin'=>'cases','controller'=>'cases','action'=> 'casebrowser','admin'=>true));
			
			?>	</div>
            <div class="btnrt"></div>
        </div>
        <div class="floatleft pr10">
        	<div class="btnlt"></div>
            <div class="btnmid"><a href="#" id="edit_case">Edit Case</a></div>
            <div class="btnrt"></div>
        </div>
        <div class="floatleft pr10">
        	<div class="btnlt"></div>
            <div class="btnmid"><a href="#" id="email_case">Email Case</a></div>
            <div class="btnrt"></div>
        </div>
       <?php /*?> <div class="floatleft pr10">
        	<div class="btnlt"></div>
            <div class="btnmid"><a href="#" id="view_case">View Case</a></div>
            <div class="btnrt"></div>
        </div><?php */?>
        <?php
		if($role=='Administrator'){ ?>
        <div class="floatleft pr10">
        	<div class="btnlt"></div>
            <div class="btnmid"><a href="#" id="delete_case">Delete</a></div>
            <div class="btnrt"></div>
        </div>
        <?php } ?>
    </div>
    
    <?php 
					
								echo $javascript->codeBlock('

	$(function(){
		$("div#submit_case_dialog" ).dialog({
			autoOpen: false,
			width:370,
			modal:true				
		});	
			
		$("div#submit_case_dialog" ).find("#save_notify").click(function(e){
		  $("#CaseTableAdminCasedeleteForm").submit();
		e.preventDefault();
		});
	
		$("div#no_email_case_dialog" ).dialog({
				autoOpen: false,
				modal:true				
			});	
			
		 $("#delete_case").click(function(e){
			if ($("input[type=\"checkbox\"][id!=\"selectall\"]:checked:first").length!=0) {
				 $( "div#submit_case_dialog").dialog("open");
				
			} else {
				$("#no_case").empty().html(" <br />No case selected. Please select at least one case to delete case.");
					 $( "div#no_email_case_dialog").dialog({title:"Delete Case"});
					 $( "div#no_email_case_dialog").dialog("open");
				// alert("No cases selected.  Cannot delete case");
			}
			
			e.preventDefault();
		});
	});

 
',array('allowCache'=>true,'safe'=>true,'inline'=>false));

		?>
		<div id="submit_case_dialog" title="Delete Case" style="display:none;" >
 <div style="color: #535353;
    font-family: Arial,Helvetica,sans-serif;
    font-size: 12px;padding:5px;">
   <div style="text-align:justify;">
 	Are you sure you want to delete selected case?
    If you are sure, click "<b>Delete Case</b>". After this step, selected case information and 
   attachments will no longer be viewable.
  
   
   </div>
      <div class="floatright pt15">
        	<div class="btnlt"></div>
            <div class="btnmid"><a href="javascript:void(0);" style="color:#FFFFFF" id="save_notify">Delete Case</a></div>
            <div class="btnrt"></div>
        </div>
        
       
</div>
 </div> 
		
        <div id="no_email_case_dialog" title="Email Case" style="display:none;"  >
 <div style="color: #535353;
    font-family: Arial,Helvetica,sans-serif;
    font-size: 12px;">
   <div id="no_case" style="text-align:justify;padding:5px;">
   <br />
 	No case selected.Please select one case to email case.
      
   </div>
      
        
       
</div>
 </div>  
   <div id="email_case_dialog" title="Enter Email Address" style="display:none;" >
   <table width="100%" cellspacing="0" cellpadding="0" border="0">
                  <tbody>
                  
                  <tr><td colspan="2">&nbsp;</td></tr>
                  <tr>
                    <td>Email Address:</td>
                    <td><div class="inputover floatleft">
                      <div class="inputlt"></div>
                      <div class="inputmid">
                        <input type="text" class="wid243" placeholder="Enter Email Address" value=""  id="email_address">
                      </div>
                      <div class="inputrt"></div>
                    </div></td>
                  </tr>
                  
                  <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td><div class="floatleft">
        	<div class="btnlt"></div>
            <div class="btnmid"><a href="#"  style="color:#FFFFFF" id="send_email">Email Case</a></div>
            <div class="btnrt"></div>
        </div>
        </td>
                  </tr>
                </tbody></table>
   </div>
   
    <?php echo $this->Form->end();?>
	
    <?php echo $this->Form->create($model, array('class'=>'form-inline','id'=>'CaseTableAdminChangeCaseStatusForm','url'=>array('plugin'=>'cases','controller'=>'cases','action'=>'change_case_status')));
	
	 echo $this->Form->hidden('case_id');
	 echo $this->Form->hidden('case_status');
	 echo $this->Form->end();
	 ?>
