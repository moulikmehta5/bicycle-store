<?php
    
    require('../Repository/dbConnection.php');

    class FormRepository {
        
        public function saveCurrentSelection($brand, $gender, $color) {
            $conn = new Connection();
            $dbConnection = $conn->dbConnection();            

            $sql = "UPDATE currentselection
                    SET brand='$brand' , gender='$gender' , color='$color'
                    WHERE id = 1";

            $result = $dbConnection->query($sql);

        }

        public function saveCurrentPrice($price) {
            $conn = new Connection();
            $dbConnection = $conn->dbConnection();            

            $sql = "UPDATE currentselection SET price='$price' WHERE id = 1";

            $result = $dbConnection->query($sql);

        }

        public function getCurrentSelection() {
            $conn = new Connection();
            $dbConnection = $conn->dbConnection();            

            $sql = "SELECT * FROM currentSelection WHERE id = 1";

            $result = $dbConnection->query($sql);

            return $result;
        }



        public function checkColor($brand, $gender, $color) {

            $conn = new Connection();
            $dbConnection = $conn->dbConnection();            

            $sql = "Select c.id, c.color_type from price as p 
                join brand as b on p.brand_id = b.id
                join gender as g on p.gender_id = g.id
                join color as c on p.color_id = c.id
                where b.name = '$brand' && g.Type = '$gender' && c.color_type='$color';";

            $result = $dbConnection->query($sql);
            
                         while($row = $result->fetch_assoc()) {
              
                if (empty($row['id'])) {
                    return false;
                } else {
                    return true;
                }
            }

            $dbConnection->close();
        }

        public function getPriceFromDB($brand, $gender, $color) {
            $conn = new Connection();
            $dbConnection = $conn->dbConnection(); 

            $sql = "Select p.id, p.price from price as p join brand as b on p.brand_id = b.id
                join gender as g on p.gender_id = g.id join color as c on p.color_id = c.id
                where b.name = '$brand' && g.Type = '$gender' && c.color_type='$color';";

            $result = $dbConnection->query($sql);
            
            while($row = $result->fetch_assoc()) {
                
                if (empty($row['id'])) {
                    return false;
                } else {
                    return $row['price'];
                }
            }

            $dbConnection->close();

        }

        public function saveBillingInfo($fName, $lName, $address, $city, $state, $pcode) {
            
            $conn = new Connection();
            $dbConnection = $conn->dbConnection();
            $sql = "INSERT INTO billinginfo (first_name, last_name, address, city, state, pin_code )
                    VALUES('$fName', '$lName', '$address', '$city', '$state', '$pcode')";
            
            $result = $dbConnection->query($sql);
            $last_id = $dbConnection->insert_id;
            return $last_id;
        }

        public function saveOrderDetails($orderId, $brand, $gender, $color, $price) {
            $conn = new Connection();
            $dbConnection = $conn->dbConnection();
            $sql = "INSERT INTO orderdetails (billing_id, brand, gender, color, price )
                    VALUES('$orderId', '$brand', '$gender', '$color', '$price')";
            
            $result = $dbConnection->query($sql);
        }

        public function getOrderDetails($orderID) {
            $conn = new Connection();
            $dbConnection = $conn->dbConnection();            

            $sql = "SELECT * FROM billinginfo WHERE id = '$orderID'";

            $result = $dbConnection->query($sql);

            return $result;
        }

        public function getAllOrders() {
            $conn = new Connection();
            $dbConnection = $conn->dbConnection();            

            $sql = "SELECT * From orderdetails as o join billinginfo as bi on o.billing_id = bi.id order by bi.created_at DESC";

            $result = $dbConnection->query($sql);

            return $result;
        }
        
        public function getUsers() {
            $conn = new Connection();
            $dbConnection = $conn->dbConnection();
            
            $sql = "SELECT id,username,created_at,Role,email,contact_no From users";
            
            $result = $dbConnection->query($sql);
            
            return $result;
            
        }
        
        public function getProducts() {
            $conn = new Connection();
            $dbConnection = $conn->dbConnection();
            
            $sql = "SELECT brand.name,gender.Type,color.color_type,price.price from brand,gender,color,price where brand.id=price.brand_id and gender.id=price.gender_id and color.id=price.color_id order by brand.name,gender.Type";
            
            $result = $dbConnection->query($sql);
            
            return $result;
            
        }
        
        
          public function saveProducts($brand_id, $gender_id, $color_id, $price) {
            $conn = new Connection();
            $dbConnection = $conn->dbConnection();
            $sql = "INSERT INTO price (brand_id,gender_id,color_id,price )
                    VALUES('$brand_id', '$gender_id', '$color_id', '$price')";
            
            $result = $dbConnection->query($sql);
        }
        
        public function getAllSelection($brand, $color, $gender) {
            $conn =new Connection();
            $dbConnection = $conn->dbconnection();
            
            $sql ="Select b.name,g.Type,c.color_type,p.price from price as p join brand as b on p.brand_id = b.id join gender as g on p.gender_id = g.id join color as c on p.color_id = c.id where b.name ='$brand' AND c.color_type ='$color' AND g.Type ='$gender'";
        
        
            $result = $dbConnection->query($sql);
            
            return $result;
        }
        
          
         public function saveCurrentOption($brand, $gender, $color, $price) {
            $conn = new Connection();
            $dbConnection = $conn->dbConnection();            

            $sql = "UPDATE currentoption
                    SET brand='$brand' , gender='$gender' , color='$color', price='$price'
                    WHERE id = 1";

            $result = $dbConnection->query($sql);
         }

        public function getCurrentOption() {
            $conn = new Connection();
            $dbConnection = $conn->dbConnection();            

            $sql = "SELECT * FROM currentoption WHERE id = 1";

            $result = $dbConnection->query($sql);

            return $result;
        
    }

    
      public function saveNewPrice($price) {
            $conn = new Connection();
            $dbConnection = $conn->dbConnection();            

            $sql = "UPDATE newprice SET price='$price' WHERE id = 1";

            $result = $dbConnection->query($sql);

        }
    
    }