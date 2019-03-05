function validate() {
        
		var majorCheckboxes = document.getElementsByClassName("major-checkbox")
		var gradeRadios = document.getElementsByClassName("grade-radio")
		var pizzaRadios = document.getElementsByClassName("pizza-radio")

		var majorChecked = false
		var gradeChecked = false
		var pizzaChecked = false
		
		
		for (var i = 0; i < majorCheckboxes.length; i++) {
			if (majorCheckboxes.item(i).checked) {
				majorChecked = true;
			}
		}
		
		for (var i = 0; i < gradeRadios.length; i++) {
			if (gradeRadios.item(i).checked) {
				gradeChecked = true;
			}
		}
		
		for (var i = 0; i < pizzaRadios.length; i++) {
			if (pizzaRadios.item(i).checked) {
				pizzaChecked = true;
			}
		}
		
		if (!majorChecked || !gradeChecked || !pizzaChecked) {
			alert("You missed a required field.");
			return false;
		}
		else {
			return true;
		}

}