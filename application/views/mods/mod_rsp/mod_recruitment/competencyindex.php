<fieldset>
    <legend>Competency Index</legend>
    <div class="col-md-12">
        <br>
        <h5 id="tablemessageindices" style="display:none"></h5>
        <div class="table-responsive" id="tblcompetencyindicescontainer">
            <table id="tblcompetencyindices" class="display responsive compact" cellspacing="0" width="100%" >
                <thead>
                <tr>
                    <th>DATE CREATED</th>
                    <th>COMPETENCY TITLE</th>
                    <th>COMPETENCY AREA</th>
                    <th>DESCRIPTION</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</fieldset>
<div id="modalDeleteCompetencyIndex" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-sm">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h5 class="modal-title">Competency Index - Delete Data</h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <input type="hidden" id="idcompetencyindexrowiddelete">
                        <p>Are you sure you want to delete this competency index?<br><span style="font-weight: bold" id="deletecompetencyindex"></span></p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="btnSubmitDeleteCompetencyIndex">YES</button>
                <button type="button" class="btn btn-default" data-dismiss="modal" id="close">NO</button>
            </div>
        </div>

    </div>
</div>

<div id="modalUpdateCompetencyIndex" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h5 class="modal-title">Competency Index - Update Data</h5>
            </div>
            <div class="modal-body" style="height:auto;max-height: 480px;overflow-y: auto">
                <div class="row">
                    <div class="col-md-12">
                        <input type="hidden" id="idcompetencyindexrowidupdate">
                        <div class="form-horizontal">
                            <fieldset>
                                <div class="form-group">
                                    <label for="competencyTitleEdit" class="col-lg-2 control-label">Competency Title</label>
                                    <div class="col-lg-10">
                                        <input type="text" id="competencyTitleEdit" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="competencyDescriptionEdit" class="col-lg-2 control-label">Description</label>
                                    <div class="col-lg-10">
                                        <textarea class="form-control clearField" id="competencyDescriptionEdit" placeholder="Description" rows="3" style="resize: none" readonly></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="competencyAreaEdit" class="col-lg-2 control-label">Competency Area</label>
                                    <div class="col-lg-10">
                                        <input class="form-control clearField" id="competencyAreaEdit" placeholder="Competency Area" type="text">
                                    </div>
                                </div>

                                <hr>
                                <div class="form-group">
                                    <label for="competencyLevels" class="col-lg-2 control-label">Levels</label>
                                    <div class="col-lg-10">
                                        <ul class="nav nav-pills">
                                            <li class="active"><a href="#lvlbasic1" data-toggle="tab">Basic</a></li>
                                            <li><a href="#lvlintermediate1" data-toggle="tab">Intermediate</a></li>
                                            <li><a href="#lvladvanced1" data-toggle="tab">Advanced</a></li>
                                            <li><a href="#lvlsuperior1" data-toggle="tab">Superior</a></li>
                                        </ul>
                                        <div id="myTabContent" class="tab-content">
                                            <br>
                                            <div class="tab-pane fade active in" id="lvlbasic1">
                                                <div class="form-group">
                                                    <button class="btn btn-secondary" onclick="addBasicItem()">+ Add Item</button>
                                                </div>
                                                <div id="basicItemsContainerEdit">

                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="lvlintermediate1">
                                                <div class="form-group">
                                                    <button class="btn btn-secondary" onclick="addIntermediateItem()">+ Add Item</button>
                                                </div>
                                                <div id="intermediateItemsContainerEdit">

                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="lvladvanced1">
                                                <div class="form-group">
                                                    <button class="btn btn-secondary" onclick="addAdvancedItem()">+ Add Item</button>
                                                </div>
                                                <div id="advancedItemsContainerEdit">

                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="lvlsuperior1">
                                                <div class="form-group">
                                                    <button class="btn btn-secondary" onclick="addSuperiorItem()">+ Add Item</button>
                                                </div>
                                                <div id="superiorItemsContainerEdit">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" id="btnSubmitUpdateCompetencyIndex">SUBMIT</button>
                <button type="button" class="btn btn-default" data-dismiss="modal" id="close">CANCEL</button>
            </div>
        </div>

    </div>
