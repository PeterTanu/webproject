
$(document).ready(function(){
	$('input[type="checkbox"]').click(function(){
		if($(this).prop("checked") == true){
			document.body.style.background = "white";
		}
		else if($(this).prop("checked") == false){
			document.body.style.background = "DarkGrey";
		}
	});
});
