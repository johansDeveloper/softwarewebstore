<?php

session_start();

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', ' ');
define('DB_DATABASE', 'store_db');

$db = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

if (isset($_POST['username']) && isset($_POST['password'])) {
// username and password sent from Form
    $username = mysqli_real_escape_string($db, $_POST['username']);
//Here converting passsword into MD5 encryption. 
    $password = md5(mysqli_real_escape_string($db, $_POST['password']));

    $result = mysqli_query($db, "SELECT id FROM login WHERE user='$username' and pwd='$password'");
    $count = mysqli_num_rows($result);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
// If result matched $username and $password, table row  must be 1 row
    if ($count == 1) {
        $_SESSION['login_user'] = $row['id']; //Storing user session value.
        echo $row['id'];
    }
}