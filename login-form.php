	<div id="login-form">			
	<form name="login" onSubmit="return validateLogin()" method="post">
	<table>
		<tr>
			<td colspan="3" id="error-login"></td>
		</tr>
		<tr>
			<td><b>Email:</b></td>
			<td><input type="text" name="email" /></td>
			<td id="error-email"></td>
		</tr>
		<tr>
			<td><b>Password:</b></td>
			<td><input type="password" name="password" /></td>
			<td id="error-password"></td>
		</tr>
		<tr colspan="3">
			<td>
				<input type="hidden" name="action" value="VALID" />
				<input type="submit" value="Login" />
			</td>
		</tr>
	</table>
	</form>
	</div><!--END div.login-form-->