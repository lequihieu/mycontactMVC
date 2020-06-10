<!DOCTYPE html>
<html>
<head>
  <style>
    .error {color: #FF0000;}
  </style>
  <title></title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<?php 
  include("/Controller/controller_contact.php")
?>
<div class="container">
  <div class="row">
    <div class="col-3">
                <div>
                  <form class="contact-form" method="post">
                      <div class="form-group">
                        <input class="form-control" type="text" name="name" placeholder="Fullname" value = "<?=$row['name']?>" pattern="([A-Za-z\s]{1,30})">
                        <span class="error">* <?php //echo $nameErr?></span>
                      </div>
                      <div class="form-group">
                        <input class="form-control" type="text" name="phone" placeholder="Phone" value = "<?=$row['phone']?>" pattern="^0(1\d{9}|9\d{8})$">
                        <span class="error">* <?php //echo $phoneErr?></span>
                      </div>
                      <div class="form-group">
                        <input class="form-control" type="text" name="email" placeholder="Email" value = "<?=$row['email']?>" pattern="^[a-z][a-z0-9_\.]{5,32}@[a-z0-9]{2,}(\.[a-z0-9]{2,4}){1,2}$">
                        <span class="error">* <?php //echo $emailErr?></span>
                      </div>  
                        <input type="hidden" name="id" value = "<?=$idUpdate?>">
                        <button class="btn btn-primary" type="submit" name="submit" onclick="return confirm('Want to Submit?')">Submit </button>
                        <button class="btn btn-primary" type="submit" name="update" onclick="return confirm('Want to Update?')">Update</buttom>
                  </form>
                </div>
    </div>
    <div class="col-9">
                  <div>
                    <form  method="post">
                      <input class="form-control" type="text" name="textSearch" placeholder="Text Search" value = "<?=$_POST['textSearch']?>">
                      <button class="btn btn-primary" type="submit" name="searchList">Search </button>
                    </form>
                  </div>
                  <div>
                        <?php
                          if(!isset($_POST['searchList'])) {
                            $result = $C_Contact->allContactInfo($conn);
                            showList($result);
                          }    
                        ?> 
                  </div>
                    <div>
                      <?php
                          if(isset($_POST['searchList'])) {
                            $textSearch = $_POST['textSearch'];
                            $result = $C_Contact->searchContactByText($conn, $textSearch);
                            showList($result);
                          }  
                      ?>
                    </div>
    </div>   
</div>  

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>