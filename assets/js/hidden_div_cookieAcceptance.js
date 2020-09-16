$(() => {

	const cookieAcceptance = window.localStorage.getItem('cookieAcceptance');
	if (!cookieAcceptance) {
		$('#cookieAcceptance').show();
	} else {
		$('#cookieAcceptance').hide();
	}

});

$('#acceptCookies').click(()=>{
	$('#cookieAcceptance').hide();
	window.localStorage.setItem('cookieAcceptance', true);
});