<html>
<!-- 

WHAT IS THIS FILE FOR?
    |->THIS IS THE HTML PART TO REGISTER NEW USERS  
    |->IT IS CONNECTED TO -kontoadded.php-  
        |->IT SENDS THE INFORMATION FROM THE FORM TO THE OTHER FILE 
    |->IT ALSO HAS SOME JAVASCRIPTS THAT CHECKS IF confirmpassword VARIABLE IS THE SAME AS password
            
                                                                                -Jonathan Cilli
-->
    <head>
        <title>Add Users</title>    
        <link rel="script" href="js/js1.js">
		<link rel="stylesheet" type="text/css" href="Stylesheets/style_reg.css">
    </head>
    <body>
        
        <form action="kontoadded.php" method="post">
 
            <b>Registrera ny användare:</b>
                
            <p>Username:
                <input type="text" name="username" size="30" value="" />
            </p>
            
            <p>Password:
                <input type="password" name="password" size="30" value="" id ="newpass" />
            </p>
 
            <p>Confirm Password:
                <input type="password" name="confirmpassword" size="30" value="" id ="confirmpass"  />
            </p>
            
            <p>Email:
                <input type="email" name="email" size="30" value="" />
            </p>
            
            <p>
                <input type="submit" name="submit" value="Send" />
            </p>
        </form> 
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script> 
        
    <script>
    function checkPasswordMatch() {
        var password = document.getElementById('newpass').value;
        var confirmPassword = document.getElementById('confirmpass').value;

        if (password != confirmPassword)
            document.getElementById("confirmpass").style.border = "2px solid red";
        else
            document.getElementById("confirmpass").style.border = "2px solid chartreuse";
    }

    $(document).ready(function () {
        $("#newpass, #confirmpass").keyup(checkPasswordMatch);
    });
    </script>    
    
        <!-- SESSION AND COOKIE -->
    <?php
        require_once('/Php/checkcookie.php');
        session_start();
        
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
            header('Location: /Php/Inside/welcome.php'); // <-- WHAT TO DO IF LOGIN IS SUCCESFUL
	   		exit;
        }else if(isset($_COOKIE['starname']) and isset($_COOKIE['starpass'])){
            header('Location: /Php/Inside/welcome.php'); // <-- WHAT TO DO IF LOGIN IS SUCCESFUL
	   		exit;
        }else{
            echo "Please log in first to see this page.";
        }
    ?>
</body>
</html>