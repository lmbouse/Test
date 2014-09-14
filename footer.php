    </div><!--END div.main-->
    <div id="footer">
        <center>SITE MAP <br />
		<table>
			<tr>
				<td class="right"><a href="<?php echo $root; ?>">HOME &nbsp;</a></td>
				<td class="left"><a href="<?php echo $root; ?>game"> &nbsp;GAME</a></td>
			</tr>
			<tr>
				<td class="right"><a href="<?php echo $root; ?>guide/howtoplay.php">HOW TO PLAY &nbsp;</a></td>
				<td class="left"><a href="<?php echo $root; ?>support/faq.php"> &nbsp;FAQ</a></td>
			</tr>
			<tr>
				<td class="right"><a href="<?php echo $root; ?>register.php">REGISTER &nbsp;</a></td>
				<td class="left"><a href="<?php echo $root; ?>login.php"> &nbsp;LOG IN</a></td>
			</tr>
			<tr>
				<td colspan="2"><center> &nbsp; &nbsp;<a href="<?php echo $root; ?>support/contact.php">CONTACT</a></center></td>
			</tr>
		</table>
        </center>
    </div><!--END div.footer-->

    <!--Stretch the menu to the full height of the main container.-->
    <script>
		var h = document.getElementById("main").style.height;
		h = h - 370;
		
		if( h > document.getElementById("menu").style.height)
        { 
			
			document.getElementById("menu").style.height = h + "px";
		}
		
    </script>

</body>
</html>
