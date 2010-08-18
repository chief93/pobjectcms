function register_click(){
	$.get('ajax.php', {module: 'auth_register', action: 'reg_try',login:$('#register_login').val(),password:$('#register_password').val(),password2:$('#register_password2').val(),email:$('#register_email').val()},function(data){
		var txt="";
		switch(data){
			case "1": txt="Ошибка - введите логин";break;
			case "2": txt="Ошибка - введите пароль";break;
			case "3": txt="Ошибка - введите проверочный пароль";break;
			case "4": txt="Ошибка - введите email";break;
			case "5": txt="Ошибка - пароли не совпадают";break;
			case "6": txt="Введенный email некоррректный"; break;				
			case "0": window.location.reload(); break;
		}
		$("#register_error").html("<span style='color:red;'>" + txt + "</span>");
	});
	return false;
}