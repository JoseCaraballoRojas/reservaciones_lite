$(document).ready(function() {

  var date = new Date(); //fecha actual
  var data; //data de la agenda seleccionada

  //funciones para selects y eventos en el DOM
  $('select').material_select();

  $("#calendar").hide();//ocultar calendario
  $("#Sucursal").hide();//ocultar select selectSucursal
  $("#Area").hide();//ocultar selct selectArea
  $("#btn-back-calendar").hide();//ocultar boton de regeresar
  $("#selectEmpresa").change(event =>{

    var selectSucursal = $("#selectSucursal");
    selectSucursal.empty();
    selectSucursal.prepend('<option value="" disabled selected>Selecciona una sucursal...</option>');
    $('select#selectSucursal').material_select();

      $.get(`../agendas/getSucursalesByID/${event.target.value}`, function(res, sta) {
          res.forEach(element => {
            $("#selectSucursal").append(`<option value=${element.id}> ${element.sucursal} </option>`);
            $('select#selectSucursal').material_select();
          })
      });
      $("#Sucursal").show();
  });

  $("#selectSucursal").change(event =>{

    var selectArea = $("#selectArea");
    selectArea.empty();
    selectArea.prepend('<option value="" disabled selected>Selecciona un area...</option>');
    $('select#selectArea').material_select();

      $.get(`../agendas/getAreasByID/${event.target.value}`, function(res, sta) {
          res.forEach(element => {
            $("#selectArea").append(`<option value=${element.id}> ${element.area} </option>`);
            $('select#selectArea').material_select();
          })
      });
      $("#Area").show();
  });

  $("#selectArea").change(event =>{
    //obtener datos de la configuracion de las agendas
    $.get(`../agendas/getAgendaByID/${event.target.value}`, function(res, sta) {
        data = res;
        configCalendar(data);
    });

      $("#Selectores").hide();
      $("#calendar").show();
      $("#btn-back-calendar").show();
  });

  $("#btn-back-calendar").on('click', function(){
      $("#Selectores").show();//mostrar area de Selectores
      $("#calendar").hide();//ocultar calendario
      $("#Sucursal").hide();//ocultar select selectSucursal
      $("#Area").hide();//ocultar selct selectArea
      $("#btn-back-calendar").hide();//ocultar boton back calendar
  });
  //--------------------end funciones ----------------------------------

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
    contentHeight: 500,
    defaultDate: date,
    editable: false, //no permitir mover eeventos
    droppable: false, // this allows things to be dropped onto the calendar
    eventLimit: true, // allow "more" link when too many events
    //hiddenDays: [ 0,6], //OCULTAR LOS DIAS SABADO Y DOMINGO
    /*events: [
      {
        title: '7',
        start: '2017-05-13',
        color: '#00bcd4'
      }
    ],

    eventClick: function(calEvent, jsEvent, view) {

        //$('#btn-modal').click();
        //alert('Event: ' + calEvent.title);
        //alert('Coordinates: ' + jsEvent.pageX + ',' + jsEvent.pageY);
        //alert('View: ' + view.name);

        // change the border color just for fun
        //$(this).css('border-color', 'red');

    }*/

  });
  /*------- End initialize the calendar   ---------------------------*/

  //hide btn
  $('#btn-modal').hide();
  $('#btn-modal-citas').hide();
  //capture click event
  $('.fc-future span.fc-day-number').on('click', function() {
    var valor = $(this).attr('data-date');
    var date = $(this).parent().attr('data-date');

    $('#appointment_date').attr('value', date);
    $('#appointment_date').attr('readonly', 'true');
    $('#btn-modal').click();
    console.log(date);

  });
  //configurar calendar cuando avancen de mes
  $('button.fc-next-button').on('click', function() {
      configCalendar(data);
  });
  //configurar agenda cuando retrocedan de mes
  $('button.fc-prev-button').on('click', function() {
      configCalendar(data);
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
  $('.fc-future span.fc-day-number').hover(function() {

      $(this).attr('title', 'Solicitar cita');

  });

  function configCalendar(data) {
    var monday, tuesday, wednesday, thursday, friday, saturday, sunday;
    console.log(data);
    //$('body table tbody tr td a ').addClass('btn');
    data.forEach(element => {
      monday = element.monday; tuesday = element.tuesday;
      wednesday = element.wednesday; thursday = element.thursday;
      friday= element.friday; saturday = element.saturday; sunday = element.sunday;
    })

    $('.fc-future span.fc-day-number').addClass('btn-floating waves-effect waves-light  green accent-3');
    $('.fc-other-month span.fc-day-number').removeClass('btn-floating waves-effect waves-light  green accent-3');
    $('.fc-today span.fc-day-number').addClass('btn-floating waves-effect waves-light cyan');
    $('.fc-past span.fc-day-number, .fc-other-month span.fc-day-number').addClass('btn-floating disabled');

    //configurar calendar de acuerdo a su agenda
    if(monday === "0"){
      $('.fc-mon span.fc-day-number').addClass('disabled pointercancel');
      $('.fc-mon span.fc-day-number').css('cursor', 'not-allowed');
      $('.fc-mon span.fc-day-number').removeClass('waves-effect waves-light  green accent-3');
    }
    if(tuesday === "0"){
      $('.fc-tue span.fc-day-number').addClass('disabled pointercancel');
      $('.fc-tue span.fc-day-number').css('cursor', 'not-allowed');
      $('.fc-tue span.fc-day-number').removeClass('waves-effect waves-light  green accent-3');
    }
    if(wednesday === "0"){
      $('.fc-wed span.fc-day-number').addClass('disabled pointercancel');
      $('.fc-web span.fc-day-number').css('cursor', 'not-allowed');
      $('.fc-wed span.fc-day-number').removeClass('waves-effect waves-light  green accent-3');
    }
    if(thursday === "0"){
      $('.fc-thu span.fc-day-number').addClass('disabled pointercancel');
      $('.fc-thu span.fc-day-number').css('cursor', 'not-allowed');
      $('.fc-thu span.fc-day-number').removeClass('waves-effect waves-light  green accent-3');
    }
    if(friday === "0"){
      $('.fc-fri span.fc-day-number').addClass('disabled pointercancel');
      $('.fc-fri span.fc-day-number').css('cursor', 'not-allowed');
      $('.fc-fri span.fc-day-number').removeClass('waves-effect waves-light  green accent-3');
    }
    if(saturday === "0"){
      $('.fc-sat span.fc-day-number').addClass('disabled pointercancel');
      $('.fc-sat span.fc-day-number').css('cursor', 'not-allowed');
      $('.fc-sun span.fc-day-number').removeClass('waves-effect waves-light  green accent-3');
    }
    if(sunday === "0"){
      $('.fc-sun span.fc-day-number').addClass('disabled pointercancel');
      $('.fc-sun span.fc-day-number').css('cursor', 'not-allowed');
      $('.fc-sun span.fc-day-number').removeClass('waves-effect waves-light  green accent-3');
    }

  }

  //mejoras visuales calendar
  $('body table ').addClass('bordered centered');//centar contenido de las tablas
  $('body table ').addClass('responsive');//agregar responsividad a las tablas de calendario

});
