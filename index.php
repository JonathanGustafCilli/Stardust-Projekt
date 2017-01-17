<!DOCTYPE html>

<html>
	<head>
		<title>Login Page</title>
		<link rel="stylesheet" type="text/css" href="Stylesheets/style_log.css">
    </head>
	<body>
        
        
        <div id="menu">
            <img src="Picture/starlogo.png"/>
        </div>
		
        <div id="main_container">
			<div id="box">
                <form action="Php/getuserinfo.php" method="POST">
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
					   <th style=""><input type="checkbox"  name="remember"/>Remember Me</th>
				    </tr>    
				    <tr>
                        <th><input type="submit" id="btn" name="Login" value="&nbsp&nbsp&nbsp Login &nbsp&nbsp&nbsp"/></th>
				    </tr>
					</table>
                </form>
                <a href="javascript:AlertIt();">
                    <p style="font-size:0.9vw; text-align: center; color: blue">Glömt lösernod</p>
                </a>
            </div>
		</div>
        <div id="footer"></div>
        <?php  
        require_once('/Php/checkcookie.php'); 
        
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
            header('Location: Php/Inside/welcome.php'); // <-- WHAT TO DO IF LOGIN IS SUCCESFUL
	   		exit;
        }else if(isset($_COOKIE['starname']) and isset($_COOKIE['starpass'])){
            header('Location: Php/Inside/welcome.php'); // <-- WHAT TO DO IF LOGIN IS SUCCESFUL
	   		exit;
        }else{
        }

        
        ?>
    </body>
</html>