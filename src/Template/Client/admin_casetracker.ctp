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
<?php echo $this->Form->create('casetracker ', array('class'=>'form-inline','url'=>array('controller'=>'client','action'=>'casetracker',$id)));echo $this->Form->hidden('id');?>
<div class="divfull">
    <div class="gradbox">
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
                                    </div>
                                    <div class="inputrt"></div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Password:</td>
                            <td>
                                <div class="inputover floatleft pr20">
                                    <div class="inputlt"></div>
                                    <div class="inputmid">
                                    </div>
                                    <div class="inputrt"></div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Case#:</td>
                            <td>
                                <div class="inputover floatleft pr20">
                                    <div class="inputlt"></div>
                                    <div class="inputmid wid243">
                                    </div>
                                    <div class="inputrt"></div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Status:</td>
                            <td>
                                <div class="inputover floatleft pr20">
                                    <div class="inputlt"></div>
                                    <div class="inputmid select244">
                                    </div>
                                    <div class="inputrt"></div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Assigned To:</td>
                            <td>
                                <div class="inputover floatleft pr20">
                                    <div class="inputlt"></div>
                                    <div class="inputmid select244">
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
                            <td>Due Date:</td>
                            <td>
                                <div class="inputover floatleft pr20">
                                    <div class="inputlt"></div>
                                    <div class="inputmid">
                                    </div>
                                    <div class="inputrt"></div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Service Level:</td>
                            <td>
                                <div class="inputover floatleft pr20">
                                    <div class="inputlt"></div>
                                    <div class="inputmid select244">
                                    </div>
                                    <div class="inputrt"></div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Discount:</td>
                            <td>
                                <div class="inputover floatleft pr20">
                                    <div class="inputlt"></div>
                                    <div class="inputmid select244">
                                    </div>
                                    <div class="inputrt"></div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Fee:</td>
                            <td>
                                <div class="inputover floatleft pr20">
                                    <div class="inputlt"></div>
                                    <div class="inputmid">$
                                    </div>
                                    <div class="inputrt"></div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Add Note </td>
                            <td>
                            </td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>(100 characters available)</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>
                                <?php if($disabled==false){ ?>
                                    <div class="floatleft pr10">
                                        <div class="btnlt"></div>
                                        <div class="btnmid"><a href="#" id="update_case">Update</a></div>
                                        <div class="btnrt"></div>
                                    </div>
                                <?php } ?>
                                <div class="floatleft pr10">
                                    <div class="btnlt"></div>
                                    <div class="btnmid">
                                    </div>
                                    <div class="btnrt"></div>
                                </div>
                                <div class="floatleft pr10">
                                    <div class="btnlt"></div>
                                    <div class="btnmid">
                                    </div>
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
<div class="divfull pt15">
    <div class="gridbxover">
        <table width="100%" style="" border="0" cellspacing="0" cellpadding="0" class="tblcaselist">
            <tr>
                <th width="54%">Notes</th>
                <th width="15%"><span class="floatleft">Date</span></th>
                <th width="15%">Created By</th>
                <th width=""><span class="floatleft">Case Status</span></th>
            </tr>
        </table>
        <div class="scroll-pane">
        </table>
    </div>
</div>
</div>
<?php echo $this->Form->end();