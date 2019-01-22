<style>
    .panel{
        height: 90px;
        padding: 8px;
        width: 135px;
        border: 1px solid #d8d8d8;
    }
</style>
<div class="well">
    <table>
        <tr>
            <td rowspan="2">
                <div style="height: 70px;width:70px;background-color: #00C853;text-align: center;border-radius: 5px;">
                    <br>
                    <img src="<?php echo base_url();?>assets/img/icons/assessment_check.png" height="50px">
                </div>
            </td>
            <td rowspan="2" width="15px">
                &nbsp;
            </td>
            <td colspan="4">
                <h4>Welcome! <span style="font-weight: 700;margin-top: 5px;"><?php echo $this->session->userdata('firstname');?></span> to <br>PMS Menu</h4>
                <h4 style="font-size: 12pt">Click the Link Under Menu to make a selection</h4>
            </td>
            <td align="center" width="20px">
                &nbsp;&nbsp;
            </td>
            <td style="border: 1px solid #d1d1d1">
            <td align="center" width="20px">
                &nbsp;&nbsp;
            </td>
            <td>
                <div class="panel" align="center" id="panel_strategicobjectives">
                    <a href="<?php echo base_url();?>strategicfunctions/strategicobjective" style="height: 60px;width:60px;text-align: center;border-radius: 5px;">
                        <img src="<?php echo base_url();?>assets/img/icons/competency_index.png" height="40px">
                        <br>
                        Strategic Objectives
                    </a>
                </div>
            </td>
            <td align="center" width="20px">
                &nbsp;&nbsp;
            </td>
            <td>
                <div class="panel" align="center" id="panel_assignso">
                    <a  href="<?php echo base_url();?>strategicfunctions/assignobjectives" style="height: 60px;width:60px;text-align: center;border-radius: 5px;">
                        <img src="<?php echo base_url();?>assets/img/icons/data_sheet.png" height="40px">
                        <br>
                        Assign Strategic Objectives
                    </a>
                </div>
            </td>
            <td align="center" width="20px">
                &nbsp;&nbsp;
            </td>
            <td>
                <div class="panel" align="center" id="panel_approvemfopap">
                    <a  href="<?php echo base_url();?>strategicfunctions/approvemfopap" style="height: 60px;width:60px;text-align: center;border-radius: 5px;">
                        <img src="<?php echo base_url();?>assets/img/icons/approve_mfopap.png" height="40px">
                        <br>
                        Approve MFO/PAP
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
        <div class="col-lg-12">
            <legend>Assign Strategic Objectives</legend>
            <div class="col-md-12">
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label">DEPARTMENT: <span class="req">*</span></label>
                        <select class="form-control clearField" id="department" required="">
                        </select>
                    </div>
                </div>
                <div class="col-md-8">
                    <h5 id="tablemessage" style="display:none"></h5>
                    <div class="table-responsive" id="tblstrategicobjectivescontainer" style="display: none;">
                        <table id="tblstrategicobjectives" class="display responsive compact" cellspacing="0" width="100%" >
                            <thead>
                            <tr>
                                <th>STRATEGIC OBJECTIVE</th>
                                <th align="center">ASSIGN</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-12" align="right">
                    <br>
                    <div class="form-group" align="right">
                        <a class="btn btn-default" href="<?php echo base_url();?>homepage">CANCEL</a>
                        <button class="btn btn-success" id="btnSubmit">SUBMIT</button>
                    </div>
                    <br>
                    <br>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade " id="modalsuccess" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <b>Server Message</b>
            </div>
            <div class="modal-body" >
                <label id="successmsg"></label>
            </div>
            <div class="modal-footer" align="center">
                <a href="<?php echo base_url();?>strategicfunctions/assignobjectives" class="btn btn-danger">OK</a>
            </div>
        </div>
    </div>
