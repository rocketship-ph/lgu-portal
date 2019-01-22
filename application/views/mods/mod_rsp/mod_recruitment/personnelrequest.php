<div class="container">
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>homepage">Home</a>
        </li>
        <li><a href="<?php echo base_url(); ?>recruitments/personnel">Personnel Requests Management</a></li>
        <li class="active">Personnel Request</li>
    </ol>
    <div class="row">
        <div class="form-horizontal col-md-10">
            <fieldset>
                <legend>Request for New Personnel</legend>

                <div align="center">
                    <h3>STATUS</h3>
                    <div id="stat"></div>
                </div>
                <div class="form-group">
                    <label for="lblRequestNumber" class="col-lg-2 control-label">Request Number</label>
                    <div class="col-lg-10">
                        <label id="lblRequestNumber" style="font-size:18px; font-weight:bold"></label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="lblRequestDate" class="col-lg-2 control-label">Request Date</label>
                    <div class="col-lg-10">
                        <label id="lblRequestDate" style="font-size:18px;"></label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="requestorsName" class="col-lg-2 control-label">Requestor's Name</label>
                    <div class="col-lg-10">
                        <input class="form-control" id="requestorsName" placeholder="Requestor's Name" type="text" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label for="department" class="col-lg-2 control-label">Department</label>
                    <div class="col-lg-10">
                        <input class="form-control" id="department" placeholder="Department" type="text" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label for="positionRquested" class="col-lg-2 control-label">Position Requested</label>
                    <div class="col-lg-10">
                        <input class="form-control" id="positionRquested" placeholder="Position Requested" type="text" readonly>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="reasonForRequesting" class="col-lg-2 control-label">Reason for Requesting</label>
                    <div class="col-lg-10">
                        <textarea class="form-control clearField" id="reasonForRequesting" rows="2" style="resize: none" readonly=""></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-12" style="text-align: right">
                        <button id="btnPositive" type="button" class="btn btn-default" style="display:none"></button>
                        <button id="btnNegative" type="button" class="btn btn-default" style="display:none"></button>
                        <button type="button" class="btn btn-default" onclick="javascript: window.location.href = '<?php echo base_url();?>recruitments/personnel'">BACK</button>
                    </div>
                </div>
            </fieldset>
        </div>
    </div>
</div>
<div class="modal fade bs-example-modal-sm" id="messagedialogmodal" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content ">
            <div class="modal-header" >
                <span id="messagealertmodaltitle">Server Message</span>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <span id="messagealertmodalmsg"></span>
            </div>
            <div class="modal-footer">
                <input type="button" id="btnmessagedialogmodal" class="btn btn-success" data-dismiss="modal"  onclick="javascript: window.location.href = '<?php echo base_url();?>recruitments/personnel'" value="OK">
            </div>
        </div>
    </div>
</div>
<!--DELETE MODAL-->
<div id="modalDeleteRequest" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Reject Request</h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <input type="hidden" id="deleterequestrowid">
                        <p>Are you sure you want to reject this request?</p>
                        <hr style="border: 1px dashed #6d6d6d">
                        <table>
                            <tr>
                                <td>REQUEST NUMBER</td>
                                <td align="center" width="10px">:</td>
                                <td><span id="deleteRequestNumber"></span></td>
                            </tr>
                            <tr>
                                <td>POSITION REQUESTED</td>
                                <td align="center" width="10px">:</td>
                                <td><span id="deletePositionName"></span></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="btnDeleteRequest">YES</button>
                <button type="button" class="btn btn-default" data-dismiss="modal" id="close">NO</button>
            </div>
        </div>

    </div>
