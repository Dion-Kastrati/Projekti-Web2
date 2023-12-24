fetch("https://quotes15.p.rapidapi.com/quotes/random/" ,  {
    method: 'GET',
    	headers: {
    		'X-RapidAPI-Key': '59f3abd60dmsh0d1061d78acbcb7p1fee2ejsndb1d0d2dc960',
    		'X-RapidAPI-Host': 'quotes15.p.rapidapi.com'
    	}
})

.then(response => response.json())
.then(response => {
    console.log(response);
    console.log(response.content);
    document.getElementById('quote').innerHTML = response.content;
    document.getElementById('author').innerHTML = '- ' + response.originator.name + ' -';
})
.catch(err => {
    console.log(err);
});