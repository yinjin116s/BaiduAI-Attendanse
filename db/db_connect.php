<?php
/**
 * Created by IntelliJ IDEA.
 * User: jin
 * Date: 2018/1/30
 * Time: 15:45
 * PLEASE CHANGE THE SERVERNAME USERNAME PASSWORD and DATABASE FOR BACKEND OPERATION
 */
$servername = "localhost";
$username = "USERNAME";
$password = "PASSWORD";
$dbname = "DATABASE";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}
else
{
   //echo("done");
}
//INSERT INTO `490_users` (`uid`, `user`, `pass`, `admin`) VALUES (NULL, 'user', '123456', '1');
?>
