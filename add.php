<?php 

// the form detauils will be stored in the GET array
if(isset($_GET['submit'])){
   echo $_GET['email'];
   echo $_GET['title'];
   echo $_GET['Ingridients']; 
} 

if(isset($_POST['submit'])){
    echo $_POST['email'];
    echo $_POST['title'];
    echo $_POST['Ingridients']; 
 } 



?>



<!DOCTYPE html>
<html lang="en">

<?php include('templates/header.php'); ?>

<section class="container grey-text">
<h4 class="center"> Add a pizza</h4>

<form class="white" action="add.php" method="POST">
    <label>your email</label>
    <input type="text" name="email">
    <label>pizza title</label>
    <input type="text" name="title">
    <label>Ingridients (comma seperated)</label>
    <input type="text" name="ingridients">
    <div class="center">
        <input type="submit" name="submit" value="submit" class="btn brand z-depth-0">
    </div>
</form>

</section>


<?php include('templates/footer.php'); ?>



</body>
</html>