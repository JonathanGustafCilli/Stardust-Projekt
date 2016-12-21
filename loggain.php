<html>
	<head>
	</head>
	<body>
	
		<form method="post"action="Php/mailer.php" id="ajax-contact">
			<table  id="contactForm">
				<tr class="inputArea">
					<td  class="label" style="background-color:#1abc9c;">
						<label>
							Namn:
						</label>
					</td>
					<td style="background-color:#16a085">
						<input id="name" name="name" auto-complete="on" required>
					</td>
				</tr>
				
				<tr>
					<td></td>
				</tr>
				
				<tr class="inputArea">
					<td  class="label" style="background-color:#e74c3c;">
						<label>
							Lösernord:
						</label>
					</td>
					<td style="background-color:#c0392b">
					<input id="password" name="password" type="password" required></td>
				</tr>
				
				<tr>
					<td></td>
				</tr>
				
				<tr class="inputArea">
					<td  class="label" style="background-color:#e67e22;">
						<label>
							<span id="humanLabel"></span>
						</label>
					</td>
					<td style="background-color:#d35400;"><input name="human" id="humanInput" autocomplete="off" required></td>
				</tr>
			</table> 
			
			<h2 id="form-messages">	</h2>
			<input id="submit" name="submit" type="submit" value="Skicka" class="submit">	
	
        </form>
		
	</body>
</html>
