<?php 

// mySQLi or PDO - php data object, my structured query language imporve
// connect to database
$conn = mysqli_connect('localhost', 'shaun', 'test1234', 'ninja_pizza');

if(!$conn){
    echo 'connection error: ' . mysqli_connect();
}

// write query for all pizzas
$sql = 'SELECT title, ingredients, id FROM pizza';

// make query and get result
$result = mysqli_query($conn, $sql);

// fetch the resulting rows as an array 
$pizza = mysqli_fetch_all($result, MYSQLI_ASSOC); // saying we want this back as an associative array


mysqli_free_result($result); // this is freeing the resulting from memory

// close connection to the database
mysqli_close($conn);

print_r($pizza);



?>



<!DOCTYPE html>
<html lang="en">

<?php include('templates/header.php'); ?>

<?php include('templates/footer.php'); ?>



</body>
</html>