$(document).ready(function() {

       $('select').material_select();

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
       });

       $("#selectArea").change(event =>{
         var selectAgenda = $("#selectAgenda");
         selectAgenda.empty();
         selectAgenda.prepend('<option value="" disabled selected>Selecciona una agenda...</option>');
         $('select#selectAgenda').material_select();

           $.get(`../agendas/getAgendasByID/${event.target.value}`, function(res, sta) {
               res.forEach(element => {
                 $("#selectAgenda").append(`<option value=${element.id}> ${element.agenda} </option>`);
                 $('select#selectAgenda').material_select();
               })
           });
       });


});
$('.datepicker').pickadate({
    today: 'Hoy',
    clear: 'Borrar',
    close: 'Cerrar',
    format: 'yyyy/mm/dd',
    formatSubmit: 'yyyy/mm/dd'
});
