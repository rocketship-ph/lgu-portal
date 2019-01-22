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
                    <img src="<?php echo base_url();?>assets/img/icons/request_personnel.png" height="50px">
                </div>
            </td>
            <td rowspan="2" width="15px">
                &nbsp;
            </td>
            <td colspan="4">
                <h4>Welcome! <span style="font-weight: 700;margin-top: 5px;"><?php echo $this->session->userdata('firstname');?></span> to <br>PMT Selection Menu</h4>
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
                <div class="panel" align="center" id="panel_pmtlead">
                    <a href="<?php echo base_url();?>pmtselection/pmtlead" style="height: 60px;width:60px;text-align: center;border-radius: 5px;">
                        <img src="<?php echo base_url();?>assets/img/icons/pmt_lead.png" height="40px">
                        <br>
                        Assign PMT Lead
                    </a>
                </div>
            </td>
            <td align="center" width="20px">
                &nbsp;&nbsp;
            </td>
            <td>
                <div class="panel" align="center" id="panel_pmtevaluators">
                    <a href="<?php echo base_url();?>pmtselection/pmtevaluators" style="height: 60px;width:60px;text-align: center;border-radius: 5px;">
                        <img src="<?php echo base_url();?>assets/img/icons/pmt_evaluator.png" height="40px">
                        <br>
                        Assign PMT Evaluators
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
            <div class="form-horizontal">
                <fieldset>
                    <legend>Assign PMT Lead</legend>
                    <div class="form-group col-lg-10">
                        <label for="departmentTitle" class="col-lg-2 control-label">PMT Lead Name</label>
                        <div class="col-lg-10">
                            <select class="form-control clearField" id="dropdownPL">
                                <option selected disabled>- Select PMT Lead -</option>
                            </select>
                            <input style="display: none" type="text" id="editPL" class="form-control clearField" placeholder="Enter Strategic Objective" required="">
                        </div>
                    </div>
                    <div class="form-group col-lg-10">
                        <label class="col-lg-2 control-label">Personal information:</label>
                        <div class="col-lg-10">
                            <label>Position</label><br>
                            <label style="font-size: 18px" id="position">--</label><br>
                            <label>Department</label><br>
                            <label style="font-size: 18px" id="department">--</label><br>
                            <label>User level</label><br>
                            <label style="font-size: 18px" id="userlevel">--</label><br>
                        </div>
                    </div>
                    <div class="form-group col-lg-2">
                        <button class="btn btn-default btn-block addBtnClass" id="btnAdd" data-toggle="modal" data-target="#addSOModal">ADD</button>
                        <button class="btn btn-danger btn-block editBtnClass" id="btnEdit">EDIT</button>
                        <button class="btn btn-primary btn-block deleteBtnClass" id="btnDelete">DELETE</button>
                        <button class="btn btn-success btn-block saveBtnClass" id="btnSave">SAVE</button>
                    </div>
                </fieldset>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="deletePMTModal" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" data-backdrop="static">
    <div  class="modal-dialog modal-sm">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-body">
                <legend>Confirmation</legend>
                <div>
                    <div class="form-group">
                        <label class="control-label">Are you sure you want to delete this user as PMT Lead?</label>
                    </div>
                    <div style="text-align: right">
                        <br>
                        <button type="button" class="btn btn-primary" id="btnDeletePMT">DELETE</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">CANCEL</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<script type="application/javascript">

    var hasPMTLead = false;
    $(document).ready(function(){
        $("#nav_pms_pmtselection").removeClass().addClass("active");

        $("#ul_pmsmenu").show();
        $("#ul_mainmenu").hide();


        $("#panel_pmtlead").addClass("selected_panel");
        window.isUpdate = false;
        loadUsers();
    });
    function loadUsers(){
        var select = $("#dropdownPL");
        select.empty();
        select.append("<option selected disabled>- Select PMT Lead -</option>");
        if(window.isUpdate == false){
            $("#loadingmodal").modal("show");
        }
        $.ajax({
            url: "<?php echo base_url();?>pmtselectionmanagement/displayUsers",
            type: "POST",
            dataType: "json",
            success: function(result){
                $("#loadingmodal").modal("hide");
                console.log(result);
                if(result.Code == "00"){
                    for(var keys in result.details){
                        var role = isNullorEmpty(result.details[keys].role);
                        var rolestatus = isNullorEmpty(result.details[keys].rolestatus);
                        var option = "";
                        if (role=='PMT_HEAD' && rolestatus==0){
                            hasPMTLead = true;
                            option = '<option selected userid="'+result.details[keys].id+'" userlevel="'+result.details[keys].userlevel+'" value="'+result.details[keys].username+'" position="'+result.details[keys].currentposition+'" department="'+result.details[keys].department+'">'+result.details[keys].name+'</option>';
                        } else {

                             option = '<option userid="'+result.details[keys].id+'" userlevel="'+result.details[keys].userlevel+'" value="'+result.details[keys].username+'" position="'+result.details[keys].currentposition+'" department="'+result.details[keys].department+'">'+result.details[keys].name+'</option>';
                        }
                        
                        select.append(option);
                    }
                    if(hasPMTLead){
                        var position = $("#dropdownPL option:selected").attr("position");
                        var userlevel = $("#dropdownPL option:selected").attr("userlevel");
                        var department = $("#dropdownPL option:selected").attr("department");
                        $('#position').text(isNullorEmpty(position));
                        $('#department').text(isNullorEmpty(department));
                        $('#userlevel').text(isNullorEmpty(userlevel));
                        $("#dropdownPL").prop("disabled",true);
                        $(".addBtnClass").prop("disabled",true);
                        $(".editBtnClass").prop("disabled",false);
                        $(".saveBtnClass").prop("disabled",true);
                        $(".deleteBtnClass").prop("disabled",false);
                    } else {
                        $(".addBtnClass").prop("disabled",false);
                        $(".editBtnClass").prop("disabled",true);
                        $(".saveBtnClass").prop("disabled",true);
                        $(".deleteBtnClass").prop("disabled",true);
                    }
                }
            },
            error: function(e){
                console.log(e);
            }
        });
    }

    $('#dropdownPL').on('change', function(){
        var position = $("#dropdownPL option:selected").attr("position");
        var userlevel = $("#dropdownPL option:selected").attr("userlevel");
        var department = $("#dropdownPL option:selected").attr("department");
        $('#position').text(isNullorEmpty(position));
        $('#department').text(isNullorEmpty(department));
        $('#userlevel').text(isNullorEmpty(userlevel));
    });

     $("#btnAdd").click(function(){
       if(!validate()){
           return;
       } else {
           $("#loadingmodal").modal("show");
           $.ajax({
               url: "<?php echo base_url();?>pmtselectionmanagement/newpmtlead",
               type:"POST",
               dataType:"json",
               data: {
                   "EVALUATORNAME": $("#dropdownPL option:selected").text(),
                   "USERNAME": $("#dropdownPL").val(),
                   "USERLEVEL": $('#userlevel').text(),
                   "POSITION": $('#position').text(),
                   "DEPARTMENT": $("#department").text()
               },
               success: function(result){
                   $("#loadingmodal").modal("hide");
                   if(result.Code == "00"){
                       clearField();
                       $("#editPL").hide();
                       $("#dropdownPL").show();
                       window.isUpdate = true;
                       loadUsers();
                       $("#editDescription").prop("disabled",true);
                       messageDialogModal("Server Message",result.Message);
                   } else {
                       messageDialogModal("Server Message",result.Message);
                   }
               },
               error: function(e){
                   console.log(e);
               }
           });
       }
    });

     $("#btnSave").click(function(){
       if(!validate()){
           return;
       } else {
           $("#loadingmodal").modal("show");
           $.ajax({
               url: "<?php echo base_url();?>pmtselectionmanagement/updatepmtlead",
               type:"POST",
               dataType:"json",
               data: {
                   "EVALUATORNAME": $("#dropdownPL option:selected").text(),
                   "USERNAME": $("#dropdownPL").val(),
                   "USERLEVEL": $('#userlevel').text(),
                   "POSITION": $('#position').text(),
                   "DEPARTMENT": $("#department").text()
               },
               success: function(result){
                   $("#loadingmodal").modal("hide");
                   if(result.Code == "00"){
                       clearField();
                       $("#editPL").hide();
                       $("#dropdownPL").show();
                       window.isUpdate = true;
                       loadUsers();
                       $("#editDescription").prop("disabled",true);
                       messageDialogModal("Server Message",result.Message);
                   } else {
                       messageDialogModal("Server Message",result.Message);
                   }
               },
               error: function(e){
                   console.log(e);
               }
           });
       }
    });

     $("#btnEdit").click(function(){
         $("#dropdownPL").prop("disabled",false);
         $("#btnSave").prop("disabled",false);
         $("#btnDelete").prop("disabled",true);
     });

    $("#btnDelete").click(function(){
        $("#deletePMTModal").modal("show");
     });

    $("#btnDeletePMT").click(function(){
        $("#deletePMTModal").modal("hide");
        $("#loadingmodal").modal("show");
        $.ajax({
            url: "<?php echo base_url();?>pmtselectionmanagement/deletepmtlead",
            type:"POST",
            dataType:"json",
            data: {
                "ROWID":$("#dropdownPL option:selected").attr("userid")
            },
            success: function(result){
                $("#loadingmodal").modal("hide");
                if(result.Code == "00"){
                    clearField();
                    window.isUpdate = true;
                    loadUsers();
                    messageDialogModal("Server Message",result.Message);
                } else {
                    messageDialogModal("Server Message",result.Message);
                }
            },
            error: function(e){
                console.log(e);
            }
        });
     });

      function validate(){
        if($("#dropdownPL").val() == "" || $("#dropdownPL").val() == null){
            messageDialogModal("Required","Please Select PMT Lead Name");
            return false;
        }
        return true;
    }


    function isNullorEmpty(string){
        if (string == null || string == undefined || string == "" || string == "null")
            return "--";
        return string;
    }
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