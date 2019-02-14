<style>
    .panel{
        height: 90px;
        padding: 8px;
        width: 135px;
        border: 1px solid #d8d8d8;
    }

    input[type="radio"]{
        transform: scale(1.2);
    }

    .label-option{
        font-weight: bold;
        font-size: 12pt;
        margin-bottom: 0px !important;
    }

    .criteria-title{
        font-weight: bold !important;
        text-decoration: underline;
    }

    input[type="checkbox"]{
        transform: scale(1.2);
    }


</style>
<style>input[type=number]::-webkit-inner-spin-button,input[type=number]::-webkit-outer-spin-button{-webkit-appearance:none;-moz-appearance:none;appearance:none;margin:0}</style>
<div class="well">
    <table>
        <tr>
            <td rowspan="2">
                <div style="height: 70px;width:70px;background-color: #42A5F5;text-align: center;border-radius: 5px;">
                    <br>
                    <img src="<?php echo base_url();?>assets/img/icons/recruitment.png" height="50px">
                </div>
            </td>
            <td rowspan="2" width="15px">
                &nbsp;
            </td>
            <td colspan="4">
                <h4>Welcome! <span style="font-weight: 700;margin-top: 5px;"><?php echo $this->session->userdata('firstname');?></span> to <br>Transaction Menu</h4>
                <h4 style="font-size: 12pt">Click the Link Under Menu to make a selection</h4>
            </td>
            <td align="center" width="20px">
                &nbsp;&nbsp;
            </td>
            <td style="border-left: 1px solid #d1d1d1">
            <td align="center" width="20px">
                &nbsp;&nbsp;
            </td>
            <td>
                <div class="panel" align="center" id="panel_transactionmenu">
                    <a href="<?php echo base_url();?>main/transaction" style="height: 60px;width:60px;text-align: center;border-radius: 5px;">
                        <img src="<?php echo base_url();?>assets/img/icons/transaction.png" height="40px">
                        <br>
                        Transaction Menu
                    </a>
                </div>
            </td>
            <td align="center" width="20px">
                &nbsp;&nbsp;
            </td>
            <td>
                <div class="panel" align="center" id="panel_boarding">
                    <a  href="<?php echo base_url();?>transaction/pmsrating" style="height: 60px;width:60px;text-align: center;border-radius: 5px;">
                        <img src="<?php echo base_url();?>assets/img/icons/potentialrating.png" height="40px">
                        <br>
                        Potential Rating
                    </a>
                </div>
            </td>
            </td>
        </tr>
    </table>
    <div class="row">
        <div class="col-md-12">
            <hr>
        </div>
        <div class="col-md-12">
            <div class="form-horizontal">
                <fieldset>
                    <legend>Potential Rating for Internal Applicants</legend>
                    <div class="row">
                        <div class="form-group">
                            <label for="requestnumber" class="col-lg-2 control-label">Request Number</label>
                            <div class="col-lg-4">
                                <select class="form-control clearField" id="requestnumber">
                                    <option selected disabled>- Select Request Number -</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="well" style="display: none" id="divRequestDetails">
                                <div class="form-group">
                                    <label for="groupposition" class="col-lg-4 control-label">Position</label>
                                    <div class="col-lg-8">
                                        <b class="control-label" id="lblposition"></b>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="groupposition" class="col-lg-4 control-label">Group Position</label>
                                    <div class="col-lg-8">
                                        <b class="control-label" id="lblgroupposition"></b>
                                    </div>
                                    <label id="grouppositiondescription" class="col-lg-12 control-label"></label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="table-responsive" id="tblemployeescont" style="display: none">
                                <table id="tblemployees" class="display compact responsive cell-border" cellspacing="0" width="100%" >
                                    <thead>
                                    <tr>
                                        <th rowspan="2">APPLICANT CODE</th>
                                        <th rowspan="2">EMPLOYEE NAME</th>
                                        <th rowspan="2">CURRENT POSITION</th>
                                        <th rowspan="2">CURRENT DEPARTMENT</th>
                                        <th rowspan="2">DESIRED POSITION</th>
                                        <th colspan="2">POTENTIAL RATING (10%)</th>
                                        <th rowspan="2">ACTION</th>
                                    </tr>
                                    <tr>
                                        <th>TOTAL RATING</th>
                                        <th>EPS</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </div>
        </div>
    </div>
