
<div class="divfull pt15">
	<div class="gridbxover">
		<table width="100%" border="0" cellspacing="0" cellpadding="0" class="tblcaselist">
			<tbody>
				<tr>
					<th width="3%"><input type="checkbox" id="selectall" /></th>
					<th width="12%"><?= $this->Paginator->sort('client_fname', 'First Name') ?></th>
					<th width="12%"><?= $this->Paginator->sort('client_lname', 'Last Name') ?></th>
					<th width="25%"><?= $this->Paginator->sort('client_login_id', 'Login ID') ?></th>
					<th width="10%"><?= $this->Paginator->sort('site_name', 'Site') ?></th>
					<th width="10%" style="padding:0px;padding-left:5px;"><?= $this->Paginator->sort('due_date', 'Due Date') ?></th>
					<th width="12%"><?= $this->Paginator->sort('submited_date', 'Days Open') ?></th>
					<th width="12%" style="border-right:0px;"><?= $this->Paginator->sort('case_status', 'Case Status') ?></th>
					<th style="border-left:0px;">&nbsp;</th>
				</tr>
			</tbody>
		</table>
		<div class="scroll-pane" style="height: 100% !important; overflow: hidden; padding: 0px; width: 970px;">
			<div class="jspContainer" style="width: 970px; height: 270px;">
				<div class="jspPane" style="padding: 0px; top: 0px; width: 970px;">
					<table width="100%" border="0" cellspacing="0" cellpadding="0" class="tblcaselist">
						<tbody>
							<?php $class = 'even'; foreach ($pages as $page):  $class = ($class=='even')? 'odd' : 'even';?>
							<tr class="<?=$class?>"<?php if($page->is_read==0) { ?> style="font-weight:bold"<? } ?>>
								<td width="3%"><input type="checkbox" name="data[cases][id][]" value="<?= h($page->id) ?>" /></td>
								<td width="12%"><?= h($page->client_fname) ?> </td>
								<td width="12%"><?= h($page->client_lname) ?> </td>
								<td width="25%">
									<?php if($page->is_exported ==1){echo $this->Html->image('lock-sm.png') .'&nbsp;&nbsp;';}else{ echo  $this->Html->image('dot.png',array('height'=>'13','width'=>'10')).'&nbsp;&nbsp;';}?>
									<?php
									$url = WEBSITE_URL . $this->Url->build(array('controller'=>'cases','action'=> 'casenotes','admin'=>true,$page->id));

									echo $this->Html->link( 
										$page->client_login_id,
										$url.'?iframe',
										array(
											'class'=>'newlink lightbox iframe',
											'onclick'=>'$(this).parents("tr").css("font-weight","normal");',
											'style'=>''
										)
									);
									?> </td>
									<td width="10%"><?= h($page->site_name) ?> </td>
									<td width="10%"><?php echo ($page->due_date==0) ? 'Pending' : date('D, M j',$page->due_date);?></td>
									<td width="12%"><?php echo ($page->is_submited==0) ? '' : floor((time()-(floor($page->submited_date/86400)*86400))/86400);?> </td>
									<td nowrap="nowrap">
										<span class="floatleft">
											<a href="/client/admin/casetracker/<?= h($page->id) ?>" class="newlink"><?= h($page->case_status) ?> </a>
										</span>
										<span class="statusicon">
											<?php 
											if($page->case_status=='Case Created')
												$icon='yellow';
											elseif($page->case_status=='Case In Progress')
												$icon='green_bull';
											elseif($page->case_status=='Case Cancelled')
												$icon='red_bull';
											elseif($page->case_status=='Case Closed')
												$icon='black_bull';
											elseif($page->case_status=='Case On Hold')
												$icon='orange_bull';
											elseif($page->case_status=='Case Submitted')
												$icon='blueicon';
											?>
											<img src="<?php echo WEBSITE_URL; ?>img/<?=$icon?>.png" id="<?= h($page->id) ?>" value="<?= h($page->case_status_id) ?>" class="chage_stateus" style="cursor:pointer" alt="">
										</span> 
									</td>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	function formatTitle(title, currentArray, currentIndex, currentOpts) {  
		return "<div id=\"tip7-title\"><span><a href=\"javascript:;\" onclick=\"$.fancybox.close();\"><?=addslashes($this->Html->Image('fancybox/cross.png'))?></a></span><?=addslashes( $this->Html->Image('fancybox/casenotes_head.png') )?></div>";
	}
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
</script>