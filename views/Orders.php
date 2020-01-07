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
<html>
    <head>
    <meta charset="UTF-8">
    <title>User</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>
<a href="logout.php" class="topleft"><div style="position: absolute;center: 0; width: 100px; text-align:left;">
       <u>Logout</div></a></u></p>
</body>
</html>