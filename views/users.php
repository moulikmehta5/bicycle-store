
<?php
require('../repository/formRepository.php');    
   
    session_start();
    
  $repository = new FormRepository();   
$result = $repository->getUsers();


        
echo "<table class='table table-bordered' border='1 solid black;margin-left:auto;margin-right:auto;' cellpadding=1 width='70%' align='center'>
<tr>
<th>ID</th>
<th>Username</th>
<th>Create Date</th>
<th>Role</th>
<th>Email</th>
<th>Contact Number</th>
</tr>";

while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['id'] . "</td>";
echo "<td>" . $row['username'] . "</td>";
echo "<td>" . $row['created_at']. "</td>";
echo "<td>" . $row['Role']. "</td>";
echo "<td>" . $row['email']. "</td>";
echo "<td>" . $row['contact_no']. "</td>";
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