function register_click(){
	$.get('ajax.php', {module: 'authorization', action: 'reg_try',login:$('#register_login').val(),password:$('#register_password').val(),password2:$('#register_password2').val(),email:$('#register_email').val()},function(data){
		var txt="";
		switch(data){
			case "1": txt="������ - ������� �����";break;
			case "2": txt="������ - ������� ������";break;
			case "3": txt="������ - ������� ����������� ������";break;
			case "4": txt="������ - ������� email";break;
			case "4": txt="������ - ������ �� ���������";break;				
			case "0": window.location.reload(); break;
		}
		$("#register_error").html("<span style='color:red;'>" + txt + "</span>");
	});
	return false;
}

function auth_click(){
	$.get('ajax.php', {module: 'authorization', action: 'auth_try',login:$('#auth_login').val(),password:$('#auth_password').val()},function(data){
		var txt="";
		switch(data){
			case "1": txt="������ - ������� �����";break;
			case "2": txt="������ - ������� ������";break;
			case "3": txt="������ - ������������ ����� ��� ������";break;
			case "0": window.location.reload(); break;
		}
		$("#auth_error").html("<span style='color:red;'>" + txt + "</span>");
	});
	return false;
}


function auth_exit(){
	$.get('ajax.php', {module: 'authorization', action: 'logout'},function(data){
		window.location.reload();
	});
	return false;
}