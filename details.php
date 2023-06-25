<?php 

include('config/db_connect.php');

if(isset($_POST['delete'])){
    
    $id_to_delete = mysqli_real_escape_string($conn, $_POST['$id_to_delete']);

    $sql = "DELETE FROM pizzas WHERE id = $id_to_delete";

    if(mysqli_query($conn, $sql)){
        // success
        header('location: index.php');
    } {
        // failure
        echo 'query error: ' . mysqli_error($conn);
    }

}

// check GET request id parameter
if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);

    // make $sql
    $sql = "SELECT * FROM pizza WHERE id = $id";

    // get the query result
    $result = mysqli_query($conn, $sql);

    // fetch result in array format
    $pizza = mysqli_fetch_assoc($result);

    // free the result
    mysqli_free_result($result);
    mysqli_close($conn);

    // Convert the ingredients string to an array
    $ingredients = explode(',', $pizza['ingredients']);

    // print_r($pizza);
    // print_r($ingredients);
}


?>

<!DOCTYPE html>

<?php include('templates/header.php'); ?>


<div class="container center">
    <?php if($pizza): ?>

        <h4><?php echo htmlspecialchars($pizza['title']); ?></h4>
        <p>created by: <?php echo htmlspecialchars($pizza['email']); ?></p>
        <p><?php echo date($pizza['created_at']); ?></p>
        <h5>ingredients: </h5>
        <p><?php  echo htmlspecialchars($pizza['ingredients']); ?></p>

        <!-- DELETE FORM -->
        <form>
            <form action="details.php" method="POST"></form>
            <input type="hidden" name="id_to_delete" value="<?php echo $pizzas['id'] ?>">
            <input type="submit" name="delete" value="delete" class="btn brand z-depth-0">
        </form>

    <?php else:  ?>
        <!-- Handle the case where the pizza is not found -->
        <h4>No pizza found.</h4>
    <?php endif;  ?>     
</div>

<?php include('templates/footer.php'); ?>

</html>
