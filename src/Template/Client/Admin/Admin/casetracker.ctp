<?php $service_level=array(); for($i=0;$i<16;$i++){$service_level[]=$i;} ?>
<?php $form = $this->Form; ?>
<?= $breadcrumb ?>
<style type="text/css" id="page-css">.scroll-pane{width: 100%;height: 200px;overflow: auto;font:12px/20px Arial, Helvetica, sans-serif;color:#333;}</style>
<script type="text/javascript" >$(function(){var api = $('.scroll-pane').jScrollPane({showArrows:true,maintainPosition: false});});</script>
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
										<?= $form->control('case_status_id',['options'=>$caseStatus,'class'=>'select','
										id'=>'CaseTableCaseStatusId','label'=>false]) ?>
										<div class="newListSelected"></div>
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
										<?= $form->control('assigned_to',['options'=>$investors,'class'=>'select','
										id'=>'CaseTableAssignedTo','label'=>false]) ?>
										<div class="newListSelected"></div>
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
										<?= $form->date('due_date',['class'=>'wid243']) ?>
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
									<div class="inputmid">
										<?= $form->control('service_level',['class'=>'wid243','options'=>$service_level,'label'=>false]) ?>
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
									<div class="inputmid">
										<?= $form->control('discount',['class'=>'wid243','options'=>['0','10','15','20'],'label'=>false]) ?>
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
										<?= $form->text('fee',['class'=>'wid243']) ?>
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
									<div class="btnmid"><a href="/client/admin/caseinfo/7938">Edit Case</a></div>
									<div class="btnrt"></div>
								</div>
								<div class="floatleft pr10">
									<div class="btnlt"></div>
									<div class="btnmid"><a href="https://www.wymoo.com/client/admin/casenotes/7938?iframe" class="lightbox iframe" id="lightbox">View Case</a></div>
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
<?= $form->end() ?>