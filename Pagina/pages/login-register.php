<?php
   include("config.php");
   
   session_start();

   if(isset($_POST['signIn'])) {
      // username and password sent from form       
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']);
      
      $sql = "SELECT UserName FROM Users WHERE UserName = '$myusername' and UserPass = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
        
      if($count == 1) {
         $_SESSION['login_user'] = $myusername;
         
         header("location: valoracion-recomendacion.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
    }

    elseif(isset($_POST['signUP'])) {
      // username and password sent from form       
      $myusername = mysqli_real_escape_string($db,$_POST['usernamesignup']);
      $mypassword = mysqli_real_escape_string($db,$_POST['passwordsignup']); 
      $myemail    = mysqli_real_escape_string($db,$_POST['emailsignup']); 
      
      $sql = "INSERT into Users (UserName,UserPass,UserEmail) values ('$myusername','$mypassword','$myemail')";
      
      $result = mysqli_query($db,$sql);

      header("location: ../index.html");

   }


?>
<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6 lt8"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7 lt8"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8 lt8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="UTF-8" />
        <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  -->
        <title>Login and Registration</title>
        <link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="../css/demo.css" />
        <link rel="stylesheet" type="text/css" href="../css/style.css" />
		<link rel="stylesheet" type="text/css" href="../css/animate-custom.css" />
    </head>
    <body>
        <div class="container">
            <!-- Codrops top bar -->
            <div class="codrops-top">
            
                <span class="right">
                </span>
                <div class="clr"></div>
            </div><!--/ Codrops top bar -->
            <header>
        
            </header>
            <section>				
                <div id="container_demo" >
                    <!-- hidden anchor to stop jump http://www.css3create.com/Astuce-Empecher-le-scroll-avec-l-utilisation-de-target#wrap4  -->
                    <a class="hiddenanchor" id="toregister"></a>
                    <a class="hiddenanchor" id="tologin"></a>
                    <div id="wrapper">
                        <div id="login" class="animate form">
                            <form  action="" autocomplete="on" method="POST" > 
                                <h1>Log in</h1> 
                                <p> 
                                    <label for="username" class="uname" data-icon="u" > Your email or username </label>
                                    <input id="username" name="username" required="required" type="text" placeholder="myusername or mymail@mail.com"/>
                                </p>
                                <p> 
                                    <label for="password" class="youpasswd" data-icon="p"> Your password </label>
                                    <input id="password" name="password" required="required" type="password" placeholder="eg. X8df!90EO" /> 
                                </p>
                                <p class="keeplogin"> 
									               <input type="checkbox" name="loginkeeping" id="loginkeeping" value="loginkeeping" /> 
									               <label for="loginkeeping">Keep me logged in</label>
								                </p>
                                <p class="login button"> 
                                    <input  name="signIn" type="submit" value=" Submit" /> 
                                    <a href = "#tologin" class = "login button">

								                </p>
                                <p class="change_link">	Not a member yet ?
									                   <a href="#toregister" class="to_register">Join us</a>
								                </p>
                            </form>
                        </div>

                        <div id="register" class="animate form">
                            <form  action="" autocomplete="on" method="post"> 
                                <h1> Sign up </h1> 
                                <p> 
                                    <label for="usernamesignup" class="uname" data-icon="u">Your username</label>
                                    <input id="usernamesignup" name="usernamesignup" required="required" type="text" placeholder="mysuperusername690" />
                                </p>
                                <p> 
                                    <label for="emailsignup" class="youmail" data-icon="e" > Your email</label>
                                    <input id="emailsignup" name="emailsignup" required="required" type="email" placeholder="mysupermail@mail.com"/> 
                                </p>
                                <p> 
                                    <label for="passwordsignup" class="youpasswd" data-icon="p">Your password </label>
                                    <input id="passwordsignup" name="passwordsignup" required="required" type="password" placeholder="eg. X8df!90EO"/>
                                </p>
                                <p> 
                                    <label for="passwordsignup_confirm" class="youpasswd" data-icon="p">Please confirm your password </label>
                                    <input id="passwordsignup_confirm" name="passwordsignup_confirm" required="required" type="password" placeholder="eg. X8df!90EO"/>
                                </p>
                                <p class="signin button"> 
								              	   <input id="signUP" name = "signUP" type="submit" /> 
								                </p>
                                <p class="change_link">  
									                 Already a member ?
									               <a href="#tologin" class="to_register"> Go and log in </a>

								</p>
                            </form>
                        </div>
						
                    </div>
                </div>  
            </section>
        </div>
    </body>
</html>