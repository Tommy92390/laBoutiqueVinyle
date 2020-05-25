document.addEventListener('DOMContentLoaded', function() {

	// mobile menu
	$('.sidenav').sidenav();

	//modal
	$('.modal').modal();

	//Datepicker
	$('.datepicker').datepicker();

	let today = new Date();
	let dd = today.getDate();
	let mm = today.getMonth() + 1; //January is 0!
	var yyyy = today.getFullYear();
	let hh = today.getHours();
	let min = today.getMinutes();

	if (dd < 10) {
	dd = '0' + dd;
	} 
	if (mm < 10) {
	mm = '0' + mm;
	}

	let defaultRef = yyyy + '/' + mm + '/' + dd;

	getSignings(defaultRef);

	let datepicker = document.getElementById('datepicker');

	datepicker.addEventListener('change', () => {
		console.log(datepicker.value);
		let dateRef = new Date(datepicker.value);
		let dateDay = dateRef.getDate();
		let dateMonth = dateRef.getMonth() + 1;
		const dateYear = dateRef.getFullYear();

		if (dateDay < 10) {
			dateDay = '0' + dateDay;
		} 
		if (dateMonth < 10) {
			dateMonth = '0' + dateMonth;
		}

		let newRef = dateYear + '/' + dateMonth + '/' + dateDay;

		getSignings(newRef);

	});

});

function getSignings(ref) {
	let signingContainer = $('#signingContainer');
	signingContainer.children('div').remove();
	firebase.database().ref(ref).once('value', (snapshot) => {
		snapshot.forEach(function(childSnapshot) {
		    var childKey = childSnapshot.key;
		    var childData = childSnapshot.val();
		    
		    let	signingDiv = document.createElement('div');
		    signingContainer.append(signingDiv);
		    let signingP = document.createElement('p');
		    signingP.innerHTML = childData.email + ' arrivé le ' + childData.time;
		    signingDiv.append(signingP);

		  });
	});
}