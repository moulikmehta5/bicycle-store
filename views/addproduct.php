<?php
    require('../repository/formRepository.php');
    
    session_start();
 
    // Check if the user is logged in, if not then redirect him to login page
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        header("location: login.php");
        exit;
    }
    
    $showError = false;

     if (isset($_POST['brand'])) {
        $brand_id = $_POST['brand'];
        $gender_id = $_POST['gender'];
        $color_id = $_POST['color'];
        $price = $_POST['price'];
        

        $repository = new FormRepository();
        $result = $repository->saveProducts($brand_id, $gender_id, $color_id, $price) ;
    // 

     }
 
?>

<!DOCTYPE html>
<html>
    <head>
        <?php require('../Views/headContents.php');?>
        <script type="text/javascript">

function addProduct(form) {
if (confirm("Product added")) {
form.submit();
}

else {
alert("Product not added");
}
}
</script>
    </head>
<body>
<div class="page-header">
        <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>.</h1><h3> Add product here</h3>
        <p><a href="logout.php"> <u>Logout</a></u></p>
    </div>
<form action="" method="POST">
<p>Please select your Brand:</p>
  <input type="radio" name="brand" value="1"> Hero<br>
  <input type="radio" name="brand" value="2"> Hercules<br>
  <input type="radio" name="brand" value="3"> Atlas<br> <br> 
  
<p>Please select your Gender:</p>
  <input type="radio" name="gender" value="1"> Gents<br>
  <input type="radio" name="gender" value="2"> Ladies<br><br>
 
<p>Please select Color:</p>
  <input type="radio" name="color" value="1"> Blue<br>
  <input type="radio" name="color" value="2"> Red<br>
  <input type="radio" name="color" value="3"> Green<br>  
  <input type="radio" name="color" value="4"> Black<br>  <br>

 <p>Please select price:  (In Dollars)
 <input type="number" name="price" class="form-control" min="2300" size="35"><br><br>

 <p> <input type="submit" onClick="addProduct(this.form);" value="Submit"></p></p>
</form>

</body>
</html>