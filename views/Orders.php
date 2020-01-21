<html>
    <head>
    <meta charset="UTF-8">
    <title>User</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
        div.dropdown_container {
    width:100px;
}

select.my_dropdown {
    width:auto;
}

/*IE FIX */
select#my_dropdown {
    width:100%;
}

select:focus#my_dropdown {
    width:auto\9;
}  
}
    </style>
</head>
<body>
    <div class="topnav" align="left">
  <a href="adminPage.php" class="btn btn-primary">Home</a><br>
  <div class="dropdown_container">
                        <br>
                       <select class="my_dropdown" name="Search By" id="my_dropdown">
                            <option > Search By </option>
                            <option value="Brand"> Brand </option>
                            <option value="Gender"> Gender </option>
                            <option value="Color"> Color </option>
                            <option value="First Name"> First Name </option>
                            <option value="Last Name"> Last Name </option>
                            <option value="City"> City </option>
                            <option value="State"> State </option>
                        </select>          
                    </div>
  <input type="text" placeholder="Search.."><button type="submit">Search</button>
</div><br>
<a href="logout.php" class="topleft"><div style="position: absolute;center: 0; width: 100px; text-align:left;">
       <u>Logout</div></a></u></p>
<hr>

<?php
require('../repository/formRepository.php');    
   
    session_start();
    
  $repository = new FormRepository();   
$result = $repository->getAllOrders();


        
echo "<table class='table table-bordered' border='1 solid black;margin-left:auto;margin-right:auto;' cellpadding=1 width='70%' align='center'>
<tr>
<th>ID</th>
<th>Brand</th>
<th>Gender</th>
<th>Color</th>
<th>Price</th>
<th>First Name</th>
<th>Last Name</th>
<th>Address</th>
<th>City</th>
<th>State</th>
<th>ZipCode</th>
</tr>";

while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['billing_id'] . "</td>";
echo "<td>" . $row['brand'] . "</td>";
echo "<td>" . $row['gender'] . "</td>";
echo "<td>" . $row['color']. "</td>";
echo "<td>" . $row['price']. "</td>";
echo "<td>" . $row['first_name']. "</td>";
echo "<td>" . $row['last_name']. "</td>";
echo "<td>" . $row['address']. "</td>";
echo "<td>" . $row['city']. "</td>";
echo "<td>" . $row['state']. "</td>";
echo "<td>" . $row['pin_code']. "</td>";
echo "</tr>";
}
echo "</table>";


?>
</body>
</html>