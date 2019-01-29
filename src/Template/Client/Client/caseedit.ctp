<?php 
$form = $this->Form;
?>
<div id="myTabContent" class="tab-content">
	<div id="edit" class="tab-pane fade active in">
		<div class="content_box">
			<?=$form->create($case)?>
			<?=$breadcrumb?>
			<div class="secure"> <span> Secure Contact</span> </div>
			<div class="clearfix"></div>
			<p>Your investigation is in progress and your case data is no longer editable.  Please contact your investigator if you need to make updates.</p>
			<div class="row">
				<div class="col-sm-6">
					<div>
						<div class="form_content">
							<h2>Step 1: Your Data</h2>
							<?= $this->Html->image('tabpoint.png',['alt'=>'tagpoint','class'=>'tag_arrow'])?>
						</div>
						<div class="form_box">
							<div class="row">
								<div class="col-sm-4">
									<label>Your First Name:<span class="error_class">*</span></label>
								</div>
								<div class="col-sm-8">
									<?=$form->text('client_fname',['class'=>'form-control'])?>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-4">
									<label>Your Last Name:<span class="error_class">*</span></label>
								</div>
								<div class="col-sm-8">
									<?=$form->text('client_lname',['class'=>'form-control'])?>											
								</div>
							</div>
							<div class="row">
								<div class="col-sm-4">
									<label>Your Email:<span class="error_class">*</span></label>
								</div>
								<div class="col-sm-8">
									<?=$form->text('client_email',['class'=>'form-control'])?>
								</div>
							</div>
						</div>
					</div>
					<div>
						<div class="form_content">
							<h2>Step 2: About the subject</h2>
							<?= $this->Html->image('tabpoint.png',['alt'=>'tagpoint','class'=>'tag_arrow'])?>
						</div>
						<div class="form_box">
							<div class="row">
								<div class="col-sm-4">
									<label>Subject's Full Name:</label>
								</div>
								<div class="col-sm-8">
									<?=$form->text('subject_fullname',['class'=>'form-control'])?>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-4">
									<label>Subject's Alias::</label>
								</div>
								<div class="col-sm-8">
									<?=$form->text('subject_alias',['class'=>'form-control'])?>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-4">
									<label>Subject's Email:</label>
								</div>
								<div class="col-sm-8">
									<?=$form->email('subject_email',['class'=>'form-control'])?>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-4">
									<label>Subject's Phone:</label>
								</div>
								<div class="col-sm-8">
									<?=$form->text('subject_phone',['class'=>'form-control'])?>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-4">
									<label>Subject's Date of Birth:</label>
								</div>
								<div class="col-sm-8">
									<?=$form->text('subject_dob1',['class'=>'form-control datepicker',])?>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-4">
									<label>Subject's Address:</label>
								</div>
								<div class="col-sm-8">
									<?=$form->textarea('subject_address',['class'=>'form-control','rows'=>'4'])?>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-4">
									<label>Subject's Education:</label>
								</div>
								<div class="col-sm-8">
									<?=$form->textarea('subject_education',['class'=>'form-control','rows'=>'3'])?>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-4">
									<label>Subject's Employment:</label>
								</div>
								<div class="col-sm-8">
									<?=$form->textarea('subject_employment',['class'=>'form-control','rows'=>'3'])?>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-6">
					<div>
						<div class="form_content">
							<h2>Step 3: Some background</h2>
							<?= $this->Html->image('tabpoint.png',['alt'=>'tagpoint','class'=>'tag_arrow'])?>
						</div>
						<div class="form_box">
							<label>How do or did you communicate with the subject? </label>
							<ul class="checkbox_list">
								<li><?=$form->checkbox('subject_communication_email')?> Email</li>
								<li><?=$form->checkbox('subject_communication_messenger')?> Messenger</li>
								<li><?=$form->checkbox('subject_communication_phone')?> Phone</li>
								<li><?=$form->checkbox('subject_communication_webcam')?> Webcam</li>
								<li><?=$form->checkbox('subject_communication_inperson')?> In Person</li>
							</ul>
							<label>Please provide a brief summary of your case and how we can help. </label>
							<div class="text_area">
								<?=$form->textarea('subject_background',['rows'=>'4','class'=>'form-control'])?>
								<span id="subject_background_count">(1000 character maximum)</span> 
							</div>
						</div>
					</div>
					<div class="step4">
						<div class="form_content">
							<h2>Step 4: A Few Questions (if applicable)</h2>
							<?= $this->Html->image('tabpoint.png',['alt'=>'tagpoint','class'=>'tag_arrow'])?> 
						</div>
						<div class="form_box">
							<div class="row">
								<div class="col-sm-7">
									<label>Has the subject sent any ID or documents?</label>
								</div>
								<div class="col-sm-5">
									<?=$form->text('subject_id',['class'=>'form-control'])?>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-7">
									<label>How long have you known the subject?</label>
								</div>
								<div class="col-sm-5">
									<?=$form->text('subject_how_long',['class'=>'form-control'])?>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-7">
									<label>If you met the subject via the internet,
									please specify on which website.</label>
								</div>
								<div class="col-sm-5">
									<?=$form->text('subject_website_met',['class'=>'form-control'])?>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-7">
									<label>Have you sent anything to the subject's
									address? If so, was it received?</label>
								</div>
								<div class="col-sm-5">
									<?=$form->text('subject_sent_address',['class'=>'form-control'])?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class=" col-sm-offset-6 col-sm-6">
					<div class="clearfix save_wrp"><strong>All services are strictly confidential and discreet.</strong> 
						<?=$form->submit('Save',['class'=>'btn btn-default pull-right'])?>
					</div>
				</div>
			</div>
			<?=$form->end()?>
		</div>
	</div>
</div>