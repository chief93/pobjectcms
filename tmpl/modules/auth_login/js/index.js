function auth_click(){
	$.get('ajax.php', {module: 'auth_login', action: 'auth_try',login:$('#auth_login').val(),password:$('#auth_password').val()},function(data){
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
