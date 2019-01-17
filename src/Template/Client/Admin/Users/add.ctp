<h1 class="relative">Add <span>New User </span>
         <div class="btnh1"><div class="btnlt"></div>
            <div class="btnmid"><a href="/client/admin/user/view" id="view_users">View users</a></div>
            <div class="btnrt"></div>
        </div>
</h1>
<form action="/client/admin/users/users/add" class="form-horizontal" id="UserAdminAddForm" method="post" accept-charset="utf-8">
    <div style="display:none;">
        <input type="hidden" name="_method" value="POST" />
    </div>
    <input type="hidden" name="data[User][id]" id="UserId" />
    <div class="divfull">
        <div class="gradbox">
            <small style="color:#FF0000"> All fields are mandatory.</small>
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
                                            <input name="data[User][username]" type="text" class="wid243" id="UserUsername" />
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
                                            <input name="data[User][fname]" type="text" class="wid243" id="UserFname" />
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
                                            <input name="data[User][lname]" type="text" class="wid243" id="UserLname" />
                                        </div>
                                        <div class="inputrt"></div>
                                    </div><span class="pt5 floatleft"></span></td>
                            </tr>
                            <tr>
                                <td>Email:</td>
                                <td>
                                    <div class="inputover floatleft pr20">
                                        <div class="inputlt"></div>
                                        <div class="inputmid">
                                            <input name="data[User][email]" type="text" class="wid243" id="UserEmail" />
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
                                <td>Password:</td>
                                <td>
                                    <div class="inputover floatleft pr20">
                                        <div class="inputlt"></div>
                                        <div class="inputmid">
                                            <input type="password" name="data[User][newpassword]" class="wid243" id="UserNewpassword" />
                                        </div>
                                        <div class="inputrt"></div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Confirm Password:</td>
                                <td>
                                    <div class="inputover floatleft pr20">
                                        <div class="inputlt"></div>
                                        <div class="inputmid">
                                            <input type="password" name="data[User][temppassword]" class="wid243" id="UserTemppassword" />
                                        </div>
                                        <div class="inputrt"></div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>User Type:</td>
                                <td>
                                    <div class="inputover floatleft pr20">
                                        <div class="inputlt"></div>
                                        <div class="inputmid select244">
                                            <select name="data[User][user_type_id]" class="select" id="UserUserTypeId">
                                                <option value="4">Full Access</option>
                                                <option value="3">Limited Access</option>
                                            </select>
                                        </div>
                                        <div class="inputrt"></div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td>
                                    <div class="floatleft pr10">
                                        <div class="btnlt"></div>
                                        <div class="btnmid"><a href="#" id="update">Add User</a></div>
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

    <input type="submit" style="display:none" />

</form>