function admin_register_click(){
	data=parse_form('mod_admin_register');
	$.get('/ajax.php', {module: 'mod_admin_register', action: 'hello', 'array': data},function(data){
	//	switch(data){
	//		case "1": window.location.reload(); break;
	//		default: $("#auth_error").html("<span style='color:red;'>" + data + "</span>");
	//	}
		alert(data);
	});
	return false;
}