</div>
<!--END OF DELETE MODAL-->
<script type="application/javascript">
    var requestNumber = atob("<?php echo $_GET['id'];?>");
    var userlevel= "<?php echo $this->session->userdata('userlevel');?>";
    var rowid;
    var positionname;
    $(document).ready(function(){
        $("#lblRequestNumber").text(requestNumber);
        getPersonnelRequest();
        $("#loadingmodal").modal("show");
    });
    function getPersonnelRequest(){
        $.ajax({
            url: "<?php echo base_url();?>recruitments/getpersonnelrequest",
            type: "POST",
            dataType: "json",
            data: {
                "REQUESTNUMBER":requestNumber
            },
            success: function(result){
                $("#loadingmodal").modal("hide");
                if(result.Code == "00"){
                    console.log(result);
                    $("#lblRequestDate").text(moment(result.details[0].datecreated).format("ddd, MMM DD, YYYY"));
                    $("#requestorsName").val(result.details[0].requestorname);
                    $("#department").val(result.details[0].department);
                    $("#positionRquested").val(result.details[0].positionname +" [" + result.details[0].positioncode+"]");
                    $("#reasonForRequesting").val(atob(result.details[0].reason));
                    $("#stat").empty();
                    rowid=result.details[0].id;
                    positionname=result.details[0].positionname;
                    var stat = "";
                    if(result.details[0].levelofapproval == "0"){
                        stat = '<label class="label label-default" style="font-size:18px">PENDING</label>';
                    } else if(result.details[0].levelofapproval == "1"){
                        stat = '<label class="label label-warning" style="font-size:18px">RECOMMENDING APPROVAL</label>';
                    } else if(result.details[0].levelofapproval == "2"){
                        stat = '<label class="label label-success" style="font-size:18px">APPROVED</label>';
                    } else {
                        stat = '<label class="label label-danger" style="font-size:18px">REJECTED</label>';
                    }
                    $("#stat").append(stat);
                    if(userlevel=="HRMANAGER"){
                        console.log(userlevel);
                        if(result.details[0].levelofapproval == "0"){
                            $("#btnPositive").removeClass("btn-default").addClass("btn-success");
                            $("#btnPositive").html("RECOMMEND");
                            $("#btnPositive").show();
                            $("#btnNegative").removeClass("btn-default").addClass("btn-primary");
                            $("#btnNegative").html("REJECT");
                            $("#btnNegative").show();
                        }
                    }
                    if(userlevel=="MUNICIPALHEAD"){
                        console.log(userlevel);
                        if(result.details[0].levelofapproval == "1"){
                            $("#btnPositive").removeClass("btn-default").addClass("btn-success");
                            $("#btnPositive").html("APPROVE");
                            $("#btnPositive").show();
                            $("#btnNegative").removeClass("btn-default").addClass("btn-primary");
                            $("#btnNegative").html("REJECT");
                            $("#btnNegative").show();
                        }
                    }


                } else {
                    messageDialogModal("Server Message",result.Message);
                }
            },
            error: function(e){
                console.log(e);
                $("#loadingmodal").modal("hide");
            }
        });
    }
    $("#btnPositive").click(function(){
        requestAction(0);
    });
    $("#btnNegative").click(function(){
        $("#deleterequestrowid").val(rowid);
        $("#deleteRequestNumber").text(requestNumber);
        $("#deletePositionName").text(positionname);
        $("#modalDeleteRequest").modal("show");
    });
    $("#btnDeleteRequest").click(function(){
        $("#modalDeleteRequest").modal("hide");
        requestAction(1);
    });
    function requestAction(isPositive){
        $("#loadingmodal").modal("show");
        $.ajax({
            url: "<?php echo base_url();?>recruitments/requestapprovallevel",
            type: "POST",
            dataType: "json",
            data: {
                "REQUESTNUMBER":requestNumber,
                "ROWID":rowid,
                "ISPOSITIVE":isPositive
            },
            success: function(result){
                $("#loadingmodal").modal("hide");
                if(result.Code == "00"){
                    $("#messagedialogmodal").modal('show');
                    $("#messagealertmodalmsg").text(result.Message);
                } else {
                    messageDialogModal("Server Message",result.Message);
                }
            },
            error: function(e){
                console.log(e);
                $("#loadingmodal").modal("hide");
            }
        });
    }
</script>
<style type="text/css">
</style>