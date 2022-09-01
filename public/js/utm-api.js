function init (utm_source, utm_campaign) 
{
	fetch('http://localhost:8000/session_check/modify_check/', {
		method: 'POST',
		body: JSON.stringify({
    		utm_source : utm_source,
    		utm_campaign : utm_campaign
	}),
		headers: {
		'Content-type': 'application/json; charset=UTF-8'
		}
	}).then(function (response) {
		if (response.ok) {
			return response.json();
		}
		return Promise.reject(response);
	}).then(function (data) {
		console.log(data);
	}).catch(function (error) {
		console.warn('Error script', error);
	});
}

function purchase(number, sum, email, phone, status) 
{
	
	fetch('http://localhost:8000/deal/add/', {
		method: 'POST',
		body: JSON.stringify({
    		number : number,
    		sum : sum,
    		email : email,
    		phone : phone,
    		status : status
	}),
		headers: {
		'Content-type': 'application/json; charset=UTF-8'
		}
	}).then(function (response) {
		if (response.ok) {
			return response.json();
		}
		return Promise.reject(response);
	}).then(function (data) {
		console.log(data);
	}).catch(function (error) {
		console.warn('Error script', error);
	});
	 
}
