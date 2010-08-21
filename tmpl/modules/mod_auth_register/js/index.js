function register_click(){
	data=parse_form('mod_auth_register');
	$.get('/ajax.php', {module: 'mod_auth_register', action: 'reg_try', 'array': data},function(data){
		switch(data){
			case "0": window.location.reload(); break;
			default: $("#register_error").html("<span style='color:red;'>" + data + "</span>");
		}
	});
	return false;
}