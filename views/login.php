<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: index1.php");
    exit;
}
 
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if the username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement to identify existing users
        $sql = "SELECT id, username, password, role FROM users WHERE username = ?"; 
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters 
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                //Store result from the above execution of function
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password, $role);
                    if(mysqli_stmt_fetch($stmt)){
                        
                        if($password == $hashed_password){
                            // Password is corect, start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            
                            if ($role == 'Admin') {
                                //Send to Admin Page
                                header("location: adminPage.php");
                            } else {
                                // Redirect user to welcome page
                                header("location: index1.php");
                            }
                        } else{
                            // Display an error message if password is not valid
                            $password_err = "The password you entered was not valid."; // unable to match password from the database when password_hash used.
                        }
                    }
                } else{
                    // Display message if username doesn't exists
                    $username_err = "No account found with that username.";
                }
            } else{
                echo "Something went wrong. Please try again later."; // Display message if login attempt fails
            }
        }     
        // Close Statement 
        mysqli_stmt_close($stmt);      
    }
      // Close connection 
    mysqli_close($link);
}

if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 180)) {
    // last request was more than 30 minutes ago
    session_unset();     // unset $_SESSION variable for the run-time 
    session_destroy();   // destroy session data in storage
}
$_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp
 
/*
You can also use an additional time stamp to regenerate the session ID periodically to avoid attacks on sessions like session fixation:
*/
if (!isset($_SESSION['CREATED'])) {
    $_SESSION['CREATED'] = time();
} else if (time() - $_SESSION['CREATED'] > 180) {
    // session started more than 30 minutes ago
    session_regenerate_id(true);    // change session ID for the current session an invalidate old session ID
    $_SESSION['CREATED'] = time();  // update creation time
}// update last activity time stamp
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
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
        <h2>Customer Login</h2>
        <p>Please fill in your credentials to login.</p>
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
                <input type="password" name="password" class="form-control">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login"><a href="forgotpassword.php"> &nbsp;&nbsp;&nbsp;&nbsp;<u>Forgot Password?</a></u>
            </div>
            <p>Don't have an account?<a href="Signup.php"><u>Sign up now</a></u></p>
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


-->