<?php
    require('../repository/formRepository.php');

    session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: welcome2.php");
    exit;
}
  $error = $fName = $lName = $address= $city = $state = $pcode = null;

    if (isset($_POST['firstName'])) {
        $error = "555";
        $fName = $_POST['firstName'];
        $lName= $_POST['lastName'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $pcode = $_POST['pinCode'];

        if (!$fName || !$lName || !$address || !$city || !$state || !$pcode) {
            $error = "All fields are required";
        } else {
            $error = "1234";
            $repository = new FormRepository();
            $result = $repository->saveBillingInfo($fName, $lName, $address, $city, $state, $pcode);
            header("Location: order-details.php?id=$result");
            
   
    }

    
    }
?>



<!DOCTYPE html>
<html>
    <head>
        <?php require('../Views/headContents.php');?>
       
    </head>
    <body>
        <div class="page-header">
        <h1>Hi <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b></h1>
        <p><a href="logout.php"> <u>Logout</a></u></p>
    </div>
        <div id="welcome-page">
            <div class="row jumbotron text-center">  
                <p> Bicycle Cart Billing Info </p>           
    
                <form method='post'>
                    <div class="form-group">
                        <label for="First Name">First Name</label>
                        <input id="firstname" value="<?= $fName ?>"  name="firstName" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label for="Last Name">Last Name</label>
                        <input id="lasttname" value="<?= $lName ?>" name="lastName" class="form-control">
                    </div>
                    <div class="group">
                        <label for="Address">Address</label>
                        <input id="address" value="<?= $address ?>" name="address" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label for="City">City</label>
                        <input id="city" value="<?= $city ?>" name="city" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="State">State</label>
                        <input id="state" value="<?= $state ?>" name="state" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="Pin Code">Pin Code</label>
                        <input id="pincode" value="<?= $pcode ?>" name="pinCode" class="form-control">
                    </div>
                    
                    <?php echo $error; ?>
                    <br>
                    <button type="submit" class="btn btn-primary" onClick="this.form.submit()">Submit</button>
                    
                </form>
            </div>
        </div>
     </body>
</html>








<!--



 $fName_err = $lName_err = $address_err = $city_err = $state_err = $pcode_err = "";
        
         if(empty($_POST["$fName"])){
        $fName_err = "Please enter a First name.";
         }
        
        if(empty($_POST["$lName"])){
        $lName_err = "Please enter a Last name.";
        }
        
        if(empty($_POST["$address"])){
        $address_err = "Please enter a Address.";
        }
        
        if(empty($_POST["$city"])){
        $city_err = "Please enter a Address.";
        }
        
        if(empty($_POST["$state"])){
        $state_err = "Please enter a Address.";
        }

        if(empty($_POST["$pcode"])){
        $pcode_err = "Please enter a Address.";
        }

///////////////

     if (!$fName || !$lName || !$address || !$city || !$state || !$pcode) {
          echo  $error = "All fields are required";
        } else {
            $error = "";


<div class="group">
                        <label for="Address">Address</label>
                        <input id="address" value="<?= $address ?>" type="address" name="address" class="control">
                    </div>

-->