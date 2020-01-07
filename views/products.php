<?php
require('../repository/formRepository.php');    
   
    session_start();
    
  $repository = new FormRepository();   
$result = $repository->getProducts();


        
echo "<table class='table table-bordered' border='1 solid black;margin-left:auto;margin-right:auto;' cellpadding=1 width='70%' align='center'>
<tr>
<th>Brand</th>
<th>Gender</th>
<th>Color</th>
<th>Price</th>
</tr>";

while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['name'] . "</td>";
echo "<td>" . $row['Type'] . "</td>";
echo "<td>" . $row['color_type']. "</td>";
echo "<td>" . $row['price']. "</td>";
echo "</tr>";
}
echo "</table>";

// 
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


<!-- 

-->