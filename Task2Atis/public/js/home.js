
$('#insForm').on('click', function (e) {
    e.preventDefault();

    $('.form-popup').show();

});
$(document).ready()
{
    $('.form-popup').hide();
};

 function saveOrder() {
  var task="";
  $("#sortable tr").each(function(i) {
      if (task==''){
       task = $(this).attr('data-task-id');
      }
      else
       task += "," + $(this).attr('data-task-id');
  });
  $.ajax({
      type: 'POST',
      url: 'index',
      data: {sorts:task},
      success: function(response){
      $('html').html()
  }  
  });
}
$( "#sortable" ).sortable({
    update: function( event, ui ) {

      saveOrder();
    }
  });
  $('.modalPop').on('click', function (e) {
    e.preventDefault();
    id=$(this).attr('id');

    $('.m'+id).show();
  });


    
    window.onclick = function(event) {
      var modal=document.querySelectorAll("#myModal");
      for (var i = 0; i < modal.length; i++) {
        if (event.target == modal[i]) {
          modal[i].style.display='none';
        }
      }
      
    }

$('.checkDone').on('click',function(){
  if ($(this).is(':checked')){
    a=1;
  }
  else 
    a=0;
    id=$(this).attr('id');

    $.ajax({
      type: 'POST',
      url: 'check',
      data: {check:a,
            idcheck:id},

  });
});
$('.oof').on('click', function (e) {
  e.preventDefault();
  data = $(this).attr('id');
  console.log(data);
  window.location = 'images?a_id=' + data;
});