document.addEventListener('DOMContentLoaded', function(){
	"use strict";
	if (document.formvalidator) {
		document.formvalidator.setHandler('letter', function (value) {

			var returnedValue = false;

			var regex = /^([a-z]+)$/i;

			if (regex.test(value))
				returnedValue = true;

			return returnedValue;
		});
		//console.log(document.formvalidator);
	} 
});
