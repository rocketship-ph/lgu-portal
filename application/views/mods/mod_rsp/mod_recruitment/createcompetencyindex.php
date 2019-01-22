<div class="form-horizontal">
    <fieldset>
        <legend>Competency Index Profile</legend>
        <div class="form-group">
            <label for="competencyTitle" class="col-lg-2 control-label">Competency Index</label>
            <div class="col-lg-10">
                <select class="form-control clearField" id="competencyTitle">

                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="competencyDescription" class="col-lg-2 control-label">Description</label>
            <div class="col-lg-10">
                <textarea class="form-control clearField" id="competencyDescription" placeholder="Description" rows="3" style="resize: none" readonly></textarea>
            </div>
        </div>
        <div class="form-group">
            <label for="competencyArea" class="col-lg-2 control-label">Competency Area</label>
            <div class="col-lg-10">
                <input class="form-control clearField" id="competencyArea" placeholder="Competency Area" type="text">
            </div>
        </div>
        <hr>
        <div class="form-group">
            <label for="competencyLevels" class="col-lg-2 control-label">Levels</label>
            <div class="col-lg-10">
                <ul class="nav nav-pills">
                    <li class="active"><a href="#lvlbasic" data-toggle="tab">Basic</a></li>
                    <li><a href="#lvlintermediate" data-toggle="tab">Intermediate</a></li>
                    <li><a href="#lvladvanced" data-toggle="tab">Advanced</a></li>
                    <li><a href="#lvlsuperior" data-toggle="tab">Superior</a></li>
                </ul>
                <div id="myTabContent" class="tab-content">
                    <br>
                    <div class="tab-pane fade active in" id="lvlbasic">
                        <div class="form-group">
                            <button class="btn btn-secondary" onclick="addBasicItem()">+ Add Item</button>
                        </div>
                        <div id="basicItemsContainer">
                            <div class="form-group">
                                <div class="col-lg-2">
                                    <label for="lvlbasicitem1" class="control-label">Item #1</label>
                                </div>
                                <div class="input-group col-lg-10">
                                    <textarea class="form-control clearField basicItem" id="lvlbasicitem1" rows="2" style="resize: none"></textarea>
                                    <span class="input-group-addon btn btn-secondary"><i class="fa fa-minus-circle fa-lg" style="color: red"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="lvlintermediate">
                        <div class="form-group">
                            <button class="btn btn-secondary" onclick="addIntermediateItem()">+ Add Item</button>
                        </div>
                        <div id="intermediateItemsContainer">
                            <div class="form-group">
                                <div class="col-lg-2">
                                    <label for="lvlintermediateitem1" class="control-label">Item #1</label>
                                </div>
                                <div class="input-group col-lg-10">
                                    <textarea class="form-control clearField intermediateItem" id="lvlintermediateitem1" rows="2" style="resize: none"></textarea>
                                    <span class="input-group-addon btn btn-secondary"><i class="fa fa-minus-circle fa-lg" style="color: red"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="lvladvanced">
                        <div class="form-group">
                            <button class="btn btn-secondary" onclick="addAdvancedItem()">+ Add Item</button>
                        </div>
                        <div id="advancedItemsContainer">
                            <div class="form-group">
                                <div class="col-lg-2">
                                    <label for="lvladvanceditem1" class="control-label">Item #1</label>
                                </div>
                                <div class="input-group col-lg-10">
                                    <textarea class="form-control clearField advancedItem" id="lvladvanceditem1" rows="2" style="resize: none"></textarea>
                                    <span class="input-group-addon btn btn-secondary"><i class="fa fa-minus-circle fa-lg" style="color: red"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="lvlsuperior">
                        <div class="form-group">
                            <button class="btn btn-secondary" onclick="addSuperiorItem()">+ Add Item</button>
                        </div>
                        <div id="superiorItemsContainer">
                            <div class="form-group">
                                <div class="col-lg-2">
                                    <label for="lvlsuperioritem1" class="control-label">Item #1</label>
                                </div>
                                <div class="input-group col-lg-10">
                                    <textarea class="form-control clearField superiorItem" id="lvlsuperioritem1" rows="2" style="resize: none"></textarea>
                                    <span class="input-group-addon btn btn-secondary"><i class="fa fa-minus-circle fa-lg" style="color: red"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-lg-12" style="text-align: right">
                <button type="button" id="btnSubmitCompetencyIndex" class="btn btn-success">Submit</button>
                <button type="button" id="btnCancelCompetencyIndex" class="btn btn-default">Cancel</button>
            </div>
        </div>
    </fieldset>
