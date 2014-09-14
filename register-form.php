  
	  <form name="register" onSubmit="return validateRegister()" method="post">
	  <table>
	    <tr id="username-row">
	      <td>Email:</td>
	      <td><input type="text" name="email" /></td>
	      <td id="error-email"></td>
	    </tr>
	    <tr>
	      <td>Password:</td>
	      <td><input type="password" name="password" /></td>
	      <td id="error-password"></td>
	    </tr>
	    <tr id="password-row">
	      <td>Confirm Password:</td>
	      <td><input type="password" name="password-confirm"/></td>
	      <td id="error-passconfirm"></td>
	    </tr>
	    <tr id="tos-row">
	      <td colspan="2">
	        <input type="checkbox" name="agree-tos" /> <a href="<?php echo $root ?>tos.php">Agree to Terms of Service</a>
	      </td>
	      <td id="error-tos"></td>
	    </tr>
	    <tr id="coppa-row">
	      <td colspan="2">
	        <input type="checkbox" name="agree-coppa" /> <a href="<?php echo $root ?>coppa.php">I am 13 years old or older.</a>
	      </td>
	      <td id="error-coppa"></td>
	    </tr>
	    <tr>
	      <td colspan="3">
		  	<input type="hidden" name="action" value="VALID" />
	        <input type="submit" value="Submit" />
	      </td>
	    </tr>
	  </table>
	  </form>