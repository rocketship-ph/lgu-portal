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
                <div style="height: 70px;width:70px;background-color: #F44336;text-align: center;border-radius: 5px;">
                    <br>
                    <img src="<?php echo base_url();?>assets/img/icons/learningdevelopment.png" height="50px">
                </div>
            </td>
            <td rowspan="2" width="15px">
                &nbsp;
            </td>
            <td colspan="4">
                <h4>Welcome! <span style="font-weight: 700;margin-top: 5px;"><?php echo $this->session->userdata('firstname');?></span> to <br>Learning and Development Menu</h4>
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
                <div class="panel" align="center" id="panel_events">
                    <a href="<?php echo base_url();?>main/events" style="height: 60px;width:60px;text-align: center;border-radius: 5px;">
                        <img src="<?php echo base_url();?>assets/img/icons/event.png" height="40px">
                        <br>
                        Manage Events
                    </a>
                </div>
            </td>
            <td align="center" width="20px">
                &nbsp;&nbsp;
            </td>
            <td>
                <div class="panel" align="center" id="panel_calendar">
                    <a href="<?php echo base_url();?>main/calendar" style="height: 60px;width:60px;text-align: center;border-radius: 5px;">
                        <img src="<?php echo base_url();?>assets/img/icons/calendar.png" height="40px">
                        <br>
                        Events Calendar
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
            <legend style="margin-bottom: 5px">Learning & Development Events</legend>
            <p>Add, Edit, Remove and View List of Created Events (Seminar/Training)</p>
            <div class="col-md-12">
                <div class="row">
                    <div class="row">
                        <br>
                        <div class="col-md-12" align="right" style="padding-bottom: 5px">
                            <a class="btn btn-outline-success" data-toggle="modal" data-target="#modalNewEvent">+ Add New Event</a>
                        </div>
                        <div class="col-md-12">
                            <div class="table-responsive" id="tbleventscontainer">
                                <table id="tblevents" class="display responsive compact" cellspacing="0" width="100%" >
                                    <thead align="center" style="text-align: center">
                                    <tr align="center" style="text-align: center">
                                        <th rowspan="2">EVENT NAME</th>
                                        <th rowspan="2">DESCRIPTION</th>
                                        <th rowspan="2">SPEAKER</th>
                                        <th colspan="2" align="center" style="text-align: center">DATE</th>
                                        <th rowspan="2">TIME</th>
                                        <th rowspan="2">VENUE</th>
                                        <th rowspan="2">ADDRESS</th>
                                        <th rowspan="2">ACTION</th>
                                    </tr>
                                    <tr align="center" style="text-align: center">
                                        <th align="center" style="text-align: center">FROM</th>
                                        <th align="center" style="text-align: center">TO</th>
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
<div id="modalNewEvent" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h5 class="modal-title" style="font-weight: bold">Add New Event</h5>
            </div>
            <div class="modal-body" style="height:auto;max-height: 480px;overflow-y: auto">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="eventname" class="control-label">Event Name</label>
                            <input type="text" id="eventname" class="form-control" placeholder="Event Name..">
                        </div>
                        <div class="form-group">
                            <label for="description" class="control-label">Description</label>
                                <textarea class="form-control clearField" id="description" placeholder="Event Description.." rows="2" style="resize: none"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="speaker" class="control-label">Speaker</label>
                                <input class="form-control clearField" id="speaker" placeholder="Speaker.." type="text">
                        </div>
                        <div class="form-group">
                            <label for="venue" class="control-label">Venue</label>
                                <input class="form-control clearField" id="venue" placeholder="Venue.." type="text">
                        </div>
                        <div class="form-group">
                            <label for="address" class="control-label">Address</label>
                                <input class="form-control clearField" id="address" placeholder="Address.." type="text">
                        </div>
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="start" class="control-label">Start Date</label>
                                            <input class="form-control clearField datefrom" id="start" placeholder="Pick Start Date.." type="text" readonly>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="end" class="control-label">End Date</label>
                                            <input class="form-control clearField dateto" id="end" placeholder="Pick End Date.." type="text" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="time" class="control-label">Time</label>
                                        <input class="form-control clearField timepick" id="time" placeholder="Pick Time.." type="text" readonly>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" id="btnAdd">SUBMIT</button>
                <button type="button" class="btn btn-default" data-dismiss="modal" id="close">CANCEL</button>
            </div>
        </div>

    </div>
</div>

