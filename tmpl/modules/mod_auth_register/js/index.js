function register_click(){
	massiv=parse_form('mod_auth_register');
	$.get('/ajax.php', {module: 'mod_auth_register', action: 'reg_try', 'massiv[]': massiv[]},function(data){
		alert(data);
	});
	return false;
}

function parse_form (form) {
    var form_arr=Array();
    var number=0;
    $('#'+form + ' input').each(function () {    
	form_arr[number]=Array();
        form_arr[number]['id']=this.id;
        form_arr[number]['value']=this.value;
        number++;
    });
    return form_arr;
}