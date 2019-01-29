<?php $form = $this->Form; ?>
<h1 class="relative">
	Case 
	<span>Information </span> 
	<div class="secureicon">Secure Contact</div>
</h1>
<?=$form->create($case)?>
<div class="case_search">
	<div class="lbl">Created:</div>
	<div class="floatleft pt5 pr20">
		<?=date('D, M j',$case['created_date'])?>
	</div>
	<div class="lbl">Status:</div>
	<div class="floatleft pt5 pr20">
		<span class="floatleft pr10"><?=$case['case_status']?> </span>
		<span class="statusicon" style="padding:2px 0 0;">
			<?=$this->Html->image($caseIcons[$case['case_status_id']], [ "alt" => $case['case_status'], "value" => $case['case_status_id'],"id" => $case['id'],"class" => 'chage_stateus',"style" => 'cursor:pointer']) ?>
		</span>
	</div>
	<div class="lbl">Client:</div>
	<div class="floatleft pt5 pr20">
		<?=$case['client_fname'].' '.$case['client_lname']?> (<?=$case['client_email']?> )
	</div>
	<div class="lbl">Due Date:</div>
	<div class="floatleft pt5 pr20">
		<?=($case['due_date']==0) ? 'Pending' : date('D, M j',$case['due_date'])?> 
	</div>
	<div class="clr"></div>
