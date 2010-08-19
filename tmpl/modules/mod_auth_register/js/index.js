function register_click(){
	data=parse_form('mod_auth_register');
	$.get('/ajax.php', {module: 'mod_auth_register', action: 'reg_try', 'array': data},function(data){
		alert(data);
	});
	return false;
}
function parse_form (form) {
    var form_arr=Array();
    var number=0;
    $("#"+form + " input[type!='submit']").each(function () {    
	form_arr[number]=Array();
	form_arr[number][0]=this.id;
	form_arr[number][1]=this.value;
        number++;
    });
    return form_arr;
}