</div>
<script type="application/javascript">
$(document).ready(function(){
    loadCompetencyIndices();
    window.isUpdateIndex = false;
});

function loadCompetencyIndices(){
    if(window.isUpdateIndex == false){
        $('#loadingmodal').modal('show');
    }
    $("#tblcompetencyindices").dataTable({
        "destroy":true,
        "responsive" : true,
        "sDOM": 'frt',
        "oLanguage": {
            "sSearch": "Search:"
        },
        "columnDefs": [
            { "width": "9%", "targets": 4 }
        ],
        "order": [[ 0, "desc" ]],
        "ajax":{
            "url":"<?php echo base_url();?>recruitments/competencyindices",
            "data" : {},
            "type" : "POST",
            "dataType" : "json",
            dataSrc: function(json){
                console.log(json);
                if(json.Code=="00"){
                    $('#loadingmodal').modal('hide');
                    $('#tblcompetencyindicescontainer').show();
                    $("#tablemessageindices").hide();
                    return json.details;
                }else{
                    $('#loadingmodal').modal('hide');
                    $("#tblcompetencyindicescontainer").hide();
                    $("#tablemessageindices").html("<h3>No Competency Index Found</h3>");
                    $("#tablemessageindices").show();
                }
            }
        },
        "columns":[
            {"data":function(data){
                return moment(data.datecreated).format("MMM DD, YYYY hh:mm:ss A");
            }},
            {"data":"competencytitle"},
            {"data":"competencyarea"},
            {"data":function(data){
                var desc = atob(data.competencydescription);
                var d = "";
                if(desc.length > 30){
                    d = desc.substring(0, 30);
                } else {
                    d = desc;
                }
                return d+"..";
            }},
            {"data":function(data){
                return "<a class='btn btn-success btn-sm' href='javascript:actionEditIndex("+JSON.stringify(data)+");'><i class='fa fa-pencil'></i></a> | <a class='btn btn-primary btn-sm' href='javascript:actionDeleteIndex("+JSON.stringify(data)+");'><i class='fa fa-trash'></i></a>";
            }
            }]
    });
}

function actionDeleteIndex(data){
    $("#idcompetencyindexrowiddelete").val(data.id);
    $("#deletecompetencyindex").text(data.competencytitle);
    $("#modalDeleteCompetencyIndex").modal("show");
}

function actionEditIndex(data){
    window.basicItemCountEdit =0;
    window.intermediateItemCountEdit =0;
    window.advancedItemCountEdit =0;
    window.superiorItemCountEdit =0;

    $("#idcompetencyindexrowidupdate").val(data.id);
    $("#competencyTitleEdit").val(data.competencytitle);
    $("#competencyAreaEdit").val(data.competencyarea);
    $("#competencyDescriptionEdit").val(atob(data.competencydescription));

    var json = JSON.parse(atob(data.levels));
    createItems("basic",json.Basic);
    createItems("intermediate",json.Intermediate);
    createItems("advanced",json.Advanced);
    createItems("superior",json.Superior);
//
    $("#modalUpdateCompetencyIndex").modal("show");
}

function createItems(level,content){
    var arrItems = [window.basicItemCountEdit,window.intermediateItemCountEdit,window.advancedItemCountEdit,window.superiorItemCountEdit];
    var counter = 0;
    if(level == "basic"){
        counter = 0;
    } else if(level == "intermediate"){
        counter = 1;
    } else if(level == "advanced"){
        counter = 2;
    } else {
        counter = 3;
    }
    var cont = $("#"+level+"ItemsContainerEdit");
    cont.empty();
    for(var i=0;i<content.length;i++){
        arrItems[counter] +=1;
        if(level == "basic"){
            window.basicItemCountEdit+=1;
        } else if(level == "intermediate"){
            window.intermediateItemCountEdit+=1;
        } else if(level == "advanced"){
            window.advancedItemCountEdit+=1;
        } else {
            window.superiorItemCountEdit+=1;
        }
        var itemid =level+"FG"+arrItems[counter];
        var item = '<div class="form-group" id="'+itemid+'">' +
            '<div class="col-lg-2">' +
            '<label for="lvl'+level+'item'+arrItems[counter]+'" class="control-label">Item #'+arrItems[counter]+'</label></div>' +
            '<div class="input-group col-lg-10">' +
            '<textarea class="form-control clearField '+level+'Item" id="lvl'+level+'item'+arrItems[counter]+'" rows="2" style="resize: none">'+content[i]+'</textarea>' +
            '<span class="input-group-addon btn btn-secondary" onclick="removeItem('+itemid+')"><i class="fa fa-minus-circle fa-lg" style="color: red"></i></span></div>' +
            '</div>';
        cont.append(item);
    }
}