</div>
<div class="divfull pt15">
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
		<tbody>
			<tr>
				<td valign="top" width="47%">
					<div>
						<div class="bxheadlt"></div>
						<div class="bxheadmid"><span></span>Step 1: Your Data</div>
						<div class="bxheadrt"></div>
						<div class="clr"></div>
					</div>
					<div class="gradbox">
						<table width="100%" border="0" cellspacing="8" cellpadding="0">
							<tbody>
								<tr>
									<td width="130">Your First Name:</td>
									<td>
										<div class="inputover floatleft">
											<div class="inputlt"></div>
											<div class="inputmid">
												<?=$form->text('client_fname',['class'=>'wid243'])?>
											</div>
											<div class="inputrt"></div>
										</div>
									</td>
								</tr>
								<tr>
									<td width="130">Your Last Name:</td>
									<td>
										<div class="inputover floatleft">
											<div class="inputlt"></div>
											<div class="inputmid">
												<?=$form->text('client_lname',['class'=>'wid243'])?>
											</div>
											<div class="inputrt"></div>
										</div>
									</td>
								</tr>
								<tr>
									<td width="130">Your Email:</td>
									<td>
										<div class="inputover floatleft">
											<div class="inputlt"></div>
											<div class="inputmid">
												<?=$form->text('client_email',['class'=>'wid243'])?>
											</div>
											<div class="inputrt"></div>
										</div>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="pt15">
						<div class="bxheadlt"></div>
						<div class="bxheadmid"><span></span>Step 2: About the subject</div>
						<div class="bxheadrt"></div>
						<div class="clr"></div>
					</div>
					<div class="gradbox">
						<table width="100%" border="0" cellspacing="8" cellpadding="0">
							<tbody>
								<tr>
									<td width="135">Subject's Full Name:</td>
									<td>
										<div class="inputover floatleft">
											<div class="inputlt"></div>
											<div class="inputmid">
												<?=$form->text('subject_fullname',['class'=>'wid243'])?>
											</div>
											<div class="inputrt"></div>
										</div>
									</td>
								</tr>
								<tr>
									<td>Subject's Alias:</td>
									<td>
										<div class="inputover floatleft">
											<div class="inputlt"></div>
											<div class="inputmid">
												<?=$form->text('subject_alias',['class'=>'wid243'])?>
											</div>
											<div class="inputrt"></div>
										</div>
									</td>
								</tr>
								<tr>
									<td>Subject's Email:</td>
									<td>
										<div class="inputover floatleft">
											<div class="inputlt"></div>
											<div class="inputmid">
												<?=$form->text('subject_email',['class'=>'wid243'])?>
											</div>
											<div class="inputrt">

											</div>
										</div>
									</td>
								</tr>
								<tr>
									<td>Subject's Phone:</td>
									<td>
										<div class="inputover floatleft">
											<div class="inputlt"></div>
											<div class="inputmid">
												<?=$form->text('subject_phone',['class'=>'wid243'])?>
											</div>
											<div class="inputrt"></div>
										</div>
									</td>
								</tr>
								<tr>
									<td>Subject's Date of Birth:</td>
									<td>
										<div class="inputover floatleft">
											<div class="inputlt"></div>
											<div class="inputmid">
												<?=$form->text('subject_dob1',['class'=>'wid243 hasDatepicker'])?>
											</div>
											<div class="inputrt"></div>
										</div>
									</td>
								</tr>
								<tr>
									<td>&nbsp;</td>
									<td>
										<small>*Leave blank and notify your investigator  if unsure. </small>
									</td>
								</tr>
								<tr>
									<td>Subject's Address:</td>
									<td>
										<?=$form->textarea('subject_address',['class'=>'wid255','row'=>'3'])?>
									</td>
								</tr>
								<tr>
									<td>Subject's Education:</td>
									<td>
										<?=$form->textarea('subject_education',['class'=>'wid255','row'=>'3'])?>
									</td>
								</tr>
								<tr>
									<td>Subject's Employment:</td>
									<td>
										<?=$form->textarea('subject_employment',['class'=>'wid255','row'=>'3'])?>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</td>
				<td width="3%"><img src="/client/img/dot.png" width="1" height="1" alt=""></td>
				<td valign="top" width="47%">
					<div>
						<div class="bxheadlt"></div>
						<div class="bxheadmid"><span></span>Step 3: Some background</div>
						<div class="bxheadrt"></div>
						<div class="clr"></div>
					</div>
					<div class="gradbox">
						<div>How do or did you communicate with the subject? </div>
						<div class="pb5 pt5">
							<table width="100%" border="0" cellspacing="0" cellpadding="0">
								<tbody>
									<tr>
										<td><?=$form->checkbox('subject_communication_email')?></td>
										<td>Email</td>
										<td><?=$form->checkbox('subject_communication_messenger')?></td>
										<td>Messenger</td>
										<td><?=$form->checkbox('subject_communication_phone')?></td>
										<td>Phone</td>
										<td><?=$form->checkbox('subject_communication_webcam')?></td>
										<td>Webcam</td>
										<td><?=$form->checkbox('subject_communication_inperson')?></td>
										<td>In  Person</td>
									</tr>
								</tbody>
							</table>
						</div>
						<div>Please provide a brief summary of your case and how we can help. </div>
						<div>
							<?=$form->textarea('subject_background',['rows'=>'4','class'=>'wid420'])?>      
						</div>
						<small id="subject_background_count">(1000 character maximum)</small>
					</div>
					<div class="pt15">
						<div class="bxheadlt"></div>
						<div class="bxheadmid"><span></span>Step 4: A Few Questions (if applicable) </div>
						<div class="bxheadrt"></div>
						<div class="clr"></div>
					</div>
					<div class="gradbox">
						<table width="100%" border="0" cellspacing="8" cellpadding="0">
							<tbody>
								<tr>
									<td width="230">Has the subject sent any ID or documents?</td>
									<td>
										<div class="inputover floatleft">
											<div class="inputlt"></div>
											<div class="inputmid">
												<?=$form->text('subject_id',['class'=>'wid168'])?>
											</div>
											<div class="inputrt"></div>
										</div>
									</td>
								</tr>
								<tr>
									<td>How long have you known the subject?</td>
									<td>
										<div class="inputover floatleft">
											<div class="inputlt"></div>
											<div class="inputmid">
												<?=$form->text('subject_how_long',['class'=>'wid168'])?>
											</div>
											<div class="inputrt"></div>
										</div>
									</td>
								</tr>
								<tr>
									<td>If you met the subject via the internet,<br>
									please specify on which website.</td>
									<td>
										<div class="inputover floatleft">
											<div class="inputlt"></div>
											<div class="inputmid">
												<?=$form->text('subject_website_met',['class'=>'wid168'])?>
											</div>
											<div class="inputrt">

											</div>
										</div>
									</td>
								</tr>
								<tr>
									<td>Have you sent anything to the subject's<br>
									address? If so, was it received?</td>
									<td>
										<div class="inputover floatleft">
											<div class="inputlt"></div>
											<div class="inputmid">
												<?=$form->text('subject_sent_address',['class'=>'wid168'])?>
											</div>
											<div class="inputrt"></div>
										</div>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="pt15">
						<div class="bxheadlt"></div>
						<div class="bxheadmid"><span></span>Communication</div>
						<div class="bxheadrt"></div>
						<div class="clr"></div>
					</div>

					<div class="gradbox">
						<table width="100%" border="0" cellspacing="8" cellpadding="0">
							<tbody>
								<tr>
									<td><?=$form->textarea('notification',['class'=>'wid333','rows'=>'2'])?></td>
									<td>
										<div class="floatleft">
											<div class="btnlt"></div>
											<div class="btnmid"><a href="#" id="notify">Notify</a></div>
											<div class="btnrt"></div>
										</div>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="divfull pt15 floatright">						
						<div class="floatright pr20">
							<div class="btnlt"></div>
							<div class="btnmid">
								<a href="/client/admin/casebrowser">Cancel</a>
							</div>
							<div class="btnrt"></div>
						</div>
						<div class="floatright pr10">
							<div class="btnlt"></div>
							<div class="btnmid"><a href="#" id="save_case">Save</a></div>
							<div class="btnrt"></div>
						</div>
					</div>
				</td>
			</tr>
		</tbody>
	</table>
</div>
<?=$form->end()?>