</div>
<div class="modal fade bs-example-modal-sm" id="modalRating" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-sm">
        <div class="modal-content ">
            <div class="modal-body">
                <legend>Potential Rating</legend>

                <div class="form-group">
                    <label class="control-label">Enter Rating for applicant: <b id="lblapplicantname"></b></label>
                    <input type="number" class="form-control clearField" placeholder="Rating.." id="applicantrating" maxlength="5" oninput="maxLengthCheck(this)">
                </div>
                <div align="right">
                    <input type="button" class="btn btn-success" id="btnProceedRating" value="SUBMIT">
                    <input type="button" class="btn btn-secondary" data-dismiss="modal"  value="CANCEL">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade bs-example-modal-sm" id="modalUpdateRating" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-sm">
        <div class="modal-content ">
            <div class="modal-body">
                <legend>Update Potential Rating</legend>

                <div class="form-group">
                    <input type="hidden" id="rowidedit">
                    <label class="control-label">Update Rating for applicant: <b id="lblapplicantnameedit"></b></label>
                    <input type="number" class="form-control clearField" placeholder="Rating.." id="applicantratingedit" maxlength="5" oninput="maxLengthCheck(this)">
                </div>
                <div align="right">
                    <input type="button" class="btn btn-success" id="btnProceedUpdateRating" value="SUBMIT">
                    <input type="button" class="btn btn-secondary" data-dismiss="modal"  value="CANCEL">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade bs-example-modal-sm" id="modalDeleteRating" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-sm">
        <div class="modal-content ">
            <div class="modal-body">
                <legend>Delete Potential Rating</legend>

                <div class="form-group">
                    <label class="control-label">Are You Sure to Delete Rating for applicant: <b id="lblapplicantnamedelete"></b>?</label>
                    <input type="hidden" id="rowiddelete">
                </div>
                <div align="right">
                    <input type="button" class="btn btn-success" id="btnProceedDeleteRating" value="DELETE">
                    <input type="button" class="btn btn-secondary" data-dismiss="modal"  value="CANCEL">
                </div>
            </div>
        </div>
    </div>
</div>


<script type="application/javascript">
var tbl;
function maxLengthCheck(object) {
    if (object.value > 100){
        messageDialogModal("Input Error","Please provide a rating not exceeding 100%");
        object.value = "";
    }
    if (object.value.length > object.maxLength){
        object.value = object.value.slice(0, object.maxLength);
    }
}
$(document).ready(function(){
    $("#nav_recruitment_transaction").removeClass().addClass("active");

    $("#ul_recruitmentmenu").show();
    $("#ul_mainmenu").hide();

    $("#panel_boarding").addClass("selected_panel");
    $(".lbldate").text(moment().format("MMMM DD, YYYY"));
    loadRequestnumbers();
    $("#divPrint").hide();
    $("#divBtns").hide();
});

function loadRequestnumbers(){
    $("#loadingmodal").modal("show");
    var select = $("#requestnumber");
    select.empty();
    $.ajax({
        url: "<?php echo base_url();?>potentialratingmanagement/getrequests",
        type: "POST",
        dataType: "json",
        success: function(result){
            $("#loadingmodal").modal("hide");
            console.log("ff");
            console.log(result);
            if(result.Code == "00"){
                select.append('<option selected disabled>- Select Request Number -</option>');
                for(var keys in result.details){
                    select.append('<option position="'+result.details[keys].position+'" groupposition="'+result.details[keys].groupposition+'" desc="'+result.details[keys].groupdesc+'" value="'+result.details[keys].requestnumber+'">'+result.details[keys].requestnumber+'</option>');
                }
            } else {
                select.append('<option selected disabled>- No Position Request(s) Available -</option>');
            }
        },
        error: function(e){
            $("#loadingmodal").modal("hide");
            select.append('<option selected disabled>- No Position Request(s) Available -</option>');
            console.log(e);
        }
    });
}

