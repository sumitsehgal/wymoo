<div class="container">
	<style>

</style>



 <div class="tab_case">
  <div class="bs-example bs-example-tabs">
<ul id="myTab" class="nav nav-tabs" style="margin-top: -34px;">
<li>
  <a href="/client/casetracker" class="">Case Tracker</a></li>
<li class="active">
	<a href="/client/notifications" class="">Notifications</a></li>

<li class=" ">
  <a href="/client/caseinfo" class="">Edit Case Data</a></li>

</ul>
<div id="myTabContent" class="tab-content">
<div id="Notifications" class="tab-pane fade active in">
  <div class="content_box">
    <h1>Case<span>Notification  </span></h1>
	  	<script type="text/javascript">
$(function(){$("#send_notification").click(function(e){$("#CaseTableNotificationsForm").submit();e.preventDefault();});});</script>
  </div>
  <div class="notification_case">

  <form action="/client/notifications" class="form-inline" id="CaseTableNotificationsForm" method="post" accept-charset="utf-8"><div style="display:none;"><input type="hidden" name="_method" value="POST"></div> 
	<textarea name="data[CaseTable][notification]" class="form-control" rows="4" id="CaseTableNotification"></textarea>	 
   <a class="btn btn-default" href="javascript:void(0)" id="send_notification">Send</a>
	 		<div style="color:#FF0000;clear:both;margin-left:13px;">
	  <small> <div class="clr"></div>&nbsp;&nbsp; </small>
</div>	  
	 <div class="clearfix"></div>
	   </form></div>
  </div>
</div>
</div>
  
</div>
<style type="text/css">
.chzn-container{width:100%!important;z-index:0!important;}
.qq-upload-button{z-index:1!important;}
</style></div>