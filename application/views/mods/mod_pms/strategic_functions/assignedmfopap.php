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
                <h4>Welcome! <span style="font-weight: 700;margin-top: 5px;"><?php echo $this->session->userdata('firstname');?></span> to <br>Performance Management Menu</h4>
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
                        <img src="<?php echo base_url();?>assets/img/icons/approve.png" height="40px">
                        <br>
                        Approve MFO/PAP
                    </a>
                </div>
            </td>
            <td align="center" width="20px">
                &nbsp;&nbsp;
            </td>
            <td>
                <div class="panel" align="center" id="panel_assigedmfopap">
                    <a  href="<?php echo base_url();?>strategicfunctions/approvemfopap" style="height: 60px;width:60px;text-align: center;border-radius: 5px;">
                        <img src="<?php echo base_url();?>assets/img/icons/approve.png" height="40px">
                        <br>
                        Assigned MFO/PAP
                    </a>
                </div>
            </td>
            <td align="center" width="20px">
                &nbsp;&nbsp;
            </td>
            <td>
                <div class="panel" align="center" id="panel_createmfopap">
                    <a  href="<?php echo base_url();?>strategicfunctions/mfopap" style="height: 60px;width:60px;text-align: center;border-radius: 5px;">
                        <img src="<?php echo base_url();?>assets/img/icons/create_mfo.png" height="40px">
                        <br>
                        Create MFO/PAP
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
            <legend style="margin-bottom: 5px">Assigned MFO/PAP</legend>
            <p style="font-size: 11px">All MFO/PAP assigned to employee by the department heads will be displayed for the employee to fill in their actual accomplishment as well as rate their performance accordingly before it appears on the IPCR which must be submitted to their respective department heads</p>
            <br>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive" id="tblmfopapcontainer">
                            <table id="tblmfopap" class="display responsive compact" cellspacing="0" width="100%" >
                                <thead>
                                <tr>
                                    <th rowspan="2">STRATEGIC OBJECTIVE</th>
                                    <th rowspan="2">CATEGORY</th>
                                    <th rowspan="2">MFO/PAP</th>
                                    <th rowspan="2">SUCCESS INDICATORS</th>
                                    <th rowspan="2">ALLOTTED BUDGET</th>
                                    <th rowspan="2">ACTUAL ACCOMPLISHMENTS</th>
                                    <th colspan="5">RATING</th>
                                </tr>
                                <tr>
                                    <th>Q</th>
                                    <th>E</th>
                                    <th>T</th>
                                    <th>A</th>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12" align="right">
            <hr>
            <button class="btn btn-success" id="btnSubmit">SUBMIT</button>
            <a class="btn btn-default" href="<?php echo base_url();?>strategicfunctions/assignedmfopap">CANCEL</a>
        </div>
    </div>
</div>




<script type="application/javascript">
$(document).ready(function(){
    $("#nav_pms_strategic").removeClass().addClass("active");

    $("#ul_pmsmenu").show();
    $("#ul_mainmenu").hide();


    $("#panel_assigedmfopap").addClass("selected_panel");

    $('#edit_budget').priceFormat({
        clearPrefix: true
    });
    $('#add_budget').priceFormat({
        clearPrefix: true
    });
    window.isUpdate = false;
    loadData();
});

