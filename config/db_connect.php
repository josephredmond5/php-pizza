<?php 

// mySQLi or PDO - php data object, my structured query language imporve
// connect to database
$conn = mysqli_connect('localhost', 'shaun', 'test1234', 'ninja_pizza');

if(!$conn){
    echo 'connection error: ' . mysqli_connect();
}

?>