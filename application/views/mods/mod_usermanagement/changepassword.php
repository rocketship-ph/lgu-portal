<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3>Account</h3>
                        <h4><i class="fa fa-angle-right"></i>&nbsp;Change Password</h4>
                    </div>
                    <div class="panel-body">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">OLD PASSWORD: <span class="req">*</span></label>
                                <input class="form-control clearField" id="oldpass" placeholder="Old Password" required="" type="password">
                            </div>
                            <br>
                            <br>
                            <div class="form-group">
                                <label class="control-label">NEW PASSWORD: <span class="req">*</span></label>
                                <input class="form-control clearField" id="newpass" placeholder="New Password" required="" type="password">
                            </div>
                            <div class="form-group">
                                <label class="control-label">CONFIRM PASSWORD: <span class="req">*</span></label>
                                <input class="form-control clearField" id="confirmpass" placeholder="Confirm Password" required="" type="password">
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <div class="row">
                            <div class="col-md-12" align="right">
                                <button class="btn btn-primary" id="btnSubmit">SUBMIT</button>
                                <a class="btn btn-cancel" href="<?php echo base_url();?>homepage">CANCEL</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
</div>

<div class="modal fade bs-example-modal-sm" id="modalchangepass" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header" >
                <span>Change Password</span>
            </div>
            <div class="modal-body">
                <span id="changepassmsg"></span>
            </div>
            <div class="modal-footer">
                <a type="button" class="btn btn-danger"  href="<?php echo base_url();?>homepage/logout">OK</a>
            </div>
        </div>
    </div>
</div>
<script type="application/javascript">
    $(document).ready(function(){
        $("#accountdropdown").removeClass("dropdown").addClass("dropdown active");
        document.title = "Change Password";
    });
    $("#btnSubmit").click(function(){
        if(!validate()){
            return;
        }

        var newpass = $("#newpass").val();
        var confirmpass = $("#confirmpass").val();
        var oldpass = $("#oldpass").val();
        if(newpass != confirmpass){
            messageDialogModal("Server Message","New Password and Confirm Password did not match");
        } else {
            $("#loadingmodal").modal("show");
            $.ajax({
                url : "<?php  echo base_url(); ?>changepassword/changepassword",
                type : "POST",
                data : {
                    "OLDPASSWORD": oldpass,
                    "NEWPASSWORD": newpass
                },
                dataType: 'json',
                success : function(data){
                    $("#loadingmodal").modal("hide");
                    if(data.Code == "00"){
                        clearField();
                        $("#changepassmsg").text(data.Message);
                        $("#modalchangepass").modal("show");
                    } else {
                        messageDialogModal("Server Message",data.Message);
                    }
                },
                error: function(e){
                    console.log(e);
                }
            });
        }
    });

    function validate(){
        if($("#oldpass").val()=="" || $("#oldpass").val()==null){
            messageDialogModal("Server Message","Old Password is empty");
            return false;
        }

        if($("#newpass").val()=="" || $("#newpass").val()==null){
            messageDialogModal("Server Message","New Password is empty");
            return false;
        }

        if($("#confirmpass").val()=="" || $("#confirmpass").val()==null){
            messageDialogModal("Server Message","Confirm Password is empty");
            return false;
        }
        return true;
    }
</script>