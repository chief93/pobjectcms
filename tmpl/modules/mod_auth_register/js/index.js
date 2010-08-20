function register_click(){
	data=parse_form('mod_auth_register');
	$.get('/ajax.php', {module: 'mod_auth_register', action: 'reg_try', 'array': data},function(data){
		alert(data);
	});
	return false;
}
function parse_form (form) {
    var form_arr= new Object();
    $("#"+form + " input[type!='submit']").each(function () {    
	form_arr[this.id]=this.value;
    });
    return form_arr;
}