<div id="middle">
      <h1>Login <span>Required</span></h1>
        
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
                        <a href="/client/admin/users/users/forgot_password" id="forgot_password" class="newlink">Forgot your password?</a>
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
</div>