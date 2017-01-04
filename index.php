<!DOCTYPE html>

<html>
	<head>
		<title>Login Page</title>
		<!--<link rel="stylesheet" type="text/css" href="style.css">-->
	
        
        <style>
            
            body, p{
                padding: 0;
                margin: 0;
            }
            
            #menu{
                    background-color: #f7f7f9;
                    height: 10vh;
                    width: 100vw;
                    padding: 0;
                    margin: 0;
            }
            
            #main_container{
                    background-image: url(Picture/bg.jpg); 
                    background-size: cover;
                    height: 80vh;
                    width: 100vw; 
                    padding: 0;
                    margin: 0;
   
            }
            
            #footer{
                    background-color: #222222 ;
                    height: 10vh;
                    width: 100vw;
                    padding: 0;
                    margin: 0;
            }
            
            #box{   
                    position: relative;
                    top: 10vw;
                    background-color: white ;
                    height: 30vh;
                    width: 22vw;
                    padding: 0;
                    margin: auto;
                    border: 0.5vw solid rgba(255, 255, 255, .5);
                    border-radius: 1vw;
                    -webkit-background-clip: padding-box; /* for Safari */
                    background-clip: padding-box; 
            }
            
            p{
                    font-size: 1.5vw;
                    font-weight: normal;
                    color: #222;
                    margin-bottom: 1vw;
                    margin-top: 0.5vw;        
            }
            
            table{
                    width: 95%;
                    margin: auto;
            }
            
            img{
                    height: 70%;
                    width: auto;
                    margin-left: 5vw;
                    margin-top: 1.5vh;
            }
            
            
            #btn{
                    background-color: #428bca;
                    color: white;
                    width: 70%; 
                    border: 0.1vw solid #428bca;
                    border-radius: 0.25vw;
                    margin-top: 1vw;
                    padding-top: 0.15vw;
                    padding-bottom: 0.15vw;
            }
            
            .textin{
                    width: 85%;
                    padding-top: 0.25vw;
                    padding-bottom: 0.25vw;
            }
        </style>
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