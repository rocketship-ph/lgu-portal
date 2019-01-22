<div class="form-horizontal">
    <fieldset>
        <legend>Create New Position</legend>
        <div class="form-group">
            <label for="positionName" class="col-lg-2 control-label">Position Name</label>
            <div class="col-lg-10">
                <input class="form-control" id="positionName" placeholder="Position Name" type="text" required="">
            </div>
        </div>
        <div class="form-group">
            <label for="type" class="col-lg-2 control-label">Type</label>
            <div class="col-lg-10">
                <div class="btn-group btn-group-justified postype">
                    <a level="casual" onclick="setPositionType('Casual');" class="btn btn-outline-success type">Casual</a>
                    <a level="plantilla" onclick="setPositionType('Plantilla');" class="btn btn-outline-success type">Plantilla</a>
                    <a level="coterminous" onclick="setPositionType('Coterminous');" class="btn btn-outline-success type">Coterminous</a>
                    <a level="joborder" onclick="setPositionType('Job Order');" class="btn btn-outline-success type">Job Order</a>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="positionDescription" class="col-lg-2 control-label">Description</label>
            <div class="col-lg-10">
                <textarea class="form-control clearField" id="positionDescription" rows="3" style="resize: none" placeholder="Enter position description.."></textarea>
            </div>
        </div>
        <div class="form-group">
            <div class="col-lg-12" style="text-align: right">
                <button type="button" id="btnSubmitNewPosition" class="btn btn-success">SUBMIT</button>
                <button type="reset" class="btn btn-default" id="btnCancelCreatePosition">CANCEL</button>
            </div>
        </div>
    </fieldset>
</div>
<script type="application/javascript">
$(document).ready(function(){
    window.PositionType = "";
    window.PositionDescription = "";
});

function setPositionType(type){
    window.PositionType = type;
    console.log(type);
}


$('.btn-group.postype a').click(function(e) {
    e.preventDefault();
    $(this).addClass('active').siblings().removeClass('active');
});

$('.list-group a').click(function(e) {
    e.preventDefault();
    $(this).addClass('active').siblings().removeClass('active');
});
//    $("#close").click(function(e) {
//        e.preventDefault();
//       $('.description').removeClass('active');
//    });


$("#btnSubmitNewPosition").click(function(){
    if(!validate()){
        return;
    } else {
        $("#loadingmodal").modal("show");
        console.log("g");
        var positioncode = "";
        var posname = $("#positionName").val();
        var sp = posname.split(' ');
        for(var i=0;i<sp.length;i++){
            var c = sp[i].slice(0,4);
            positioncode+=c;
        }

        $.ajax({
            url: "<?php echo base_url();?>recruitments/createposition",
            type: "POST",
            dataType: "json",
            data: {
                "POSITIONCODE":positioncode,
                "POSITIONNAME": $("#positionName").val(),
                "POSITIONDESC": btoa($("#positionDescription").val()),
                "POSITIONTYPE": window.PositionType
            },
            success: function(result){
                $("#loadingmodal").modal("hide");
                if(result.Code == "00"){
                    window.PositionType = "";
                    window.PositionDescription = "";
                    $("#positionName").val("");
                    $("#positionDescription").val("");
                    $(".type").removeClass("active");

                    messageDialogModal("Server Message",result.Message);
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

$("#btnCancelCreatePosition").click(function(){
    window.PositionType = "";
    window.PositionDescription = "";
    $("#positionName").val("");
    $("#positionDescription").val("");
    $(".type").removeClass("active");
});

function validate(){
    if($("#positionName").val() == "" || $("#positionName").val() == null){
        messageDialogModal("Required Field","Please enter Position Name");
        return false;
    }

    if(window.PositionType == "" || window.PositionType == null){
        messageDialogModal("Required Field","Please select Position Type");
        return false;
    }

    if($("#positionDescription").val() == "" || $("#positionDescription").val() == null){
        messageDialogModal("Required Field","Please enter Position Description");
        return false;
    }
    return true;
}

$(document.body).on('hide.bs.modal,hidden.bs.modal', function () {
    $('body').css('padding-right','0');
});

</script>