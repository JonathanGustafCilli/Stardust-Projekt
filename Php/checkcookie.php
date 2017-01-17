<?php 

// CHECK COOKIE: CHECHS IF THE NECCESARY COOKIES TO SURPASS THE LOGGIN SITE ARE IN THE MACHINE

session_start();

if(isset($_COOKIE['starname']) and isset($_COOKIE['starpass'])){
        
        $userdust = trim($_COOKIE['starname']);
        $passdust = trim($_COOKIE['starpass']);
    
    //TAKEN FROM getuserinfo.php --> CHECKS IF PASSWORD AND USERNAME ARE CORRECT
    
    $dustvariabel = 0; 	
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
                
	   	if($row['username'] == $userdust && $passdust == $row['password']){
	   		$dustvariabel=2;
	   	}else{
	   		if($dustvariabel!=2){
	   			$dustvariabel=1;
	   		}
	   	}
	   }
	   	if($dustvariabel==2){
            echo "<script>alert('Halt')</script>";
	   	}else if($dustvariabel==1){
	   		echo "<p>OPS!</p>";
    		}
        
    } else { //Else if the query executed did not properly proceed
        
	   echo "Couldn't issue database query<br />";
	   echo mysqli_error($dbc);
    }
    // Close connection to the database
    mysqli_close($dbc);
}//CLOSE COOKIE CONDITION
    
?>      