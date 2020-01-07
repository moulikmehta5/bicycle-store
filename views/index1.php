<?php
    require('../repository/formRepository.php');
    
    session_start();
 
    // Check if the user is logged in, if not then redirect him to login page
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        header("location: login.php");
        exit;
    }
    
    $showError = false;

    if(isset($_POST['selectBrand'])) {

        $brand = $_POST['selectBrand'];
        $gender = $_POST['selectGender'];
        $color = $_POST['selectColor'];

        if (!empty($brand) && !empty($gender) && !empty($color)) {
            $repository = new FormRepository();
            $repository->saveCurrentSelection($brand,  $gender, $color);
            $colors = $repository->checkColor($brand, $gender, $color);
            
            if (!$colors) {
                $showError = true;
            } else {
                $showError = false;
                header("Location: bicycle-cart.php");
            }
        } 
    }
    
    //

    
 
?>

<!DOCTYPE html>
<html>
    <head>
        <?php require('../Views/headContents.php');?>
    </head>
    <body>
        <div class="page-header">
        <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to Bicycle store.</h1>
        <p><a href="logout.php"> <u>Logout</a></u></p>
    </div>
        <div id="welcome-page">
            <div class="row jumbotron text-center">  
     
                <p> Bicycle Store Home Page </p>         
        
                <form id="select-bike" method="post">
                    <div class="form-group">
                        <label for="brand">Brand</label>
                        <select class="form-control" name="selectBrand">
                            <option > Select </option>
                            <option value="Hero"> Hero </option>
                            <option value="Atlas"> Atlas </option>
                            <option value="Hercules"> Hercules </option>
                        </select>          
                    </div>

                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <select class="form-control" id="selectGender" name="selectGender">
                            <option> Select </option>
                            <option value="Gents"> Gents </option>
                            <option value="Ladies"> Ladies </option>
                        </select>          
                    </div>                    
                    
                    <div class="form-group">
                        <label for="color">Color</label>
                        <select class="form-control" name="selectColor">
                            <option > Select </option>
                            <option value="Blue"> Blue </option>
                            <option value="Red"> Red </option>
                            <option value="Green"> Green </option>
                            <option value="Black"> Black </option>
                        </select> 
                    </div> 
                    <?php if($showError === true): ?>
                        <p> Color not available, please select a different color. </p>
                    <?php else: ?>

                    <?php endif; ?>

                    <div>                        
                        <button type="button" class="btn btn-primary" onClick="this.form.submit()"> Quote </button>                      
                    </div>
                   
                </form>
            </div>
        </div>               
       </body>
</html>



