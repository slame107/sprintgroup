function validateForm()
{
	if(validateMajor() && validateGrade() && validatePizzaToppings())
		return true;
	else
	{
		alert("Please enter all required information for the survey!");
		return false;
	}
}

function validateMajor() {
	var checked=false;
	var elements = document.getElementsByName("major[]");
	for(var i=0; i < elements.length; i++){
		if(elements[i].checked) {
			checked = true;
		}
	}
	return checked;
}

function validateGrade() {
	var checked=false;
	var elements = document.getElementsByName("grade");
	for(var i=0; i < elements.length; i++){
		if(elements[i].checked) {
			checked = true;
		}
	}
	return checked;
}

function validatePizzaToppings() {
	var checked=false;
	var elements = document.getElementsByName("topping");
	for(var i=0; i < elements.length; i++){
		if(elements[i].checked) {
			checked = true;
		}
	}
	return checked;
}