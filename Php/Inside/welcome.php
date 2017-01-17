<html>
    <head>
        <title>Welcome</title>
    </head>
    <body>
    <?php
        
        require_once('/../checkcookie.php');
        
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
          echo "<h1>WELCOME " . $_SESSION['username'] . "!</h1>";  
            echo "
            <form action='welcome.php' method='POST'>
                <p>
                    If you wish to Logout --> 
                    <input type='submit' name='logout' value='&nbsp&nbsp&nbsp Logout &nbsp&nbsp&nbsp'/>
                </p>
            </form>";   
            
        }else if(isset($_COOKIE['starname']) and isset($_COOKIE['starpass'])){
            echo "<h1>WELCOME " . $_COOKIE['starname'] . "!</h1>";  
            echo "
            <form action='welcome.php' method='POST'>
                <p>
                    If you wish to Logout --> 
                    <input type='submit' name='logout' value='&nbsp&nbsp&nbsp Logout &nbsp&nbsp&nbsp'/>
                </p>
            </form>";     
        
        }else{
            echo "Please log in first to see this page.";
        }
        
        
    //WHEN LOGOUT IS PRESSED    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        if (isset($_POST['submit'])) {}
            session_start();
            session_destroy();
            session_unset(); 
            
            
                setcookie('starname', '', time()-300);
                setcookie('starpass', '', time()-300);        
                
            
            header('Location: ../../index.php'); // <-- WHAT TO DO IF LOGIN IS WRONG
	   		exit;
        
    }
    ?>
    </body>
</html>