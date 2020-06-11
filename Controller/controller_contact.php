<?php 
  include("View/show_list_contact.php"); 
  include("Model/model_contact.php");
  $row = NULL;
  $idUpdate = NULL;
    class ContactController{

      private $modelContact;
      private $conn;
      private $idConvert = NULL;
      public function __construct()
      {
        
      }
      public function actionContact($action) {

        $this->conn = new mysqli('localhost:3306', 'root', 'Ridaica123', 'contactdb');
        $this->modelContact = new ModelContact(); 
        switch ($action) {
          case "sumit" : $this->addContact();
          break;

          case "deleteById" : $this->deleteContact();    
          break;

          case "fillToUpdate" : $this->fillToUpdate(); 
          break;

          case "updateById" : $this->updateById();
          break;

          default: break;
        } 
      }

      public function addContact() {
            $name = $_POST['name'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            if(empty($name) || empty($phone) || empty($email)) {
              echo '<script type="text/javascript">alert("Submit failed")</script>'; 
              $row['name'] = $name;
              $row['phone'] = $phone;
              $row['email'] = $email;
            } else {  
              $this->modelContact->insertContact($this->conn, $name, $phone, $email);
              echo '<script type="text/javascript">alert("Submit successful")</script>'; 
            } 
      } 

      private function deleteContact() {

            $id = $_POST["id"];
            if($this->modelContact->deleteById($this->conn, $id)) {
              echo '<script type="text/javascript">alert("Delete successful")</script>';
            } else echo '<script type="text/javascript">alert("Delete failed")</script>';
      }

      public function fillToUpdate() {

            $id = $_POST["id"]; 
            $rowById = $this->modelContact->getContactById($this->conn, $id);
            $row = mysqli_fetch_assoc($rowById); 
            $GLOBALS['row'] = $row;
            $GLOBALS['idUpdate'] = $id;
      }

      public function updateById() {

            $name = $_POST['name'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $id = $_POST['id'];
            
            if(empty($id)) {
              echo '<script type="text/javascript">alert("Update failed, Please Select element to update  ")</script>'; 
            } 
            elseif(empty($name) || empty($phone) || empty($email)) {
              echo '<script type="text/javascript">alert("Update failed, Please do not leave the text empty  ")</script>'; 
              $row['name'] = $name;
              $row['phone'] = $phone;
              $row['email'] = $email;
            } else {   
              $this->modelContact->updateContact($this->conn, $name, $phone, $email, $id);
              echo '<script type="text/javascript">alert("Update successful")</script>'; 
            } 
      }
    }

    $contactController = new ContactController();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
      if(isset($_POST['submit'])) $action = "sumit";
      if(isset($_POST['deleteById'])) $action = "deleteById";
      if(isset($_POST['fillToUpdate'])) $action = "fillToUpdate";
      if(isset($_POST['updateById'])) $action = "updateById";    
      $contactController->actionContact($action);
    }
    
    // if(isset($_POST['submit'])) {
    //   $name = $_POST['name'];
    //   $phone = $_POST['phone'];
    //   $email = $_POST['email'];
    //   if(empty($name) || empty($phone) || empty($email)) {
    //     echo '<script type="text/javascript">alert("Submit failed")</script>'; 
    //     $row['name'] = $name;
    //     $row['phone'] = $phone;
    //     $row['email'] = $email;
    //   } else {   
    //     $modelContact->insertContact($conn, $name, $phone, $email);
    //     echo '<script type="text/javascript">alert("Submit successful")</script>'; 
    //   } 
    // }
    
    // if(isset($_POST['deleteById'])) {
    //   $id = $_POST["id"];
    //   if($modelContact->deleteById($id)) {
    //     echo '<script type="text/javascript">alert("Delete successful")</script>';
    //   } else echo '<script type="text/javascript">alert("Delete failed")</script>';
    // }
    
    // if(isset($_POST['updateById'])) {
    //   $idUpdate = $_POST["id"];      
    //   $rowById = $modelContact->getContactById($conn, $idUpdate);
    //   $row = mysqli_fetch_assoc($rowById);
    // }

    // if(isset($_POST['update'])) {
    //   $name = $_POST['name'];
    //   $phone = $_POST['phone'];
    //   $email = $_POST['email'];
    //   $id = $_POST['id'];
      
    //   if(empty($id)) {
    //     echo '<script type="text/javascript">alert("Update failed, Please Select element to update  ")</script>'; 
    //   } 
    //   elseif(empty($name) || empty($phone) || empty($email)) {
    //     echo '<script type="text/javascript">alert("Update failed, Please do not leave the text empty  ")</script>'; 
    //     $row['name'] = $name;
    //     $row['phone'] = $phone;
    //     $row['email'] = $email;
    //   } else {   
    //     $modelContact->updateContact($conn, $name, $phone, $email, $id);
    //     echo '<script type="text/javascript">alert("Update successful")</script>'; 
    //   } 
    // }

    
    
    

?>