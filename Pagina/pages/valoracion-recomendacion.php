<?php
   include('config.php');
   session_start();
   
   $user_check = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($db,"select $cmUserName,$cmUserID from $tbUsers where $cmUserName = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row[$cmUserName];
   $idUsuario = (int)$row[$cmUserID];

   echo "Username Logged: ".$login_session;
   //echo " Pelicula: $idPelicula";

   if(!isset($_SESSION['login_user'])){
      header("location:login-register.php");
   }

   //Funcion para dar mensajes en la consola del browser
   function debug_to_console( $data ) {

    if ( is_array( $data ) )
        $output = "<script>console.log( 'Debug Objects: " . implode( ',', $data) . "' );</script>";
    else
        $output = "<script>console.log( 'Debug Objects: " . $data . "' );</script>";

    echo $output;
  }
  
  //Select box
  $get=mysqli_query($db,"SELECT $cmMovieTitle FROM $tbMovies");
  $option = '';
 while($row = mysqli_fetch_assoc($get))
  {
  	$option .= '<option value = "'.$row[$cmMovieTitle].'">'.$row[$cmMovieTitle].'</option>';
  }
  
  //enviar el valor
  if(isset($_POST['button1']))
  {
  	//Obtener el string de la pelicula
  	$pelicula =$_POST['selectList'];
  	
  	$valor = $_POST['Rating'];
  	//Busqueda y ejecucion para obtener el ID de la pelicula
  	$sql = mysqli_query($db,"SELECT $cmMovieID from $tbMovies where $cmMovieTitle = '$pelicula'");
  	$row = mysqli_fetch_array($sql,MYSQLI_ASSOC);
  	$idPelicula = (int)$row[$cmMovieID];
  	
  	//insertar a la base de datos
  	$sql = "INSERT into $tbRatings($cmUserID,$cmMovieID,$cmRating) values ($idUsuario,$idPelicula,$valor)";/*$idUsuario*/
  	$ins = mysqli_query($db,$sql);
  	
  }
  
  $queryRecommendation = "SELECT $cmMovieID,$cmRating FROM $tbRatings"; //You don't need a ; like you do in SQL
  $sqlRecommendation = mysqli_query($db,$queryRecommendation);
  
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
<style>
table, th, td {
    border: 1px solid black;
}
</style>
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
  <!-- Pelicula 1
  <img src="../images/movies/pelicula1.gif" width="200" height="300"> -->
    <form action="valoracion-recomendacion.php" method=post>
    Peliculas :<select id = "selectList" name="selectList">
	<?php echo $option; ?>
	</select>
	<br />
	<br />
            <!--<input for = "button1" type="text" name="movie1" id="movie1" > textfield-->
            <select name="Rating"><!-- Select Box-->
              <option selected>Select...</option>
              <option value="5">5</option>
              <option value="4">4</option>
              <option value="3">3</option>
              <option value="2">2</option>
              <option value="1">1</option>
            </select>
            <input name = "button1" id = "button1" type="submit" value="Valorar" >
            <?php 

            ?>
    <br />
	<br />
            
<!-- Display de la tabla -->
<table style="width:100%">
	<tr>
		<th>MovieID</th>
		<th>Rating</th>
	</tr>
	<?php 
	while($row = mysqli_fetch_array($sqlRecommendation,MYSQLI_ASSOC))
	{   //Creates a loop to loop through results
		echo "<tr><td>" . $row[$cmMovieID] . "</td><td>" . $row[$cmRating] . "</td></tr>";  //$row['index'] the index here is a field name
	} 
	?>

</table>

  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper">
  <div id="copyright" class="clear">
    <p class="fl_left">Copyright &copy; 2017 - All Rights Reserved - <a href="#">Domain Name</a></p>
  </div>
</div>
</body>
<?php 
	//print ("hola2 \n");
	mysqli_close(); //Make sure to close out the database connection 
?>
</html>