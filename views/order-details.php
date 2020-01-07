<?php
    require('../repository/formRepository.php');    
    $orderId = $_GET['id'];
    
    session_start();
 
    // Check if the user is logged in, if not then redirect him to login page
    // 
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        header("location: billing.php");
        exit;
    }

    $repository = new FormRepository();
    $result = $repository->getCurrentOption();
    
    while ($row = $result->fetch_assoc()) {
        $brand = $row['brand'];
        $gender = $row['gender'];
        $color = $row['color'];
        $price = $row['price'];
    }

    $orderResult = $repository->getOrderDetails($orderId);
    
    while ($row = $orderResult->fetch_assoc()) {
        $fName = $row['first_name'];
        $lName = $row['last_name'];
        $address = $row['address'];
        $city = $row['city'];
        $state = $row['state'];
        $zipcode = $row['pin_code'];
    } 
    
    
        
    $repository->saveOrderDetails($orderId, $brand, $gender, $color, $price);
        
?>

<!DOCTYPE html>
<html>
    <head>
        <?php require('../Views/headContents.php');?>
    </head>
    <body>
        <div class="page-header">
        <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b></h1>
        <p><a href="logout.php"> <u>Logout</a></u></p>
    </div>
        <div id="welcome-page">
            <div class="row jumbotron text-center">  
                <p> Bicycle Cart Order Details </p> 

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col"> Brand </th>
                            <th scope="col"> Type </th>
                            <th scope="col"> Color </th>
                            <th scope="col"> Price </th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr> 
                            <td > <?php echo $brand ?> </td>
                            <td > <?php echo $gender ?> </td>
                            <td > <?php echo $color ?> </td>
                            <td > <?php echo $price ?> </td>
                        </tr>
                    </tbody>
                </table>
                <div>
                    <p> First Name: <?php echo $fName  ?> </p>
                </div>
                <div>
                    <p> Last Name: <?php echo $lName  ?> </p>
                </div>
                <div>
                    <p> Adress: <?php echo $address  ?> </p>
                </div>
                <div>
                    <p> City: <?php echo $city ?> </p>
                </div>
                <div>
                    <p> State: <?php echo $state  ?> </p>
                </div>
                <div>
                    <p> Zipcode: <?php echo $zipcode ?> </p>
                </div>

                <a href="logout.php" class="btn btn-primary">Close</a>
            </div>
        </div>
    </body>
</html>