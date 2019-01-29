<div id="myTabContent" class="tab-content">

    <div id="edit" class="tab-pane fade active in">
        <div class="content_box">
            <form action="/client/caseinfo/7957" class="form-inline" id="CaseTableCaseinfoForm" method="post" accept-charset="utf-8">
                <div style="display:none;">
                    <input type="hidden" name="_method" value="PUT">
                </div>
                <input type="hidden" name="data[CaseTable][id]" value="7957" id="CaseTableId">
                <input type="hidden" name="data[CaseTable][is_submited]" value="0" id="CaseTableIsSubmited">
                <h1>Case Data<span>Center </span></h1>
                <div class="secure"> <span> Secure Contact</span> </div>
                <div class="clearfix"></div>
                <p>Your investigation is in progress and your case data is no longer editable. Please contact your investigator if you need to make updates.</p>
                <div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div>
                            <div class="form_content">
                                <h2>Step 1: Your Data</h2>
                                <img src="/images/tabpoint.png" alt="tagpoint" class="tag_arrow"> </div>
                            <div class="form_box">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label>Your First Name:<span class="error_class">*</span></label>
                                    </div>
                                    <div class="col-sm-8">
                                        <input name="data[CaseTable][client_fname]" type="text" class="form-control" value="dfggh" id="CaseTableClientFname"> </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label>Your Last Name:<span class="error_class">*</span></label>
                                    </div>
                                    <div class="col-sm-8">
                                        <input name="data[CaseTable][client_lname]" type="text" class="form-control" value="fghh" id="CaseTableClientLname"> </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label>Your Email:<span class="error_class">*</span></label>
                                    </div>
                                    <div class="col-sm-8">
                                        <input name="data[CaseTable][client_email]" type="text" class="form-control" value="test5678909@gmail.com" id="CaseTableClientEmail"> </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="form_content">
                                <h2>Step 2: About the subject</h2>
                                <img src="/images/tabpoint.png" alt="tagpoint" class="tag_arrow"> </div>
                            <div class="form_box">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label>Subject's Full Name:</label>
                                    </div>
                                    <div class="col-sm-8">
                                        <input name="data[CaseTable][subject_fullname]" type="text" class="form-control" value="" id="CaseTableSubjectFullname"> </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label>Subject's Alias:</label>
                                    </div>
                                    <div class="col-sm-8">
                                        <input name="data[CaseTable][subject_alias]" type="text" class="form-control" value="" id="CaseTableSubjectAlias"> </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label>Subject's Email:</label>
                                    </div>
                                    <div class="col-sm-8">
                                        <input name="data[CaseTable][subject_email]" type="text" class="form-control" value="" id="CaseTableSubjectEmail"> </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label>Subject's Phone:</label>
                                    </div>
                                    <div class="col-sm-8">
                                        <input name="data[CaseTable][subject_phone]" type="text" class="form-control" value="" id="CaseTableSubjectPhone"> </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-4">
                                        <label>Subject's Date of Birth:</label>
                                    </div>
                                    <div class="col-sm-8">
                                        <input name="data[CaseTable][subject_dob1]" type="text" id="CaseTableSubjectDob" class="form-control hasDatepicker" value="">
                                        <input type="hidden" name="data[CaseTable][subject_dob]" id="CaseTableSubjectDob1" value=""> <small>*Leave blank and notify your investigator if unsure.</small> </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label>Subject's Address:</label>
                                    </div>
                                    <div class="col-sm-8">
                                        <textarea name="data[CaseTable][subject_address]" class="form-control" rows="4" style="height:65px;" id="CaseTableSubjectAddress"></textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label>Subject's Education:</label>
                                    </div>
                                    <div class="col-sm-8">
                                        <textarea name="data[CaseTable][subject_education]" class="form-control" rows="3" id="CaseTableSubjectEducation"></textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label>Subject's Employment::</label>
                                    </div>
                                    <div class="col-sm-8">
                                        <textarea name="data[CaseTable][subject_employment]" class="form-control" rows="3" style="height:65px;" id="CaseTableSubjectEmployment"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div>
                            <div class="form_content">
                                <h2>Step 3: Some background</h2>
                                <img src="/images/tabpoint.png" alt="tagpoint" class="tag_arrow"> </div>
                            <div class="form_box">
                                <label>How do or did you communicate with the subject? </label>
                                <ul class="checkbox_list">
                                    <li>
                                        <input type="hidden" name="data[CaseTable][subject_communication_email]" id="CaseTableSubjectCommunicationEmail_" value="0">
                                        <input type="checkbox" name="data[CaseTable][subject_communication_email]" value="1" id="CaseTableSubjectCommunicationEmail"> Email</li>
                                    <li>
                                        <input type="hidden" name="data[CaseTable][subject_communication_messenger]" id="CaseTableSubjectCommunicationMessenger_" value="0">
                                        <input type="checkbox" name="data[CaseTable][subject_communication_messenger]" value="1" id="CaseTableSubjectCommunicationMessenger"> Messenger</li>
                                    <li>
                                        <input type="hidden" name="data[CaseTable][subject_communication_phone]" id="CaseTableSubjectCommunicationPhone_" value="0">
                                        <input type="checkbox" name="data[CaseTable][subject_communication_phone]" value="1" id="CaseTableSubjectCommunicationPhone"> Phone</li>
                                    <li>
                                        <input type="hidden" name="data[CaseTable][subject_communication_webcam]" id="CaseTableSubjectCommunicationWebcam_" value="0">
                                        <input type="checkbox" name="data[CaseTable][subject_communication_webcam]" value="1" id="CaseTableSubjectCommunicationWebcam"> Webcam</li>
                                    <li>
                                        <input type="hidden" name="data[CaseTable][subject_communication_inperson]" id="CaseTableSubjectCommunicationInperson_" value="0">
                                        <input type="checkbox" name="data[CaseTable][subject_communication_inperson]" value="1" id="CaseTableSubjectCommunicationInperson"> In Person</li>
                                </ul>
                                <label>Please provide a brief summary of your case and how we can help. </label>
                                <div class="text_area">
                                    <textarea name="data[CaseTable][subject_background]" class="form-control" rows="4" id="CaseTableSubjectBackground"></textarea> <span id="subject_background_count">(1000 character maximum)</span> </div>
                            </div>
                        </div>
                        <div class="step4">
                            <div class="form_content">
                                <h2>Step 4: A Few Questions (if applicable)</h2>
                                <img src="/images/tabpoint.png" alt="tagpoint" class="tag_arrow"> </div>
                            <div class="form_box">
                                <div class="row">
                                    <div class="col-sm-7">
                                        <label>Has the subject sent any ID or documents?</label>
                                    </div>
                                    <div class="col-sm-5">
                                        <input name="data[CaseTable][subject_id]" type="text" class="form-control" value="" id="CaseTableSubjectId"> </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-7">
                                        <label>How long have you known the subject?</label>
                                    </div>
                                    <div class="col-sm-5">
                                        <input name="data[CaseTable][subject_how_long]" type="text" class="form-control" value="" id="CaseTableSubjectHowLong"> </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-7">
                                        <label>If you met the subject via the internet, please specify on which website.</label>
                                    </div>
                                    <div class="col-sm-5">
                                        <input name="data[CaseTable][subject_website_met]" type="text" class="form-control" value="" id="CaseTableSubjectWebsiteMet"> </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-7">
                                        <label>Have you sent anything to the subject's address? If so, was it received?</label>
                                    </div>
                                    <div class="col-sm-5">
                                        <input name="data[CaseTable][subject_sent_address]" type="text" class="form-control" value="" id="CaseTableSubjectSentAddress"> </div>
                                </div>
                            </div>
                        </div>
                        <div>

                            <div class="form_content">
                                <h2>Step 5: Optional Documentation</h2>
                                <img src="/images/tabpoint.png" alt="tagpoint" class="tag_arrow"> </div>
                            <div class="form_box photo_add">
                                <table width="100%" border="0" cellspacing="8" cellpadding="0">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div id="AjaxMultiUpload7957_photo">
                                                    <div class="qq-uploader">
                                                        <div class="qq-upload-drop-area well" style="display: none;"><span>Drop files here to attach</span></div>
                                                        <div class="qq-upload-button" style="position: relative; overflow: hidden; direction: ltr;"><span><strong>Photographs of subject</strong><a class="btn btn-default" href="#">Add</a></span>
                                                            <input multiple="multiple" type="file" name="file" style="position: absolute; right: 0px; top: 0px; font-family: Arial; font-size: 118px; margin: 0px; padding: 0px; cursor: pointer; opacity: 0;">
                                                        </div>
                                                        <ul class="qq-upload-list"></ul>
                                                    </div>
                                                </div>

                                                <script>
                                                    $(function() {

                                                        var uploader1 = new qq.FileUploader({
                                                            element: document.getElementById('AjaxMultiUpload7957_photo'),
                                                            action: '/client/ajax-upload/CaseTable___7957_photo/4',
                                                            debug: true,
                                                            allowedExtensions: ["jpg", "gif", "png", "jpeg"],
                                                            template: '<div class="qq-uploader"><div class="qq-upload-drop-area well"><span>Drop files here to attach</span></div><div class="qq-upload-button"><span><strong>Photographs of subject</strong><a class="btn btn-default" href="#">Add</a></span></div><ul class="qq-upload-list"></ul></div>',
                                                            onComplete: function(id, fileName, responseJSON) {

                                                                if (responseJSON.success) {

                                                                    if ($('#' + 'CaseTable' + '7957_photo' + ' option[value="' + fileName + '"]').length == 0) {
                                                                        $('#' + 'CaseTable' + '7957_photo').append('<option selected="selected" title="' + '/client/ajax_multi_upload/uploads/download/' + responseJSON.file + '" value="' + fileName + '">' + fileName + '</option>');
                                                                        $('#' + 'CaseTable' + '7957_photo').trigger("liszt:updated");
                                                                    }
                                                                }
                                                                if (responseJSON.error) {
                                                                    $('.qq-upload-fail').hide();
                                                                }
                                                            }
                                                        });

                                                        $('#' + 'CaseTable' + '7957_photo').chosen().change(function() {
                                                            //$('#'+ 'CaseTable' + '7957_photo' +' option:not(:selected)').remove();
                                                            if ('/client/ajax-delete' != '') {
                                                                $('#' + 'CaseTable' + '7957_photo' + ' option:not(:selected)').each(function() {
                                                                    deleteurl = $(this).attr('title').replace("/client/ajax_multi_upload/uploads/download", "/client/ajax-delete");
                                                                    var self = this;
                                                                    $.ajax({
                                                                        url: deleteurl,
                                                                        success: function() {
                                                                            $(self).remove();
                                                                        }
                                                                    });

                                                                });
                                                                $('#' + 'CaseTable' + '7957_photo').trigger("liszt:updated");
                                                            } else {
                                                                alert('You have no privilege to delete');
                                                                $('#' + 'CaseTable' + '7957_photo').find("option").attr("selected", true);
                                                                return false;
                                                            }

                                                        });

                                                    });
                                                </script>
                                                <select id="CaseTable7957_photo" data-placeholder="Click on Add to attach files" style="width: 450px; display: none;" class="chzn-select chzn-done" multiple="multiple" name="data[CaseTable][7957_photo][]"></select>
                                                <div id="CaseTable7957_photo_chzn" class="chzn-container chzn-container-multi" style="width: 450px;">
                                                    <ul class="chzn-choices">
                                                        <li class="search-field">
                                                            <input type="text" value="Click on Add to attach files" class="default" autocomplete="off" style="width: 178px;">
                                                        </li>
                                                    </ul>
                                                    <div class="chzn-drop" style="left: -9000px; width: 450px; top: 32px;">
                                                        <ul class="chzn-results"></ul>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="padding-top: 10px;">
                                                <link rel="stylesheet" type="text/css" href="/client/ajax_multi_upload/css/chosen.css">
                                                <link rel="stylesheet" type="text/css" href="/client/ajax_multi_upload/css/fileuploader.css">
                                                <script src="/client/ajax_multi_upload/js/fileuploader.js" type="text/javascript"></script>
                                                <script src="/client/ajax_multi_upload/js/chosen.jquery.js" type="text/javascript"></script>

                                                <div id="AjaxMultiUpload7957_document">
                                                    <div class="qq-uploader">
                                                        <div class="qq-upload-drop-area well" style="display: none;"><span>Drop files here to attach</span></div>
                                                        <div class="qq-upload-button" style="position: relative; overflow: hidden; direction: ltr;"><span><strong>Additional documentation (ID, passport, visa, records, etc.)&nbsp;</strong><a class="btn btn-default" href="#">Add</a></span>
                                                            <input multiple="multiple" type="file" name="file" style="position: absolute; right: 0px; top: 0px; font-family: Arial; font-size: 118px; margin: 0px; padding: 0px; cursor: pointer; opacity: 0;">
                                                        </div>
                                                        <ul class="qq-upload-list"></ul>
                                                    </div>
                                                </div>
                                                <script src="/client/ajax_multi_upload/js/fileuploader.js" type="text/javascript"></script>
                                                <script>
                                                    var WEBSITE_URL = 'https://www.wymoo.com/client/';
                                                    var dlg = $("#preview_dialog").dialog({
                                                        autoOpen: false,
                                                        draggable: false,
                                                        resizable: false
                                                    });

                                                    $(function() {
                                                        // $("div#preview_dialog" ).dialog({autoOpen: false});	    
                                                        var uploader2 = new qq.FileUploader({
                                                            element: document.getElementById('AjaxMultiUpload7957_document'),
                                                            action: '/client/ajax-upload/CaseTable___7957_document/4',
                                                            debug: true,
                                                            allowedExtensions: ["jpg", "gif", "png", "jpeg", "pdf", "doc", "docx", "xls", "xlsx"],
                                                            template: '<div class="qq-uploader"><div class="qq-upload-drop-area well"><span>Drop files here to attach</span></div><div class="qq-upload-button"><span><strong>Additional documentation (ID, passport, visa, records, etc.)&nbsp;</strong><a class="btn btn-default" href="#">Add</a></span></div><ul class="qq-upload-list"></ul></div>',
                                                            onComplete: function(id, fileName, responseJSON) {

                                                                if (responseJSON.success) {

                                                                    if ($('#' + 'CaseTable' + '7957_document' + ' option[value="' + fileName + '"]').length == 0) {
                                                                        $('#' + 'CaseTable' + '7957_document').append('<option selected="selected" title="' + '/client/ajax_multi_upload/uploads/download/' + responseJSON.file + '" value="' + fileName + '">' + fileName + '</option>');
                                                                        $('#' + 'CaseTable' + '7957_document').trigger("liszt:updated");
                                                                    }
                                                                }
                                                                if (responseJSON.error) {
                                                                    $('.qq-upload-fail').hide();
                                                                }

                                                            }

                                                        });

                                                        $('#' + 'CaseTable' + '7957_document').chosen({
                                                            disabled: true
                                                        }).change(function() {
                                                            if ('/client/ajax-delete' != '') {
                                                                $('#' + 'CaseTable' + '7957_document' + ' option:not(:selected)').each(function() {
                                                                    deleteurl = $(this).attr('title').replace("/client/ajax_multi_upload/uploads/download", "/client/ajax-delete");
                                                                    var self = this;
                                                                    $.ajax({
                                                                        url: deleteurl,
                                                                        success: function() {
                                                                            $(self).remove();
                                                                        }
                                                                    });

                                                                });
                                                                $('#' + 'CaseTable' + '7957_document').trigger("liszt:updated");
                                                            } else {
                                                                $('#' + 'CaseTable' + '7957_document').find("option").attr("selected", true);
                                                                alert('You have no privilege to delete');
                                                                return false;
                                                            }
                                                            //remove();

                                                        });

                                                    });
                                                </script>
                                                <select id="CaseTable7957_document" data-placeholder="Click on Add to attach files" style="width: 450px; display: none;" class="chzn-select chzn-done" multiple="multiple" name="data[CaseTable][7957_document][]"></select>
                                                <div id="CaseTable7957_document_chzn" class="chzn-container chzn-container-multi" style="width: 450px;">
                                                    <ul class="chzn-choices">
                                                        <li class="search-field">
                                                            <input type="text" value="Click on Add to attach files" class="default" autocomplete="off" style="width: 178px;">
                                                        </li>
                                                    </ul>
                                                    <div class="chzn-drop" style="left: -9000px; width: 450px; top: 32px;">
                                                        <ul class="chzn-results"></ul>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class=" col-sm-offset-6 col-sm-6">
                        <div class="clearfix save_wrp"><strong>All services are strictly confidential and discreet.</strong>
                            <a href="javascript:void(0)" class="btn btn-default pull-right " onclick="submit_form()">Save</a></div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>