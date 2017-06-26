$(document).ready(function() {

	$('.timepicker').pickatime({
		// Escape any “rule” characters with an exclamation mark (!).
		format: '!Hor!a Selecc!ion!ad!a: h:i a',
		formatLabel: '<b>h</b>:i <!i>a</!i>',
		formatSubmit: 'HH:i',
		hiddenPrefix: 'prefix__',
		hiddenSuffix: '__suffix'
	})

});
