 <?php
	 define("svr", "localhost", true);
	 define("usr", "root", true);
 	 global $dbCon;
    $dbCon = mysqli_connect(svr,usr,'') AND 
	mysqli_select_db($dbCon ,"reson8") or die("Not able to connect to DB");
?>