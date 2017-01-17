<?php
 
// Require password hashing class
require_once('/kryptera.php');      
    
if(isset($_POST['submit'])){
    
    if($_POST['password'] == $_POST['confirmpassword']){//CHECKS IF PASSWORD IS THE SAME AS CONFIRMPASSWORD
    
    $data_missing = array();
    
    if(empty($_POST['username'])){
 
        // Adds name to array
        $data_missing[] = 'Username';
 
    } else {
 
        // Trim white space from the name and store the name
        $f_name = trim($_POST['username']);
 
    }
        
    
    if(empty($_POST['password'])){
 
        // Adds name to array
        $data_missing[] = 'Password';
 
    } else{
 
        // Trim white space from the name and store the name
        $p_name = trim($_POST['password']);
        
        // Instantiate new instance of class
        $hash_password = new Hash_Password();
        // Hash a password
        $hash = $hash_password->hash($p_name);
    }
    
    if(empty($_POST['email'])){
 
        // Adds name to array
        $data_missing[] = 'Email';
 
    } else {
 
        // Trim white space from the name and store the name
        $e_name = trim($_POST['email']);
 
    }
 
    
    if(empty($data_missing)){
        
        require_once('../../../mysqli_connect.php');
        
        $query = "INSERT INTO users (username, password, email) VALUES (?, ?, ?)";
        
        $stmt = mysqli_prepare($dbc, $query);
        
        mysqli_stmt_bind_param($stmt, "sss", $f_name, $hash, $e_name);
        
        mysqli_stmt_execute($stmt);
        
        $affected_rows = mysqli_stmt_affected_rows($stmt);
        
        header('Location: ../nykund.php'); // <-- WHAT TO DO IF PASSWORDCONFIRM DOES NOT MATCH
        exit;
        
        if($affected_rows == 1){
            
            echo 'User Entered';
            
            mysqli_stmt_close($stmt);
            
            mysqli_close($dbc);
            
        } else {
            
            echo 'Error Occurred<br />';
            echo mysqli_error();
            
            mysqli_stmt_close($stmt);
            
            mysqli_close($dbc);
            
        }
        
    } else {
        
        echo 'You need to enter the following data<br />';
        
        foreach($data_missing as $missing){
            
            echo "$missing<br />";
            
        }   
    } 
    }else{
    header('Location: nykonto.php'); // <-- WHAT TO DO IF PASSWORDCONFIRM DOES NOT MATCH
    exit; 
}
}  
?>