function removeItem(el){
    var arrItems = [window.basicItemCountEdit,window.intermediateItemCountEdit,window.advancedItemCountEdit,window.superiorItemCountEdit];
    $("#"+el.id).remove();
}

$("#btnSubmitDeleteCompetencyIndex").click(function(){
    $("#modalDeleteCompetencyIndex").modal("hide");
    $("#loadingmodal").modal("show");
    $.ajax({
        url: "<?php echo base_url();?>recruitments/deletecompetencyindex",
        type: "POST",
        dataType: "json",
        data: {
            "ROWID":$("#idcompetencyindexrowiddelete").val()
        },
        success: function(result){
            $("#loadingmodal").modal("hide");
            if(result.Code == "00"){
                messageDialogModal("Server Message", result.Message);
                clearField();
                window.isUpdateIndex = true;
                loadCompetencyIndices();
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

$(document.body).on('hide.bs.modal,hidden.bs.modal', function () {
    $('body').css('padding-right','0');
});
$("#btnSubmitUpdateCompetencyIndex").click(function(){
    if(!validateUpdateCompetencyIndex()){
        return;
    } else {
        $("#modalUpdateCompetencyIndex").modal("hide");
        $("#loadingmodal").modal("show");
        var levels = new Object();
        var basicArr = [];
        var intermediateArr = [];
        var advancedArr = [];
        var superiorArr = [];

        $(".basicItem").each(function() {
            basicArr.push($(this).val());
        });

        $(".intermediateItem").each(function() {
            intermediateArr.push($(this).val());
        });

        $(".advancedItem").each(function() {
            advancedArr.push($(this).val());
        });

        $(".superiorItem").each(function() {
            superiorArr.push($(this).val());
        });

        levels['Basic'] = basicArr;
        levels['Intermediate'] = intermediateArr;
        levels['Advanced'] = advancedArr;
        levels['Superior'] = superiorArr;

        var lvl = btoa(JSON.stringify(levels));
        $.ajax({
            url: "<?php echo base_url();?>recruitments/updatecompetencyindex",
            type: "POST",
            dataType:"json",
            data: {
                "INDEXROWID":$("#idcompetencyindexrowidupdate").val(),
                "COMPETENCYAREA":$("#competencyAreaEdit").val(),
                "COMPETENCYDESCRIPTION":btoa($("#competencyDescriptionEdit").val()),
                "LEVELS":lvl
            },
            success: function(result){
                $("#loadingmodal").modal("hide");
                if(result.Code == "00"){
                    messageDialogModal("Server Message",result.Message);
                    clearField();
                    window.isUpdateIndex = true;
                    loadCompetencyIndices();
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
});

$("#btnCancelCompetencyIndex").click(function(){
    clearField();
});

function addBasicItem(){
    window.basicItemCountEdit +=1;
    var cont = $("#basicItemsContainerEdit");
    var itemid = "basicFG"+window.basicItemCountEdit;
    var item = '<div class="form-group" id="'+itemid+'">' +
        '<div class="col-lg-2">' +
        '<label for="lvlbasicitem'+window.basicItemCountEdit+'" class="control-label">Item #'+window.basicItemCountEdit+'</label></div>' +
        '<div class="input-group col-lg-10">' +
        '<textarea class="form-control clearField basicItem" id="lvlbasicitem'+window.basicItemCountEdit+'" rows="2" style="resize: none"></textarea>' +
        '<span class="input-group-addon btn btn-secondary" onclick="removeItem('+itemid+')"><i class="fa fa-minus-circle fa-lg" style="color: red"></i></span></div>' +
        '</div>';
    cont.append(item);
}

function addIntermediateItem(){
    window.intermediateItemCountEdit +=1;
    var cont = $("#intermediateItemsContainerEdit");
    var itemid = "intermediateFG"+window.intermediateItemCountEdit;
    var item = '<div class="form-group" id="'+itemid+'">' +
        '<div class="col-lg-2">' +
        '<label for="lvlintermediateitem'+window.intermediateItemCountEdit+'" class="control-label">Item #'+window.intermediateItemCountEdit+'</label></div>' +
        '<div class="input-group col-lg-10">' +
        '<textarea class="form-control clearField intermediateItem" id="lvlintermediateitem'+window.intermediateItemCountEdit+'" rows="2" style="resize: none"></textarea>' +
        '<span class="input-group-addon btn btn-secondary" onclick="removeItem('+itemid+')"><i class="fa fa-minus-circle fa-lg" style="color: red"></i></span></div>' +
        '</div>';
    cont.append(item);
}

function addAdvancedItem(){
    window.advancedItemCountEdit +=1;
    var cont = $("#advancedItemsContainerEdit");
    var itemid = "advancedFG"+window.advancedItemCountEdit;
    var item = '<div class="form-group" id="'+itemid+'">' +
        '<div class="col-lg-2">' +
        '<label for="lvladvanceditem'+window.advancedItemCountEdit+'" class="control-label">Item #'+window.advancedItemCountEdit+'</label></div>' +
        '<div class="input-group col-lg-10">' +
        '<textarea class="form-control clearField advancedItem" id="lvladvanceditem'+window.advancedItemCountEdit+'" rows="2" style="resize: none"></textarea>' +
        '<span class="input-group-addon btn btn-secondary" onclick="removeItem('+itemid+')"><i class="fa fa-minus-circle fa-lg" style="color: red"></i></span></div>' +
        '</div>';
    cont.append(item);
}

function addSuperiorItem(){
    window.superiorItemCountEdit +=1;
    var cont = $("#superiorItemsContainerEdit");
    var itemid = "superiorFG"+window.superiorItemCountEdit;
    var item = '<div class="form-group" id="'+itemid+'">' +
        '<div class="col-lg-2">' +
        '<label for="lvlsuperioritem'+window.superiorItemCountEdit+'" class="control-label">Item #'+window.superiorItemCountEdit+'</label></div>' +
        '<div class="input-group col-lg-10">' +
        '<textarea class="form-control clearField superiorItem" id="lvlsuperioritem'+window.superiorItemCountEdit+'" rows="2" style="resize: none"></textarea>' +
        '<span class="input-group-addon btn btn-secondary" onclick="removeItem('+itemid+')"><i class="fa fa-minus-circle fa-lg" style="color: red"></i></span></div>' +
        '</div>';
    cont.append(item);
}
function validateUpdateCompetencyIndex(){

    if($("#competencyAreaEdit").val() == "" || $("#competencyAreaEdit").val == null){
        messageDialogModal("Required Field","Please Enter Competency Area");
        return false;
    }
    if($("#competencyDescriptionEdit").val() == "" || $("#competencyDescriptionEdit").val == null){
        messageDialogModal("Required Field","Please Enter Competency Description");
        return false;
    }
    if(!hasValue(".basicItem")){
        messageDialogModal("Required Field","Please Provide Description for Basic Items");
        return false;
    }

    if(!hasValue(".intermediateItem")){
        messageDialogModal("Required Field","Please Provide Description for Intermediate Items");
        return false;
    }

    if(!hasValue(".advancedItem")){
        messageDialogModal("Required Field","Please Provide Description for Advanced Items");
        return false;
    }

    if(!hasValue(".superiorItem")){
        messageDialogModal("Required Field","Please Provide Description for Superior Items");
        return false;
    }

    return true;
}

function hasValue(level){
    var r = true;
    console.log(level);
    $(level).each(function() {
        if ($(this).val() == '' || $(this).val() == null) {
            r = false;
        }
    });

    return r;
}
</script>