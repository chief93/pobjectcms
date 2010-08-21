function register_click(){
	data=parse_form('mod_auth_register');
	$.get('/ajax.php', {module: 'mod_auth_register', action: 'reg_try', 'array': data},function(data){
		alert(data);
	});
	return false;
}