</div>
<script type="application/javascript">
    $(document).ready(function(){
        loadCompetencies();
        window.basicItemCount =1;
        window.intermediateItemCount =1;
        window.advancedItemCount =1;
        window.superiorItemCount =1;
    });

    $("#competencyTitle").change(function(){
       var desc = $("#competencyTitle option:selected").attr("competency-description");
        $("#competencyDescription").val(desc);
    });

    function loadCompetencies(){
        $("#loadingmodal").modal("show");
        var select = $("#competencyTitle");
        select.empty();
        $.ajax({
            url: "<?php echo base_url();?>recruitments/competencies",
            type: "POST",
            dataType: "json",
            data: {},
            success: function(data){
                $("#loadingmodal").modal("hide");
                if(data.Code == "00"){
                    select.append("<option selected disabled>- Select Competency Title -</option>");
                    for(var keys in data.details){
                        select.append("<option competency-description='"+atob(data.details[keys].description)+"' value='"+data.details[keys].title+"'>"+data.details[keys].title+"</option>");
                    }
                }
            },
            error: function(e){
                $("#loadingmodal").modal("hide");
                select.append("<option selected disabled>- No Competency Title Available -</option>");
                console.log(e);
            }
        });
    }


    $(document.body).on('hide.bs.modal,hidden.bs.modal', function () {
        $('body').css('padding-right','0');
    });

    $("#btnSubmitCompetencyIndex").click(function(){
        if(!validateCompetencyIndex()){
            return;
        } else {
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
                url: "<?php echo base_url();?>recruitments/newcompetencyindex",
                type: "POST",
                dataType:"json",
                data: {
                    "COMPETENCYTITLE": $("#competencyTitle option:selected").val(),
                    "COMPETENCYAREA":$("#competencyArea").val(),
                    "COMPETENCYDESCRIPTION":btoa($("#competencyDescription").val()),
                    "LEVELS":lvl
                },
                success: function(result){
                    $("#loadingmodal").modal("hide");
                    if(result.Code == "00"){
                        messageDialogModal("Server Message",result.Message);
                        clearField();
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

    function addBasicItem(){
        window.basicItemCount +=1;
        var cont = $("#basicItemsContainer");
        var itemid = "basicFG"+window.basicItemCount;
        var item = '<div class="form-group" id="'+itemid+'">' +
            '<div class="col-lg-2">' +
            '<label for="lvlbasicitem'+window.basicItemCount+'" class="control-label">Item #'+window.basicItemCount+'</label></div>' +
            '<div class="input-group col-lg-10">' +
            '<textarea class="form-control clearField basicItem" id="lvlbasicitem'+window.basicItemCount+'" rows="2" style="resize: none"></textarea>' +
            '<span class="input-group-addon btn btn-secondary" onclick="removeItem('+itemid+')"><i class="fa fa-minus-circle fa-lg" style="color: red"></i></span></div>' +
            '</div>';
        cont.append(item);
    }

    function addIntermediateItem(){
        window.intermediateItemCount +=1;
        var cont = $("#intermediateItemsContainer");
        var itemid = "intermediateFG"+window.intermediateItemCount;
        var item = '<div class="form-group" id="'+itemid+'">' +
            '<div class="col-lg-2">' +
            '<label for="lvlintermediateitem'+window.intermediateItemCount+'" class="control-label">Item #'+window.intermediateItemCount+'</label></div>' +
            '<div class="input-group col-lg-10">' +
            '<textarea class="form-control clearField intermediateItem" id="lvlintermediateitem'+window.intermediateItemCount+'" rows="2" style="resize: none"></textarea>' +
            '<span class="input-group-addon btn btn-secondary" onclick="removeItem('+itemid+')"><i class="fa fa-minus-circle fa-lg" style="color: red"></i></span></div>' +
            '</div>';
        cont.append(item);
    }

    function addAdvancedItem(){
        window.advancedItemCount +=1;
        var cont = $("#advancedItemsContainer");
        var itemid = "advancedFG"+window.advancedItemCount;
        var item = '<div class="form-group" id="'+itemid+'">' +
            '<div class="col-lg-2">' +
            '<label for="lvladvanceditem'+window.advancedItemCount+'" class="control-label">Item #'+window.advancedItemCount+'</label></div>' +
            '<div class="input-group col-lg-10">' +
            '<textarea class="form-control clearField advancedItem" id="lvladvanceditem'+window.advancedItemCount+'" rows="2" style="resize: none"></textarea>' +
            '<span class="input-group-addon btn btn-secondary" onclick="removeItem('+itemid+')"><i class="fa fa-minus-circle fa-lg" style="color: red"></i></span></div>' +
            '</div>';
        cont.append(item);
    }

    function addSuperiorItem(){
        window.superiorItemCount +=1;
        var cont = $("#superiorItemsContainer");
        var itemid = "superiorFG"+window.superiorItemCount;
        var item = '<div class="form-group" id="'+itemid+'">' +
            '<div class="col-lg-2">' +
            '<label for="lvlsuperioritem'+window.superiorItemCount+'" class="control-label">Item #'+window.superiorItemCount+'</label></div>' +
            '<div class="input-group col-lg-10">' +
            '<textarea class="form-control clearField superiorItem" id="lvlsuperioritem'+window.superiorItemCount+'" rows="2" style="resize: none"></textarea>' +
            '<span class="input-group-addon btn btn-secondary" onclick="removeItem('+itemid+')"><i class="fa fa-minus-circle fa-lg" style="color: red"></i></span></div>' +
            '</div>';
        cont.append(item);
    }

    function removeItem(el){
        var arrItems = [window.basicItemCount,window.intermediateItemCount,window.advancedItemCount,window.superiorItemCount];
        $("#"+el.id).remove();
    }

    function validateCompetencyIndex(){
        if($("#competencyTitle option:selected").val() == "- Select Competency Title -"){
            messageDialogModal("Required Field","Please Select Competency Title");
            return false;
        }
        if($("#competencyArea").val() == "" || $("#competencyArea").val == null){
            messageDialogModal("Required Field","Please Enter Competency Area");
            return false;
        }
        if($("#competencyDescription").val() == "" || $("#competencyDescription").val == null){
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
        $(level).each(function() {
            if ($(this).val() == '' || $(this).val() == null) {
                r = false;
            }
        });

        return r;
    }
</script>