function loadData(){
    if(window.isUpdate == false){
        $('#loadingmodal').modal('show');
    }
    $("#tblmfopap").dataTable({
        "destroy":true,
        "responsive" : true,
        "sDOM": 'frt',
        "oLanguage": {
            "sSearch": "Search:",
            "sEmptyTable": "No MFO/PAP(s) Available"
        },
        "ajax":{
            "url":"<?php  echo base_url(); ?>assignedmfopapmanagement/assignedmfopap",
            "data" : {},
            "type" : "POST",
            "dataType" : "json",
            "async": false,
            dataSrc: function(json){
                $('#loadingmodal').modal('hide');
                console.log(json);
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
            {"data":"category"},
            {"data":function(data){
                return atob(data.mfopap);
            }},
            {"data":function(data){
                return atob(data.successindicator);
            }},
            {"data":function(data){
                var budget = '';
                if(data.allottedbudget == undefined || data.allottedbudget == null || data.allottedbudget == "") {
                    budget = '--';
                } else {
                    budget = "Php "+formatCurrency(data.allottedbudget);
                }
                return budget;
            }},
            {"data":function(data){

                if(data.actualaccomplishment==null || data.actualaccomplishment==undefined || data.actualaccomplishment==""){
                    return "<textarea class='form-control txtAccomplishments' data-mfopapid='"+data.mfopapid+"' id='aa"+data.id+"'></textarea>";
                }
                return "<textarea class='form-control txtAccomplishments' data-mfopapid='"+data.mfopapid+"' id='aa"+data.id+"'>"+atob(data.actualaccomplishment)+"</textarea>";

            }},
            {"data":function(data){
                if (data.rating==null || data.rating==undefined || data.rating==""){
                    return "<select id='q"+data.id+"' onchange=\"rate(this)\" class='qrating' data-mfopapid='"+data.mfopapid+"'><option value='1'>1</option><option value='2'>2</option><option value='3'>3</option><option value='4'>4</option><option value='5'>5</option></select>";
                } else {
                    var rating = atob(data.rating);
                    var obj = JSON.parse(rating);
                    return loadRatings(obj,data,"q");
                }

            }},
            {"data":function(data){
                if (data.rating==null || data.rating==undefined || data.rating==""){
                    return "<select id='e"+data.id+"' onchange=\"rate(this)\" class='erating' data-mfopapid='"+data.mfopapid+"'><option value='1'>1</option><option value='2'>2</option><option value='3'>3</option><option value='4'>4</option><option value='5'>5</option></select>";
                } else {
                    var rating = atob(data.rating);
                    var obj = JSON.parse(rating);
                    return loadRatings(obj,data,"e");
                }
            }},
            {"data":function(data){
                if (data.rating==null || data.rating==undefined || data.rating==""){
                    return "<select id='t"+data.id+"' onchange=\"rate(this)\" class='trating' data-mfopapid='"+data.mfopapid+"'><option value='1'>1</option><option value='2'>2</option><option value='3'>3</option><option value='4'>4</option><option value='5'>5</option></select>";
                } else {
                    var rating = atob(data.rating);
                    var obj = JSON.parse(rating);
                    return loadRatings(obj,data,"t");
                }
            }},
            {"data":function(data){
                if (data.rating==null || data.rating==undefined || data.rating==""){
                    return "<b id='ave"+data.id+"' class='ave' data-mfopapid='"+data.mfopapid+"'>1</b>"
                } else {
                    var rating = atob(data.rating);
                    var obj = JSON.parse(rating);
                    return "<b id='ave"+data.id+"' class='ave' data-mfopapid='"+data.mfopapid+"'>"+obj.A+"</b>"
                }

            }}
        ]
    });
}
var x="";
function rate(rating){
    x = rating.id.substring(1);
    var y = rating.id.substring(1);
    if (y==x){
        ave = (parseInt($("#q"+x).val()) + parseInt($("#e"+x).val()) + parseInt($("#t"+x).val()))/3;
        console.log(ave);
        $("#ave"+x).html(ave.toFixed(2));
        x = y;
    }
}

function loadRatings(obj,data,letter){
    var select = "";
    var o;
    switch(letter){
        case "q":
            o = obj.Q;
            break;
        case "e":
            o = obj.E;
            break;
        case "t":
            o = obj.T;
            break;
        case "a":
            o = obj.A;
            break;

    }
    switch (o){
        case "1":
            select = "<select id='"+letter+data.id+"' onchange=\"rate(this)\" class='"+letter+"rating' data-mfopapid='"+data.mfopapid+"'><option value='1' selected>1</option><option value='2'>2</option><option value='3'>3</option><option value='4'>4</option><option value='5'>5</option></select>";
            break;
        case "2":
            select = "<select id='"+letter+data.id+"' onchange=\"rate(this)\" class='"+letter+"rating' data-mfopapid='"+data.mfopapid+"'><option value='1'>1</option><option value='2' selected>2</option><option value='3'>3</option><option value='4'>4</option><option value='5'>5</option></select>";
            break;
        case "3":
            select = "<select id='"+letter+data.id+"' onchange=\"rate(this)\" class='"+letter+"rating' data-mfopapid='"+data.mfopapid+"'><option value='1' >1</option><option value='2'>2</option><option value='3' selected>3</option><option value='4'>4</option><option value='5'>5</option></select>";
            break;
        case "4":
            select = "<select id='"+letter+data.id+"' onchange=\"rate(this)\" class='"+letter+"rating' data-mfopapid='"+data.mfopapid+"'><option value='1' >1</option><option value='2'>2</option><option value='3'>3</option><option value='4' selected>4</option><option value='5'>5</option></select>";
            break;
        case "5":
            select = "<select id='"+letter+data.id+"' onchange=\"rate(this)\" class='"+letter+"rating' data-mfopapid='"+data.mfopapid+"'><option value='1' >1</option><option value='2'>2</option><option value='3'>3</option><option value='4'>4</option><option value='5' selected>5</option></select>";
            break;
    }
    return select;
}

$("#btnSubmit").on('click', function(){
    var table = $('#tblmfopap').dataTable();
    var data = table.fnGetData();
    var arr = [];

    for(var keys in data){
        var obj = new Object();
        var acc = "";
        $(".qrating").each(function(){
            if($(this).attr("data-mfopapid") == data[keys].mfopapid){
                obj["Q"] = $(this).val();
            }
        });
        $(".erating").each(function(){
            if($(this).attr("data-mfopapid") == data[keys].mfopapid){
                obj["E"] = $(this).val();
            }
        });
        $(".trating").each(function(){
            if($(this).attr("data-mfopapid") == data[keys].mfopapid){
                obj["T"] = $(this).val();
            }
        });
        $(".ave").each(function(){
            if($(this).attr("data-mfopapid") == data[keys].mfopapid){
                obj["A"] = $(this).text();
            }
        });

        $(".txtAccomplishments").each(function(){
            if($(this).attr("data-mfopapid") == data[keys].mfopapid){
                acc = $(this).val();
            }
        });

        arr.push({
            soid: data[keys].soid,
            mfopapid: data[keys].mfopapid,
            accomplishment: btoa(acc),
            rating: btoa(JSON.stringify(obj)),
            username: data[keys].username
        });
    }

    console.log(arr);
    $("#loadingmodal").modal("show");
    $.ajax({
        url: "<?php echo base_url();?>assignedmfopapmanagement/submit",
        type: "POST",
        dataType: "json",
        data: {
            "RATING":arr
        },
        success: function(data) {
            $('#loadingmodal').modal('hide');
            console.log(data);
            if (data.Code == "00") {
                messageDialogModal("Server Message", data.Message);
            } else {
                messageDialogModal("Server Message", data.Message);
            }
            window.isUpdate = true;
            loadData();
        },
        error: function(e){
            console.log(e);
            $('#loadingmodal').modal('hide');
        }
    });
});

function formatCurrency(amt){
    var a = formatter.format(amt);
    return a.replace("PHP","");
}

var formatter = new Intl.NumberFormat('en-US', {
    style: 'currency',
    currency: 'PHP',
    minimumFractionDigits: 2
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