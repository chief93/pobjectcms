function update_div(target,action){
	$.get('ajax.php', {module: target, action: action}, function (data) {$('#'+target).html(data);});
}