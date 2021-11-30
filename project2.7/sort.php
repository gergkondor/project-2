<?php
include('conn.php');

if(isset($_GET['order'])) {
  $order = $_GET['order'];
} else {
  $order = 'firstName';
}

if(isset($_GET['sort'])) {
  $sort = $_GET['sort'];
} else {
  $sort = 'ASC';
}

$resultSet = $conn->query("SELECT * FROM personnel ORDER BY $order $sort");

if($resultSet->num_rows > 0) {
  $sort == 'DESC' ? $sort = 'ASC' : $sort = 'DESC';

  echo"
    <table border='1'>
      <tr>
        <th>First Name <a href='?order=firstName&&sort=$sort'>Up/Down</a></th>
        <th>Last Name <a href='?order=lastName&&sort=$sort'>Up/Down</a></th>
        ";
  while($rows = $resultSet -> fetch_assoc()) {
      $firstName = $rows['firstName'];
      $lastName = $rows['lastName'];

      echo"
        <tr>
          <td>$firstName</td>
          <td>$lastName</td>
        </tr>
      ";
    }
    echo "
      </tr>
    </table>
  ";
} else {
  echo "No records returned.";
}

?>