<style>
    .panel{
        height: 90px;
        padding: 8px;
        width: 135px;
        border: 1px solid #d8d8d8;
    }
    .addEmployees{
        font-size: 11px !important;
        text-align: center;
        line-height: 1.0;
        display: inline-block;
    }

    .divEmployees{
        padding-top: 10px !important;
    }
</style>
<div class="well">
    <table>
        <tr>
            <td rowspan="2">
                <div style="height: 70px;width:70px;background-color: #FFCA28;text-align: center;border-radius: 5px;">
                    <br>
                    <img src="<?php echo base_url();?>assets/img/icons/awards.png" height="50px">
                </div>
            </td>
            <td rowspan="2" width="15px">
                &nbsp;
            </td>
            <td colspan="4">
                <h4>Welcome! <span style="font-weight: 700;margin-top: 5px;"><?php echo $this->session->userdata('firstname');?></span> to <br>Rewards and Recognition Menu</h4>
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
                <div class="panel" align="center" id="panel_loyalty">
                    <a href="<?php echo base_url();?>main/loyaltyaward" style="height: 60px;width:60px;text-align: center;border-radius: 5px;">
                        <img src="<?php echo base_url();?>assets/img/icons/loyalty.png" height="40px">
                        <br>
                        Loyalty Award
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
            <legend style="margin-bottom: 5px">Loyalty Awards</legend>
            <p>List of Loyalty Awardees for their 35 or more years of service</p>
            <div class="col-md-12">
                <div class="row">
                    <div class="row">

                        <br>
                        <div class="col-md-12">
                            <div class="table-responsive" id="tblloyaltyawardcontainer">
                                <table id="tblloyaltyaward" class="display responsive compact" cellspacing="0" width="100%" >
                                    <thead>
                                    <tr align="center">
                                        <th>EMPLOYEE NAME</th>
                                        <th>POSITION</th>
                                        <th>DEPARTMENT</th>
                                        <th>DATE ENTERED LGU</th>
                                        <th>YEARS OF SERVICE</th>
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
        </div>
    </div>
</div>


<script type="application/javascript">
$(document).ready(function(){
    $("#nav_rr_loyalty").removeClass().addClass("active");

    $("#ul_rrmenu").show();
    $("#ul_mainmenu").hide();


    $("#panel_loyalty").addClass("selected_panel");
    loadData();
});


function loadData(){
    $('#loadingmodal').modal('show');
    $("#tblloyaltyaward").dataTable({
        "destroy":true,
        "responsive" : true,
        "oLanguage": {
            "sSearch": "Search:",
            "sEmptyTable": "No Loyalty Awardees Available"
        },
        "ajax":{
            "url":"<?php echo base_url(); ?>rewardsmanagement/loyaltyaward",
            "type": "POST",
            "dataType": "json",
            dataSrc: function(json){
                if(json.Code=="00"){
                    $('#loadingmodal').modal('hide');
                    return json.details;
                }else{
                    $('#loadingmodal').modal('hide');
                    return 0;
                }
            }
        },
        "columns":[
            {"data":function(data){
                return data.firstname +" "+data.middlename+" "+data.lastname + " "+data.nameextension;
            }},
            {"data":"currentposition"},
            {"data":"department"},
            {"data":function(data){
                return moment(data.dateenteredlgu).format("MMMM DD, YYYY");
            }},
            {"data":function(data){
                return parseInt(data.yearsofservice);
            }}
        ],
        "sDom": 'Blfrtip',
        "buttons": [
            {
                extend: 'print',
                autoPrint: true,
                message: "Date: "+moment().format("MMM DD YYYY hh:mm:ss A"),
                customize: function ( win ) {
                    $(win.document.body)
                        .css( 'font-size', '10pt' );
                    $(win.document.body).find( 'table' )
                        .addClass( 'compact' )
                        .css( 'font-size', 'inherit' );
                    $(win.document.body).find( 'h1' )
                        .text( 'List of Loyalty Awardees for their 35 years of service' )
                        .css( 'font-size', '15pt' );
                }
            },
            {
                extend: 'excelHtml5',
                title: "ListOfLoyaltyAwardees"+moment().format("YYYY-MM-DD")
            },
            {
                extend: 'pdfHtml5',
                title: "ListOfLoyaltyAwardees"+moment().format("YYYY-MM-DD"),
                message: 'List of Loyalty Awardees for their 35 years of service',
                orientation: 'landscape',
                pageSize: 'LEGAL'
            }
        ]
    });
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