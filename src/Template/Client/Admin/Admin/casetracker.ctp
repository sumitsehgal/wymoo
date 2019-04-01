<?php $form = $this->Form; ?>
<?= $breadcrumb ?>
<style type="text/css" id="page-css">.scroll-pane{width: 100%;height: 200px;overflow: auto;font:12px/20px Arial, Helvetica, sans-serif;color:#333;}</style>
<?= $form->create($case,['class'=>'form-inline','id'=>'CaseTableAdminCasetrackerForm']) ?>
<div class="divfull">
	<div class="gradbox">
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
										<?= $form->text('client_login_id',['class'=>'wid243']) ?>
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
										<?= $form->text('client_fname',['class'=>'wid243']) ?>
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
										<?= $form->text('client_lname',['class'=>'wid243']) ?>
									</div>
									<div class="inputrt"></div>
								</div>
							</td>
						</tr>
						<tr>
							<td>Case #:</td>
							<td>
								<div class="inputover floatleft pr20">
									<div class="inputlt"></div>
									<div class="inputmid">
										<span class="wid243" style="display: block;line-height: 22px;"><?= $case['id'] ?></span>
									</div>
									<div class="inputrt"></div>
								</div>
							</td>
						</tr>
						<tr>
							<td>Status:</td>
							<td>
								<div class="inputover floatleft pr20">
									<div class="inputlt"></div>
									<div class="inputmid select244">
										<?= $form->select('case_status_id',$caseStatus, ['class'=>'select','
										id'=>'CaseTableCaseStatusId','label'=>false]) ?>
									</div>
									<div class="inputrt"></div>
								</div>
							</td>
						</tr>
						<tr>
							<td>Assigned to:</td>
							<td>
								<div class="inputover floatleft pr20">
									<div class="inputlt"></div>
									<div class="inputmid select244">
										<?= $form->select('assigned_to', $investors, ['class'=>'select','
										id'=>'CaseTableAssignedTo','label'=>false, 'empty'=>false]) ?>
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
							<td>Due Date:</td>
							<td>
								<div class="inputover floatleft pr20">
									<div class="inputlt"></div>
									<div class="inputmid">
										<input type="text" class="wid243 datepicker" value="<?=($case['due_date']==0) ? 'Pending' : date('D, F j',$case['due_date'])?>">
										<?=$form->control('due_date', ['type' => 'hidden','id'=>'due_date','value'=> date('d-m-Y',$case['due_date'])])?>
									</div>
									<div class="inputrt"></div>
								</div>
							</td>
						</tr>
						<tr>
							<td>Service Level:</td>
							<td>
								<div class="inputover floatleft pr20">
									<div class="inputlt"></div>
									<div class="inputmid select244">
										<?= $form->select('service_level', $serviceLevel, ['class'=>'select','label'=>false, 'style'=>'display:none;', 'id'=>'CaseTableServiceLevel']) ?>
									</div>
									<div class="inputrt"></div>
								</div>
							</td>
						</tr>
						<tr>
							<td>Discount:</td>
							<td>
								<div class="inputover floatleft pr20">
									<div class="inputlt"></div>
									<div class="inputmid select244">
										<?= $form->select('discount', $discounts, ['class'=>'select','label'=>false, 'id' => 'CaseTableDiscount']) ?>
									</div>
									<div class="inputrt"></div>
								</div>
							</td>
						</tr>
						<tr>
							<td>Fee:</td>
							<td>
								<div class="inputover floatleft pr20">
									<div class="inputlt"></div>
									<div class="inputmid">
										<?= $form->text('fee',['class'=>'wid243','id' => 'fee']) ?>
									</div>
									<div class="inputrt"></div>
								</div>
							</td>
						</tr>
						<tr>
							<td>Add Note:</td>
							<td>
								<?= $form->textarea('notes',['class'=>'wid255','rows'=>'3','placeholder'=>'Add Note']) ?>
							</td>
						</tr>
						<tr><td>&nbsp;</td><td>(100 characters available)</td></tr>
						<tr>
							<td>&nbsp;</td>
							<td>
								<div class="floatleft pr10">
									<div class="btnlt"></div>
									<div class="btnmid"><a href="#" id="update_case">Update</a></div>
									<div class="btnrt"></div>
								</div>
								<div class="floatleft pr10">
									<div class="btnlt"></div>
									<div class="btnmid"><a href="/client/admin/caseedit/<?=$id?>">Edit Case</a></div>
									<div class="btnrt"></div>
								</div>
								<div class="floatleft pr10">
									<div class="btnlt"></div>
									<div class="btnmid"><a href="/client/admin/casenotes/<?=$id?>?iframe" class="lightbox iframe" id="lightbox">View Case</a></div>
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
<div class="divfull pt15">
	<div class="gridbxover">
		<div class="gridbxover">
			<table width="100%" style="" border="0" cellspacing="0" cellpadding="0" class="tblcaselist">
				<tbody>
					<tr>
						<th width="54%">Notes</th>
						<th width="15%"><span class="floatleft">Date</span></th>
						<th width="15%">Created By</th>
						<th width=""><span class="floatleft">Case Status</span></th>
					</tr>
				</tbody>
			</table>
			<div class="scroll-pane">
				<table style="width:960px" border="0" cellspacing="0" cellpadding="0" class="tblcaselist">
					<tbody>
						<?php if(!empty($case['case_notes'])): $class ='even'; foreach($case['case_notes'] as $key=>$note): $class=($class=="even")?'odd':'even'; ?>
							<tr class="<?=$class ?>">
								<td style="width:502px;"><?=$note['case_notes']?></td>
								<td width="15%"><?=date('D, M j',$note['created'])?></td>
								<td width="15%"><?=$note['creator_user']['fname'].' '.$note['creator_user']['lname']?></td>
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
<?= $form->end() ?>

<script type="text/javascript">
	function formatTitle(title, currentArray, currentIndex, currentOpts) {  
		return "<div id=\"tip7-title\"><span><a href=\"javascript:;\" onclick=\"$.fancybox.close();\"><?=addslashes($this->Html->Image('fancybox/cross.png'))?></a></span><?=addslashes( $this->Html->Image('fancybox/casenotes_head.png') )?></div>";
	}
	$(document).ready(function () {
		$(".datepicker").datepicker({
			dateFormat:"D, MM dd", 
			onSelect: function(dateText) {
				var date = $(".datepicker").datepicker("getDate");
				d = date.getDate(); 
				m = date.getMonth() + 1; 
				y = date.getFullYear(); 
				$('#due_date').val(d+"-"+m+"-"+y); 
			}
		});
		$(".select").sSelect({ ddMaxHeight: "300px"});
		//$(".wid243").sSelect({ ddMaxHeight: "300px"});
		$('#update_case').click(function(e){
			e.preventDefault();
			$('#CaseTableAdminCasetrackerForm').submit();
		});
		$("#due_date").datepicker({
			dateFormat:"D, MM dd", onSelect: function(dateText) {
				var date = $("#due_date").datepicker("getDate");
				d = date.getDate(); 
				m = date.getMonth() + 1; 
				y = date.getFullYear(); 
				$("#due_date1").val(d+"-"+m+"-"+y); 
			}
		});
		// $("#CaseTableServiceLevel, #CaseTableDiscount").change(function(){
		// 	var f = fees[$("#CaseTableServiceLevel").val()];
		// 	var d = discount[$("#CaseTableDiscount").val()];
		// 	f = typeof f =="undefined" ? 0 : f;
		// 	d = typeof d =="undefined" ? 0 : d;
		// 	var fee = (f - (f*d)/100);$("#fee").val(fee);
		// });
		$(".lightbox").fancybox({
			"transitionIn"		: "elastic",
			"transitionOut"		: "elastic",				
			"titlePosition" 	: "outside",
			"width"				: "80%",				
			"height"			: "200%",				
			"titleFormat"		: formatTitle,				
			"onStart"			: function() {						
				$("#fancybox-outer").hide();					
			},				
			"onComplete"		: function() {						
				$("#fancybox-outer").show();					
			}
		});
	});

	$(document).ready(function () {
		var fees =  <?php echo json_encode($caseFee); ?> ;
		var discount =  <?php  echo json_encode($discounts); ?> ;
		$("#CaseTableServiceLevel, #CaseTableDiscount").change(function(){
			var f = fees[$("#CaseTableServiceLevel").val()];
			var d = discount[$("#CaseTableDiscount").val()];
			f = typeof f =="undefined" ? 0 : f;
			d = typeof d =="undefined" ? 0 : d;
			var fee = (f - (f*d)/100);
			$("#fee").val(fee); 
		});
	});
		//$(".lightbox").fancybox({"transitionIn"		: "elastic","transitionOut"		: "elastic",				"titlePosition" 		: "outside","width"				: "80%",				"height"			: "200%",				"titleFormat"		: formatTitle,				"onStart"		: function() {						$("#fancybox-outer").hide();					},				"onComplete"		: function() {						$("#fancybox-outer").show();					}								});		  $("#update_case").click(function(e){		 	$("#CaseTableAdminCasetrackerForm").submit();		  e.preventDefault();		 });	 });




</script>
<script type="text/javascript" >$(function(){var api = $('.scroll-pane').jScrollPane({showArrows:true,maintainPosition: false});});</script>