<h1>View <span>Users </span></h1><script>var emailregs = /^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i;
</script>
<form action="/client/admin/users/users/view" class="form-inline" id="UserAdminViewForm" method="post" accept-charset="utf-8"><div style="display:none;"><input type="hidden" name="_method" value="POST" /></div><div class="case_search">
<div class="lbl">First Name</div>
<div class="inputover floatleft pr20">
<div class="inputlt"></div>
<div class="inputmid ">
<input name="data[User][fname]" type="text" placeholder="First Name" class="wid120" id="UserFname" /></div>
<div class="inputrt"></div>
</div>
<div class="lbl">Last Name</div>
<div class="inputover floatleft pr20">
<div class="inputlt"></div>
<div class="inputmid">
<input name="data[User][lname]" type="text" placeholder="Last Name" class="wid120" id="UserLname" />
</div>
<div class="inputrt"></div>
</div>
<div class="lbl">Email</div>
<div class="inputover floatleft pr20">
<div class="inputlt"></div>
<div class="inputmid select150">
<input name="data[User][email]" type="text" placeholder="Email Address" class="wid120" id="UserEmail" /></div>
<div class="inputrt"></div>
</div>
<div class="floatleft">
<div class="btnlt"></div>
<div class="btnmid"><a href="#" id="process">Search</a></div>
<div class="btnrt"></div>
</div>
<div class="clr"></div>
</div><input type="submit" style="display:none;" />
</form><div class="divfull pt15">
<div class="gridbxover">
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="tblcaselist">
<tr>

<th>
<span class="floatleft">First name</span><span class="shorting"><a href="/client/admin/users/users/view/page:1/sort:fname/direction:asc" new_template="1"><img src="/client/img/shortup.png" alt="" /></a><a href="/client/admin/users/users/view/page:1/sort:fname/direction:desc" new_template="1"><img src="/client/img/shortdown.png" alt="" /></a></span></th>
<th>
<span class="floatleft">Last name</span><span class="shorting"><a href="/client/admin/users/users/view/page:1/sort:lname/direction:asc" new_template="1"><img src="/client/img/shortup.png" alt="" /></a><a href="/client/admin/users/users/view/page:1/sort:lname/direction:desc" new_template="1"><img src="/client/img/shortdown.png" alt="" /></a></span></th>
<th>
<span class="floatleft">Email</span><span class="shorting"><a href="/client/admin/users/users/view/page:1/sort:email/direction:asc" new_template="1"><img src="/client/img/shortup.png" alt="" /></a><a href="/client/admin/users/users/view/page:1/sort:email/direction:desc" new_template="1"><img src="/client/img/shortdown.png" alt="" /></a></span></th>
<th>
<span class="floatleft">Login id</span><span class="shorting"><a href="/client/admin/users/users/view/page:1/sort:username/direction:asc" new_template="1"><img src="/client/img/shortup.png" alt="" /></a><a href="/client/admin/users/users/view/page:1/sort:username/direction:desc" new_template="1"><img src="/client/img/shortdown.png" alt="" /></a></span></th>

<th>
Action
</th>

</tr>
<tr class="odd">

