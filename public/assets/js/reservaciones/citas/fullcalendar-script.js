$(document).ready(function() {

  var date = new Date(); //fecha actual


  /* initialize the external events
  -----------------------------------------------------------------*/
  $('#external-events .fc-event').each(function() {

    // store data so the calendar knows to render an event upon drop
    $(this).data('event', {
      title: $.trim($(this).text()), // use the element's text as the event title
      stick: true, // maintain when user navigates (see docs on the renderEvent method)
      color: '#00bcd4'
    });

    // make the event draggable using jQuery UI
    $(this).draggable({
      zIndex: 999,
      revert: true,      // will cause the event to go back to its
      revertDuration: 0  //  original position after the drag
    });

  });


  /* initialize the calendar
  -----------------------------------------------------------------*/
  $('#calendar').fullCalendar({
    header: {
      left: 'prev',
      center: 'title',
      right: 'next'
    },
    contentHeight: 450,
    defaultDate: date,
    editable: false, //no permitir mover eeventos
    droppable: false, // this allows things to be dropped onto the calendar
    eventLimit: true, // allow "more" link when too many events
    //hiddenDays: [ 0,6], //OCULTAR LOS DIAS SABADO Y DOMINGO
    events: [
      {
        title: '7',
        start: '2017-04-13',
        color: '#00bcd4'
      }
    ],

    eventClick: function(calEvent, jsEvent, view) {

        //$('#btn-modal-citas').click();
        alert('Event: ' + calEvent.title);
        alert('Coordinates: ' + jsEvent.pageX + ',' + jsEvent.pageY);
        alert('View: ' + view.name);

        // change the border color just for fun
        //$(this).css('border-color', 'red');

    }

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
  //btn close modal 2
  $('#btn-modal-close2').on('click', function() {
      $('#modalCitas').hide();
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

});
