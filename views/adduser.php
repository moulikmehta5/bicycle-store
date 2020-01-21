<?php
    require('../repository/formRepository.php');
    
    session_start();
 
    // Check if the user is logged in, if not then redirect him to login page
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        header("location: login.php");
        exit;
    }
    
    $showError = false;

     if (isset($_POST['username'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $role = $_POST['Role'];
        $email = $_POST['email'];
        $contact_no = $_POST['contact_no'];
        

        $repository = new FormRepository();
        $result = $repository->saveUser($username, $password, $role, $email, $contact_no) ;
    // 

     }
 
?>

<!DOCTYPE html>
<html>
    <head>
        <?php require('../Views/headContents.php');?>
        <script type="text/javascript">

function addUser(form) {
if (confirm("User added")) {
form.submit();
}

else {
alert("User not added");
}
}
</script>
    </head>
<body>
<div class="page-header">
        <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>.</h1><h3> Add Users here</h3>
        <p><a href="logout.php"> <u>Logout</a></u></p>
    </div>
<form action="" method="POST">
<p>Please enter Username:</p>
  <input type="text" name="price" class="form-control" size="35"><br><br>
  
<p>Please enter a temporary password:</p>
  <input type="text" name="price" class="form-control" size="35"><br><br>
 
<p>Please select role of user:</p>
  <input type="radio" name="Role" value="1"> Admin<br>
  <input type="radio" name="Role" value="2"> User<br><br>
  
  
 <p>Please enter email d of user:</p>
 <input type="text" name="email" class="form-control" size="35"><br><br>

 <p>Please enter contact number of user:
 <input type="text" name="contact_no" class="form-control" size="35"><br><br>

 <p> <input type="submit" onClick="addUser(this.form);" value="Submit"></p></p>
</form>

</body>
</html>