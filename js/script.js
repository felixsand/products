
$("document").ready(function() {
	
	$("form").submit(function(event) {
		
		var fail = "";
		fail += validateNotEmpty($(event.target.title).val());
		fail += validateNoNumbers($(event.target.title).val());
		fail += validateNotEmpty($(event.target.description).val());
		fail += validateNoHTML($(event.target.description).val());
		
		if (fail != "") {
			alert(fail);
			return false;
		}
	});
});

function validateNotEmpty(text) {
	if ($.trim(text) == "") {
		return "Text saknas\n";
		
	} else {
		return "";
	}
}

function validateNoNumbers(text) {
	if (/[0-9]/.test(text)) {
		return "Inga siffror\n";
		
	} else {
		return "";
	}
}

function validateNoHTML(text) {
	if (/<.*>/.test(text)) {
		return "Inga HTML tecken\n";
		
	} else {
		return "";
	}
}