<?php
    require('../repository/formRepository.php');

<<<<<<< HEAD
    session_start();

    $repository = new FormRepository();
    $result = $repository->getCurrentSelection();
   
=======
    session_start(); 

    $repository = new FormRepository();
    $result = $repository->getCurrentSelection(); 
    
>>>>>>> 9b200b7fd56bf261de399bfb5e15c6ac8d7c7be3
    while ($row = $result->fetch_assoc()) {
        $brand = $row['brand'];
        $gender = $row['gender'];
        $color = $row['color'];
    }
<<<<<<< HEAD
   
    $price = $repository->getPriceFromDB($brand, $gender, $color);
    $repository->saveCurrentPrice($price);
    $allRows = $repository->getAllSelection($brand, $color, $gender);
   
=======
    
    $price = $repository->getPriceFromDB($brand, $gender, $color);
    $repository->saveCurrentPrice($price);
    $allRows = $repository->getAllSelection($brand, $color, $gender);
   
>>>>>>> 9b200b7fd56bf261de399bfb5e15c6ac8d7c7be3
    if (isset($_POST["radioSubmit"])) {
        $newPrice = $_POST["radio"];
        $repository->saveCurrentPrice($newPrice);
        header("location: billing.php");
    }
<<<<<<< HEAD
   
=======
    
>>>>>>> 9b200b7fd56bf261de399bfb5e15c6ac8d7c7be3
     
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
<<<<<<< HEAD
                <p> Bicycle Cart </p>
=======
                <p> Bicycle Cart </p> 
>>>>>>> 9b200b7fd56bf261de399bfb5e15c6ac8d7c7be3
                <p> Price as per your selection </p>
                <form method="post">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col"> Option</th>
                                <th scope="col"> Brand </th>
                                <th scope="col"> Type </th>
                                <th scope="col"> Color </th>
                                <th scope="col"> Price </th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php    
                                if ($allRows->num_rows > 0) {
<<<<<<< HEAD
                                   
=======
                                    
>>>>>>> 9b200b7fd56bf261de399bfb5e15c6ac8d7c7be3
                                    while($row = $allRows->fetch_assoc()) {
                                        echo '<tr>
                                            <td scope="row"><input name="radio" type="radio" value="' . $row["price"] . '"></td>
                                            <td scope="row">' . $row["name"] .'</td>
                                            <td> '.$row["Type"] .'</td>
                                            <td> '.$row["color_type"] .'</td>
                                            <td> '.$row["price"] .'</td>
                                        </tr>';
                                    }
                                }
                            ?>
                        </tbody>    
                    </table>                    
<<<<<<< HEAD
                    <input type="submit" name="radioSubmit" class="btn btn-primary" />                      
=======
                    <input type="submit" name="radioSubmit" class="btn btn-primary" />                       
>>>>>>> 9b200b7fd56bf261de399bfb5e15c6ac8d7c7be3
                </form>              
            </div>
        </div>
      </body>
</html>

