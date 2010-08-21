function update_div(target,action){
	$.get('ajax.php', {module: target, action: action}, function (data) {$('#'+target).html(data);});
}
function toggle(target,one){		
	if($('#'+one).html()){
		$("#" + target + " > div[type='"+target+"_main']").css('visibility','hidden');
		$("#" + target + " > div[type='"+target+"_main']").height('0');
		show(one);		
	}
	else{
		if(!$("div[type='"+target+"_main']").html()){
			$('#'+target).html("<div id='"+one+"' type='"+target+"_main'></div>");
		}
		else{
			$("#" + target + " > div[type='"+target+"_main']").css('visibility','hidden');
			$("#" + target + " > div[type='"+target+"_main']").height('0');
			$('#'+target).html($('#'+target).html()+"<div id='"+one+"' type='"+target+"_main'></div>")
		}

		$.get('ajax.php', {module: target, action: one}, function (data) {$('#'+one).html(data);});
	}
}
function parse_form (form) {
    var form_arr= new Object();
    $("#"+form + " input[type!='submit']").each(function () {    
	form_arr[this.id]=this.value;
    });
    return form_arr;
}