<?php 
       
    $conn = new mysqli('localhost:3306', 'root', 'Ridaica123', 'contactdb');

    
    if(isset($_POST['submit'])) {
      $name = $_POST['name'];
      $phone = $_POST['phone'];
      $email = $_POST['email'];
      if(empty($name) || empty($phone) || empty($email)) {
        echo '<script type="text/javascript">alert("Submit failed")</script>'; 
        $row['name'] = $name;
        $row['phone'] = $phone;
        $row['email'] = $email;
      } else {   
        $C_Contact->insertContact($conn, $name, $phone, $email);
        echo '<script type="text/javascript">alert("Submit successful")</script>'; 
      } 
    }
    
    if(isset($_POST['deleteById'])) {
      $id = $_POST["id"];
      if($C_Contact->deleteById($id)) {
        echo '<script type="text/javascript">alert("Delete successful")</script>';
      } else echo '<script type="text/javascript">alert("Delete failed")</script>';
    }
    
    if(isset($_POST['updateById'])) {
      $idUpdate = $_POST["id"];      
      $rowById = $C_Contact->getContactById($conn, $idUpdate);
      $row = mysqli_fetch_assoc($rowById);
    }

    if(isset($_POST['update'])) {
      $name = $_POST['name'];
      $phone = $_POST['phone'];
      $email = $_POST['email'];
      $id = $_POST['id'];
      $sqlUpdate = "UPDATE contactdb.info set name='" . $name . "', phone='" . $phone . "', email = '" . $email . "' WHERE id = $id";
      if(empty($id)) {
        echo '<script type="text/javascript">alert("Update failed, Please Select element to update  ")</script>'; 
      } 
      elseif(empty($name) || empty($phone) || empty($email)) {
        echo '<script type="text/javascript">alert("Update failed, Please do not leave the text empty  ")</script>'; 
        $row['name'] = $name;
        $row['phone'] = $phone;
        $row['email'] = $email;
      } else {   
        $connection->query($sqlUpdate);
        echo '<script type="text/javascript">alert("Update successful")</script>'; 
      } 

    }

?>