$("#requestnumber").change(function(){
    $("#lblposition").text($("#requestnumber option:selected").attr("position"));
    $("#lblgroupposition").text($("#requestnumber option:selected").attr("groupposition"));
    $("#grouppositiondescription").text(atob($("#requestnumber option:selected").attr("desc")));
    $("#divRequestDetails").show();
    $("#loadingmodal").modal("show");
    tbl = $("#tblemployees").dataTable({
        "destroy": true,
        "responsive": true,
        "oLanguage": {
            "sSearch": "Search:",
            "eEmptyTable":"No Internal Applicants Available"
        },
        "order": [[0, "asc"]],
        "ajax": {
            "url": "<?php echo base_url(); ?>potentialratingmanagement/displaydetails",
            "type": "POST",
            "dataType": "json",
            "data": {
                "REQUESTNUMBER":$("#requestnumber option:selected").val()
            },
            dataSrc: function (json) {
                if (json.Code == "00") {
                    $('#loadingmodal').modal('hide');
                    $('#tblemployeescont').show();
                    return json.details;
                } else {
                    messageDialogModal("No Data Available",json.Message);
                    $('#loadingmodal').modal('hide');
                    return 0;
                }
            }
        },
        "columnDefs": [
            { "width": "12%", "targets": 7 }
        ],
        "columns": [
            {"data": "applicantcode"},
            {"data": function(data){
                return data.firstname +" "+data.middlename + " "+data.lastname;
            }},
            {"data": "currentposition"},
            {"data": "department"},
            {"data": function(data){
                return $("#requestnumber option:selected").attr("position");
            }},
            {"data": function(data){
                return data.rating  == null || data.rating == "" || data.rating == undefined ? "-" : data.rating;
            }},
            {"data": function(data){
                return data.eps  == null || data.eps == "" || data.eps == undefined ? "-" : data.eps;
            }},
            {"data": function(data){
                function especialJSONStringify (data) {
                    return JSON.stringify(data).
                        replace(/&/g, "&amp;").
                        replace(/</g, "&lt;").
                        replace(/>/g, "&gt;").
                        replace(/"/g, "&quot;").
                        replace(/'/g, "&#039;");
                }
                var isvisible = "";
                if(data.rowid == "" || data.rowid == null){
                    isvisible="hidden";
                } else {
                    isvisible="visible";
                }

                var isvisible2 = "";
                if(data.rowid == "" || data.rowid == null){
                    isvisible2="visible";
                } else {
                    isvisible2="hidden";
                }
                return "<a style='visibility: "+isvisible2+"' class='btn btn-success btn-sm' title='Rating' href='javascript:actionRating("+especialJSONStringify(data)+");'>Rate</a>&nbsp;<a class='btn btn-warning btn-sm' title='Edit Rating' style='visibility: "+isvisible+"' href='javascript:actionEdit("+especialJSONStringify(data)+");'><i class='fa fa-pencil'></i></a>&nbsp;<a style='visibility: "+isvisible+"' class='btn btn-primary btn-sm' title='Delete Rating' href='javascript:actionDelete("+especialJSONStringify(data)+");'><i class='fa fa-trash'></i></a>";
            }}
        ],
        "sDom": 'lfrtip'
    });
});

function actionRating(data){
    $("#applicantrating").val("");
    $("#applicantrating").attr("applicantcode",data.applicantcode);
    $("#lblapplicantname").text(data.firstname +" "+data.middlename + " "+data.lastname);
    $("#modalRating").modal("show");
}

function actionEdit(data){
    $("#rowidedit").val(data.rowid);
    $("#applicantratingedit").val(data.rating);
    $("#applicantratingedit").attr("applicantcode",data.applicantcode);
    $("#lblapplicantnameedit").text(data.firstname +" "+data.middlename + " "+data.lastname);
    $("#modalUpdateRating").modal("show");
}

function actionDelete(data){
    $("#rowiddelete").val(data.rowid);
    $("#rowiddelete").attr("applicantcode",data.applicantcode);
    $("#lblapplicantnamedelete").text(data.firstname +" "+data.middlename + " "+data.lastname);
    $("#modalDeleteRating").modal("show");
}

$("#btnProceedRating").click(function(){
    if($("#applicantrating").val() == "" || $("#applicantrating").val() == null){
        messageDialogModal("Required","Please enter Performance Rating");
    } else {
        $("#modalRating").modal("hide");
        $("#loadingmodal").modal("show");
        $.ajax({
            url: "<?php echo base_url();?>potentialratingmanagement/submit",
            type: "POST",
            dataType: "json",
            data: {
                "APPLICANTCODE":$("#applicantrating").attr("applicantcode"),
                "REQUESTNUMBER":$("#requestnumber").val(),
                "RATING": $("#applicantrating").val()
            },
            success: function(result){
                $("#loadingmodal").modal("hide");
                console.log(result);
                if(result.Code == "00"){
                    messageDialogModal("Server Message",result.Message);
                    tbl.api().ajax.reload();
                } else {
                    messageDialogModal("Server Message",result.Message);
                }
            },
            error: function(e){
                $("#loadingmodal").modal("hide");
                console.log(e);
            }
        });
    }
});
$("#btnProceedUpdateRating").click(function(){
    if($("#applicantratingedit").val() == "" || $("#applicantratingedit").val() == null){
        messageDialogModal("Required","Please enter Performance Rating");
    } else {
        $("#modalUpdateRating").modal("hide");
        $("#loadingmodal").modal("show");
        $.ajax({
            url: "<?php echo base_url();?>potentialratingmanagement/update",
            type: "POST",
            dataType: "json",
            data: {
                "APPLICANTCODE":$("#applicantratingedit").attr("applicantcode"),
                "REQUESTNUMBER":$("#requestnumber").val(),
                "RATING": $("#applicantratingedit").val(),
                "ROWID": $("#rowidedit").val()
            },
            success: function(result){
                $("#loadingmodal").modal("hide");
                console.log(result);
                if(result.Code == "00"){
                    messageDialogModal("Server Message",result.Message);
                    tbl.api().ajax.reload();
                } else {
                    messageDialogModal("Server Message",result.Message);
                }
            },
            error: function(e){
                $("#loadingmodal").modal("hide");
                console.log(e);
            }
        });
    }
});

$("#btnProceedDeleteRating").click(function(){
    $("#modalDeleteRating").modal("hide");
    $("#loadingmodal").modal("show");
    $.ajax({
        url: "<?php echo base_url();?>potentialratingmanagement/delete",
        type: "POST",
        dataType: "json",
        data: {
            "ROWID": $("#rowiddelete").val(),
            "APPLICANTCODE": $("#rowiddelete").attr("applicantcode")
        },
        success: function(result){
            $("#loadingmodal").modal("hide");
            console.log(result);
            if(result.Code == "00"){
                messageDialogModal("Server Message",result.Message);
                tbl.api().ajax.reload();
            } else {
                messageDialogModal("Server Message",result.Message);
            }
        },
        error: function(e){
            $("#loadingmodal").modal("hide");
            console.log(e);
        }
    });
});
</script>