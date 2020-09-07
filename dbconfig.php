<?php 

 $host='localhost';
 $db='esewaphp';
 $user='20nu';
 $pass='20nu';

 $conn=new mysqli($host,$user,$pass,$db);
 if($conn->connect_error){
 	echo "failed to connect mySQL".$conn->connect_error;
 	exit;
 }

 ?>