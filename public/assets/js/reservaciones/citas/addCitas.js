$(document).ready(function() {//INITIALIZE DOCUMENT READY

  $('.timepicker').pickatime({
    //formato de envio
    formatSubmit: 'HH:i',
    hiddenName: true,
    // Close on a user action
    closeOnSelect: true,
    closeOnClear: false
  });

});

  //hide btn
  $('#btn-modal').hide();
  $('#btn-modal-citas').hide();
  //capture click event
  $('.fc-day').on('click', function() {
    var valor = $(this).attr('data-date');
    $('#btn-modal').click();
    //console.log(valor);

  });
  
  //btn close modal
  $('#btn-modal-close').on('click', function() {
      $('#modalForm').hide();
      $('.lean-overlay').remove();

  });

  // fc hover
  $('.fc-day').hover(function() {
      $(this).css('cursor', 'pointer');
      $(this).attr('title', 'Solicitar cita');

  });

  $('body table tbody tr td a ').addClass('btn');
  $('body table ').addClass('bordered');
  $('body table ').addClass('responsive');
  //$('body table ').css({"border-collapse": "collapse"});
  //$('body table tbody tr').css({"border": "none"})
  //$('body table tbody tr td').css({"border": "solid 1px #f00"});
  //$('body table tbody tr td').css({"border-left": "solid 1px #f00;"});
  //$("p").css({"background-color": "yellow", "font-size": "200%"});
  //$('body table ').addClass('table_bordered');
  //$('body table  tbody tr ').addClass('tr_border');
  //$('body table  tbody tr td').addClass('td_bordered');
    //$('#calendar').fullCalendar('refetchEvents');
 //END DOCUMENT READY
