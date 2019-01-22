
function messageDialogModal(title,msg)
{
   $('#messagealertmodalmsg').text(msg);
   $('#messagealertmodaltitle').html(title);
   $('#messagedialogmodal').modal('show');
}

//function messageDialogModal(title,msg,invalidId)
//{
//   $('#messagealertmodal').html(msg);
//    $('#messagealertmodaltitle').html(title);
//    $('#messagedialogmodal').modal('show');
//
//   $('#btnmessagedialogmodal').click(function(){
//          $("#"+invalidId).focus();
//          $("#"+invalidId).addClass('ui-state-error');
//
//          setTimeout(function () {
//
//              $("#"+invalidId).removeClass('ui-state-error');
//               $("#dialog-message1").dialog('destroy');
//              $("#msg-dialog-container").empty();
//
//          }, 3000);
//   });
//}