</div>
<script type="application/javascript">
    $(document).ready(function(){
        $("#nav_pms_strategic").removeClass().addClass("active");

        $("#ul_pmsmenu").show();
        $("#ul_mainmenu").hide();


        $("#panel_assignso").addClass("selected_panel");

        window.isUpdate = false;
        loadData();
        loadDepartments();
    });

    function loadData(){
        if(window.isUpdate == false){
            $('#loadingmodal').modal('show');
        }
        $("#tblstrategicobjectives").dataTable({
            "destroy":true,
            "responsive" : true,
            "sDOM": 'frt',
            "oLanguage": {
                "sSearch": "Search:"
            },
            "ajax":{
                "url":"<?php  echo base_url(); ?>assignsomanagement/strategicobjectives",
                "data" : {},
                "type" : "POST",
                "dataType" : "json",
                "async": false,
                dataSrc: function(json){
                    $('#loadingmodal').modal('hide');
                    if(json.Code=="00"){
                        $('#tblstrategicobjectivescontainer').show();
                        $("#tablemessage").hide();
                        return json.details;
                    }else{
                        $("#tblstrategicobjectivescontainer").hide();
                        $("#tablemessage").html("<h3>No Strategic Objective(s) Found</h3>");
                        $("#tablemessage").show();
                        return "";
                    }
                }
            },
            "columns":[
                {"data":"strategicobjective"},
                {"data":function(data){
                    return "<input type='checkbox' style='width: auto;text-align: center' class='s_o' id='"+data.id+"'>";
                }
                }]
        });
    }

    function loadDepartments(){
        $.ajax({
            url: "<?php echo base_url();?>assignsomanagement/departments",
            type: "GET",
            dataType: "json",
            success: function(result){
                var dept = $("#department");
                dept.empty();
                dept.append('<option selected disabled>- Select Department -</option>');
                if(result.Code == "00"){
                    for(var keys in result.details){
                        dept.append('<option value="'+result.details[keys].department+'">'+result.details[keys].department+'</option>');
                    }
                } else {
                    dept.append('<option selected disabled>- No Department Available -</option>');
                    messageDialogModal("Server Message",result.Message);
                }
            },
            error: function(e){
                console.log(e);
            }
        });
    }


    function uncheckAll(){
        var mod = $('#tblstrategicobjectives').dataTable();
        $("input[class='s_o']", mod.fnGetNodes()).each(function(){
            $(this).prop("checked",false);
        });
    }

    $("#department").change(function(){
        uncheckAll();
        loadConfiguration($(this).val());
    });


    function loadConfiguration(department){
        $('#loadingmodal').modal('show');
        var table = $("#tblstrategicobjectives").dataTable();
        $.ajax({
            url : "<?php  echo base_url(); ?>assignsomanagement/getconfig",
            type : "POST",
            data : {
                "DEPARTMENT" : department
            },
            dataType : "json",
            async: false,
            success : function(res){
                $('#loadingmodal').modal('hide');
                console.log("config");
                console.log(res.details);
                for(var keys in res.details){
                    $(".s_o", table.fnGetNodes()).each(function(){
                        var id = $(this).attr("id");
                        var s = res.details[keys].soid;
                        if(id==s){
                            $(this).prop("checked",true);
                        }
                    });
                }
            },
            error: function(e){
                $('#loadingmodal').modal('hide');
                console.log(e);
            }
        });
    }

    $("#btnSubmit").click(function(){
        var s_o = [];
        var table = $('#tblstrategicobjectives').dataTable();
        var a = table.fnGetNodes();
        $("input.s_o:checked",a).each(function(){
            var id = $(this).attr("id");
            s_o.push(id);
        });
        if($("#department option:selected").val() == '- Select Department -'){
            messageDialogModal("Server Message","No Department Selected");
        } else if(s_o.length<=0) {
            messageDialogModal("Server Message","No Strategic Objective Selected");
        } else {
            $('#loadingmodal').modal('show');
            $.ajax({
                url: "<?php echo base_url();?>assignsomanagement/assign",
                type: "POST",
                dataType: "json",
                data: {
                    "DEPARTMENT":$("#department option:selected").val(),
                    "OBJECTIVES":s_o
                },
                success: function(data){
                    $('#loadingmodal').modal('hide');
                    console.log(data);
                    if(data.Code == "00"){
                        $("#successmsg").text(data.Message);
                        $("#modalsuccess").modal("show");
                    } else {
                        messageDialogModal("Server Message",data.Message);
                    }
                    window.isUpdate = true;
                    loadData();
                    clearField();
                },
                error: function(e){
                    console.log(e);
                    $('#loadingmodal').modal('hide');
                }
            });
        }
    });
</script>
<style>
    .s_o{
        /* Double-sized Checkboxes */
        -ms-transform: scale(1.3); /* IE */
        -moz-transform: scale(1.3); /* FF */
        -webkit-transform: scale(1.3); /* Safari and Chrome */
        -o-transform: scale(1.3); /* Opera */
        padding: 10px;
    }
</style>