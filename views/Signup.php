<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$username = $password = $confirm_password = $email = $contact_no = "";
$username_err = $password_err = $confirm_password_err = $email_err = $contact_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";       
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
    
    // Validate Email
    if(empty(trim($_POST["email"]))){
        $email_err = "Please enter email.";
   // } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
   //     $emailErr = "Invalid email format";
    }
    else{
        $email = trim($_POST["email"]);
    }
    
     // Validate Contact Number
    if(empty(trim($_POST["contact_no"]))){
        $contact_err = "Please enter Contact number.";       
    } else{
        $contact_no = trim($_POST["contact_no"]);
    }
    
    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err) && empty($email_err) && empty($contact_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO users (username, password,email,contact_no) VALUES (?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssi", $param_username, $param_password, $param_email, $param_contact);
            
            // Set parameters
            $param_username = $username;
            $param_password = $password;                 //password_hash($password, PASSWORD_DEFAULT); // Creates a password hash, the entered password is encrypted
            $param_email = $email;
            $param_contact = $contact_no;
            var_dump($email);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: login.php");
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
         
        // Close statement 
        mysqli_stmt_close($stmt);
    }
    
    // Close connection // 
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sign Up</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<meta content="text/html; charset=iso-8859-2" http-equiv="Content-Type">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
        .mySlides {display:none;}
        .split {
  height: 100%;
  width: 50%;
  position: fixed;
  z-index: 1;
  top: 0;
  overflow-x: hidden;
  padding-top: 50px;
}

.left {
  left: 0;
  background-color: #111;
}

.right {
  right: 0;
  background-color: white;
}

.centered {
  position: absolute;
  top: 50%;
  left:50%;
  transform: translate(-50%, -50%);
  text-align: center;
}


    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Sign Up</h2>
        <p>Please fill this form to create an account.</p>
          <div class="split centered" style="max-width:500px">
           <img class="mySlides" src="https://encrypted-tbn1.gstatic.com/shopping?q=tbn:ANd9GcQ_RQTFDYxnqC4qj67sPo6uGl3RibqXh_IhiW09QJUiNTVJILyjih5IihOGEE4TCNgDkSvGKlQi&usqp=CAE" style="width:100%">
           <img class="mySlides" src="https://encrypted-tbn2.gstatic.com/shopping?q=tbn:ANd9GcTsc8HpVAeFPsApQ6FssM0hvL8pflEvKyRBopo0i3E2MYwsxxzrd_JC3Shzb0nlXHYWPTfr2Ps&usqp=CAE" style="width:100%">
           <img class="mySlides" src="https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcQM4flBwmXS34AjLmUowPIPD4s-zL7_mS_7Si5M9v3cXBmR79FfLwonslwlqkAoqE4ptyw0XF67&usqp=CAE" style="width:100%">
           <img class="mySlides" src="https://encrypted-tbn2.gstatic.com/shopping?q=tbn:ANd9GcTWo8OJp9AshxJ9WJMsgU7ISri9N1M64tOtQNlfdpcB1OFjiJlO_NSaUku-2wgjVUfzH7wxUohq&usqp=CAE" style="width:100%">
           <img class="mySlides" src="https://cdn.shopify.com/s/files/1/2318/5263/products/BMT14017_CM_1_7bb96759-00e7-43db-acad-d45f37cc4442_1024x1024.jpg?v=1574388659" style="width:100%">
         </div>
         <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Username</label>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password</label>
                <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="<?php echo $email; ?>">
                <span class="help-block"><?php echo $email_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($contact_err)) ? 'has-error' : ''; ?>">
                <label>Contact No.</label>
                <input type="contact_no" name="contact_no" class="form-control" value="<?php echo $contact_no; ?>">
                <span class="help-block"><?php echo $contact_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-default" value="Reset">
            </div>
            <p>Already have an account? <a href="login.php">Login here</a>.</p>
        </form>
    </div>   
    <script>
var myIndex = 0;
carousel();

function carousel() {
  var i;
  var x = document.getElementsByClassName("mySlides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  myIndex++;
  if (myIndex > x.length) {myIndex = 1}    
  x[myIndex-1].style.display = "block";  
  setTimeout(carousel, 2500); // Change image every 2.5 seconds
}
</script>
</body>
</html>

<!--

https://previews.123rf.com/images/sanek13744/sanek137441607/sanek13744160700483/60163463-bike-icon-on-white-background-bicycle-vector-illustration-in-flat-style-icons-for-design-website-.jpg


-->