<div id="modalUpdateEvent" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h5 class="modal-title" style="font-weight: bold">Update Event Details</h5>
            </div>
            <div class="modal-body" style="height:auto;max-height: 480px;overflow-y: auto">
                <div class="row">
                    <input type="hidden" id="editeventid">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="eventname" class="control-label">Event Name</label>
                            <input type="text" id="eventnameedit" class="form-control" placeholder="Event Name..">
                        </div>
                        <div class="form-group">
                            <label for="description" class="control-label">Description</label>
                            <textarea class="form-control clearField" id="descriptionedit" placeholder="Event Description.." rows="2" style="resize: none"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="speaker" class="control-label">Speaker</label>
                            <input class="form-control clearField" id="speakeredit" placeholder="Speaker.." type="text">
                        </div>
                        <div class="form-group">
                            <label for="venue" class="control-label">Venue</label>
                            <input class="form-control clearField" id="venueedit" placeholder="Venue.." type="text">
                        </div>
                        <div class="form-group">
                            <label for="address" class="control-label">Address</label>
                            <input class="form-control clearField" id="addressedit" placeholder="Address.." type="text">
                        </div>
                        <div class="row">
                            <div class="col-md-7">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="start" class="control-label">Start Date</label>
                                        <input class="form-control clearField datefrom" id="startedit" placeholder="Pick Start Date.." type="text" readonly>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="end" class="control-label">End Date</label>
                                        <input class="form-control clearField dateto" id="endedit" placeholder="Pick End Date.." type="text" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="time" class="control-label">Time</label>
                                    <input class="form-control clearField timepick" id="timeedit" placeholder="Pick Time.." type="text" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" id="btnEdit">SUBMIT</button>
                <button type="button" class="btn btn-default" data-dismiss="modal" id="close">CANCEL</button>
            </div>
        </div>

    </div>
</div>

<div id="modalDeleteEvent" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-sm">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h5 class="modal-title" style="font-weight: bold">Delete Event</h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <input type="hidden" id="deleteeventid">
                        <p>Are you sure you want to delete this event?<br><span style="font-weight: bold" id="deleteeventname"></span></p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="btnDelete">YES</button>
                <button type="button" class="btn btn-default" data-dismiss="modal" id="close">NO</button>
            </div>
        </div>

    </div>
</div>


