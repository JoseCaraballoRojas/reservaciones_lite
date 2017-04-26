
$(document).ready(function() {

       $('select').material_select();

       $("#selectEmpresa").change(event =>{
         var selectSucursal = $("#selectSucursal");
         selectSucursal.empty();
         selectSucursal.prepend('<option value="" disabled selected>Selecciona una sucursal...</option>');
         $('select#selectSucursal').material_select();

           $.get(`getSucursalesByID/${event.target.value}`, function(res, sta) {
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

           $.get(`getAreasByID/${event.target.value}`, function(res, sta) {
               res.forEach(element => {
                 $("#selectArea").append(`<option value=${element.id}> ${element.area} </option>`);
                 $('select#selectArea').material_select();
               })
           });
       });
});
