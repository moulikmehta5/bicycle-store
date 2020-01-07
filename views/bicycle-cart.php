<?php
    require('../repository/formRepository.php');

    session_start();
 


    $repository = new FormRepository();
    $result = $repository->getCurrentSelection(); 
    while ($row = $result->fetch_assoc()) {
        $brand = $row['brand'];
        $gender = $row['gender'];
        $color = $row['color'];
    }
    
   
    
    if (isset($_POST["btnSubmit"])) {
        header("location: billing.php");
    }
    
    $price = $repository->getPriceFromDB($brand, $gender, $color);
    $repository->saveCurrentPrice($price);
     $allRows = $repository->getAllSelection($brand, $color, $gender);
     // 
     
     if(isset($_POST['radio'])) {

        $brand = $_POST['name'];
        $gender = $_POST['Type'];
        $color = $_POST['color_type'];
        $price = $_POST['price'];

        
            $repository = new FormRepository();
            $repository->saveCurrentOption($brand,  $gender, $color, $price);
            ;
            
                   
    }
    
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
     
                <p> Bicycle Cart </p> 
                <p> Price as per your selection </p>

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
                                   // output data of each row
                               while($row = $allRows->fetch_assoc()) {
                                 echo '<tr>
                                         <td scope="row"><input name="radio" type="radio" value="Option"></td>
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

                <div> 
                    <form method="post">
                        <input type="submit" name="btnSubmit" class="btn btn-primary" />                       
                    </form>               
                </div>

            </div>

        </div>
      </body>
</html>