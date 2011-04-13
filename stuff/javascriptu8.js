


$(document).ready(function(){

	$("input[name=uid]").keyup(function(){
	
		var username = $("input[name=uid]").val();
		
		if(username.length > 7) {
			$.get('person_free.php?uid=' + username, function(user_free) {
				if (user_free == "1") {
				
					$('#user_free').html(' Der Name ist noch frei...');
				} else {
				
					$('#user_free').html('  Der Name ist bereits vergeben...');
				}
			}); 
		} else {
		
			$('#user_free').html('  Der Name muss 8 Zeichen haben...');
		}
	});
});


