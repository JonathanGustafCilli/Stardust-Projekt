<html>
    <head>
        <title>Add Users</title>    
        <link rel="script" href="js/js1.js">
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

</body>
</html>