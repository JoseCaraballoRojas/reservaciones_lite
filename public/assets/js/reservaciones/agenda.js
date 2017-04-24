/*
$("#selectEmpresa").on("change", function(event){
    $.get("getSucursalesByID/"+event.target.value+"",
      function(response, state){
        $('#selectSucursal').empty();
        for (i = 0; i < response.length; i++) {
          //console.log(response[i].sucursal);
            $('#selectSucursal')
         .append($("<option></option>")
         .attr("value",response[i].id)
         .text(response[i].sucursal));
        }
    });
});
*/
$("#selectEmpresa").change(event =>{
    $.get(`sucursal/getSucursalesByID/${event.target.value}`, function(res, sta) {
        $("#selectSucursal").empty();
        res.forEach(element => {
          console.log(element.sucursal);
          $("#selectSucursal").append(`<option value=${element.id}> ${element.sucursal} </option>`);
        })
    });
});
