<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // TEST: 
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $variabel = 0; 	
    // Get a connection for the database
    require_once('../../mysqli_connect.php');
 
    // Create a query for the database
    $query = "SELECT username, password FROM users";
 
    // Get a response from the database by sending the connection
    // and the query
    $response = @mysqli_query($dbc, $query);
 
    // If the query executed properly proceed
    if($response){
	   //echo '<p><b>WELCOME:</b></p>';
	   while($row = mysqli_fetch_array($response)){
	   	//echo '<p>' . $row['username'] . '<br>' . $row['password'] . '</p>';
	   	if($row['username'] == $user && $row['password'] == $pass){
	   		$variabel=2;
	   	}else{
	   		if($variabel!=2){
	   			$variabel=1;
	   		}
	   	}
	   }
	   	if($variabel==2){
	   		echo '<h1>WELCOME TO THE SITE!</h1>'; // <-- WHAT TO DO IF LOGIN IS SUCCESFUL
	   	}else if($variabel==1){
	   		//echo '<p>ERROR! --> </p>'; echo $variabel;
	   		header('Location: index.php'); // <-- WHAT TO DO IF LOGIN IS WRONG
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