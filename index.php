<!DOCTYPE html>

<html>
	<head>
		<title>Login Page</title>
		<link rel="stylesheet" type="text/css" href="Stylesheets/style_loggin.css">
    </head>
	<body>
        
        
        <div id="menu">
            <img src="Picture/starlogo.png"/>
        </div>
		
        <div id="main_container">
			<div id="box">
                <form action="getuserinfo.php" method="POST">
				    <table>
                    <tr>
                        <th><p>Please login</p></th>
                    </tr>
                    <tr>
					   <th><input type="text" class="textin" name="user" placeholder="Username" autocomplete="off"/></th>
				    </tr>
				    <tr>
					   <th><input type="password" class="textin" name="pass" placeholder="Password" autocomplete="off"/></th>
				    </tr>
				    <tr>
                        <th><input type="submit" id="btn" name="Login" value="&nbsp&nbsp&nbsp Login &nbsp&nbsp&nbsp"/></th>
				    </tr>
					</table>
                </form>
            </div>
		</div>
        
        <div id="footer"></div>
        
	</body>
</html>