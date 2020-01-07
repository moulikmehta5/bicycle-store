<?php
    require('../repository/formRepository.php');
    session_start();
    $repository = new FormRepository();
    $allOrders = $repository->getAllOrders();
?>

 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
        
       .btn btn-primary {
    padding: 10px 20px;
    font-size: 20px;
    border-radius: 20px;}
    </style>
</head>
<body>
    <div class="page-header">
                <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to our site.</h1>
    
    <p></div>
    <a href="logout.php" class="topleft"><div style="position: absolute; left: 0; width: 100px; text-align:left;">
       <u>Logout</div></a></u></p>
    <p>
        <a href="Orders.php" class="btn btn-primary btn-lg"> Orders </a> &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp;          
        <a href="users.php" class="btn btn-primary btn-lg"> Users </a> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
        <a href="products.php" class="btn btn-primary btn-lg"> Products </a>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
          <a href="addproduct.php" class="btn btn-primary btn-lg"> Add Products </a>
        
    </p>
</body>
</html>