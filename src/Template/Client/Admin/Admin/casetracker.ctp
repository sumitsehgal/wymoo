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
										id'=>'CaseTableCaseStatusId']) ?>
										<div class="newListSelected"></div>
									</div>
									<div class="inputrt"></div>
								</div>
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
	</div>
</div>
<?= $form->end() ?>
<?php print_r($case); ?>