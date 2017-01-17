<?php

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Require password hashing class
    require_once('/kryptera.php');
    
    // TEST: 
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $bool = false;
    // Instantiate new instance of class
    $hash_password = new Hash_Password();
    
    $variabel = 0; 	
    // Get a connection for the database
    require_once('/../../../mysqli_connect.php');
 
    // Create a query for the database
    $query = "SELECT username, password FROM users";
 
    // Get a response from the database by sending the connection
    // and the query
    $response = @mysqli_query($dbc, $query);
 
    // If the query executed properly proceed
    if($response){
	   //echo '<p><b>WELCOME:</b></p>';
	   while($row = mysqli_fetch_array($response)){
           
        // Verify the crypted password in the database and give back false or true
        $bool = $hash_password->verify($pass, $row['password']);  
           
	   	//echo '<p>' . $row['username'] . '<br>' . $row['password'] . '</p>';
	   	if($row['username'] == $user && $bool==true){
	   		$variabel=2;
            $password2 = $row['password'];
	   	}else{
	   		if($variabel!=2){
	   			$variabel=1;
	   		}
	   	}
	   }
	   	if($variabel==2){
	   		if( isset($_POST['remember'])){
                setcookie('starname',$user,time()+60*60*7, "/");   
                setcookie('starpass',$password2,time()+60*60*7, "/");
            }
             // SESSION 
             $_SESSION['loggedin'] = true;
             $_SESSION['username'] = $user;
            
            header('Location: Inside/welcome.php'); // <-- WHAT TO DO IF LOGIN IS SUCCESFUL
	   		exit; 
            
            
	   	}else if($variabel==1){
	   		//echo '<p>ERROR! --> </p>'; echo $variabel;
	   		header('Location: ../index.php'); // <-- WHAT TO DO IF LOGIN IS WRONG
	   		exit;
	   		
	   		/*echo "<script>
	   			window.location.href = 'login/index.html';
	   		</script>;*/
    		}
    } else {
	
	   echo "Couldn't issue database query<br />";
	   echo mysqli_error($dbc);
    }
 
    // Close connection to the database
    mysqli_close($dbc);
    }else {
    // Not a POST request, set a 403 (forbidden) response code.
        http_response_code(403);
        echo "There was a problem with your submission, please try again.";
    }
?>