<script type="application/javascript">
    $(document).ready(function(){
        $("#nav_ld_events").removeClass().addClass("active");

        $("#ul_ldmenu").show();
        $("#ul_mainmenu").hide();


        $("#panel_events").addClass("selected_panel");
        window.isUpdate = false;
        loadEvents();

        $(".datefrom").datepicker({
            todayBtn:  1,
            autoclose: true,
            todayHighlight: true,
            format: "mm-dd-yyyy"
        }).on('changeDate', function (selected) {
            var minDate = new Date(selected.date.valueOf());
            $('.dateto').datepicker('setStartDate', minDate);
        });

        $(".dateto").datepicker({
            autoclose: true,
            format: "mm-dd-yyyy"
        }).on('changeDate', function (selected) {
            var maxDate = new Date(selected.date.valueOf());
            $('.datefrom').datepicker('setEndDate', maxDate);
        });
    });


    function loadEvents(){
        if(window.isUpdate == false){
            $('#loadingmodal').modal('show');
        }
        $("#tblevents").dataTable({
            "destroy":true,
            "responsive" : true,
            "oLanguage": {
                "sSearch": "Search:",
                "sEmptyTable": "No Events Available"
            },
            "ajax":{
                "url":"<?php echo base_url(); ?>eventmanagement/eventscollection",
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
                {"data":"name"},
                {"data":function(data){
                    return atob(data.description);
                }},
                {"data":function(data){
                    return data.speaker=="" ? "-" : data.speaker;
                }},
                {"data":function(data){
                    return moment(data.datefrom).format("MMM DD, YYYY");
                }},
                {"data":function(data){
                    return moment(data.dateto).format("MMM DD, YYYY");
                }},
                {"data":"time"},
                {"data":"venue"},
                {"data":"address"},
                {"data":function(data){
                    return "<a class='btn btn-success btn-sm' title='Edit Event' href='javascript:actionEdit("+JSON.stringify(data)+");' trid="+JSON.stringify(data)+"><i class='fa fa-pencil'></i></a> <a class='btn btn-primary btn-sm' title='Delete Event' href='javascript:actionDelete("+JSON.stringify(data)+");' trid="+JSON.stringify(data)+"><i class='fa fa-trash'></i></a>";
                }}
            ],
            "sDom": 'lfrtip'
        });
    }

    $("#btnAdd").click(function(){
       if(!validate()){
           return;
       }  else {
           $("#loadingmodal").modal("show");
           $.ajax({
               url: "<?php echo base_url();?>eventmanagement/add",
               type: "POST",
               dataType: "json",
               data: {
                   "NAME":$("#eventname").val(),
                   "DESCRIPTION":$("#description").val(),
                   "SPEAKER":$("#speaker").val(),
                   "VENUE":$("#venue").val(),
                   "ADDRESS":$("#address").val(),
                   "START":$("#start").val(),
                   "END":$("#end").val(),
                   "TIME":$("#time").val()
               },
               success: function(result){
                   $("#loadingmodal").modal("hide");
                   $("#modalNewEvent").modal("hide");
                   if(result.Code == "00"){
                       messageDialogModal("Server Message", result.Message);
                       clearField();
                       window.isUpdate = true;
                       loadEvents();
                   } else {
                       messageDialogModal("Server Message", result.Message);
                   }
               },
               error: function(e){
                   $("#loadingmodal").modal("hide");
                   console.log(e);
               }
           });
       }
    });

    function validate(){
        if($("#eventname").val()== "" || $("#eventname").val() == null){messageDialogModal("Required Field","Please Provide Event Name");return false;}
        if($("#description").val()== "" || $("#description").val() == null){messageDialogModal("Required Field","Please Provide Event Description");return false;}
        if($("#venue").val()== "" || $("#venue").val() == null){messageDialogModal("Required Field","Please Provide Venue");return false;}
        if($("#address").val()== "" || $("#address").val() == null){messageDialogModal("Required Field","Please Provide Venue Address");return false;}
        if($("#start").val()== "" || $("#start").val() == null){messageDialogModal("Required Field","Please Pick Event Start Date");return false;}
        if($("#end").val()== "" || $("#end").val() == null){messageDialogModal("Required Field","Please Pick Event End Date");return false;}
        if($("#time").val()== "" || $("#time").val() == null){messageDialogModal("Required Field","Please Pick Event Time");return false;}
        return true;
    }

    function actionDelete(data){
        $("#deleteeventid").val(data.id);
        $("#deleteeventname").text(data.name);
        $("#modalDeleteEvent").modal("show");
    }

    $("#btnDelete").click(function(){
        $("#loadingmodal").modal("show");
        $("#modalDeleteEvent").modal("hide");
        $.ajax({
            url: "<?php echo base_url();?>eventmanagement/delete",
            type: "POST",
            dataType: "json",
            data: {
                "ID":$("#deleteeventid").val()
            },
            success: function(result){
                $("#loadingmodal").modal("hide");
                if(result.Code == "00"){
                    messageDialogModal("Server Message", result.Message);
                    window.isUpdate = true;
                    loadEvents();
                } else {
                    messageDialogModal("Server Message", result.Message);
                }
            },
            error: function(e){
                $("#loadingmodal").modal("hide");
                console.log(e);
            }
        });
    });

    function actionEdit(data){
        $("#editeventid").val(data.id);
        $("#eventnameedit").val(data.name);
        $("#speakeredit").val(data.speaker);
        $("#venueedit").val(data.venue);
        $("#addressedit").val(data.address);
        $("#startedit").val(data.datefrom);
        $("#endedit").val(data.dateto);
        $("#timeedit").val(data.time);
        $("#descriptionedit").val(atob(data.description));
        $("#modalUpdateEvent").modal("show");
    }

    $("#btnEdit").click(function(){
        if(!validateEdit()){
            return;
        }  else {
            $("#loadingmodal").modal("show");
            $.ajax({
                url: "<?php echo base_url();?>eventmanagement/edit",
                type: "POST",
                dataType: "json",
                data: {
                    "ID":$("#editeventid").val(),
                    "NAME":$("#eventnameedit").val(),
                    "DESCRIPTION":$("#descriptionedit").val(),
                    "SPEAKER":$("#speakeredit").val(),
                    "VENUE":$("#venueedit").val(),
                    "ADDRESS":$("#addressedit").val(),
                    "START":$("#startedit").val(),
                    "END":$("#endedit").val(),
                    "TIME":$("#timeedit").val()
                },
                success: function(result){
                    $("#loadingmodal").modal("hide");
                    $("#modalUpdateEvent").modal("hide");
                    if(result.Code == "00"){
                        messageDialogModal("Server Message", result.Message);
                        clearField();
                        window.isUpdate = true;
                        loadEvents();
                    } else {
                        messageDialogModal("Server Message", result.Message);
                    }
                },
                error: function(e){
                    $("#loadingmodal").modal("hide");
                    console.log(e);
                }
            });
        }
    });

    function validateEdit(){
        if($("#eventnameedit").val()== "" || $("#eventnameedit").val() == null){messageDialogModal("Required Field","Please Provide Event Name");return false;}
        if($("#descriptionedit").val()== "" || $("#descriptionedit").val() == null){messageDialogModal("Required Field","Please Provide Event Description");return false;}
        if($("#venueedit").val()== "" || $("#venueedit").val() == null){messageDialogModal("Required Field","Please Provide Venue");return false;}
        if($("#addressedit").val()== "" || $("#addressedit").val() == null){messageDialogModal("Required Field","Please Provide Venue Address");return false;}
        if($("#startedit").val()== "" || $("#startedit").val() == null){messageDialogModal("Required Field","Please Pick Event Start Date");return false;}
        if($("#endedit").val()== "" || $("#endedit").val() == null){messageDialogModal("Required Field","Please Pick Event End Date");return false;}
        if($("#timeedit").val()== "" || $("#timeedit").val() == null){messageDialogModal("Required Field","Please Pick Event Time");return false;}
        return true;
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