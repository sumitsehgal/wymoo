
<h1>Login <span>Required</span></h1>
<div class="ui-dialog ui-widget ui-widget-content ui-corner-all  ui-draggable ui-resizable" tabindex="-1" role="dialog" aria-labelledby="ui-dialog-title-forgot_password_dialog" style="display: none; z-index: 1000; outline: 0px; position: absolute;">
    <div class="ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix"><span class="ui-dialog-title" id="ui-dialog-title-forgot_password_dialog">Forgot your password?</span><a href="#" class="ui-dialog-titlebar-close ui-corner-all" role="button"><span class="ui-icon ui-icon-closethick">close</span></a></div>
    <div id="forgot_password_dialog" class="ui-dialog-content ui-widget-content">
        <form action="/client/admin/users/forgotpassword" class="form-horizontal" id="UserForgotpasswordForm" method="post" accept-charset="utf-8">
            <div style="display:none;">
                <input type="hidden" name="_method" value="POST">
            </div>
            <input type="hidden" name="data[User][return_to]" id="UserReturnTo">
            <div style="color: #535353;font-family: Arial,Helvetica,sans-serif;font-size: 12px;">
                <table width="100%" border="0" cellspacing="8" cellpadding="0">
                    <tbody>
                        <tr>
                            <td width="135">Email Address:</td>
                            <td>
                                <div class="inputover floatleft">
                                    <div class="inputlt"></div>
                                    <div class="inputmid">
                                        <input name="data[User][client_email]" type="text" class="wid243" id="UserClientEmail">
                                    </div>
                                    <div class="inputrt"></div>

                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>&nbsp;</td>
                            <td>
                                <div class="pt15">
                                    <div class="btnlt"></div>
                                    <div class="btnmid"><a href="javascript:void(0);" style="color:#FFFFFF;" id="submit_password">Submit</a></div>
                                    <div class="btnrt"></div>
                                </div>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </form>
    </div>
    <div class="ui-resizable-handle ui-resizable-n"></div>
    <div class="ui-resizable-handle ui-resizable-e"></div>
    <div class="ui-resizable-handle ui-resizable-s"></div>
    <div class="ui-resizable-handle ui-resizable-w"></div>
    <div class="ui-resizable-handle ui-resizable-se ui-icon ui-icon-gripsmall-diagonal-se ui-icon-grip-diagonal-se" style="z-index: 1001;"></div>
    <div class="ui-resizable-handle ui-resizable-sw" style="z-index: 1002;"></div>
    <div class="ui-resizable-handle ui-resizable-ne" style="z-index: 1003;"></div>
    <div class="ui-resizable-handle ui-resizable-nw" style="z-index: 1004;"></div>
</div>


<!--  -->
<?= $this->Flash->render() ?>


<div class="divfull">
    <div class="adminloginbox">
        <form action="/client/admin/users/login" class="form-horizontal" id="UserLoginForm" method="post" accept-charset="utf-8"><div style="display:none;"><input type="hidden" name="_method" value="POST"></div><input type="hidden" name="data[User][return_to]" id="UserReturnTo"><div class="loginhead">Wymoo CMS </div>
            <div class="loginform">
                <div class="divfull pt20">
                    <div class="log_input"><span><img src="/img/usericon.png" alt=""></span>
                        <div>
                            <input name="username" type="text" id="UserUsername">
                        </div>
                    </div>
                </div>
                <div class="divfull pt6">
                    <div class="log_input">
                        <span><img src="/img/passwordicon.png" alt=""></span>
                        <div>
                            <input type="password" name="passwd" id="UserPasswd">
                        </div>
                    </div>
                </div>
                <div class="loginbtn">
                    <div class="submit">
                        <input type="image" src="/img/goicon.png">
                    </div>
                </div>
                <div class="divfull pt10">
                    <a href="/client/admin/users/forgot_password" id="forgot_password" class="newlink">Forgot your password?</a>
                </div>
            </div>
        </form>
    </div>
    <form name="emailLoginForm" style="margin: 0px" onsubmit="" action="https://apps.rackspace.com/login.php" method="post">
        <div class="adminloginbox">
            <div class="loginhead">Web mail</div>
            <div class="loginform">
                <div class="divfull pt20">
                    <div class="log_input">
                        <span><img src="/img/usericon.png" alt=""></span>
                        <div>
                            <input type="text" name="user_name">
                        </div>
                    </div>
                </div>
                <div class="divfull pt6">
                    <div class="log_input">
                        <span><img src="/img/passwordicon.png" alt=""></span>
                        <div>
                            <input type="password" name="password">
                        </div>
                    </div>
                </div>
                <div class="loginbtn">
                    <div class="submit">
                        <input type="image" src="/img/goicon.png">
                    </div>
                </div>
                <div class="divfull pt10">
                    <div class="floatleft">
                        <input type="checkbox"> &nbsp;Remember me
                    </div>
                    <div class="floatright lightgray">Email Services by Rackspace</div>
                </div>
            </div>
        </div>
    </form>
</div>   
