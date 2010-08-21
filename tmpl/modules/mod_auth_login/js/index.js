function auth_click(){
	data=parse_form('mod_auth_login');
	$.get('/ajax.php', {module: 'mod_auth_login', action: 'auth_try', 'array': data},function(data){
		switch(data){
			case "1": window.location.reload(); break;
			default: $("#auth_error").html("<span style='color:red;'>" + data + "</span>");
		}
	});
	return false;
}