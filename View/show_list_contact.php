<?php

    function showList($result) {
        if($result->num_rows > 0) {
          echo '<table class="table">
          <thead>
            <tr>
              <th scope="col">Id</th>
              <th scope="col">Name</th>
              <th scope="col">Phone</th>
              <th scope="col">Email</th>
            </tr>
          </thead>
          <tbody>';
          while($row = $result->fetch_assoc()) {
            echo '<tr>
            <th scope="row">'.$row["id"].'</th>
            <td>'.$row["name"].'</td>
            <td>'.$row["phone"].'</td>
            <td>'.$row["email"].'</td>
            <td>';
            echo '<form method="post">';
            echo '<input type="hidden" name="id" value='.$row["id"] . '>';
            echo '<input class="btn btn-primary" type="submit" name="updateById" value="Update"'.'onclick="return confirm('."'Want to Update?'".')"> ';
            echo '<input class="btn btn-primary" type="submit" name="deleteById" value="Delete"'.'onclick="return confirm('."'Want to Delete?'".')">';
            // onclick="return confirm('Want to Submit?')
          echo '</form>';
          echo '</td>
          </tr>'; 
          }
          echo '</tbody>
          </table>';
        } else {
          echo "no data";
        }
    }  
?>