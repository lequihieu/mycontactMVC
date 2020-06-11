<?php

class ModelContact {
    /**
     * Class constructor.
     */

    public function __construct()
    {}
    
    public function allContactInfo($conn) {
        
        $result = mysqli_query($conn,"SELECT * FROM info");
        return $result;
    }
    public function searchContactByText($conn, $textSearch) {

        $sqlSearch = 'select * from contactdb.info where CONCAT_WS('. "''" . ', name, phone, email) LIKE ' . "'" . "%$textSearch%" . "'";
        $result = mysqli_query($conn, $sqlSearch);
        return $result;
    }
    public function insertContact($conn, $name, $phone, $email) {
        $sqlInsert = 'insert into info(name, phone, email) value('."'".$name."',"."'".$phone."','".$email."')";
        $result = mysqli_query($conn, $sqlInsert);
        return $result;
    }
    public function deleteById($conn, $id) {
        $sqlDelete = 'delete from info where id =' . $id;
        return $conn->query($sqlDelete);
    }
    public function getContactById($conn, $id) {
        $sqlGet = "SELECT name, phone, email from contactdb.info where id = $id";
        return $conn->query($sqlGet);
    }
    public function updateContact($conn, $name, $phone, $email, $id) {
        $sqlUpdate = "UPDATE contactdb.info set name='" . $name . "', phone='" . $phone . "', email = '" . $email . "' WHERE id = $id";
        return $conn->query($sqlUpdate);
    }
}
?>