$(document).ready(function() {

  $('.timepicker').pickatime({
    //formato de envio
    formatSubmit: 'HH:i',
    hiddenName: true,
    // Close on a user action
    closeOnSelect: true,
    closeOnClear: false
  });

});
