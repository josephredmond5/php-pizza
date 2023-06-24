<?php 

// mySQLi or PDO - php data object, my structured query language imporve
// connect to database
$conn = mysqli_connect('localhost', 'shaun', 'test1234', 'ninja_pizza');

if(!$conn){
    echo 'connection error: ' . mysqli_connect();
}

// write query for all pizzas
$sql = 'SELECT title, ingredients, id FROM pizza ORDER BY created_at'; 

// make query and get result
$result = mysqli_query($conn, $sql);

// fetch the resulting rows as an array 
$pizza = mysqli_fetch_all($result, MYSQLI_ASSOC); // saying we want this back as an associative array


mysqli_free_result($result); // this is freeing the resulting from memory

// close connection to the database
mysqli_close($conn);

// print_r($pizza);



?>



<!DOCTYPE html>
<html lang="en">

<?php include('templates/header.php'); ?>

<h4 class="center grey-text">pizzas</h4>

<div class="container">
    <div class="row">

    <?php foreach($pizza as $pizzas){ ?>

    <div class="col s6 md3"> 
        <div class="card z-depth-0">
            <div class="card-content">
                <h6><?php echo htmlspecialchars($pizzas['title']); ?></h6>
                <div><?php echo htmlspecialchars($pizzas['ingredients']); ?></div>
            </div>
            <div class="card-action right-align">
                <a href="#" class="brand-text">more info</a>
            </div>
        </div>
    </div>
    
        <?php }?>
    
    </div>
</div>

<?php include('templates/footer.php'); ?>



</body>
</html>