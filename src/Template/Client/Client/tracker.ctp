
    <style type="text/css" id="page-css">
        /* Styles specific to this particular page */
        
        .scroll-pane {
            width: 100%;
            height: 200px;
            overflow: auto;
            font: 12px/20px Arial, Helvetica, sans-serif;
            color: #333;
        }
    </style>
    <script type="text/javascript">
        $(function() {
            var api = $('.scroll-pane').jScrollPane({
                showArrows: true,
                maintainPosition: false
            });
        });
    </script>
   
            
                <div id="tracker" class="tab-pane fade active in">
                    <div class="content_box">
                        <h1>Case<span>Tracker  </span></h1>
                    </div>

                    <div class="form_content">
                        <h2>Client Info</h2>
                    </div>

                    <script type="text/javascript">
                        $(function() {
                            $("div#submit_case_dialog").dialog({
                                autoOpen: false,
                                width: 370,
                                height: 170,
                                modal: true
                            });
                            $("div#submit_case_dialog").find("#save_notify").click(function(e) {
                                $("#CaseTableCasetrackerForm").submit();
                                e.preventDefault();
                            });
                            $("#submit_case").click(function(e) {
                                $("div#submit_case_dialog").dialog("open");
                                e.preventDefault();
                            });
                        });
                    </script>

                    <form action="/client/cases/cases/submitcase" class="form-inline" id="CaseTableCasetrackerForm" method="post" accept-charset="utf-8">
                        <div style="display:none;">
                            <input type="hidden" name="_method" value="POST">
                        </div>
                        <div class="information_end">
                            <span>(When you finish adding information and attachments) </span>
                            <a class="btn btn-default" href="#" id="submit_case">Submit Case</a>
                        </div>
                        <div class="clearfix"></div>
                    </form>

                    <div class="table_tab">
                        <div class="table-responsive">
                            <table class="table tbl_border ">
                                <tbody>
                                    <tr>
                                        <td width="50%" valign="top">

                                            <table class="table table-hover table_td">
                                                <tbody>
                                                    <tr>
                                                        <td width="40%">Client:</td>
                                                        <td width="60%">test4 ds</td>
                                                    </tr>
                                                    <tr class="bg_box">
                                                        <td width="40%">Service Type:</td>
                                                        <td width="60%">Investigation</td>
                                                    </tr>

                                                    <tr>
                                                        <td width="40%">Assigned To:</td>
                                                        <td width="60%"></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>

                                        <td valign="top">

                                            <table class="table table-hover table_td">
                                                <tbody>
                                                    <tr>
                                                        <td width="40%">Due Date:</td>
                                                        <td width="60%">Pending</td>
                                                    </tr>
                                                    <tr class="bg_box">
                                                        <td width="40%">Case Status:</td>
                                                        <td width="60%">Case Created <span class="statusicon"><img src="/client/img/yellow.png" alt=""></span></td>
                                                    </tr>

                                                    <tr>
                                                        <td width="40%">Site:</td>
                                                        <td width="60%">Wymoo </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>

                                    </tr>

                                </tbody>
                            </table>

                        </div>

                        <div class="content_box case_history">
                            <h1>Case<span>HISTORY  </span></h1>
                        </div>

                        <div class="table-responsive">
                            <table class="table table_history table-hover">
                                <tbody>
                                    <tr class="bg_history">
                                        <td>Notes</td>
                                        <td>Date</td>
                                        <td>Created By</td>
                                        <td>Case Status</td>
                                    </tr>
                                    <tr class="odd">
                                        <td style="width:502px;">You may begin to edit your case information. </td>
                                        <td width="15%">Wed, Jan 23rd</td>
                                        <td width="15%">test4 ds</td>
                                        <td width="" style="border-right:none"><span class="floatleft">Case Created</span> <span class="statusicon"><img src="/client/img/yellow.png" alt=""></span></td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>

                    </div>

                </div>
            </div>
      