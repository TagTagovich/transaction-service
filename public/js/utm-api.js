function init()
{
	var imageUtm = document.createElement('img');
	var url = window. location. href;
	var queryString = url.split('?')[1];
	imageUtm.src  = 'http://localhost:8000/session_check/modify_check/?' + queryString;
	//console.log(queryString);
}

function purchase(number, sum, email, phone, status) 
{
	var paramsNames = [
		"name=",
		"sum=",
		"email=",
		"phone=",
		"status="	
	];
	var args = Array.prototype.slice.call(arguments);
	var args = [].slice.call(arguments);
	//console.log(args);
	var imageUtm = document.createElement('img');
	var separator = "&"
	var url = window. location. href;
	var queryString = url.split('?')[1];
	var arrayJoin = [];
	for (var i = 0; i < arguments.length; i++) {
    	if (i != arguments.length-1){
    		arrayJoin[i] = paramsNames[i] + arguments[i] + separator;
    	} else {
    		arrayJoin[i] = paramsNames[i] + arguments[i]
    	}
  	}
  	var paramsString = arrayJoin.join("");
  	//console.log(paramsString);
	imageUtm.src  = 'http://localhost:8000/deal/add/?' + paramsString;
	 
}

init();
//purchase();