<?php
$servername="localhost";
$username="root";
$password="";
$database="affiliate_management";
//create connection
$conn=new mysqli($servername,$username,$password,$database);
//check connection
if(mysqli_connect_errno()){  
    die("Connection failed ". mysqli_connect_error());
}

?>