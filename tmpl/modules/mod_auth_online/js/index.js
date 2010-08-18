function auth_exit(){
	$.get('/ajax.php', {module: 'mod_auth_online', action: 'logout'},function(data){
		window.location.reload();
	});
	return false;
}