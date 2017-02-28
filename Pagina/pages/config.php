<?php
   define('DB_SERVER', 'localhost:3306');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', 'jorger');
   define('DB_DATABASE', 'ProductRecommendation');
   

   define('tbUsers' , 'Users');
   define('cmUserID' , 'UserID');
   define('cmUserName' , 'UserName');
   define('cmUserPass' , 'UserPass');
   define('cmUserEmail' , 'UserEmail');
   define('tbMovies' , 'Movies');
   define('cmMovieID' , 'MovieID');
   define('cmMovieTitle' , 'MovieTitle');
   define('tbRatings' , 'Ratings');
   define('cmRating' , 'RatingValue');

	$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
	$tbUsers = tbUsers;
	$cmUserID = cmUserID;
	$cmUserName = cmUserName;
	$cmUserPass = cmUserPass;
	$cmUserEmail = cmUserEmail;

	$tbMovies = tbMovies;
	$cmMovieID = cmMovieID;
	$cmMovieTitle = cmMovieTitle;
	
	$tbRatings = tbRatings;
	$cmRating = cmRating;
	/*
	 * $cmUserID
	 * $cmMovieID
	
	*/
?>