function register_click(){
	$.get('ajax.php', {module: 'auth_register', action: 'reg_try',login:$('#register_login').val(),password:$('#register_password').val(),password2:$('#register_password2').val(),email:$('#register_email').val()},function(data){
		var txt="";
		switch(data){
			case "1": txt="������ - ������� �����";break;
			case "2": txt="������ - ������� ������";break;
			case "3": txt="������ - ������� ����������� ������";break;
			case "4": txt="������ - ������� email";break;
			case "5": txt="������ - ������ �� ���������";break;
			case "6": txt="��������� email �������������"; break;				
			case "0": window.location.reload(); break;
		}
		$("#register_error").html("<span style='color:red;'>" + txt + "</span>");
	});
	return false;
}