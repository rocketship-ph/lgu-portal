<div class="container">
    <div class="row">
        <div class="col-md-9">
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url(); ?>homepage">Home</a>
                </li>
                <li class="active">Announcements</li>
            </ol>
            <div id="divAnnouncements">

            </div>
        </div>
        <div class="col-lg-3">
            <h4>Search</h4>
            <div class="input-group">
                <input id="search" type="text" class="form-control">
                <span class="input-group-btn">
                    <button id="btnSearch" class="btn btn-success" type="button"><i class="fa fa-search"></i></button>
                </span>
            </div>
        </div>
    </div>
</div>
<style type="text/css">

</style>
<script type="application/javascript">
    $(document).ready(function(){
        loadRequests();
    });
    function loadRequests(){
        $.ajax({
            url : "<?php  echo base_url(); ?>recruitments/getannouncements",
            type : "POST",
            data : {
            },
            dataType: 'json',
            success : function(data){
                console.log(data);
                $("#divAnnouncements").empty();
                var string="";
                for (var key in data.details){
                    if (data.details.hasOwnProperty(key)){
                        string+='<div class="card"> <div class="card-body"> <h4 class="card-title">'+ data.details[key].positionname +'</h4> <h6 class="card-subtitle text-muted">Department: '+data.details[key].department+'</h6> </div> <div class="card-body"> <p class="card-text">'+atob(data.details[key].reason)+'</p> <a href="<?php echo base_url(); ?>announcements/view?id='+btoa(data.details[key].requestnumber)+'" class="btn-link">SEE MORE</a> </div> <div class="card-footer text-muted">'+moment(data.details[key].datecreated).format("ddd, MMM DD, YYYY")+'</div> </div> <br>';
                    }
                }
                $("#divAnnouncements").append(string);

            },
            error: function(e){
                console.log(e);
            }
        });
    }
</script>