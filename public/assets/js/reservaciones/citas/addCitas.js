$(document).ready(function() {

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

      $("#Selectores").hide();
      $("#calendar").show();
      $("#btn-back-calendar").show();
  });

  $("#btn-back-calendar").on('click', function(){
      $("#Selectores").show();//mostrar area de Selectores
      $("#calendar").hide();//ocultar calendario
      $("#Sucursal").hide();//ocultar select selectSucursal
      $("#Area").hide();//ocultar selct selectArea
      $("#btn-back-calendar").hide();
  });
});
