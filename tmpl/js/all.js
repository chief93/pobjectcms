function update_div(target,action){
	$.get('ajax.php', {module: target, action: action}, function (data) {$('#'+target).html(data);});
}
function toggle(target,one,two,action){
	if($('#'+one).html()){
		hide(one);
		show(two);	
	}
	else{
		var temp1=$('#'+target).html();
		$('#'+target).html("<div id='"+one+"'>1</div><div id='"+two+"'>2</div>");	
		$('#'+one).html(temp1);
		hide(one);
		$.get('ajax.php', {module: target, action: two}, function (data) {$('#'+two).html(data);});
	}
}
function hide(target){
	$('#'+target).css('visibility','hidden');
	$('#'+target).height('0');
}
function show(target){
	$('#'+target).css('visibility','visible');
	$('#'+target).height('100%');
}