<td>Marcela </td>
<td>Davis</td>
<td> <a href="/cdn-cgi/l/email-protection#e28f8683948b91a2959b8f8d8dcc818d8f" class="newlink"><span class="__cf_email__" data-cfemail="204d44415649536057594d4f4f0e434f4d">[email&#160;protected]</span></a>	</td>
<td>mdavis</td>

<td>
<div class="floatleft pr10">
<div class="btnlt"></div>
<div class="btnmid">
<a href="/client/admin/users/users/edit/2956">Edit</a>	</div>
<div class="btnrt"></div>
</div> &nbsp;&nbsp;<div class="floatleft pr10">
<div class="btnlt"></div>
<div class="btnmid">
<a href="/client/admin/users/users/delete/2956" class="deleteuser">Delete</a>
	</div>
<div class="btnrt"></div>
</div>
	
</td>
</tr>
<tr class="even">

<td>Maria </td>
<td>Taylor</td>
<td> <a href="/cdn-cgi/l/email-protection#422f36233b2e2d3002353b2f2d2d6c212d2f" class="newlink"><span class="__cf_email__" data-cfemail="28455c495144475a685f51454747064b4745">[email&#160;protected]</span></a>	</td>
<td>mtaylor</td>

<td>
<div class="floatleft pr10">
<div class="btnlt"></div>
<div class="btnmid">
<a href="/client/admin/users/users/edit/963">Edit</a>	</div>
<div class="btnrt"></div>
</div> &nbsp;&nbsp;<div class="floatleft pr10">
<div class="btnlt"></div>
<div class="btnmid">
<a href="/client/admin/users/users/delete/963" class="deleteuser">Delete</a>
	</div>
<div class="btnrt"></div>
</div>
	
</td>
</tr>
<tr class="odd">

<td>Veronica </td>
<td>Moore</td>
<td> <a href="/cdn-cgi/l/email-protection#51273c3e3e23341126283c3e3e7f323e3c" class="newlink"><span class="__cf_email__" data-cfemail="0c7a6163637e694c7b75616363226f6361">[email&#160;protected]</span></a>	</td>
<td>vmoore</td>

<td>
<div class="floatleft pr10">
<div class="btnlt"></div>
<div class="btnmid">
<a href="/client/admin/users/users/edit/115">Edit</a>	</div>
<div class="btnrt"></div>
</div> &nbsp;&nbsp;<div class="floatleft pr10">
<div class="btnlt"></div>
<div class="btnmid">
<a href="/client/admin/users/users/delete/115" class="deleteuser">Delete</a>
	</div>
<div class="btnrt"></div>
</div>
	
</td>
</tr>
<tr class="even">

<td>David </td>
<td>Brooks</td>
<td> <a href="/cdn-cgi/l/email-protection#f09492829f9f9b83b087899d9f9fde939f9d" class="newlink"><span class="__cf_email__" data-cfemail="e682849489898d95a6919f8b8989c885898b">[email&#160;protected]</span></a>	</td>
<td>dbrooks</td>

<td>
<div class="floatleft pr10">
<div class="btnlt"></div>
<div class="btnmid">
<a href="/client/admin/users/users/edit/113">Edit</a>	</div>
<div class="btnrt"></div>
</div> &nbsp;&nbsp;<div class="floatleft pr10">
<div class="btnlt"></div>
<div class="btnmid">
<a href="/client/admin/users/users/delete/113" class="deleteuser">Delete</a>
	</div>
<div class="btnrt"></div>
</div>
	
</td>
</tr>
<tr class="odd">

<td>John  </td>
<td>Harper</td>
<td> <a href="/cdn-cgi/l/email-protection#f09a989182809582b087899d9f9fde939f9d" class="newlink"><span class="__cf_email__" data-cfemail="9ef4f6ffeceefbecdee9e7f3f1f1b0fdf1f3">[email&#160;protected]</span></a>	</td>
<td>jharper</td>

<td>
<div class="floatleft pr10">
<div class="btnlt"></div>
<div class="btnmid">
<a href="/client/admin/users/users/edit/1">Edit</a>	</div>
<div class="btnrt"></div>
</div> &nbsp;&nbsp;<div class="floatleft pr10">
<div class="btnlt"></div>
<div class="btnmid">
<a href="/client/admin/users/users/delete/1" class="deleteuser">Delete</a>
	</div>
<div class="btnrt"></div>
</div>
	
</td>
</tr>
 
</table>
</div>
</div>
<div id="unlock_case_dialog" title="Are you sure?"  ><br/>
  Are you sure you want to delete this user?
  <div class="floatright pt15" id="floatrightbtn" style="padding-top:20px;">
    <div class="btnlt"></div>
    <div class="btnmid"><a href="javascript:void(0);" id="export_case_lnk" style="color:#FFFFFF">Yes</a></div>
    <div class="btnrt" style="padding-right:2px;"></div>
    <div class="btnlt"></div>
    <div class="btnmid"><a href="/client/admin/users/users/view" id="close_dialog" style="color:#FFFFFF">No</a></div>
    <div class="btnrt"></div>
  </div>
  </div>   
  </div>
