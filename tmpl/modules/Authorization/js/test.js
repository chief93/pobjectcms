$(document).ready(function (){
    $("#auth_append").click(function() {
		$.get('ajax.php', {module: 'authorization', action: 'auth_try',login:$('#auth_login').val(),password:$('#auth_password').val()},function(data){
			var txt="";
			switch(data){
				case "1": txt="Ошибка - введите логин";break;
				case "2": txt="Ошибка - введите пароль";break;
				case "3": txt="Ошибка - неправильный логин или пароль";break;
				case "0": window.location.reload(); break;
			}
			$("#auth_error").html("<span style='color:red;'>" + txt + "</span>");
		});
		return false;
    });

    $("#register_append").click(function() {	
		alert('sadsad');
		$.get('ajax.php', {module: 'authorization', action: 'reg_try',login:$('#register_login').val(),password:$('#register_password').val(),password2:$('#register_password2').val(),email:$('#register_email').val()},function(data){
			var txt="";
			switch(data){
				case "1": txt="Ошибка - введите логин";break;
				case "2": txt="Ошибка - введите пароль";break;
				case "3": txt="Ошибка - введите проверочный пароль";break;
				case "4": txt="Ошибка - введите email";break;
				case "4": txt="Ошибка - пароли не совпадают";break;				
				case "0": window.location.reload(); break;
			}
			$("#register_error").html("<span style='color:red;'>" + txt + "</span>");
		});
		return false;
    });
});


