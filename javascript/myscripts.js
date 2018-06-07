
function validateRegister() {
	if(checkUserLength())
		if(checkPasswordLength())
			if(checkValidPassword())
				if(passwordsMatch())
					if(validateZip())
						if(checkZipcodeLength())
							if(validatePhone())
								alert("Success!");
}

function checkUserLength(){
	var x = document.getElementById("userName").value.length;
	
	if(x < 6){
		alert("Username must be at least 6 characters");
		return false;
	}
	return true;
}

function checkPasswordLength(){

	var x = document.getElementById("password").value.length;
	if(x < 8 ){
		alert("Password must be at least 8 characters");
		return false;	
	}
	return true;
}

function checkSpecialChars(str){
	if(/^[a-zA-Z0-9- ]*$/.test(str) == false) {
  		return true;
	}else{
		return false;
	}	
}

function checkValidPassword(){

	var x = document.getElementById("password").value;
	
	var len = x.length;
	
	var lowerPresent = 0;
	var upperPresent = 0;
	var digitPresent = 0;
	var specialChar = 0;

	for(i=0; i < len; i++){
	
		if(x[i] == x[i].toLowerCase())
			lowerPresent = 1;
		if(x[i] == x[i].toUpperCase())
			upperPresent = 1;
		if(!isNaN(x[i]))
			digitPresent = 1;
		if(checkSpecialChars(x[i]))
			specialChar = 1;
	}
		if(!lowerPresent){
			alert("Password must have a lowercase letter");
			return false;
		}else if(!upperPresent){
			alert("Password must have an uppercase letter");
			return false;
		}else if(!digitPresent){
			alert("Password must have an digit character");
			return false;
		}else if(!specialChar){
			alert("Password must have a special character");
			return false;
		}
		return true;
}

function passwordsMatch(){

	var password = document.getElementById("password").value; 
	var repassword = document.getElementById("repassword").value;
	if(password != repassword){
		alert("Passwords don't match");
		return false;
	}
	return true;
}

function checkZipcodeLength(){
	var x = document.getElementById("zipcode").value.length;
	if(x < 5){
		alert("Zipcode must be at least 5 characters");
		return false;	
	}
	return true;
}

function resetAllFields(){
	location.reload();
}


function validatePhone(){
	var x = document.getElementById("phone").value;
	
	var len = x.length;
	
	for(i=0; i<len;i++){
		if(Nan(x[i])){
			alert("Please only enter numbers for phone number");
			return false;
		}
	}
	return true;
}

function validateZip(){
	var x = document.getElementById("zipcode").value;
	
	var len = x.length;
	
	for(i=0; i<len;i++){
		if(Nan(x[i])){
			alert("Please only enter numbers for zipcode");
			return false;	
		}
	}
	return true;
}




