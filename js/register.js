/*****************************************
 *                PANACEA                *
 *           REGISTRATION PAGE           *
 *         JAVASCRIPT  FUNCTIONS         *
 *=======================================*
 *                                       *
 *   DEVELOPED BY: LEANA BOUSE           *
 *   LAST UPDATED: 11/17/2012            *
 * ..................................... *
 *                                       *
 * FUNCTIONS:                            *
 *                                       *
 * validateForm()                        *
 *   returns                             *
 * validate(event, 'input name')         *
 *   returns                             *
 *****************************************/
 
 
 /***************************************
  * VALIDATE FORM                       *
  *-------------------------------------*
  * Checks to make sure the entire form *
  * contains correct data.              *
  ***************************************/
 
function validateRegister()
{
	var allClear = true;
	
	/*input name, error td id, error boolean, error message*/
	var errorDivs = 
		[
			["email", "error-email", ""],
			["password", "error-password", ""],
			["password-confirm", "error-passconfirm", ""],
			["agree-tos", "error-tos", ""],
			["agree-coppa", "error-coppa", ""]
		];
		
	var email, password, passwordConfirm, tos, coppa, errElement;
	
	email = document.getElementsByName(errorDivs[0][0])[0];	
	password = document.getElementsByName(errorDivs[1][0])[0];
	passwordConfirm = document.getElementsByName(errorDivs[2][0])[0];
	tos = document.getElementsByName(errorDivs[3][0])[0];
	coppa = document.getElementsByName(errorDivs[4][0])[0];
	
	/* Reset error messages. */
	for(var i = 0; i < errorDivs.length; i++)
	{ document.getElementById(errorDivs[i][1]).innerHTML = ""; }
	
	//Check email
	if(email.value == "" || email.value == null )
	{
		allClear = false;
		errorDivs[0][2] = "Email is missing.<br />";
	}
	else{
		if(email.value.match(/^[a-zA-Z0-9_\-]+[\.]?[a-zA-Z0-9_\-]*[@]{1}[a-zA-Z0-9_\-]+[\.]?[a-zA-Z0-9_\-]*[.]{1}[a-zA-Z0-9_]+$/) == null){
			allClear = false;
			errorDivs[0][2] = "Email present but not valid.";
		}
		else{
			// errorDivs[0][2] = "Email present and valid!";
		}
	}
	
	//check password match
	if(password.value == "" || password.value == null)
	{
		allClear = false;
		errorDivs[1][2] = "Password is missing.<br />";
	}
	else{
		if(passwordConfirm.value == "" || password.value == null)
		{
			allClear = false;
			errorDivs[2][2] = "Please confirm password.<br />";
		}
		else{
			if(password.value != passwordConfirm.value)
			{
				allClear = false;
				errorDivs[2][2] = "Passwords do not match.<br />";
			}
			else{
				if(password.value.match(/^.*(?=.{6,})(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).*$/) == null)
				{ 
					allClear = false;
					errorDivs[2][2] = "Not a valid password.<br />"; 
				}
				// else{ errorDivs[2][2] = "alright, now we're talkin!<br />"; }
			}
		}
	}

	
	//check tos
	if(tos.checked != 1)
	{
		allClear = false;
		errorDivs[3][2] = "You must agree to the terms of service.";
	}
	else{
		// errorDivs[3][2] = "Thanks!";
	}
	
	//check coppa
	if(coppa.checked != 1)
	{
		allClear = false;
		errorDivs[4][2] = "You must be 13 years old or older to register.";
	}
	else{
		// errorDivs[4][2] = "Awesome!";
	}
	
	//Display error messages
	if( !allClear )
	{
		document.getElementById(errorDivs[0][1]).innerHTML = errorDivs[0][2];
		document.getElementById(errorDivs[1][1]).innerHTML = errorDivs[1][2];
		document.getElementById(errorDivs[2][1]).innerHTML = errorDivs[2][2];
		document.getElementById(errorDivs[3][1]).innerHTML = errorDivs[3][2];
		document.getElementById(errorDivs[4][1]).innerHTML = errorDivs[4][2];
	}
	
	return allClear;
}

function validateLogin()
{
	var allClear = true;
	var errorDivs = 
		[
			["email", "error-email", ""],
			["password", "error-password", ""]
		];
		
	var email, password;
	
	email = document.getElementsByName(errorDivs[0][0])[0];	
	password = document.getElementsByName(errorDivs[1][0])[0];
	
	/* Reset error messages. */
	for(var i = 0; i < errorDivs.length; i++)
	{ document.getElementById(errorDivs[i][1]).innerHTML = ""; }
	
	//Check email
	if(email.value == "" || email.value == null )
	{
		allClear = false;
		errorDivs[0][2] = "Email is missing.<br />";
	}
	else{
		// errorDivs[0][2] = "Email present!";
	}
	
	//Check password match
	if(password.value == "" || password.value == null)
	{
		allClear = false;
		errorDivs[1][2] = "Please enter password.<br />";
	}
	else{
		// else{ errorDivs[2][2] = "Password present!<br />"; }
	}
	
	//Display error messages
	if( !allClear )
	{
		document.getElementById(errorDivs[0][1]).innerHTML = errorDivs[0][2];
		document.getElementById(errorDivs[1][1]).innerHTML = errorDivs[1][2];
		document.getElementById("error-login").innerHTML = "Error in login.";
	}
	
	return allClear;
}

function clearLoginError()
{
	document.getElementById("error-login").innerHTML = errMsg;
}

function loginError(errMsg)
{
	document.getElementById("error-login").innerHTML = errMsg;
}