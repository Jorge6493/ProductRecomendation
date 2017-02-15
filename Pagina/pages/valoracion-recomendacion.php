<?php
   include('config.php');
   session_start();
   
   $user_check = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($db,"select username from usuario where username = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['username'];

   echo "Username Logged: ".$login_session;

   if(isset($_POST['button1']))
   {

   	$sql = "select id from usuario where username = '$login_session'";
   	$result = mysqli_query($db,$sql);
   	$row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   	$idUsuario = $row['id'];


   	$sql = "insert into ";
   	$result = mysqli_query($db,$sql);



   }


   
   if(!isset($_SESSION['login_user'])){
      header("location:login-register.php");
   }
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!--
Template Name: PhotoProwess
Author: <a href="http://www.os-templates.com/">OS Templates</a>
Author URI: http://www.os-templates.com/
Licence: Free to use under our free template licence terms
Licence URI: http://www.os-templates.com/template-terms
-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Trinitarias Films</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" href="../layout/styles/layout.css" type="text/css" />
<script type="text/javascript" src="../layout/scripts/jquery.min.js"></script>
<script type="text/javascript" src="../layout/scripts/jquery.ui.min.js"></script>
<script type="text/javascript" src="../layout/scripts/jquery.defaultvalue.js"></script>
<script type="text/javascript" src="../layout/scripts/jquery.scrollTo-min.js"></script>
<!-- End Homepage Only Scripts -->
</head>
<body id="top">
<div class="wrapper col2">
  <div id="header" class="clear">
    <div>
      <h1><center> Valora tu pelicula favorita </center> </a></h1>
    </div>
  </div>
</div>
<!-- ####################################################################################################### -->   

<div class="wrapper col4">
  <div id="container" class="clear"> 
  <!-- Pelicula 1 -->
  <img src="../images/movies/pelicula1.gif" width="200" height="300"> 
    <form action="demo_form.asp" method="POST"> 
            <input for = "button1" type="text" name="movie1" id="movie1" >
            <input name = "button1" id = "button1" type="submit" value="Valorar" > 
    </form>
<br>

  <!-- Pelicula 2 -->
   <img src="../images/movies/pelicula2.jpg" width="200" height="300">
    <form action="demo_form.asp"  method="POST">
            <input for = "button2" type="text" name="movie2" >
             <input name = "button2" id = "button2" type="submit" value="Valorar" > 
    </form>
<br>
  <!-- Pelicula 3 -->
   <img src="../images/movies/pelicula3.jpg" width="200" height="300" >
    <form action="demo_form.asp"  method="POST">
            <input for = "button3" type="text" name="movie3" >
            <input name = "button3" id = "button2" type="submit" value="Valorar" > 
    </form>

  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper">
  <div id="copyright" class="clear">
    <p class="fl_left">Copyright &copy; 2017 - All Rights Reserved - <a href="#">Domain Name</a></p>
  </div>
</div>
</body>
</html>